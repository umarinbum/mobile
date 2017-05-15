<?php $this->load->view('header');?>

<div class="container text-center box_title_header">
<!--    <h1 class="header_h1 text-center mar0 bck_white">ัดหมาย<span style="color:#43AFEB">แพทย์</span></h1><br>-->
	<h1 class="font_gray mar_top27" style="font-size: 23px;">นัดหมาย<span class="font_gray">แพทย์</span></h1>
<!--    <h1 class="font_color mar_top10">Doctor Appointment</h1>-->
</div>


<div class="margins">
	<div class="row">

		<div class="">
			<?php $this->load->view('template/search_doctor_template.php');?>
		</div>

		<div class="col-xs-12">
			<div class="col-xs-12">
				<div class="row">
                        <h3 class="font_gray" style="text-align: center; font-size: 23px;">ตรวจสอบ&nbsp;<span>"นัดหมาย"</span>&nbsp;<img src="http://mobile.dev/assets/img/events.png"></h3>
					<div class="col-xs-12 font_color">
						<form class="box_group" method="post" action="<?php echo site_url('/main/appointment_detail');?>">
							<input type="text" placeholder="รหัสลับ"><button type="submit"><i class="glyphicon glyphicon-play" aria-hidden="true"></i></button>
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