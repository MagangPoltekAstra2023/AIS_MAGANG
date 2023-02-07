<aside class="right-side">
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('index.php/basis/home_c/') ?>"><span>Home</span></a></li>
            <li> <a href="#"><strong>Manage Component</strong></a></li>
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
                        <span class="grid-title"><strong>COMPONENT</strong> TABLE</span>
                        <div class="pull-right">
                            <a href="<?php echo base_url('samara/master_component_c/create_component/') ?>"  class="btn btn-default" data-placement="left" data-toggle="tooltip" title="Create Component" style="height:30px;font-size:13px;width:100px;">Create</a>
                        </div>
                    </div>
                    <div class="grid-body">
                        
                        <table id="dataTables1" class="table table-striped table-condensed table-hover display" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th style="text-align:center;">No</th>
                                    <th style="text-align:center;">Line</th>
                                    <th style="text-align:center;">Component Name</th>
                                    <th style="text-align:center;">Component Description</th>
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
                                    <?php foreach ($line as $key => $ln) { 
                                        if($ln->INT_ID==$isi->INT_LINE_ID) echo $ln->CHR_LINE_NAME;
                                    } ?>
                                </td>
                                <?php
                                    echo "<td>$isi->CHR_COMPONENT_NAME</td>";
                                    echo "<td>$isi->CHR_COMPONENT_DESC</td>";
                                ?>
                                <td style="text-align:center;">
                                    <a href="<?php echo base_url('samara/master_component_c/edit_component') . "/" . $isi->INT_ID;  ?>" class="label label-warning" data-placement="top" data-toggle="tooltip" title="Edit"><span class="fa fa-pencil"></span></a>                                      
                                    <a href="<?php echo base_url('samara/master_component_c/delete_component') . "/" . $isi->INT_ID; ?>" class="label label-danger" data-placement="right" data-toggle="tooltip" title="Delete" onclick="return confirm('Are you sure want to disable this component?');"><span class="fa fa-times"></span></a>                                 
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