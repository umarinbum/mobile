
	<div class="container-fluid bck_blue foot_bar">
		<h4 class="text-center mar0">*** ต้องทำการนัดหมายล่วงหน้าเป็นเวลา 2 วันทำการ ***</h4>
	</div>

</div> <!-- Start Main Frame -->
<script src="<?php echo base_url();?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/Bootstrap-notify/bootstrap-notify.min.js"></script>
<?php
if( isset($js_template) ){
	foreach( $js_template as $row ){
		echo "<script src='".base_url().$row."'></script>"."\n";
	}
}
?>

<script type="text/javascript">

<?php
	if( isset($toggle_login_modal) && $this->session->userdata('close_social_modal') == false ){
?>
		$("#myModal").modal();
<?php
	}
?>

<?php if( $this->session->flashdata('notify') ){ $notify = $this->session->flashdata('notify'); ?>
	$.notify({
		icon: 'glyphicon glyphicon-<?php echo $notify['icon'];?>',
		message: '<?php echo $notify['message'];?>',
	},{
		type: '<?php echo $notify['type'];?>',
	});
<?php }?>

</script>
</body>
</html>