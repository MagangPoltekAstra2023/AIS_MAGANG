<aside class="right-side">
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('basis/home_c/') ?>">Home</a></li>
            <li><a href="<?php echo base_url('samara/master_shop_c/') ?>">Manage Shop</a></li>
            <li><a href="#"><strong>Create New Shop</strong></a></li>
        </ol>
    </section>

    <section class="content">
        <?php
        if (validation_errors()) {
            echo '<div class = "alert alert-danger"><strong>WARNING !</strong>' . validation_errors() . '</div >';
        }
        echo form_open('samara/master_shop_c/save_shop', 'class="form-horizontal"');
        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="grid">
                    <div class="grid-header">
                        <i class="fa fa-certificate"></i>
                        <span class="grid-title"><strong>CREATE</strong> NEW SHOP </span>
                        <div class="pull-right grid-tools">
                            <a data-widget="collapse" title="Collapse"><i class="fa fa-chevron-up"></i></a>
                        </div>
                    </div>

                    <div class="grid-body">
                        
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Plant</label>
                            <div class="col-sm-5">
                                <select name="INT_PLANT_ID" id="plant" class="form-control" style="width:400px">
                                    <?php
                                    foreach ($data_plant as $isi) {
                                        ?>
                                        <option value="<?php echo $isi->INT_ID; ?>"><?php echo $isi->CHR_PLANT_NAME; ?></option>
                                        <?php
                                    }
                                    ?> 
                                </select>
                            </div> 
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Shop Name</label>
                            <div class="col-sm-5">
                                <input name="CHR_SHOP_NAME" class="form-control" required type="text" style="width: 400px;" value="">
                            </div> 
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Shop Description</label>
                            <div class="col-sm-5">
                                <input name="CHR_SHOP_DESC" class="form-control" required type="text" style="width: 400px;" value="">
                            </div> 
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-5">
                                <div class="btn-group">
                                    <button type="submit" class="btn btn-primary" data-placement="left" data-toggle="tooltip" title="Save this data"><i class="fa fa-check"></i> Save</button>
                                    <?php echo anchor('samara/master_shop_c', 'Cancel', 'class="btn btn-default" data-placement="right" data-toggle="tooltip" title="Back to manage"');
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