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
	<title>ECommerce</title>
</head>
<body>

<div class="container">
<h3 class="display-5 mt-3">Order Status</h3>
<h5 class="text-success"style="border:dotted">Your Order has been placed successfully</h5>
	
      <div class="container">
        <!--########################START HERE#########################-->
		
    <br>
        <!-- CARD WITH IMAGE -->
	<div class="card"style="box-shadow: 0px 0px 15px 0px rgba(0, 0, 0, 0.1);background-color:#d3d3d3">
		<div class="row">
	
		
        
        <div class="col-sm-6">
		<h6 style="margin-left:15px">Shipping Address</h6>
		  <p style="margin-left:15px"><?php echo $cust["name"]?></p>
		  <p style="margin-left:15px"><?php echo $cust["email"]?></p>
		  <p style="margin-left:15px" ><?php echo $cust["phone"]?></p>
		  <p style="margin-left:15px"><?php echo $cust["address"]?></p>
		
		 </div>
		
         <div class="col-sm-6">
		<h6 style="margin-left:15px">Shipping Address</h6>
		 <p style="margin-left:15px">Reference ID:<?php echo $cust["id"]?></p>
		  <p style="margin-left:15px">Grand Total:<?php echo $this->cart->total()?>PKR</p>
		 </div>
		
    </div></div>
	<table class="table">
<thead>
<tr>
<th ></th>
<th >Product</th>
<th >Price</th>
<th >Quantity</th>
<th >Subtotal</th>
<th ></th>
</tr>
</thead>
<tbody>
<?php if($this->cart->total_items()>0)
{
	$cartItems=$this->cart->contents();
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
}?>


</tbody>
	</table>
		
	
	</div></div>
<div class="cantainer mt-3"><div class="row">

    </div></div><!-- ./container -->


    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
    integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
    crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</body>
</html>
