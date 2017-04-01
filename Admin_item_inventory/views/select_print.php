<!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/adminside/plugins/select2/select2.css"/>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminside/plugins/DataTables/media/css/DT_bootstrap.css"/>
<!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->

<div class="row">
    <div class="col-md-12">
        <div class="btn btn-primary pull-right btn-sm" style="margin-bottom: 10px;" onclick="add();">
            <i class="fa fa-print"></i>
             Print QR Code
        </div>
    </div>
</div>
<!-- start: CONTENT -->
<form  method="post" action="">
<table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
    <thead>
        <tr>
            <th style="width: 5%">#</th>
            <th style="width: 5%;">Select All <input type="checkbox"></th>
            <th style="width: 30%;">Serial Number</th>
            <th style="width: 30%;">Name</th>
            <th style="width: 30%;">Location</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $num=0;
        foreach ($item_inventory as $key) {
            $num++;
            ?>
            <tr>
                <td><?php echo $num;?></td>
                <td align="center"><input type="checkbox" value="<?php echo $key->serial_number;?>" id="selected_row"></td>
                <td><?php echo $key->serial_number;?></td>
                <td><?php echo $key->name;?></td>
                <td><?php echo $key->location;?></td>
            </tr>
        <?php
            }
        ?>
    </tbody>
</table>
</form>
<!-- end: CONTENT -->

        <!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/adminside/plugins/select2/select2.min.js"></script>
        <script type="text/javascript"
        src="<?php echo base_url(); ?>assets/adminside/plugins/DataTables/media/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript"
        src="<?php echo base_url(); ?>assets/adminside/plugins/DataTables/media/js/DT_bootstrap.js"></script>
        <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/adminside/plugins/select2/select2.min.js"></script>
        <script type="text/javascript"
        src="<?php echo base_url(); ?>assets/adminside/plugins/DataTables/media/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript"
        src="<?php echo base_url(); ?>assets/adminside/plugins/DataTables/media/js/DT_bootstrap.js"></script>
        <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->

<script>
            $('#sample_1').dataTable({
                "aoColumnDefs": [{
                    "aTargets": [0]
                }],
                "aaSorting": [
                [0, 'asc']
                ], 
                "aLengthMenu": [
                [5, 10, 15, 20, -1],
            [5, 10, 15, 20, "All"] // change per page values here
            ],
        // set the initial value
        "iDisplayLength": 10,
    });
            $('#sample_1_wrapper .dataTables_filter input').addClass("form-control input-sm").attr("placeholder", "Search");
    // modify table search input
    $('#sample_1_wrapper .dataTables_length select').addClass("m-wrap small");
    // modify table per page dropdown
    $('#sample_1_wrapper .dataTables_length select').select2();
    // initialzie select2 dropdown
    $('#sample_1_column_toggler input[type="checkbox"]').change(function () {
        /* Get the DataTables object again - this is not a recreation, just a get of the object */
        var iCol = parseInt($(this).attr("data-column"));
        var bVis = oTable.fnSettings().aoColumns[iCol].bVisible;
        oTable.fnSetColumnVis(iCol, (bVis ? false : true));
    });
</script>
