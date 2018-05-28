<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Type_Model extends SUB_Model
{
    private $table = 'user_type';
    
    function __construct()
    {
      	parent::__construct();
    }
    
    public function get_user_types($search_val)
    {
        $condition = "";
        
        if($search_val != ""){
            $condition = "WHERE
                    MATCH(A.name)
                    AGAINST(? IN NATURAL LANGUAGE MODE)
            ";
        }
        
        $query = $this->db->query("
            SELECT 
                A.type_no,
                A.name
            FROM ".$this->table." AS A
            ".$condition."
            LIMIT 100;
        ",array ($search_val));
        
        return $query->result();
    }
    
    public function get_user_type($id)
    {
        $query = $this->db->query("
            SELECT 
                A.type_no as id,
                A.name
            FROM ".$this->table." AS A
            WHERE A.type_no = ?
        ",array ($id));
        
        return $query->row();
    }
    
    public function get_user_type_ui()
    {
        $query = $this->db->query("
            SELECT 
                A.type_no as id,
                A.name
            FROM ".$this->table."  AS A
        ");
        
        return $query->result();
    }
}