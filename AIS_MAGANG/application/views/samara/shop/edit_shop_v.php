<aside class="right-side">
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="<?php  echo base_url('basis/home_c/"') ?>">Home</a></li>
            <li><a href="<?php echo base_url('samara/master_shop_c/"') ?>">Manage Shop</a></li>            
            <li><a href="#"><strong>Edit Shop</strong></a></li>
        </ol>
    </section>

    <section class="content">
        <?php
        if (validation_errors()) {
            echo '<div class = "alert alert-danger"><strong>WARNING !</strong>' . validation_errors() . '</div >';
        }
        echo form_open('samara/master_shop_c/update_shop', 'class="form-horizontal"');
        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="grid">
                    <div class="grid-header">
                        <i class="fa fa-pencil"></i>
                        <span class="grid-title"><strong>EDIT</strong> SHOP</span>
                        <div class="pull-right grid-tools">
                            <a data-widget="collapse" title="Collapse"><i class="fa fa-chevron-up"></i></a>
                        </div>
                    </div>
                    <div class="grid-body">
                        <input name="INT_ID" class="form-control" required type="hidden" value="<?php echo $data->INT_ID; ?>">

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Plant</label>
                            <div class="col-sm-5">
                                <select name="INT_PLANT_ID" id="shop" class="form-control" style="width:400px" >                                
                                    <?php
                                    foreach ($data_plant as $isi) {
                                        ?>
                                        <option value="<?php echo $isi->INT_ID; ?>"
                                        <?php
                                        if($data->INT_PLANT_ID == $isi->INT_ID){
                                            echo ' selected';
                                        }
                                        ?>><?php echo $isi->CHR_PLANT_NAME; ?></option>
                                        <?php
                                    }
                                    ?> 
                                </select>
                            </div> 
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Shop Name</label>
                            <div class="col-sm-5">
                                <input name="CHR_SHOP_NAME" class="form-control" required type="text" style="width: 400px;" value="<?php echo $data->CHR_SHOP_NAME; ?>">
                            </div> 
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Shop Description</label>
                            <div class="col-sm-5">
                                <input name="CHR_SHOP_DESC" class="form-control" required type="text" style="width: 400px;" value="<?php echo $data->CHR_SHOP_DESC; ?>">
                            </div> 
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-5">
                                <div class="btn-group">
                                    <button type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="left" title="Update this data"><i class="fa fa-refresh"></i> Update</button>
                                    <?php echo anchor('samara/master_shop_c', 'Cancel', 'class="btn btn-default" data-toggle="tooltip" data-placement="right" title="Back to manage"'); 
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