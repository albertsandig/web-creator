<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Type extends SUB_Controller {

	function __construct()
    {
		parent::__construct();   
        $this->login_lib->is_user_not_login('login');
        $this->load->model('User_Type_Model'); 
        
        access_level('ADMIN_ACCESS');
	}
    
    public function index()
    {
        $this->data['types'] = $this->table_lib->getList(
            'User_Type_Model',
            'get_user_types',
            $this->input->post('table_search'),
            'type_no'
        );
        
        
        $string = "<a href='add' ><i class='fa fa-fw fa-plus'></i> add type</a>";
        $this->set_header_title('User Type',$string);
        $this->set_body('themes/private/adminlte/admin/pages/user_type/info');
		$this->load->view('themes/private/adminlte/admin/template',$this->data);
    }
    
    public function add()
    {
        
        $this->data['user_type'] = new stdClass();
        
        $this->form_validation->set_rules(self::save('add'));
        
        if($this->form_validation->run()){
            $this->User_Type_Model->insert();
            $this->session->set_flashdata('message', 'Successfully add user type.');   
            redirect('admin/users/user_type/add');
        } 
        
        $this->set_header_title('Add User Type','');
        $this->set_body('themes/private/adminlte/admin/pages/user_type/form');
		$this->load->view('themes/private/adminlte/admin/template',$this->data);
    }
    
    public function edit($id)
    {
        
        $this->data['user_type'] = $this->User_Type_Model->get_user_type($id);
        
        $this->form_validation->set_rules(self::save());
        
        if($this->form_validation->run()){
            $this->User_Type_Model->update();
            $this->session->set_flashdata('message', 'Successfully updated user type.');   
            redirect('admin/users/user_type/edit/'.$id);
        } 
        
        $this->set_header_title('Edit User Type','');
        $this->set_body('themes/private/adminlte/admin/pages/user_type/form');
		$this->load->view('themes/private/adminlte/admin/template',$this->data);
       
    }
    
    public function delete($id)
    {
        
        $user_type = $this->User_Type_Model->get_user_type($id);
        
        
        if($user_type){
            $this->User_Type_Model->delete($id);
            $this->session->set_flashdata('notification_type', 'success');   
            $this->session->set_flashdata('message', 'The user type "'.$user_type->name.'" was deleted.');   
        } else {
            $this->session->set_flashdata('notification_type', 'danger');   
            $this->session->set_flashdata('message', 'The entry #'.$id.' does not exist.');   
        }
        redirect('admin/users/user_type/list');
        
    }
    
    static function save($state = 'edit')
    {
        $config = array(
            
        );
        
        if($state == 'add'){
            array_push( $config , 
                array(
                    'field' => 'name',
                    'label' => 'User Type',
                    'rules' => 'required|is_unique[user_type.name]'
                )
            );
        } else {
             array_push( $config , 
                array(
                    'field' => 'name',
                    'label' => 'User Type',
                    'rules' => 'required|callback_is_user_type_exist'
                )
            );
        }
        
        return $config;
    }
    
    public function is_user_type_exist($name){
        $id = $this->input->post('id');
        
        if($this->User_Type_Model->is_user_type_exist($name,$id)){
            $this->form_validation->set_message('is_user_type_exist', 'The value \''.$name.'\' in {field} is already exist.');
            return false;
        } else {
            return true;
        }
    }
}