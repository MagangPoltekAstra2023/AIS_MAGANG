<aside class="right-side">
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('basis/home_c/') ?>">Home</a></li>
            <li><a href="<?php echo base_url('samara/master_wi_c/') ?>">Manage WI</a></li>
            <li><a href="#"><strong>Create New WI</strong></a></li>
        </ol>
    </section>

    <section class="content">
        <?php
        if (validation_errors()) {
            echo '<div class = "alert alert-danger"><strong>WARNING !</strong>' . validation_errors() . '</div >';
        }
        echo form_open_multipart('samara/master_wi_c/save_wi', 'class="form-horizontal"');
        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="grid">
                    <div class="grid-header">
                        <i class="fa fa-certificate"></i>
                        <span class="grid-title"><strong>CREATE</strong> NEW WI </span>
                        <div class="pull-right grid-tools">
                            <a data-widget="collapse" title="Collapse"><i class="fa fa-chevron-up"></i></a>
                        </div>
                    </div>
                    <div class="grid-body">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">WI Group</label>
                            <div class="col-sm-5">
                                <input name="CHR_WI_GROUP" autofocus class="form-control" maxlength="15" required type="text" style="width: 80px;text-transform: uppercase;">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">WI Code</label>
                            <div class="col-sm-5">
                                <input name="CHR_WI_CODE" class="form-control" maxlength="20" required type="text" style="width: 400px;text-transform: uppercase;" value="">
                            </div> 
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">WI Name</label>
                            <div class="col-sm-5">
                                <input name="CHR_WI_NAME" class="form-control" required type="text" style="width: 400px;" value="">
                            </div> 
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">WI Type</label>
                            <div class="col-sm-5">
                                <input name="CHR_WI_TYPE" class="form-control" maxlength="15" required type="text" style="width: 400px;text-transform: uppercase;" value="">
                            </div> 
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Type</label>
                            <div class="col-sm-5">
                                <input name="CHR_TYPE" class="form-control" maxlength="1" required type="text" style="width: 80px;text-transform: uppercase;" value="">
                            </div> 
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Spare Part</label>
                            <div class="col-sm-5">
                                <select name="INT_ID_PART" id="spare_parts" class="form-control" style="width:400px">
                                    <?php
                                    foreach ($data_spare_parts as $isi) {
                                        ?>
                                        <option value="<?php echo $isi->INT_ID; ?>"><?php echo $isi->CHR_SPARE_PART_NAME; ?></option>
                                        <?php
                                    }
                                    ?> 
                                </select>
                            </div> 
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">File</label>
                            <div class="col-sm-5">
                                <input type="file" name="CHR_FILE_WI" class="form-control" id="import" style="width: 400px;"> 
                            </div> 
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-5">
                                <div class="btn-group">
                                    <button type="submit" class="btn btn-primary" data-placement="left" data-toggle="tooltip" title="Save this data"><i class="fa fa-check"></i> Save</button>
                                    <?php echo anchor('samara/master_wi_c', 'Cancel', 'class="btn btn-default" data-placement="right" data-toggle="tooltip" title="Back to manage"');
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