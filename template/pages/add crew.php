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
  <title>Add Crew | IDShow </title>
  <!-- plugins:css -->
  <?php
    include("../php/headercss.php");
    ?>
  <style>
    #summernote {
      background-color: black !important;
      color: white !important;
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
    <!-- partial -->
    <div class="main-panel col-12">
      <div class="content-wrapper">
        <div class="page-header">
          <h3 class="page-title">Crew</h3>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="../">Admin</a></li>
              <li class="breadcrumb-item active" aria-current="page">Crew</li>
            </ol>
          </nav>
        </div>
        <div class="display">
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Actor Details</h4>
                  <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-primary" type="button" id="create">Create New Crew</button>
                  </div>
                  <div class="actorsdata">
                    <div class="scrollbar scrollbar-lady-lips">
                      <div class="table-responsive mt-3">
                        <table id="view-data" class="table table-dark  ">
                          <thead class="thead-light">
                            <tr class="table-primary">
                              <th scope="col">name</th>
                              <th scope="col">D O B</th>
                              <th scope="col">directed No</th>
                              <th scope="col">Place</th>
                              <th scope="col">Gender</th>
                              <th scope="col">Action</th>
                            </tr>
                          </thead>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>


        <!-- create page  -->
        <div class="create">
          <div class="row">
            <div class="col-12 col-md-12 col-sm-12 ">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Create Crew</h4>
                  <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-primary align-items-center" type="button" id="view-btn"><i
                        class="mdi mdi-eye btn-icon-prepend"></i>View Crew</button>
                  </div>
                  <div class="createactorsfeild">
                    <form id="createform" action="../php/create-actor.php" method="post">
                      <div class="form-group">
                        
                          <label for="exampleSelectGender">Name</label>
                          <input type="text" name="fname" id="fname" placeholder="Name"
                            class="form-control text-white" required>
                        
                      </div>
                      <div class="form-group">
                        <label class="col-form-label">Date of Birth</label>
                        <input type="date" name="dob" id="dob" class="form-control " placeholder="dd/mm/yyyy" />
                      </div>
                      <div class="form-group">
                        <label>No Acted Movies</label>
                        <input type="number" name="directedno" id="directedno" placeholder="No directed Movies"
                          class="form-control text-white" min="1">
                      </div>
                      <div class="form-group row">
                        <div class="col-6">
                          <label for="exampleSelectGender">Place</label><input type="text" name="place" id="place"
                            placeholder="place" class="form-control text-white" required>
                        </div>
                       
                        <div class="col-6">
                          <label for="gender">Gender</label>
                          <select class="form-control text-white" name="gender" id="gender">
                            <option value="">Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="N/A">N/A</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                      <label>Directed Type</label>
                      <select class="js-example-basic-multiple" multiple="multiple" id="type" name="type" style="width:100%">
                        <option value="Music director">Music director</option>
                        <option value="Producer">Producer</option>
                        <option value="Director">Director</option>
                        <option value="Writer">Writer</option>
                      </select>
                    </div>
                      <div class="form-group">
                        <label>File upload</label>
                        <input type="file" name="img" id="img" class="file-upload-default">
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image"
                            name="actorImg" id="actorImg">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                          </span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="summernote">Details</label>
                        <textarea class="form-control" id="summernote" rows="4" placeholder="About crew..."
                          name="details"></textarea>
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
        </div>
        <!-- create page ends -->
        <!-- update lead -->
        <div class="update">
          <div class="row">
            <div class="col-12 col-md-12 col-sm-12 ">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Update Crew</h4>
                  <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-primary align-items-center" type="button" id="viewbtn1"><i
                        class="mdi mdi-eye btn-icon-prepend"></i>View Crew</button>
                  </div>
                  <div class="updateactorsfeild">
                    <div class="text-center" id="spinner">
                      <div class="spinner-border" role="status">
                        <span class="sr-only">Loading...</span>
                      </div>
                    </div>
                    <form id="updateform" action="../php/create-actor.php" method="post">
                    <input type="number" id="updateId" name="id" hidden>  
                    <div class="form-group">
                        
                        <label for="exampleSelectGender">Name</label>
                        <input type="text" name="fname" id="fname1" placeholder="Name"
                          class="form-control text-white" required>
                      
                    </div>
                    <div class="form-group">
                      <label class="col-form-label">Date of Birth</label>
                      <input type="date" name="dob" id="dob1" class="form-control " placeholder="dd/mm/yyyy" />
                    </div>
                    <div class="form-group">
                      <label>No Acted Movies</label>
                      <input type="number" name="directedno" id="directedno1" placeholder="No directed Movies"
                        class="form-control text-white" min="1">
                    </div>
                    <div class="form-group row">
                      <div class="col-6">
                        <label for="exampleSelectGender">Place</label><input type="text" name="place" id="place1"
                          placeholder="place" class="form-control text-white" required>
                      </div>
                     
                      <div class="col-6">
                        <label for="gender">Gender</label>
                        <select class="form-control text-white" name="gender" id="gender1">
                          <option value="">Select Gender</option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                          <option value="N/A">N/A</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                    <label>Directed Type</label>
                    <select class="js-example-basic-multiple" multiple="multiple" id="type1" name="type" style="width:100%">
                      <option value="Music director">Music director</option>
                      <option value="Producer">Producer</option>
                      <option value="Director">Director</option>
                      <option value="Writer">Writer</option>
                    </select>
                  </div>
                    <div class="form-group">
                      <label>File upload</label>
                      <input type="file" name="img" id="img1" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image"
                          name="actorImg" id="actorImg">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="summernote">Details</label>
                      <textarea class="form-control" id="summernote1" rows="4" placeholder="About Crew..."
                        name="details"></textarea>
                    </div>
                      <p class="text-white" id="loader1">Please wait......</p>
                      <button type="button" class="btn btn-success btn-icon-text" id="update">
                        <i class=" mdi mdi-file-check btn-icon-prepend"></i> Update </button>
                    </form>
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



  <!-- model -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Director Details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
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
    <script src="./js/director.js" differ></script>
  <!-- endinject -->
</body>

</html>