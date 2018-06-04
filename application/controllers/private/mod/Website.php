<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Website extends SUB_Controller {
    private $default_model = 'Post_Model';
    
	function __construct()
    {
		parent::__construct();   
        $this->login_lib->is_user_not_login('login');
        $this->load->model('modules/'.$this->default_model); 
		$this->module_serial_no = 22034;
	}
    
    public function index()
    {
		$this->{$this->default_model}->test();
       /* $edit = true;
        $delete = true;
        
        if(access_level_view('USER_ACCESS')){
            $edit = false;
            $delete = false;
            $this->table_lib->create_link('test/','activate');
        }
        
        
        
        
        $this->data['modules'] = $this->table_lib->getList(
            $this->default_model,
            'get_modules',
            $this->input->post('table_search'),
            'module_no',
            $edit,
            $delete,
            array('name','module_serial_no')
        );
        
        
        $string = "<a href='add' ><i class='fa fa-fw fa-plus'></i> add module</a>";
        $this->set_header_title('Modules',$string);
        $this->set_body('themes/private/adminlte/admin/pages/modules/info');
		$this->load->view('themes/private/adminlte/admin/template',$this->data);
		*/
    }
    
    public function add()
    {    
        access_level('ADMIN_ACCESS');
        
        $this->data['module'] = new stdClass(); // module info into empty
        
        $this->form_validation->set_rules(self::save('add'));
        
        if($this->form_validation->run()){
            $this->{$this->default_model}->insert();
            $this->session->set_flashdata('message', 'Successfully add module.');   
            redirect('admin/modules/add');
        } 
        
        $this->set_header_title('Add Module','');
        $this->set_body('themes/private/adminlte/admin/pages/modules/form');
		$this->load->view('themes/private/adminlte/admin/template',$this->data);
    }
    
    public function edit($id)
    {
        access_level('ADMIN_ACCESS');
        
        $this->data['module'] = $this->{$this->default_model}->get_module($id);
        
        $this->form_validation->set_rules(self::save());
        
        if($this->form_validation->run()){
            $this->{$this->default_model}->update();
            $this->session->set_flashdata('message', 'Successfully updated module.');   
            redirect('admin/modules/edit/'.$id);
        } 
        
        $this->set_header_title('Edit Module','');
        $this->set_body('themes/private/adminlte/admin/pages/modules/form');
		$this->load->view('themes/private/adminlte/admin/template',$this->data);
       
    }
    
    public function delete($id)
    {
        access_level('ADMIN_ACCESS');
        
        $entity = $this->{$this->default_model}->get_module($id);
        
        
        if($entity){
            $this->{$this->default_model}->delete($id);
            $this->session->set_flashdata('notification_type', 'success');   
            $this->session->set_flashdata('message', 'The module "'.$entity->name.'" was deleted.');   
        } else {
            $this->session->set_flashdata('notification_type', 'danger');   
            $this->session->set_flashdata('message', 'The entry #'.$id.' does not exist.');   
        }
        
        redirect('admin/modules/list');
        
    }
    
    public function view($id)
    {
        $this->data['module'] = $this->{$this->default_model}->get_module($id);
        
        $this->form_validation->set_rules(self::save());
        
        if($this->form_validation->run()){
            $this->{$this->default_model}->update();
            $this->session->set_flashdata('message', 'Successfully updated module.');   
            redirect('admin/modules/edit/'.$id);
        } 
        
        $this->set_header_title('View module','');
        $this->set_body('themes/private/adminlte/admin/pages/modules/view');
		$this->load->view('themes/private/adminlte/admin/template',$this->data);
        
    }
    
    static function save($state = 'edit')
    {
        $config = array(
            
        );
        
        if($state == 'add'){
            array_push( $config , 
                array(
                    'field' => 'serial_no',
                    'label' => 'Serial Number',
                    'rules' => 'required|numeric|is_unique[modules.module_serial_no]'
                ),
                array(
                    'field' => 'name',
                    'label' => 'Module Name',
                    'rules' => 'required|is_unique[modules.name]'
                )
            );
        } else {
             array_push( $config , 
                array(
                    'field' => 'serial_no',
                    'label' => 'Serial Number',
                    'rules' => 'required|numeric|callback_is_serial_no_exist'
                ),
                array(
                    'field' => 'name',
                    'label' => 'User Type',
                    'rules' => 'required|callback_is_module_exist'
                )
            );
        }
        
        return $config;
    }
    
    public function is_module_exist($name){
        $id = $this->input->post('id');
        
        if($this->{$this->default_model}->is_module_name_exist($name,$id)){
            $this->form_validation->set_message('is_module_exist', 'The value \''.$name.'\' in {field} is already exist.');
            return false;
        } else {
            return true;
        }
    }
    
    public function is_serial_no_exist($serial_no){
        $id = $this->input->post('id');
        
        if($this->{$this->default_model}->is_serial_no_exist($serial_no,$id)){
            $this->form_validation->set_message('is_serial_no_exist', 'The value \''.$serial_no.'\' in {field} is already exist.');
            return false;
        } else {
            return true;
        }
    }
}