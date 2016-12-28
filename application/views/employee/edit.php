<?php include(VIEWPATH."_header.php") ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 " >

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Edit: <?php echo $employee->name;?></h3>
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
                    <?php echo form_open('form/edit_employee/'.$employee->employee_id, array('name' => 'edit_employee','id' => 'edit_employee')); ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>CNIC *</label>
                                <input type="text" class="form-control" id="cnic" name="cnic" value="<?php echo $employee->cnic;?>" required autocomplete="on" >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email *</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo $employee->email;?>" required autocomplete="on">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <label>Name *</label>
                                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $employee->name;?>" required autocomplete="on">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <label>Father/Husband Name</label>
                                    <input type="text" class="form-control" id="father_name" name="father_name" value="<?php echo $employee->father_name;?>" >
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Cell Phone</label>
                                <input type="text" class="form-control" id="phone_cell" name="phone_cell" value="<?php echo $employee->phone_cell;?>" autocomplete="on" >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Landline</label>
                                <input type="text" class="form-control" id="phone_land" name="phone_land" value="<?php echo $employee->phone_land;?>" autocomplete="on">
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Date of Birth</label>
                                <input type="date" class="form-control" id="dob" name="dob" value="<?php echo $employee->dob;?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>NTN#</label>
                                <input type="text" class="form-control" id="ntn" name="ntn" value="<?php echo $employee->ntn;?>" >
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Marital Status</label>
                                <select class="form-control" name="marital_status" id="marital_status" required>
                                    <option value="S" <?php echo ($employee->marital_status == 'S') ? "Selected":""; ?>>Single</option>
                                    <option value="M" <?php echo ($employee->marital_status == 'M') ? "Selected":""; ?>>Married</option>
                                    <option value="D" <?php echo ($employee->marital_status == 'D') ? "Selected":""; ?>>Divorced</option>
                                    <option value="W" <?php echo ($employee->marital_status == 'W') ? "Selected":""; ?>>Widowed</option>
                                </select>
                            </div>
                        </div>
                    </div>



                    <div class="form-group">
                        <label>Present Address</label>
                        <input type="text" class="form-control" id="address_present" name="address_present" value="<?php echo $employee->address_present;?>" autocomplete="on">
                    </div>


                    <div class="form-group">
                        <label>Permanent Address</label>
                        <input type="text" class="form-control" id="address_perm" name="address_perm" value="<?php echo $employee->address_perm;?>" autocomplete="on" >
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Emergency Contact</label>
                                <input type="text" class="form-control" id="emergency_contact" name="emergency_contact" value="<?php echo $employee->emergency_contact;?>" >
                            </div>
                        </div>
                    </div>









                    <button onclick="goBack()" name="btn_submit"  class="btn btn-default pull-left">Back</button>
                    <button type="submit" name="btn_submit"  class="btn btn-primary pull-right">Submit</button>
                    <?php echo form_close(); ?>

                </div>
            </div>

        </div>


    </div>
</div>

<?php include(VIEWPATH."_footer.php") ?>
<script type="text/javascript">
    function goBack() {
        window.history.back();
    }

    $('.kra_list').select2({
        placeholder: 'Select KPIs'
    });
</script>

