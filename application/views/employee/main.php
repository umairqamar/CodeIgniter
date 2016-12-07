<?php include(VIEWPATH."_header.php") ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12" >


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
            <a href="<?php echo site_url("/form/add_employee/")?>" type="button" class="btn btn-default"><i class="fa fa-plus" aria-hidden="true"></i> Add Employee </a>

            <br><br>







            <?php if($this->uri->segment(3) && is_numeric($this->uri->segment(3)) && !is_null($this->uri->segment(3))){ ?>
                <?php if($detail->result_id->num_rows > 0){
                    $result = $detail->result()['0'];
                 ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Employee Personal Information</h3>
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
                    <h4><?php echo $result->name;?>  </h4>

                    <table class="table">
                       <tbody>
                        <tr>
                            <td>CNIC:</td>
                            <td><?php echo $result->cnic;?> </td>
                        </tr>
                        <tr>
                            <td>Father/Husband Name:</td>
                            <td><?php echo $result->father_name;?> </td>
                        </tr>
                        <tr>
                            <td>Cell:</td>
                            <td><?php echo $result->phone_cell;?> </td>
                        </tr>
                        <tr>
                            <td>Landline:</td>
                            <td><?php echo $result->phone_land;?> </td>
                        </tr>
                        <tr>
                            <td>Email:</td>
                            <td><?php echo $result->email;?> </td>
                        </tr>
                        <tr>
                            <td>Date of Birth:</td>
                            <td><?php echo date("F jS, Y", strtotime($result->dob));?> </td>
                        </tr>
                        <tr>
                            <td>NTN (if any):</td>
                            <td><?php echo $result->ntn;?> </td>
                        </tr>
                        <tr>
                            <td>Marital Status:</td>
                            <td><?php echo marital_status($result->marital_status);?> </td>
                        </tr>
                        <tr>
                            <td>Permanent Address:</td>
                            <td><?php echo $result->address_perm;?> </td>
                        </tr>
                        <tr>
                            <td>Present Address:</td>
                            <td><?php echo $result->address_present;?> </td>
                        </tr>
                        <tr>
                            <td>Emergency Contact:</td>
                            <td><?php echo $result->emergency_contact;?> </td>
                        </tr>
                        <tr>
                            <td>Status:</td>
                            <td><?php echo $result->is_active ==1 ? '<span class="label label-success">Active</span>' : '<span class="label label-default">Inactive</span>';?> </td>
                        </tr>
                       </tbody>
                    </table>

                           
                            <?php
                        } ?>

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



                <div class="panel panel-default">

                    <div class="panel-body">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#education">Education</a></li>
                            <li><a data-toggle="tab" href="#training">Training</a></li>
                            <li><a data-toggle="tab" href="#work">Work Experience</a></li>
                            <li><a data-toggle="tab" href="#eyecon">EYECON History</a></li>
                        </ul>

                        <div class="tab-content">
                            <div id="education" class="tab-pane fade in active">
                                <h3>Education</h3>
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Degree</th>
                                        <th>Institution</th>
                                        <th>City</th>
                                        <th>Year</th>
                                    </tr>
                                    </thead>
                                    <?php
                                    foreach($education->result() as $e){ ?>
                                        <tr>
                                            <td><?php echo $e->degree;?></td>
                                            <td><?php echo $e->institution;?></td>
                                            <td><?php echo $e->city;?></td>
                                            <td><?php echo $e->year;?></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </table>
                            </div>
                            <div id="training" class="tab-pane fade">
                                <h3>Training</h3>
                                <p>Some content in menu 1.</p>
                            </div>
                            <div id="work" class="tab-pane fade">
                                <h3>Work Experience</h3>
                                <p>Some content in menu 2.</p>
                            </div>
                            <div id="eyecon" class="tab-pane fade">
                                <h3>EYECON History</h3>
                                <p>Some content in menu 2.</p>
                            </div>
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
