<!DOCTYPE html>

<html lang="en" class="no-js">

<!-- celebritygrid0211:44-->

<head>
    <!-- Basic need -->
    <title>Shopping |IdShow</title>
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

    <div class="hero common-hero">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="hero-ct">
                        <h1>My Tickets</h1>
                        <ul class="breadcumb">
                            <li class="active"><a href="#">Home</a></li>
                            <li> <span class="ion-ios-arrow-right"></span> Tickets</li>
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
                        <table class="table table-bordered table-dark" style="color:white">
                            <thead>
                                <tr>
                                    <th scope="col" colspan="2">Movie name</th>
                                    <th scope="col" colspan="2">theatre name</th>
                                    <th scope="col" colspan="3">Seats</th>
                                    <th scope="col">date</th>
                                    <th scope="col">show</th>
                                    <th scope="col" colspan="2">order id</th>
                                    <th scope="col">View</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                require "../config/pdoconfig.php";
                                $email = $_SESSION['email'];
                                $query = "select * from tickets where email='$email'";
							  $statement = $connection->prepare($query);
							  $statement->execute();
							  $result = $statement->fetchAll();
                        if ($result) {
                            
	                        foreach ($result as $row) {
                                $m_id = $row['m_id'];
                            $t_id = $row['t_id'];
                            $s_id = $row['s_id'];
                            $date ="";
                                $query4 = "select * from shows where movie_id = '$m_id' and theatre_id = '$t_id' and id = '$s_id'";
                                $statement4 = $connection->prepare($query4);
                                $statement4->execute();
                                $result4 = $statement4->fetchAll();
                                if ($result4) {
                                    foreach ($result4 as $row4) {
                                        $date = $row4['show_date'];
                                    }
                                }
                                $query1 = "select * from movie where id='$m_id'";
                                $statement1 = $connection->prepare($query1);
                                $statement1->execute();
                                $result1 = $statement1->fetchAll();
                                if ($result1) {
                                    foreach ($result1 as $row1) {
                                        $movie_name = $row1['name'];
                                    }
                                }
                                $query2 = "select * from theatre where id='$t_id'";
                                $statement2 = $connection->prepare($query2);
                                $statement2->execute();
                                $result2 = $statement2->fetchAll();
                                if ($result2) {
                                    foreach ($result2 as $row2) {
                                        $theatre_name = $row2['name'];
                                    }
                                }
                                    echo '
                                    
                                    <tr>
                                       <th scope="row" colspan="2">'.$movie_name.'</th>
                                       <td colspan="2">'.$theatre_name.'</td>
                                       <td colspan="3">'.$row['seats'].'</td>
                                       <td>'.$date.'</td>
                                       <td>'.$row['shows'].'</td>
                                       <td colspan="2">'.$row['orderid'].'</td>
                                       <td><a href="./showticket.php?id='.$row['orderid'].'" target="_blank" style="text-align:center;background-color:green;padding:5px;color:white;border-radius:10px;text-decoration:none;">show</a></td>
                                     </tr>
                                    
                                    ';
                            }
                        }
                                
                                ?>
                            </tbody>
                        </table>
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