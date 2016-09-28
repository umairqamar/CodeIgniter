<?php include(VIEWPATH."_header.php") ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-lg-offset-1" >
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Type</th>
                    <th>Level</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Numerator</th>
                    <th>Denominator</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php if($data->result_id->num_rows > 0){
                    foreach($data->result() as $u){ ?>
                        <tr>
                            <td><?php echo $u->type;?></td>
                            <td><?php echo $u->level;?></td>
                            <td><?php echo $u->category;?></td>
                            <td><?php echo $u->description;?></td>
                            <td><?php echo $u->num;?></td>
                            <td><?php echo $u->denom;?></td>
                            <td>
                                <a href="<?php echo site_url("edit/".$u->id) ?>">Edit</a> |
                                <a href="<?php echo site_url("delete/".$u->id); ?>">Delete</a>
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

<script>
    function goBack() {
        window.history.back();
    }
</script>
<?php include(VIEWPATH."_footer.php") ?>
