<?php

defined('BASEPATH') OR exit('No direct script access allowed');

?>

<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from xvelopers.com/demos/html/paper-1.8.2/dashboard3.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 19 Sep 2019 10:27:27 GMT -->
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="<?php echo base_url(); ?>assets/admin/images/logo.png" type="image/x-icon">
<title>Med+ | Login</title>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/assets/css/panel.css">
<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/assets/css/pages.css">

<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body class="login-page">

<div id="app" class="paper-loading">
   <section class="login-container boxed-login">
<div class="container">
<div class="col-md-4 offset-md-4 col-sm-4">
    <div class="one">
        <div class="two">
<div class="login-form-container">
    
<!-- <div class="row"> -->
        <div class="login-form-header">
            <div class="logo">
                <a href="index.html" title="Admin Template"><img src="<?php echo base_url(); ?>assets/admin/img/logo.png" alt="logo"></a>
            </div>
        </div>
    <!-- </div> -->
        <div class="login-form-content">
 <!-- start login -->
            <div class="unit">
                <div class="input login-input">
                    <h2>Login</h2>
                </div>
            </div>
            <!-- end login -->
<form name="loginfrm" id="loginfrm" class="login-form" method="post">
            <!-- start password -->
            <div class="unit">
                <div class="input login-input">
                    <label>
                        Enter Username
                    </label>
                    <input class="form-control login-frm-input red-input"  id="username" type="text" name="username" placeholder="">
                </div>
            </div>
            <div class="unit">
                <div class="input login-input">
                    <label>
                        Enter Password
                    </label>
                    <input class="form-control login-frm-input red-input"  id="password" type="password" name="userpassword"  placeholder="">
                </div>
            </div>
            <!-- 
            <div class="unit sin">
                <p class="data text-center">
                    <a href="#" ><span class="red-data">Don’t have an account?</span></a><a href="signup.html"> Sign up now
                </a></p>
            </div>
         -->
		
            <div class="response"></div>
           <input type="hidden" value="admin" name="redirect">

               <input type="hidden" value="submitted" name="submitted">
        </div>
        <div class="login-form-footer">
            <button type="submit" class="btn-block btn btn-otp">Login</button>
        </div>

    </form>
</div>
</div>
</div>
</div>
</div>
<!--Footer Start Here -->
<footer class="login-page-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4">
                <div class="footer-content">
                    
                </div>
            </div>
        </div>
    </div>
</footer>
<!--Footer End Here -->
</section>
   <div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog width-400" role="document">
         <div class="modal-content no-r "><a href="#" data-dismiss="modal" aria-label="Close" class="paper-nav-toggle active"><i></i></a>
            <div class="modal-body no-p">
               <div class="text-center p-40 p-b-0"> <img src="assets/img/dummy/u4.png" alt="">
                  <h3>Welcome Back</h3>
                  <p class="p-t-b-20">Hey Soldier welcome back signin now there is lot of new stuff waiting for you</p>
               </div>
               <div class="light p-40 b-t-b">
                  <form action="dashboard2.html">
                     <div class="form-group has-icon"><i class="icon-envelope-o"></i>
                        <input type="text" class="form-control form-control-lg" placeholder="Email Address">
                     </div>
                     <div class="form-group has-icon"><i class="icon-user-secret"></i>
                        <input type="text" class="form-control form-control-lg" placeholder="Password">
                     </div>
                     <input type="submit" class="btn btn-primary btn-lg btn-block" value="Log In">
                     <small class="forget-pass">Have you forgot your username or password ?</small>
                  </form>
               </div>
               <div class="p-40"><a href="#" class="btn btn-lg btn-block btn-social facebook"><i class="icon-facebook"></i> Login with Facebook</a><a href="#" class="btn btn-lg btn-block btn-social twitter"><i class="icon-twitter"></i> Login with Twitter</a></div>
            </div>
         </div>
      </div>
   </div>
   
</div>
<script src="<?php echo base_url(); ?>assets/admin/js/app.js"></script>
<script src="<?php echo base_url(); ?>assets/js/vendors.min.js" type="text/javascript"></script>
   
    
  <script src="<?php echo base_url(); ?>assets/vendors/jquery-validation/jquery.validate.min.js"></script>
 
   <script src="<?php echo base_url(); ?>assets/vendors/sweetalert/sweetalert.min.js"></script>
   <script src="<?php echo base_url(); ?>assets/vendors/sweetalert/base_url.js"></script>
  <script type="text/javascript">
  
    var loginfrmvalidator = $("#loginfrm").validate({
        rules: {
         
             username: "required",  
             userpassword: "required",  
            
        },
        messages: {
          username: "Please Enter User Name",
          userpassword: "Please Enter Password",
         
        },
        errorElement : 'div',
        errorPlacement: function(error, element) {
          var placement = $(element).data('error');
          if (placement) {
            $(placement).append(error)
          } else {
        error.insertAfter(element);
        }
      }
        
       
  });
    $('#loginfrm').submit(function(event){ 
       event.preventDefault();
        var remember = $('#remember').val();
        if ($("#loginfrm").valid()) {

          $.ajax({
              type: "POST",
              url: "<?php echo admin_base_url()?>login/login_admin",
              data:new FormData(this),
                       processData:false,
                       contentType:false,
                       dataType: 'json',
              success: function(loginresponse)
              {
                  if (loginresponse.success) {
                     if (loginresponse.redirectpage=='pin') {
                          swal({
                              text: 'Enter Your Pin',
                              content: {
                                element: "input",
                                attributes: {
                                  value: '',
                                  type: "password",id: "pinvalid",

                                },

                              },

                              button: {
                                text: "Submit",
                                value: true,
                                visible: true,
                               
                              },

                            }).then((inputValue) => {
                               var udatelevelvalue = $("#pinvalid").val();
                               if(udatelevelvalue !=''){
                                   var dataString = 'action_type=pinvalidcheck&pin_no='+udatelevelvalue+'&username='+loginresponse.usernameresponse+'&userpassword='+loginresponse.userpasswordresponse+'&remember='+remember;
                                    $.ajax({
                                type: "POST",
                                url: "<?php echo admin_base_url()?>login/check-pin-no",
                                data: dataString,
                                 dataType: 'json',
                                success: function(pinresponse)
                                {
                                  if (pinresponse.success) {
                                    BASE_URL = '<?php echo admin_base_url(); ?>';
                                      window.location = BASE_URL+'dashboard';
                                  }else{
                                    sweetAlert("Oops...", "Wrong PIN Number!", "error");
                                  }
                                  
                                }
                              });

                               }else{
                                sweetAlert("Oops...", "Enter PIN Number!", "error");
                               }
                            });
                     }else{
                         swal({
                          text: loginresponse.messages,
                          icon:'error',
                          button: {
                            text: "OK",
                            value: true,
                            visible: true,
                           
                          }
                        });
                     }
                    loginfrmvalidator.resetForm();
                    $('#loginfrm')[0].reset();
                    
                        
                  }else{
                       swal({
                          text: loginresponse.messages,
                          icon:'error',
                          button: {
                            text: "OK",
                            value: true,
                            visible: true,
                            
                          }
                        });
                  }

                
                },
                error: function (jqXHR, exception) {
                    var msg = '';
                    if (jqXHR.status === 0) {
                        msg = 'Not connect.\n Verify Network.';
                    } else if (jqXHR.status == 404) {
                        msg = 'Requested page not found. [404]';
                    } else if (jqXHR.status == 500) {
                        msg = 'Internal Server Error [500].';
                    } else if (exception === 'parsererror') {
                        msg = 'Requested JSON parse failed.';
                    } else if (exception === 'timeout') {
                        msg = 'Time out error.';
                    } else if (exception === 'abort') {
                        msg = 'Ajax request aborted.';
                    } else {
                        msg = 'Uncaught Error.\n' + jqXHR.responseText;
                    }
                    swal({
                      text: msg,
                       icon:'error',
                      button: {
                        text: "OK",
                        value: true,
                        visible: true,
                      
                      }
                    });
                },
          });
         
      }

    });
  </script>
  
</body>
