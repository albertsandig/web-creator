<!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                <img onerror="this.src='<?php echo base_url('assets/adminlte/dist/img/avatar6.png'); ?>';"  src="<?=$this->session->userdata('profile_pic')?>" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                <p><?=$this->session->userdata('name')?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- search form
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
                </div>
            </form> -->
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="header">MAIN NAVIGATION</li>
                <?php if(access_level_view('ADMIN_ACCESS')) :?>
                    <li class="treeview <?=($this->uri->segment(2) == "users") ? 'active' : '' ?>">
                        <a style="cursor: pointer" onclick="window.location.href='<?=base_url('admin/users/list')?>'">
                            <i class="fa fa-users"></i> <span>Users</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li class="<?=($this->uri->segment(3) == "add") ? 'active' : '' ?>" ><a href="<?=base_url('admin/users/add')?>"><i class="fa fa-user-plus"></i>Add User</a></li>
                            <li class="<?=($this->uri->segment(3) == "user_type") ? 'active' : '' ?>" >
                                <a style="cursor: pointer" onclick="window.location.href='<?=base_url('admin/users/user_type/list')?>'"><i class="fa fa-user-secret"></i>User Type<i class="fa fa-angle-left pull-right"></i></a>
                                <ul class="treeview-menu <?=($this->uri->segment(3) == "user_type") ? 'active' : '' ?>">
                                    <li class="<?=($this->uri->segment(4) == "add") ? 'active' : '' ?>" >
                                        <a href="#"><i class="fa fa-plus-circle"></i> Add Type</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                        </ul>
                    </li>
                    <li class="treeview <?=($this->uri->segment(2) == "modules") ? 'active' : '' ?>">
                        <a style="cursor: pointer" onclick="window.location.href='<?=base_url('admin/users/list')?>'">
                            <i class="fa fa-book"></i> <span>Modules</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li class="<?=($this->uri->segment(3) == "add") ? 'active' : '' ?>" ><a href="<?=base_url('admin/users/add')?>"><i class="fa fa-user-plus"></i>Add User</a></li>
                            <li class="<?=($this->uri->segment(3) == "user_type") ? 'active' : '' ?>" >
                                <a style="cursor: pointer" onclick="window.location.href='<?=base_url('admin/users/user_type/list')?>'"><i class="fa fa-user-secret"></i>User Type<i class="fa fa-angle-left pull-right"></i></a>
                                <ul class="treeview-menu <?=($this->uri->segment(3) == "user_type") ? 'active' : '' ?>">
                                    <li class="<?=($this->uri->segment(4) == "add") ? 'active' : '' ?>" >
                                        <a href="#"><i class="fa fa-plus-circle"></i> Add Type</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                        </ul>
                    </li>
                <?php endif; ?>
                
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-share"></i> <span>MODULES</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                        <li>
                        <a href="#"><i class="fa fa-circle-o"></i> Level One <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                            <li>
                            <a href="#"><i class="fa fa-circle-o"></i> Level Two <i class="fa fa-angle-left pull-right"></i></a>
                            <ul class="treeview-menu">
                                <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                                <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                            </ul>
                            </li>
                        </ul>
                        </li>
                        <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                    </ul>
                </li>
                <li><a href="documentation/index.html"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
                <li class="header">LABELS</li>
                <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
                
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
