<?php include(VIEWPATH."_header.php") ?>
<div class="col-lg-10 col-md-offset-1">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Home</a></li>
        <li role="presentation"><a href="#kpi" aria-controls="kpi" role="tab" data-toggle="tab">KPI</a></li>
        <li role="presentation"><a href="#kra" aria-controls="kra" role="tab" data-toggle="tab">KRA</a></li>
        <li role="presentation"><a href="#employee" aria-controls="employee" role="tab" data-toggle="tab">Employee</a></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane fade in active" id="home">.aa..</div>
        <div role="tabpanel" class="tab-pane fade" id="kpi"><?php $this->view_kpi; ?></div>
        <div role="tabpanel" class="tab-pane fade" id="kra">...</div>
        <div role="tabpanel" class="tab-pane fade" id="employee">.aa..</div>
    </div>

</div>
<?php include(VIEWPATH."_footer.php") ?>
