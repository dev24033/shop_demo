<?php

defined('BASEPATH') OR exit('No direct script access allowed');

?>

<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>

  <!-- Required meta tags -->

  <meta charset="utf-8">

  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<link rel="icon" href="<?php echo base_url(); ?>assets/admin/img/favicon1.png" type="image/x-icon">
  <title>The Social Heroes</title>
  <!-- <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.png" /> -->

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- BEGIN: VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/vendors/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/vendors/sweetalert/sweetalert.css">
    <!-- END: VENDOR CSS-->
    <!-- BEGIN: Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/themes/vertical-modern-menu-template/materialize.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/themes/vertical-modern-menu-template/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/pages/login.css">
  

</head>



<body class="vertical-layout vertical-menu-collapsible page-header-dark vertical-modern-menu 1-column login-bg  blank-page blank-page" data-open="click" data-menu="vertical-modern-menu" data-col="1-column">

  <div class="row">
      <div class="col s12">
        <div class="container">
          <div id="login-page" class="row">
          <div class="col s12 m6 l4 z-depth-4 card-panel border-radius-6 login-card bg-opacity-8">
            <div class="login-logo">
             <img src="<?php echo base_url() ?>assets/site/images/logo.svg" title="The Social Heroes" alt="The Social Heroes" width="120"  />
          
           </div>
           <?php echo $this->session->flashdata('msg'); ?>
           <form name="loginfrm" id="loginfrm" class="login-form" method="post">
          
              <div class="row">
                <div class="input-field col s12">
                  <h5 class="ml-4">Sign in</h5>
                </div>
              </div>
              <div class="row margin">
                <div class="input-field col s12">
                  <i class="material-icons prefix pt-2">person_outline</i>
                  <input id="username" type="text" name="username" required="">
                  
                  <label for="username" class="center-align">Username</label>
                  <span class="text-danger"><?php echo form_error('username'); ?></span>
                </div>
              </div>
              <div class="row margin">
                <div class="input-field col s12">
                  <i class="material-icons prefix pt-2">lock_outline</i>
                  <input id="password" type="password" name="userpassword" required="">
                  <label for="password">Password</label>
                   <span class="text-danger"><?php echo form_error('userpassword'); ?></span>
                </div>
              </div>
              <div class="row">
                <div class="col s12 m12 l12 ml-2 mt-1">
                  <p>
                    <label>
                      <input type="checkbox" name="remember" checked="" value="1" />
                      <span>Remember Me</span>
                    </label>
                  </p>
                </div>
              </div>
              <input type="hidden" value="admin" name="redirect">

               <input type="hidden" value="submitted" name="submitted">
              <div class="row">
                <div class="input-field col s12">
                  <button class="btn waves-effect waves-light border-round gradient-45deg-purple-deep-orange col s12">Login</button>
                 
                </div>
              </div>
              
            </form>
          </div>
        </div>
        </div>
      </div>
    </div>
  

 

  <!-- container-scroller -->

  <!-- plugins:js -->
  <style type="text/css">
    input#pinvalid {
       
       
        font-weight: 300;
       
        max-width: 50%;
        margin-left: 25%;
    }
  </style>
  <script src="<?php echo base_url(); ?>assets/js/vendors.min.js" type="text/javascript"></script>
   
    
  <script src="<?php echo base_url(); ?>assets/vendors/jquery-validation/jquery.validate.min.js"></script>
 
   
  <script type="text/javascript">
  
	var baseurl = <?php echo admin_base_url()?>
   
  </script>
<script src="<?php echo base_url(); ?>assets/vendors/sweetalert/sweetalert.min.js"></script>

  <!-- endinject -->

</body>



</html>

