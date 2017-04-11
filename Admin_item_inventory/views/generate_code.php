<!DOCTYPE html>
<html>
<head>
<title>Generate Code</title>
</head>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>

<!--<script type="text/javascript" src="../jquery.qrcode.min.js"></script>
-->
<script type="text/javascript" src="<?php echo base_url();?>assets/adminside/plugins/qrcode/src/jquery.qrcode.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/adminside/plugins/qrcode/src/qrcode.js"></script>
<div style="width: <?php echo $size+10;?>px; border:1px solid;">
	<div id="qrcodeCanvas" style="padding-top: 5px;padding-left: 5px;padding-right: 5px;padding-bottom: 0px;"></div>
	<p align="center" style="padding-top: 2px;"><?php echo $name;?></p>
</div>
<script>
	//jQuery('#qrcode').qrcode("this plugin is great");
	window.print();
 	setTimeout(window.close, 0);
	jQuery('#qrcodeCanvas').qrcode({
		render  : "canvas",
		ecLevel	: 'H',
		text	: "<?php echo $serial;?>",
		width	: <?php echo $size;?>,
		height	: <?php echo $size;?>,
	});	
</script>

</body>
</html>
