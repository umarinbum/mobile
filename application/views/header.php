<!DOCTYPE html>
<html>
<head>

<title>Appointment</title>
<link rel="shortcut icon" type="image/png" href="<?php echo base_url();?>assets/img/favicon.ico">

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
<link href="//cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.0/animate.min.css" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/main.css">

<?php
if( isset($css_template) ){
	foreach( $css_template as $row ){
		echo "<link rel='stylesheet' type='text/css' href='".base_url().$row."'>"."\n";
	}
}
?>

</head>
<body>

<?php //print_r($this->session->userdata());?>

<div class="main_frame"> <!-- Start Main Frame -->

	<div class="container-fluid bck_blue head_bar">
		<div class="row">
			<div class="container header_box">

				<a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>/assets/img/Logo-Thai.png" id="logo"></a>

				<?php
					// จะคลิกเมนู 2 ได้มั้ย เช็คจาก $this->session->userdata('form_insert_id');
					// จะคลิกเมนู 3 ได้มั้ย เช็คจาก...;
					if( isset($page_level) ){

						if( isset($edit_from_secret) || isset($_GET['edit']) ){
							$link1 = '&edit=1';
							$link2 = '/edit';
							$session_data = $this->session->userdata();
							$this->session->set_userdata('select_treatment', $session_data['doctor_allot']->name_treatment);
							$this->session->set_userdata('form_insert_id', $session_data['doctor_allot']->id_appointment);

							$doctor_link = '0';
						}else{
							$doctor_link = $this->session->userdata('id_doctor');
						}
				?>
				<nav class="header_right_navigate" style="margin-right: 66px;">
					<ul class="" >
						<li>
							<a href="<?php echo site_url('doctor/doctor_allotment?search='.$this->session->userdata('select_treatment').'&id_treatment='.$this->session->userdata('id_treatment').'&doctor='.$doctor_link.'&front_date='.$this->session->userdata('select_date'));?><?php echo isset($link1)?$link1:'';?>" <?php echo $page_level==1?"style='color:#000;'":"";?>>
								1. เลือกวัน
							</a>

						</li><li>
							
							<a href="<?php echo $this->session->userdata('form_insert_id')?site_url('main/form_insert/'.$this->session->userdata('form_insert_id')):'#';?><?php echo isset($link2)?$link2:'';?>" <?php echo $page_level==2?"style='color:#000;'":"";?>>
								2. กรอกข้อมูล
							</a>

						</li><li>

							<a href="<?php echo $this->session->userdata('form_var')?site_url('main/appointment_confirm'):'#';?><?php echo isset($link2)?$link2:'';?>" <?php echo $page_level==3?"style='color:#000;'":"";?>>
								3. ยืนยัน
							</a>
						
						</li>
					</ul>

					<a href="<?php echo base_url();?>" class="right_navi_back_btn"><i class="glyphicon glyphicon-chevron-left"></i> &nbsp;กลับหน้าหลัก</a>
				</nav>

				<?php }?>

			</div>
		</div>
	</div>