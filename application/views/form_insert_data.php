<?php $this->load->view('header_h'); ?>
<form name="form" method="post" action="<?php echo site_url('main/appointment_confirm');?>"
      xmlns="http://www.w3.org/1999/html">
<div class="col-xs-12" style=" font-family: 'supermarket';">
    <div class="row">
    <div class="col-xs-12 text-center text_title" style="line-height: 7pt;"><br><h4><span class="">ข้อมูลผู้ป่วย</span>&nbsp;<span style="color: red">*</span></h4><br></div>
    <div class="col-xs-12 " style="line-height: 45pt" >
        <div class="row">
       <div class="col-xs-12 bck_data" style="line-height: 40pt;">

            <div class="col-xs-12">
                <div class="row">
                    <div class="col-xs-3" style="margin-top: -7px;">ชื่อ</div>
                    <div class="col-xs-9"><input type="text" name="" id=""  class="form-control" required></div>
                </div>
                </div>

           <div class="col-xs-12">
               <div class="row">
                   <div class="col-xs-3" style="margin-top: -7px;">นามสกุล</div>
                   <div class="col-xs-9"><input type="text" name="" id=""  class="form-control" required></div>
               </div>
           </div>
            <div class="col-xs-12">
                <div class="row">
                    <div class="col-xs-3" style="margin-top: -7px;">เบอร์โทรศัพท์</div>
                    <div class="col-xs-9"><input type="text" name="" id=""  class="form-control" required></div>
                </div>
            </div>
           <div class="col-xs-12">
               <div class="row">
                   <div class="col-xs-12">ความประสงค์ / อาการ</div>
               </div>
           </div>
            <div class="col-xs-12">

                <textarea class="form-control" rows="3" placeholder="โปรดระบุ"></textarea>

<!--                <div class="col-xs-10" style="width: 100%; padding-right: 0"><div style="height:80px; overflow-y:scroll;" class="form-control"><div class="col-md-1" >หมายเหตุ</span></div>-->
<!--                    </div></div>-->
            </div>
           <div class="col-xs-12 row" style="padding-top: 20px; padding-right: 0px;">

                               <div class="col-xs-10" style="width: 100%; padding-right: 0"><div style="height:80px; overflow-y:scroll;" class="form-control"><div class="col-xs-1 box_font" style="padding-left: 0px;" >เงื่อนไข</span></div>
                                   </div></div>

               <!--                <div class="col-xs-10" style="width: 100%; padding-right: 0"><div style="height:80px; overflow-y:scroll;" class="form-control"><div class="col-md-1" >หมายเหตุ</span></div>-->
               <!--                    </div></div>-->
           </div>


            <div class="col-xs-12 text-center" style="padding-top:15px;line-height: 40pt">
              <label id="routes">  <input type="checkbox" name="" id="" value=""  required><span class="box_font" style="margin-top: 10px;">&nbsp;&nbsp;ยอมรับ</span></label>
            </div>
        </div>
    </div>
    <div class="col-xs-12" align="center" style="line-height: 50pt;">

        <input type="submit" class="btn-search-btn3 btn-lg active" value="ดำเนินการต่อ" style="width:100%;">

    </div>
    </div>
</div>
</form>


<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
               <div class="row " style="padding:0;  font-family:'supermarket';">
                   <div style="font-size:16px; font-weight:bold;" align="center">กรุณาเข้าสู้ระบบเพื่อบันทึกการจอง</div>
               <?php $this->load->view('template/social_login_template') ?>
               </div>

               <div class="text-center">
                    <button type="button" class="btn-search-btn2 btn-lg active" data-dismiss="modal">ข้ามขั้นตอนนี้ไป</button>
               </div>
            </div>

        </div>
<!--        <!-- /.modal-content-->-->
    </div>
<!--    <!-- /.modal-dialog -->-->
</div>
<!-- /.modal -->
<?php $this->load->view('footer_h'); ?>
