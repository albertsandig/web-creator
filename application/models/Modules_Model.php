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
                CONCAT(B.firstname,' ',lastname) AS created_by,
				CASE
					WHEN ISNULL(C.user_no) THEN '<b style=\"color:green\" >ACTIVATE</b>'
					ELSE '<b style=\"color:red\" >DEACTIVATE</b>'
				END AS status
            FROM ".$this->table." AS A
            INNER JOIN user_info AS B
                ON A.created_by = B.user_no
			LEFT JOIN (
				SELECT module_serial_no,user_no
				FROM user_access_module
				WHERE user_no = ".$this->session->userdata('user_no')."
			) AS C
				USING(module_serial_no)
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
		$module = $this->get_module($id);
		
		$query = $this->db->query("
            SELECT 
                count(A.module_serial_no) AS is_exist
            FROM user_access_module AS A
            WHERE A.module_serial_no = ? 
        ",array ($module->serial_no));
	
		 $has_security = ($query->row()->is_exist > 0) ? true : false;
		 
		 if(!$has_security){
			$query = $this->db->query("
            DELETE FROM ".$this->table." 
            WHERE module_no = ?
			",array (
					$id
				)
			);
			
			return true;
		 } else {
			return false;
		 }
    }
	
	public function activate($serial_no)
    {
		
		$query = $this->db->query("
            SELECT 
                count(A.module_serial_no) AS is_exist
            FROM user_access_module AS A
            WHERE A.module_serial_no = ? AND A.user_no = ?
        ",array ($serial_no,$this->session->userdata('user_no')));
        
        $switch = ($query->row()->is_exist > 0) ? true : false;
		
		if($switch){
			$query = $this->db->query("
				DELETE FROM user_access_module
				WHERE module_serial_no = ? AND
					  user_no = ?
			",array (
					$serial_no,
					$this->session->userdata('user_no')
				)
			);
			
			return 'deactivated';
		} else {
			$query = $this->db->query("
				INSERT INTO user_access_module(
					module_serial_no,
					user_no
				) VALUES(?,?)
			",array (
					$serial_no,
					$this->session->userdata('user_no')
				)
			);
			
			return 'activated';
		}
    }
    
}