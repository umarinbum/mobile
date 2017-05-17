<?php
    $this->load->view('header');
    $editz = isset($edit_from_secret)?'/edit/':'';
    //print_r($result);
    //print_r($this->session->userdata());
?>
<form method="post" action="<?php echo site_url('main/appointment_confirm').$editz;?>">

  <div class="container" style="font-family:'supermarket'; padding-bottom:100px;">
    <div class="col-md-12 mar_top35 no_show"><br><h4><span class="text_title_underline no_show">กรอกข้อมูล</span></h4><br></div>
<!--      <div class="col-md-12 text-center "><br><h4><span class="text_media">ข้อมูลผู้ป่วย</span></h4><br></div>-->
      <div class="col-md-7 no_show">
        <div class="col-md-12 head_title ">
            <div class="col-md-4" aligh="right">แพทย์ที่นัดหมาย</div>
        </div>
        <div class="col-md-12 bck_data " >
            <div class="col-md-12">
                <div class="col-md-12 row">
            <div class="col-md-6 mar_bot10"><div class="col-md-4 row">แพทย์</div><span class="text_data"><?php echo $doctor_allot->name_doctor;?></span></div>
                    <div class="col-md-6 "></div>
                </div>
                <div class="col-md-12 row">
                <div class="col-md-6 mar_bot10"><div class="col-md-4 row">หัตถการ</div><span class="text_data"><?php echo $this->session->userdata('select_treatment');?></span></div>
                <div class="col-md-6">ศูนย์การรักษา<span class="text_data"><?php echo $doctor_allot->name_clinic;?></span></div>
               </div>
                </div>
        </div>
    </div>

    <div class="col-md-5 no_show">
         <div class="col-md-12 head_title">
             <div class="col-md-4" aligh="right">เวลาที่นัดหมาย</div>
         </div>
            <div class="col-md-12 bck_data">
                <div class="col-md-12">
                <div class="col-md-10 mar_bot10"><div class="col-md-3 row">นัดวัน</div><span class="text_data"><?php echo $this->common->thai_date_week($doctor_allot->allot_date,'no_time');?></span></div>
                    <div class="col-md-2 "></div>
                    <div class="col-md-10 mar_bot10"><div class="col-md-3 row">เวลา</div><span class="text_data"><?php echo substr($doctor_allot->allot_start_time, 0, -3)." - ".date('H:i', strtotime('29 minutes', strtotime('2000-01-01 '.$doctor_allot->allot_end_time)));?> น.</span></div>
                <div class="col-md-2" align="right" style="background-repeat:no-repeat; background-attachment:fixed; margin-top:-15px;">
                    <img src="<?php echo base_url('assets/img/doc.png');?>"></div>
                </div>
            </div>
    </div>

      <div class="col-md-12 xs_nopadding"><div class="no_show"><hr></div>
        <div class="col-md-12 head_title" >
            <div class="col-xs-12 text_c margin_top20">ข้อมูลผู้ป่วย <span style="color:red">*</span></div>


            <?php
                if( $this->session->userdata('login') ){
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

            <div style="position:absolute; top:6px; right:20px; height:38px;">
                <div class="box_display" style="height:38px;">
                    <div class="circle_box" style="width:36px; height:36px; border:solid 1px #<?php echo $bck_color;?>;">
                        <img src="<?php echo $user_profile['picture'];?>" style="width:36px;">
                    </div>

                    <img src="<?php echo base_url();?>assets/img/circle-<?php echo $img_social;?>.png" id="social_sm" style="width:20px;">
                </div>

                <div class="box_display_name" style="height:38px; line-height:38px;">
                    <p style="font-size:15px;"><?php echo $user_profile['name'];?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><a href="<?php echo site_url('auth/session_destroy');?>">Logout</a></span></p>
                </div>
            </div>

            <?php }?>

        </div>
        <div class="col-md-12 bck_data margin_top45 top_title_underline">

            <?php
                $array = $this->session->userdata();
                //print_r($array);

                $name_in_form = '';
                if( !isset($array['form_var']) ){
                    if( isset($array['user_profile']) ){
                        $name_in_form = $array['user_profile']['name'];
                    }
                }else if( isset($array['form_var']) ){
                    $name_in_form = $array['form_var']['patient_name'];
                }
            ?>

            <div class="col-md-6 col-xs-12 mar_bot10 xs_nopadding">


                <p class="col-md-3 col-xs-3 xs_nopadding">ชื่อ - สกุล</p>
                <div class="col-md-9 col-xs-9 xs_nopadding"><input type="text" name="patient_name" value="<?php echo $name_in_form;?>" class="form-control" ></div>
                </div>
 <div class="col-md-6 col-xs-12 mar_bot10 xs_nopadding">
                <p class="col-md-4 col-xs-3 xs_nopadding">เบอร์โทรศัพท์มือถือ</p>
                <div class="col-md-8 col-xs-9 xs_nopadding"> <input type="text" name="patient_tel" value="<?php echo isset($array['form_var'])?$array['form_var']['patient_tel']:'';?>" id="phone" class="form-control"  maxlength="10" placeholder="เบอร์มือถือ 10 หลัก" <?php //echo isset($edit_from_secret)?'readonly':'';?>> </div>


            </div>

            <div class="col-md-12 xs_nopadding">

                <p class="col-md-2 col-xs-12 xs_nopadding">ความประสงค์/อาการ</p>
                <div class="col-md-10 xs_nopadding"><textarea name="patient_wish" rows="5" class="form-control" placeholder="โปรดระบุ..." ><?php echo isset($array['form_var'])?$array['form_var']['patient_wish']:'';?></textarea></div>

            </div>

            <div class="col-md-12 xs_nopadding" style="padding-top:15px">

                <div class="col-md-offset-2 col-md-10 xs_nopadding">
                    <div style="height:80px; overflow-y:scroll;" class="form-control">
                        <div class="col-md-1 xs_nopadding" >
                            <span style="text-decoration: underline;">หมายเหตุ</span>
                        </div>
                        <div class="col-md-11 xs_nopadding">
                            1.วันนัดหมายให้ผู้ป่วยยื่นใบนัดหมายที่ เคาน์เตอร์เวชระเบียน <br/>
                            2.<span style="text-decoration:underline;">กรุณานำบัตรนัดมายื่น ตรงตามวัน - เวลาที่นัดหมาย ก่อนล่วงหน้า 15 นาที </span>เพื่อความสะดวก และการรักษาที่มีคุณภาพ<br/>
                            3.หากท่านมีความจำเป็นต้องเปลี่ยนแปลงการนัดหมาย กรุณาทำการแก้ไขล่วงหน้า 2 วัน ได้ที่นี่ <a href=""></a>
                        </div>
                    </div>

                </div>
            </div>



            <div class="col-md-12 text-center" style="padding-top:15px;">
              <label id="routes">  <input  class="chk"  type="checkbox" name="routes" value="routes"  required><span style="margin-top: 10px"> ยอมรับเงื่อนไข</span></label>
            </div>


        </div>
    </div>

    <?php
    $edits = isset($edit_from_secret)?'&edit=1':'';
    ?>

    <div class="col-md-12" align="center" style="line-height: 50pt;">
        <button type="submit" id="submit" class="btnn btn_deep_blue btn_width">ดำเนินการต่อ</button>
        &nbsp;&nbsp;&nbsp;&nbsp;
        <a href="<?php echo site_url('doctor/doctor_allotment?search='.$this->session->userdata('select_treatment').'&id_treatment='.$this->session->userdata('id_treatment').'&doctor=0&front_date='.$this->session->userdata('select_date')).$edits;?>" class="btnn btn_deep_blue2 no_show" style="width:110px;">เลือกวันที่</a>

        <?php if( isset($edit_from_secret) ){?>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <a href="<?php echo site_url('main/data_appointment');?>" class="btnn btn_blue2 no_show" style="width:110px;">ย้อนกลับ</a>

        <?php }?>

    </div>
</div>
    </div>

</form>



<div class="modal fade" id="myModal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

        <div class="modal-body">
            <div class="row" style="padding:0 15px;">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="clode_social_modal()"><span aria-hidden="true">&times;</span></button>
                <h3 class="text-center" style="font-family:'supermarket';">กรุณาเข้าสู่ระบบเพื่อบันทึกการจอง</h3>

                <?php $this->load->view('template/social_login_template.php');?>
            </div>
        </div>
            
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<?php $this->load->view('footer'); ?>

<script type='text/javascript'>

    $('#submit').prop("disabled", true);
    $('input:checkbox').click(function() {
        if ($(this).is(':checked')) {
            $('#submit').prop("disabled", false);
        } else {
            if ($('.chk').filter(':checked').length < 1){
                $('#submit').attr('disabled',true);}
        }
    });

    $("#phone").on("keyup", function(e) {
        e.target.value = e.target.value.replace(/[^\d]/, "");
        if (e.target.value.length === 10) {
// do stuff
            var ph = e.target.value.split("");
            ph.splice(3, 0, "-"); ph.splice(7, 0, "-");
            $("input").html(ph.join(""))
        }
    });
</script>
