<?php $this->load->view('header');?>

<?php
	//print_r($this->session->userdata());
?>

<div class="container text-center box_title_header" style="padding-bottom:100px;">
	<div class="line_behind_h1 bck_grey"></div>
	<h1 class="header_h1 text-center title_color mar0 bck_white">นัดหมายแพทย์</h1>
</div>

<div class="container">
	<div class="row">

		<div class="col-md-6 col-xs-12">
			<?php $this->load->view('template/search_doctor_template.php');?>
		</div>

		<div class="col-md-6 col-xs-12">
			<div class="col-xs-12 box_default">
				<div class="row">
					
					<h3 class="title_header mar0">ตรวจสอบนัดหมาย</h3>

					<div class="col-xs-12">
						<h4 class="title_content">รหัสลับ</h4>

						<form class="box_group" method="post" action="<?php echo site_url('/appointment/appointment_detail');?>">
							<input type="text" placeholder="รหัสลับ" name="code" maxlength="6" minlength="1" required><button type="submit" class="inline_input"><i class="glyphicon glyphicon-play" aria-hidden="true"></i></button>
						</form>

						<!-- Load Social Login Template -->
						<?php $this->load->view('template/social_login_template');?>
					</div>

				</div>
			</div>
		</div>

	</div>
</div>

	<div id="myModal" class="modal fade ">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body">
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->
<?php $this->load->view('footer');?>