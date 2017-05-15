<!DOCTYPE html>
<html>
<head>

    <title>Appointment</title>
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

    <div class="container-fluid bck_white head_bar">
        <div class="row">
            <div class="container header_box2">

                <a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>/assets/img/Logo-Thank.png" id="logo" style="width: 80%"></a>
            </div>
        </div>
    </div>