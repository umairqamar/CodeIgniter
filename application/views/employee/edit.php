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


                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $employee->name;?>">
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $employee->email;?>">
                    </div>

                    <div class="form-group">
                        <label>Designation</label>
                        <input type="text" class="form-control" id="designation" name="designation" value="<?php echo $employee->designation;?>">
                    </div>

                    <div class="form-group">
                        <label>Contact #</label>
                        <input type="text" class="form-control" id="contact" name="contact" value="<?php echo $employee->contact_num;?>">
                    </div>


                    <div class="form-group">
                        <label>KRA</label>
                        <!--                        <p class="help-block">Hold down the Ctrl (windows) / Command (Mac) button to select multiple options.</p>-->
                        <select class="kra_list form-control" id="kra[]" name="kra[]" multiple="multiple" required>
                            <?php
                            if($kra_list->result_id->num_rows > 0){
                                foreach($kra_list->result() as $u){ ?>
                                    <option value="<?php echo $u->kra_id;?>"<?php if (in_array_r($u->kra_id, $selected_kra->result_array())){echo "selected";} ?>><?php echo $u->code;?>  </option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
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

