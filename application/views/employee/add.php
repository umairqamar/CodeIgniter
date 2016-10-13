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

                    <?php echo form_open('form/add_employee',array('name' => 'add_employee','id' => 'add_employee')); ?>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter full name" required>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email address" required>
                    </div>

                    <div class="form-group">
                        <label>Designation</label>
                        <input type="text" class="form-control" id="designation" name="designation" placeholder="Enter designation" >
                    </div>


                    <div class="form-group">
                        <label>Contact #</label>
                        <input type="text" class="form-control" id="contact" name="contact" placeholder="Enter Contact number" >
                    </div>


                    <div class="form-group">
                        <label>KRAs</label>
<!--                        <p class="help-block">Hold down the Ctrl (windows) / Command (Mac) button to select multiple options.</p>-->
                        <select class="kra_list form-control" id="kra[]" name="kra[]"   multiple="multiple" required>
                            <?php
                            if($kra->result_id->num_rows > 0){
                                foreach($kra->result() as $u){ ?>
                                    <option value="<?php echo $u->kra_id;?>">
<!--                                        --><?php //echo "Id:".$u->kpi_id. "-" .$u->type. "- Level:" .$u->level."-".$u->category;?>
                                        <?php echo $u->code;?>
                                    </option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
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
<script type="text/javascript">
    $('.kra_list').select2({
        placeholder: 'Select KRAs'
    });
</script>

