<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends SUB_Controller {
    
	function __construct()
    {
		parent::__construct();   
        $this->login_lib->is_user_not_login('login');
        $this->load->model('User_Model'); 
        $this->load->model('User_Type_Model'); 
        
        
        access_level('ADMIN_ACCESS');
	}
    
    public function index()
    {
        $this->data['users'] = $this->table_lib->getList(
            'User_Model', //model name
            'get_all_user', //model get function name
            $this->input->post('table_search'), //search input name
            'user_no', //table primary key
            true,
            false
        );
        
        
        $string = "<a href='add' ><i class='fa fa-fw fa-plus'></i> add user</a>";
        $this->set_header_title('Users',$string);
        $this->set_body('themes/private/adminlte/admin/pages/users/info');
		$this->load->view('themes/private/adminlte/admin/template',$this->data);
    }
    
    public function add()
    {
        $this->data['user'] = new stdClass();
        $this->data['user_type'] = $this->User_Type_Model->get_user_type_ui();
        
        $this->form_validation->set_rules(self::save('add'));
        
        if($this->form_validation->run()){
            $this->User_Model->insert();
            $this->session->set_flashdata('message', 'Successfully add user.');   
            redirect('admin/users/add');
        } 
        
        $this->set_header_title('Add Users','');
        $this->set_body('themes/private/adminlte/admin/pages/users/form');
		$this->load->view('themes/private/adminlte/admin/template',$this->data);
    }
    
    public function edit($id)
    {
        $this->data['user'] = $this->User_Model->get_user($id);
        $this->data['user_type'] = $this->User_Type_Model->get_user_type_ui();
        
        $this->form_validation->set_rules(self::save());
        
        if($this->form_validation->run()){
            $this->User_Model->update();
            $this->session->set_flashdata('message', 'Successfully updated user.');   
            redirect('admin/users/edit/'.$id);
        } 
        
        $this->set_header_title('Edit User','');
        $this->set_body('themes/private/adminlte/admin/pages/users/form');
		$this->load->view('themes/private/adminlte/admin/template',$this->data);
       
    }
    
    static function save($state = 'edit')
    {
        $config = array(
            array(
                'field' => 'type_no',
                'label' => 'User Type',
                'rules' => 'required'
            ), array(
                'field' => 'status',
                'label' => 'Status',
                'rules' => 'required'
            ), array(
                'field' => 'img_source',
                'label' => 'Profile Image',
                'rules' => ''
            ), array(
                'field' => 'firstname',
                'label' => 'First Name',
                'rules' => 'required'
            ), array(
                'field' => 'lastname',
                'label' => 'Last Name',
                'rules' => 'required'
            ), array(
                'field' => 'mobile_number',
                'label' => 'Last Name',
                'rules' => ''
            ), array(
                'field' => 'gender',
                'label' => 'Gender',
                'rules' => ''
            ), array(
                'field' => 'address',
                'label' => 'Address',
                'rules' => ''
            ), array(
                'field' => 'birthday',
                'label' => 'Birthday',
                'rules' => 'required'
            )
        );
        
        if($state == 'add'){
            array_push( $config , 
                array(
                    'field' => 'email',
                    'label' => 'Email',
                    'rules' => 'required|valid_email|is_unique[user_info.email]'
                ),
                array(
                    'field' => 'password',
                    'label' => 'Password',
                    'rules' => 'required',
                    'errors' => array(
                            'required' => 'You must provide a %s.',
                    )
                ),
                array(
                    'field' => 'confirm_password',
                    'label' => 'Confirm Password',
                    'rules' => 'required|matches[password]'
                )
            );
        } else {
             array_push( $config , 
                array(
                    'field' => 'email',
                    'label' => 'Email',
                    'rules' => 'required|valid_email|callback_is_email_exist'
                )
            );
        }
        
        return $config;
    }
    
    public function is_email_exist($email){
        $id = $this->input->post('id');
        
        if($this->User_Model->is_email_exist($email,$id)){
            $this->form_validation->set_message('is_email_exist', 'The {field} must be unique.');
            return false;
        } else {
            return true;
        }
    }
}