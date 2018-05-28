<?php

/**
 * Login .
 * Requires PHP 5+.
 */
 defined('BASEPATH') OR exit('No direct script access allowed');
 
class Table_lib
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
    
    public function getList($model,$function,$search = '',$pk = '')
    {
        //LOAD MODEL
        $this->CI->load->model($model);
        $results = $this->CI->{$model}->{$function}($search);
        $data = "";
        $p_key = -1;//primary key
        foreach($results as $result) {
            $data .= "<tr>";
            foreach($result as $key => $value){
                if($key === $pk){
                    $p_key = $value;
                } 
                $data .= "<td>". $value ."</td>";
            }
            //show action has pkey
            if($p_key != -1){
                $data .= "<td>
                            <a href='edit/".$p_key."' >edit</a> | 
                            <a href='delete/".$p_key."' >delete</a>
                          </td>";
            }
            
            $data .= "</tr>";
        } 
        
        return $data;
    }
}


