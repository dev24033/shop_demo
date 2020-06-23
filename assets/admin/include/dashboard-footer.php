 
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
 <!--    <script src="js/popper.min.js"></script> -->
    <script src="js/bootstrap.min.js"></script>
    <!-- <script src="js/jquery.magnific-popup.min.js"></script> -->
    <script src="js/slick.min.js"></script>
    <script src="js/rangeslider.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <!-- <script src="js/validator.min.js"></script> -->
    <script src="js/ajax-contact.js"></script>
    <script src="js/main.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDC3Ip9iVC0nIxC6V14CKLQ1HZNF_65qEQ"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
    <script src="js/map-script.js"></script>
    <script src="js/slick.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
  <script src="js/Chart.js"></script>
  <script src="https://weareoutman.github.io/clockpicker/dist/jquery-clockpicker.min.js"></script>
  <script>
    $("input[name=time]").clockpicker({       
  placement: 'bottom',
  align: 'left',
  autoclose: true,
  default: 'now',
  donetext: "Select",
  init: function() { 
                            console.log("colorpicker initiated");
                        },
                        beforeShow: function() {
                            console.log("before show");
                        },
                        afterShow: function() {
                            console.log("after show");
                        },
                        beforeHide: function() {
                            console.log("before hide");
                        },
                        afterHide: function() {
                            console.log("after hide");
                        },
                        beforeHourSelect: function() {
                            console.log("before hour selected");
                        },
                        afterHourSelect: function() {
                            console.log("after hour selected");
                        },
                        beforeDone: function() {
                            console.log("before done");
                        },
                        afterDone: function() {
                            console.log("after done");
                        }
});

  </script>
 <script>
        $(document).ready(function() {
    $('#example').DataTable();
} );
    </script>
    <script>
        $(document).ready(function() {
    $('#example1').DataTable();
} );
    </script>

<script>
        $(document).ready(function() {
    $('#example2').DataTable();
} );
    </script>

<script>
  // INCLUDE JQUERY & JQUERY UI 1.12.1
$( function() {
  $( "#datepicker" ).datepicker({
    dateFormat: "dd-mm-yy"
    , duration: "fast"
  });
} );
</script>
<script>
     const $button  = document.querySelector('#sidebar-toggle');
const $wrapper = document.querySelector('#wrapper');

$button.addEventListener('click', (e) => {
  e.preventDefault();
  $wrapper.classList.toggle('toggled');
});
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
  function switchVisible1() {
            if (document.getElementById('supplier-cont1')) {

                if (document.getElementById('supplier-cont2').style.display == 'none') {
                    document.getElementById('supplier-cont1').style.display = 'flex';
                    document.getElementById('supplier-cont2').style.display = 'none';
                }
                else {
                    document.getElementById('supplier-cont1').style.display = 'none';
                    document.getElementById('supplier-cont2').style.display = 'flex';
                }
            }
}
</script>
<script>
  function switchVisible2() {
            if (document.getElementById('supplier-cont5')) {

                if (document.getElementById('supplier-cont5').style.display == 'none') {
                    document.getElementById('supplier-cont5').style.display = 'flex';
                    document.getElementById('supplier-cont6').style.display = 'none';
                }
                else {
                    document.getElementById('supplier-cont5').style.display = 'none';
                    document.getElementById('supplier-cont6').style.display = 'flex';
                }
            }
}
</script>
<script>
  function switchVisible3() {
            if (document.getElementById('supplier-cont3')) {

                if (document.getElementById('supplier-cont4').style.display == 'none') {
                    document.getElementById('supplier-cont3').style.display = 'flex';
                    document.getElementById('supplier-cont4').style.display = 'none';
                }
                else {
                    document.getElementById('supplier-cont3').style.display = 'none';
                    document.getElementById('supplier-cont4').style.display = 'flex';
                }
            }
}
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
<script>
    baguetteBox.run('.tz-gallery');
</script>
<script>
  var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
  // The type of chart we want to create
  type: 'line', // also try bar or other graph types

  // The data for our dataset
  data: {
	  
    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
    // Information about the dataset
    datasets: [{
      label: "Volunteer Application",
      backgroundColor: 'transparent',
      borderColor: '#fff',
      data: [0, 90.4, 30.6, 125.4,210.8,170.2, 200.2,125.4,210.8,170.2,60.2,30],
      
    }]
	
  },

  // Configuration options
  options: {
    layout: {
      padding: 15,
    },
    legend: {
      labels: {
                  fontColor: 'white'
                 }
	  
    },
	scales: {
            yAxes: [{
                ticks: {
                   
                    fontColor: 'white'
                },
            }],
          xAxes: [{
                ticks: {
                    fontColor: 'white'
                },
            }]
        }
  }
});

</script>