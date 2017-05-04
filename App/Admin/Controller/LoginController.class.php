<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {

    public function login(){
        // var_dump($_POST);
        if($_POST['sub']){
            unset($_POST['sub']);

            if(!$this -> finds('nickname',$_POST['nickname'],'user')){
                $this ->error('用户名不存在');
            }

            $user = M('user');
            $_POST['passwd'] = md5(trim($_POST['passwd']));
            $_POST['type'] = 1;
            var_dump($_POST);
            $info = $user -> field('id,nickname,head_img') -> where($_POST) -> find();
            if($info){
                session('username',$info['nickname']);
                session('admin_id',$info['id']);
                session('head_img',$info['head_img']);
                $this -> redirect('Index/index');
            }else{
                $this-> error('密码或用户名错误');
            }
        }
    	$this->display();
    }

     public function loginout(){
        unset($_SESSION);
        session_destroy();
        setcookie('PHPSESSID','',time()-1,'/');
        $this->redirect('Index/index');
    }

    private function finds($field,$value,$table){     
        $module = M($table);  
        $count = $module -> where("{$field} = '{$value}'") -> count();
        return $count;
    }
}