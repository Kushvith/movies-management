<!DOCTYPE html>

<html class="ie ie7 no-js" lang="en-US">

<html lang="en" class="no-js">

<head>
	<!-- Basic need -->
	<title>Movie |Id show</title>
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
						<h1>Movie Listing</h1>
						<ul class="breadcumb">
							<li class="active"><a href="./">Home</a></li>
							<li> <span class="ion-ios-arrow-right"></span> movie listing</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="page-single">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="searh-form">
							<form class="form-style-1 celebrity-form" action="#">
								<div class="row">
									<div class="col-md-12 form-it">
										<label>Movie name</label>
										<input type="text" placeholder="Search movie" id="search-name">
									</div>
									
								</div>
							</form>
						</div>
				
				<div class="flex-wrap-movielist mv-grid-fw">
												
				</div>		
				<div class="topbar-filter"></div>
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
	<script>
	
			load_data(1)
      function load_data(page, query = "") {
		datas = 1
            $.ajax({
                  url: "./php/load-movie.php",
                  method: "POST",
                  data: { page: page, query: query, datas},
                  success: function (data) {
                        $(".mv-grid-fw").html(data);
                  }
            })
      }
	  load_data1(1)
      function load_data1(page, query = "") {
		datas=0
            $.ajax({
                  url: "./php/load-movie.php",
                  method: "POST",
                  data: { page: page, query: query, datas},
                  success: function (data) {
                        $(".topbar-filter").html(data);
                  }
            })
      }
      $(document).on('click', '.page-link', function () {
            var page = $(this).data('page_number');
            var query = $('#search_box').val();
            load_data(page, query);
      });
      $('#search-name').keyup(function () {
            var query = $(this).val();
            load_data(1, query);
      })
	</script>
</body>

<!-- moviegridfw07:38-->

</html>