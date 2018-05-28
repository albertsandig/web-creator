<?php

/**
 * Login .
 * Requires PHP 5+.
 */
 defined('BASEPATH') OR exit('No direct script access allowed');
 
class Login_lib
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
    
    public function login_user($input = array(), $sql)
    {
        $isLogin = false;
        
        //Check if one field is empty
        if(in_array('',$input)) { 
            return $isLogin;
        } else {        
            $query = $this->CI->db->query($sql,$input);
            
            if(!$query){
                $this->message = $this->CI->db->error()['message'];
            } else {
                $result = $query->row_array();
                $isLogin = (count($result) === 0) ? false : true;
                
                if($isLogin) {
                    $this->CI->session->set_userdata('is_login', $isLogin);
                    $this->CI->session->set_userdata($result);
                }
                
                return $isLogin;
            }
        }
    }
    
    public function logout($input = array(), $sql)
    {
        $_SESSION = [];
        
        $query = $this->CI->db->query($sql,$input);
            
        if(!$query){
            $this->message = $this->CI->db->error()['message'];
        }
    }
    
    public function is_user_not_login($redirectURL)
    {
        $is_login = $this->CI->session->userdata('is_login');
        
        if(!$is_login){
            redirect($redirectURL);
        } 
    }
    
    public function isUserLogin(){
        return $this->CI->session->userdata('is_login');
    }
    
    
    public function login_attempt($input = array(), $sql)
    {
        $query = $this->CI->db->query($sql,$input);
            
        if(!$query){
            $this->message = $this->CI->db->error()['message'];
        }
    }
    
    public function get_login_attempt($input = array(), $sql)
    {
         $query = $this->CI->db->query($sql,$input);
            
        if(!$query){
            $this->message = $this->CI->db->error()['message'];
        } else {
           return $query->row();
        }
    }
    
}


