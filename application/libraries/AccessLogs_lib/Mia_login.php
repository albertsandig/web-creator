<?php

/**
 * Login .
 * Requires PHP 5+.
 */
 defined('BASEPATH') OR exit('No direct script access allowed');
 
class Mia_login
{
    private $CI;
    
    public function __construct()
    {
        $this->CI = & get_instance();
        
        //load CI library
        $this->CI->load->helper('url');
        $this->CI->load->library('session');
        $this->CI->config->item('base_url');
        $this->CI->load->database();
    }
    
	public function do_something(){
	
		echo "test";
	}
}


