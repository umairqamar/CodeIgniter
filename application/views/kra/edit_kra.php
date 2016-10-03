<?php include(VIEWPATH."_header.php") ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 " >

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Edit: <?php echo $kra->kra_id;?></h3>
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
                    <?php echo form_open('form/edit_kra/'.$kra->kra_id, array('name' => 'edit_kra','id' => 'edit_kra')); ?>
                    

                    <div class="form-group">
                        <label>Code</label>
                        <input type="text" class="form-control" id="code" name="code" value="<?php echo $kra->code;?>">
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" rows="5" id="description" name="description" ><?php echo $kra->code;?></textarea>
                    </div>

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
