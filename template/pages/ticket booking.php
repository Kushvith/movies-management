<?php
  session_start();
  if(!isset($_SESSION["admin_name"])){
  header("location:../");
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Ticket Booking | IDShow </title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js" defer></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/dataTables.bootstrap.min.css"
        integrity="sha512-BMbq2It2D3J17/C7aRklzOODG1IQ3+MHw3ifzBHMBwGO/0yUqYmsStgBjI0z5EYlaDEFnvYV7gNYdD3vFLRKsA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/dataTables.jqueryui.min.css"
        integrity="sha512-x2AeaPQ8YOMtmWeicVYULhggwMf73vuodGL7GwzRyrPDjOUSABKU7Rw9c3WNFRua9/BvX/ED1IK3VTSsISF6TQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.20.0/js/mdb.min.js"
        integrity="sha512-XFd1m0eHgU1F05yOmuzEklFHtiacLVbtdBufAyZwFR0zfcq7vc6iJuxerGPyVFOXlPGgM8Uhem9gwzMI8SJ5uw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="../assets/vendors/select2/select2.min.css">
    <link rel="stylesheet" href="../assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
    <!-- Layout styles -->

    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/movie.css">
    <style>
        #summernote {
            background-color: black !important;
            color: white !important;
        }

        .file {
            opacity: 0;
            width: 0.1px;
            height: 0.1px;
            position: absolute;
        }

        .file-input label {
            display: block;
            position: relative;
            width: 200px;
            height: 50px;
            border-radius: 25px;
            background: linear-gradient(40deg, #ff6ec4, #7873f5);
            box-shadow: 0 4px 7px rgba(0, 0, 0, 0.4);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-weight: bold;
            cursor: pointer;
            transition: transform .2s ease-out;
        }

        .file-name {
            position: absolute;
            bottom: -35px;
            left: 10px;
            font-size: 0.85rem;
            color: #fff;
        }

        input:hover+label,
        input:focus+label {
            transform: scale(1.02);
        }

        /* Adding an outline to the label on focus */
        input:focus+label {
            outline: 1px solid #fff;
            outline: -webkit-focus-ring-color auto 2px;
        }
    </style>
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../images/favicon.png" />
</head>

<body>
    <div class="container-scroller">
        <!-- partial:../../partials/_sidebar.html -->
        <?php
        include("../php/sidetopnav.php");
        ?>
        <div class="main-panel col-12">
            <div class="content-wrapper">
                <div class="page-header">
                    <h3 class="page-title">Trailer</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="../">Admin</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Booking tickets</li>
                        </ol>
                    </nav>
                </div>
                <!-- view shows -->
                <div class="view-shows">
                    <div class="row">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div id="view-shows">
                                    <div class="card-body">
                                        <h4 class="card-title">Show Details</h4>
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                            <button class="btn btn-primary" type="button" id="view-theatre-btn">View
                                                theatres</button>
                                            <button class="btn btn-primary ml-2" type="button"
                                                id="create-theatre-btn">create theatres</button>
                                            <button class="btn btn-primary ml-2 mr-2" type="button"
                                                id="create-shows">create Shows</button>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col"></div>
                                            <div class="col-4">
                                                <input type="text" placeholder="search shows date..."
                                                    class="form-control text-white" id="search-shows">
                                                <div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="table-responsive" id="list-shows">

                                        </div>
                                    </div>
                                </div>
                                <!-- view theatre -->
                                <div class="view-teatres">
                                    <div class="row">
                                        <div class="col-12 grid-margin stretch-card">
                                            <div class="card">
                                                <div id="view-theatre">
                                                    <div class="card-body">
                                                        <h4 class="card-title">Theatre Details</h4>
                                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                                            <button class="btn btn-primary" type="button"
                                                                id="view">View</button>
                                                        </div>
                                                        <div class="row mt-3">
                                                            <div class="col"></div>
                                                            <div class="col-4">
                                                                <input type="text" placeholder="search Theatre..."
                                                                    class="form-control text-white" id="search-theatre">
                                                                <div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="table-responsive" id="list-Theatre">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="create-shows">
                                                    <div class="card-body">
                                                        <h4 class="card-title">create show</h4>
                                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                                            <button class="btn btn-primary" type="button"
                                                                id="view">view</button>
                                                        </div>
                                                        <form id="createShowform">
                                                            <div class="p-2 bd-highlight ml-3 w-50 text-white">
                                                                <label>Movie</label>
                                                                <select class="js-example-basic-single text-white"
                                                                    style="width:100%" name="movie" id="movie">
                                                                    <?php
                                                    require "../../config/pdoconfig.php";
                                                    $query = "select * from movie";
                                                    $statement = $connection->prepare($query);
                                                    $statement->execute();
                                                    $result = $statement->fetchAll();
                                                    if ($result) {
                                                        echo '<option value="">select movie</option>';
                                                        foreach ($result as $row) {
                                                            echo '<option class="text-white" value="' . $row['id'] . '">' . $row['name'] . '</option>';
                                                        }
                                                    } else {
                                                        echo '<option value="">Add movies</option>';
                                                    }
                                                    ?>
                                                                </select>
                                                            </div>
                                                            <div class="p-2 bd-highlight ml-3 w-50 text-white">
                                                                <label>theatre</label>
                                                                <select class="js-example-basic-single"
                                                                    style="width:100%" name="theatre" id="theatre">
                                                                    <?php
                                                    require "../../config/pdoconfig.php";
                                                    $query = "select * from theatre";
                                                    $statement = $connection->prepare($query);
                                                    $statement->execute();
                                                    $result = $statement->fetchAll();
                                                    if ($result) {
                                                        echo '<option value="">select theatre</option>';
                                                        foreach ($result as $row) {
                                                            echo '<option class="text-white" value="' . $row['id'] . '">' . $row['name'] . '</option>';
                                                        }
                                                    } else {
                                                        echo '<option value="">Add theatre</option>';
                                                    }
                                                    ?>
                                                                </select>
                                                            </div>
                                                            <div class="form-group ml-4">
                                                                <label class="col-form-label row mr-2">show Date</label>
                                                                <input type="date" name="date" id="date"
                                                                    class="form-control col-6 "
                                                                    placeholder="dd/mm/yyyy" />
                                                            </div>
                                                            <div class="form-group w-50 ml-3">
                                                                <label>Shows</label>
                                                                <select class="js-example-basic-multiple"
                                                                    multiple="multiple" id="type" name="type"
                                                                    style="width:100%">
                                                                    <option value="Morning">Morning</option>
                                                                    <option value="Afternoon">Afternoon</option>
                                                                    <option value="Evening">Evening</option>
                                                                    <option value="Night">Night</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>price</label>
                                                                <br>
                                                                <input type="number" id="priceval" placeholder="price" class="form-control">
                                                </div>
                                                            <p class="text-white" id="loader1">Please wait......</p>
                                                            <button type="button" class="btn btn-success btn-icon-text"
                                                                id="submit-show">
                                                                <i class="mdi mdi-file-check btn-icon-prepend"></i>
                                                                Submit </button>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="create-theatres">
                                                    <div class="card-body">
                                                        <h4 class="card-title">Create Theatre</h4>
                                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                                            <button class="btn btn-primary" type="button"
                                                                id="view">View</button>
                                                        </div>
                                                        <form id="createform" action="../php/create-actor.php"
                                                            method="post">
                                                            <div class="form-group">
                                                                <label for="exampleSelectGender">Name</label>
                                                                <input type="text" name="fname" id="name"
                                                                    placeholder="Theatre Name"
                                                                    class="form-control text-white" required>
                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="col-6">
                                                                    <label for="exampleSelectGender">Place</label><input
                                                                        type="text" name="place" id="place"
                                                                        placeholder="place"
                                                                        class="form-control text-white" required>
                                                                </div>

                                                                <div class="col-6">
                                                                    <label for="gender">Total capacity</label>
                                                                    <input type="number" id="capacity"
                                                                        placeholder="Seats capacity"
                                                                        class="form-control text-white" min="1">
                                                                </div>
                                                            </div>
                                                            <p class="text-white" id="loader">Please wait......</p>
                                                            <button type="button" class="btn btn-success btn-icon-text"
                                                                id="submit">
                                                                <i class="mdi mdi-file-check btn-icon-prepend"></i>
                                                                Submit </button>
                                                        </form>
                                                        <br>
                                                        <br>
                                                        <div class="row">
                                                            <div class="col-8">
                                                                <div class="alert alert-success"> Upload theatre using
                                                                    CSV file
                                                                </div>
                                                            </div>
                                                            <div class="col-4"><a href="../theatre sample.csv"
                                                                    target="_blank" class="btn btn-success btn-lg"
                                                                    download="theatre sample">download
                                                                    sample csv</a>
                                                            </div>
                                                            <form action="" id="upload_csv" method='post'
                                                                enctype='mutipart/form-data'>
                                                                <div class="file-input">
                                                                    <label for="file">
                                                                        <center> <input type="file" id="file"
                                                                                class="file" name="csv_file"
                                                                                id="csv_file" accept='.csv'>
                                                                        </center>
                                                                        Select file
                                                                        <p class="file-name"></p>
                                                                    </label>
                                                                    <br>
                                                                    <br>
                                                                    <center> <input type="submit" value="submit"
                                                                            id='upload' class='btn btn-info'></center>
                                                                </div>
                                                                <br>
                                                                <br>
                                                                <div class="clear:both"></div>
                                                            </form>
                                                            <br>
                                                            <div class="ml-5 text-white" id="csv_file_data"></div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
            include('../php/footer.php');
            ?>
                            <!-- partial -->
                        </div>
                        <!-- main-panel ends -->
                    </div>
                </div>
                <script src="../assets/vendors/js/vendor.bundle.base.js"></script>
                <script src="../assets/js/off-canvas.js"></script>

                <script src="../assets/js/hoverable-collapse.js"></script>
                <script src="../assets/js/misc.js"></script>
                <script src="../assets/js/settings.js"></script>
                <script src="../assets/js/todolist.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"
                    integrity="sha512-BkpSL20WETFylMrcirBahHfSnY++H2O1W+UnEEO4yNIl+jI2+zowyoGJpbtk6bx97fBXf++WJHSSK2MV4ghPcg=="
                    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                <script src="../assets/vendors/select2/select2.min.js"></script>
                <script src="../assets/vendors/typeahead.js/typeahead.bundle.min.js"></script>
                <script src="../assets/js/file-upload.js"></script>
                <script src="../assets/js/typeahead.js"></script>
                <script src="../assets/js/select2.js"></script>
                <script src="./js/ticket booking.js"></script>

                <!-- endinject -->
</body>

</html>