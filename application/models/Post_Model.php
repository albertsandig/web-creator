<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post_Model extends SUB_Model {

	function __construct(){
		parent::__construct();
	}
    
    public function executeCommand($action){
        switch($action){
            case 'create':
                $this->post->createPost(array(), "
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
                return $this->post->getAllPost("
                    SELECT A.*,B.*,C.*
                    FROM post AS A
                    INNER JOIN status AS B
                        USING (status_no)
                    INNER JOIN category AS C
                        USING (category_no);
                ");
            break;
            case 'retrieve':
                return $this->post->getPost(array('1'),"
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