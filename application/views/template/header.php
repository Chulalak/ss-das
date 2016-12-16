
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/logo.png" />
    <title>ระบบจัดการครุภัณฑ์</title>

    <!-- Bootstrap CSS -->
      <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
      <link href="<?php echo base_url(); ?>assets/css/bootstrap-theme.css" rel="stylesheet">
    <!-- font icon -->
      <link href="<?php echo base_url(); ?>assets/css/elegant-icons-style.css" rel="stylesheet" />
      <link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles -->
      <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
      <link href="<?php echo base_url(); ?>assets/css/style-responsive.css" rel="stylesheet" />
      <link href="<?php echo base_url(); ?>assets/css/jquery-ui-1.10.4.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
      <link href="<?php echo base_url(); ?>assets/DataTables/media/css/jquery.dataTables.css" rel="stylesheet">
      <link href="<?php echo base_url(); ?>assets/DataTables/extensions/Editor/css/dataTables.editor.css" rel="stylesheet">
    <!-- CSS for dialog -->
      <link href="<?php echo base_url(); ?>assets/css/vdialog.css" rel="stylesheet">

  </head>
  <body>
 <!-- container section start -->
    <section id="container">


      <header class="header dark-bg">
           <div class="toggle-nav">
               <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
           </div>

           <!--logo start-->
           <a href="#" class="logo">Durable<span class="lite">Articles</span></a>
           <!--logo end-->

<!--           <div class="nav search-row" id="top_menu">
                 search form start 
               <ul class="nav top-menu">
                   <li>
                       <form class="navbar-form">
                           <input class="form-control" placeholder="Search" type="text">
                       </form>
                   </li>
               </ul>
                 search form end 
           </div>-->

           <div class="top-nav notification-row">
               <!-- notificatoin dropdown start-->
               <ul class="nav pull-right top-menu">

                   <!-- user login dropdown start-->
                   <li class="dropdown">
                       <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                           <?php
                           if(empty($this->session->userdata("username"))){
                                echo '<a href="Login"><span class="username"> ลงชื่อเข้าสู่ระบบ</span></a>';
                            }else{
                                 $username = $this->session->userdata('username');
                                echo'<span class="username"> ยินดีต้อนรับ  : : '.$username. '</span>';
                                echo '<b class="caret"></b>';
                            }  
                           ?>
                            
                       </a>
                       <ul class="dropdown-menu extended logout">
                           <li>                            
                               <a href="<?php echo base_url();?>Login/logout"><i class="fa fa-sign-out"></i> ออกจากระบบ</a>
                           </li>

                       </ul>
                   </li>
                   <!-- user login dropdown end -->
               </ul>
               <!-- notificatoin dropdown end-->
           </div>
      </header>
     <!--header end-->
