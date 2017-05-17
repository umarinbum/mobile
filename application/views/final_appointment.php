<?php $this->load->view('header'); ?>

<style>
	.blue_gradient{background: #fff;
        background: -webkit-linear-gradient(left, #8bd4ff , #fff);
        background: -o-linear-gradient(right, #8bd4ff, #fff);
        background: -moz-linear-gradient(right, #8bd4ff, #fff);
        background: linear-gradient(to right, #8bd4ff , #fff);
	}

	.ul_social{list-style:none; height:44px;}
	.ul_social li{display:inline-block; padding:0 15px;}
	.ul_social li img{height:44px;}
</style>

<div class="container" style="position:relative; height:calc(100% - 60px); font-family:'supermarket';">

	<div style="margin-top:75px; height:130px;" class="text-center">
		<div style="position:absolute; height:130px; width:450px;" class="blue_gradient"></div>

		<h1 style="position:relative; margin:0; height:130px; line-height:130px; font-size:50px; color:#46baff; z-index:5;">ขอขอบคุณที่ใช้บริการ</h1>
	</div>

	<img src="<?php echo base_url();?>assets/img/ear-doctor.png" style="position:absolute; right:170px; top:180px;">


	<div style="position:relative; margin-top:150px; width:100%; height:44px; text-align:center;">
		<nav>
			<ul class="ul_social">
				<li>
					<a href="#"><img src="<?php echo base_url();?>assets/img/circle-fb.png"></a>
				</li><li>
					<a href="#"><img src="<?php echo base_url();?>assets/img/circle-gg.png"></a>
				</li><li>
					<a href="#"><img src="<?php echo base_url();?>assets/img/circle-li.png"></a>
				</li>
			</ul>
		</nav>

		<h3 style="position:absolute; top:0; left:250px; margin:0; height:44px; line-height:44px; color:#46baff;">สามารถติดตามข่าวสารได้ที่</h3>
	</div>

	<div style="position:relative; margin-top:100px; text-align:center;">
		<a href="<?php echo base_url();?>" class="btnn" style="padding:13px 30px; border:solid 1px #46baff; font-size:25px; color:#999;">กลับสู่หน้าหลัก</a>
	</div>

	<img src="<?php echo base_url();?>assets/img/back.png" style="position:absolute; right:0; bottom:60px;">

</div>


<?php $this->load->view('footer'); ?>