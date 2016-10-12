<?php include(VIEWPATH."_header.php") ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 " >

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Edit: <?php echo $kra->code;?></h3>
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
                        <textarea class="form-control" rows="5" id="description" name="description" ><?php echo $kra->description;?></textarea>
                    </div>

                    <div class="form-group">
                        <label>KRA</label>
<!--                        <p class="help-block">Hold down the Ctrl (windows) / Command (Mac) button to select multiple options.</p>-->
                        <select class="kpi_list form-control" id="kpi[]" name="kpi[]" multiple="multiple" required>
                            <?php
                            if($kpi_list->result_id->num_rows > 0){
                                foreach($kpi_list->result() as $u){ ?>
                                    <option value="<?php echo $u->kpi_id;?>"<?php if (in_array_r($u->kpi_id, $selected_kpi->result_array())){echo "selected";} ?>><?php echo $u->kpi_description;?>  </option>
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

    $('.kpi_list').select2({
        placeholder: 'Select KPIs'
    });
</script>

