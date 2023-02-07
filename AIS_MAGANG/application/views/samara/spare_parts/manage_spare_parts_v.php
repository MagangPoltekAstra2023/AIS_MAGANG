<aside class="right-side">
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('basis/home_c/') ?>"><span>Home</span></a></li>
            <li> <a href="#"><strong>Manage Spare Parts</strong></a></li>
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
                        <span class="grid-title"><strong>SPARE PARTS</strong> TABLE</span>
                        <div class="pull-right">
                            <a href="<?php echo base_url('samara/master_spare_parts_c/create_spare_parts/') ?>"  class="btn btn-default" data-placement="left" data-toggle="tooltip" title="Create Spare Parts" style="height:30px;font-size:13px;width:100px;">Create</a>
                        </div>
                    </div>
                    <div class="grid-body">
                        
                        <table id="dataTables1" class="table table-striped table-condensed table-hover display" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Part No</th>
                                    <th>Spare Part Name</th>
                                    <th>Component</th>
                                    <th>Model</th>
                                    <th>Back No</th>
                                    <th>Type</th>
                                    <th>Spesification</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($data as $isi) {
                                    echo "<tr class='gradeX'>";
                                    echo "<td>$i</td>";
                                    echo "<td>$isi->CHR_PART_NO</td>";
                                    echo "<td>$isi->CHR_SPARE_PART_NAME</td>";
                                    echo "<td>$isi->CHR_COMPONENT</td>";
                                    echo "<td>$isi->CHR_MODEL</td>";
                                    echo "<td>$isi->CHR_BACK_NO</td>";
                                    echo "<td>$isi->CHR_TYPE</td>";
                                    echo "<td>$isi->CHR_SPESIFICATION</td>";
                                    
                                    ?>
                                <td>
                                    <a href="<?php echo base_url('samara/master_spare_parts_c/edit_spare_parts') . "/" . $isi->INT_ID;  ?>" class="label label-warning" data-placement="top" data-toggle="tooltip" title="Edit"><span class="fa fa-pencil"></span></a>                                      
                                    <?php if($isi->INT_FLG_DEL == 0){ ?>
                                        <a href="<?php echo base_url('samara/master_spare_parts_c/delete_spare_parts') . "/" . $isi->INT_ID; ?>" class="label label-danger" data-placement="right" data-toggle="tooltip" title="Delete" onclick="return confirm('Are you sure want to disable this machine?');"><span class="fa fa-times"></span></a>
                                    <?php } else { ?>
                                        <a href="<?php echo base_url('samara/master_spare_parts_c/enable_spare_parts') . "/" . $isi->INT_ID;  ?>" class="label label-success" data-placement="left" data-toggle="tooltip" title="Enable"><span class="fa fa-check"></span></a>
                                    <?php } ?>                                    
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