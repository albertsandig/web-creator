<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends SUB_Controller 
{

	function __construct()
    {
		parent::__construct();
        
        $this->data['header'] = 'themes/public/adminlte/credential/layout/header';
		$this->data['sidebar'] = null;
        $this->data['footer'] = 'themes/public/adminlte/credential/layout/footer';
	}
    
    public function index()
    {
        $this->form_validation->set_rules(self::validate_login());
        
        if ($this->form_validation->run() == FALSE){
            $this->set_header_title('Login Page','','');
            $this->set_body('themes/public/adminlte/credential/pages/login');
            $this->load->view('themes/public/adminlte/credential/template',$this->data);
        }   else {
            $this->load->model('User_Model'); 
            
            //Check attempts    
            if($this->User_Model->getAttempt()->login_attempt != 5){
                //Check credentials
                if($this->User_Model->check_login()){
                    if($this->session->userdata('is_active') == false){
                        $this->User_Model->user_logout();
                        $this->session->set_flashdata('message', 'This account is inactive. Please contact the administrator.');
                        $this->User_Model->recordAttempt('attempt');
                        redirect('login');
                    } else {                    
                        $fullname = ucfirst(strtolower($this->session->userdata('firstname'))). " " .ucfirst(strtolower($this->session->userdata('lastname')));
                        $this->session->set_userdata('name', $fullname);
                        $this->session->set_flashdata('success_login', 'Welcome '.$fullname.', have a nice day.');
                        $this->User_Model->recordAttempt('success');
                        redirect('admin/profile');
                    }
                } else {
                    $this->session->set_flashdata('message', 'Invalid Username Password');
                    $this->User_Model->recordAttempt('attempt');
                    redirect('login');
                }
            } else {
                $this->session->set_flashdata('warning', 'Someone is trying to access your account. User has been temporarily blocked due to multiple login attempts. We will send you email to reset your login attempt.');
                redirect('login');
            }
        }
    }
    
    static function validate_login()
    {
        $config = array(
            array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'trim|required|valid_email'
            ), array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required',
                'errors' => array(
                        'required' => 'You must provide a %s.',
                )
            )
        );
        
        return $config;
    }
}
