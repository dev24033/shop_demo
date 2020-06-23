 
<div class="page light offcanvas-page">
     
      <section class="text-white has-overlay blue4 responsive">
         <div class="container">
            <div class="p-t-b-20 ">
               <h2 style="color:#fff !important;">Manage Settings
         <a class="nav-item nav-link  mr-md-2" href="#" style="float: right;padding: 0;"><i class="icon-user-circle" style="font-size: 36px; color: #fff !important;"></i></a>
         </h2>
         
            </div>
         </div>
      </section>
     
      <div class="content-wrapper animatedParent animateOnce">
         <div class="container-fluid">
      
	  <div class="container">
  <div class="row">
    <div class="col-md-12">
       
 <?php if(isset($success)){ echo $success; } ?>
 
			<div class="tabbable-panel">
				<div class="tabbable-line">
				<div class="addcategorybox">
					<ul class="nav">
						<li>
							<a href="#tab_default_1" data-toggle="tab" class="active">Company profile</a>
						</li>
						<li>
							<a href="#tab_default_2" data-toggle="tab">Base point </a>
						</li>
				
          
					</ul>
					<div class="add-items text-left" >
               <p class="btn-primary text-center"> <?php echo $this->session->flashdata('success'); ?></p>
            </div>
					</div>
					<div class="tab-content">
						<div class="tab-pane active" id="tab_default_1">
						<div class="row justify-content-center social-act-form">	
             
              <div class="formclass">
                 <form action="<?php echo base_url();?>admin/users/update_blog" class="j-forms" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="blog_id" value="<?php echo $viewdata['id']; ?>">
                    <div class="col-md-6">
                     <div class="form-content">
                        <div class="row">
                          <div class="col-md-12 unit">
                              <label>Company Name</label>
                              <div>
                                  <input class="form-control" type="text" placeholder="Enter Company Name" id="company_name" name="company_name" value="<?php echo $viewdata['company_name']; ?>">
                              </div>
                          </div>
                          <div class="col-md-12 unit">
                              <label>Email ID</label>
                              <div>
                                  <input class="form-control" type="text" placeholder="Enter Email ID" id="email_id" name="email_id" value="<?php echo $viewdata['Email_id']; ?>">
                              </div>
                          </div>
                         <div class="col-md-12 unit">
                              <label>Phone Number</label>
                              <div>
                                  <input class="form-control" type="text" placeholder="Enter Phone Number" id="phone_number" name="phone_number" value="<?php echo $viewdata['phone_number']; ?>">
                              </div>
                          </div>
                        </div>
                    </div> 
                 </div>

             <div class="col-md-6">
                <div class="form-content">
                   <div class="row">
                      <div class="col-md-12 unit">
                   <label class="meta_keywords">Company Logo</label> 
                    <div class="col-md-12"> 
                      <div class="form-control" style="width:100%; height:230px; margin-top:0px;">
                         <img id="img1" src="<?php echo base_url();?>assets/site/images/<?php echo $viewdata['company_logo']; ?>" alt="" style="margin-top:5px; object-fit: cover;">
                       </div>
                    <label for="field1" class="form-control btn btn-primary" style="text-align:center; margin-top:10px;width:100%" id="image1"><p>Upload picture</p></label>
                    <input type="file" id="field1" class="form-control" style="visibility:hidden;"  name="img" onchange="readURL(this);">
                  <script>
                      function readURL(input) {
                          if (input.files && input.files[0]) {
                              var reader = new FileReader();

                              reader.onload = function (e) {
                                  $('#img1')
                                      .attr('src', e.target.result)
                                      .width(420)
                                      .height(218);
                              };

                              reader.readAsDataURL(input.files[0]);
                          }
                      }
                  </script>
           </div>
          </div>
        </div>
      </div>
    </div>


             <div class="col-md-12">
                 <div class="form-content">
                    <div class="row">
                       <div class="col-md-12 unit">
                          <label>Adress</label>
                          <div>
                            <textarea class="form-control summernote" id="address" name="address"><?php echo $viewdata['address']; ?></textarea>
                          </div>
                      </div>

                   <div class="col-md-7">
                      <div class="form-footer">
                      <br>
                      <button type="submit" id="btn_submit" class="btn btn-info primary-btn" name="update">Update</button>
                  </div>
                   </div>
                  </div>
                  <!-- end text password -->
              </div>
              </div>
           </form>
          </div>
        </div>
     </div>
      
						
				<div class="tab-pane" id="tab_default_2">
				
		<div class="row justify-content-center social-act-form">	
             
              <div class="formclass">
                 <form action="<?php echo base_url();?>admin/users/update_base" class="j-forms" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="blog_id" value="<?php echo $viewdata['id']; ?>">
                    <div class="col-md-6">
                     <div class="form-content">
                        <div class="row">
                          <div class="col-md-12 unit">
                              <label>Base Point 1</label>
                              <div>
                                  <input class="form-control" type="text" placeholder="Enter Base Point" id="base_point1" name="base_point1" value="<?php echo $viewdata['base_point1']; ?>">
                              </div>
                          </div>
                          <div class="col-md-12 unit">
                              <label>Base Point 2</label>
                              <div>
                                  <input class="form-control" type="text" placeholder="Enter Base Point" id="base_point2" name="base_point2" value="<?php echo $viewdata['base_point2']; ?>">
                              </div>
                          </div>
                         
                        </div>
                    </div> 
                 </div>

            


             <div class="col-md-12">
                 <div class="form-content">
                    <div class="row">
                      
                   <div class="col-md-7">
                      <div class="form-footer">
                      <br>
                      <button type="submit" id="btn_submit" class="btn btn-info primary-btn" name="update">Update</button>
                  </div>
                   </div>
                  </div>
                  <!-- end text password -->
              </div>
              </div>
           </form>
          </div>
        </div>				
           	  	
				</div>
		
          
					</div>
				</div>
			</div>

    </div>
  </div>
</div>
</div>
  
     <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script> 
     <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script> 

  <script src="https://weareoutman.github.io/clockpicker/dist/jquery-clockpicker.min.js"></script>
  
  
<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>

<?php $this->load->view('template/footer-links'); ?>
 
  <style>
  .tabbable-panel {
    padding: 15px;
    background: #fff;
    display: block;
    width: 100%;
}

  button.status_deactive {
    background-color: #f6b21b;
    line-height: 36px;
    display: inline-block;
    height: 36px;
    padding: 0 2rem;
    vertical-align: middle;
    text-transform: uppercase;
    border: none;
    border-radius: 4px;
    -webkit-tap-highlight-color: transparent;
    color: #fff;
    cursor: pointer;
}
  button.status_active.approve {
    background-color: #4caf50;
    line-height: 36px;
    display: inline-block;
    height: 36px;
    padding: 0 2rem;
    vertical-align: middle;
    text-transform: uppercase;
    border: none;
    border-radius: 4px;
    -webkit-tap-highlight-color: transparent;
    color: #fff;
    cursor: pointer;
}
</style>

 
<script>

$(document).ready(function() {
        $('.onlypriceinput').keypress(function (event) {
            return isNumber(event, this)
        });
});

$(document).ready(function() {
    $('#example1').DataTable( {
        dom: 'Bfrtip',
        buttons: [ 
            'excelHtml5', 
            'pdfHtml5'
        ]
    } );
} );
  // INCLUDE JQUERY & JQUERY UI 1.12.1
$( function() {
  $( "#datepicker" ).datepicker({
    dateFormat: "dd-mm-yy"
    , duration: "fast"
  });
} );
</script>   
 

