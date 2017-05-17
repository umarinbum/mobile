						<div class="col-xs-12 box_radius">

							<?php if( !$this->session->userdata('login') ){?>

                            <h3 class="title_login text-center">กรุณาเข้าสู่ระบบ &nbsp;<i class="fa fa-lock" aria-hidden="true"></i></h3>

							<div class="col-xs-12 box_social mar_top40">

								<div class="col-xs-4">
									<div class="col-xs-12 btn_social bck_li pad0">
										<a href="#">
											<i><img src="<?php echo base_url();?>/assets/img/line.png" /></i>
											<span>Line</span>
										</a>
									</div>
								</div>
								
								<div class="col-xs-4">
									<div class="col-xs-12 btn_social bck_fb pad0">
										<a href="<?php echo $this->facebook->login_url();?>">
											<i class="fa fa-facebook" aria-hidden="true"></i>
											<span>Facebook</span>
										</a>
									</div>
								</div>

								<div class="col-xs-4">
									<div class="col-xs-12 btn_social bck_gg pad0">
										<a href="<?php echo $this->googleplus->loginURL();?>">
											<i class="fa fa-google" aria-hidden="true"></i>
											<span>Google</span>
										</a>
									</div>
								</div>

							</div>

							<div class="col-xs-12 mar_top30">
								<h4 class="text-center"><b>Login</b> ผ่านช่องทาง Social เพื่อบันทึกข้อมูลการนัดหมาย</h4>
							</div>

							<?php 
								}else{
									$user_profile = $this->session->userdata('user_profile');

									if( $user_profile['type'] == 'f' ){
										$img_social = 'fb';
										$bck_color = '3a5897';
									}else if( $user_profile['type'] == 'g' ){
										$img_social = 'gg';
										$bck_color = 'dc4a38';
									}else{
										$img_social = 'li';
										$bck_color = '00c300';
									}
							?>

								<div class="col-xs-12 box_social mar_top40">
									<div class="text-center">

										<div class="box_display">
											<div class="circle_box" style="border:solid 1px #<?php echo $bck_color;?>;">
												<img src="<?php echo $user_profile['picture'];?>">
											</div>

											<img src="<?php echo base_url();?>assets/img/circle-<?php echo $img_social;?>.png" id="social_sm">
										</div>

										<div class="box_display_name">
											<p><?php echo $user_profile['name'];?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><a href="<?php echo site_url('auth/session_destroy');?>">Logout</a></span></p>
										</div>


										<div class="box_many">
											<p>รายการนัดหมาย <?php echo $many_appointment;?> รายการ</p> &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo site_url('main/data_appointment');?>" class="btnn btn_deep_blue">ดูข้อมูล</a>
										</div>

									</div>
								</div>

							<?php }?>
								
						</div>