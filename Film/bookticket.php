<!DOCTYPE html>

<html lang="en" class="no-js">

<!-- celebritygrid0211:44-->
<?php
require "../config/pdoconfig.php";
$id = $_GET['id'];
$today = date("Y/m/d");
$query1 = "select * from shows where show_date < '$today'";
$statement = $connection->prepare($query1);
$statement->execute();
$result = $statement->fetchAll();
if ($result) {
    foreach ($result as $row) {
        $query2 = "delete from shows where id = " . $row["id"] . "";
        $statement = $connection->prepare($query2);
        $statement->execute();
        $result = $statement->fetchAll();
        if($result > 0){
          // do nothing
        }
    }
}
$query = "select * from shows where movie_id = '$id'";
$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->rowCount();
if ($result > 0) {

} else {
    echo '<script> window.location.href = "./404.html"</script>';
}
?>

<head>
    <!-- Basic need -->
    <title>Ticket booking |IdShow</title>
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
    <div class="hero common-hero">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="hero-ct">
                        <h1>Ticket Booking</h1>
                        <ul class="breadcumb">
                            <li class="active"><a href="#">Home</a></li>
                            <li> <span class="ion-ios-arrow-right"></span>Ticket Booking</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-single">
        <div class="container">
            <div class="row ipad-width2">
                <div class="col-md-6 col-6 col-sm-12 col-xs-12">
                    <div class="row">
                        <form method="post" action="">
                        <div class="message"></div>
                        <input value="<?php echo $id; ?>" id="m_id" hidden>
                        <div class="col-md-12 form-it">
                            <label>select theatre</label>
                            <select id="theatre" class="mt-2" name="t_name" required>
                                <option selected value="">Select theatre</option>

                                <?php


         $query1 = 'SELECT t.name , t.id FROM shows s JOIN theatre t ON s.theatre_id  = t.id WHERE s.movie_id = ' . $id . ' ';
         $statement = $connection->prepare($query1);
         $statement->execute();
         $result = $statement->fetchAll();
         if ($result) {

             foreach ($result as $row) {

                 echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";

             }
         }
         ?>
                            </select>
                        </div>
                        <div class="col-md-12 form-it">
                            <label>Show date</label>
                            <select id="show-date" name="show_date" required>
                                <option selected value="">Select date</option>

                            </select>
                        </div>
                        <div class="col-md-12 form-it">
                            <label>Show time</label>
                            <select id="show-time" name="show_time" required>
                                <option selected value="">Select time</option>

                            </select>
                        </div>
                        <div class="col-md-6 form-it">
                            <label>No of tickets</label>
                            <input type="number" name="tickets" placeholder="No of tickets" min="1" id="tickets"  required>
                        </div>
                        <div class="col-md-6 form-it">
                            <label>price</label>
                            <input type="number" placeholder="Price" min="1" id="price" name="TXN_AMOUNT" readonly  required>
                        </div>
                      <input type="hidden" value="<?php if (isset($_SESSION['email'])) {
                          echo $_SESSION['email'];
                      }?>" id="email">
                    </div>
                    <br>
                    <br>

                    <div class="row">
                        <div class="col-md-2">
                            <input class="submit" class="item item-1 redbtn" type="button" id="submit" value="book ticket">
                        </div>
                    </div>
        </form>
                </div>

            </div>
        </div>
    </div>

    <?php
    include("./php/footer.php");
    ?>
    <!-- end of footer section-->

    <script src="js/jquery.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/plugins2.js"></script>
    <script src="js/custom.js"></script>
    <script>
        $(document).ready(function () {
            $('#theatre').change(function () {
                var theatre_id = $(this).val();
                var m_id = $('#m_id').val();

                $.ajax({
                    url: "./php/theatre.php",
                    method: "POST",
                    data: { t_id: theatre_id, m_id: m_id },
                    success: function (data) {
                        $('#show-date').html(data);
                    }
                })
            })
            $('#show-date').change(function () {
                var theatre_id = $('#theatre').val();
                var m_id = $('#m_id').val();
                var s_id = $(this).val();
                $.ajax({
                    url: "./php/showtime.php",
                    method: "POST",
                    data: { t_id: theatre_id, m_id: m_id, s_id: s_id },
                    success: function (data) {
                        $('#show-time').html(data);
                    }
                })
            })
            $('#tickets').change(function(){
                var val = $(this).val();
                var theatre_id = $('#theatre').val();
                var m_id = $('#m_id').val();
                var s_id = $('#show-date').val();
                $.ajax({
                    url: "./php/price.php",
                    method: "POST",
                    data: { t_id: theatre_id, m_id: m_id, s_id: s_id ,val:val},
                    success: function (data) {
                      $('#price').val(data)
                    }
                })
            })
            $(document).on('click','#submit',function(){
               $(this).hide();
                t_name = $('#theatre').val()
                showdate = $('#show-date').val()
                showtime = $('#show-time').val()
                tickets = $('#tickets').val()
                amt = $('#price').val()
                email = $('#email').val()
                if(t_name == ""|| showdate==""||showtime==""||tickets==""||amt == ""){
                    toastr.error("all feilds required")
                }
                else if(email == ""){
                    toastr.error("Login to book")
                }
                else{
                    $.ajax({
                    url: "./php/book.php",
                    method: "POST",
                    data: { t_name,showdate,showtime,tickets,amt,email},
                    success: function (data) {
                     if(data == "success"){
                        $('#submit').show();
                        toastr.success("ticket sent to email")
                     }else{
                        $('#submit').show();
                        $('#message').html("<div class='alert alert-danger'>"+data+"</div>")
                     }
                    }
                })
                }
            })
        })
    </script>

</body>

<!-- celebritygrid0211:56-->

</html>