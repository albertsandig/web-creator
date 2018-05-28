<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
        <?=(isset($c_header)) ? $c_header : 'Default'?>
    </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    
    <?php 	
		if(isset($css)):
			echo $css; 
		endif;
	?>
	 
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
    <body class="skin-blue fixed sidebar-mini sidebar-mini-expand-feature">
        <div class="wrapper">
            <header class="main-header">
                <!-- Logo -->
                <a href="index2.html" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>A</b>LT</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>Web</b>CREATOR</span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    </a>
                    <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less -->
                        <li class="dropdown messages-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-envelope-o"></i>
                            <span class="label label-success">4</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 4 messages</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <!-- start message -->
                                    <li>
                                        <a href="#">
                                        <div class="pull-left">
                                            <img onerror="this.src='<?php echo base_url('assets/adminlte/dist/img/avatar6.png'); ?>';"  src="<?=$this->session->userdata('profile_pic')?>" class="user-image" alt="User Image">
                                        </div>
                                        <h4>
                                        Support Team
                                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                        </h4>
                                        <p>Why not buy a new awesome theme?</p>
                                    </a>
                                    </li>
                                    <!-- end message -->
                                    <li>
                                    <a href="#">
                                        <div class="pull-left">
                                        <img onerror="this.src='<?php echo base_url('assets/adminlte/dist/img/avatar6.png'); ?>';"  src="<?=$this->session->userdata('profile_pic')?>" class="img-circle" alt="User Image">
                                        </div>
                                        <h4>
                                        AdminLTE Design Team
                                        <small><i class="fa fa-clock-o"></i> 2 hours</small>
                                        </h4>
                                        <p>Why not buy a new awesome theme?</p>
                                    </a>
                                    </li>
                                    <li>
                                    <a href="#">
                                        <div class="pull-left">
                                        <img onerror="this.src='<?php echo base_url('assets/adminlte/dist/img/avatar6.png'); ?>';"  src="<?=$this->session->userdata('profile_pic')?>" class="img-circle" alt="User Image">
                                        </div>
                                        <h4>
                                        Developers
                                        <small><i class="fa fa-clock-o"></i> Today</small>
                                        </h4>
                                        <p>Why not buy a new awesome theme?</p>
                                    </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer"><a href="#">See All Messages</a></li>
                        </ul>
                        </li>
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img onerror="this.src='<?php echo base_url('assets/adminlte/dist/img/avatar6.png'); ?>';"  src="<?=$this->session->userdata('profile_pic')?>" class="user-image" alt="User Image">
                            <span class="hidden-xs"><?=$this->session->userdata('name')?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                            <img onerror="this.src='<?php echo base_url('assets/adminlte/dist/img/avatar6.png'); ?>';"  src="<?=$this->session->userdata('profile_pic')?>" class="img-circle" alt="User Image">
                            <p>
                                <?=$this->session->userdata('name')?> - <?=$this->session->userdata('user_type')?> 
                                <small>Member since <?=$this->session->userdata('create_date')?></small>
                            </p>
                            </li>
                            <!-- Menu Body -->
                            <!-- 
                            <li class="user-body">
                            <div class="col-xs-4 text-center">
                                <a href="#">Followers</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">Sales</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">Friends</a>
                            </div>
                            </li>
                            -->
                            <!-- Menu Footer-->
                            <li class="user-footer">
                            <div class="pull-left">
                                <a href="<?=base_url('admin/profile')?>" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="<?=base_url('admin/logout')?>" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                            </li>
                        </ul>
                        </li>
                        <!-- Control Sidebar Toggle Button 
                        <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                        </li>
                        -->
                    </ul>
                    </div>
                </nav>
            </header>
            <!-- Content Wrapper. Contains page content -->
            <?php      
                if(isset($sidebar)){
                    $this->load->view($sidebar);
                }
            ?>
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                    <?=(isset($c_header)) ? $c_header : 'Default'?>
                    <small><?=(isset($sub_c_header)) ? $sub_c_header : ''?></small>
                    </h1>
                    
                    <?php 
                        bread_crumps('breadcrumb');
                    ?>
                </section>