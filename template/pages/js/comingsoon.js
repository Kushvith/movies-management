$(document).ready(function () {
    $('.create-comingsoon').hide();
    $('#loader').hide();
    $(document).on('click','#create',function(){
        $('.view-comingsoon').hide();
        $('.create-comingsoon').show();
  })
  $(document).on('click','#view-btn',function(){
    $('.view-comingsoon').show();
    $('.create-comingsoon').hide();
})
$('#submit').on("click", function () {
    name1 = $('#movie').val();
    url = $('#release').val();
    console.log(name1,url)
    if (name1 == "" || url == "")
        swal({
            icon: "error",
            title: "All Feilds Required!",
        });
    else {
        var formdata = new FormData()
        formdata.append('movie', name1)
        formdata.append('release', url)
        $.ajax({
            url: "../php/create-comingsoon.php",
            method: "POST",
            data: formdata,
            contentType: false,
            processData: false,
            success: function (data) {
                console.log(data)
                if(data == "done"){
                    $('#movie').val('');
                    $('#release').val('');
                    
                    listdata()
                    swal("Successfully Created", "movie Created", "success");
                }
                else if(data == "exists"){
                    $('#movie').val('');
                    $('#release').val('');
                    swal("movie Exists", "Already Exists", "warning");
                }else{

                }
            }
        })
    }
})
//viewing

listdata()
function listdata(){
    $.ajax({
        url: "../php/list-coming-soon.php",
        method:"POST",
        success: function(data){
            $("#comingsoon").html(data);
        }
    })
}
$(document).on('click',"#actor-delete",function(){
    var id = $(this).data("id")
    $.ajax({
        url: "../php/delete-comingsoon.php",
        method:"POST",
        data:{id:id},
        success: function(data){
            swal("Successfully Deleted", "Comingsoon Deleted", "success");
            listdata()
        }
    })
    }) 
})