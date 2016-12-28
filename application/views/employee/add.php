<?php include(VIEWPATH."_header.php"); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 " >

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Add Employee</h3>
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

                    <?php echo form_open('form/add_employee',array('name' => 'add_employee','id' => 'add_employee','data-toggle' => 'validator1','role' => 'form')); ?>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>CNIC *</label>
                                <input type="text" class="form-control" id="cnic" name="cnic" placeholder="Enter CNIC" required autofocus >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email *</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email address" required autocomplete="on">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <label>Name *</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter full name" required autocomplete="on">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <label>Father/Husband Name</label>
                                    <input type="text" class="form-control" id="father_name" name="father_name" placeholder="Enter Father/Husband name" >
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Cell Phone</label>
                                <input type="text" class="form-control" id="phone_cell" name="phone_cell" placeholder="Enter Cell phone" autocomplete="on" >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Landline</label>
                                <input type="text" class="form-control" id="phone_land" name="phone_land" placeholder="Enter Landline number" autocomplete="on">
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Date of Birth</label>
                                <input type="date" class="form-control" id="dob" name="dob" placeholder="Enter DOB (mm/dd/yyyy)">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>NTN#</label>
                                <input type="text" class="form-control" id="ntn" name="ntn" placeholder="Enter NTN number (if any)" >
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Marital Status</label>
                                <select class="form-control" name="marital_status" id="marital_status" required>
                                    <option value="S">Single</option>
                                    <option value="M">Married</option>
                                    <option value="D">Divorced</option>
                                    <option value="W">Widowed</option>
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12">
                            <label>Present Address</label>
                            <div class="form-group">
                                <div class="col-md-4">
                                    <input type="text" class="form-control" id="address_present_line1" name="address_present_line1" placeholder="Address Line 1" autocomplete="on">
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" id="address_present_line2" name="address_present_line2" placeholder="Address Line 2" autocomplete="on">
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" id="address_present_city" name="address_present_city" placeholder="Enter City" autocomplete="on">
                                </div>
                            </div>
                        </div>

                    </div>



                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="address_chkbox" id="address_chkbox" value="1"> Check this box if Permanent address is same as Present address
                            </label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <label>Permanent Address</label>
                            <div class="form-group">
                                <div class="col-md-4">
                                    <input type="text" class="form-control" id="address_perm_line1" name="address_perm_line1" placeholder="Address Line 1" autocomplete="on">
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" id="address_perm_line2" name="address_perm_line2" placeholder="Address Line 2" autocomplete="on">
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" id="address_perm_city" name="address_perm_city" placeholder="Enter City" autocomplete="on">
                                </div>
                            </div>
                        </div>
                    </div>

                    <br/>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Emergency Contact</label>
                            <div class="form-group">
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" id="emergency_name" name="emergency_name" placeholder="Enter Name" > <br/>
                                    </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" id="emergency_relationship" name="emergency_relationship" placeholder="Enter Relationship" ><br/>
                                </div>

                                <div class="col-md-4">
                                    <input type="text" class="form-control" id="emergency_contact" name="emergency_contact" placeholder="Enter Contact Number" ><br/>
                                </div>

                            </div>
                        </div>
                    </div>






                    


<!--                    <a href="--><?php //echo base_url();?><!--" class="btn btn-default pull-left">Back</a>-->
                    <button onclick="goBack()" name="btn_submit"  class="btn btn-default pull-left">Back</button>
                    <button type="submit" name="btn_submit"  class="btn btn-primary pull-right">Submit</button>
                    <?php echo form_close(); ?>

                </div>
            </div>

        </div>


    </div>
</div>

<?php include(VIEWPATH."_footer.php") ?>
<script>
    $(document).ready(function(){
        //Input Mask
//        $('#cnic').inputmask("99999-9999999-9");
//        $('#phone_cell').inputmask("9999-9999999");
//        $('#phone_land').inputmask("999-9999999");

        //Datepicker
//        $('#dob').datepicker({
//            format: 'mm/dd/yyyy',
//            startDate: '-3d'
//        });

        //Select2
        $('.kra_list').select2({
            placeholder: 'Select KRAs'
        });

        //Address Checkbox action
        $('#address_chkbox').change(function() {
            if ($(this).is(':checked')) {
                var address_present_line1 = document.getElementById("address_present_line1").value;
                var address_present_line2 = document.getElementById("address_present_line2").value;
                var address_present_city = document.getElementById("address_present_city").value;

                //document.getElementById("address_present").value = address_present;

                document.getElementById("address_perm_line1").value = address_present_line1;
                document.getElementById("address_perm_line2").value = address_present_line2;
                document.getElementById("address_perm_city").value = address_present_city;

                $("#address_perm_line1").prop('disabled', true);
                $("#address_perm_line2").prop('disabled', true);
                $("#address_perm_city").prop('disabled', true);

            }
            else{
                $("#address_perm_line1").removeAttr('disabled');
                $("#address_perm_line2").removeAttr('disabled');
                $("#address_perm_city").removeAttr('disabled');
            }
        });




    });
</script>

