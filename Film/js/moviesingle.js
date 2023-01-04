$(document).ready(function () {

    $('#submit-rev').on("click", function () {

        
        title = $('#review_title').val();
        details = $('#details').val();
        id = $('#mov-id').val();
        
        if (title == "" || details == "") {
            toastr.warning("all feilds required")
        }
        else{
            $.ajax({

                url: "./php/add-review.php",
                method: "POST",
                data: { id,title, details },
                success: function (data) {
                    if (data == "done") {
                        toastr.success("review written successfully")
                    } else if (data == "wrong") {
                        toastr.error("already review submitted")
                    } else {
                        toastr.error("Something went wrong conact admin")
                    }
                }
            })
        }
    })
})