<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                  <h3 class="box-title">List of Users</h3>
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
                    <table class="datatable table table-bordered table-hover">
                        <thead>
                            <th width="10%" >User ID</th>
                            <th>Name</th>
                            <th width="20%" >Type</th>
                            <th width="20%" >Status</th>
                            <th width="15%" >Date Created</th>
                            <th width="15%" >Action</th>
                        </thead>
                        <tbody>
                            <?=$users?>
                        </tbody>
                    </table>
                </div>
            </div>   
        </div>
    </div>
</section><!-- right col -->
     
        