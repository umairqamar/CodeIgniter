<?php include(VIEWPATH."_header.php") ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 " >

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">View KRA </h3>
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

                    <?php

                    foreach($kra as $k){ ?>
                        <p class="help-block"><?php echo  $k['code']."-". $k['description']; ?></p>
                        <table class="table table-condensed">
                            <thead>
                            <tr>
                                <th>KPI #</th>
                                <th>Type</th>
                                <th>Level</th>
                                <th>Category</th>
                                <th>Numerator</th>
                                <th>Denominator</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><?php echo $k['kpi_id'];?></td>
                                <td><?php echo $k['type'];?></td>
                                <td><?php echo $k['level'];?></td>
                                <td><?php echo $k['p_category'];?></td>
                                <td><?php echo $k['num'];?></td>
                                <td><?php echo $k['denom'];?></td>
                                <td>
                                    <a href="<?php echo site_url("/form/edit_kra/".$k['kpi_id']) ?>" >Edit</a> |
                                    <a href="<?php echo site_url("/form/delete_kra/".$k['kpi_id']); ?>" onclick="return confirm('Are you sure you want to delete this record?')">Delete</a>
                                </td>
                            </tr>

                            </tbody>
                        </table>

                        <?php
                    }



                    ?>




                    <button onclick="goBack()" name="btn_back"  class="btn btn-default pull-left">Back</button>
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
