<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends SUB_Controller {

	function __construct()
    {
		parent::__construct();   
	}
    
    public function info()
    {
        $this->load->model('Post_Model');
        $this->data['posts'] = $this->Post_Model->executeCommand('retrieveAll');
        $this->data['post'] = $this->Post_Model->executeCommand('retrieve');
        $this->set_header_title('Profile','user information');
        $this->set_body('themes/private/adminlte/admin/pages/home');
		$this->load->view('themes/private/adminlte/admin/template',$this->data);
    }
    
    
	public function testing()
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
            echo $this->session->userdata('is_login');
            
            //echo $this->session->userdata('is_login');
        } else {
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
    
}
