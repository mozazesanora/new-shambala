<!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/adminside/plugins/select2/select2.css"/>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminside/plugins/DataTables/media/css/DT_bootstrap.css"/>
<!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->

<div class="row">
    <div class="col-md-12">
        <a href="<?php echo base_url();?>adm1n/inventory/room/form/add/0" class="btn btn-primary pull-right btn-sm" style="margin-bottom: 10px;">
            <i class="fa fa-plus"></i>
            Add Item
        </a>
    </div>
</div>

<!--
name
description
user_id
-->

<!-- start: CONTENT -->
<table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
    <thead>
    <tr>
        <th width="60px">#</th>
        <th width="200px">Name Item</th>
        <th width="200">Room Number</th>
        <th width="200">Room Condition</th>
        <th width="200">Status</th>
        <th width="100">Action</th>
    </tr>
    </thead>
    <tbody>
        <?php
            $num =0;
            foreach ($room as $room ) {
                $num++;
         ?>
         <tr>
             <td><?php echo $num; ?></td>
             <td><?php echo $room->name; ?></td>
             <td><?php echo $room->room_number; ?></td>
             <td><?php 
                    if ($room->room_availability=="ready") {
                       echo "<span class='label label-success'>$room->room_availability</span>"; 
                    }
                    else{
                        echo "<span class='label label-danger'>$room->room_availability</span>";
                    }
              ?></td>
             <td><?php   
                    if ($room->status=="practice") {
                        echo "<span class='label label-success'>$room->status</span>";
                    } else {
                        echo "<span class='label label-warning'>$room->status</span>";
                    }
                    
             ?></td>
             <td>
                <a href="<?php echo base_url();?>adm1n/inventory/room/form/edit/<?php echo $room->id;?>" class="btn btn-primary btn-xs">Edit</a>
                 <div class="btn btn-danger btn-xs" onclick="ConfirmMessage('Are you sure to delete this info ?','<?php echo base_url();?>adm1n/inventory/room/delete/<?php echo $room->id ?>')">Delete</div>
             </td>
         </tr>
         <?php  
            }
         ?>
    </tbody>
</table>
<!-- end: CONTENT -->

<script>
    function add() {
        $('#mdl_title').html("Add Info");
        $('#mdl_form').attr("action", "<?php echo base_url(); ?>adm1n/info/add");
        $('#mdl_form_id').val("");
        $('#mdl_form_title').val("");
        $('#mdl_form_content').val("");
        $('#mdl').modal('show')
    }
    function edit(id, title, content, img) {
        $('#mdl_title').html("Change Info");
        $('#mdl_form').attr("action", "<?php echo base_url(); ?>adm1n/info/edit");
        $('#mdl_form_id').val(id);
        $('#mdl_form_title').val(title);
        $('#mdl_form_content').val(content);
        $('#mdl').modal('show')
    }
</script>

<!-- Modal -->
<div class="modal fade" id="mdl" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="#" method="post" id="mdl_form" enctype="multipart/form-data">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="mdl_title">Modal title</h4>
                </div>
                <div class="modal-body">
                    <div class="row" style="margin-bottom: 5px;">
                        <div class="col-md-2">Title</div>
                        <div class="col-md-10"><input class="form-control" type="text" name="title" id="mdl_form_title"
                                                     placeholder="Title"></div>
                    </div>
                    <div class="row" style="margin-bottom: 5px;">
                        <div class="col-md-2">Content</div>
                        <div class="col-md-10"><textarea class="form-control" name="content" id="mdl_form_content"
                                                        placeholder="Title" rows="5"></textarea></div>
                    </div>
                    <div class="row" style="margin-bottom: 2px;">
                        <div class="col-md-2">Image 1</div>
                        <div class="col-md-10"><input class="form-control" type="file" name="img1" id="mdl_form_img">
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 2px;">
                        <div class="col-md-2">Image 2</div>
                        <div class="col-md-10"><input class="form-control" type="file" name="img2" id="mdl_form_img">
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 2px;">
                        <div class="col-md-2">Image 3</div>
                        <div class="col-md-10"><input class="form-control" type="file" name="img3" id="mdl_form_img">
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 2px;">
                        <div class="col-md-2">Image 4</div>
                        <div class="col-md-10"><input class="form-control" type="file" name="img4" id="mdl_form_img">
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 2px;">
                        <div class="col-md-2">Image 5</div>
                        <div class="col-md-10"><input class="form-control" type="file" name="img5" id="mdl_form_img">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Save">
                </div>
            </form>
        </div>
    </div>
</div>

<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
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