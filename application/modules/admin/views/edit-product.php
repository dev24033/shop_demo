
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
      <div class="tabbable-panel">
        <div class="tabbable-line">
          <div class=" row">
          <div class=" col-md-12"><h4>
			<a href="<?php echo base_url(); ?>admin/product/"><span class="fa fa-arrow-left"></span></a>
			<strong>product Edit : <?php echo $productdata[0]['name']; ?></strong></h4></div>
        </div>
        <hr>
          <div class="tab-content">
            <div class="tab-pane active" id="tab_default_1">
              <div class="catgorybox">
              <div class="formclass">
                 <form action="#" method="post"  id="update_product_frm" name="add_product_frm" class="setting_form" enctype="multipart/form-data">
   <input type="hidden" name="productid" value="<?php echo $productdata[0]['id']; ?>">
                  <div class="row justify-content-center social-act-form">
				   
					 
					
                    <div class="col-md-6">
                      <div class="form-group input_field">
                        <input type="text" name="product_name" value="<?php echo $productdata[0]['name']; ?>" class="form-control" id="product_name" placeholder="product name " required style="padding-left: 10px;" />
                      </div>
                    </div>
					<div class="col-md-6">
                      <div class="form-group input_field">
                        <input type="text" name="camera" value="<?php echo $productdata[0]['camera']; ?>" class="form-control" id="camera" placeholder="Camera " required style="padding-left: 10px;" />
                      </div>
                    </div>
					
					
					<div class="col-md-6">
                      <div class="form-group input_field">
                        <input type="text" name="brand" value="<?php echo $productdata[0]['brand']; ?>" class="form-control" id="brand" placeholder="Brand " required style="padding-left: 10px;" />
                      </div>
                    </div>
					
					<div class="col-md-6">
                      <div class="form-group input_field">
                        <input type="text" name="ram" value="<?php echo $productdata[0]['ram']; ?>" class="form-control" id="ram" placeholder="RAM " required style="padding-left: 10px;" />
                      </div>
                    </div>
					
					<div class="col-md-6">
                      <div class="form-group input_field">
                        <input type="text" name="storage" value="<?php echo $productdata[0]['storage']; ?>" class="form-control" id="storage" placeholder="Storage " required style="padding-left: 10px;" />
                      </div>
                    </div>
					
					
                    <div class="col-md-6">
                      <div class=" form-group input_field">
                        <input type="text" id="price" value="<?php echo $productdata[0]['price']; ?>"  class="form-control onlypriceinput" name="price" placeholder="Price" required style="width: 100%" autocomplete="off" />
                      </div>
                    </div>
                     </div>
                      
					 
					<div class="col-md-6 row">
						 
						
						 <div class="col-md-6 p-0">
						  <div class="form-group input_field product-drag">
							<input type="file" class="form-control" id="thumbnail" name="thumbnail"  >
							 
							 
						  </div>
						</div>
						<div class="col-md-6">
						  <div class="imga" style="text-align: center;">
						  
							<input type="hidden" name="productimg" value="<?php echo $productdata[0]['image'];  ?>">
							 <img src="<?php echo base_url(); ?>uploads/product_images/<?php echo $productdata[0]['image']; ?>" alt="Blog" style="height: 80px;" name="img" id="img" >
							 
						  </div>
						</div>
					</div>
					
                     
                   
                  </div>
                  
                  <div class="col-md-6 offset-md-5">
                    <button id="regsubmit1" name="regisSubmit" type="submit" class="main-btn">Update</button>
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
</div>
   </div>
 </div>  
<style>
div#loader {
    display: none;
}
</style>


<?php $this->load->view('template/footer-links'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script> 
     <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script> 

  <script src="https://weareoutman.github.io/clockpicker/dist/jquery-clockpicker.min.js"></script>
  
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

var store_frmvalidator = $("#update_product_frm").validate({



    rules: {



          product_name: {



             required: true,



          },



		 


		  point: {



             required: true,



          },


		  
 

		  thumbnail: {



             required: false,



          },

 
 

 

    },



    messages: {
 
	   product_name: {



        required: "Please Enter Nombre de la product ", 



       },

 	   point: {



        required: "Please Enter Fecha de la point ", 



       },
 

	   thumbnail: {



        required: "Please Select Image ", 



       },

 


    },

 

}); 
 
$('#update_product_frm').submit(function(event){ 



       event.preventDefault();



        



       if ($("#update_product_frm").valid()) {



            



            $.ajax({



              type: "POST",



              url: "<?php echo base_url() ?>admin/product/update_product",



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



                          text: 'Update product ',



                          icon: 'success',



                          timer: 2000,



                           button: false



                        }); 
 
					
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



                        className: "btn btn-primary"



                      }



                    });



                },







            });



        }



});


</script>







