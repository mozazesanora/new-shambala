<!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/adminside/plugins/select2/select2.css"/>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminside/plugins/DataTables/media/css/DT_bootstrap.css"/>
<!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
<div class="row">
    <div class="col-md-12">
        <div class="btn btn-primary pull-right btn-sm" style="margin-bottom: 10px;" onclick="add();">
            <i class="fa fa-plus"></i>
            Add Item
        </div>
    </div>
</div>
<style>
    .panel {
        border-radius: 7px;
        border:3px outset;
        padding: 10px;
        color: black;
        min-height: 100px;

    }

    .icon {
        font-size: 40px;
        text-align: right;
    }

    .count {
        font-size: 20px;;
    }
</style>

<!-- start: CONTENT -->
<?php
function random_color_part() {
    return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
}

function random_color() {
    return random_color_part() . random_color_part() . random_color_part();
}
foreach ($item_category as $key) { ?>
<div class="col-md-2">
    <div class="panel" style="background-color: yellow">
        <div class="row">
            <div class="col-md-6">
                <div class="count"><?php echo $key->name;?></div>
            </div>
            <div class="col-md-6 icon">
                <?php echo $key->id;?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                Part Of : 
                <?php 
                    if(!empty($key->parent_name)){
                        echo $key->parent_name;
                    }else{
                        echo "None";
                    }
                ?>
            </div>
        </div>
        <div class="row">
            <div style="text-align: right" class="col-md-12">
                <a class="btn btn-primary btn-xs" onclick="edit('<?php echo $key->id;?>','<?php echo $key->name;?>','<?php echo $key->parent;?>');"><i class="fa fa-edit"></i></a>
                <a class="btn btn-primary btn-xs" onclick="ConfirmMessage('Are you sure to delete this item category ?','<?php echo base_url();?>adm1n/inventory/item_category/delete/<?php echo $key->id ?>')"><i class="clip-remove"></i></a>
            </div>
        </div>
    </div>
</div>
<?php
}
?>
<!-- end: CONTENT -->

<script>
    function add() {
        $('#mdl_title').html("Add Item Category");
        $('#mdl_form').attr("action", "<?php echo base_url(); ?>adm1n/inventory/item_category/insert");
        $('#mdl_form_item_category').select2();
        $('#mdl_form_parent_code').val('0');
        $('#mdl_form_parent_code').select2();
        $('#mdl_form_name').val('');
        $('#mdl').modal('show')
    }

    function edit(id,name,parent) {
        $('#mdl_title').html("Edit Item Category");
        $('#mdl_form').attr("action", "<?php echo base_url(); ?>adm1n/inventory/item_category/update");
        $('#mdl_form_id').val(id);
        $('#mdl_form_parent_code').val(parent);
        $('#mdl_form_parent_code').select2();
        $("option[value="+id+"]").attr("disabled", "disabled");
        $('#mdl_form_name').val(name);
        $('#mdl').on('hidden.bs.modal', function () {
            $("option[value="+id+"]").removeAttr("disabled", "disabled");

        })
        $('#mdl').modal('show');
    }

    function checkAvailability() {
        jQuery.ajax({
            url: "<?php echo base_url()?>adm1n/inventory/item_category/check",
            data:'id='+$("#mdl_form_id").val(),
            type: "POST",
            success:function(data){
                $("#user-availability-status").html(data);
            },
            error:function (){}
        });
    }
</script>

<!-- MODAL -->
<div class="modal fade" id="mdl" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <form action="#" method="post" id="mdl_form">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="mdl_title">Modal title</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row" style="margin-bottom: 5px;">
                            <div class="col-md-3">ID</div>
                            <div id="check_id" class="col-md-7">
                             <input name="id" type="number" id="mdl_form_id" oninput="checkAvailability()">
                             <span id="user-availability-status"></span>
                         </div>
                     </div>

                     <div class="row" style="margin-bottom: 5px;">
                        <div class="col-md-3">Name</div>
                        <div class="col-md-7">
                            <input type="text" name="name" class="form-control" placeholder=" example. Books" required="true" id="mdl_form_name">
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 5px;">
                        <div class="col-md-3">Part Of</div>
                        <div class="col-md-7">
                            <select name="parent" id="mdl_form_parent_code" style="width:100%">
                                <option value="0" selected="true">None</option>
                                <?php
                                foreach($item_category as $key){
                                    echo "<option value='".$key->id."'>".$key->name."</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <b style="color: red">NOTE :</b> Prototype
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
