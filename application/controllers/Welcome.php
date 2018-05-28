<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct(){
		parent::__construct();
       
	}
    
    public function index(){
        redirect('login');
    }
    
	public function test_login()
	{
        //$this->lang->load('home', 'english');
		//$this->load->view('welcome_message');
        $username = 'albert.sandig1@gmail.com';
        $password =  'Machinedoll123';
        
        $isLogin = $this->login->loginUser(
            array(
                $username,
                $password
            ),
            '
                SELECT 
                    user_no	,
                    email 	,
                    password ,
                    CONCAT(firstname," ",lastname) as name
                FROM user_info
                WHERE email = ? AND password = md5(?);
            '
        );
        
        if($isLogin) {
            //echo $this->session->userdata('is_login');           
            //$this->login->logout();
            //echo $this->session->userdata('is_login');
            echo 'login';
            //echo $this->session->userdata('is_login');
        } else {
            echo 'not login';
            /*$this->login->loginAttempt(array($username),'
                UPDATE user_info
                SET login_attempt = login_attempt+1
                WHERE email = ?
            ');
            */
        }
        
        
        
        
       // print_r($this->login->getData());
      //echo $this->login->getData()->date;
      
     // 
      //$this->login->isUserNotLogin('welcome/test');
        
        
        //echo $this->session->userdata('user_no');
	}
    
    public function test(){
        echo 'test';
    }
}
