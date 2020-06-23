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
              url: baseurl+"login/login_admin",
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
                                url: baseurl+"login/check-pin-no",
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