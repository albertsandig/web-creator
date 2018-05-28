<?php

/**
 * Post content .
 * Requires PHP 5+.
 */
 defined('BASEPATH') OR exit('No direct script access allowed');
 
class Post_lib
{
    private $CI;
    private $error;
    
    public function __construct()
    {
        $this->CI = & get_instance();
        
        //load CI library
        $this->CI->load->helper('url');
        $this->CI->load->library('session');
        $this->CI->config->item('base_url');
        $this->CI->load->database();
    }
    
    public function testing(){
        return 'testing';
    }
    
    public function getAllPost($sql)
    {
        $query = $this->CI->db->query($sql);
        
        return $query->result();
    }
    
    public function getPost($input = array(), $sql)
    {
        $query = $this->CI->db->query($sql,$input);
        
        return $query->row();
    }
    
    public function createPost($input = array(), $sql)
    {
        $query = $this->CI->db->query($sql,$input);
        
        if(!$query){
			$this->error = $this->db->error()['message'];
            return false;
		}
			
        return  true;
    }
    
    public function updatePost($input = array(), $sql)
    {
        $query = $this->CI->db->query($sql,$input);
        
        if(!$query){
			$this->error = $this->db->error()['message'];
            return false;
		}
			
        return  true;
    }
    
    public function deletePost($input = array(), $sql)
    {
        $query = $this->CI->db->query($sql,$input);
        
        if(!$query){
			$this->error = $this->db->error()['message'];
            return false;
		}
			
        return  true;
    }
}


