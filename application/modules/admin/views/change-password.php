<div class="page light offcanvas-page">
<section class="text-white has-overlay blue4 responsive">
         <div class="container">
            <div class="p-t-b-20 ">
               <h2 style="color:#fff !important;">Change password
			   <a class="nav-item nav-link  mr-md-2" href="#" style="float: right;padding: 0;"><i class="icon-user-circle" style="font-size: 36px; color: #fff !important;"></i></a>
			   </h2>
			   
            </div>
         </div>
      </section> 

				<form action="#" id="change_password_form" method="post" enctype='multipart/form-data'>
								
									
									<div class="form-group">
										<label class="control-label col-md-2" for="email">Current:</label>
										<div class="col-md-10">
										   <input type="password" style="margin-top:1px;margin-left:-75px;" id="userpassword" name="userpassword" required class="form-control passwordbox"  >
										</div>
									 </div>
									 
									 <div class="form-group">
										<label class="control-label col-md-2" style="margin-top:25px;" for="pwd">New:</label>
										<div class="col-md-10">
										   <input type="password" style="margin-top:15px;margin-left:-75px;" id="newpassword" name="newpassword" required class="form-control"  >
										</div>
									 </div>
									 <div class="form-group">
										<label class="control-label col-md-2" style="margin-top:25px;" for="pwd">Confirm:</label>
										<div class="col-md-10">
										   <input type="password" style="margin-top:15px;margin-left:-75px;" id="cpassword" name="cpassword" required class="form-control"  >
										</div>
									 </div>
									  
									 <div class="buttonf" style="margin-top:20px;margin-left:15px;">
										<button type="submit" style="margin-top:20px;margin-left:150px;" name="changepassword" id="changepassword" class="buttonfo">Change</button>
									 </div>					
									</form>
</div>
<?php $this->load->view('template/footer-links'); ?>


<script src="<?php echo base_url(); ?>assets/site/js/jquery.min.js"></script>

<link rel='stylesheet' href='<?php echo base_url();?>assets/site/sweetalert/sweetalert.css' />
<script src="<?php echo base_url();?>assets/site/sweetalert/sweetalert.min.js"></script>
<script src="<?php echo base_url()?>assets/site/js/jquery.validate.min.js"></script>

<script> 
$(document).ready(function(){  
      $('#change_password_form').on('submit', function(e)
	  {  
				   e.preventDefault();  
				   var adminuser = $("#adminuser").val();
				   var pwd = $("#userpassword").val();
				   var npwd = $("#newpassword").val();
				   var cpwd = $("#cpassword").val(); 
				   
					 
				   if($('#newpassword').val() != $('#cpassword').val())  
				   {  
						swal({
										  title: "Sorry!",
										  text: "New Password and Confirm Password does not match!",
										  icon: "error",
										  button: "Ok!",
										}); 
					$('#changepassword').prop('disabled', false);
				   }  
				   else  
				   {  
						$.ajax({  
							 method:"POST",
							   url:"<?php echo base_url()?>admin/users/update_user_password",
							   data:{"newpwd":npwd,"pwd":pwd},
							   dataType:"html",
							   success:function(data){
							   if(data == 1){
								   swal({
										  title: "Successfully!",
										  text: "New Password Updated!",
										  icon: "success",
										  button: "Ok!",
										}); 
								$('#changepassword').prop('disabled', false);
								location.reload();
							   }
							   else {
								   swal({
										  title: "Sorry!",
										  text: "Old Password does not match!",
										  icon: "error",
										  button: "Ok!",
										}); 
							   }
							   //location.reload();
							   //$('#changepassword').prop('disabled', true);
							   }  
						});  
				   }
			  });  
			   
 });  
 
</script>
