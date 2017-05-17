<?php
	$this->load->view('header');
	//print_r($this->session->userdata());
    //print_r($get_appointment);
    $session_data = $this->session->userdata();
?>


<div class="container pad0">
		
	<div class="box_title_header no_show">
		<h3 class="box_title_h ">ข้อมูลการนัดหมายทั้งหมด</h3>

        <p class="right_side_name no_show"><?php echo $session_data['user_profile']['name'];?></p>
	</div>

    <?php
        foreach( $get_appointment as $row ){
    ?>

    <div class="col-md-6 col-xs-12 data_appointment_block"> <!-- Start Data Block -->
        <div class="col-md-12 head_title ">
            <h4 class="col-md-12 text-right">เลขที่นัดหมาย : <span><?= $row->code_appointment;?></span></h4>
        </div>

        <div class="col-md-12 bck_data" >
            <div class="col-md-7 col-xs-7 pad0">
            	<p class="col-md-4">แพทย์</p> <span><?= $row->name_doctor;?></span>
            </div>
            <div class="col-md-5 pad0">
            	<p class="col-md-5 pad0">หัตถการ</p> <span><?= $row->name_treatment;?></span>
            </div>

            <div class="col-md-7 col-xs-7 pad0">
            	<p class="col-md-4">นัดวันที่</p> <span><?= $this->common->thai_date_week($row->allot_date, 'no_time');?> </span>
            </div>
            <div class="col-md-5 pad0">
            	<p class="col-md-5 pad0">เวลา</p> <span><?= substr($row->allot_time_start, 0, -3)." - ".date('H:i', strtotime('29 minutes', strtotime('2000-01-01 '.$row->allot_time_end)));?> น.</span>
            </div>

            <div class="col-xs-12 pad0">
            	<p class="col-xs-12" style="position:relative; margin-top:20px;">ความประสงค์ / อาการ <a href="javascript:more_detail('<?= $row->comment;?>')" style="position:absolute; right:15px; text-decoration:underline;">รายละเอียด</a></p> 
                <p class="col-xs-12" style="margin-bottom:0; height:60px; line-height:29px; overflow:hidden; color:#148de0;">&nbsp;&nbsp;&nbsp;&nbsp;<?= $row->comment;?></p>
            </div>

            <div class="col-xs-12 text-center box_btn">
				<a href="<?php echo site_url('main/form_insert');?>/<?= $row->id_appointment;?>/edit" class="btnn btn_blue btnn_sm">แก้ไขนัด</a>
                &nbsp;&nbsp;&nbsp;
                <a href="javascript:toggle_modal(<?= $row->id_appointment;?>)" class="btnn btn_blue2 btnn_sm">ยกเลิกนัด</a>
			</div>
        </div>

    </div> <!-- End Data Block -->

    <?php }?>


	
	<div class="col-xs-12 text-center footer_btn_box">
		<a href="<?php echo site_url('main/search_doctor');?>" class="btnn btn_blue_foot">นัดหมายใหม่</a>
	</div>


</div>


<!-- Modal -->
<div class="modal fade  modal-dialog-center" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body" style="font-family:'supermarket'; line-height: 60pt;">
                <div align="center" style="font-size: 18px; margin: 20px ;line-height: 25pt;"><span style="text-decoration: underline;"> ยืนยัน </span>การยกเลิกนัดหมาย</div>
                <div align="center">

                    <a href="#" class="btnn btn_blue" id="btn_modal_link" style="width:110px;">ตกลง</a>
                    &nbsp;&nbsp;&nbsp;
                    <a href="#" class="btnn btn_blue2" data-dismiss="modal" aria-label="Close" style="width:110px;">ยกเลิก</a>

                </div>
            </div>

        </div>
    </div>
</div>


<!-- Modal 2 -->
<div class="modal fade  modal-dialog-center" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <p id="modal_2_p"></p>
            </div>

        </div>
    </div>
</div>


<?php $this->load->view('footer');?>