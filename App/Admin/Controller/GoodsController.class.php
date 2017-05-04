<?php
namespace Admin\Controller;
use Think\Controller;
class GoodsController extends Controller {

    public function _initialize(){
        if(!isset($_SESSION['admin_id'])){
            $this -> redirect('Login/login');
        }
    }
    
    public function index(){
		$school = M();

        if($_GET['name']){
            $map['title']=array('LIKE',"%{$_GET['name']}%");
        }

        $count = $school -> table('goods,user,type') -> where($map) -> where('goods.userid = user.id and goods.type_id = type.id') -> count();
        $page = new\Think\Page($count,5);
        $goods = $school -> table('goods,user,type') -> field('goods.*,user.nickname,type.name') -> where($map) -> 
                where('goods.userid = user.id and goods.type_id = type.id') ->limit($page-> firstRow.','.$page-> listRows) -> select();
       
        $this -> assign("page",$page->show());

		//$goods = $module -> table('goods,user,type') -> field('goods.*,user.nickname,type.name') -> where('goods.userid = user.id and goods.type_id = type.id') -> select();
		$this->assign('goods',$goods);
		$this->display();
    }
	public function del($id){
		$user = M('goods');
		if($user -> delete($id)){
			$this -> redirect('index');
		}
	}
    public function classAdd(){
        if($_POST['sub']){
           unset($_POST['sub']);
           $_POST['name']= trim($_POST['name']);
           if(empty($_POST['name'])){
                $this -> error('分类不能为空');
           }
           $type = M('type');
            if($type -> create()){
                if($type -> add()){
                    $this -> redirect('addCat');
                }
            }
        }
        $type = M('type');
        $data = $type -> select();
        $this -> assign('type',$data);
    	$this -> display();
    }

    //添加商品
    public function add(){
        if($_POST['sub']){
            unset($_POST['sub']);
            $_POST['time'] = time();
            $_POST['good_imgs'] = $this -> upload();
            $goods = M('goods');
            if(!session('userid')){
                session('userid','1');
            }
            
            $_POST['userid'] = session('userid');
            if($goods -> create()){
                if($goods -> add()){
                    $this -> redirect('index');
                }
            }
        }
        $type = M('type');
        $data = $type -> select();
        $this -> assign('type',$data);
    	$this->display();
    }

    //编辑商品
    public function editGoods($id){
        $module = M('goods');
        $map['id'] = $id;
        if($_POST['sub']){
            unset($_POST['sub']);
            
            if($_FILES['good_imgs']['name']){
                $_POST['good_imgs'] = $this -> upload();
           }
            if($module -> where($map) -> save($_POST)){
                $this -> redirect('index');
            }
        }
        $goods = $module -> where($map) -> find();
        $type = M('type');
        $data = $type -> select();
        $this -> assign('type',$data);
        $this -> assign('goods',$goods);
        $this -> display();
    }

    //商品分类查看
    public function addCat(){
        $type = M('type');
        $data = $type -> select();
        $this -> assign('type',$data);
        $this -> display();
    }

    //商品分类删除
    public function delType($id){
        $user = M('type');
        if($user -> delete($id)){
            $this -> redirect('addCat');
        }
    }

    //分类编辑
    public function editType($id){
        $data = M('type');
        $map['id'] = $id;

        if($_POST['sub']){
            unset($_POST['sub']);
            if($data -> where($map) -> save($_POST)){
                $this -> redirect('addCat');
            }
        }

        $type = $data -> where($map) -> find();
        $this -> assign('type',$type);
        $this -> display();
    }

    //图片上传
    public function upload(){
        $upload = new \Think\Upload();                                  // 实例化上传类
        $upload->maxSize   =     31457280 ;                              // 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');    // 设置附件上传类型
        $upload -> rootPath = './Public/';
        $upload->savePath  =      '/Uploads/';                  // 设置附件上传目录
        
        $info   =   $upload->uploadOne($_FILES['good_imgs']);
        
        if(!$info) {                                                    // 上传错误提示错误信息        
            $this->error($upload->getError());    
        }else{
            return $info['savepath'].$info['savename']; 
       }

    }

    public function indexAll(){
    	$this->display();
    }
}