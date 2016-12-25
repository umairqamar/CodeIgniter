<?php include(VIEWPATH."_header.php") ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 " >

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Edit Training Entry : </h3>
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

                    <?php echo form_open('',array('name' => 'edit_training','id' => 'edit_training')); ?>

                    <div class="form-group">
                        <label>Training</label>
                        <input type="text" class="form-control" id="training" name="training" value="<?php echo $entry->training;?>" required>
                    </div>

                    <div class="form-group">
                        <label>Institution</label>
                        <input type="text" class="form-control" id="institution" name="institution" value="<?php echo $entry->institution;?>" required>
                    </div>

                    <div class="form-group">
                        <label>Start Date</label>
                        <input type="date" class="form-control" id="start_date" name="start_date" value="<?php echo $entry->start_date;?>" required>
                    </div>

                    <div class="form-group">
                        <label>End Date</label>
                        <input type="date" class="form-control" id="end_date" name="end_date" value="<?php echo $entry->end_date;?>" >
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
