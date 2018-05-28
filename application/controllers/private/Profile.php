<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends SUB_Controller {

	function __construct()
    {
		parent::__construct();   
        $this->login_lib->is_user_not_login('login');
        $this->load->model('User_Model'); 
	}
    
    public function logout(){
        $this->User_Model->user_logout();
        $this->login_lib->is_user_not_login('login');
    }
    
    public function info()
    {
        //$this->load->model('Post_Model');
        //$this->data['posts'] = $this->Post_Model->executeCommand('retrieveAll');
        //$this->data['post'] = $this->Post_Model->executeCommand('retrieve');
        $this->set_header_title('Profile','user information');
        $this->set_body('themes/private/adminlte/admin/pages/profile/info');
		$this->load->view('themes/private/adminlte/admin/template',$this->data);
    }
}