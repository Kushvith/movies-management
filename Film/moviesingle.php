<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7 no-js" lang="en-US">
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8 no-js" lang="en-US">
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html lang="en" class="no-js">

<!-- moviesingle07:38-->
<?php
            require "../config/pdoconfig.php";
            $id = $_GET['id'];
            $trail = "";
            $query = "select * from movie where id = '$id'";
            $statement = $connection->prepare($query);
            $statement->execute();
            $result = $statement->fetchAll();
            if ($result) {
				
	            foreach ($result as $row) {
		            $mov_title = $row['name'];
		            $release = $row['releaseyear'];
		            $stars = $row['imdb_ratings'];
		            $image = $row['url'];
		            $des = $row['description'];
		            $genre = $row['genre'];
		            $runtime = $row['runtime'];
		            $mmpa = $row['mmpa'];

	            }

            } else {
	            echo '<script> window.location.href = "./404.html"</script>';
            }
            $query1 = 'SELECT user1.url, user1.name FROM movie m JOIN trailer user1 ON m.trailer  = user1.id WHERE m.id = ' . $id . ' ';
            $statement = $connection->prepare($query1);
            $statement->execute();
            $result1 = $statement->fetchAll();
            if ($result1) {
	            // trailer exists
            	foreach ($result1 as $row1) {

		            $url = $row1['url'];
		            $trailname = $row1['name'];
		            $trail = 1;
	            }
            } else {
	            // trailer doesnot exists
            	$trail = "";
            }
            ?>
<head>
	<!-- Basic need -->
	<title><?php echo $mov_title;?> |Idshow</title>
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
	use function GuzzleHttp\json_encode;
    include("./php/header.php");
    ?>
	<!-- END | Header -->

	<div class="hero mv-single-hero">
		<div class="container">
			<div class="row">
				<div class="col-md-12">

				</div>
			</div>
		</div>
	</div>
	<div class="page-single movie-single movie_single">
		<div class="container">
		
			<div class="row ipad-width2">
				<div class="col-md-4 col-sm-12 col-xs-12">
					<div class="movie-img sticky-sb">
						<img src="<?php echo $image; ?>" alt="">
						<div class="movie-btn">
							<?php
                            if ($trail != "") {
	                            echo '
								<div class="btn-transform transform-vertical red">
							<div><a href="#" class="item item-1 redbtn"> <i class="ion-play"></i> Watch Trailer</a></div>
							<div><a href="' . $url . '" class="item item-2 redbtn fancybox-media hvr-grow"><i class="ion-play"></i></a></div>
						</div>
								';
                            }
                            $comingbtnquery = "SELECT * FROM comingsoon where movie_id = '$id'";
                            $statement = $connection->prepare($comingbtnquery);
                            $statement->execute();
                            $resultcoming = $statement->fetchAll();
                            if ($resultcoming) {
	                            foreach ($resultcoming as $row7) {
		                            echo '
								<div class="btn-transform transform-vertical red mb-2">
								<div><a href="./comingsoon.php?id='. $row7['id'] . '" class="item item-1 redbtn"> <i class="ion-stop"></i> coming soon</a></div>
								<div><a href="./comingsoon.php?id=' . $row7['id'] . '" class="item item-2 redbtn"><i class="ion-stop"></i></a></div>
							</div>
								';
	                            }
                            }
                            $bookbtnquery = "SELECT * FROM shows where movie_id = '$id' group by movie_id";
                            $statement = $connection->prepare($bookbtnquery);
                            $statement->execute();
                            $resultbook = $statement->fetchAll();
                            if ($resultbook) {
	                            foreach ($resultbook as $row8) {
		                            echo '
							<div class="btn-transform transform-vertical mt-3">
							<div><a href="./bookticket.php?id=' . $id . '" class="item item-1 yellowbtn"> <i class="ion-card"></i> Buy ticket</a></div>
							<div><a href="./bookticket.php?id=' . $id. '" class="item item-2 yellowbtn fancybox-media hvr-grow"><i class="ion-card"></i></a></div>
						</div>
							';
	                            }
                            }
							$shopquery = "select * from product where movie_name = '$id'";
							$statement = $connection->prepare($shopquery);
                            $statement->execute();
                            $resultproduct = $statement->fetchAll();
							if($resultproduct)
							{
								foreach($resultproduct as $row9)
								{
										echo '
								<div class="btn-transform transform-vertical mt-3">
								<div><a href="./shopping.php?id=' . $id . '" class="item item-1 yellowbtn"> <i class="ion-card"></i>Shopping</a></div>
								<div><a href="./shopping.php?id=' . $id. '" class="item item-2 yellowbtn fancybox-media hvr-grow"><i class="ion-card"></i></a></div>
							</div>';
								}
							}
                            ?>
						


						</div>
					</div>
				</div>
				<div class="col-md-8 col-sm-12 col-xs-12">
					<div class="movie-single-ct main-content">
						<h1 class="bd-hd"><?php echo $mov_title; ?> <span><?php echo $release; ?></span></h1>

						<div class="movie-rate">
							<div class="rate">
								<i class="ion-android-star"></i>
								<p><span><?php echo $stars; ?></span> /10<br>
								</p>
							</div>
							<div class="rate-star">
								<p>Movie Ratings: </p>
								<?php
                                for ($i = 0; $i < (intval($stars)); $i++) {
	                                echo '<i class="ion-ios-star"></i>';
                                }
                                for ($i = 0; $i < (intval((10 - $stars))); $i++) {
	                                echo '<i class="ion-ios-star-outline"></i>';
                                }
                                ?>
							</div>
						</div>
						<div class="movie-tabs">
							<div class="tabs">
								<ul class="tab-links tabs-mv">
									<li class="active"><a href="#overview">Overview</a></li>
									<li><a href="#reviews"> Reviews</a></li>
									<li><a href="#moviesrelated"> Related Movies</a></li>
								</ul>
								<div class="tab-content">
									<div id="overview" class="tab active">
										<div class="row">
											<div class="col-md-8 col-sm-12 col-xs-12">
												<?php echo $des; ?>
												<div class="title-hd-sm">
													<h4>Videos & Photos</h4>
												</div>
												<div class="mvsingle-item ov-item">
													<a class="img-lightbox" data-fancybox-group="gallery"
														href="<?php echo $image; ?>"><img src="<?php echo $image; ?>"
															alt=""></a>
													<?php
                                                    if ($trail != "") {
	                                                    echo '
								<div class="vd-it">
													<img class="vd-img" src="' . $image . '" alt="" width="200px"> 
													<a class="fancybox-media hvr-grow" href="' . $url . '"><img src="images/uploads/play-vd.png" alt=""></a>
												</div>
								';
                                                    }
                                                    ?>
													??

												</div>
												<div class="title-hd-sm">
													<h4>cast</h4>

												</div>
												<?php
                                                $query4 = 'SELECT actor1.fname,actor1.url,actor1.lname,actor1.Actor_id,
												 actor2.fname,actor2.url,actor2.lname,actor2.Actor_id,
												 actor3.fname,actor3.url,actor3.lname,actor3.Actor_id,
												 actor4.fname,actor4.url,actor4.lname,actor4.Actor_id  FROM movie m
												 JOIN actors actor1 ON m.actor = actor1.actor_id
												 JOIN actors actor2 ON m.actor1 = actor2.actor_id
												 JOIN actors actor3 ON m.actor2 = actor3.actor_id
												 JOIN actors actor4 ON m.actor3 = actor4.actor_id WHERE id = ' . $id . ' ';
                                                $statement = $connection->prepare($query4);
                                                $statement->execute();
                                                $result2 = $statement->fetchAll();
                                                $i = 0;
                                                foreach ($result2 as $row2) {


	                                                echo '
												<div class="mvcast-item">											
												<div class="cast-it">
													<div class="cast-left">
														<img src="' . $row2['1'] . '" alt="" width="50px">
														<a href="./celebritysingle.php?id=' . $row2['3'] . '&&name=actor">' . $row2['0'] . '.</a>
													</div>
													<p>... ' . $row2['2'] . ' .</p>
												</div>
												<div class="cast-it">
													<div class="cast-left">
														<img src="' . $row2['5'] . '" alt="" width="50px">
														<a href="./celebritysingle.php?id=' . $row2['7'] . '&&name=actor">' . $row2['4'] . '.</a>
													</div>
													<p>... ' . $row2['6'] . ' .</p>
												</div>
												<div class="cast-it">
													<div class="cast-left">
														<img src="' . $row2['9'] . '" alt="" width="50px">
														<a href="./celebritysingle.php?id=' . $row2['11'] . '&&name=actor">' . $row2['8'] . '.</a>
													</div>
													<p>... ' . $row2['10'] . ' .</p>
												</div>
												<div class="cast-it">
													<div class="cast-left">
														<img src="' . $row2['13'] . '" alt="" width="50px">
														<a href="./celebritysingle.php?id=' . $row2['15'] . '">' . $row2['12'] . '.</a>
													</div>
													<p>... ' . $row2['14'] . ' .</p>
												</div>
											</div>';
                                                }
                                                ?>
												<!-- movie cast -->



											</div>
											<?php
                                            $query3 = 'SELECT user1.id, user1.name FROM movie m JOIN director user1 ON m.director = user1.id WHERE m.id = ' . $row['id'] . ' ';
                                            $statement = $connection->prepare($query3);
                                            $statement->execute();
                                            $result1 = $statement->fetchAll();
                                            foreach ($result1 as $row1) {
	                                            $dirid = $row1['id'];
	                                            $dirname = $row1['name'];
                                            }
                                            $query5 = 'SELECT user1.id, user1.name FROM movie m JOIN director user1 ON m.producer = user1.id WHERE m.id = ' . $row['id'] . ' ';
                                            $statement = $connection->prepare($query5);
                                            $statement->execute();
                                            $result5 = $statement->fetchAll();
                                            foreach ($result5 as $row5) {
	                                            $proid = $row5['id'];
	                                            $proname = $row5['name'];
                                            }
                                            $query6 = 'SELECT user1.id, user1.name FROM movie m JOIN director user1 ON m.musicdirector = user1.id WHERE m.id = ' . $row['id'] . ' ';
                                            $statement = $connection->prepare($query6);
                                            $statement->execute();
                                            $result6 = $statement->fetchAll();
                                            foreach ($result6 as $row6) {
	                                            $musid = $row6['id'];
	                                            $musname = $row6['name'];
                                            }
                                            ?>
											<div class="col-md-4 col-xs-12 col-sm-12">
												<div class="sb-it">
													<h6>Director: </h6>
													<p><a
															href="./celebritysingle.php?id=<?php echo $dirid; ?>&&name=crew"><?php echo $dirname; ?></a></p>
												</div>
												<div class="sb-it">
													<h6>Producer: </h6>
													<p><a
															href="./celebritysingle.php?id=<?php echo $proid; ?>&&name=crew"><?php echo $proname; ?></a></p>
												</div>
												<div class="sb-it">
													<h6>Music director: </h6>
													<p><a
															href="./celebritysingle.php?id=<?php echo $musid; ?>&&name=crew"><?php echo $musname; ?></a></p>
												</div>
												<div class="sb-it">
													<h6>Genres:</h6>
													<p><a href="#"><?php echo $genre; ?></a></p>
												</div>
												<div class="sb-it">
													<h6>Release Date:</h6>
													<p><?php echo $release; ?></p>
												</div>
												<div class="sb-it">
													<h6>Run Time:</h6>
													<p><?php echo $runtime; ?></p>
												</div>
												<div class="sb-it">
													<h6>MMPA Rating:</h6>
													<p><?php echo $mmpa; ?></p>
												</div>
											</div>
										</div>
									</div>
									<!-- new tabs  -->
									<div id="reviews" class="tab review">
										<div class="row">
											<div class="rv-hd">
												<div class="div">
													<h3>Related Movies To</h3>
													<h2><?php echo $mov_title; ?> </h2>
												</div>
												<a href="#" class="redbtn" data-toggle="modal"
													data-target="#exampleModal" data-bs-toggle="tooltip"
													data-bs-placement="bottom">Write Review</a>
											</div>
											<?php
                                            $query = "select * from reviews where movie_id = '$id'";
                                            $statement = $connection->prepare($query);
                                            $statement->execute();
                                            $result = $statement->fetchAll();
											if($result){
												foreach($result as $row){
		                                            echo '
													<div class="mv-user-review-item">

													<h3>'.$row['title'].'</h3>
	
													<p class="time">
														'.$row['date'].' by <a href="#"> '.$row['name'].'</a>
													</p>
												</div>
											</div>
											<p>'.$row['description'].'
											</p>
										</div>
									
													';
												}
											}
											else{
	                                            echo 'No Reviews yet. you be first to write</div>';
												
											}
                                            ?>

										

								<div id="moviesrelated" class="tab">
									<div class="row">
										<h3>Related Movies To</h3>
										<h2><?php echo $mov_title;?></h2>
										<?php 
											 $query = "select * from movie where genre = '$genre' and id <> '$id' limit 0,10";
											 $statement = $connection->prepare($query);
											 $statement->execute();
											 $result = $statement->fetchAll();
											 if($result){
												foreach($result as $row){
		                                        echo '
												<div class="movie-item-style-2">
												<img src="'.$row['url'].'" alt="">
												<div class="mv-item-infor">
													<h6><a href="./moviesingle.php?id='.$row['id'].'">'.$row['name'].' <span>('.$row['releaseyear'].')</span></a></h6>
													<p class="rate"><i class="ion-android-star"></i><span>'.$row['imdb_ratings'].'</span> /10</p>
													<p class="describe">'.$row['description'].'</p>
													<p class="run-time"> Run Time:'.$row['runtime'].' . <span>MMPA: '.$row['mmpa'].' </span> .
														<br><span>Release: '.$row['releaseyear'].'</span>
													</p>
													
												</div>
											</div>
												';
												}
											 }else{
	                                        echo "<div class='alert alert-success'> we are working on recommendation <br/>for this movie '$mov_title'</div>";
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
	</div>
	</div>

	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
		aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">write review</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<input id="mov-id" hidden value="<?php echo $id; ?>" />
					<div class="form-group">
						<label>Title</label>
						<input type="text" name="review-title" id="review_title" placeholder="review-title"
							class="form-control text-white">
					</div>
				</div>
				<div class="form-group">
					<label for="summernote">description</label>
					<textarea class="form-control" id="details" rows="4" placeholder="About movie..."
						name="details"></textarea>
				</div>
				<button type="button" class="btn btn-success btn-icon-text" id="submit-rev">
					<i class="mdi mdi-file-check btn-icon-prepend"></i> Submit </button>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<!-- footer section-->
	<?php
    include("./php/footer.php");
    ?>
	<!-- end of footer section-->

	<script src="js/jquery.js"></script>
	<script src="js/plugins.js"></script>
	<script src="js/plugins2.js"></script>
	<script src="js/custom.js"></script>
	<script src="js/moviesingle.js"></script>
</body>

<!-- moviesingle11:03-->

</html>