<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo $appointment[0]->appointment_firstname;?> <?php echo $appointment[0]->appointment_lastname;?></title>
    <?php
    if( isset($css_template) ){
        foreach( $css_template as $row ){
            echo "<link rel='stylesheet' type='text/css' href='".base_url().$row."'>"."\n";
        }
    }
    ?>
    <style type="text/css">
        .text_data{color:#148de0; margin-left: 20px;}
    </style>
</head>
<body>
<?php
$date_data = new DateTime($appointment[0]->date_appointment);
$date=$date_data->format('Y-m-d');
$time=$date_data->format('H:i');
$CI =& get_instance();
?>
<div class="container " style=" font-family: 'supermarket'; padding-bottom:100px;">
    <div class="col-xs-12 " style="background-color: #e6e6e5; padding: 15px">
        <div class="col-xs-10"  align="center" style="margin-top: 5px;" ><img src="<?php echo base_url('assets/img/events.png');?>"> <span style="font-size: 22px; color:#272727;">ใบนัดหมาย</span></div><br>
        <div class="col-xs-12"  align="right" style=" margin-top: -32px;"><span style="font-size: 18px; color:#272727 ">เลขที่นัดหมาย :</span><span style=" font-size:16px; color: #148de0"> <?php echo $appointment[0]->code_appointment;?></span></div>
    </div>
    <div class="col-xs-12 " style="background-color:#f3f3f1; padding: 10px; " >
        <div class="col-xs-12 " style="margin: 10px ;line-height: 18pt;">
        <div class="col-xs-12">
            <div class="col-xs-5" align="left" ><span style="color:#3779b2; font-size: 20px;">โรงพยาบบาลยันฮี</div>
            <div class="col-xs-5" align="right"></div>
        </div>
            <div class="col-xs-12">
            <div class="col-xs-10" style="font-size: 14px;">454 ถนนจรัญสนิทวงศ์ แขวงบ้างอ้อ เขตบางพลัด กรุงเทพมหานคร 10700 </br>โทรสายด่วน 1723 FAX : 02435-7545 </div>
        </div>

         <div class="col-xs-12 text_apm"><br>
            <div class="col-xs-4">ชื่อ - สกุล<span class="text_data">&nbsp;&nbsp;&nbsp;<?php echo $appointment[0]->appointment_firstname;?> <?php echo $appointment[0]->appointment_lastname;?></span></div>
            <div class="col-xs-4">เบอร์มือถือ<span class="text_data">&nbsp;&nbsp;&nbsp;<?php echo $appointment[0]->appointment_telephone;?></span></div>
             <div class="col-xs-2"></div>
         </div>
         <div class="col-xs-12 text_apm">
            <div class="col-xs-4 ">แพทย์<span class="text_data">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $appointment[0]->name_doctor;?></span></div>
            <div class="col-xs-3">หัตถการ<span class="text_data">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $appointment[0]->name_treatment;?></span></div>
            <div class="col-xs-3">ศูนย์การรักษา<span class="text_data">&nbsp;&nbsp;&nbsp;<?php echo $appointment[0]->name_clinic;?></span></div>
        </div>
        <div class="col-xs-12 text_apm">
            <div class="col-xs-4">นัดวันที่<span class="text_data">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $CI->common->thai_date_week($date,'no_time');?></span></div>
            <div class="col-xs-3">เวลา<span class="text_data">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $time; ?></span></div>
            <div class="col-xs-3"></div>
        </div>
        <div class="col-xs-12 text_apm">
            <div class="col-xs-5 ">ความประสงค์<span class="text_data">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $appointment[0]->comment;?></span></div>
            <div class="col-xs-4"></span></div>
            <div class="col-xs-3"></div>
        </div>
        <div class="col-xs-12"><br>
            <div class="col-xs-3 text_apm" style="color:#148de0;">การตรวจก่อนพบแพทย์ </div>
            <div class="col-xs-9 text_line" ></div></div>
            <div class="col-xs-12" style="font-size: 16px"><br>
                <div class="col-xs-1" ><span style="text-decoration: underline;">หมายเหตุ</span></div>
                <div class="col-xs-11"> 1.วันนัดหมายให้ผู้ป่วยยื่นใบนัดหมายที่ เคาน์เตอร์เวชระเบียน แผนกศัลยกรรม ชั้น 2<br/>
                    (กรณีมาก่อนวันนัด กรุณาแจ้งให้เจ้าหน้าที่ทราบทุกครั้ง) <br/>
                    2.<span style="text-decoration: underline;">กรุณานำบัตรนัดมายื่น ตรงตามวัน - เวลาที่นัดหมาย </span>เพื่อความสะดวก และการรักษาที่มีคุณภาพ<br/>
                    3.หากท่านมีความจำเป็นต้องเปลี่ยนแปลงการนัดหมาย กรุณาโทรแจ้งล่วงหน้า 1 วัน<br/>
                    โทร. 0-2879-0300 ต่อ 10264 , 10266 , 10267 , 10268<br/>
                    4.<span style="text-decoration: underline;">กรุณามาก่อนเวลานัดหมายล่วงหน้า 15 นาที</span> เพื่อความสะดวกของผู้มารับบริการทุกท่าน
                </div>
        </div>
            <div class="col-xs-12" align="right" style="    margin-top: -100px;">
                <img src="<?php echo base_url('assets/img/stethoscopes 2.png');?>">
            </div>
        </div>
    </div>
</div>
</body>
</html>

