<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends SUB_Controller {

	function __construct()
    {
		parent::__construct();   
	}
    
    public function index()
    {
        $this->load->model('Post_Model');
        $this->data['posts'] = $this->Post_Model->executeCommand('retrieveAll');
        $this->data['post'] = $this->Post_Model->executeCommand('retrieve');
        $this->set_header_title('Dashboard','version 0.01');
        $this->set_body('themes/private/adminlte/admin/pages/home');
		$this->load->view('themes/private/adminlte/admin/template',$this->data);
    }
    
}
