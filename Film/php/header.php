<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<?php
session_start();
$name = "";
if(isset( $_SESSION['email'])){
	$name = $_SESSION['name'];
	$email = $_SESSION['email'];
}

?>
<div class="login-wrapper" id="login-content">
    <div class="login-content">
        <a href="#" class="close">x</a>
        <h3>Login</h3>
        <form  id="login">
        	<div class="row">
        		 <label for="username">
                    email:
                    <input type="email" name="username" id="username" placeholder="email"  required="required" />
                </label>
        	</div>
           
            <div class="row">
            	<label for="password">
                    Password:
                    <input type="password" name="password" id="password" placeholder="******"  required="required" />
                </label>
            </div>
            <div class="row">
            	<div class="remember">
					<div>
				
					</div>
            		<a href="#">Forget password ?</a>
            	</div>
            </div>
           <div class="row">
           	 <button type="button" id="login_submit">Login</button>
           </div>
        </form>
    </div>
</div>
<!--end of login form popup-->
<!--signup form popup-->
<div class="login-wrapper"  id="signup-content">
    <div class="login-content" id="sign-upcontent">
        <a href="#" class="close">x</a>
        <h3>sign up</h3>
        <form id="signup-form">
            <div class="row">
                 <label for="username-2">
                    Username:
                    <input type="text" name="username1" id="username2" placeholder="UserName"  required="required" />
                </label>
            </div>
           
            <div class="row">
                <label for="email-2">
                    your email:
                    <input type="email" name="email1" id="email2" placeholder=""  required="required" />
                </label>
            </div>
             <div class="row">
                <label for="password-2">
                    Password:
                    <input type="password" name="password1" id="password2" placeholder="*****"  required="required" />
                </label>
            </div>
             <div class="row">
                <label for="repassword-2">
                    re-type Password:
                    <input type="password" id="repassword2" placeholder="****"  required="required" />
                </label>
            </div>
			<p id="loader">please wait...</p>
           <div class="row">
             <button type="button" id="signup">sign up</button>
           </div>
        </form>
    </div>
	<div id="otp-verify"class="login-content">
	<a href="#" class="close">x</a>
        <h3>Verify otp</h3>
		<div class="row">
                 <label for="otp">
                    otp:
                    <input type="text" name="otp" id="otp" placeholder="otp"  required="required" />
                </label>
				<div class="row">
             <button type="button" id="otpbtn">submit</button>
           </div>
            </div>
	</div>
</div>
<!--end of signup form popup-->

<!-- BEGIN | Header -->
<header class="ht-header full-width-hd">
		<div class="row">
			<nav id="mainNav" class="navbar navbar-default navbar-custom">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header logo">
				    <div class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					    <span class="sr-only">Toggle navigation</span>
					    <div id="nav-icon1">
							<span></span>
							<span></span>
							<span></span>
						</div>
				    </div>
				    <a href="./index.php"><img class="logo" src="images/logo1.png" alt="" width="119" height="58"></a>
			    </div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse flex-parent" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav flex-child-menu menu-left">
						<li class="hidden">
							<a href="#page-top"></a>
						</li>
						<li class="dropdown first">
							<a href="index.php" class="btn btn-defaultlv1" >
							Home
							</a>
						</li>	
						<li class="dropdown first">
							<a href="moviegridfw.php" class="btn btn-default lv1" >
							movies
							</a>
							
						</li>
						<li class="dropdown first">
							<a href="celebritygrid02.php" class="btn btn-default lv1">
							celebrities 
							</a>
							
						</li>
						<li class="dropdown first">
							<a href="userprofile.php" class="btn btn-default lv1">
							community
							</a>
						</li>
					</ul>
					<ul class="nav navbar-nav flex-child-menu menu-right">              
								
					<?php
							if($name!=""){
	                    echo '<p class="text-white w-3">Welcome '.$name.'</p>';
							}
							else{
	                    echo '
								<li class="loginLink"><a href="#">LOG In</a></li>
								<li class="btn signupLink"><a href="#">sign up</a></li>
							';
							}
					?>
					</ul>
				</div>
			<!-- /.navbar-collapse -->
	    </nav>
	    <!-- search form -->
		</div>
	<script src="./js/auth.js"></script>
</header>