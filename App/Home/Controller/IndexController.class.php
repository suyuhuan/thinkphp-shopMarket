<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){

       $type = $this -> type();
       $this -> goods();

       if(isset($_GET['type_id'])){
            $this -> assign('type_id',$_GET['type_id']);
       }

       $this -> assign('type',$type);
       $this->display();
    }

    //查询分类
    public function type(){
       $mode =  M('type');
       $type = $mode -> select();
       return $type;
    }

    //查询商品
    public function goods(){
        $type = '';
        if(isset($_GET['type_id'])){
            //$type .= "type_id = {$_GET['type_id']}";
            $map['type_id'] = $_GET['type_id'];
        }

        if(isset($_GET['name'])){
            $map['title'] = array('LIKE',"%{$_GET['name']}%");
            $this -> assign('name',$_GET['name']);
        }

        if(isset($_GET['flash'])){
            $order = 'time desc';
            $this -> assign('flash',$_GET['flash']);
        }

        $mode = M('goods');
        $count = $goods = $mode -> where($map) -> count();
        $page = new\Think\Page($count,6);
        $goods = $mode -> where($map) -> limit($page-> firstRow.','.$page-> listRows) -> order($order) -> select();        
        $this -> assign('page',$page -> show());
        $this -> assign('goods',$goods);
        $this -> assign("page",$page -> show());
    }

    public function login(){
    	if($_POST['sub']){
    		unset($_POST['sub']);
    		if(!$this -> finds('nickname',$_POST['nickname'],'user')){
    			$this ->error('用户名不存在');
    		}
    		$user = M('user');
    		$_POST['passwd'] = md5(trim($_POST['passwd']));
    		$info = $user -> field('id,nickname,head_img') -> where($_POST) -> find();
    		if($info){
    			session('username',$info['nickname']);
    			session('userid',$info['id']);
    			session('head_img',$info['head_img']);
    			$this -> redirect('index');
    		}else{
    			$this-> error('密码错误');
    		}
    	}
    	$this->display('login');
    }
    
    //查询学院
    public function school(){
        $module = M('school');
        $data = $module -> select();
        $this -> assign('school',$data);
    }

    public function loginout(){
    	unset($_SESSION);
		session_destroy();
		setcookie('PHPSESSID','',time()-1,'/');
		$this->redirect('index');
    }

    public function sign(){
    	$this->display('sign');
    }
    public function step(){
    	if($_POST['sub']){
    		unset($_POST['sub']);
    		if(!trim($_POST['nickname'])){
    			$this->error('用户名不能为空');
    		}

    		if($this -> finds('nickname',$_POST['nickname'],'user')){
    			$this -> error('用户名已存在');
    		}

    		if(!$_POST['passwd']){
    			$this -> error('密码不能为空');
    		}

    		$_POST['passwd'] = md5(trim($_POST['passwd']));
    		$_POST['repasswd'] = md5(trim($_POST['repasswd']));
    		if($_POST['passwd'] == $_POST['repasswd']){
    			unset($_POST['repasswd']);
    			$data = $_POST;
                $this -> school();
    			$this -> assign('info',$data);
    			$this -> display('step');
    		}else{
    			$this->error('密码不一致');
    		}

    	}else{
    		$this->error('请填写信息');
    	}
    }
    public function regest(){
    	if($_POST['sub']){
    		unset($_POST['sub']);
    		$data['nickname'] = trim($_POST['nickname']);
    		$data['passwd'] = trim($_POST['passwd']);
    		$data['email'] = trim($_POST['email']);
    		$data['phone'] = trim($_POST['phone']);
    		$data['qq'] = trim($_POST['qq']);
            $data['school_id'] = trim($_POST['school_id']);
            $data['ent_time'] = time();

    		if(!$data['nickname']){
    			$this -> error('用户名不能为空');
    		}

    		if($this -> finds('nickname',$_POST['nickname'],'user')){
    			$this ->error('用户名已存在');
    		}

    		if(!$data['passwd']){
    			$this -> error('密码不能为空');
    		}
    		if(!$data['email']){
    			$this -> error('邮箱不能为空');
    		}
    		if(!$data['phone']){
    			$this -> error('手机号不能为空');
    		}
    		if(!$data['qq']){
    			$this -> error('qq不能为空');
    		}
    		$user = M('user');
    		if($user->create($data)){
    			if($user -> add()){
    				$this -> redirect('login');
    			}
    		}
    	}
    }
    private function finds($field,$value,$table){     
    	$module = M($table);  
    	$count = $module -> where("{$field} = '{$value}'") -> count();
        return $count;
    }
}
