<html>
<head>
	<title>Shoping Cart Integration</title>
		<!-- Include bootstrap libraty -->
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css" rel="stylesheet">
		<!-- include custome css -->
		 <script src="<?php echo base_url('assets/js/jquery-1.10.2.min.js') ?>"> </script>
    <script src="<?php echo base_url('assets/js/jquery-ui.js')?>"> </script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js')?> "> </script>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css')?>">
    <link href = "<?php echo base_url('assets/css/jquery-ui.css')?>" rel = "stylesheet">
	<link href="<?php echo base_url('assets/css/style1.css') ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('assets/css/style.css') ?>" rel="stylesheet" type="text/css">
	
</head>
<body>
<div class="container">
	<a style="float: right;" href="<?php echo base_url('poll')?>"><h2>Poll System</h2></a>
	<h2>Products</h2>
	
		<!-- Cart Info -->
	<a href="<?php echo base_url('cart');?>" class="cart-link" title="View Cart">
		<i class="glyphicon glyphicon-shopping-cart"></i>
		<span> (<?php echo $this->cart->total_items();?>)</span>
	</a>
		<!-- List of all products -->
	<div class="row">
	
		<!--Serching tab -->
	<div class="col-lg-3">                				
				<div class="list-group">
					<h3>Price</h3>
					<input type="hidden" id="hidden_minimum_price" value="0" />
                    <input type="hidden" id="hidden_maximum_price" value="65000" />
                    <p id="price_show">1000 - 65000</p>
                    <div id="price_range"></div>
                </div>				
                <div class="list-group">
					<h3>Brand</h3>
                    <div style="height: 180px; overflow-y: auto; overflow-x: hidden;">
					<?php

               /*      $query = "SELECT DISTINCT(product_brand) FROM product WHERE product_status = '1' ORDER BY product_id DESC";
                    $statement = $connect->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll(); */
                    foreach($brand as $row)
                    {
                    ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector brand" value="<?php echo $row['brand']; ?>"  > <?php echo $row['brand']; ?></label>
                    </div>
                    <?php
                    }

                    ?>
                    </div>
                </div>

				<div class="list-group">
					<h3>RAM</h3>
                    <?php

                    /* $query = "
                    SELECT DISTINCT(product_ram) FROM product WHERE product_status = '1' ORDER BY product_ram DESC
                    ";
                    $statement = $connect->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll(); */
                    foreach($ram as $row)
                    {
                    ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector ram" value="<?php echo $row['ram']; ?>" > <?php echo $row['ram']; ?> GB</label>
                    </div>
                    <?php    
                    }

                    ?>
                </div>
				
				<div class="list-group">
					<h3>Internal Storage</h3>
					<?php
                    /* $query = "
                    SELECT DISTINCT(product_storage) FROM product WHERE product_status = '1' ORDER BY product_storage DESC
                    ";
                    $statement = $connect->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll(); */
                    foreach($storage as $row)
                    {
                    ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector storage" value="<?php echo $row['storage']; ?>"  > <?php echo $row['storage']; ?> GB</label>
                    </div>
                    <?php 
                    }
                    ?>	
                </div>
            </div>
	<!--End Serching tab -->
	
		<div class="col-lg-9 filter_data">
		<!--
		 <?php  if(!empty($products))
		{
			//print_r($products);
			 foreach($result as $row){
				
			 ?>  
			<div class="col-sm-4 col-lg-4 col-md-4">
				<div class="thumbnail">
					<img src="<?php  echo base_url('uploads/product_images/'.$row['image']); ?>"/>
					<div class="caption">
					<h4>$<?php echo $row['price'];?>.00 USD</h4>
					<p><strong><?php echo $row['name'];?></strong></p>
					<p><?php echo $row['brand']; ?></p>
					<p><?php echo $row['camera'];?> MP</p>
					<p><?php echo $row['ram']; ?> GB</p>
					<p><?php echo $row['storage']; ?> GB</p>
					
					</div>
					<div class="atc">
						<a href="<?php echo base_url('addToCart/'.$row['id']);?>" class="btn btn-success">Add to Cart</a>
					</div>
				</div>
			</div>
		<?php } } else {  ?> 
			<p> Products not found.....</p>
	<?php } ?> -->
		</div>
	</div>
</div>

</body>

<script>
$(document).ready(function(){

    filter_data();

    function filter_data()
    {
        $('.filter_data').html('<div id="loading" style="" ></div>');
        var action = 'fetch_data';
        var minimum_price = $('#hidden_minimum_price').val();
        var maximum_price = $('#hidden_maximum_price').val();
        var brand = get_filter('brand');
        var ram = get_filter('ram');
        var storage = get_filter('storage');
        $.ajax({
            url: "<?php echo base_url() ?>fetch_data",
            method: "POST",
            data:{action:action, minimum_price:minimum_price, maximum_price:maximum_price, brand:brand, ram:ram, storage:storage},
			dataType:"HTML",
            success:function(data){
				
                $('.filter_data').html(data);
            }
        });
    }

    function get_filter(class_name)
    {
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        return filter;
    }

    $('.common_selector').click(function(){
        filter_data();
    });

    $('#price_range').slider({
        range:true,
        min:1000,
        max:65000,
        values:[1000, 65000],
        step:500,
        stop:function(event, ui)
        {
            $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
            $('#hidden_minimum_price').val(ui.values[0]);
            $('#hidden_maximum_price').val(ui.values[1]);
            filter_data();
        }
    });

});
</script>

</html>