<?php
namespace Admin\Controller;
use Think\Controller;
class CeController extends Controller {
	
	public function _initialize(){
        if(!isset($_SESSION['admin_id'])){
            $this -> redirect('Login/login');
        }
    }

    public function index(){
    	$this->display();
    }
}