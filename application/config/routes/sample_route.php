<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
    In creating route, you must follow the these steps :
    1. Choose a folder where you will be use your route
        a. Private - can be shown to only those who have accounts
        b. Public - anyone can access
    2. Create your own file yourRouterName_route.php
    
    Example: 
        
        Create route for user management system for admin.
        
        1. Copy this file and rename into yourRouterName_route.php
        2. Transfer this file to private folder
        3. Open the file xampp/htdocs/web_creator/config/routes.php
           and insert the following below the private word:
                
            require 'routes/private/yourRouterName_route.php';
        
    Basic undestanding in route
    
    $route[ControllerName/functionName] = private/ControllerName/functionName;
    
    Follow this convention if in private : 
    
    $route['admin/ControllerName/functionName'] = private/ControllerName/functionName;
*/

$route['admin/profile'] = 'private/profile/info';
