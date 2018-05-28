<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*  
    How to create controller
    1. Copy this file
    2. Rename this file into YourClass.php
    3. Make sure that your file name is the same name of the class
    4. Relocate your class file in one of the folder
        a. private - controllers that are used for admin or users
        b. public - controllers for public viewing 
    
    Notes : 
    1. index is the default function.
    2. Filename must start with big letter .
    3. Filename and Class name MUST be the same.
    
    
    How to access your controller
    1. First create a route for your controller
    2. Go to appliction/config/routes/your_route.php
    3. See example: in appliction/config/routes folder
*/


class Sample extends CI_Controller {

	function __construct(){
		parent::__construct();
       
	}
    
	public function index()
	{
       
	}
    
    public function yourFunction(){
        
    }
}
