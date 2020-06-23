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
	<h2>Order Preview</h2>
	<div class="row checkout">
		<div class="col-lg-8">
		<!--Order Item -->
		<table class="table">
		<thead>
			<tr>
				<th width="13%"></th>
				<th width="34%">Product </th>
				<th width="18%">Price</th>
				<th width="13%">Quantity</th>
				<th width="22%">Sub Total</th>
			</tr>
		</thead>
		<tbody>
			<?php if($this->cart->total_items()>0)
			{
				foreach($cartItems as $item => $cart) { ?>
				<tr>
					<td>
					<?php $imageURL = !empty($cart["image"])? base_url('uploads/product_images/'.$cart['image']): base_url('uploads/product_images/download.png') ?>
					<img src="<?php echo $imageURL; ?>" width="75"/>
					</td>
					<td><?php echo $cart['name'] ?></td>
					<td><?php echo $cart['price'].'.00 USD'; ?></td>
					<td><?php echo $cart['qty']; ?></td>
					<td><?php echo $cart['subtotal'].'.00 USD'; ?></td>
				</tr>
			
			<?php } } else { ?>
				<tr><td colspan="5"><p>No item in your cart</p></td></tr>
			<?php } ?>
		</tbody>
		<tfoot>
			<tr>
				<td colspan="4"></td>
				<?php if($this->cart->total_items()>0) { ?>
				<td >
				<strong style="margin-left:-50px;"> Total <?php echo '$'.$this->cart->total().'.00 USD'; ?> </strong>
				</td>
				<?php } ?>
			</tr>
		</tfoot>
		</table>
		</div>
					<!-- Shipping Address -->
		<form class="form-horizontal" method="POST">
		<div class="col-lg-4">
			<h4>Shipping Info</h4>
			<div class="form-group">
				<label class="control-label col-sm-2">Name</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="name" value="<?php echo !empty($custData['name'])? $custData['name']:''; ?>" placeholder="Enter name" >
					<?php echo form_error('name','<p class="help-block error">','</p>'); ?>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2">Email</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="email" value="<?php echo !empty($custData['email'])? $custData['email']:''; ?>" placeholder="Enter email" >
					<?php echo form_error('email','<p class="help-block error">','</p>'); ?>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2">Phone</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="phone" value="<?php echo !empty($custData['phone'])? $custData['phone']:''; ?>" placeholder="Enter phone" >
					<?php echo form_error('phone','<p class="help-block error">','</p>'); ?>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2">Address</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="address" value="<?php echo !empty($custData['address'])? $custData['address']:''; ?>" placeholder="Enter address" >
					<?php echo form_error('address','<p class="help-block error">','</p>'); ?>
				</div>
			</div>
			
		</div>
		</div>
		<div class="footBtn">
			<a href="<?php echo base_url('cart/');?>" class="btn btn-warning">
			<i class="glyphicon glyphicon-menu-left"></i>Back to Cart</a>
		
			<button style="float: right;" type="submit" name="placeOrder" value="submit" class="btn btn-success orderBtn right">Place Order<i class="glyphicon glyphicon-menu-right"></i></button> 
			
		</div>
		</form>
	
</div>

</body>
</html>
