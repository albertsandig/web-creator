<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Model extends SUB_Model 
{
    
    private $table = 'user_info';
    
    /* Attribute */
    private $user_no;
          
    function __construct()
    {
      	parent::__construct();
        $this->user_no =  $this->session->userdata('user_no');
    }
    
    public function getInfo()
    {
        $query = $this->db->query("
            SELECT * FROM ".$this->table." WHERE user_no = ?;
        ",array(
            $this->user_no
        ));
        
        return $query->row();
    }
    
    public function getAttempt()
    {
        return $this->login_lib->get_login_attempt(array(
            $this->input->post('email')
        ), '
            SELECT 
                login_attempt,
                ip_address
            FROM user_info
            WHERE
                email = ?
        ');
    }
    
    public function recordAttempt($action)
    {
        if($action == 'attempt') {
            $this->login_lib->login_attempt(array(
                $_SERVER['SERVER_ADDR'],
                $this->input->post('email')
            ), '
                UPDATE user_info
                SET login_attempt = login_attempt + 1,
                    ip_address = ?
                WHERE email = ? 
            ');
        } else {
            $this->login_lib->login_attempt(array(
                $_SERVER['SERVER_ADDR'],
                $this->input->post('email')
            ), '
                UPDATE user_info
                SET login_attempt = 0,
                    ip_address = ?,
                    is_online = true
                WHERE email = ? 
            ');
        }
    }
    
	public function check_login()
	{
        $email = $this->input->post('email'); //albert.sandig1@gmail.com
        $password = $this->input->post('password'); //Machinedoll123
        
        $isLogin = $this->login_lib->login_user(
            array(
                $email,
                $password
            ),
            '
                SELECT 
                    A.user_no	,
                    A.email 	,
                    A.password ,
                    A.firstname,
                    A.lastname,
                    DATE_FORMAT(A.create_date, "%b. %Y" ) AS create_date,
                    A.img_source,
                    B.name AS user_type ,
                    A.is_active
                FROM user_info AS A
                INNER JOIN user_type AS B
                    USING (type_no)
                WHERE email = ? AND password = md5(?);
            '
        );
        
        return $isLogin;
	}
    
    public function user_logout(){
        $this->login_lib->logout(array(
            $this->user_no
        ),'
            UPDATE user_info
            SET 
                is_online = FALSE
            WHERE user_no = ? 
        ');
    }
    
    public function get_all_user($search_val)
    {
        $condition = "";
        
        if($search_val != ""){
            $condition = "WHERE
                    MATCH(A.firstname, A.lastname,A.email)
                    AGAINST(? IN NATURAL LANGUAGE MODE)
            ";
        }
        
        $query = $this->db->query("
            SELECT 
                A.user_no,
                CONCAT(A.firstname,' ',A.lastname) AS name,
                B.name AS type ,
                CASE WHEN A.is_active THEN 'ACTIVE' ELSE 'INACTIVE' END AS status ,
                DATE_FORMAT(create_date, '%M %d, %Y')  AS date
            FROM ".$this->table." AS A
            INNER JOIN user_type AS B
                USING (type_no)
            ".$condition."
            LIMIT 100;
        ",array ($search_val));
        
        return $query->result();
    }
    
    public function get_user($id)
    {
        
        $query = $this->db->query("
            SELECT 
                A.*,
                B.name AS type 
            FROM ".$this->table." AS A
            INNER JOIN user_type AS B
                USING (type_no)
            WHERE A.user_no = ?
        ",array ($id));
        
        return $query->row();
    }
    
    public function is_email_exist($email,$id = 0)
    {
        $query = $this->db->query("
            SELECT 
                count(A.user_no) AS is_exist
            FROM ".$this->table." AS A
            WHERE A.email = ? AND A.user_no != ?
        ",array ($email,$id));
        
        return ($query->row()->is_exist > 0) ? true : false;
    }
    
    public function insert()
    {
        $query = $this->db->query("
           INSERT INTO ".$this->table." (
                email 			,
                password 	    ,	
                type_no 		,
                is_active       ,
                firstname		,
                lastname		,
                birthday		,
                gender		    ,
                address		    ,
                mobile_number   
           )
           VALUES
            (?,md5(?),?,?,?,?,?,?,?)
        ",array (
                $this->input->post('email'),
                $this->input->post('password'),
                $this->input->post('type_no'),
                $this->input->post('status'),
                $this->input->post('firstname'),
                $this->input->post('lastname'),
                $this->input->post('birthday'),
                $this->input->post('gender'),
                $this->input->post('address'),
                $this->input->post('mobile_number')
            )
        );
    }
    
    public function update()
    {
        $query = $this->db->query("
            UPDATE ".$this->table." 
            SET
                email 			= ?,
                type_no 		= ?,
                is_active 		= ?,
                firstname		= ?,
                lastname		= ?,
                birthday		= ?,
                gender		    = ?,
                address		    = ?,
                mobile_number   = ?
            WHERE user_no = ?
        ",array (
                $this->input->post('email'),
                $this->input->post('type_no'),
                $this->input->post('status'),
                $this->input->post('firstname'),
                $this->input->post('lastname'),
                $this->input->post('birthday'),
                $this->input->post('gender'),
                $this->input->post('address'),
                $this->input->post('mobile_number'),
                $this->input->post('id')
            )
        );
    }
}