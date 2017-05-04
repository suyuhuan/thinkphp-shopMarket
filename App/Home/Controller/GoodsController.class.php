<?php
namespace Home\Controller;
use Think\Controller;
class GoodsController extends Controller {
    
    public function index(){
    	$this->display();
    }

    //商品详情
    public function goodsInfo($id){
       $module = M();
       $where = "goods.id = {$id} AND goods.userid = user.id AND goods.type_id = type.id";
       $field = 'goods.*,user.nickname,user.head_img,user.qq,user.phone,type.name';
       $goods = $module -> table('goods,user,type') -> field($field) -> where($where) -> find();
       $this -> commentAdd($id);
       $this -> comment($id);
       $this -> assign('goodsinfo',$goods);
       $this -> display();
    }

    //评论查询
    public function comment($id){
        $module = M();
        $where = "comment.goodid = {$id} and comment.userid = user.id";
        $count = $module -> table('comment,user') -> field('comment.*,user.nickname,user.head_img') -> where($where) -> count();
        $page = new\Think\Page($count,2);
        $comment = $module -> table('comment,user') -> field('comment.*,user.nickname,user.head_img') -> where($where) -> limit($page -> firstRow.','.$page -> listRows) -> order('comment.time desc') -> select();
        $this -> assign('page',$page -> show());
        $this -> assign('comment',$comment);
    }

    //插入评论
    public function commentAdd($id){
        $module = M('comment');
        if($_POST['com']){
            if(!$_SESSION['userid']){
                 $this -> redirect('Index/login');
            }
            unset($_POST['com']);
            $_POST['userid'] = $_SESSION['userid'];
            $_POST['goodid'] = $id;
            $_POST['time'] = time();

            if($module -> create()){
                $module -> add();
            }
        }
    }

    //发布商品
    public function fabu(){
    	if(!session('userid')){
            $this -> redirect('Index/login');
        }

    	if($_POST['sub']){
            unset($_POST['sub']);
            $_POST['time'] = time();
            $_POST['good_imgs'] = $this -> upload();
            $goods = M('goods');
            $_POST['userid'] = session('userid');
            if($goods -> create()){
                if($goods -> add()){
                	$id = $goods -> getLastInsId();
                    $this -> redirect("goodsInfo?id={$id}");
                }
            }
        }

    	$module = M('type');
    	$type = $module -> select();
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
}