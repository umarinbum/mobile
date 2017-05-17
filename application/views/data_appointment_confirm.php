<?php
    $this->load->view('header');
    //print_r($this->session->userdata());
    //print_r($doctor_allot);
    $full_session = $this->session->userdata();
    //print_r($full_session);
?>

<form name="form" method="get" action="javascript:confirm_data(<?php echo $full_session['last_id_link'];?>)">
    <div class="container header_form" style="padding-bottom:0;">
        <div class="col-md-12 row no_show"><br><h4><span class="text_title_underline">ข้อมูลการนัดหมาย</span></h4><br></div>
        <div class="col-md-12 head_back">
<!--            <div class="row no_show">-->
            <div class="col-md-12 margin_top5" align="center"><img src="<?php echo base_url('assets/img/events.png');?>" class="no_show"> <span style="font-size: 22px; color:#272727;">ใบนัดหมาย</span></div><br>
            <div class="col-md-12 no_show"  align="right" style=" margin-top: -32px;"><span style="font-size: 18px; color:#272727 ">เลขที่นัดหมาย :</span><span style=" font-size:16px; color: #148de0"> <?php echo $this->session->userdata('generated_code');?></span></div>
<!--            </div>-->
        </div>
        <div class="col-md-12 top_title_underline bck_wi" style="padding-bottom:70px;">

            <div class="col-md-12">

                <div class="col-md-12 height50">
                    <div class="col-md-6" align="left" ><span class="font_text bouttom_title_underline ">โรงพยาบบาลยันฮี</div>

                    <div class="col-md-6 " align="right">
                    
                    <?php if( isset($edit_from_secret) ){?>
                        <a href="<?php echo site_url('appointment/appointment_print/'.$full_session['doctor_allot']->secret_code);?>" target="_blank"><span class="glyphicon glyphicon-print" style="color: #2e8ece; font-size: 2em;"></span></a>
                    <?php }?>

                    </div>

                </div>
                <div class="col-md-12 no_show">
                    <div class="col-md-12 " style="font-size: 14px;">454 ถนนจรัญสนิทวงศ์ แขวงบ้างอ้อ เขตบางพลัด กรุงเทพมหานคร 10700 </br>โทรสายด่วน 1723 FAX : 02435-7545 </div>
                </div>

                <div class="col-md-12 text_apm row">
                    <div class="col-md-4 row">ชื่อ - สกุล<span class="text_data pad53"><?php echo $full_session['form_var']['patient_name'];?></span></div>
                    <div class="col-md-8 row">เบอร์โทรศัพท์มือถือ <span class="text_data"><?php echo $full_session['form_var']['patient_tel'];?></span></div>
                </div>
                <div class="col-md-12 text_apm row">
                    <div class="col-md-4 row">แพทย์<span class="text_data pad73"><?php echo $full_session['doctor_allot']->name_doctor;?></span></div>
                    <div class="col-md-4 row">หัตถการ<span class="text_data pad62"><?php echo $this->session->userdata('select_treatment');?></span></div>
                    <div class="col-md-4 row">ศูนย์การรักษา<span class="text_data pad30"><?php echo $full_session['doctor_allot']->name_clinic;?></span></div>
                </div>
                <div class="col-md-12 col-xs-12 row text_apm bck_grey">
                    <div class="col-md-4 col-xs-7 row">นัดวันที่<span class="text_data"><span class="no_show">วัน </span><?php echo $this->common->thai_date_week($full_session['doctor_allot']->allot_date, 'day');?> ที่ <?php echo $this->common->thai_date($full_session['doctor_allot']->allot_date, 'full');?></span></div>
                    <div class="col-md-4 col-xs-5 border_left row">เวลา<span class="text_data"><?php echo substr($full_session['doctor_allot']->allot_start_time, 0, -3)." - ".date('H:i', strtotime('29 minutes', strtotime('2000-01-01 '.$full_session['doctor_allot']->allot_end_time)));?> น.</span></div>
                    <div class="col-md-4 no_show row"></div>
                </div>
                <div class="col-md-12 col-xs-12 text_apm row">
                    <div class="col-md-4 row">ความประสงค์<span class="text_data pad30"><?php echo $full_session['form_var']['patient_wish'];?></span></div>
                    <div class="col-md-4 row"></span></div>
                    <div class="col-md-4"></div>
                </div>
                <div class="col-md-12 no_show"><br>
                    <div class="col-md-3 text_apm row" style="color:#148de0;">การตรวจก่อนพบแพทย์ </div>
                    <div class="col-md-9 text_line row" ></div>
                </div>

                <div class="col-xs-12 row no_show2"><br>
                    <div class="col-xs-3 row text_line" ></div>
                    <div class="col-xs-6 row text_apm text-center" style="color:#148de0;">การตรวจก่อนพบแพทย์ </div>
                    <div class="col-xs-3 row text_line" ></div>
                </div>

                <div class="col-md-12" style="font-size: 16px"><br>
                    <div class="col-md-1 row" ><span style="text-decoration: underline;">หมายเหตุ</span></div>
                    <div class="col-md-11 row"> 1.วันนัดหมายให้ผู้ป่วยยื่นใบนัดหมายที่ เคาน์เตอร์เวชระเบียน <br/>
                        
                        2.<span style="text-decoration: underline;">กรุณานำบัตรนัดมายื่น ตรงตามวัน - เวลาที่นัดหมาย ก่อนล่วงหน้า 15 นาที </span>เพื่อความสะดวก และการรักษาที่มีคุณภาพ<br/>
                        3.หากท่านมีความจำเป็นต้องเปลี่ยนแปลงการนัดหมาย กรุณาทำการแก้ไขล่วงหน้า 2 วัน ได้ที่นี่ <a href=""></a>
                        
                    </div>
                </div>
                <div class="col-md-12 no_show" align="right" style="margin-top: -100px;">
                    <img src="<?php echo base_url('assets/img/stethoscopes 2.png');?>">
                </div>
            </div>

        </div>


        <div class="col-md-12" align="center" style="line-height: 50pt;">

            <button type="submit" class="btnn btn_deep_blue btn_width">ยืนยัน</button>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <?php $editz = isset($edit_from_secret)?$full_session['doctor_allot']->id_appointment.'/edit':$full_session['doctor_allot']->id_doctor_allotment;?>

            <a href="<?php echo site_url('main/form_insert').'/'.$editz;?>" class="btnn btn_deep_blue2 no_show" style="width: 110px;">ย้อนกลับ</a>

        </div>
    </div>

</form>

<!-- Modal -->
<div class="modal fade modal-dialog-center" id="myModal" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" >
        <div class="modal-content" style="border:solid 3px #3bacfa; border-radius:6px;">
            <div class="modal-body" style="line-height: 40pt;" >
               <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
                <div style="font-family:'supermarket';">
                <div align="center" style="font-size: 18px; color:#148de0;">ทำรายการสำเร็จเรียบร้อย</div>
                <div align="center" style="font-size: 18px; color:#148de0;">กรุณารอรับ  SMS <img src="<?php echo base_url('assets/img/sms.png');?>">  <span style="text-decoration: underline;">เพื่อรับรหัสลับ</span></div>
                <div align="center" style="font-size: 16px; ">สามารถนำรหัสลับมาตรวจสอบข้อมูลได้ <a href="<?php echo base_url();?>">ที่นี่</a></div>
                </div>

                <div class="text-center">
                    <a href="<?php echo site_url('main/final_appointment');?>" class="btnn btn_deep_blue no_show" style="width: 110px;">ตกลง</a>
                </div>
            </div>

        </div>
    </div>
</div>
<?php $this->load->view('footer'); ?>
