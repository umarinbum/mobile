<?php $this->load->view('header');?>
<div class="col-xs-12" style=" font-family: 'supermarket';">
    <div class="row">

        <div class="col-xs-12 bg_search">
            <form class="box_group mar_top20" method="post" action="<?php echo site_url($link_form);?>" >
                <div class="col-xs-12 input-group">
                    <input class="form-control data_font16" placeholder="ค้นหา" id="search"  name="search" required  style="font-family:supermarket;">
                    <input type="hidden" name="id_treatment" id="id_treatment" value="">
                </div><br>

<!--                <div class="col-xs-12 data_font_color_bl">-->
<!--                    <select class="" name="doctor" id="doctor">-->
<!--                        <option value="0">ไม่ระบุแพทย์</option>-->
<!--                    </select>-->
<!--                </div><br>-->
<!---->
<!--                <!--                                  <div class="col-md-12">-->
<!--                <!--                                      <select class="text-center" name="doctor" id="doctor"  style="display: inline-block;">-->
<!--                <!--                                          <option value="0">ไม่ระบุแพทย์</option>-->
<!--                <!--                                      </select><div class="inline_input " style="display: inline-block;"><i class=" glyphicon glyphicon-triangle-bottom" aria-hidden="true"></i></div>-->
<!--                <!--                                  </div><br>-->
<!--                <div class="col-xs-12">-->
<!--                    <input type="text"   id="datepicker" value="--><?php //echo date('d/m/Y',strtotime('+3day',strtotime(date("Y-m-d"))));?><!--"><div class="inline_input"><i class="glyphicon glyphicon-calendar" aria-hidden="true"></i></div>-->
<!--                </div>-->
<!--                <div align="center">-->
<!--                    <input class="btn-search-btn btn-lg active" type="submit" id="btn" name="submit" value="ค้นหา" >-->
<!---->
<!---->
<!--                </div>-->
            </form>
        </div>
    </div>
</div>
<?php $this->load->view('footer_h');?>