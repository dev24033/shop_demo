
    <!--====== FOOTER PART START ======-->
    <footer id="footer-part" class="bg-black">
        <div class="container">
            <div class="widget pt-50 pb-50">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="widget-info pt-40">
                            <div class="logo pb-25">
                                <a href="#">
                                    <img src="images/logo2.png" alt="Logo" class="logo1">
                                </a>
                            </div>
                        </div>
                        <!-- widget info -->
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="widget-link pt-35">
                            <div class="widget-title">
                                <h4 class="title pb-10 heading">Nuestros enlaces</h4>
                            </div>
                            <ul>
                                <li><a href="#"><i class="fa fa-chevron-right"></i>Sobre nosotros</a>
                                </li>
                                <li><a href="#"><i class="fa fa-chevron-right"></i>Puntos de héroes sociales</a>
                                </li>
                                <li><a href="#"><i class="fa fa-chevron-right"></i>nuestro blog</a>
                                </li>
                                <li><a href="#"><i class="fa fa-chevron-right"></i>Contáctenos</a>
                                </li>
                                <li><a href="#"><i class="fa fa-chevron-right"></i>Términos y Condiciones</a>
                                </li>
                                <li><a href="#"><i class="fa fa-chevron-right"></i>Política de privacidad</a>
                                </li>
                            </ul>
                        </div>
                        <!-- widget link -->
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="widget-event pt-35">
                            <div class="widget-title">
                                <h4 class="title pb-10 heading">
Ocupaciones</h4>
                            </div>
                            <ul>
                                <li>
                                    <div class="event-list"> <a href="#"><i class="fa fa-chevron-right"></i>Forme un equipo para combatir el hambre infantil</a>
                                        <span>Aug 24 - Aug 27</span>
                                    </div>
                                    <!-- event list -->
                                </li>
                                <li>
                                    <div class="event-list"> <a href="#"><i class="fa fa-chevron-right"></i>Forme un equipo para combatir el hambre infantil</a>
                                        <span>Aug 24 - Aug 27</span>
                                    </div>
                                    <!-- event list -->
                                </li>
                                <li>
                                    <div class="event-list"> <a href="#"><i class="fa fa-chevron-right"></i>Forme un equipo para combatir el hambre infantil</a>
                                        <span>Aug 24 - Aug 27</span>
                                    </div>
                                    <!-- event list -->
                                </li>
                            </ul>
                        </div>
                        <!-- widget-event -->
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="widget-subscribe pt-35">
                            <div class="widget-title">
                                <h4 class="title pb-20 heading">Suscríbete</h4>
                            </div>
                            <p>Únase a más de 90,000 suscriptores increíbles y actualícese con nuestras ofertas exclusivas.</p>
                            <div class="subscribe-form">
                                <form action="#">
                                    <input type="email" placeholder="Enter your Email">
                                    <button type="button"><i class="flaticon-right-arrow"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <!-- widget-subscribe -->
                    </div>
                </div>
                <!-- row -->
            </div>
            <!-- widget -->
            <div class="copyright-social pt-10 pb-25">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="copyright-left text-center text-md-left pt-15">
                            <p>&copy; Digimonk.in</p>
                        </div>
                        <!-- copyright-left -->
                    </div>
                    <div class="col-md-6">
                        <div class="social-right text-center text-md-right pt-15">
                            <ul>
                                <li><a href="#"><i class="flaticon-facebook-letter-logo"></i></a>
                                </li>
                                <li><a href="#"><i class="flaticon-linkedin-logo"></i></a>
                                </li>
                                <li><a href="#"><i class="flaticon-instagram-social-network-logo-of-photo-camera"></i></a>
                                </li>
                            </ul>
                        </div>
                        <!-- social-right -->
                    </div>
                </div>
                <!-- row -->
            </div>
            <!-- copyright-social -->
        </div>
        <!-- container -->
    </footer>
    <!--====== FOOTER PART ENDS ======--> <a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/rangeslider.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/ajax-contact.js"></script>
    <script src="js/main.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDC3Ip9iVC0nIxC6V14CKLQ1HZNF_65qEQ"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
    
    <script src="js/map-script.js"></script>
    <script src="js/slick.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script><!-- 
    <script>
    $('.select2').select2();
</script> -->
<script>
     $('.slider-single').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    fade: false,
    adaptiveHeight: true,
    infinite: false,
    useTransform: true,
    speed: 400,
    cssEase: 'cubic-bezier(0.77, 0, 0.18, 1)',
 });

 $('.slider-nav')
    .on('init', function(event, slick) {
        $('.slider-nav .slick-slide.slick-current').addClass('is-active');
    })
    .slick({
        slidesToShow: 7,
        slidesToScroll: 7,
        dots: false,
        focusOnSelect: false,
        infinite: false,
        responsive: [{
            breakpoint: 1024,
            settings: {
                slidesToShow: 5,
                slidesToScroll: 5,
            }
        }, {
            breakpoint: 640,
            settings: {
                slidesToShow: 4,
                slidesToScroll: 4,
            }
        }, {
            breakpoint: 420,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
        }
        }]
    });

 $('.slider-single').on('afterChange', function(event, slick, currentSlide) {
    $('.slider-nav').slick('slickGoTo', currentSlide);
    var currrentNavSlideElem = '.slider-nav .slick-slide[data-slick-index="' + currentSlide + '"]';
    $('.slider-nav .slick-slide.is-active').removeClass('is-active');
    $(currrentNavSlideElem).addClass('is-active');
 });

 $('.slider-nav').on('click', '.slick-slide', function(event) {
    event.preventDefault();
    var goToSingleSlide = $(this).data('slick-index');

    $('.slider-single').slick('slickGoTo', goToSingleSlide);
 });
</script>
    <script>
        $(document).ready(function(){
          $(".demo").slick({
                dots: false,
                infinite: true,
                slidesToShow: 4,
                slidesToScroll: 2,
                 responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 5,
        slidesToScroll: 2,
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
              });
        });
    </script>
    <script>
        $(document).ready(function(){
          $(".demo1").slick({
                dots: false,
                infinite: true,
                slidesToShow: 4,
                slidesToScroll: 1,
                responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 5,
        slidesToScroll: 2,
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
              });
        });
    </script>
    
    <script>
        $('.dateselect').datepicker({
    format: 'mm/dd/yyyy',
    // startDate: '-3d'
});
    </script>
    <script>
        $(document).ready(function(){
  $('activity-drag input').change(function () {
    $('activity-drag p').text(this.files.length + " file(s) selected");
  });
});
    </script>
    <script>
        $("#sidebar-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
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
        .removeClass("fa-angle-down")
        .addClass("fa-angle-up");
    } else {
      $(".set > a i")
        .removeClass("fa-angle-down")
        .addClass("fa-angle-up");
      $(this)
        .find("i")
        .removeClass("fa-angle-up")
        .addClass("fa-angle-down");
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
  // INCLUDE JQUERY & JQUERY UI 1.12.1
$( function() {
  $( "#datepicker" ).datepicker({
    dateFormat: "dd-mm-yy"
    , duration: "fast"
  });
} );
</script>
   
</body>

</html>