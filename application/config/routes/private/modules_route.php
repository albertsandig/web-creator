<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['admin/modules/list'] = 'private/Modules/index';
$route['admin/modules/add'] = 'private/Modules/add';
$route['admin/modules/edit/(:num)'] = 'private/Modules/edit/$1';
$route['admin/modules/delete/(:num)'] = 'private/Modules/delete/$1';
$route['admin/modules/view/(:num)'] = 'private/Modules/view/$1';
$route['admin/modules/switch_module/(:num)'] = 'private/Modules/activate/$1';
$route['admin/modules/save'] = 'private/Modules/save';
