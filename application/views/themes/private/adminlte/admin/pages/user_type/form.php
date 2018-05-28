<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
                <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">User Information Form</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <?=form_open('','class="form-horizontal" id="form_id"')?>
                    <input type="hidden" name="id" value="<?=set_input_value($user, 'user_no','0')?>" >
                    <div class="box-body">
                        <div class="row">    
                            <?php if(validation_errors() != false) : ?>
                                <div class="col-sm-12">
                                    <div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <h4><i class="icon fa fa-ban"></i> Error </h4>
                                        <ul>
                                        <?php echo validation_errors('<li>','</li>'); ?>
                                        </ul>
                                    </div>
                                </div>
                            <?php endif; ?>
                            
                            <?php if($this->session->flashdata('message')): ?>
                                <div class="col-sm-12">
                                    <div class="alert alert-success alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <h4><i class="icon fa fa-check"></i> Success!</h4>
                                        <?=$this->session->flashdata('message')?>
                                    </div>
                                </div>                                
                            <?php endif; ?>
                            <div class="form-group <?=(form_error('email') != '')? 'has-error': '' ?> col-sm-6">
                                <label class="col-sm-4 control-label">Email</label>
                                <div class="col-sm-8">
                                    <input name="email" type="email"  class="form-control" value="<?=set_input_value($user, 'email',set_value('email'))?>"  placeholder="Email">
                                </div>                                
                            </div>
                            <div class="form-group <?=(form_error('type_no') != '')? 'has-error': '' ?> col-sm-6">
                                <label class="col-sm-4 control-label">User Type</label>
                                <div class="col-sm-8">
                                    <?=get_type($user_type,'type_no' ,set_input_value($user, 'type_no'))?>
                                </div>
                            </div>
                            <?php if($this->uri->segment(3) == "add") : ?>
                                <div class="form-group  <?=(form_error('password') != '')? 'has-error': '' ?>  col-sm-6">
                                    <label class="col-sm-4 control-label">Password</label>
                                    <div class="col-sm-8">
                                        <input name="password" type="password"  class="form-control" value="<?=set_input_value($user, 'password')?>"  placeholder="Password">
                                    </div>
                                </div>
                                <div class="form-group <?=(form_error('confirm_password') != '')? 'has-error': '' ?> col-sm-6">
                                    <label class="col-sm-4 control-label">Confirm Password</label>
                                    <div class="col-sm-8">
                                        <input name="confirm_password" type="password"  class="form-control" value="<?=set_input_value($user, 'password')?>"  placeholder="Confirm Password">
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="form-group <?=(form_error('status') != '')? 'has-error': '' ?> col-sm-6">
                                <label class="col-sm-4  control-label">Status</label>
                                <div class="col-sm-8">
                                    <?=set_active('status',set_input_value($user, 'is_active','1'))?>
                                </div>
                            </div>
                            <div class="form-group <?=(form_error('img_source') != '')? 'has-error': '' ?> col-sm-6">
                                <label class="col-sm-4 control-label">Profile Image</label>
                                <div class="col-sm-8">
                                    <input name="img_source" type="url" class="form-control" value="<?=set_input_value($user, 'img_source',set_value('img_source'))?>" placeholder="http://yourimage.com/test.png">
                                </div>
                            </div>
                            <div class="form-group <?=(form_error('firstname') != '')? 'has-error': '' ?>  col-sm-6">
                                <label for="email_id" class="col-sm-4 control-label">First Name</label>
                                <div class="col-sm-8">
                                    <input name="firstname"  type="text" class="form-control" value="<?=set_input_value($user, 'firstname',set_value('firstname'))?>"placeholder="First name">
                                </div>
                            </div>
                            <div class="form-group <?=(form_error('lastname') != '')? 'has-error': '' ?> col-sm-6">
                                <label for="email_id" class="col-sm-4 control-label">Last Name</label>
                                <div class="col-sm-8">
                                    <input name="lastname" type="text" class="form-control" value="<?=set_input_value($user, 'lastname',set_value('lastname'))?>"  placeholder="Last name">
                                </div>
                            </div>
                            <div class="form-group  <?=(form_error('birthday') != '')? 'has-error': '' ?>  col-sm-6">
                                <label class="col-sm-4 control-label">Birthday</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                      <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                      </div>
                                      <input name="birthday" type="text" class="form-control" value="<?=set_input_value($user, 'birthday',set_value('birthday'))?>"  data-inputmask="'alias': 'yyyy-mm-dd'" data-mask="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group <?=(form_error('mobile_number') != '')? 'has-error': '' ?> col-sm-6">
                                <label for="email_id" class="col-sm-4 control-label">Mobile Number</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-mobile-phone"></i>
                                        </div>
                                        <input name="mobile_number"  type="text" class="form-control" value="<?=set_input_value($user, 'mobile_number',set_value('mobile_number'))?>" data-inputmask="'mask': ['09999999999']" data-mask="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group  <?=(form_error('address') != '')? 'has-error': '' ?>  col-sm-6">
                                <label class="col-sm-4 control-label">Address</label>
                                <div class="col-sm-8">
                                    <textarea name="address"  style="max-width:100%;min-height:50px;" class="form-control" rows="3" placeholder="Enter ..."><?=set_input_value($user, 'address',set_value('address'))?></textarea>
                                </div>
                            </div>
                            <div class="form-group <?=(form_error('gender') != '')? 'has-error': '' ?> col-sm-6">
                                <label for="test" class="col-sm-4 control-label">Gender</label>
                                <div class="col-sm-8">
                                    <div class="radio">
                                        <label>
                                          <input type="radio" name="gender" value="MALE" <?=set_radio_value(set_input_value($user, 'gender','MALE'),'MALE')?> >
                                          Male
                                        </label>
                                        <label>
                                          <input type="radio" name="gender" value="FEMALE"  <?=set_radio_value(set_input_value($user, 'gender'),'FEMALE')?>  >
                                          Female
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.box-body -->
                    <div class="box-footer" style="text-align:center;">
                        <button onclick="window.location.href='<?=base_url('admin/users/list')?>'" type="button" class="btn btn-default" >Cancel</button>
                        <button type="submit" class="btn btn-info">Save</button>
                    </div><!-- /.box-footer -->
                <?=form_close()?>
            </div><!-- /.box -->
        </div>
    </div>
</section><!-- right col -->
     
        