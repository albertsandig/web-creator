<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['admin/users/list'] = 'private/Users/index';
$route['admin/users/add'] = 'private/Users/add';
$route['admin/users/edit/(:num)'] = 'private/Users/edit/$1';
$route['admin/users/save'] = 'private/Users/save';

