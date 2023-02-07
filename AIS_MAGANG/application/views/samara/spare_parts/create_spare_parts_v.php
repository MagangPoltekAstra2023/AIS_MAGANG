<aside class="right-side">
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('basis/home_c/') ?>">Home</a></li>
            <li><a href="<?php echo base_url('samara/master_spare_parts_c/') ?>">Manage Spare Parts</a></li>
            <li><a href="#"><strong>Create New Spare Parts</strong></a></li>
        </ol>
    </section>

    <section class="content">
        <?php
        if (validation_errors()) {
            echo '<div class = "alert alert-danger"><strong>WARNING !</strong>' . validation_errors() . '</div >';
        }
        echo form_open('samara/master_spare_parts_c/save_spare_parts', 'class="form-horizontal"');
        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="grid">
                    <div class="grid-header">
                        <i class="fa fa-certificate"></i>
                        <span class="grid-title"><strong>CREATE</strong> NEW SPARE PARTS </span>
                        <div class="pull-right grid-tools">
                            <a data-widget="collapse" title="Collapse"><i class="fa fa-chevron-up"></i></a>
                        </div>
                    </div>
                    <div class="grid-body">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Part No</label>
                            <div class="col-sm-5">
                                <input name="CHR_PART_NO" autofocus class="form-control" maxlength="15" required type="text" style="width: 140px;text-transform: uppercase;">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Spare Part Name</label>
                            <div class="col-sm-5">
                                <input name="CHR_SPARE_PART_NAME" class="form-control" required type="text" style="width: 400px;text-transform: uppercase;" value="">
                            </div> 
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Component</label>
                            <div class="col-sm-5">
                                <input name="CHR_COMPONENT" class="form-control" maxlength="3" required type="text" style="width: 60px;text-transform: uppercase;" value="">
                            </div> 
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Model</label>
                            <div class="col-sm-1">
                                <input name="CHR_MODEL" class="form-control" required maxlength="10" type="text" style="width: 140px;text-transform: uppercase;" value="">
                            </div> 
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Back No</label>
                            <div class="col-sm-5">
                                <input name="CHR_BACK_NO" class="form-control" required maxlength="10" type="text" style="width: 140px;text-transform: uppercase;" value="">
                            </div> 
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Type</label>
                            <div class="col-sm-5">
                                <input name="CHR_TYPE" class="form-control" required maxlength="1" type="text" style="width: 60px;text-transform: uppercase;" value="">
                            </div> 
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Spesification</label>
                            <div class="col-sm-5">
                                <input name="CHR_SPESIFICATION" class="form-control" required type="text" style="width: 400px;text-transform: uppercase;" value="">
                            </div> 
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-5">
                                <div class="btn-group">
                                    <button type="submit" class="btn btn-primary" data-placement="left" data-toggle="tooltip" title="Save this data"><i class="fa fa-check"></i> Save</button>
                                    <?php echo anchor('samara/master_spare_parts_c', 'Cancel', 'class="btn btn-default" data-placement="right" data-toggle="tooltip" title="Back to manage"');
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