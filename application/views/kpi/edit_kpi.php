<?php include(VIEWPATH."_header.php") ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 " >

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Edit: <?php echo $kpi->kpi_id;?></h3>
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
                    <?php echo form_open('form/edit_kpi/'.$kpi->kpi_id, array('name' => 'edit_kpi','id' => 'edit_kpi')); ?>
                    <div class="form-group">
                        <label>Type</label>
                        <select class="form-control" id="type" name="type">
                            <option value="IN" <?php echo ($kpi->type =="IN")?'selected':''; ?>>Input</option>
                            <option value="OP" <?php echo ($kpi->type =="OP")?'selected':''; ?>>Output</option>
                            <option value="PO" <?php echo ($kpi->type =="PO")?'selected':''; ?>>Process</option>
                            <option value="OC" <?php echo ($kpi->type =="OC")?'selected':''; ?>>Outcome</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Level</label>
                        <select class="form-control" id="level" name="level">
                            <option value="0" <?php echo ($kpi->level =="0")?'selected':''; ?>>0</option>
                            <option value="1" <?php echo ($kpi->level =="1")?'selected':''; ?>>1</option>
                            <option value="2" <?php echo ($kpi->level =="2")?'selected':''; ?>>2</option>
                            <option value="3" <?php echo ($kpi->level =="3")?'selected':''; ?>>3</option>
                            <option value="4" <?php echo ($kpi->level =="4")?'selected':''; ?>>4</option>
                            <option value="5" <?php echo ($kpi->level =="5")?'selected':''; ?>>5</option>
                            <option value="6" <?php echo ($kpi->level =="6")?'selected':''; ?>>6</option>
                            <option value="7" <?php echo ($kpi->level =="7")?'selected':''; ?>>7</option>
                            <option value="8" <?php echo ($kpi->level =="8")?'selected':''; ?>>8</option>
                            <option value="9" <?php echo ($kpi->level =="9")?'selected':''; ?>>9</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" id="category" name="category">

                            <?php
                            if($kpi_category->result_id->num_rows > 0){
                                foreach($kpi_category->result() as $u){ ?>
                                    <option value="<?php echo $u->kpi_cat_id;?>" <?php echo ($kpi->p_category == $u->kpi_cat_id )?'selected':''; ?>><?php echo $u->category;?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Numerator</label>
                        <input type="text" class="form-control" id="numerator" name="numerator" value="<?php echo $kpi->num;?>">
                    </div>

                    <div class="form-group">
                        <label>Denominator</label>
                        <input type="text" class="form-control" id="denominator" name="denominator" value="<?php echo $kpi->denom;?>">
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
