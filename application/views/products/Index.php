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
<h3 class="display-3">Products</h3>
<div class="container">
	<div  style="float:right">
		<a href="<?php echo base_url('index.php/cart');?>"
		class="cart-link" title='view cart'>
	<img src="<?php echo base_url("photos/cart.Jpg")?>">
		<span>
		(<?php echo $this->cart->total_items(); ?>)
		</span>
		</a>
		</div></div>
      <div class="container mt-5">
        <!--########################START HERE#########################-->
		
    <br>
        <!-- CARD WITH IMAGE -->
	
		<div class="row">
		<?php
		foreach($products as $row){
		
		?>
		<div class="col-sm-6">
        <div class="card" style="width:20rem">
            <img class="card-img-top"src="<?php echo base_url("photos/".$row['image']) ?>" style="height:200px" alt="Card image cap">
            <div class="card-block">
			 <h4 class="pull-right"style="float:right;text-decoration:underline;color:red"><?php echo $row["Price"]."PKR"?></h4>
                <h4 class="card-title text-success"><?php echo $row["name"]?></h4>
                <p class="card-text"><?php echo $row["Description"]?></p>
                 <a class="btn btn-primary" href="<?php echo base_url("index.php/Products/addToCart/".$row['id'])?>">Add to Cart</a>
            </div>
        </div></div>
	
		<?php }?>
    </div></div><!-- ./container -->
    <div style="margin-top:500px;"></div>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
    integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
    crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</body>
</html>
