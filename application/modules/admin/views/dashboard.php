
<style>
  .line-chart {
  animation: fadeIn 600ms cubic-bezier(.57,.25,.65,1) 1 forwards;
  opacity: 0;
  max-width: 100%;
}

.aspect-ratio {
  height: 0;
  padding-bottom: 50%; // 495h / 990w
}

@keyframes fadeIn {
  to {
    opacity: 1;
  }
}


#chart{
      display: block;
    height: 352px!important;
}

</style>




<?php
$ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
$ipaddress;
?>

    <div class="page light offcanvas-page">
     
      <section class="text-white has-overlay blue4 responsive">
        <div class="container">
          <div class="p-t-b-20 ">
            <h2 style="color:#fff !important;"> Dashboard
         <a class="nav-item nav-link  mr-md-2" href="#" style="float: right;padding: 0;"><i class="icon-user-circle" style="font-size: 36px; color: #fff !important;"></i></a>
         </h2>
          </div>
        </div>
      </section>
     
      
    </div>
	
<style>
div#loader {
    display: none;
}
</style>

				
<?php $this->load->view('template/footer-links'); ?>

