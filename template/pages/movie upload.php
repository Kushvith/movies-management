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
    <title>Movies Upload | IDShow </title>
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
    <!-- <link rel="stylesheet" href="../../Film/css/plugins.css"> -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/movie.css">
    
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
                    <h3 class="page-title">Movie</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="../">Admin</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Movie</li>
                        </ol>
                    </nav>
                </div>
                <div class="create">
                    <div class="row">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Movie Details</h4>
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                        <button class="btn btn-primary" type="button" id="View">View
                                            Movie</button>
                                    </div>
                                    <form id="createform">
                                    <div class="form-group">
                                        <label for="exampleSelectGender">Movie Name</label>
                                        <input type="text" name="name" id="name" placeholder="Movie Name"
                                            class="form-control text-white" required>
                                    </div>
                                    <div class="d-flex flex-row bd-highlight mb-3">
                                        <div class="p-2 bd-highlight">
                                            <label>Imdb Ratings</label>
                                            <input type="number" name="imdbrat" id="imdbrat" placeholder="Imdb rating"
                                                class="form-control text-white" min="1">
                                        </div>

                                        <div class="p-2 bd-highlight ml-2 w-30"><label>Run Time</label>
                                            <input type="time" name="runtime" id="runtime"
                                                class="form-control text-white" min="1">
                                        </div>
                                        <div class="p-2 bd-highlight ml-3"><label>Release Year</label>
                                            <input type="year" name="releaseyear" id="releaseyear"
                                                placeholder="Release year" class="form-control text-white" min="1">
                                        </div>
                                        <div class="p-2 bd-highlight ml-3 w-50"> <label>Genre</label>
                                            <select class="js-example-basic-single" style="width:100%" id="genre">
                                                <option value="Action">Action</option>
                                                <option value="Crime">Crime</option>
                                                <option value="Drama">Drama</option>
                                                <option value="Comedy">Comedy</option>
                                                <option value="Horror">Horror</option>
                                                <option value="Sci-Fi">Sci-Fi</option>
                                                <option value="War Drama">War Drama</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>MMPA</label>
                                        <select class="js-example-basic-single" style="width:100%" id="mmpa">
                                        <option value="">Select MMPA</option>
                                            <option value="G – General Audiences">G – General Audiences</option>
                                            <option value="PG – Parental Guidance">PG – Parental Guidance</option>
                                            <option value="PG-13 – Parents Strongly Cautioned">PG-13 – Parents Strongly
                                                Cautioned</option>
                                            <option value="R – Restricted">R – Restricted</option>
                                            <option value="NC-17 – Adults Only">NC-17 – Adults Only</option>
                                        </select>
                                    </div>
                                    <div class="d-flex flex-row bd-highlight mb-3">
                                        <div class="p-2 bd-highlight ml-3 w-50"> <label>Actors</label>
                                            <select class="js-example-basic-single" style="width:100%" name="actor"
                                                id="actor">
                                                <?php
                                                require "../../config/pdoconfig.php";
                                                $query = "select * from actors";
                                                $statement = $connection->prepare($query);
                                                $statement->execute();
                                                $result = $statement->fetchAll();
                                                if ($result) {
                                                    echo '<option value="">select actor</option>';
                                                    foreach ($result as $row) {
                                                        echo '<option value="' . $row['Actor_id'] . '">' . $row['fname'] . '</option>';
                                                    }
                                                } else {
                                                    echo '<option value="">Add Actors</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="p-2 bd-highlight ml-3 w-50"> <label>Actors 1</label>
                                            <select class="js-example-basic-single" style="width:100%" name="actor1"
                                                id="actor1">
                                                <?php
                                                require "../../config/pdoconfig.php";
                                                $query = "select * from actors";
                                                $statement = $connection->prepare($query);
                                                $statement->execute();
                                                $result = $statement->fetchAll();
                                                if ($result) {
                                                    echo '<option value="">select actor</option>';
                                                    foreach ($result as $row) {
                                                        echo '<option value="' . $row['Actor_id'] . '">' . $row['fname'] . '</option>';
                                                    }
                                                } else {
                                                    echo '<option value="">Add Actors</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="p-2 bd-highlight ml-3 w-50"> <label>Actors 2</label>
                                            <select class="js-example-basic-single" style="width:100%" name="actor2"
                                                id="actor2">
                                                <?php
                                                require "../../config/pdoconfig.php";
                                                $query = "select * from actors";
                                                $statement = $connection->prepare($query);
                                                $statement->execute();
                                                $result = $statement->fetchAll();
                                                if ($result) {
                                                    echo '<option value="">select actor</option>';
                                                    foreach ($result as $row) {
                                                        echo '<option value="' . $row['Actor_id'] . '">' . $row['fname'] . '</option>';
                                                    }
                                                } else {
                                                    echo '<option value="">Add Actors</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="p-2 bd-highlight ml-3 w-50"> <label>Actors 3</label>
                                            <select class="js-example-basic-single" style="width:100%" name="actor3"
                                                id="actor3">
                                                <?php
                                                require "../../config/pdoconfig.php";
                                                $query = "select * from actors";
                                                $statement = $connection->prepare($query);
                                                $statement->execute();
                                                $result = $statement->fetchAll();
                                                if ($result) {
                                                    echo '<option value="">select actor</option>';
                                                    foreach ($result as $row) {
                                                        echo '<option value="' . $row['Actor_id'] . '">' . $row['fname'] . '</option>';
                                                    }
                                                } else {
                                                    echo '<option value="">Add Actors</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row bd-highlight mb-3">
                                        <div class="p-2 bd-highlight ml-3 w-50"> <label>Director</label>
                                            <select class="js-example-basic-single" style="width:100%" name="director"
                                                id="director">
                                                <?php
                                                require "../../config/pdoconfig.php";
                                                $query = "select * from director where type like '%Director%'";
                                                $statement = $connection->prepare($query);
                                                $statement->execute();
                                                $result = $statement->fetchAll();
                                                if ($result) {
                                                    echo '<option value="">select actor</option>';
                                                    foreach ($result as $row) {
                                                        echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                                                    }
                                                } else {
                                                    echo '<option value="">Add directors</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="p-2 bd-highlight ml-3 w-50"> <label>Music Director</label>
                                            <select class="js-example-basic-single" style="width:100%" name="music"
                                                id="music">
                                                <?php
                                                require "../../config/pdoconfig.php";
                                                $query = "select * from director where type like '%Music Director%'";
                                                $statement = $connection->prepare($query);
                                                $statement->execute();
                                                $result = $statement->fetchAll();
                                                if ($result) {
                                                    echo '<option value="">select actor</option>';
                                                    foreach ($result as $row) {
                                                        echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                                                    }
                                                } else {
                                                    echo '<option value="">Add directors</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="p-2 bd-highlight ml-3 w-50"> <label>Producer</label>
                                            <select class="js-example-basic-single" style="width:100%" name="producer"
                                                id="producer">
                                                <?php
                                                require "../../config/pdoconfig.php";
                                                $query = "select * from director where type like '%Producer%'";
                                                $statement = $connection->prepare($query);
                                                $statement->execute();
                                                $result = $statement->fetchAll();
                                                if ($result) {
                                                    echo '<option value="">select actor</option>';
                                                    foreach ($result as $row) {
                                                        echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                                                    }
                                                } else {
                                                    echo '<option value="">Add director</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                         <label>Trailer</label>
                                            <select class="js-example-basic-single" style="width:100%" name="trailer"
                                                id="trailer">
                                                <?php
                                                require "../../config/pdoconfig.php";
                                                $query = "select * from trailer";
                                                $statement = $connection->prepare($query);
                                                $statement->execute();
                                                $result = $statement->fetchAll();
                                                if ($result) {
                                                    echo '<option value="">select Trailer</option>';
                                                    foreach ($result as $row) {
                                                        echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                                                    }
                                                } else {
                                                    echo '<option value="">Add trailer</option>';
                                                }
                                                ?>
                                            </select>
                                    </div>
                                    <div class="form-group">
                                        <label>File upload</label>
                                        <input type="file" name="img" id="img" class="file-upload-default">
                                        <div class="input-group col-xs-12">
                                            <input type="text" class="form-control file-upload-info" disabled
                                                placeholder="Upload Image" name="movieImg" id="movieImg">
                                            <span class="input-group-append">
                                                <button class="file-upload-browse btn btn-primary"
                                                    type="button">Upload</button>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="summernote">Details</label>
                                        <textarea class="form-control" id="summernote" rows="4"
                                            placeholder="About Movie..." name="details"></textarea>
                                    </div>
                                    <p class="text-white" id="loader">Please wait......</p>
                                    <button type="button" class="btn btn-success btn-icon-text" id="submit">
                                        <i class="mdi mdi-file-check btn-icon-prepend"></i> Submit </button>
                                    </form>    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="display">
                    <div class="row">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Movie Details</h4>
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                        <button class="btn btn-primary" type="button" id="create">Create New
                                            Movie</button>
                                    </div>
                                    <div class="movie-data">
                                    <div class="page-single movie_list mt-5">
                                        <div class="container">
                                            <div class="row ipad-width2">
                                                <div class="col-md-8 col-sm-12 col-xs-12">
                                                    <div id="movie-data"></div>
                                                    
                                                </div>
                                                <div class="col-md-4 col-sm-12 col-xs-12">
                                                    <div class="sidebar">
                                                        <div class="searh-form">
                                                            <h4 class="sb-title">Search for movie</h4>
                                                            <form class="form-style-1" action="#">
                                                                <div class="row">
                                                                    <div class="col-md-12 form-it">
                                                                        <label>Movie name</label>
                                                                        <input type="text" id="search-name" placeholder="Enter movie name">
                                                                    </div>
                                                                </div>
                                                            </form>
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
    <script src="./js/movieupdate.js"></script>
    <!-- endinject -->
</body>

</html>