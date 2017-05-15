<div class="col-xs-12 box_default" style=" font-family: 'supermarket';">
				<div class="row">
					<h3 class="title_header mar0">กรุณาเลือก</h3>
					<div class="col-xs-12">
                              <form class="box_group" method="post" action="<?php echo site_url('main/appointment_table');?>" >
                                  <h5 class="title_content">หัตถการ</h5>
                                  <input type="text" placeholder="Search" id="search"  name="search" required style="font-family:supermarket;"  onchange="doctorid(this.value)"><div class="inline_input"><i class="glyphicon glyphicon-search" aria-hidden="true" ></i></div>
<!--                                  <select type="text" placeholder="Search" id="search"  required="required" >-->
<!--                                      <option  value="http://www.google.com" style="background-color: #00c300">Google</option>-->
<!--                                  </select><div class="inline_input"><i class="glyphicon glyphicon-search" aria-hidden="true"></i></div>-->

                                  <h5 class="title_content">ชื่อแพทย์</h5>
                                      <select class="doctor" name="doctor" id="doctor" style="display: inline-block;">
                                          <option>เลือกแพทย์</option>
                                      </select><div class="inline_input " style="display: inline-block;"><i class=" glyphicon glyphicon-triangle-bottom" aria-hidden="true"></i></div>
                                  <h5 class="title_content">วันที่</h5>
                                  <input type="text" placeholder="ไม่ระบุ"  id="datepicker"><div class="inline_input"><i class="glyphicon glyphicon-calendar" aria-hidden="true"></i></div>

                                  <div align="center">
                                   <input class="btn-search" type="submit" id="btn" name="submit" value="ค้นหา" >

                                  </div>
                              </form>
                          </div>
				</div>
			</div>