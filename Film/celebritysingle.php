<!DOCTYPE html>

<html lang="en" class="no-js">

<!-- celebritysingle12:04-->

<head>
	<!-- Basic need -->
	<title>Actor details</title>
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
    $name = $_GET['name'];
    echo $id, $name;
    if ($name == "actor") {
	    $query = "select * from actors where Actor_id = '$id'";
	    $statement = $connection->prepare($query);
	    $statement->execute();
	    $result = $statement->fetchAll();
	    if ($result) {

		    foreach ($result as $row) {
			    $fname = $row['fname'];
			    $lname = $row['lname'];
			    $type = "Actor";
			    $dob = $row['dob'];
			    $place = $row['place'];
			    $details = $row['details'];
			    $gender = $row['gender'];
			    $movies_acted = $row['movies_acted'];
			    $url = $row['url'];
		    }

	    } else {
		    echo '<script> window.location.href = "./404.html"</script>';
	    }
    } else if ($name == "crew") {
	    $query = "select * from director where id = '$id'";
	    $statement = $connection->prepare($query);
	    $statement->execute();
	    $result = $statement->fetchAll();
	    if ($result) {

		    foreach ($result as $row) {
			    $fname = $row['name'];
			    $lname = "";
			    $type = $row['type'];
			    $details = $row['details'];
			    $dob = $row['dob'];
			    $gender = $row['gender'];
			    $movies_acted = $row['directed_no'];
			    $url = $row['url'];
			    $place = $row['place'];
		    }

	    } else {
		    echo '<script> window.location.href = "./404.html"</script>';
	    }
    } else {
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
						<h1 class="bd-hd"><?php echo "$fname $lname"; ?></h1>
						<p class="ceb-single"><?php echo $type; ?></p>
						<div class="social-link cebsingle-socail">
							<a href="facebook.com/<?php echo "$fname $lname"; ?>"><i
									class="ion-social-facebook"></i></a>
							<a href="twitter.com/<?php echo "$fname $lname"; ?>"><i class="ion-social-twitter"></i></a>
						</div>
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
													<h6>Fullname: </h6>
													<p><a href="#"><?php echo "$fname $lname"; ?></a></p>
												</div>
												<div class="sb-it">
													<h6>Date of Birth: </h6>
													<p><?php echo $dob; ?></p>
												</div>
												<div class="sb-it">
													<h6>place: </h6>
													<p><?php echo $place; ?></p>
												</div>
												<div class="sb-it">
													<h6>acted movies:</h6>
													<p><?php echo $movies_acted; ?> movies</p>
												</div <div class="sb-it">
												<h6>gender:</h6>
												<p><?php echo $gender; ?></p>
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
</body>

<!-- celebritysingle12:18-->

</html>