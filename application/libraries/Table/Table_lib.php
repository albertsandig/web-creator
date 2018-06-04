<?php

/**
 * Login .
 * Requires PHP 5+.
 */
 defined('BASEPATH') OR exit('No direct script access allowed');
 
class Table_lib
{

    private $CI;
    private $external_links = "";
    
    public function __construct()
    {
        $this->CI = & get_instance();
        
        //load CI library
        $this->CI->load->helper('url');
        $this->CI->load->helper('access');
        $this->CI->load->library('session');
        $this->CI->config->item('base_url');
        $this->CI->load->database();
    }
    
    public function getList($model,$function,$search = '',$pk = '',$edit_link = true, $delete_link = true, $view_link = array())
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
                
                if(count($view_link) > 0 && in_array($key,$view_link)){
                    $value = "<a href='replace_link' >".$value."</a>";
                } 
                $data .= "<td>". $value ."</td>";
            }
            
            if(count($view_link) > 0 ){
               $v_link = "view/".$p_key."'";
               $data = str_replace("replace_link",$v_link,$data);
            }
            
            //show action has pkey
            if($p_key != -1){
                $action_delete = ($delete_link) ? "|  <a class='action' href='delete/".$p_key."' >delete</a> " : "";
                $action_edit = ($edit_link) ? "<a class='action' href='edit/".$p_key."' >edit</a> " : "";
                $actions = "<td>
                            ".$action_edit."
                            ".$action_delete."
                            ".$this->external_links."
                          </td>";
                
                if(substr_count($actions, "class='action'") < 2) { 
                   $actions = str_replace("|","",$actions);
                }
                          
                $data .= $actions;
            }
            
            $data .= "</tr>";
        } 
        
        
        
        return $data;
    }
    
    public function create_link($link,$name){
        $this->external_links = "| <a class='action' href='".$link."'>".$name."</a>" ;
    }
}


