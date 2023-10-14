
<!--
author: Amal Ganesh
License: Spyderhub 3.31
License URL: http://spyderhub.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<head>
<title>PlayHub - Turf Manager</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Landing Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    
    <!-- animation css files -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/animation-aos.css">
    <link href='<?php echo base_url();?>assets/css/aos.css' rel='stylesheet prefetch' type="text/css" media="all" />
    <!-- //animation css files -->

    <!-- css files -->
    <link href="<?php echo base_url();?>assets/css/bootstrap.css" rel='stylesheet' type='text/css' /><!-- bootstrap css -->
    <link href="<?php echo base_url();?>assets/css/style.css" rel='stylesheet' type='text/css' /><!-- custom css -->
    <link href="<?php echo base_url();?>assets/css/fontawesome-all.css" rel="stylesheet"><!-- fontawesome css -->
    <!-- //css files -->
    
    <!-- google fonts -->
    <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
    <!-- //google fonts -->
    
</head>
<body>

<!-- header -->
<header class="index-banner">
    <!-- nav -->
    <nav class="main-header">
      <div id="brand" data-aos="zoom-in-up">
        <div id="logo">
          <a href="index.html">
            <i class="fab fa-blackberry"></i>
          </a>
        </div>
        <div id="word-mark">
          <h1>
            <a href="index.html">PLAYHUB</a>
          </h1>
        </div>
      </div>
      <div id="menu">
        <div id="menu-toggle">
          <div id="menu-icon">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
          </div>
        </div>
        <ul class="text-center text-capitalize nav-agile" data-aos="zoom-in-up">
          <li>
            <a href="<?php echo site_url(); ?>/Onlinecontroller/turfHome" class="active">home</a>
          </li>
          <li>
            <a href="<?php echo site_url(); ?>/Onlinecontroller/turfManageWorkingDays">Manage Working Days</a>
          </li>
          <li>
            <a href="<?php echo site_url(); ?>/Onlinecontroller/turfViewBookings">Bookings</a>
          </li>
            <li  class="btn w3ls-btn">
            <a href="<?php echo site_url(); ?>/Onlinecontroller/adminLogout">Logout</a>
          </li>
        </ul>
      </div>
    </nav>
    <!-- //nav -->