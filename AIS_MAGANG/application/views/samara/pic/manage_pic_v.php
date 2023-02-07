<aside class="right-side">
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('index.php/basis/home_c/') ?>"><span>Home</span></a></li>
            <li> <a href="#"><strong>Manage Line</strong></a></li>
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
                        <span class="grid-title"><strong>LINE</strong> TABLE</span>
                        <div class="pull-right">
                            <a href="<?php echo base_url('samara/master_line_c/create_line/') ?>"  class="btn btn-default" data-placement="left" data-toggle="tooltip" title="Create Line" style="height:30px;font-size:13px;width:100px;">Create</a>
                        </div>
                    </div>
                    <div class="grid-body">
                        
                        <table id="dataTables1" class="table table-striped table-condensed table-hover display" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th style="text-align:center;">No</th>
                                    <th style="text-align:center;">Shop</th>
                                    <th style="text-align:center;">Line Name</th>
                                    <th style="text-align:center;">Line Description</th>
                                    <th style="text-align:center;">Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($data as $isi) {
                                    echo "<tr class='gradeX'>";
                                    echo "<td>$i</td>";
                                ?>
                                <td>
                                    <?php foreach ($shop as $key => $sp) { 
                                        if($sp->INT_ID==$isi->INT_SHOP_ID) echo $sp->CHR_SHOP_NAME;
                                    } ?>
                                </td>
                                <?php
                                    echo "<td>$isi->CHR_LINE_NAME</td>";
                                    echo "<td>$isi->CHR_LINE_DESC</td>";
                                ?>
                                <td style="text-align:center;">
                                    <a href="<?php echo base_url('samara/master_line_c/edit_line') . "/" . $isi->INT_ID;  ?>" class="label label-warning" data-placement="top" data-toggle="tooltip" title="Edit"><span class="fa fa-pencil"></span></a>                                      
                                    <a href="<?php echo base_url('samara/master_line_c/delete_line') . "/" . $isi->INT_ID; ?>" class="label label-danger" data-placement="right" data-toggle="tooltip" title="Delete" onclick="return confirm('Are you sure want to delete this line?');"><span class="fa fa-times"></span></a>
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