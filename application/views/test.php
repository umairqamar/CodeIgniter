
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
                    <?php if($kra->result_id->num_rows > 0){

                        foreach($kra->result() as $u){
                            //echo $u->code;
                            $h1 = "";
                            if($h1 != $u->code) {
                                echo "<h1>" . $u->code . ":</h1>\n";
                                $h1 = $u->code;
                            }

                        }

                    }


                    ?>
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
