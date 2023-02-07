<aside class="right-side">
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('index.php/basis/home_c/') ?>"><span>Home</span></a></li>
            <li> <a href="#"><strong>Manage Shop</strong></a></li>
        </ol>
    </section>

    <section class="content">
        <?php
        if ($msg != NULL) {
            echo $msg;
        }
        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="grid">
                    <div class="grid-header">
                        <i class="fa fa-th-large"></i>
                        <span class="grid-title"><strong>SHOP</strong> TABLE</span>
                        <div class="pull-right">
                            <a href="<?php echo base_url('samara/master_shop_c/create_shop/') ?>"  class="btn btn-default" data-placement="left" data-toggle="tooltip" title="Create shop" style="height:30px;font-size:13px;width:100px;">Create</a>
                        </div>
                    </div>
                    <div class="grid-body">
                        
                        <table id="dataTables1" class="table table-striped table-condensed table-hover display" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Plant</th>
                                    <th>Shop Name</th>
                                    <th>Shop Description</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($data as $key => $isi) {
                                    echo "<tr class='gradeX'>";
                                    echo "<td>$i</td>";
                                    ?>
                                <td>
                                    <?php foreach ($plant as $key => $pl) { 
                                        if($pl->INT_ID == $isi->INT_ID_PLANT) echo $pl->CHR_PLANT_NAME;
                                    } ?>
                                </td>
                                <?php 
                                    echo "<td>$isi->CHR_SHOP_NAME</td>";
                                    echo "<td>$isi->CHR_SHOP_DESC</td>";
                                ?>
                                <td>
                                    <a href="<?php echo base_url('samara/master_shop_c/edit_shop') . "/" . $isi->INT_ID;  ?>" class="label label-warning" data-placement="top" data-toggle="tooltip" title="Edit"><span class="fa fa-pencil"></span></a>                                      
                                    <a href="<?php echo base_url('samara/master_shop_c/delete_shop') . "/" . $isi->INT_ID; ?>" class="label label-danger" data-placement="right" data-toggle="tooltip" title="Delete" onclick="return confirm('Are you sure want to delete this shop?');"><span class="fa fa-times"></span></a>                    
                                </td>
                                </tr>
                                <?php
                                $i++;
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </section>
</aside>