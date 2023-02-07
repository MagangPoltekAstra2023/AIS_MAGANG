<aside class="right-side">
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('index.php/basis/home_c/') ?>"><span>Home</span></a></li>
            <li> <a href="#"><strong>Manage WI</strong></a></li>
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
                        <span class="grid-title"><strong>WI</strong> TABLE</span>
                        <div class="pull-right">
                            <a href="<?php echo base_url('samara/master_wi_c/create_wi/') ?>"  class="btn btn-default" data-placement="left" data-toggle="tooltip" title="Create wi" style="height:30px;font-size:13px;width:100px;">Create</a>
                        </div>
                    </div>
                    <div class="grid-body">
                        
                        <table id="dataTables1" class="table table-striped table-condensed table-hover display" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>WI Group</th>
                                    <th>WI Code</th>
                                    <th>WI Name</th>
                                    <th>WI Type</th>
                                    <th>Type</th>
                                    <th>Spare Part</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($data as $key => $isi) {
                                    echo "<tr class='gradeX'>";
                                    echo "<td>$i</td>";
                                    echo "<td>$isi->CHR_WI_GROUP</td>";
                                    echo "<td>$isi->CHR_WI_CODE</td>";
                                    echo "<td>$isi->CHR_WI_NAME</td>";
                                    echo "<td>$isi->CHR_WI_TYPE</td>";
                                    echo "<td>$isi->CHR_TYPE</td>";
                                    
                                    ?>
                                <td>
                                    <?php foreach ($spare_parts as $key => $sp) { 
                                        if($sp->INT_ID==$isi->INT_ID_PART) echo $sp->CHR_SPARE_PART_NAME;
                                    } ?>
                                </td>
                                <td>
                                    <a href="<?php echo base_url('samara/master_wi_c/edit_wi') . "/" . $isi->INT_ID;  ?>" class="label label-warning" data-placement="top" data-toggle="tooltip" title="Edit"><span class="fa fa-pencil"></span></a>                                      
                                    <?php if($isi->INT_FLG_DEL == 0){ ?>
                                        <a href="<?php echo base_url('samara/master_wi_c/delete_wi') . "/" . $isi->INT_ID; ?>" class="label label-danger" data-placement="right" data-toggle="tooltip" title="Delete" onclick="return confirm('Are you sure want to disable this WI?');"><span class="fa fa-times"></span></a>
                                    <?php } else { ?>
                                        <a href="<?php echo base_url('samara/master_wi_c/enable_wi') . "/" . $isi->INT_ID;  ?>" class="label label-success" data-placement="left" data-toggle="tooltip" title="Enable"><span class="fa fa-check"></span></a>
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