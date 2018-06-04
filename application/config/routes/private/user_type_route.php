<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['admin/users/user_type/list'] = 'private/User_Type/index';
$route['admin/users/user_type/add'] = 'private/User_Type/add';
$route['admin/users/user_type/edit/(:num)'] = 'private/User_Type/edit/$1';
$route['admin/users/user_type/delete/(:num)'] = 'private/User_Type/delete/$1';

