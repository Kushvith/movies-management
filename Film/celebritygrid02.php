<!DOCTYPE html>

<html lang="en" class="no-js">

<!-- celebritygrid0211:44-->

<head>
	<!-- Basic need -->
	<title>Actors |IdShow</title>
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
	<div id="preloader">
		<img class="logo" src="images/logo1.png" alt="" width="119" height="58">
		<div id="status">
			<span></span>
			<span></span>
		</div>
	</div>
	<!--end of preloading-->
	<!--login form popup-->
	<?php
include("./php/header.php");
?>
	<!-- END | Header -->

	<div class="hero common-hero">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="hero-ct">
						<h1>Actors listing</h1>
						<ul class="breadcumb">
							<li class="active"><a href="#">Home</a></li>
							<li> <span class="ion-ios-arrow-right"></span> celebrity listing</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- celebrity grid v2 section-->
	<div class="page-single">
		<div class="container">
			<div class="row ipad-width2">
				<div class="col-md-12 col-12 col-sm-12 col-xs-12">

					<div class="row">
						<?php 
							  require "../config/pdoconfig.php";
							  $query = "select * from actors";
							  $statement = $connection->prepare($query);
							  $statement->execute();
							  $result = $statement->fetchAll();
                        if ($result) {

	                        foreach ($result as $row) {
		                        echo '
								<div class="col-md-4">
								<div class="ceb-item-style-2">
									<img src="'.$row['url'].'" alt="'.$row['fname'].'" width="100px" height="100px">
									<div class="ceb-infor">
										<h2><a href="celebritysingle.php?id='.$row['Actor_id'].'&&name=actor"">'.$row['fname'].'</a></h2>
										<span>actor, '.$row['place'].'</span>
									</div>
								</div>
							</div>
								';
	                        }
                        }		  
						?>
					
						
					</div>
					
					
				</div>
				
			</div>
		</div>
	</div>
	<!-- end of celebrity grid v2 section-->
	<!-- footer section-->
	<?php
include("./php/footer.php");
?>
	<!-- end of footer section-->

	<script src="js/jquery.js"></script>
	<script src="js/plugins.js"></script>
	<script src="js/plugins2.js"></script>
	<script src="js/custom.js"></script>
</body>

<!-- celebritygrid0211:56-->

</html>