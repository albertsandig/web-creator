<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post_Model extends SUB_Model {
    
    private $ci;
    
	function __construct(){
		parent::__construct();
        $this->ci =& get_instance();
	}
    
    public function executeCommand($action){
       
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
    }
}