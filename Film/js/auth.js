
$(document).ready(function () {
    toastr.options.timeOut = 1500; // 1.5s
    $('#loader').show();
    $('#otp-verify').hide()
    var email;
    $('#signup').on("click", function () {

        username = $('#username2').val();
        email = $('#email2').val();
        pass = $('#password2').val();
        repass = $('#repassword2').val();
        console.log(pass, repass)
        if (username == "" || email == "" || pass == "" || repass == "") {
            toastr.warning("all feilds required")
        }
        else if (pass.toString() != repass.toString()) {
            toastr.info("passwords should match")
        }
        else {
            $('#loader').show();
            form = $('#signup-form').serialize()
            console.log(form)
            $.ajax({

                url: "./php/add-user.php",
                method: "POST",
                data: form,
                success: function (data) {
                    alert(data)
                    if (data == "success") {
                        alert(data)
                        $('#loader').hide();
                        $('#otp-verify').show()
                        $('#sign-upcontent').hide()
                    }
                    else if (data == "exists") {
                        toastr.error("User already exists")
                    } else {
                        toastr.error("Something went wrong conact admin")
                    }
                }
            })
        }

    })
    $('#otpbtn').on("click", function () {

        otp = $('#otp').val();

        $.ajax({

            url: "./php/check-user.php",
            method: "POST",
            data: { otp, email },
            success: function (data) {
                if (data == "done") {
                    toastr.success("account created successfully")
                } else if (data == "wrong") {
                    toastr.error("wrong otp")
                } else {
                    toastr.error("Something went wrong conact admin")
                }
            }
        })
    })
    $('#login_submit').on("click", function () {

        username = $('#username2').val();
        // email = $('#email2').val();
        email = "kushvithchinna900@gmail.com"
        pass = $('#password2').val();
        repass = $('#repassword2').val();
        console.log(pass, repass)
        
            $('#loader').show();
            form = $('#login').serialize()
            console.log(form)
            $.ajax({

                url: "./php/login.php",
                method: "POST",
                data: form,
                success: function (data) {
                    if (data == "done") {
                        location.reload();
                        toastr.success("Logged in sucessfully")
                        
                    }
                    else if (data == "exists") {
                        toastr.error("User not exists")
                    } else {
                        toastr.error("Something went wrong conact admin")
                    }
                }
            })
        

    })
})