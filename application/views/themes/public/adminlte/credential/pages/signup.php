<div class="login-box">
    <div class="login-logo">
        <a href="../../index2.html"><b>Web</b>CREATOR</a>
    </div><!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to manage your website</p>
        
        <?php if($this->session->flashdata('message')) { ?>
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Error!</h4>
                    <?=$this->session->flashdata('message')?>
            </div>
        <?php } ?>
        <?php if($this->session->flashdata('warning')) { ?>
            <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-warning"></i> Warning!</h4>
                    <?=$this->session->flashdata('warning')?>
            </div>
        <?php } ?>
        <?php echo form_open(); ?>
            <div class="form-group <?=(form_error('email') != '')? 'has-error': '' ?>">
                <input name="email" type="text" value="<?php echo set_value('email'); ?>" class="form-control" placeholder="Email">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                <?php echo form_error('email','<span class="help-block">','</span>'); ?>
            </div>
            <div class="form-group <?=(form_error('password') != '')? 'has-error': '' ?>">
            <input name="password" type="password" value="<?php echo set_value('password'); ?>" class="form-control" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            <?php echo form_error('password','<span class="help-block">','</span>'); ?>
            </div>
            <div class="row">
            <div class="col-xs-8">
                <div class="checkbox icheck" >
                    <a href="#">I forgot my password</a><br>
                </div>
                <!-- 
                <div class="checkbox icheck">
                <label>
                    <input type="checkbox"> Remember Me
                </label>
                </div>
                -->
                
            </div><!-- /.col -->
            <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div><!-- /.col -->
            </div>
        <?php echo form_close(); ?>
        <!--
        <div class="social-auth-links text-center">
            <p>- OR -</p>
            <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using Facebook</a>
            <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using Google+</a>
        </div>
        <!-- /.social-auth-links -->
        <!--
        <a href="#">I forgot my password</a><br>
        <a href="register.html" class="text-center">Register a new membership</a> 
        -->

    </div><!-- /.login-box-body -->
</div><!-- /.login-box -->
