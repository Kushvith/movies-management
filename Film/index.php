<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7 no-js" lang="en-US">
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8 no-js" lang="en-US">
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html lang="en" class="no-js">

<!-- homev206:52-->

<head>
	<!-- Basic need -->
	<title>Id Show</title>
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
	<!-- preloading-->
	<!-- <div id="preloader">
    <img class="logo" src="images/logo1.png" alt="" width="119" height="58">
    <div id="status">
        <span></span>
        <span></span>
    </div>
</div> -->
	<!--end of preloading-->
	<?php
    include("./php/header.php");

    ?>

	<div class="slider sliderv2">
		<div class="container">
			<div class="row">
				<div class="slider-single-item">


					<?php
                    require "../config/pdoconfig.php";
                    $output = "";
                    $id = "";
                    $query = "select * from comingsoon where valid = 0";
                    $statement = $connection->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    if ($result) {

	                    foreach ($result as $row) {


		                    $query3 = 'SELECT * FROM comingsoon s JOIN movie movie1 ON s.movie_id = movie1.id WHERE s.id = ' . $row['id'] . ' ';
		                    $statement = $connection->prepare($query3);
		                    $statement->execute();
		                    $result1 = $statement->fetchAll();
		                    foreach ($result1 as $row1) {
			                    $output .= '
									<div class="movie-item">
									<div class="row">
										<div class="col-md-8 col-sm-12 col-xs-12">
											<div class="title-in">
												<div class="cate">
									';
			                    $id = $row['id'];
			                    $output .= '
								
											<span class="yell"><a href="#">' . $row1['genre'] . '</a></span>
											</div>
											<h1><a href="./moviesingle.php?id=' . $row['id'] . '">' . $row1['name'] . ' <span>' . $row1['releaseyear'] . ' </span></a></h1>
											
							
										';

			                    $query4 = 'SELECT t1.url FROM movie m JOIN trailer t1 ON m.trailer  = t1.id WHERE m.id = ' . $row1['id'] . ' ';
			                    $statement = $connection->prepare($query4);
			                    $statement->execute();
			                    $result2 = $statement->fetchAll();
			                    foreach ($result2 as $row2) {
				                    $output .= '
											<div class="social-btn">
											<a href="' . $row2['url'] . '" class="parent-btn"><i class="ion-play"></i> Watch Trailer</a>
											</div>	';
			                    }
			                    $output .= '	
											<div class="mv-details">
			    					<p><i class="ion-android-star"></i><span> ' . $row1['imdb_ratings'] . '</span> /10</p>
			    					<ul class="mv-infor">
			    						<li>  Run Time: ' . $row1['runtime'] . ' </li>
			    						<li>  Rated: ' . $row1['mmpa'] . '  </li>
			    						<li>  Release: ' . $row1['releaseyear'] . '</li>
			    					</ul>
			    				</div>
								<div class="btn-transform transform-vertical">
									<div><a href="./moviesingle.php?id=' . $row1['id'] . '" class="item item-1 redbtn">more detail</a></div>
									<div><a href= "./moviesingle.php?id=' . $row1['id'] . '" class="item item-2 redbtn hvrbtn">more detail</a></div>
								</div>		
			    			</div>
	    				</div>
						<div class="col-md-4 col-sm-12 col-xs-12">
		    				<div class="mv-img-2">
			    				<a href="#"><img src="' . $row1['url'] . '" alt="' . $row1['publicid'] . '"></a>
			    			</div>
		    			</div> 
						</div>
					</div>
						';

		                    }
	                    }
                    }

                    echo $output;
                    ?>
				</div>
			</div>
		</div>
	</div>




	</div>
	<div class="movie-items  full-width">
		<div class="row">
			<div class="col-md-12">
				<div class="title-hd">
					<h2>in theater</h2>
					<a href="./moviegridfw.php" class="viewall">View all <i class="ion-ios-arrow-right"></i></a>
				</div>
				<div class="tabs">

					<div class="tab-content">
						<div id="tab1-h2" class="tab active">
							<div class="row">
								<div class="slick-multiItem2">
									<?php
                                    $query = "select * from movie ORDER BY id DESC limit 0,10";
                                    $statement = $connection->prepare($query);
                                    $statement->execute();
                                    $result = $statement->fetchAll();
									if($result){
										foreach($result as $row){
		                                    echo '
											<div class="slide-it">
										<div class="movie-item">
											<div class="mv-img">
												<img src="'.$row['url'].'" alt="">
											</div>
											<div class="hvr-inner">
												<a href="moviesingle.php?id='.$row['id'].'"> Read more <i
														class="ion-android-arrow-dropright"></i> </a>
											</div>
											<div class="title-in">
												<h6><a href="moviesingle.php?id='.$row['id'].'">'.$row['name'].'</a></h6>
												<p><i class="ion-android-star"></i><span>'.$row['imdb_ratings'].'</span> /10</p>
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
			</div>
		</div>
	</div>

	<div class="trailers full-width">
		<div class="row ipad-width">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="title-hd">
					<h2>Trending trailer</h2>	
				</div>
				<div class="videos">
					<div class="slider-for-2 video-ft">
						
							<?php
                            $query = "SELECT * from trailer where main = 1";
							$statement = $connection->prepare($query);
							$statement->execute();
							$result = $statement->fetchAll();
							if($result){
								foreach($result as $row){
		                            echo '
									<div>
									<iframe class="item-video" src="#"
								data-src="'.$row['url'].'"></iframe>
								</div>
									';
								}
							}
							else{
	                            echo "Trending youtube will be added soon..";
							}						
								?>
							
					</div>
					<div class="slider-nav-2 thumb-ft">
					<?php
					 $query = "SELECT * from trailer where main = 1";
					 $statement = $connection->prepare($query);
					 $statement->execute();
					 $result = $statement->fetchAll();
                    if ($result) {
	                    foreach ($result as $row) {
		                    echo '
							<div class="item">
							<div class="trailer-img">
								
							</div>
							<div class="trailer-infor">
								<h4 class="desc">'.$row['name'].'</h4>
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

	<!-- footer v2 section-->
	<?php
    include("./php/footer.php");
    ?>
	<!-- end of footer v2 section-->

	<script src="js/jquery.js"></script>
	<script src="js/plugins.js"></script>
	<script src="js/plugins2.js"></script>
	<script src="js/custom.js"></script>
</body>

<!-- homev207:28-->

</html>