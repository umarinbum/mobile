<style>
    .e
    {
        border-bottom:1px solid #D1D0CE;
        text-align:left;
        padding: 15px;
        height: 50px;
    }
    .e:hover{
        background-color:#d6eefe;
    }

</style>
<div class="col-md-12 col-xs-12" style="font-family: 'supermarket';" >
    <div class="col-xs-12 box_default">
        <div class="row">
            <div class="col-xs-12" >
                <form class="box_group" method="post" action="<?php echo site_url('/main/treatment_list');?>" >
                    <div class="col-xs-12 row" style="background-color: #F4F5F5  ; width: 105.7%; margin-left: -15px;" >
                    <div class="col-md-2" style="margin: 8px;"><br/><span class="title_content">หัตถการ</span></div>
                    <div class="col-md-8 "><br/><input type="text" placeholder="Search" id="search"  required="required" ><div class="inline_input"><i class="glyphicon glyphicon-search" aria-hidden="true"></i></div></div >
                    <div class="col-md-2"></div>
                    <div class="title_header mar0"></div>
                    </div>
                    <div class="col-md-12" style="height: 419px; width: 103%; overflow: scroll; overflow-x:hidden;"><br>
                        <div align="right" id="doctor_all"><span style="font-size: 16px; color:#148de0;">ผลการค้นหา <?php echo sizeof($treatment_all)?> รายการ</span></div>

                        <?php foreach ($treatment_all as $row) { ?>

                            <div class="col-md-12 e">
                                <a href="javascript:trigger_text(<?php echo $row['id_treatment']; ?>, '<?php echo $row['name_treatment']; ?>')">
                                    <div class="col-md-4">
                                        <span style="font-size: 18px;"><?php echo $row['name_treatment'];?></span>
                                    </div>
                                    <div class="col-md-4" align="center">
                                        <img src="<?php echo base_url('assets/img/arrow-right.png');?>">
                                    </div>
                                    <div class="col-md-4">
                                        <span style="font-size: 1.5em;"><?php echo $row['name_clinic'];?></span>
                                    </div>
                                </a>
                            </div>

                         <?php } ?>

                      </div>
                </form>
            </div>
        </div>
    </div>
</div>

