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

    <?php if($kra_detail->result_id->num_rows > 0){
        foreach($kra_detail->result() as $u){ ?>
            <tr>
                <td><?php echo $u->kpi_description;?></td>
                <td><?php echo get_type($u->type);?></td>
                <td><?php echo $u->level;?></td>
                <td><?php echo $u->num;?></td>
                <td><?php echo $u->denom;?></td>
                <td>
                    <a href="<?php echo site_url("/form/delete_kpi_kra/".$u->kra_id['0']."/".$u->kpi_id); ?>" onclick="return confirm('Are you sure you want to delete this KPI?')"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Delete</a>
                </td>
            </tr>
            <?php
        }
        ?>
        <?php
    }

    ?>
    </tbody>
</table>
<!--                    <button onclick="goBack()" name="btn_back"  class="btn btn-default pull-left">Back</button>-->




<script type="text/javascript">
    function goBack() {
        window.history.back();
    }



</script>

