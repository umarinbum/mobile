<?php
  //print_r($_SESSION);
  $session_data = $this->session->userdata();
  $admin_img = $session_data['admin_login']['img_doctor'];
  $admin_name = $session_data['admin_login']['name_doctor'];
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Appointment - Admin</title>
  <link rel="shortcut icon" type="image/png" href="<?php echo base_url();?>assets/img/favicon.ico">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link href="//cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.0/animate.min.css" rel="stylesheet">

  <link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/admin_main.css">

  <?php
    if( isset($css_template) ){
      foreach( $css_template as $row ){
        echo "<link rel='stylesheet' type='text/css' href='".base_url().$row."'>"."\n";
      }
    }
  ?>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo site_url('admin');?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>PT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">Appointment</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url();?>assets/upload/<?php echo $admin_img;?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $admin_name;?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url();?>assets/upload/<?php echo $admin_img;?>" class="img-circle" alt="User Image">

                <p><?php echo $admin_name;?></p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo site_url('auth/dashboard_session_destroy');?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>

        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url();?>assets/upload/<?php echo $admin_img;?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p class="header_admin_name"><?php echo $admin_name;?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        
        <li><a href="<?php echo base_url('admin');?>"><i class="fa fa-book"></i> <span>รายการการจอง</span></a></li>
        <li><a href="<?php echo base_url();?>"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
        <li><a href="<?php echo base_url();?>"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
        <li><a href="<?php echo base_url();?>"><i class="fa fa-book"></i> <span>Documentation</span></a></li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa fa-gears"></i>
            <span>ตั้งค่า</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('admin_management/doctor');?>"><i class="fa fa-circle-o"></i> แพทย์</a></li>
            <li><a href="<?php echo base_url('admin_management/treatment');?>"><i class="fa fa-circle-o"></i>ศูนย์ || หัตถการณ์</a></li>
            <li><a href="<?php echo base_url('admin_management/user');?>"><i class="fa fa-circle-o"></i> ผู้ใช้งาน</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Tables
        <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Tables</a></li>
        <!-- <li class="active">Data tables</li> -->
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        
        
      