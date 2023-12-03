<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7 no-js" lang="en-US">
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8 no-js" lang="en-US">
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html lang="en" class="no-js">

<!-- userprofile14:04-->

<head>
	<!-- Basic need -->
	<title>Open Pediatrics</title>
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
	<?php
    require "../config/pdoconfig.php";
    if (isset($_SESSION['id'])) {
	    $imgurl = "";
	    $query1 = "SELECT * FROM user_login WHERE id = " . $_SESSION['id'] . "";
	    $statement = $connection->prepare($query1);
	    $statement->execute();
	    $result1 = $statement->fetchAll();
	    if ($result1) {
		    foreach ($result1 as $row) {
			    if ($row['url'] != "") {
				    $imgurl = $row['url'];
			    }
		    }
	    }
	    echo '
	<div class="hero user-hero">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="hero-ct">
					<h1>' . $_SESSION['name'] . ' profile</h1>
					<ul class="breadcumb">
						<li class="active"><a href="#">Home</a></li>
						<li> <span class="ion-ios-arrow-right"></span>Profile</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="page-single">
	<div class="container">
		<div class="row ipad-width">
			<div class="col-md-3 col-sm-12 col-xs-12">
				<div class="user-information">
					<div class="user-img">';
    ?>

	<a href="#"><img src="<?php if ($imgurl != '') {
		    echo $imgurl;
	    } else {
		    echo 'images/uploads/user-img.png';
	    } ?>" alt=""><br>
	</a>
	<?php

	    echo '<a href="#" class="redbtn"
						data-toggle="modal"
													data-target="#exampleModal" data-bs-toggle="tooltip"
													data-bs-placement="bottom"
						>Change avatar</a>
					</div>
					<div class="user-fav">
						<p>Account Details</p>
						<ul>
							<li  class="active"><a href="userprofile.php">Profile</a></li>
						</ul>
					</div>
					<div class="user-fav">
						<p>Others</p>
						<ul>
							<li><a href="./php/logout.php">Log out</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-9 col-sm-12 col-xs-12">
				<div class="form-style-1 user-pro" action="#">
					<form action="#" class="user">
						<h4>01. Profile details</h4>
						<div class="row">
							<div class="col-md-6 form-it">
								<label>Name </label>
								<input type="text" placeholder="edwardkennedy" id="name" value="' . $_SESSION['name'] . '">
							</div>
							<div class="col-md-6 form-it">
								<label>Email Address</label>
								<input type="text" placeholder="edward@kennedy.com" id="email" value="' . $_SESSION['email'] . '" readonly>
							</div>
						</div>
						
					
						<div class="row">
							<div class="col-md-2">
								<input class="submit" type="button" value="save" id="save">
							</div>
						</div>	
					</form>
					<form id="pass-change" class="password">
						<h4>02. Change password</h4>
						<div class="row">
							<div class="col-md-6 form-it">
								<label>Old Password</label>
								<input type="password" placeholder="**********" id="old_pass">
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 form-it">
								<label>New Password</label>
								<input type="password" placeholder="***************" id="new_pass">
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 form-it">
								<label>Confirm New Password</label>
								<input type="password" placeholder="***************" id="re_pass">
							</div>
						</div>
						<div class="row">
							<div class="col-md-2">
								<input class="submit" type="button" value="change" id="change">
							</div>
						</div>	
					</form>
					<form id="address" class="password" action="./php/update-useradd.php" method="post">
					<h4>03. address</h4>
					<div class="row">
						<div class="col-md-6 form-it">
							<label>address</label>
							<textarea id="address1" name="address" placeholder="address"></textarea>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 form-it">
							<label>Pin code</label>
							<input type="text" id="zip" name="zip"  placeholder="zip" >
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-2">
							<input class="submit" type="submit" value="submit" id="sub">
						</div>
					</div>	
				</form>
				</div>
			</div>
		</div>
	</div>
</div>
	';
    } else {
	    echo '<center><h1> Please login to access the content</h1></center>';
    } ?>
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
		aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">change avatar</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
				<div class="custom-file">
  <input type="file" class="custom-file-input" id="customFile">
  <label class="custom-file-label" for="customFile">Choose file</label>
</div>
					<button type="button" class="btn btn-success btn-icon-text" id="submit-img">
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
		<script>
			$(document).ready(function () {$(document).on('click','#sub',function(){
					var address = $('#address').val()
					var zip = $('#zip').val()
					alert(address,zip)
					if (address == '' || zip == '') {
						toastr.warning("all feilds required")
					}
					else{
						$.ajax({
							url: "./php/update-useradd.php",
							method: "POST",
							data: { address, zip },
							success: function (data) {
								if (data == "wroning") {
									toastr.error("");
								} else {
									toastr.success("address updated successfully")
									$('#address1').val('')
									$('#zip').val('')

								}

							}
						})
					}
				})
				$(document).on('click', '#save', function () {
					alert( $('#name').val())
					var name = $('#name').val();
					var email = $('#email').val();
					if (name == '') {
						toastr.warning("name can't be empty")
					}
					else {
						$.ajax({
							url: "./php/update-name-email.php",
							method: "POST",
							data: { name, email },
							success: function (data) {
								toastr.success("updated successfully")
								location.reload();
							}
						})
					}

				})
				$(document).on('click', '#change', function () {
					var old_pass = $('#old_pass').val();
					var new_pass = $('#new_pass').val();
					var re_pass = $('#re_pass').val();
					if (old_pass == '' || new_pass == '' || re_pass == '') {
						toastr.warning("all feilds required")
					}
					else if (new_pass != re_pass) {
						toastr.warning("password should match")
					}
					else {
						$.ajax({
							url: "./php/update-pass.php",
							method: "POST",
							data: { old_pass, new_pass },
							success: function (data) {
								if (data == "wroning") {
									toastr.error("wrong password");
								} else {
									toastr.success("password updated successfully")
									$('#old_pass').val('')
									$('#new_pass').val('')
									$('#re_pass').val('')

								}

							}
						})
					}
				})
				$(document).on('click','#submit-img',function(){
					img = $('#customFile').val()
					if(img ==""){
						toastr.warning("image required")
					}
					else{
						var formdata = new FormData()
						var files = $('#customFile')[0].files;
						formdata.append("fileimg", files[0])
						$.ajax({
							url: "./php/update-img.php",
							method: "POST",
							data: formdata,
							contentType: false,
                        processData: false,
							success: function (data) {
								toastr.success(data)
							location.reload()

							}
						})
					}
				})
				
			})
		</script>
</body>

<!-- userprofile14:04-->

</html>