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
<script>

function updateCartItem(value,id)
{
	
	$.get("http://[::1]/codij/index.php/cart/updateItemQty",{rowid:id,qty:value},function(data){
		
		if(data=='ok')
		{
			location.reload();//refresh page
		}
		else
		{
			
			alert("updation failded!!Try Again");
		}
		
		
	});
	}
	
	


</script>
	<title>Bootstrap Sandbox</title>
</head>
<body>



<div class="container">
<h2>Shopping Cart</h2>
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
			<td><input type="number" class="form-control text-center" value="<?php echo $item['qty']?>" onchange="updateCartItem(this.value,'<?php echo $item["rowid"]?>')"></td><!-- this for textbox value and rowid of product id -->
				<td><?php echo $item["subtotal"]?>PKR</td>
				<td><a href="<?php echo base_url("index.php/cart/removeItem/").$item["rowid"]?>" onclick="return confirm('are you sure')" class="btn btn-danger">delete</a></td>
				</tr>
<?php }
 }else

echo "<td></td><td>No data Available</td>";
	?>

</tbody>

</table></div>
<div class="row">
<div class="col-sm-4">
<a href="<?php echo base_url("index.php/Products")?>" class="btn btn-primary">continue shopping</a>
</div>
<div class="col-sm-4"></div>

<?php    if($this->cart->total_items()>0)
	   {
		 ?>
		 <div style="float:right;margin-right:5px">
<p class="mt-2">Grand Total:<b><?php echo $this->cart->total()?></b></p>
</div>
<div style="float:right;margin-left:60px">
<a href="<?php echo base_url("index.php/CheckOut")?>" class="btn btn-success">Check Out</a>
	   <?php }?>
</div>
</div>





</body>
</html>