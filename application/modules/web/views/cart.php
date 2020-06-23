<html>
<head>
	<title>Shoping Cart Integration</title>
		<!-- Include bootstrap libraty -->
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css" rel="stylesheet">
		<!-- include custome css -->
	<link href="<?php echo base_url('assets/css/style.css') ?>" rel="stylesheet" type="text/css">
		<!-- include J query -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<script>
/* Update item quantity */
function updateCartItem(obj, rowid){
	$.get("<?php echo base_url('updateItemQty/'); ?>", {rowid:rowid, qty:obj.value}, function(resp){
		if(resp == 'ok'){
			location.reload();
		}else{
			alert('Cart update failed, please try again.');
		}
	});
}
</script>
</head>
<body>
<div class ="container">
	<h2>Shoping Cart</h2>
	<div class="row cart">
		<table class="table">
		<thead>
			<tr>
				<th width="10%"></th>
				<th width="30%">Product</th>
				<th width="15%">Price</th>
				<th width="13%">Quantity</th>
				<th width="20%">Sub Total</th>
				<th width="12%"></th>
			</tr>
		</thead>
		<tbody>
			<?php if($this->cart->total_items()>0)
			{
				foreach($cartItems as $item => $cart) { ?>
				<tr>
					<td>
					<?php $imageURL = !empty($cart["image"])? base_url('uploads/product_images/'.$cart['image']): base_url('uploads/product_images/download.png') ?>
					<img src="<?php echo $imageURL; ?>" width="50"/>
					</td>
					<td><?php echo $cart['name'] ?></td>
					<td><?php echo $cart['price'].'.00 USD'; ?></td>
					<td><input type="number" class="form-control text-center" 
					value="<?php echo $cart['qty']; ?>" onchange="updateCartItem(this,'<?php echo $cart['rowid']; ?>')"></td>
					<td><?php echo $cart['subtotal'].'.00 USD'; ?></td>
					<td>
					<a href="<?php echo base_url('removeItem/'.$cart['rowid']); ?>" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="glyphicon glyphicon-trash"></i></a>
					</td>
				</tr>
			
			<?php } } else { ?>
				<tr><td colspan="6"><p>Your cart is empty</p></td></tr>
			<?php } ?>
		</tbody>
		<tfoot>
		<tr>
			<td><a href="<?php echo base_url('index'); ?>" class ="btn btn-warning">
			<i class="glyphicon glyphicon-menu-left"></i>Continue Shoping</a>
			</td>
			<td colspan="3"></td>
			<?php if($this->cart->total_items()>0) { ?>
			<td class="text-left">Grand Total:<b><?php echo '$'.$this->cart->total().'.00 USD';?></b></td>
			<td> <a href="<?php echo base_url('checkout/'); ?>" class ="btn btn-success btn-block">Checkout<i class="glyphicon glyphicon-menu-right"></i></a></td>
			<?php } ?>
		</tr>
		</tfoot>
		</table>
	</div>
</div>

</body>
</html>
