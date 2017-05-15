<!DOCTYPE html>
<html>
<head>

    <title>Appointment Mobile</title>
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url();?>assets/img/favicon.ico">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/main.css">

    <?php
    if( isset($css_template) ){
        foreach( $css_template as $row ){
            echo "<link rel='stylesheet' type='text/css' href='".base_url().$row."'>"."\n";
        }
    }
    ?>

</head>
<body>

<div class="main_frame"> <!-- Start Main Frame -->

    <div class="container-fluid bck_blue head_bar ">
        <div class="row">
            <div class="container header_box ">

                <a href="<?php echo base_url();?>"  <a href="<?php echo base_url();?>" class="left_navi_back_btn"><i class="glyphicon glyphicon-menu-left"></i> &nbsp;กลับ</a>

<!--                <a href="--><?php //echo base_url();?><!--"><img src="--><?php //echo base_url();?><!--/assets/img/Logo-Thai.png" id="logo"></a>-->

                <?php if( isset($page_level) ){?>

                    <nav class="header_right_navigate">

                        <a href="<?php echo base_url();?>" class="right_navi_back_btn2">ดำเนินการต่อ &nbsp;<i class="glyphicon glyphicon-menu-right"></i></a>
                    </nav>

                <?php }?>

            </div>
        </div>
    </div>



    <div class="container-fluid bck_grey head_bar ">
        <div class="row">
            <div class="container header_box ">

                <?php if( isset($page_level) ){?>


                    <nav class="header_center_navigate text-center">
                        <ul>
                            <li><a href="<?php echo site_url('main/appointment_table');?>" <?php echo $page_level==1?"style='color:#000;'":"";?>>1. เลือกวัน</a></li>
                            <li><a href="<?php echo site_url('main/form_insert');?>" <?php echo $page_level==2?"style='color:#000;'":"";?>>2. กรอกข้อมูล</a></li>
                            <li><a href="<?php echo site_url('main/appointment_confirm');?>" <?php echo $page_level==3?"style='color:#000;'":"";?>>3. ยืนยัน</a></li>
                        </ul>


                    </nav>

                <?php }?>

            </div>
        </div>
    </div>