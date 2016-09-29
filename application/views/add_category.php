<?php include(VIEWPATH."_header.php") ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-lg-offset-2" >




            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Add Category</h3>
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

<!--                    <table class="table table-striped">-->
<!--                        <thead>-->
<!--                        <tr>-->
<!--                            <th>Category</th>-->
<!--                            <th>Description</th>-->
<!--                            <th>Action</th>-->
<!--                        </tr>-->
<!--                        </thead>-->
<!--                        <tbody>-->
<!--                        --><?php //if($category->result_id->num_rows > 0){
//                            foreach($category->result() as $u){ ?>
<!--                                <tr>-->
<!--                                    <td>--><?php //echo $u->category;?><!--</td>-->
<!--                                    <td>--><?php //echo $u->description;?><!--</td>-->
<!--                                    <td>-->
<!--                                        <a href="--><?php //echo site_url("/form/edit_cat/".$u->id) ?><!--" >Edit</a> |-->
<!--                                        <a href="--><?php //echo site_url("/form/delete_cat/".$u->id); ?><!--" onclick="return confirm('Are you sure you want to delete this record?')">Delete</a>-->
<!--                                    </td>-->
<!--                                </tr>-->
<!---->
<!--                                --><?php
//                            }
//                        }
//
//                        ?>
<!--                        </tbody>-->
<!--                    </table>-->


                    <?php echo form_open('',array('name' => 'add_category','id' => 'add_category')); ?>
                    <div class="form-group">
                        <label>Category</label>
                        <input type="text" class="form-control" id="category" name="category" placeholder="Category">
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" rows="5" id="description" name="description" placeholder="Category description goes here"></textarea>
                    </div>
<!--                    <button onclick="goBack()" name="btn_submit"  class="btn btn-default pull-left">Back</button>-->
                    <a href="<?php echo base_url();?>" class="btn btn-default pull-left">Back</a>
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
