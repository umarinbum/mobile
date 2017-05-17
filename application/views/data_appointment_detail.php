<?php $this->load->view('header');
$date_data = new DateTime($appointment[0]->date_appointment);
$date=$date_data->format('Y-m-d');
$time=$date_data->format('H:i');
$CI =& get_instance();
//print_r($appointment);
//print_r($this->session->userdata());
?>
<div class="container header_form" style=" font-family: 'supermarket'; padding-bottom:100px; padding: 25px;">
    <div class="row">
    <div class="col-md-12 no_show"><br><h4><span class="text_title_underline ">ข้อมูลการนัดหมาย</span></h4><br></div>

    </div>


    <div class="col-md-12 row head_title" style=" height: 64px;">
        <div class="col-md-12 row" align="center" style="margin-top: 5px;" ><img src="<?php echo base_url('assets/img/events.png');?>" class="no_show"> <span style="font-size: 22px; color:#272727;">ใบนัดหมาย</span></div><br>
        <div class="col-md-12 mar_top99 header_blue row" align="right" style=" "><span style="font-size: 18px; color:#272727 ">เลขที่นัดหมาย :</span><span style=" font-size:21px; color: #148de0"> <?php echo $appointment[0]->code_appointment;?></span></div>
    </div>
    <div class="col-md-12 row top_title_underline bck_data" style="padding-bottom:50px;">
        <div class="col-md-12 col-xs-12" style="line-height: 18pt;">
        <div class="col-md-12 col-xs-12">
                <div class="col-md-6 col-xs-12" align="left" ><span class="bouttom_title_underline" style="color:#3779b2; font-size: 20px;">โรงพยาบบาลยันฮี</div>
                <div class="col-md-6 no_show " align="right"><a href="<?php echo site_url('appointment/appointment_print/'.$appointment[0]->secret_code);?>" target="_blank"><span class="glyphicon glyphicon-print" style="color: #2e8ece; font-size: 2em;"></span></a></div>
        </div>
            <div class="col-md-12 no_show ">
            <div class="col-md-12" >454 ถนนจรัญสนิทวงศ์ แขวงบ้างอ้อ เขตบางพลัด กรุงเทพมหานคร 10700 </br>โทรสายด่วน 1723 FAX : 02435-7545 </div>
        </div>

            <div class="col-md-12 col-xs-12 text_apm"><br>
            <div class="col-md-4 col-xs-12"><div class="col-sm-4 col-xs-3 row">ชื่อ - สกุล </div>
                <span class="text_data title_color pad3">
                    <?php echo $appointment[0]->appointment_firstname;?> <?php echo $appointment[0]->appointment_lastname;?>
                 </span>

            </div>
            <div class="col-md-4 col-xs-12"><div class="col-sm-4 col-xs-3 row">เบอร์มือถือ</div><span class="text_data pad15 title_color"><?php echo $appointment[0]->appointment_telephone;?></span></div>
            </div>
            <div class="col-md-4"></div>
            <div class="col-md-12 col-xs-12 text_apm">
            <div class="col-md-4 col-xs-12"><div class="col-sm-4 col-xs-3 row">แพทย์</div><span class="text_data pad3 title_color"><?php echo $appointment[0]->name_doctor;?></span></div>
            <div class="col-md-4 col-xs-12 "><div class="col-sm-4 col-xs-3 row">หัตถการ</div><span class="text_data pad12 title_color"><?php echo $appointment[0]->name_treatment;?></span></div>
            <div class="col-md-4 col-xs-12"><div class="col-sm-4 col-xs-3 row">ศูนย์การรักษา</div><span class="text_data title_color"><?php echo $appointment[0]->name_clinic;?></span></div>
            </div>
<!---->
<!--            <div class="col-md-12 col-xs-12 row text_apm bck_grey">-->
<!--                <div class="col-md-5 col-xs-9 row">นัดวันที่<span class="text_data pad_le33 title_color">--><?php //echo $CI->common->thai_date_week($date,'no_time');?><!--&nbsp;&nbsp;&nbsp;</span></div>-->
<!--                <div class="col-md-4 col-xs-3 row pad25 border_left">เวลา<span class="text_data pad_le39 title_color">--><?php //echo $time; ?><!--</span></div>-->
<!--                <div class="col-md-3 no_show row "></div>-->
<!--            </div>-->

            <div class="col-md-12 col-xs-12  text_apm bck_grey">
                <div class="col-md-4 col-xs-6 "><div class="col-sm-4 col-xs-5 row">นัดวันที่</div><span class="text_data  title_color"><?php echo $CI->common->thai_date_week($appointment[0]->allot_date,'no_time');?></span></div>
                <div class="col-md-4 col-xs-3  pad25 border_left"><div class="col-sm-4 col-xs-6 row">เวลา</div><span class="text_data  title_color"><?php echo $time; ?></span></div>
                <div class="col-md-4 no_show  "></div>
            </div>

            <div class="col-md-12 col-xs-12  text_apm">

                <div class="col-sm-4 col-xs-3 row">ความประสงค์</div>
                <p class="col-xs-9 row" style="margin-top:0; height:85px; overflow:hidden; color:#148de0;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo strip_tags($appointment[0]->comment);?></p>

        <div class="col-md-3 text_apm no_show" style="color:#148de0;">การตรวจก่อนพบแพทย์ </div>
        <div class="col-md-9 text_line no_show" ></div>
            </div>
            <div class="col-xs-12  no_show2"><br>
                <div class="col-xs-3  text_line" ></div>
                <div class="col-xs-5 text_apm" style="color:#148de0;">การตรวจก่อนพบแพทย์ </div>
                <div class="col-xs-3  text_line" ></div>
            </div>

            <div class="col-md-12 " style="font-size: 16px"><br>
                <div class="col-md-1 " ><span style="text-decoration: underline;">หมายเหตุ</span></div>
                <div class="col-md-11"> 1.วันนัดหมายให้ผู้ป่วยยื่นใบนัดหมายที่ เคาน์เตอร์เวชระเบียน <br/>
                    2.<span style="text-decoration: underline;">กรุณานำบัตรนัดมายื่น ตรงตามวัน - เวลาที่นัดหมาย ก่อนล่วงหน้า 15 นาที </span>เพื่อความสะดวก และการรักษาที่มีคุณภาพ<br/>
                    3.หากท่านมีความจำเป็นต้องเปลี่ยนแปลงการนัดหมาย กรุณาทำการแก้ไขล่วงหน้า 2 วัน ได้ที่นี่ <a href=""></a> 
                </div>
            </div>
            <div class="col-md-12 no_show" align="right" style="margin-top: -100px;">
                <img src="<?php echo base_url('assets/img/stethoscopes 2.png');?>">
            </div>
        </div>
    </div>



    <div class="col-md-12 no_show" align="center" style="line-height: 46pt; ">

        <a href="<?php echo site_url('main');?>" class="btnn btn_deep_blue no_show" style="width:110px; ">ย้อนกลับ</a>
        &nbsp;&nbsp;&nbsp;
        <a href="<?php echo site_url('main/form_insert/'.$id = $appointment[0]->id_appointment.'/edit');?>" class="btnn btn_deep_blue2 btn_width2 " style="display: inline-block;">แก้ไขนัดหมาย</a>
        &nbsp;&nbsp;&nbsp;
        <a href="#" class="btnn btn_blue3 btn_width2" data-toggle="modal" data-target="#myModal" style="display: inline-block; width:120px;">ยกเลิกนัดหมาย</a>

    </div>

</div>

<div class="col-md-12" align="center" style="position:fixed; height:40px; line-height:40px; background-color:#43AFEB; width: 100%; bottom:0;left: 0; ">
    <a href="<?php echo site_url('main/form_insert/'.$id = $appointment[0]->id_appointment.'/edit');?>"  style="display: inline-block; width:48%; height:40px; font-family: 'supermarket'; color: #ffffff;font-size: 18px;">แก้ไขนัดหมาย</a><a href="#" data-toggle="modal" data-target="#myModal" style="display: inline-block; width: 48%; height: 40px;font-family: 'supermarket'; color: #ffffff;font-size: 18px;border-style: solid none;  border-top: none;border-bottom: none;  border-left: solid #C0C0C0;">ยกเลิกนัดหมาย</a>

    

</div>

<!-- Modal -->
<div class="modal fade  modal-dialog-center" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body" style="font-family:'supermarket'; line-height: 60pt;">
                <div align="center" style="font-size: 18px; margin: 20px ;line-height: 25pt;"><span style="text-decoration: underline;"> ยืนยัน </span>การยกเลิกนัดหมาย</div>
                <div align="center">

                    <a href="<?php echo site_url('main/index');?>" class="btnn btn_blue" style="width:110px;">ตกลง</a>
                    &nbsp;&nbsp;&nbsp;
                    <a href="#" class="btnn btn_blue2" data-dismiss="modal" aria-label="Close" style="width:110px;">ยกเลิก</a>

                </div>
            </div>

        </div>
    </div>
</div>
<div class="no_show">
<?php $this->load->view('footer');?>
</div>
