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
                <?php if($kpi->result_id->num_rows > 0){
                    foreach($kpi->result() as $u){ ?>
                        <tr>
                            <td>
                                <?php
                                    switch ($u->type) {
                                        case "IN":
                                            echo "Input";
                                            break;
                                        case "OP":
                                            echo "Output";
                                            break;
                                        case "PO":
                                            echo "Process";
                                            break;
                                        case "OC":
                                            echo "Outcome";
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
                                <a href="<?php echo site_url("/form/edit_kpi/".$u->kpi_id) ?>" >Edit</a> |
                                <a href="<?php echo site_url("/form/delete_kpi/".$u->kpi_id); ?>" onclick="return confirm('Are you sure you want to delete this record?')">Delete</a>
                            </td>
                        </tr>

                    <?php
                    }
                }

                ?>
                </tbody>
            </table>
<!--                    <button onclick="goBack()" name="btn_submit"  class="btn btn-default pull-left">Back</button>-->
                    <a href="form/add_kpi" class="btn btn-default ">Add KPI</a>
                    <a href="form/add_kpi_category" class="btn btn-default">Add KPI Category</a>
                </div>

                

            </div>

        </div>


    </div>
</div>

<script type="text/javascript">
    function goBack() {
        window.history.back();
    }
    

</script>

<?php include(VIEWPATH."_footer.php") ?>
