<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login |Id Show</title>
  <!-- plugins:css -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
    integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link rel="stylesheet" href="./assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="./assets/vendors/css/vendor.bundle.base.css">

  <link rel="stylesheet" href="./assets/css/style.css">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="./assets/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="row w-100 m-0">
        <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
          <div class="card col-lg-4 mx-auto">
            <div class="card-body px-5 py-5">
              <h3 class="card-title text-left mb-3">Login</h3>

              <form id="frm-login">
                <div class="form-group">
                  <label>email *</label>
                  <input type="email" name="member_name" id="email" class="form-control"
                    value="<?php if (isset($_COOKIE["member_login"])) {
                      echo $_COOKIE["member_login"];
                    } ?>">
                </div>
                <div class="form-group">
                  <label>Password *</label>
                  <input type="password" name="member_password" id="pass" class="form-control"
                    value="<?php if (isset($_COOKIE["member_password"])) {
                      echo $_COOKIE["member_password"];
                    } ?>">
                </div>
                <div class="form-group d-flex align-items-center justify-content-between">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" name="remember" <?php
                        if (isset($_COOKIE["member_login"])) { ?> checked
                      <?php } ?> > Remember me
                    </label>
                  </div>
                </div>
                <p id="loader">Loading please wait... </p>
                <div class="form-group">
                  <div><input type="button" id="submit" name="login" value="Login"
                      class="btn btn-success form-control"></span></div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- row ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="./assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="./assets/js/off-canvas.js"></script>
  <script src="./assets/js/hoverable-collapse.js"></script>
  <script src="./assets/js/misc.js"></script>
  <script src="./assets/js/settings.js"></script>
  <script src="./assets/js/todolist.js"></script>
  <!-- endinject -->
  <script>
    $('#loader').hide();
    $('#submit').on("click", function () {
      event.preventDefault()
      $('#loader').show();
      name1 = $('#email').val();
      url = $('#pass').val();
      if (name1 == "" || url == "")
        swal({
          icon: "error",
          title: "All Feilds Required!",
        });
      else {
        var formdata = $('#frm-login').serialize();
        console.log(formdata)
        $.ajax({
          url: "./login.php",
          method: "POST",
          data: formdata,
          success: function (data) {
            console.log(data)
            if (data.indexOf("done") != -1) {
                  // Execute code here
                  $('#loader').hide();
                  window.location.href = './pages/';
              //
            }
            else {
              swal({
                icon: "error",
                title: data,
              });
            }
          }
        })
      }
    })

  </script>
</body>

</html>