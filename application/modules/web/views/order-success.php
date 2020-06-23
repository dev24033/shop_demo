<html>
<head>
	<title>Shoping Cart Integration</title>
		<!-- Include bootstrap libraty -->
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css" rel="stylesheet">
		<!-- include custome css -->
	<link href="<?php echo base_url('assets/css/style.css') ?>" rel="stylesheet" type="text/css">
	
</head>
<body>
<div class="container">
	<h2>Order Status</h2>
	<p class="ord-succ">Your order has been placed successfully..</p>
				<!-- Order status and shipping information -->
	<div class="row col-lg-12 ord-addr-info">
		<div class="col-sm-6 adr">
			<div class="hdr">Shipping address</div>
			<p>Name -: <?php echo $order1['name']; ?></p>
			<p>Email -: <?php echo $order1['email']; ?></p>
			<p>Phone -: <?php echo $order1['phone']; ?></p>
			<p>Address -: <?php echo $order1['address']; ?></p>
		</div>
		<div class="col-sm-6 info">
			<div class="hdr">Order Info</div>
			<p><b>Reference ID</b> #<?php echo $order1['id']; ?></p>
			<?php  /* echo "<pre>";
			print_r($order1);  */ ?>
			<p><b>Total</b> <?php echo '$'.$order1['grand_total'].'USD'; ?></p>
		</div>
	</div>

		<!-- Order items -->
	<div class="row ord-items">
	<hr>
		<?php if(!empty($order1['items']))
		{
			foreach($order1['items'] as $item) {  ?>
			<div class="col-lg-12 item">
				<div class="col-sm-2">
					<div class="img" style="height:75px; width:75px;">
						<?php $imageURL = !empty($item["image"])? base_url('uploads/product_images/'.$item['image']): base_url('uploads/product_images/download.png') ?>
					<img src="<?php echo $imageURL; ?>" width="75"/>
					</div>
				</div>
				<div class="col-sm-4">
					<p><b><?php echo $item['name']; ?></b></p>
					<p><?php echo '$',$item['price']; ?></p>
					<p>QTY: <?php echo $item['quantity']; ?></p>
				</div>
				<div class= "col-sm-2">
					<p><b><?php echo '$',$item['sub_total'].'USD'; ?></b></p>
				</div>
			</div>
		<?php } } ?>
	</div>
	<div style="margin-top:50px;">
	<a href="<?php echo base_url('index'); ?>" class ="btn btn-warning">
			<i class="glyphicon glyphicon-menu-left"></i>Continue Shoping</a>
			</div>
</div>
	
	
</body>
</html>
