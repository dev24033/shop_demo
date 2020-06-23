<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <!--<link rel="icon" href="<?php echo base_url(); ?>assets/admin/img/favicon1.png" type="image/x-icon">-->
  
  <title>Admin</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/admin/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/admin/css/responsive.bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/admin/css/bootstrap.min.css">
	
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://weareoutman.github.io/clockpicker/dist/jquery-clockpicker.min.css"></link>
   
	
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/assets/css/bootstrap-select.css" />
     <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/assets/css/app.css">
  <style>
  
    .loader {
      position:fixed;
      left:0;
      top:0;
      width:100%;
      height:100%;
      background-color:#f5f8fa;
      z-index:9998;
      text-align:center
    }
    .plane-container {
      position:absolute;
      top:50%;
      left:50%
    }
    
    
    .switch {
      position: relative;
      display: inline-block;
      width: 52px;
        height: 25px;
    }
    
    .switch input { 
      opacity: 0;
      width: 0;
      height: 0;
    }
    .slider {
      position: absolute;
      cursor: pointer;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #E41B17;
      -webkit-transition: .4s;
      transition: .4s;
    }
    .slider:before {
      position: absolute;
        content: "";
        height: 23px;
        width: 23px;
        left: 1px;
        bottom: 1px;
      background-color: white;
      -webkit-transition: .4s;
      transition: .4s;
    }
    input:checked + .slider {
      background-color: green;
    }
    
    input:focus + .slider {
      box-shadow: 0 0 1px #2196F3;
    }
    
    input:checked + .slider:before {
      -webkit-transform: translateX(26px);
      -ms-transform: translateX(26px);
      transform: translateX(26px);
    }
    
    /* Rounded sliders */
    .slider.round {
      border-radius: 34px;
    }
    
    .slider.round:before {
      border-radius: 50%;
    }
	
	
  </style>
</head>

<body>
<!--
<div id="loader" class="loader">
  <div class="plane-container">
    <div class="l-s-2 blink">LOADING</div>
  </div>
</div>-->
 <div id="app" class="paper-loading"> <a href="#" data-toggle="offcanvas" class="paper-nav-toggle fixed left"><i></i></a>
     <aside class="main-sidebar shadow1 fixed offcanvas scroll ">
       <?php $this->load->view('template/left-menu'); ?>
    </aside>