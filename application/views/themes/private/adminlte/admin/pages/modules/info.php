<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                  <h3 class="box-title">List of Modules</h3>
                    <div class="box-tools">
                        <div style="width: 175px;">
                            <?=form_open('','class=input-group')?>
                                <input type="text" name="table_search" value="<?php echo set_value('table_search'); ?>"  class="form-control input-sm pull-right" placeholder="Search . . .">
                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            <?=form_close()?>
                        </div>
                    </div>
                </div>
                <div class="box-body ">
                    <?php if($this->session->flashdata('message')): ?>
                        <div class="col-sm-12">
                            <div class="alert alert-<?=$this->session->flashdata('notification_type')?> alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4><i class="icon fa fa-check"></i> Notification</h4>
                                <?=$this->session->flashdata('message')?>
                            </div>
                        </div>                                
                    <?php endif; ?>
                    <table class="datatable table table-bordered table-hover">
                        <thead>
                            <th width="10%" >Module ID</th>
                            <th width="15%">Serial Number</th>
                            <th>Name</th>
                            <th width="15%">Created By</th>
                            <th width="15%">Status</th>
                            <th width="15%" >Action</th>
                        </thead>
                        <tbody>
                            <?=$modules?>
                        </tbody>
                    </table>
                </div>
            </div>   
        </div>
    </div>
</section><!-- right col -->
     
        