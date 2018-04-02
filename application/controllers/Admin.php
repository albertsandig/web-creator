<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends SUB_Controller {

	function __construct()
    {
		parent::__construct();   
        
        $this->data['header'] = 'themes/adminlte/private/admin/layout/header';
		$this->data['sidebar'] = 'themes/adminlte/private/admin/layout/sidebar';
        $this->data['footer'] = 'themes/adminlte/private/admin/layout/footer';
        
        //DEFAULT CSS
        $this->add_css('assets/adminlte/bootstrap/css/bootstrap.min.css');
        $this->add_css('assets/adminlte/dist/css/AdminLTE.min.css');
        $this->add_css('assets/adminlte/dist/css/skins/_all-skins.min.css');
        $this->add_css('assets/adminlte/plugins/iCheck/flat/blue.css');
        $this->add_css('assets/adminlte/plugins/morris/morris.css');
        $this->add_css('assets/adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.css');
        $this->add_css('assets/adminlte/plugins/datepicker/datepicker3.css');
        $this->add_css('assets/adminlte/plugins/daterangepicker/daterangepicker-bs3.css');
        $this->add_css('assets/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css');
        
        //DEFAULT JAVASCRIPT
		$this->add_javascript('assets/adminlte/plugins/jQuery/jQuery-2.1.4.min.js');
        $this->add_javascript('assets/adminlte/bootstrap/js/bootstrap.min.js');
        $this->add_javascript('assets/adminlte/plugins/morris/morris.min.js');
        $this->add_javascript('assets/adminlte/plugins/sparkline/jquery.sparkline.min.js');
        $this->add_javascript('assets/adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js');
        $this->add_javascript('assets/adminlte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js');
        $this->add_javascript('assets/adminlte/plugins/knob/jquery.knob.js');
        $this->add_javascript('assets/adminlte/plugins/daterangepicker/daterangepicker.js');
        $this->add_javascript('assets/adminlte/plugins/datepicker/bootstrap-datepicker.js');
        $this->add_javascript('assets/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js');
        $this->add_javascript('assets/adminlte/plugins/slimScroll/jquery.slimscroll.min.js');
        $this->add_javascript('assets/adminlte/plugins/fastclick/fastclick.min.js');
        $this->add_javascript('assets/adminlte/dist/js/app.min.js');
        $this->add_javascript('assets/adminlte/dist/js/pages/dashboard.js');
        $this->add_javascript('assets/adminlte/dist/js/demo.js');
	}
    
    public function index()
    {
        
        $this->set_body('themes/adminlte/private/admin/pages/home');
		$this->load->view('themes/adminlte/private/admin/template',$this->data);
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
