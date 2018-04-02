<?php

/**
 * Login .
 * Requires PHP 5+.
 */
 defined('BASEPATH') OR exit('No direct script access allowed');
 
class Login
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
    
    public function loginUser($input = array(), $sql)
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
    
    public function logout()
    {
        $_SESSION = [];
    }
    
    public function isUserNotLogin($redirectURL)
    {
        $is_login = $this->CI->session->userdata('is_login');
        
        if(!$is_login){
            redirect('../'.$redirectURL);
        } 
    }
    
    public function loginAttempt($input = array(), $sql)
    {
         $query = $this->CI->db->query($sql);
            
        if(!$query){
            $this->message = $this->CI->db->error()['message'];
        }
    }
    
    public function getLoginAttempt($input = array(), $resultKey, $sql)
    {
         $query = $this->CI->db->query($sql,$input);
            
        if(!$query){
            $this->message = $this->CI->db->error()['message'];
        } else {
           return $query->row_array()[$resultKey];
        }
    }
}


