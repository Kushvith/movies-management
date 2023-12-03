<!DOCTYPE html>

<html lang="en" class="no-js">

<!-- celebritysingle12:04-->

<head>
	<!-- Basic need -->
	<title>shopping details</title>
	<meta charset="UTF-8">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<link rel="profile" href="#">

	<!--Google Font-->
	<link rel="stylesheet" href='http://fonts.googleapis.com/css?family=Dosis:400,700,500|Nunito:300,400,600' />
	<!-- Mobile specific meta -->
	<meta name=viewport content="width=device-width, initial-scale=1">
	<meta name="format-detection" content="telephone-no">

	<!-- CSS files -->
	<link rel="stylesheet" href="css/plugins.css">
	<link rel="stylesheet" href="css/style.css">

</head>

<body>
	<!--preloading-->
	<!-- <div id="preloader">
    <img class="logo" src="images/logo1.png" alt="" width="119" height="58">
    <div id="status">
        <span></span>
        <span></span>
    </div>
</div> -->
	<!--end of preloading-->
	<!--login form popup-->
	<?php
    include("./php/header.php");
    ?>
	<!-- END | Header -->

	<div class="hero hero3">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<!-- <h1> movie listing - list</h1>
				<ul class="breadcumb">
					<li class="active"><a href="#">Home</a></li>
					<li> <span class="ion-ios-arrow-right"></span> movie listing</li>
				</ul> -->
				</div>
			</div>
		</div>
	</div>
	<!-- celebrity single section-->
	<?php
    require "../config/pdoconfig.php";
    $id = $_GET['id'];
  
	    $query = "select * from product where id = '$id'";
	    $statement = $connection->prepare($query);
	    $statement->execute();
	    $result = $statement->fetchAll();
	    if ($result) {

		    foreach ($result as $row) {
            $name = $row['name'];
            $price = $row['price'];
            $dis = $row['dis'];
            $details = $row['details'];
            $url = $row['url'];
            $type = $row['type'];
		    
            }
	    } 
        else {
		    echo '<script> window.location.href = "./404.html"</script>';
        }
  
    ?>
	<div class="page-single movie-single cebleb-single">
		<div class="container">
			<div class="row ipad-width">
				<div class="col-md-4 col-sm-12 col-xs-12">
					<div class="mv-ceb">
						<img src="<?php echo $url; ?>" alt="">
					</div>
				</div>
				<div class="col-md-8 col-sm-12 col-xs-12">
					<div class="movie-single-ct">
						<h1 class="bd-hd"><?php echo "$name"; ?></h1>
						<p class="ceb-single"><?php echo $type; ?></p>
						
						<div class="movie-tabs">
							<div class="tabs">
								<ul class="tab-links tabs-mv">
									<li class="active"><a href="#overviewceb">Overview</a></li>

								</ul>
								<div class="tab-content">
									<div id="overviewceb" class="tab active">
										<div class="row">
											<div class="col-md-8 col-sm-12 col-xs-12">
												<p><?php echo $details; ?></p>
												<div class="title-hd-sm">
													<h4>Photos</h4>

												</div>
												<div class="mvsingle-item ov-item">
													<a class="img-lightbox" data-fancybox-group="gallery" href=""><img
															src="<?php echo $url; ?>" alt="" width="100px"></a>


												</div>

												<!-- movie cast -->

											</div>
											<div class="col-md-4 col-xs-12 col-sm-12">
												<div class="sb-it">
													<h6>Product name: </h6>
													<p><a href="#"><?php echo "$name"; ?></a></p>
												</div>
												<div class="sb-it">
													<h6>price: </h6>
													<p><?php echo "₹". $dis."    " ."<del>₹".$price."</del>"; ?></p>
												</div>
												<div class="sb-it">
													<h6>type: </h6>
													<p><?php echo $type; ?></p>
												</div>
                                                <div class="sb-it">

<form id="checkout-selection" action="./php/razorpay/pay.php" method="POST">		
						<input type="hidden" name="item_name" value="<?php echo $name; ?>">
						<input type="hidden" name="item_description" value="<?php echo $details; ?>">
						<input type="hidden" name="item_number" value="">
						<input type="hidden" name="amount" value="<?php echo $dis; ?>">
						<input type="hidden" name="address" value="<?php
			 include('../config/pdoconfig.php');
				$query = "SELECT * FROM `user_login` where id = ".$_SESSION['id']."";
				$statement = $connection->prepare($query);
    								$statement->execute();
									$result= $statement->fetchAll();	
									if($result)
									{
										// echo $result;
										foreach($result as $row){
											echo $row['address'];
										}
									}

			?>">
						<input type="hidden" name="currency" value="INR">	
						<input type="hidden" name="cust_name" value="<?php echo $_SESSION['name']; ?>g">								
						<input type="hidden" name="email" value="<?php echo $_SESSION['email']; ?>">	
						<input type="hidden" name="contact" value="235464354">	
						<input type="hidden" name="merchant_id" value="<?php echo $_SESSION['id'];  ?>">	
						<input type="hidden" name="p_id" value="<?php echo $id;  ?>">								
						<input type="submit" class="btn btn-primary" value="Buy Now">					
					</form>
													
												</div>
											</div>
										</div>
									</div>



								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	<!-- celebrity single section-->

	<!-- footer section-->
	<?php
    include("./php/footer.php");
    ?>
	<!-- end of footer section-->

	<script src="js/jquery.js"></script>
	<script src="js/plugins.js"></script>
	<script src="js/plugins2.js"></script>
	<script src="js/custom.js"></script>
	<script>
		
	</script>
</body>

<!-- celebritysingle12:18-->

</html>