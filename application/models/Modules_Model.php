<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modules_Model extends SUB_Model
{
    private $table = 'modules';
    
    function __construct()
    {
      	parent::__construct();
    }
    
    public function get_modules($search_val)
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
                A.module_no,
                A.module_serial_no,
                A.name,
                CONCAT(B.firstname,' ',lastname) AS created_by
            FROM ".$this->table." AS A
            INNER JOIN user_info AS B
                ON A.created_by = B.user_no
            ".$condition."
            LIMIT 100;
        ",array ($search_val));
        
        return $query->result();
    }
    
    
    public function get_module($id)
    {
        $query = $this->db->query("
            SELECT 
                A.module_no as id,
                A.module_serial_no as serial_no,
                A.name
            FROM ".$this->table." AS A
            WHERE A.module_no = ?
        ",array ($id));
        
        return $query->row();
    }
    
    
    public function is_module_name_exist($name,$id = 0)
    {
        $query = $this->db->query("
            SELECT 
                count(A.module_no) AS is_exist
            FROM ".$this->table." AS A
            WHERE A.name = UPPER(?) AND A.module_no != ?
        ",array ($name,$id));
        
        return ($query->row()->is_exist > 0) ? true : false;
    }
    
    public function is_serial_no_exist($serial_no,$id = 0)
    {
        $query = $this->db->query("
            SELECT 
                count(A.module_no) AS is_exist
            FROM ".$this->table." AS A
            WHERE A.module_serial_no = ? AND A.module_no != ?
        ",array ($serial_no,$id));
        
        return ($query->row()->is_exist > 0) ? true : false;
    }
    
    
    
    public function insert()
    {
        $query = $this->db->query("
           INSERT INTO ".$this->table." (
                module_serial_no,
                name,
                created_by
           )
           VALUES
            (?,UPPER(?),?)
        ",array (
                $this->input->post('serial_no'),
                $this->input->post('name'),
                $this->session->userdata('user_no')
            )
        );
    }
    
    public function update()
    {
        $query = $this->db->query("
            UPDATE ".$this->table." 
            SET        
                name = UPPER(?) ,
                module_serial_no = ?
            WHERE module_no = ?
        ",array (
                $this->input->post('name'),
                $this->input->post('serial_no'),
                $this->input->post('id')
            )
        );
    }
    
    
    public function delete($id)
    {
        $query = $this->db->query("
            DELETE FROM ".$this->table." 
            WHERE module_no = ?
        ",array (
                $id
            )
        );
    }
    
}