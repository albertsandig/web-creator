<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post_Model extends SUB_Model {
    
    private $ci;
    
	function __construct(){
		parent::__construct();
        $this->ci =& get_instance();
	}
    
	public function test(){
		echo 'test';
	
	}
	
    public function get_post($search_val)
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
    
	
    public function executeCommand($action){
       /*
        switch($action){
            case 'create':
                $this->post_lib->createPost(array(), "
                    INSERT INTO post(    
                        title,		    
                        content, 		
                        status_no,        
                        user_no	,		
                        category_no		
                    ) VALUES (
                        'test',
                        'test',
                        1,
                        1,
                        1
                    )
                ");
                break;
            case 'update':
                break;
            case 'delete':
                break;
            case 'retrieveAll':
                return $this->post_lib->getAllPost("
                    SELECT A.*,B.*,C.*
                    FROM post AS A
                    INNER JOIN status AS B
                        USING (status_no)
                    INNER JOIN category AS C
                        USING (category_no);
                ");
                break;
            case 'retrieve':
                return $this->post_lib->getPost(array('1'),"
                    SELECT A.*,B.*,C.*
                    FROM post AS A
                    INNER JOIN status AS B
                        USING (status_no)
                    INNER JOIN category AS C
                        USING (category_no)
                    WHERE A.post_no = ? 
                ");
                break;
        }
		*/
    }
}