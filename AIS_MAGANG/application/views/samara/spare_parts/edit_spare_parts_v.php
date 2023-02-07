<aside class="right-side">
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="<?php  echo base_url('basis/home_c/"') ?>">Home</a></li>
            <li><a href="<?php echo base_url('samara/master_spare_parts_c/"') ?>">Manage Spare Parts</a></li>            
            <li><a href="#"><strong>Edit Spare Parts</strong></a></li>
        </ol>
    </section>

    <section class="content">
        <?php
        if (validation_errors()) {
            echo '<div class = "alert alert-danger"><strong>WARNING !</strong>' . validation_errors() . '</div >';
        }
        echo form_open('samara/master_spare_parts_c/update_spare_parts', 'class="form-horizontal"');
        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="grid">
                    <div class="grid-header">
                        <i class="fa fa-pencil"></i>
                        <span class="grid-title"><strong>EDIT</strong> SPARE PARTS</span>
                        <div class="pull-right grid-tools">
                            <a data-widget="collapse" title="Collapse"><i class="fa fa-chevron-up"></i></a>
                        </div>
                    </div>
                    <div class="grid-body">
                        <input name="INT_ID" class="form-control" required type="hidden" value="<?php echo $data->INT_ID; ?>">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Part No</label>
                            <div class="col-sm-5">
                                <input name="CHR_PART_NO" autofocus class="form-control" maxlength="15" required type="text" style="width: 140px;text-transform: uppercase;" value="<?php echo trim($data->CHR_PART_NO); ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Spare Part Name</label>
                            <div class="col-sm-5">
                                <input name="CHR_SPARE_PART_NAME" class="form-control" required type="text" style="width: 400px;text-transform: uppercase;" value="<?php echo trim($data->CHR_SPARE_PART_NAME); ?>">
                            </div> 
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Component</label>
                            <div class="col-sm-5">
                                <input name="CHR_COMPONENT" class="form-control" maxlength="3" required type="text" style="width: 60px;text-transform: uppercase;" value="<?php echo trim($data->CHR_COMPONENT); ?>">
                            </div> 
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Model</label>
                            <div class="col-sm-1">
                                <input name="CHR_MODEL" class="form-control" required maxlength="10" type="text" style="width: 140px;text-transform: uppercase;" value="<?php echo trim($data->CHR_MODEL); ?>">
                            </div> 
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Back No</label>
                            <div class="col-sm-5">
                                <input name="CHR_BACK_NO" class="form-control" required maxlength="10" type="text" style="width: 140px;text-transform: uppercase;" value="<?php echo trim($data->CHR_BACK_NO); ?>">
                            </div> 
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Type</label>
                            <div class="col-sm-5">
                                <input name="CHR_TYPE" class="form-control" required maxlength="1" type="text" style="width: 60px;text-transform: uppercase;" value="<?php echo trim($data->CHR_TYPE); ?>">
                            </div> 
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Spesification</label>
                            <div class="col-sm-5">
                                <input name="CHR_SPESIFICATION" class="form-control" required type="text" style="width: 400px;text-transform: uppercase;" value="<?php echo trim($data->CHR_SPESIFICATION); ?>">
                            </div> 
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-5">
                                <div class="btn-group">
                                    <button type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="left" title="Update this data"><i class="fa fa-refresh"></i> Update</button>
                                    <?php echo anchor('samara/master_spare_parts_c', 'Cancel', 'class="btn btn-default" data-toggle="tooltip" data-placement="right" title="Back to manage"'); 
                                    echo form_close();
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
</aside>