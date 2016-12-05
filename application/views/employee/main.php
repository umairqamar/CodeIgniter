<?php include(VIEWPATH."_header.php") ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12" >

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">View Employee</h3>
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

                    <label>Choose Employee: </label>

                    <div class="btn-group">
                        <!-- Single button -->
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Select Employee <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <?php
                                if ($employee->result_id->num_rows >0){
                                    foreach ($employee->result() as $k) { ?>
                                        <li><a href="<?php echo site_url("/form/view_employee/".$k->employee_id); ?>"> <?php echo $k->name;?></a></li>
                                        <?php
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                    </div>



                    <?php if($this->uri->segment(3) && is_numeric($this->uri->segment(3)) && !is_null($this->uri->segment(3))){ ?>
                        <?php if($detail->result_id->num_rows > 0){
                            $result = $detail->result()['0'];
                         ?>
                            <p>CNIC: <?php echo $result->cnic;?></p>
                            <p>Name: <?php echo $result->name;?></p>
                            <p>Father/Husband name: <?php echo $result->father_name;?></p>
                            <p>Cell: <?php echo $result->phone_cell;?></p>
                            <p>Landline: <?php echo $result->phone_land;?></p>
                            <p>Email: <?php echo $result->email;?></p>
                            <p>Date of Birth: <?php echo $result->dob;?></p>
                            <p>NTN(if any): <?php echo $result->ntn;?></p>
                            <p>Maritial Status: <?php echo maritial_status($result->maritial_status);?></p>
                            <p>Permanent Address: <?php echo $result->address_perm;?></p>
                            <p>Present Address: <?php echo $result->address_present;?></p>
                            <p>Emegency Contact: <?php echo $result->emergency_contact;?></p>


                            <p>Status: <?php echo $detail->result()['0']->is_active ==1 ? '<span class="label label-success">Active</span>' : '<span class="label label-default">Inactive</span>';?></p>

                            <table class="table table">
                            <?php
                            foreach($detail->result() as $u){ ?>
                                <tr>
                                    <td><a href="<?php echo site_url("form/view_kra/").$u->kra_id?>" target="_blank"><?php echo $u->code;?></a></td>
                                    <td><?php echo $u->description;?></td>
                                    <td>
                                        <a href="<?php echo site_url("/form/delete_kra_emp/".$u->employee_id."/".$u->kra_id); ?>" onclick="return confirm('Are you sure you want to delete this KRA from this Employee?')"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Delete</a>
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
                            <a href="<?php echo site_url("/form/add_employee/")?>" type="button" class="btn btn-default"><i class="fa fa-plus" aria-hidden="true"></i> Add </a>
                            <a href="<?php echo site_url("/form/edit_employee/".$detail->result()['0']->employee_id);?>" type="button" class="btn btn-default"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit </a>
                            <?php
                            if($detail->result()['0']->is_active ==1){ ?>
                                <a href="<?php echo site_url("/form/deactivate_employee/".$detail->result()['0']->employee_id);?>" type="button" class="btn btn-default"><i class="fa fa-user-times" aria-hidden="true"></i> Deactivate </a>
                            <?php
                            }else if ($detail->result()['0']->is_active == 0){ ?>
                                <a href="<?php echo site_url("/form/activate_employee/".$detail->result()['0']->employee_id);?>" type="button" class="btn btn-default"><i class="fa fa-user" aria-hidden="true"></i> Activate </a>
                            <?php
                            }
                            ?>
                            <a href="<?php echo site_url("/form/delete_employee/".$detail->result()['0']->employee_id);?>" type="button" class="btn btn-default" onclick="return confirm('Are you sure you want to delete this Employee?')"><i class="fa fa-times" aria-hidden="true"></i> Delete </a>
                        </div>
                    </div>
                </div>


                        <?php
                    }else{ ?>
                            </div>

                            <div class="panel-footer">
                                <div class="text-center">
                                    <div class="btn-group" role="group" >
                                        <a href="<?php echo site_url("/form/add_employee/")?>" type="button" class="btn btn-default"><i class="fa fa-plus" aria-hidden="true"></i> Add </a>
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
