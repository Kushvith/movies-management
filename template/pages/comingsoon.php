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
    <title>Trailer Upload | IDShow </title>
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
    <!-- Layout styles -->
    <link rel="stylesheet" href="../assets/vendors/select2/select2.min.css">
    <link rel="stylesheet" href="../assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">

    <body>
    <div class="container-scroller">
        <!-- partial:../../partials/_sidebar.html -->
        <?php
        include("../php/sidetopnav.php");
        ?>
        <div class="main-panel col-12">
            <div class="content-wrapper">
                <div class="page-header">
                    <h3 class="page-title">Coming Soon</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="../">Admin</a></li>
                            <li class="breadcrumb-item active" aria-current="page">coming soon</li>
                        </ol>
                    </nav>
                </div>
                <div class="display">
                    <div class="row">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                            <div class="create-comingsoon">
                                <div class="card-body">
                                    <h4 class="card-title">Create</h4>
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                        <button class="btn btn-primary" type="button" id="view-btn">View</button>
                                    </div>
                                    
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
                                        <div class="form-group col-6 ml-3">
                                            <label for="exampleSelectGender">Date of release</label>
                                            <input type="datetime-local" name="datetime" id="release" placeholder="DateTime"
                                                class="form-control text-white mt-1" required>
                                        </div>
                                        <button type="button" class="btn btn-success btn-icon-text" id="submit">
                                            <i class=" mdi mdi-file-check btn-icon-prepend"></i> submit </button>
                                    </div>
                                </div>
                                <div class="view-comingsoon">
                                <div class="card-body">
                                    <h4 class="card-title">comingsoon Details</h4>
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                        <button class="btn btn-primary" type="button" id="create">Create</button>
                                    </div>
                                    
                                        <div class="col-lg-12 grid-margin stretch-card mt-5">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h4 class="card-title">Coming Soon</h4>
                                                    <p class="card-description"> Only Five Coming Soon
                                                    </p>

                                                    <div class="table-responsive " id="comingsoon">
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

    <script src="./js/comingsoon.js"></script>

    <!-- endinject -->
</body>