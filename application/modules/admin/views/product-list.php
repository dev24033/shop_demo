 
<div class="page light offcanvas-page">
     
      <section class="text-white has-overlay blue4 responsive">
         <div class="container">
            <div class="p-t-b-20 ">
               <h2 style="color:#fff !important;">product
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
							<a href="#tab_default_1" data-toggle="tab" class="active">product</a>
						</li>
						<li>
							<a href="#tab_default_2" data-toggle="tab">Add product </a>
						</li>
				
          
					</ul>
					</div>
					<div class="tab-content">
						<div class="tab-pane active" id="tab_default_1">
							<div class="catgorybox table-responsive">
							<table id="example1" class="table table-bordered table-striped table-hover">
  <thead>
    <tr>
					<th>S No.</th> 
					<th>Image</th>
					<th>product Name</th> 
					<th>Camera</th>
					<th>Brand</th>
					<th>RAM</th>
					<th>Storage</th>
					<th>Price</th>					
					<th>product Date</th> 
					<th>Status</th>
					<th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
			 $i=1;
			 foreach($data as $data1):
			 
			  
			 
		if($data1['status'] == '1'){
			$status_var = 'status_active';
			$status_lbl = 'Active';
		}
		else{
			$status_var = 'status_deactive';
			$status_lbl = 'Deactive';
		}
			 ?>
			 <tr id='delrow_<?php echo $data1['id']; ?>'>
			 <td><?php echo $i; ?></td> 
			 <td><img src="<?php echo base_url() ?>uploads/product_images/<?php echo $data1['image']; ?>" width='100' height='100'></td>
			 
			 <td><?php echo $data1['name']; ?></td> 
			 <td><?php echo $data1['camera']; ?></td>
			 <td><?php echo $data1['brand']; ?></td>
			 <td><?php echo $data1['ram']; ?></td>
			 <td><?php echo $data1['storage']; ?></td>
			 <td><?php echo $data1['price']; ?></td>			 
			 <td><?php echo date("d M Y", strtotime($data1['modified'])); ?> </td> 
			 <td>
			<button catstatus-id="<?php echo $data1['id']; ?>" catstatus="<?php echo $data1['status']; ?>" class="<?php echo $status_var; ?> approve statusrow_<?php echo $data1['id']; ?>"><?php echo $status_lbl; ?></button>
			</td>
			
			 <td>
			  <a href="<?php echo base_url() ?>admin/product/edit-product/<?php echo $data1['id']; ?>"><i class="fa fa-pencil"></i></a> 
            <button catid="<?php echo $data1['id']; ?>" class="delete_btn removecategory"><i class="fa fa-trash-o"></i></button></a>
</td>
              </tr>
			
			 <?php 
			 $i++;
			 endforeach;
			 ?>
			 
    
  </tbody>
</table>

							</div>
							</div>
<div class="tab-pane" id="tab_default_2">
							
           	  <form action="#" method="post"  id="add_product_frm" name="add_product_frm" class="setting_form" enctype="multipart/form-data">
  
                  <div class="row justify-content-center social-act-form">
				  
				   
					
                    <div class="col-md-6">
                      <div class="form-group input_field">
                        <input type="text" name="product_name" class="form-control" id="product_name" placeholder="Product Name " required style="padding-left: 10px;" />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class=" form-group input_field">
                        <input type="text" id="camera" class="form-control" name="camera" placeholder="Camera " required style="width: 100%" autocomplete="off" />
                      </div>
                    </div>
					<div class="col-md-6">
                      <div class=" form-group input_field">
                        <input type="text" id="brand" class="form-control" name="brand" placeholder="Brand" required style="width: 100%" autocomplete="off" />
                      </div>
                    </div>
					<div class="col-md-6">
                      <div class=" form-group input_field">
                        <input type="text" id="ram" class="form-control" name="ram" placeholder="RAM" required style="width: 100%" autocomplete="off" />
                      </div>
                    </div>
					<div class="col-md-6">
                      <div class=" form-group input_field">
                        <input type="text" id="storage" class="form-control" name="storage" placeholder="Storage " required style="width: 100%" autocomplete="off" />
                      </div>
                    </div>
					
					 <div class="col-md-6">
                      <div class=" form-group input_field">
                        <input type="text" id="price" class="form-control onlypriceinput" name="price" placeholder="Price " required style="width: 100%" autocomplete="off" />
                      </div>
                    </div>
					
                     
                      
					<div class="col-md-6">
                     
					 
                      <div class="form-group input_field product-drag">
                        <input type="file" class="form-control" id="thumbnail" name="thumbnail"  >
                         
                      </div>
                    
					
					</div>
					
                    
                   
					 
                  </div>
                  
                  <div class="col-md-6 offset-md-5">
                    <button id="regsubmit1" name="regisSubmit" type="submit" class="main-btn">Add</button>
                    </button>
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
  
<?php $this->load->view('template/footer-links'); ?>
 
     <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script> 
     <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script> 

  <script src="https://weareoutman.github.io/clockpicker/dist/jquery-clockpicker.min.js"></script>
  
  
<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>

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
<script>
        $(document).ready(function() {
  var buttonAdd = $("#add-button");
  var buttonRemove = $("#remove-button");
  var className = ".dynamic-field";
  var count = 0;
  var field = "";
  var maxFields = 2;

  function totalFields() {
    return $(className).length;
  }

  function addNewField() {
    count = totalFields() + 1;
    field = $("#dynamic-field-1").clone();
    field.attr("id", "dynamic-field-" + count);
    field.children("label").text("Field " + count);
    field.find("input").val("");
    $(className + ":last").after($(field));
  }

  function removeLastField() {
    if (totalFields() > 1) {
      $(className + ":last").remove();
    }
  }

  function enableButtonRemove() {
    if (totalFields() === 2) {
      buttonRemove.removeAttr("disabled");
      buttonRemove.addClass("shadow-sm");
    }
  }

  function disableButtonRemove() {
    if (totalFields() === 1) {
      buttonRemove.attr("disabled", "disabled");
      buttonRemove.removeClass("shadow-sm");
    }
  }

  function disableButtonAdd() {
    if (totalFields() === maxFields) {
      buttonAdd.attr("disabled", "disabled");
      buttonAdd.removeClass("shadow-sm");
    }
  }

  function enableButtonAdd() {
    if (totalFields() === (maxFields - 1)) {
      buttonAdd.removeAttr("disabled");
      buttonAdd.addClass("shadow-sm");
    }
  }

  buttonAdd.click(function() {
    addNewField();
    enableButtonRemove();
    disableButtonAdd();
  });

  buttonRemove.click(function() {
    removeLastField();
    disableButtonRemove();
    enableButtonAdd();
  });
});
    </script>
     <script>
    $(document).ready(function() {
  $(".set > a").on("click", function() {
    if ($(this).hasClass("active")) {
      $(this).removeClass("active");
      $(this)
        .siblings(".content")
        .slideUp(200);
      $(".set > a i")
        .removeClass("fa-minus")
        .addClass("fa-plus");
    } else {
      $(".set > a i")
        .removeClass("fa-minus")
        .addClass("fa-plus");
      $(this)
        .find("i")
        .removeClass("fa-plus")
        .addClass("fa-minus");
      $(".set > a").removeClass("active");
      $(this).addClass("active");
      $(".content").slideUp(200);
      $(this)
        .siblings(".content")
        .slideDown(200);
    }
  });
});

</script>
 <script>
  
  
  $("input[name=time]").clockpicker({       
  placement: 'bottom',
  align: 'left',
  autoclose: true,
  default: 'now',
  donetext: "Select",
  init: function() { 
                            
                        },
                         
});
  $("input[name=start_time]").clockpicker({       
  placement: 'bottom',
  align: 'left',
  twelvehour:	true,
  autoclose: true,
  default: 'now',
  donetext: "Select",
  init: function() { 
                            
                        },
                        
});

  </script>
<script>

function get_cities(state)

		{

			var dataString =  'state='+ state;

			

	 $.ajax({

			type: "POST",

			url: "<?php echo base_url() ?>ong/get_citiesbysid",

			data: dataString,

			success: function(html) {

				document.getElementById("s_city").innerHTML=html;

				 

			}

	 });

			

			

}

var store_frmvalidator = $("#add_product_frm").validate({



    rules: {



          product_name: {



             required: true,



          },
		  
		  discription: {



             required: true,



          },



		 


		  price: {



             required: true,



          },


		  
 


		  thumbnail: {



             required: false,



          },

  

 

    },



    messages: {
 
	   product_name: {



        required: "Please Enter Name", 



       },
	   
	   discription: {



        required: "Please Enter Discription", 



       },


 	   price: {



        required: "Please Enter price ", 



       },
 

	   thumbnail: {



        required: "Please Select Image ", 



       },


  


    },

 

}); 
 
$('#add_product_frm').submit(function(event){ 



       event.preventDefault();



        



       if ($("#add_product_frm").valid()) {



            



            $.ajax({



              type: "POST",



              url: "<?php echo base_url() ?>admin/product/add_product",



              data:new FormData(this),



                       processData:false,



                       contentType:false,



                       cache:false,



                       async:false,



                      dataType: 'json',



                  



              success: function(response)



              {



				  







                if(response.success == true) {



          



                  







                  swal({



                          title: 'Successfully!',



                          text: 'Added New product ',



                          icon: 'success',



                          timer: 2000,



                           button: false



                        }); 



                  



					$('#add_product_frm')[0].reset();
 
					window.location = "<?php echo base_url() ?>admin/product/";
                  



                }else{



                 swal({



                      text: response.messages,



                      icon: 'error',



                      button: true



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



                      icon: 'error',



                      button: {



                        text: "OK",



                        value: true,



                        visible: true,



                        className: "btn  "



                      }



                    });



                },







            });



        }



});


</script>

<script>
 

$(document).on('click', ".approve", function (e) {

    var catstatusid = $(e.currentTarget).attr("catstatus-id");
    var catstatus = $(e.currentTarget).attr('catstatus');
 if(catstatus == '1'){
	 varstatus = 'Deactivate';
 }
 else{
	 varstatus = 'Activate';
 }
   swal({

          title: 'Are you sure?',
          text: varstatus+' this',
          icon: 'warning',
          
          buttons: {
            cancel: {
              text: "Cancel",
              value: null,
              visible: true,
              
              closeModal: true,
            },
            confirm: {
              text: "OK",
              value: true,
              visible: true,
             
              closeModal: true
            },
          }
        }).then(function (willDelete){
        if (willDelete) {
          var dataString = 'action_type=update&catstatusid='+catstatusid+'&catstatus='+catstatus;

              $.ajax({
              type: "POST",
              url: "<?php echo base_url()?>admin/product/product-status-update",
              data: dataString,
              cache: false,
              success: function(userresponse)
              {
                if (userresponse) {
                    swal({
                          title: 'successfully!',
                          text: 'Update',
                          icon: 'success',
                           button: "Ok"
                        }).then(function() {
                          location.reload();
                       });
                }else{
                  swal({
                            text: 'Update failed',
                             icon:'error',
                            button: {
                              text: "OK",
                              value: true,
                              visible: true,
                              className: "btn  "
                            }
                          });
                }
                  
                  resultTable.ajax.reload();
                  
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
                        className: "btn btn-primary"
                      }
                    });
                },
            });
      } else {
        
        }
     });
   }); 


$(document).on('click', ".removecategory", function (e) {

  
    var catid = $(e.currentTarget).attr("catid");
      
      swal({
            title: 'Are you sure?',
            text: "You want to delete this!",
            icon: 'warning',
           
            buttons: {
              cancel: {
                text: "Cancel",
                value: null,
                visible: true,
               
                closeModal: true,
              },
              
             
              confirm: {
                text: "OK",
                value: true,
                visible: true,
            
             closeModal: true
             },
          }
          
       }).then(function(willDelete){
        if (willDelete) {
          var dataString = 'action_type=remove&catid='+catid;
          //alert(dataString);
              $.ajax({
              type: "POST",
              url: "<?php echo base_url()?>admin/product/remove-productid",
              data: dataString,
              
              
              success: function(userresponse)
              {  
                if (userresponse) {
                    swal({
                          title: 'successfully!',
                          text: 'Deleted',
                          icon: 'success',
                          timer: 2000,
                           button: false
                        });
					
					$('#delrow_'+catid).hide();
					
                }else{
                  swal({
                            text: 'Delete failed',
                            icon:"error",
                            button: {
                              text: "OK",
                              value: true,
                              visible: true,
                              className: "btn "
                            }
                          });
                }
                  
                 // resultTable.ajax.reload();
                  
                
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
                      icon:"error",
                      button: {
                        text: "OK",
                        value: true,
                        visible: true,
                        className: "btn btn-primary"
                      }
                    });
                },
            });
        } else {
        
        }
      });
   });      

 
 
</script>



