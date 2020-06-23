$(document).ready(function(){
	
var _URL = window.URL || window.webkitURL;

  $image_crop = $('#image_demo_edit').croppie({

    enableExif: true,

    viewport: {

      width:225,

      height:225,


      type:'circle' 

    },

    boundary:{

      

      height:400

    }

  });


  $('#upload_file_image_thum_edit').on('change', function(e){
		
		var extension=$('#upload_file_image_thum_edit').val().replace(/^.*\./, '');
	//	alert(extension);
	
var reader = new FileReader();
					  reader.onload = function (event) {
					  $image_crop.croppie('bind', {
						url: event.target.result
					  }).then(function(){
						console.log('jQuery bind complete');
					  });
					}
					 reader.readAsDataURL(this.files[0]);
	var file, img;
		if ((file = this.files[0])) {
        img = new Image();
        img.onload = function() {
            //alert(this.width + " " + this.height);
			if(this.width > 280 && this.height > 280){
				
				$('#uploadimageModal_edit').modal('show');
			}
			else {
				
				swal({
				  title: "Sorry!",
				  text: "Image should be minimum 300px * 300px !",
				  icon: "error",
				  button: "Ok!",
				});
				
			}
        };
        
        img.src = _URL.createObjectURL(file);


    }

  });



  $('.crop_image_edit').click(function(event){

$('.crop_image_edit').html('Image Uploading');  //<img src="images/tenor1.gif" style="width:50px; height:30px; padding:10px;">
$('.crop_image_edit').attr('disabled',true);
    $image_crop.croppie('result', {

      type: 'canvas',

      size: 'viewport'

    }).then(function(response){

      $.ajax({

        url:BASE_URL+"update_profile_picture",

        type: "POST",

        data:{"image": response},

        success:function(data)

        {
 $('.crop_image_edit').html('Crop Image');
 $('.crop_image_edit').attr('disabled',false);

          $('#uploadimageModal_edit').modal('hide');

          $('.image_preview').empty();
          $('.image_preview').html(data);

          console.log(data);

        }

      });

    })

  });




// start cover image



$image_crop_bgcover = $('#image_demo_edit_bgcover').croppie({

    enableExif: true,

    viewport: {

      width:1180,

      height:275,


      type:'rectengle' 

    },

    boundary:{

      height:400

    }

  });
  
  $('#upload_file_image_thum_edit_coverimg').on('change', function(e){
		
	
var reader = new FileReader();
					  reader.onload = function (event) {
					  $image_crop_bgcover.croppie('bind', {
						url: event.target.result
					  }).then(function(){
						console.log('jQuery bind complete');
					  });
					}
					 reader.readAsDataURL(this.files[0]);
	var file, img;
		if ((file = this.files[0])) {
        img = new Image();
        img.onload = function() {
            
			if(this.width >= 1024 && this.height >= 280){
				
				$('#uploadimageModal_editbgcover').modal('show');
				$('#myModalcover').modal('hide');
				
			}
			else {
				
				swal({
				  title: "Sorry!",
				  text: "Image should be minimum 1200px * 280px !",
				  icon: "error",
				  button: "Ok!",
				});
				
			}
        };
        
        img.src = _URL.createObjectURL(file);


    }
	
	
  });


  $('.crop_image_edit_bgcover').click(function(event){

$('.crop_image_edit_bgcover').html('Image Uploading');  //<img src="images/tenor1.gif" style="width:50px; height:30px; padding:10px;">
$('.crop_image_edit_bgcover').attr('disabled',true);
    $image_crop_bgcover.croppie('result', {

      type: 'canvas',

      size: 'viewport'

    }).then(function(response){

      $.ajax({

        url:BASE_URL+"update_profile_bgcover",

        type: "POST",

        data:{"image": response},

        success:function(data)

        {
		 $('.crop_image_edit_bgcover').html('Crop Image');
		 $('.crop_image_edit_bgcover').attr('disabled',false);

          $('#uploadimageModal_editbgcover').modal('hide');

          $('.bgimage_preview').empty();
          $('.bgimage_preview').html(data);
            
          console.log(data);
            window.location.href = BASE_URL;
        }

      });

    })

  });



  
// end cover image  
  
});