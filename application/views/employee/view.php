<?php include(VIEWPATH."_header.php") ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12" >

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">View Employee</h3>
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

                    <label>Choose Employee: </label>

                    <div class="btn-group">
                        <!-- Single button -->
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Select Employee <span class="caret"></span>
                            </button>
                        <ul class="dropdown-menu">
                            <?php
                             if ($employee->result_id->num_rows >0){
                                 foreach ($employee->result() as $k) { ?>
                                     <li><a href="<?php echo site_url("/form/view_employee/".$k->employee_id) ?>"><?php echo $k->name?></a></li>
                                 <?php
                                 }
                             }
                            ?>
                        </ul>
                        </div>
                    </div>



                    <?php if($this->uri->segment(3) && is_numeric($this->uri->segment(3)) && !is_null($this->uri->segment(3))){ ?>

                        <?php if($detail->result_id->num_rows > 0){ ?>
                            <h4><?php echo $detail->result()['0']->name;?>  <small><?php echo $detail->result()['0']->designation;?></small></h4>

                            <p><span class=" glyphicon glyphicon-envelope" aria-hidden="true"> <?php echo $detail->result()['0']->email;?></span></p>

                            <p><span class="glyphicon glyphicon-phone" aria-hidden="true"> <?php echo $detail->result()['0']->contact_num;?></span></p>

                            <table class="table table">

                            <?php
                            foreach($detail->result() as $u){ ?>
                                <tr>
                                    <td><?php echo $u->code;?></td>
                                    <td><?php echo $u->description;?></td>
                                    <td>
                                        <a href="<?php echo site_url("/form/delete_kra_emp/".$u->employee_id."/".$u->kra_id); ?>" onclick="return confirm('Are you sure you want to delete this KRA from this Employee?')"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Delete</a>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        <?php
                        } ?>

                            </tbody>
                        </table>

                        <div class="btn-group pull-right" role="group" >
                            <a href="<?php echo site_url("/form/add_employee/")?>" type="button" class="btn btn-default">Add Employee</a>
                            <a href="<?php echo site_url("/form/edit_kra/".$detail->result()['0']->employee_id)?>" type="button" class="btn btn-default">Edit Employee</a>
                            <a href="<?php echo site_url("/form/delete_kra/".$detail->result()['0']->employee_id)?>" type="button" class="btn btn-default" onclick="return confirm('Are you sure you want to delete this Employee?')">Delete Employee</a>
                        </div>

                        <?php
                    }?>
            </div>

        </div>
    </div>
</div>


<?php include(VIEWPATH."_footer.php") ?>
