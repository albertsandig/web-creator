<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
                <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">User Type Form</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <?=form_open('','class="form-horizontal" id="form_id"')?>
                    <input type="hidden" name="id" value="<?=set_input_value($module, 'id','0')?>" >
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
                            <div class="form-group <?=(form_error('serial_no') != '')? 'has-error': '' ?> col-sm-12">
                                <label class="col-sm-3 col-sm-offset-2 control-label">Serial Number:</label>
                                <div class="col-sm-4">
                                    <input name="serial_no" type="text"  class="form-control" value="<?=set_input_value($module, 'serial_no',set_value('serial_no'))?>"  placeholder="Unique Serial No">
                                </div>                                
                            </div>
                            <div class="form-group <?=(form_error('name') != '')? 'has-error': '' ?> col-sm-12">
                                <label class="col-sm-3 col-sm-offset-2 control-label">Module Name:</label>
                                <div class="col-sm-4">
                                    <input name="name" type="text"  class="form-control" value="<?=set_input_value($module, 'name',set_value('name'))?>"  placeholder="Uniqe Name">
                                </div>                                
                            </div>
                        </div>
                    </div><!-- /.box-body -->
                    <div class="box-footer" style="text-align:center;">
                        <button onclick="window.location.href='<?=base_url('admin/modules/list')?>'" type="button" class="btn btn-default" >Cancel</button>
                        <button type="submit" class="btn btn-info">Save</button>
                    </div><!-- /.box-footer -->
                <?=form_close()?>
            </div><!-- /.box -->
        </div>
    </div>
</section><!-- right col -->
     
        