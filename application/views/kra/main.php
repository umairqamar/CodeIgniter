<?php include(VIEWPATH."_header.php") ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12" >

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">View KRA</h3>
                </div>
                <div class="panel-body">
                    <?php
                    $message = $this->session->flashdata('message');
                    $error = $this->session->flashdata('error');
                    if (isset($message)){ ?>
                        <div style="text-align:center;" class="alert alert-success" role="alert">
                            <span class="glyphicon glyphicon-exclamation-sign"></span>
                            <?php echo $message;?>
                            <button type="button" class="close" data-dismiss="alert">x</button>
                        </div>
                        <?php
                    }

                    else if (isset($error)){ ?>
                        <div style="text-align:center;" class="alert alert-danger" role="alert">
                            <span class="glyphicon glyphicon-exclamation-sign"></span>
                            <?php echo $error; ?>
                            <button type="button" class="close" data-dismiss="alert">x</button>
                        </div>
                        <?php
                    }
                    ?>

                    <label>Choose KRA: </label>

                    <div class="btn-group">
                        <!-- Single button -->
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Select KRA <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <?php
                                if ($kra->result_id->num_rows >0){
                                    foreach ($kra->result() as $k) { ?>
                                        <li><a href="<?php echo site_url("/form/view_kra/".$k->kra_id) ?>"><?php echo $k->code?></a></li>
                                        <?php
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                    </div>



                    <?php if($this->uri->segment(3) && is_numeric($this->uri->segment(3)) && !is_null($this->uri->segment(3))){ ?>

                        <?php if($kra_detail->result_id->num_rows > 0){ ?>
                            <h4><?php echo $kra_detail->result()['0']->code;?></h4>
                            <p class="help-block"><?php echo $kra_detail->result()['0']->description;?></p>
                            <table class="table table-striped">

                            <?php
                            foreach($kra_detail->result() as $u){ ?>
                                <tr>
                                    <td><?php echo $u->kpi_description;?></td>
                                    <td><?php echo get_type($u->type);?></td>
                                    <td><?php echo $u->level;?></td>
                                    <td><?php echo $u->num;?></td>
                                    <td><?php echo $u->denom;?></td>
                                    <td>
                                        <a href="<?php echo site_url("/form/delete_kpi_kra/".$u->kra_id."/".$u->kpi_id); ?>" onclick="return confirm('Are you sure you want to delete this KPI?')"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Delete</a>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                            <?php
                        } ?>

                        </tbody>
                        </table>

                        </div>
                        <div class="panel-footer">
                            <div class="text-center">
                                <div class="btn-group" role="group" >
                                    <a href="<?php echo site_url("/form/add_kra/")?>" type="button" class="btn btn-default"><i class="fa fa-plus" aria-hidden="true"></i> Add KRA</a>
                                    <a href="<?php echo site_url("/form/add_kra_category/")?>" type="button" class="btn btn-default"><i class="fa fa-plus" aria-hidden="true"></i> Add Category</a>
                                    <a href="<?php echo site_url("/form/edit_kra/".$kra_detail->result()['0']->kra_id)?>" type="button" class="btn btn-default"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                                    <a href="<?php echo site_url("/form/delete_kra/".$kra_detail->result()['0']->kra_id)?>" type="button" class="btn btn-default" onclick="return confirm('Are you sure you want to delete this KRA?')"><i class="fa fa-times" aria-hidden="true"></i> Delete</a>
                                </div>
                            </div>
                        </div>

                        <?php
                    }else{ ?>
                            </div>
                            <div class="panel-footer">
                                <div class="text-center">
                                    <div class="btn-group" role="group" >
                                        <a href="<?php echo site_url("/form/add_kra/")?>" type="button" class="btn btn-default"><i class="fa fa-plus" aria-hidden="true"></i> Add KRA</a>
                                        <a href="<?php echo site_url("/form/add_kra_category/")?>" type="button" class="btn btn-default"><i class="fa fa-plus" aria-hidden="true"></i> Add Category</a>
                                    </div>
                                </div>
                            </div>
                        <?php
                    }
                        ?>


            </div>
        </div>
    </div>


    <?php include(VIEWPATH."_footer.php") ?>
