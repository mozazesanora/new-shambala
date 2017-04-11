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

<!-- start: CONTENT -->
<table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
    <thead>
        <tr>
            <th style="width: 5%;">#</th>
            <th style="width: 10%;">Name</th>
            <th style="width: 10%;">Category</th>
            <th style="width: 10%;">Part of</th>
            <th style="width: 5%;">Code</th>
            <th style="width: 10%;">Description</th>
            <th style="width: 10%;">Age</th>
            <th style="width: 5%;">Rent able</th>
            <th style="width: 5%;">Avail able</th>
            <th style="width: 10%;">Condition</th>
            <th style="width: 10%;">Location</th>
            <th style="width: 10%;">Action</th>
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
                <td><?php echo $key->name;?></td>
                <td><span class="label label-info" data-toggle="tooltip" title="This Item Category is <?php echo $key->category_name;?>"><?php echo $key->category_name;?></span>
                </td>
                <td>
                    <?php
                    if($key->parent==0){
                        echo "None";
                    }else{
                        echo $key->parent_name;
                    }
                    ?>
                </td>
                <td>
                    <?php echo $key->serial_number;?>
                    <i class="fa fa-info-circle" data-toogle="tooltip" title="S/N : <?php if(isset($key->sn_product)){
                            echo $key->sn_product;
                        }else{
                            echo "none";
                        }
                        ?>"></i>
                </td>
                <td><?php echo $key->description;?></td>
                <td>
                    <i class="fa fa-calendar" title="<?php echo date("Y-m-d H:i:s",strtotime($key->entry_date)); ?> WIB"></i>
                    <?php
                    $this->load->library('DateTimeHuman');
                    echo $this->datetimehuman->datetime_range_to_human_string($key->entry_date, date("Y-m-d H:i:s"));
                    ?>
                </td>
                <td>
                    <?php 
                    if($key->can_be_rent == 1){
                        echo "<span class='label label-success'>Yes</span>";
                    }else{
                        echo "<span class='label label-danger'>No</span>";
                    }
                    ?>
                </td>
                <td>
                    <?php 
                    if($key->availability == 1){
                        echo "<span class='label label-success'>Yes</span>";
                    }else{
                        echo "<span class='label label-danger'>No</span>";
                    }
                    ?>
                </td>
                <td><?php echo $key->status ?></td>
                <td><?php echo $key->location ?></td>
                <td>
                    <div class="btn-group">
                        <a target="_blank" class="btn btn-primary btn-xs" href="<?php echo base_url();?>adm1n/inventory/item/generate_code/<?php $serial = str_replace('/', '~', $key->serial_number); echo $serial;?>/<?php echo  $key->name;?>/50" title="Print QR Code" data-toggle="tooltip">
                            <i class="fa fa-print"></i>
                        </a> 
                        <button type="button" class="btn btn-primary dropdown-toggle btn-xs" data-toggle="dropdown">
                            <span class="caret"></span>
                        </button>
                        <ul style="width: 30px" class="dropdown-menu" role="menu">
                            <li>
                                <a  target="_blank" href="<?php echo base_url();?>adm1n/inventory/item/generate_code/<?php $serial = str_replace('/', '~', $key->serial_number); echo $serial;?>/<?php echo  $key->name;?>/50">
                                    Small
                                </a>
                            </li>
                            <li>
                                <a target="_blank" href="<?php echo base_url();?>adm1n/inventory/item/generate_code/<?php $serial = str_replace('/', '~', $key->serial_number); echo $serial;?>/<?php echo  $key->name;?>/100">
                                    Medium
                                </a>
                            </li>
                            <li>
                                <a target="_blank" href="<?php echo base_url();?>adm1n/inventory/item/generate_code/<?php $serial = str_replace('/', '~', $key->serial_number); echo $serial;?>/<?php echo  $key->name;?>/150">
                                    Large
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="btn btn-warning btn-xs" onclick="edit('<?php echo $key->id;?>','<?php echo $key->category_item;?>','<?php echo $key->parent;?>','<?php echo $key->name;?>','<?php echo $key->description;?>','<?php echo $key->can_be_rent;?>','<?php echo $key->sn_product;?>','<?php echo $key->entry_date;?>','<?php echo $key->status;?>','<?php echo $key->location;?>');" title="Edit" data-toggle="tooltip"><i class="fa fa-edit"></i>
                    </div>
                    <br>
                    <div class="btn btn-danger btn-xs" onclick="ConfirmMessage('Are you sure to delete this item ?','<?php echo base_url();?>adm1n/inventory/item/delete/<?php echo $key->id ?>')" title="Remove" data-toggle="tooltip"><i class="clip-remove"></i></div>
                    <div class="btn btn-info btn-xs" title="created by : <?php echo $key->username?>" data-toogle="tooltip">
                        <i class="clip-info"></i>
                    </div>
                    
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
        $('#mdl_title').html("Add Item / Tools");
        $('#mdl_form').attr("action", "<?php echo base_url(); ?>adm1n/inventory/item/insert");
        $('#mdl_form_id').val('');
        $('#mdl_form_item_category').val('');
        $('#mdl_form_item_category').select2();
        $('#mdl_form_parent_code').val('0');
        $('#mdl_form_parent_code').select2();
        $('#mdl_form_name').val('');
        $('#mdl_form_description').val('');
        $('#mdl_form_can_rent').val('1');
        $('#mdl_form_condition').val('');
        $('#mdl_form_location').val('');
        $('#mdl_form_serial_number').val('');
        $('#mdl_form_year').val('');
        $('#mdl').modal('show')
    }

    function edit(id,category_item,parent,name,description,can_be_rent,serial_number,entry_date,condition,location) {
        $('#mdl_title').html("Edit Item / Tools");
        $('#mdl_form').attr("action", "<?php echo base_url(); ?>adm1n/inventory/item/update");
        $('#mdl_form_id').val(id);
        $('#mdl_form_item_category').val(category_item);
        $('#mdl_form_item_category').select2();
        $('#mdl_form_parent_code').val(parent);
        $('#mdl_form_parent_code').select2();
        $('#mdl_form_name').val(name);
        $('#mdl_form_description').val(description);
        $('#mdl_form_can_rent').val(can_be_rent);
        $('#mdl_form_serial_number').val(serial_number);
        $('#mdl_form_year').val(entry_date);
        $('#mdl_form_location').val(location);
        $('#mdl_form_condition').val(condition);
        $('#mdl').modal('show');
    }

    function size_print(){

    }

</script>

<!-- MODAL -->
<div class="modal fade" id="mdl" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <form action="#" method="post" id="mdl_form">
                <input name="id" hidden id="mdl_form_id">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="mdl_title">Modal title</h4>
                    </div>

                    <div class="modal-body">
                        <div class="row" style="margin-bottom: 5px;">
                            <div class="col-md-3">Name</div>
                            <div class="col-md-7">
                                <input type="text" name="name" class="form-control" placeholder=" example. Books" required="true" id="mdl_form_name">
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 3px;">
                            <div class="col-md-3">Item Category</div>
                            <div class="col-md-7">
                                <select required="true" name="item_category" id="mdl_form_item_category" style="width:100%">
                                    <option selected="true" value="">Choose a category below</option>
                                    <?php
                                    foreach($category_list as $as){
                                        echo "<option value='".$as->id."'>".$as->name."</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 5px;">
                            <div class="col-md-3">Part Of</div>
                            <div class="col-md-7">
                                <select name="parent" id="mdl_form_parent_code" style="width:100%">
                                    <option value="0" selected="true">None</option>
                                    <?php
                                    foreach($item_inventory as $key){
                                        echo "<option value='".$key->id."'>".$key->name."</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 5px;">
                            <div class="col-md-3">Serial Number</div>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="serial_number" placeholder=" example. 098080" id="mdl_form_serial_number">
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 5px;">
                            <div class="col-md-3">Description</div>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="description" placeholder="example. Black Color" id="mdl_form_description">
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 5px;">
                            <div class="col-md-3">Year</div>
                            <div class="col-md-7">
                                <input type="date" name="entry" class="form-control" placeholder=" example. 2014" required="true" id="mdl_form_year">
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 5px;">
                            <div class="col-md-3">Condition</div>
                            <div class="col-md-7">
                                <select name="condition" class="form-control" required="true" id="mdl_form_condition">
                                    <option value ="" selected disabled>Select Condition</option>
                                    <option value="Normal">Normal</option>
                                    <option value="Rusak">Rusak</option>
                                </select>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 5px;">
                            <div class="col-md-3">Can be Rent</div>
                            <div class="col-md-7">
                               <select id="mdl_form_can_rent" class="form-control" name="rentable">
                                <option value="1">Yes</option>
                                <option value="0">No</option> 
                            </select>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 5px;">
                        <div class="col-md-3">Location</div>
                        <div class="col-md-7">
                           <input type="text" required="" name="location" class="form-control" id="mdl_form_location">
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
