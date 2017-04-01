<form action="<?php echo $url; ?>" method="post" enctype="multipart/form-data">
	<input type="hidden" name="data[id]" value="<?php echo isset($room->id)?$room->id: '' ; ?>">
	<div class="row">
		<div class="col-md-8">
		<div class="row">
		<div class="col-md-8">
			
		</div>
	</div>
	 	<label>Room Name</label>
			<select name="data[name]" style="margin-bottom: 15px" class="form-control">
				<?php  
					if (isset($room->name)) {
						// echo $room->name=="lab A" ? '<option value"lab a">Lab A</option>': '<option value="lab B">Lab B</option>'
						if($room->name=="lab A"){
							echo '<option value"lab a">Lab A</option>';
						}else if($room->name=="lab B"){
							echo '<option value"lab B">Lab B</option>';
						}else if($room->name=="lab C"){
							echo '<option value"lab c">Lab C</option>';
						}
					} else {
						echo '<option value="">&nbsp;</option>';
					}
					
				?>
				<option value="lab A">
					Lab A				
				</option>
				<option value="lab B">
					Lab B				
				</option>
				<option value="lab C">
					Lab C					
				</option>	
			</select>
			<!-- <input class="form-control" type="text" name="data[name]" placeholder="Room Name" style="margin-bottom: 15px;" value="<?php echo isset($room->name)?$room->name: '' ; ?>"> -->
		</div>
	</div>
	<div class="row">
		<div class="col-md-8">
			<label>Room Number</label>
			<select name="data[room_number]" style="margin-bottom: 15px" class="form-control">
				<?php   
					if (isset($room->room_number)) {
						echo $room->room_number=='601'? '<option value="601">601-602</option>' : '<option value="603">603-604</option>';
					} else {
						echo '<option value="">&nbsp;</option>';
					}
				?>
				<option value="601">		
					601-602
				</option>
				<option value="603">
					603-604
				</option>
				<option value="605">
					605-606					
				</option>
			</select>
			<!-- <input class="form-control" type="text" name="data[room_number]" placeholder="Room Number" style="margin-bottom: 15px" value="<?php echo isset($room->status)?$room->room_number: '' ; ?>"> -->
		</div>
	</div>
	<div class="row">
		<div class="col-md-8">
			<label>Room Condition</label>
			<select name="data[room_availability]" class="form-control" style="margin-bottom: 15px">
				<?php if (isset($room->room_availability)) {
					echo $room->room_availability=="ready" ? '<option value="ready">Room is Ready</option>' : '<option value"repair">Room in Reparation</option>';
				} else {
					echo '<option value="">&nbsp;</option>';
				}
				?>
				<option value="ready">
					Room is ready
				</option>
				<option value="repair">
					Room in Reparation
				</option>
			</select>
		</div>
	</div>
	<div class="row">
		<div class="col-md-8">
			<label>Room Status</label>
			<select name="data[status]" class="form-control" style="margin-bottom: 15px;">
				<?php if(isset($room->status)){
					echo $room->status == "practice" ? '<option value="practice">Only For Practice</option>' : '<option value="risearch">Available For Risearch</option>'; 
				}else{
					echo '<option value="">&nbsp;</option>';
				}
				?>
				<option value="practice">
					Only For practice
				</option>
				<option value="risearch">
					Available For Risearch
				</option>
			</select>
		</div>
	</div>
	
	<div class="row">
        <div class="col-md-12">
            <input type="submit" class="btn btn-primary" value="<?php echo $title ?>" style="margin-top: 5px;">
        </div>
    </div>
</form>
<script src="<?php echo base_url(); ?>assets/adminside/plugins/ckeditor/ckeditor.js"></script>
<script src="<?php echo base_url(); ?>assets/adminside/plugins/ckeditor/adapters/jquery.js"></script>

<script>
    CKEDITOR.disableAutoInline = true;
    $('textarea.ckeditor').ckeditor();
</script>