<?php include(VIEWPATH."_header.php") ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-lg-offset-2" >

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">View all</h3>
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
                    <table class="table table-striped">
                <thead>
                <tr>
                    <th>Type</th>
                    <th>Level</th>
                    <th>Category</th>
                    <th>Numerator</th>
                    <th>Denominator</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php if($data->result_id->num_rows > 0){
                    foreach($data->result() as $u){ ?>
                        <tr>
                            <td>
                                <?php
                                    switch ($u->type) {
                                        case "1":
                                            echo "IN";
                                            break;
                                        case "2":
                                            echo "OP";
                                            break;
                                        case "3":
                                            echo "PO";
                                            break;
                                        case "4":
                                            echo "OC";
                                            break;
                                        default:
                                            echo "--";
                                    }
                                ?>
                            </td>
                            <td><?php echo $u->level;?></td>
                            <td><?php echo $u->category;?></td>
                            <td><?php echo $u->num;?></td>
                            <td><?php echo $u->denom;?></td>
                            <td>
                                <a href="<?php echo site_url("/form/edit/".$u->id) ?>">Edit</a> |
                                <a href="<?php echo site_url("/form/delete/".$u->id); ?>">Delete</a>
                            </td>
                        </tr>
                    <?php
                    }
                }
                ?>
                </tbody>
            </table>

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
