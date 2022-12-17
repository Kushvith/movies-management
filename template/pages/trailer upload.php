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

    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../../Film/css/plugins.css">
    <style>
        #summernote {
            background-color: black !important;
            color: white !important;
        }

        .btn-transform .item {
            position: absolute;
            display: inline-block;
            left: 0;
            right: 0;
            text-align: center;
            display: block;
            backface-visibility: hidden;
            transition: transform 0.5s ease;
            -webkit-transition: -webkit-transform 0.5s ease;
            text-transform: uppercase;
        }

        .redbtn {
            font-family: 'Dosis', sans-serif;
            font-size: 14px;
            color: #abb7c4;
            font-weight: bold;
            text-transform: uppercase;
            background-color: #dd003f;
            color: #ffffff;
            padding: 10px 15px;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
        }

        .redbtn i {
            margin-right: 10px;
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
                            <li class="breadcrumb-item active" aria-current="page">Trailer</li>
                        </ol>
                    </nav>
                </div>
                <div class="display">
                    <div class="row">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                            <div class="create-trailer">
                                <div class="card-body">
                                    <h4 class="card-title">Trailer Details</h4>
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                        <button class="btn btn-primary" type="button" id="view-btn">View</button>
                                    </div>
                                    
                                        <div class="form-group">
                                            <label for="exampleSelectGender">Trailor Name</label>
                                            <input type="text" name="name" id="name" placeholder="Name"
                                                class="form-control text-white" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleSelectGender">Trailor Url</label>
                                            <input type="url" name="url" id="url" placeholder="Url"
                                                class="form-control text-white" required>
                                        </div>
                                        <button type="button" class="btn btn-success btn-icon-text" id="submit">
                                            <i class=" mdi mdi-file-check btn-icon-prepend"></i> Upload </button>
                                    </div>
                                </div>
                                <div class="view-trailer">
                                <div class="card-body">
                                    <h4 class="card-title">Trailer Details</h4>
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                        <button class="btn btn-primary" type="button" id="create">Create New
                                            Trailer</button>
                                    </div>
                                    
                                        <div class="col-lg-12 grid-margin stretch-card mt-5">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h4 class="card-title">Trailer</h4>
                                                    <p class="card-description"> All Trailer
                                                    </p>

                                                    <div class="table-responsive " id="trailers">
                                                    </div>
                                                    <div class="btn-transform transform-vertical red">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 grid-margin stretch-card mt-5">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h4 class="card-title">Selected Trailer</h4>
                                                    <p class="card-description"> Top Ten<code>Main page</code>
                                                    </p>
                                                    <div class="table-responsive" id="list-trailer">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="update-trailer">
                                <div class="card-body">
                                    <h4 class="card-title">Trailer Details</h4>
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                        <button class="btn btn-primary" type="button" id="viewbtn1">View</button>
                                    </div>
                                   <div class="update-tags"></div>

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
    <script src="../../Film/js/plugins.js"></script>

    <script src="./js/trailerupload.js"></script>

    <!-- endinject -->
</body>

</html>