<?php include(VIEWPATH."_header.php") ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-lg-offset-2" >

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Edit: <?php echo $data->id;?></h3>
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
                    <?php echo form_open('form/edit/'.$data->id, array('name' => 'edit_data','id' => 'edit_data')); ?>
                    <div class="form-group">
                        <label>Type</label>
                        <select class="form-control" id="type" name="type">
                            <option value="1" <?php echo ($data->type =="1")?'selected':''; ?>>IN</option>
                            <option value="2" <?php echo ($data->type =="2")?'selected':''; ?>>OP</option>
                            <option value="3" <?php echo ($data->type =="3")?'selected':''; ?>>PO</option>
                            <option value="4" <?php echo ($data->type =="4")?'selected':''; ?>>OC</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Level</label>
                        <select class="form-control" id="level" name="level">
                            <option value="0" <?php echo ($data->level =="0")?'selected':''; ?>>0</option>
                            <option value="1" <?php echo ($data->level =="1")?'selected':''; ?>>1</option>
                            <option value="2" <?php echo ($data->level =="2")?'selected':''; ?>>2</option>
                            <option value="3" <?php echo ($data->level =="3")?'selected':''; ?>>3</option>
                            <option value="4" <?php echo ($data->level =="4")?'selected':''; ?>>4</option>
                            <option value="5" <?php echo ($data->level =="5")?'selected':''; ?>>5</option>
                            <option value="6" <?php echo ($data->level =="6")?'selected':''; ?>>6</option>
                            <option value="7" <?php echo ($data->level =="7")?'selected':''; ?>>7</option>
                            <option value="8" <?php echo ($data->level =="8")?'selected':''; ?>>8</option>
                            <option value="9" <?php echo ($data->level =="9")?'selected':''; ?>>9</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" id="category" name="category">

                            <?php
                            if($category->result_id->num_rows > 0){
                                foreach($category->result() as $u){ ?>
                                    <option value="<?php echo $u->id;?>" <?php echo ($data->p_category == $u->id )?'selected':''; ?>><?php echo $u->category;?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Numerator</label>
                        <input type="text" class="form-control" id="numerator" name="numerator" value="<?php echo $data->num;?>">
                    </div>

                    <div class="form-group">
                        <label>Denominator</label>
                        <input type="text" class="form-control" id="denominator" name="denominator" value="<?php echo $data->denom;?>">
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
