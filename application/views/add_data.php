<?php include(VIEWPATH."_header.php") ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-lg-offset-2" >

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Bootstrap Form</h3>
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

                    <?php echo form_open('',array('name' => 'add_data','id' => 'add_data')); ?>
                        <div class="form-group">
                            <label>Type</label>
                            <select class="form-control" id="type" name="type">
                                <option value="">Select type</option>
                                <option value="1">IN</option>
                                <option value="2">OP</option>
                                <option value="3">PO</option>
                                <option value="4">OC</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Level</label>
                            <select class="form-control" id="level" name="level">
                                <option value="">Select level</option>
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                            </select>
                        </div>


                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-control" id="category" name="category">
                                <option value="">Select category</option>
                                <?php
                                if($category->result_id->num_rows > 0){
                                    foreach($category->result() as $u){ ?>
                                        <option value="<?php echo $u->id;?>"><?php echo $u->category;?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Numerator</label>
                            <input type="text" class="form-control" id="numerator" name="numerator" placeholder="Numerator">
                        </div>

                        <div class="form-group">
                            <label>Denominator</label>
                            <input type="text" class="form-control" id="denominator" name="denominator" placeholder="Denominator">
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
