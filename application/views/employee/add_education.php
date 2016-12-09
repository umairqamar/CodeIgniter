<?php include(VIEWPATH."_header.php") ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 " >

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Add Education Entry : <?php echo $employee->result()['0']->name;?></h3>
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

                    <?php echo form_open('',array('name' => 'add_education','id' => 'add_education')); ?>

                    <div class="form-group">
                        <label>Degree</label>
                        <input type="text" class="form-control" id="degree" name="degree" placeholder="Enter Degree Name" required>
                    </div>

                    <div class="form-group">
                        <label>Institution</label>
                        <input type="text" class="form-control" id="institution" name="institution" placeholder="Enter Institution Name" required>
                    </div>

                    <div class="form-group">
                        <label>City</label>
                        <input type="text" class="form-control" id="city" name="city" placeholder="Enter Institution City" required>
                    </div>

                    <div class="form-group">
                        <label>Year</label>
                        <select class="form-control" id="year" name="year">
                            <option value="">Select Year</option>
                            <?php
                            for($i = 2020 ; $i >= 1950; $i--){
                                echo "<option>$i</option>";
                            }
                            ?>
                        </select>
                    </div>


                    <!--                        <a href="--><?php //echo base_url();?><!--" class="btn btn-default pull-left">Back</a>-->
                    <button onclick="goBack()" name="btn_submit"  class="btn btn-default pull-left">Back</button>
                    <button type="submit" name="btn_submit"  class="btn btn-primary pull-right">Submit</button>
                    <?php echo form_close(); ?>

                </div>
            </div>

        </div>


    </div>
</div>
<script>
    function goBack() {
        window.history.back();
    }
</script>
<?php include(VIEWPATH."_footer.php") ?>
