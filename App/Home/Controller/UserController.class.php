<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {
    
    public function ziliao(){
       $map['id']=$_SESSION['userid'];
    	$user=M('user');
        $data = $user->where($map)->find();
        $school=M('school');
        $college = $school -> select();
        $this -> assign('school',$college);
        $this->assign("user",$data);
    	$this->display('ziliao');
    }
    public function edit($id){
        $user = M('user');
        $map['id']=$id;
         if($_POST['sub']){
            unset($_POST['sub']);
            
            if($_FILES['head_img']['name']){
                $_POST['head_img'] = $this -> upload();
           }
            if($user -> where($map) -> save($_POST)){
                $this -> redirect('ziliao');
            }
        }
        $goods = $module -> where($map) -> find();
        $type=M('school');
        $data = $type->select();
        $this -> assign('school',$data);
        $this->assign('user',$data);
        $this->display('ziliao');
    }
    public function fabu(){
        $goods = M("goods");
        $map['id']=$_SESSION['userid'];
        $user=M('user');
        $data = $user->where($map)->find();
        $goodData = $goods->where("userid={$map['id']}")->select();
        $this->assign("user",$data);
        $this->assign("goodData",$goodData);
        $this->display('fabu');
    }
    public function message(){
        $map['id']=$_SESSION['userid'];
        $user=M('user');
        $data = $user->where($map)->find();
        $this->assign("user",$data);
        $message = M("comment");
        $this->display('message');
    }
    public function ce(){
        $map['id']=$_SESSION['userid'];
        $ces = M('ce');
       
        $user=M('user');
        $data = $user->where($map)->find();
        if(!session('userid')){
            $this->redirect('Index/login');
        }

        if($_POST['sub'] == 'submit'){
            unset($_POST['sub']);
            $_POST['image'] = $this->upload();
            $_POST['userId'] = session('userid');
            if($ces->create()){
                if($ces->add()){
                    $this->redirect("ce");
                }
            }
        }

        if($_POST['sub'] == "del"){
            $del['userId'] = session('userid');
            $ces-> where($del) -> delete();
        }

        $map1['userId']=$_SESSION['userid'];
        $ceInfo = $ces -> where($map1) -> find();
        $this -> assign('ceInfo',$ceInfo);

        $this->assign("user",$data);
    	$this->display('ce');
    }

    //图片上传
    public function upload(){
        $upload = new \Think\Upload();                                  // 实例化上传类
        $upload->maxSize   =     31457280 ;                              // 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');    // 设置附件上传类型
        $upload -> rootPath = './Public/';
        $upload->savePath  =      '/Uploads/';                  // 设置附件上传目录
        
        $info   =   $upload->uploadOne($_FILES['image']);
        
        if(!$info) {                                                    // 上传错误提示错误信息        
            $this->error($upload->getError());    
        }else{
            return $info['savepath'].$info['savename']; 
       }

    }
}
