<?php
namespace Admin\Controller;
use Think\Controller;
class UsersController extends Controller {
    
    public function _initialize(){
        if(!isset($_SESSION['admin_id'])){
            $this -> redirect('Login/login');
        }
    }
    
    public function index(){
		$school = M();
		if($_GET['name']){
    		$map['nickname']=array('LIKE',"%{$_GET['name']}%");
    	}
    	$count = $school -> table('user,school') -> where($map) -> where('user.school_id = school.id') -> count();
    	$page = new\Think\Page($count,5);
    	$user = $school -> table('user,school') -> field('user.*,school.name as school') -> where($map) -> 
    			where('user.school_id = school.id') ->limit($page-> firstRow.','.$page-> listRows) -> select();
    	$this -> assign("page",$page->show());
		$this -> assign('user',$user);
    	$this -> display();
    }
    public function add(){
		if($_POST['sub']){
			unset($_POST['sub']);
    		if(!trim($_POST['nickname'])){
    			$this->error('用户名不能为空');
    		}
    		if($this -> finds_2('nickname',$_POST['nickname'],'user')){
    			$this -> error('用户名已存在');
    		}
			
			if(!trim($_POST['email'])){
    			$this->error('邮箱不能为空');
    		}
			
			if(!trim($_POST['phone'])){
    			$this->error('电话不能为空');
    		}
			
    		if(!$_POST['passwd']){
    			$this -> error('密码不能为空');
    		}

    		$_POST['passwd'] = md5(trim($_POST['passwd']));
    		$_POST['repasswd'] = md5(trim($_POST['repasswd']));
    		if($_POST['passwd'] == $_POST['repasswd']){
    			unset($_POST['repasswd']);
    			$data = $_POST;
    			$this -> assign('info',$data);
    		}else{
    			$this->error('密码不一致');
    		}
			$user = M('user');
			if($user->create()){
				if($user->add()){
					$this -> redirect('index');
				}
			}
		}
		$school = $this -> finds('school','*');
		$this -> assign('school',$school);
    	$this->display('add');
    }
	
	public function del($id){
		$user = M('user');
		if($user -> delete($id)){
			$this -> redirect('index');
		}
	}
	
	public function edit($id){
		if($_POST['sub']){
			unset($_POST['sub']);
			$map['id'] = $id;
			$data = $_POST;
			M('user') -> where($map) -> save($data);
		}
		$user = M('user');
		$map['id'] = $id;
		$info = $user -> where($map) -> find();
		$school = M('school');
		$college = $school -> select();
		$this -> assign('school',$college);
		$this -> assign('info',$info);
		$this -> display();
	}
	private function finds($table,$field='*'){
		$module = M($table);
		$data = $module -> field($field) -> select();
		return $data;
	}
	
	 private function finds_2($field,$value,$table){     
    	$module = M($table);
		$value = trim($value);
    	$count = $module -> where("{$field} = '{$value}'") -> count();
        return $count;
    }
}