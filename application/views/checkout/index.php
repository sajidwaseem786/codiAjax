<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url("bootstrap/css/bootstrap.min.css")?>">

	 <link rel="stylesheet" href="font/css/all.css">
	 
<script src=<?php echo base_url("bootstrap/js/my.js")?>></script>

	<title>Bootstrap Sandbox</title>
</head>
<body>

<div class="container mt-4">
<div class="row">
<div class="col-sm-8">

<h2 >Order Perview</h2>
<div class="row cart">
<table class="table">
<thead>
<tr>
<th width="10%"></th>
<th width="30%">Product</th>
<th width="15%">Price</th>
<th width="13%">Quantity</th>
<th width="20%">Subtotal</th>
<th width="12%"></th>
</tr>
</thead>
<tbody>
<?php if($this->cart->total_items()>0)
{
	foreach($cartItems as $item)
	{?>
	<tr>
	<td>
	<?php $image_name=$item['image'];?>
	<img src="<?php echo base_url("photos/$image_name");?>" style="width:50px">
    </td>
	<td><?php echo $item['name']?></td>
		<td><?php echo $item['price'] ?></td>
			<td><?php echo $item['qty']?></td><!-- this for textbox value and rowid of product id -->
				<td><?php echo $item["subtotal"]?>PKR</td>
				
				</tr>
			
				
<?php }
 }else

echo "<td></td><td>No data Available</td>";
	?>

<tr><td> <a href="<?php echo base_url("index.php/cart")?>"><button  class="btn btn-primary">< Back to cart</button></a>
</td><td></td><td></td><td></td><td colspan="2">Grand Total:<b><?php echo $this->cart->total()?></b></td></tr>
</tbody>
</table>
	
	

</div>
</div>
<div class="col-sm-4">
<form class="form-horizontal" method="post" action="<?php echo base_url("index.php/CheckOut/validate")?>">
<div class="ship-info">
<p style="margin-top:60px">shipping info</p>
<div class="">
<label>Name</label>
<div>
<input type="text" class="form-control" name="name">
<?php echo form_error('name','<p class="help-block error text-danger">','</p>'); ?>
</div>
</div>

<div class="form-group">
<label>Email</label>
<div >
<input type="email" class="form-control" name="email">
<?php echo form_error('email','<p class="help-block text-danger">','</p>'); ?>
</div>
</div>

<div class="form-group">
<label>Phone</label>
<div >
<input type="text" class="form-control" name="phone">
<?php echo form_error('phone','<p class="help-block text-danger">','</p>'); ?>
</div>
</div>

<div class="form-group">
<label>Address</label>
<div>
<input type="adrs" class="form-control" name="address">
<?php echo form_error('address','<p class="help-block text-danger">','</p>'); ?>
</div>
</div>

<div style="float:right;margin-left:60px">
<button type="submit" name="placeOrder" class="btn btn-success">Place Order </button>
	 </form>
</div>
</div>
</div>




</body>
</html>