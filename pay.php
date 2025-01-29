
<!DOCTYPE html>
<html lang="en">
<head>
<title>Germinate an Agriculture Category Flat Bootstrap Responsive Website Template | Gallery :</title>
<!-- custom-theme -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Germinate Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //custom-theme -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<!-- //js -->
<!-- gallery -->
<link href="css/lsb.css" rel="stylesheet" type="text/css">
<!-- //gallery -->
<!-- font-awesome-icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome-icons -->
<link href="//fonts.googleapis.com/css?family=Bree+Serif&amp;subset=latin-ext" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
</head>
<?php
// Now you can access $_SESSION
session_start();
?>
<?php

include('conn.php'); // Include your database connection
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve the session data (cart)
    $cart = $_SESSION['cart'];

    // Retrieve form data
    $username = $_SESSION['user_id'];
    $address = $_POST['address'];
    $payment_method = $_POST['payment_method'];
    $order_status = 'pending'; // Default order status
    $order_date = date('Y-m-d'); // Current date

    // Initialize variables to store the items and total price
    $items = [];
    $total_quantity = 0;
    $total_price = 0;

    // Loop through the cart to process items, quantities, and prices
    foreach ($cart as $item) {
        $items[] = $item['name'];  // Add item name to the items array
        $total_quantity += $item['quantity'];  // Add quantity to total
        $total_price += $item['price'] * $item['quantity'];  // Add price to total
    }

    // Convert the items array to a string
    $items_str = implode(', ', $items);

    // Prepare the SQL query to insert the order
// Prepare the SQL query to insert the order
$sql = "INSERT INTO orders (username, address, payment_method, order_status, order_date, items, quantity, price) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

// Prepare the statement
if ($stmt = $conn->prepare($sql)) {
    // Bind the parameters
    $stmt->bind_param("ssssssid", $username, $address, $payment_method, $order_status, $order_date, $items_str, $total_quantity, $total_price);

    // Execute the query
    if ($stmt->execute()) {
        echo "Order placed successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
	} else {
    echo "Error: " . $conn->error;
	}
}
?>

<body>
<!-- banner -->
	<div class="banner1">
		<div class="container">
			<div class="w3_agileits_banner_main_grid">
				<div class="w3_agile_logo">
					<h1><a href="index.php"><span>G</span>oGreen<i>Grow healthy products</i></a></h1>
				</div>
				<div class="agile_social_icons_banner">
					<ul class="agileits_social_list">
						<li><a href="#" class="w3_agile_facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<li><a href="#" class="agile_twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
						<li><a href="#" class="w3_agile_dribble"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
						<li><a href="#" class="w3_agile_vimeo"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
					</ul>
				</div>
				<div class="agileits_w3layouts_menu">
					<div class="shy-menu">
						<a class="shy-menu-hamburger">
							<span class="layer top"></span>
							<span class="layer mid"></span>
							<span class="layer btm"></span>
						</a>
						<div class="shy-menu-panel">
							<nav class="menu menu--horatio link-effect-8" id="link-effect-8">
								<ul class="w3layouts_menu__list">
									<li><a href="index.php">Home</a></li>
									<li><a href="about.html">About Us</a></li> 
									<li><a href="services.html">Services</a></li>
									<li class="active"><a href="gallery.html">Gallery</a></li> 
									<li><a href="contact.html">Contact Us</a></li>
                                    <li><a href="login.php">Login</a></li>
                                    <li><a href="buy.php">Buy</a></li>
									<li style="list-style: none;"><a href="logout.php" style="color: inherit; text-decoration: none;" onmouseover="this.style.color='red'" onmouseout="this.style.color='inherit'">Log out</a></li>
								</ul>
							</nav>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!-- banner -->
<!-- bootstrap-pop-up -->
	<div class="modal video-modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
				</div>
				<section>
					<div class="modal-body">
						<img src="images/4.jpg" alt=" " class="img-responsive" />
						<p>Ut enim ad minima veniam, quis nostrum 
							exercitationem ullam corporis suscipit laboriosam, 
							nisi ut aliquid ex ea commodi consequatur? Quis autem 
							vel eum iure reprehenderit qui in ea voluptate velit 
							esse quam nihil molestiae consequatur, vel illum qui 
							dolorem eum fugiat quo voluptas nulla pariatur.
							<i>" Quis autem vel eum iure reprehenderit qui in ea voluptate velit 
								esse quam nihil molestiae consequatur.</i></p>
					</div>
				</section>
			</div>
		</div>
	</div>
<!-- //bootstrap-pop-up -->
<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<div class="w3layouts_breadcrumbs_left">
				<ul>
					<li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Home</a><span>/</span></li>
					<li><i class="fa fa-picture-o" aria-hidden="true"></i>Payment</li>
				</ul>
			</div>
			<div class="w3layouts_breadcrumbs_right">
				<h2>Payment</h2>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- gallery -->
	<div class="welcome">
		<div class="container">
			<h3 class="agileits_w3layouts_head">do  <span>Payment</span></h3>
		 	<!-- # <h3><?php echo '<pre>' . print_r($_SESSION['cart'], true) . '</pre>'; ?></h3>  -->
			Germinate


			<div class="w3_agile_image">
				<img src="images/1.png" alt=" " class="img-responsive" />
			</div>
			
			
			<div class="container">
    <div class="row-fluid">
        <form class="form-horizontal" method="POST" action="">
            <fieldset>
                <div id="legend">
                    <legend class="">Payment</legend>
                </div>
     
                <!-- Name -->
                <div class="control-group">
                    <label class="control-label" for="username">Card Holder's Name</label>
                    <div class="controls">
                        <input type="text" id="username" name="username" placeholder="" class="input-xlarge" required>
                    </div>
                </div>
     
                <!-- Address -->
                <div class="control-group">
                    <label class="control-label" for="address">Shipping Address</label>
                    <div class="controls">
                        <textarea id="address" name="address" placeholder="" class="input-xlarge" required></textarea>
                    </div>
                </div>
     
                <!-- Payment Method -->
                <div class="control-group">
                    <label class="control-label" for="payment_method">Payment Method</label>
                    <div class="controls">
                        <select id="payment_method" name="payment_method" class="input-xlarge" required>
                            <option value="cash_on_delivery" selected>Cash on Delivery</option>
                            <option value="credit_card">Credit Card</option>
                            <option value="debit_card">Debit Card</option>
                            <option value="paypal">PayPal</option>
                        </select>
                    </div>
                </div>
     
                <!-- Order Status -->
                <div class="control-group">
                    <label class="control-label" for="order_status">Order Status</label>
                    <div class="controls">
                        <input type="text" id="order_status" name="order_status" value="pending" readonly class="input-xlarge">
                    </div>
                </div>
     
                <!-- Order Date -->
                <div class="control-group">
                    <label class="control-label" for="order_date">Order Date</label>
                    <div class="controls">
                        <input type="text" id="order_date" name="order_date" value="<?php echo date('Y-m-d'); ?>" readonly class="input-xlarge">
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="control-group">
                    <div class="controls">
						<br>
                        <button class="btn btn-success" type="submit">Place Order</button>
                    </div>
                </div>
     
            </fieldset>
        </form>
    </div>
</div>







				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!-- //gallery -->
	<script src="js/lsb.min.js"></script>
	<script>
	$(window).load(function() {
		  $.fn.lightspeedBox();
		});
	</script>
<!-- footer -->
	<div class="footer">
		<div class="container">
			<div class="w3agile_footer_grids">
				<div class="col-md-3 agileinfo_footer_grid">
					<div class="agileits_w3layouts_footer_logo">
						<h2><a href="index.php"><span>G</span>oGreen<i>Grow healthy products</i></a></h2>
					</div>
				</div>
				<div class="col-md-4 agileinfo_footer_grid">
					<h3>Contact Info</h3>
					<h4>Call Us <span>+91 XXXXXXXXXX</span></h4>
					<p> XXXXX <span>XXXXX</span></p>
					<ul class="agileits_social_list">
						<li><a href="#" class="w3_agile_facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<li><a href="#" class="agile_twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
						<li><a href="#" class="w3_agile_dribble"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
						<li><a href="#" class="w3_agile_vimeo"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
					</ul>
				</div>
				<div class="col-md-2 agileinfo_footer_grid agileinfo_footer_grid1">
					<h3>Navigation</h3>
					<ul class="w3layouts_footer_nav">
						<li><a href="index.php"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>Home</a></li>
						<li><a href="icons.html"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>Web Icons</a></li>
						<li><a href="typography.html"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>Typography</a></li>
						<li><a href="contact.html"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>Contact Us</a></li>
					</ul>
				</div>
				<div class="col-md-3 agileinfo_footer_grid">
					<h3>Blog Posts</h3>
					<div class="agileinfo_footer_grid_left">
						<a href="#" data-toggle="modal" data-target="#myModal"><img src="images/6.jpg" alt=" " class="img-responsive" /></a>
					</div>
					<div class="agileinfo_footer_grid_left">
						<a href="#" data-toggle="modal" data-target="#myModal"><img src="images/2.jpg" alt=" " class="img-responsive" /></a>
					</div>
					<div class="agileinfo_footer_grid_left">
						<a href="#" data-toggle="modal" data-target="#myModal"><img src="images/5.jpg" alt=" " class="img-responsive" /></a>
					</div>
					<div class="agileinfo_footer_grid_left">
						<a href="#" data-toggle="modal" data-target="#myModal"><img src="images/3.jpg" alt=" " class="img-responsive" /></a>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<div class="w3_agileits_footer_copy">
			<div class="container">
				<p>© 2020 GoGreen. All rights reserved | Design by <a href="">XXXXXXXXXX.</a></p>
			</div>
		</div>
	</div>
<!-- //footer -->
<!-- menu -->
	<script>
		$(function() {
			
			initDropDowns($("div.shy-menu"));

		});

		function initDropDowns(allMenus) {

			allMenus.children(".shy-menu-hamburger").on("click", function() {
				
				var thisTrigger = jQuery(this),
					thisMenu = thisTrigger.parent(),
					thisPanel = thisTrigger.next();

				if (thisMenu.hasClass("is-open")) {

					thisMenu.removeClass("is-open");

				} else {			
					
					allMenus.removeClass("is-open");	
					thisMenu.addClass("is-open");
					thisPanel.on("click", function(e) {
						e.stopPropagation();
					});
				}
				
				return false;
			});
		}
	</script>
<!-- //menu -->
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
<!-- for bootstrap working -->
	<script src="js/bootstrap.js"></script>
<!-- //for bootstrap working -->
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
<!-- //here ends scrolling icon -->
</body>
</html>
