<?php
	$this->load->view('header');
	//print_r($this->session->userdata());
?>


<div class="container pad0">
		
	<div class="box_title_header">
		<h3 class="box_title_h">ข้อมูลการนัดหมายทั้งหมด</h3>

        <p class="right_side_name">คุณ ณภัทร พงษ์สวัสดิ์</p>
	</div>

	<div class="col-md-6 col-xs-12 data_appointment_block"> <!-- Start Data Block -->
        <div class="col-md-12 head_title ">
            <h4 class="col-md-12 text-right">เลขที่นัดหมาย : <span>123456789</span></h4>
        </div>

        <div class="col-md-12 bck_data" >
            <div class="col-md-7 col-xs-7 pad0">
            	<p class="col-md-4">แพทย์</p> <span>นพ.ปริญญา</span>
            </div>
            <div class="col-md-5 pad0">
            	<p class="col-md-5 pad0">หัตถการ</p> <span>ทำตา 2 ชั้น</span>
            </div>

            <div class="col-md-7 col-xs-7 pad0">
            	<p class="col-md-4">นัดวันที่</p> <span>นพ.ปริญญา</span>
            </div>
            <div class="col-md-5 pad0">
            	<p class="col-md-5 pad0">เวลา</p> <span>ทำตา 2 ชั้น</span>
            </div>

            <div class="col-xs-12 pad0">
            	<p class="col-xs-5">ความประสงค์ / อาการ</p> <span>ทำตา 2 ชั้น</span>
            </div>

            <div class="col-xs-12 text-center box_btn">
				<a href="#" class="btnn btn_blue btnn_sm">แก้ไขนัด</a>
				&nbsp;&nbsp;&nbsp;
				<a href="javascript:toggle_modal()" class="btnn btn_blue2 btnn_sm">ยกเลิกนัด</a>
			</div>
        </div>

    </div> <!-- End Data Block -->

    <div class="col-md-6 col-xs-12 data_appointment_block"> <!-- Start Data Block -->
        <div class="col-md-12 head_title ">
            <h4 class="col-md-12 text-right">เลขที่นัดหมาย : <span>123456789</span></h4>
        </div>

        <div class="col-md-12 bck_data" >
            <div class="col-md-7 col-xs-7 pad0">
            	<p class="col-md-4">แพทย์</p> <span>นพ.ปริญญา</span>
            </div>
            <div class="col-md-5 pad0">
            	<p class="col-md-5 pad0">หัตถการ</p> <span>ทำตา 2 ชั้น</span>
            </div>

            <div class="col-md-7 col-xs-7 pad0">
            	<p class="col-md-4">นัดวันที่</p> <span>นพ.ปริญญา</span>
            </div>
            <div class="col-md-5 pad0">
            	<p class="col-md-5 pad0">เวลา</p> <span>ทำตา 2 ชั้น</span>
            </div>

            <div class="col-xs-12 pad0">
            	<p class="col-xs-5">ความประสงค์ / อาการ</p> <span>ทำตา 2 ชั้น</span>
            </div>

            <div class="col-xs-12 text-center box_btn">
				<a href="#" class="btnn btn_blue btnn_sm">แก้ไขนัด</a>
                &nbsp;&nbsp;&nbsp;
                <a href="javascript:toggle_modal()" class="btnn btn_blue2 btnn_sm">ยกเลิกนัด</a>
			</div>
        </div>

    </div> <!-- End Data Block -->


    <div class="col-md-6 col-xs-12 data_appointment_block"> <!-- Start Data Block -->
        <div class="col-md-12 head_title ">
            <h4 class="col-md-12 text-right">เลขที่นัดหมาย : <span>123456789</span></h4>
        </div>

        <div class="col-md-12 bck_data" >
            <div class="col-md-7 col-xs-7 pad0">
            	<p class="col-md-4">แพทย์</p> <span>นพ.ปริญญา</span>
            </div>
            <div class="col-md-5 pad0">
            	<p class="col-md-5 pad0">หัตถการ</p> <span>ทำตา 2 ชั้น</span>
            </div>

            <div class="col-md-7 col-xs-7 pad0">
            	<p class="col-md-4">นัดวันที่</p> <span>นพ.ปริญญา</span>
            </div>
            <div class="col-md-5 pad0">
            	<p class="col-md-5 pad0">เวลา</p> <span>ทำตา 2 ชั้น</span>
            </div>

            <div class="col-xs-12 pad0">
            	<p class="col-xs-5">ความประสงค์ / อาการ</p> <span>ทำตา 2 ชั้น</span>
            </div>

            <div class="col-xs-12 text-center box_btn">
				<a href="#" class="btnn btn_blue btnn_sm">แก้ไขนัด</a>
                &nbsp;&nbsp;&nbsp;
                <a href="javascript:toggle_modal()" class="btnn btn_blue2 btnn_sm">ยกเลิกนัด</a>
			</div>
        </div>

    </div> <!-- End Data Block -->



	
	<div class="col-xs-12 text-center footer_btn_box">
		<a href="<?php echo site_url('main/search_doctor');?>" class="btnn btn_blue_foot">นัดหมายใหม่</a>
	</div>


</div>


<!-- Modal -->
<div class="modal fade  modal-dialog-center" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body" style="font-family: supermarket; line-height: 60pt;">
                <div align="center" style="font-size: 18px; margin: 20px ;line-height: 25pt;"><span style="text-decoration: underline;"> ยืนยัน </span>การยกเลิกนัดหมาย</div>
                <div align="center">

                    <a href="<?php echo site_url('main/index');?>" class="btnn btn_blue" style="width:110px;">ตกลง</a>
                    &nbsp;&nbsp;&nbsp;
                    <a href="#" class="btnn btn_blue2" style="width:110px;">ยกเลิก</a>

                </div>
            </div>

        </div>
    </div>
</div>


<?php $this->load->view('footer_h');?>