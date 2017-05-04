<?php
namespace Admin\Controller;
use Think\Controller;
class AcademyController extends Controller {
   
    public function _initialize(){
       
        if(!isset($_SESSION['admin_id'])){
            $this -> redirect('Login/login');
        }

    }

    public function index(){
    	$school = M('school');

    	if($_GET['name']){
    		$map['name']=array('LIKE',"%{$_GET['name']}%");
    	}
    	$count = $school->where($map)-> count();
    	$page = new\Think\Page($count,5);
    	$data = $school->where($map)->field('*')->limit($page-> firstRow.','.$page-> listRows) ->select();
    	$this->assign("page",$page->show());
        
        $this->assign("data",$data);
    	$this->display();
    }
    public function add(){
    	$school = M('school');
    	if($_POST['sub']){
    		if($school->create()){
    			if($school->add()){
    				$this->redirect("Academy/index");
    			}else{
    				$this->redirect("Academy/add");
    				$this->error("添加失败！");
    			}
    		}else{
    			$this->error("添加失败");
    		}


    	}
    	$this->display();
    }
    //删除学院
    public function del($id){
       $school = M('school');
       $map['id'] = $id;
       if($school -> where($map) -> delete()){
            $this -> redirect('Index');        
       }
    }

    //修改学院
    public function edit($id){
        $school = M('school');
        $map['id'] = $id;
        
        if($_POST['sub']){
            unset($_POST['sub']);
            if($school -> where($map) -> save($_POST)){
                $this -> redirect('index');
            }
        }
      
       $data = $school -> where($map) -> find();
       $this -> assign('school',$data);
       $this -> display();
    }

}