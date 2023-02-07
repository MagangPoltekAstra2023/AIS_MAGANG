<aside class="right-side">
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="<?php  echo base_url('basis/home_c/"') ?>">Home</a></li>
            <li><a href="<?php echo base_url('samara/master_line_c/"') ?>">Manage Line</a></li>            
            <li><a href="#"><strong>Edit Line</strong></a></li>
        </ol>
    </section>

    <section class="content">
        <?php
        if (validation_errors()) {
            echo '<div class = "alert alert-danger"><strong>WARNING !</strong>' . validation_errors() . '</div >';
        }
        echo form_open('samara/master_line_c/update_line', 'class="form-horizontal"');
        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="grid">
                    <div class="grid-header">
                        <i class="fa fa-pencil"></i>
                        <span class="grid-title"><strong>EDIT</strong> LINE</span>
                        <div class="pull-right grid-tools">
                            <a data-widget="collapse" title="Collapse"><i class="fa fa-chevron-up"></i></a>
                        </div>
                    </div>
                    <div class="grid-body">
                        <input name="INT_ID" class="form-control" required type="hidden" value="<?php echo $data->INT_ID; ?>">

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Shop</label>
                            <div class="col-sm-5">
                                <select name="INT_SHOP_ID" id="shop" class="form-control" style="width:400px" >                                
                                    <?php
                                    foreach ($data_shop as $isi) {
                                        ?>
                                        <option value="<?php echo $isi->INT_ID; ?>"
                                        <?php
                                        if($data->INT_SHOP_ID == $isi->INT_ID){
                                            echo ' selected';
                                        }
                                        ?>><?php echo $isi->CHR_SHOP_NAME; ?></option>
                                        <?php
                                    }
                                    ?> 
                                </select>
                            </div> 
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Line Name</label>
                            <div class="col-sm-5">
                                <input name="CHR_LINE_NAME" class="form-control" required type="text" style="width: 400px;" value="<?php echo $data->CHR_LINE_NAME; ?>">
                            </div> 
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Line Description</label>
                            <div class="col-sm-5">
                                <input name="CHR_LINE_DESC" class="form-control" required type="text" style="width: 400px;" value="<?php echo $data->CHR_LINE_DESC; ?>">
                            </div> 
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-5">
                                <div class="btn-group">
                                    <button type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="left" title="Update this data"><i class="fa fa-refresh"></i> Update</button>
                                    <?php echo anchor('samara/master_line_c', 'Cancel', 'class="btn btn-default" data-toggle="tooltip" data-placement="right" title="Back to manage"'); 
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