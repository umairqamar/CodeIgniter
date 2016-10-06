
<?php include(VIEWPATH."_header.php") ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 " >

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">View KRA</h3>
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
                    <table class="table table">

                        <?php if($kra->result_id->num_rows > 0){
                            $h1 = NULL;
                            foreach($kra->result() as $u){
                                if($h1 <> $u->code) { ?>
                                <thead>
                                <tr>
                                    <th colspan="5"><a href="<?php echo site_url("/form/detail_kra/".$u->kra_id) ?>" ><h4><?php echo $u->code?></h4></a> <p class="help-block"><?php echo $u->description;?></p> </th>
                                    <th>
<!--                                        <a href="--><?php //echo site_url("/form/detail_kra/".$u->kra_id) ?><!--" >Details</a> |-->
                                        <a href="<?php echo site_url("/form/edit_kra/".$u->kra_id) ?>" >Edit</a> |
                                        <a href="<?php echo site_url("/form/delete_kra/".$u->kra_id); ?>" onclick="return confirm('Are you sure you want to delete this KRA?')">Delete</a></th>
                                </tr>
                                <tr>
                                    <th>KPI</th>
                                    <th>Type</th>
                                    <th>Level</th>
                                    <th>Numerator</th>
                                    <th>Denominator</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $h1 = $u->code;
                                }
                                else{ ?>
                                    <tr>
                                        <td><?php echo $u->kpi_description;?></td>
                                        <td><?php echo get_type($u->type);?></td>
                                        <td><?php echo $u->level;?></td>
                                        <td><?php echo $u->num;?></td>
                                        <td><?php echo $u->denom;?></td>
                                        <td>
                                            <!--                                    <a href="--><?php //echo site_url("/form/edit_kra/".$k['kra_id']."/".$k['id']) ?><!--" >Edit</a> |-->

                                            <a href="<?php echo site_url("/form/delete_kpi_kra/".$u->kra_id."/".$u->kpi_id); ?>" onclick="return confirm('Are you sure you want to delete this KPI?')"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Delete</a>
                                        </td>
                                    </tr>


                                <?php
                                }

                                ?>




                                <?php
                            }
                        }

                        ?>
                        </tbody>
                    </table>
<!--                    <button onclick="goBack()" name="btn_back"  class="btn btn-default pull-left">Back</button>-->
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
