$(document).ready(function () {
    $('.create-trailer').hide();
    $('#loader').hide();
    $('#loader1').hide();
    $('.update-trailer').hide();
    $(document).on('click','#create',function(){
          $('.view-trailer').hide();
          $('.create-trailer').show();
          $('.updaupdate-trailerte').hide();
    })
    $(document).on('click','#view-btn',function(){
          $('.view-trailer').show();
          $('.create-trailer').hide();
          $('.update-trailer').hide();
    })
    $(document).on('click','#viewbtn1',function(){
          $('.view-trailer').show();
          $('.create-trailer').hide();
          $('.update-trailer').hide();
    })
    load_data(1)
    $('#submit').on("click", function () {
        name1 = $('#name').val();
        url = $('#url').val();
        console.log(name1,url)
        if (name1 == "" || url == "")
            swal({
                icon: "error",
                title: "All Feilds Required!",
            });
        else {
            var formdata = new FormData()
            formdata.append('name', name1)
            formdata.append('url', url)
            $.ajax({
                url: "../php/create-trailer.php",
                method: "POST",
                data: formdata,
                contentType: false,
                processData: false,
                success: function (data) {
                    if(data == "done"){
                        $('#name').val('');
                        $('#url').val('');
                        swal("Successfully Created", "trailer Created", "success");
                        load_data(1)
                    }
                    else if(data == "exists"){
                        $('#name').val('');
                        $('#url').val('');
                        swal("trailer Exists", "Already Exists", "warning");
                    }else{

                    }
                }
            })
        }
    })

   
    function load_data(page,query=""){
        $.ajax({
            url: "../php/load-trailer.php",
            method:"POST",
            data:{page: page,query: query},
            success: function(data){
                $("#trailers").html(data);
                // $("#trailers").load(data);
            }
        })
    }
    $(document).on('click', '.page-link', function () {
        var page = $(this).data('page_number');
        var query = $('#search_box').val();
        load_data(page, query);
  });
    $('#search').keyup(function(){
        var query = $(this).val();
        load_data(1,query);
    })
    $(document).on('click',"#view",function(){
        var url = $(this).data("id");
        window.open(url,"_blank");
    })
$(document).on('click',"#addlist",function(){
    var id = $(this).data("id")
    $.ajax({
        url: "../php/update-main-trailer.php",
        method:"POST",
        data:{id:id},
        success: function(data){
            if(data == "done")
            {
                swal("Successfully Created", "trailer added", "success");
                        load_data(1)
                        listdata()
            }
            else{
                swal("trailer Exceed", "Maximum 10", "warning");
            }

        }
    })
    })
    $(document).on('click',"#actor-edit",function(){
        $('.view-trailer').hide();
          $('.create-trailer').hide();
          $('.update-trailer').show();
        var id = $(this).data("id")
        $.ajax({
            url: "../php/edit-trailer.php",
            method:"POST",
            data:{id:id},
            success: function(data){
              $('.update-tags').html(data);
            }
        })
        })
        $(document).on("click",'#submit1', function () {
            id = $('#id1').val();
            name2 = $('#name1').val();
            url1 = $('#url1').val();
            if (name2 == "" || url1 == "")
                swal({
                    icon: "error",
                    title: "All Feilds Required!",
                });
            else {
                var formdata = new FormData()
                formdata.append('id', id)
                formdata.append('name', name2)
                formdata.append('url', url1)
                $.ajax({
                    url: "../php/edit-update-trailer.php",
                    method: "POST",
                    data: formdata,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        if(data == "done"){
                            $('#name1').val('');
                            $('#url1').val('');
                            swal("Successfully Created", "trailer Created", "success");
                            load_data(1)
                            listdata()
                        }
                        else if(data == "exists"){
                            $('#name1').val('');
                            $('#url1').val('');
                            swal("trailer Exists", "Already Exists", "warning");
                        }else{
    
                        }
                    }
                })
            }
        })
        $(document).on('click',"#actor-delete",function(){
            var id = $(this).data("id")
            $.ajax({
                url: "../php/delete-trailer.php",
                method:"POST",
                data:{id:id},
                success: function(data){
                    swal("Successfully Deleted", "Trailer Deleted", "success");
                    load_data(1)
                    listdata()
                }
            })
            }) 
            listdata()
            function listdata(){
                $.ajax({
                    url: "../php/list-trailer.php",
                    method:"POST",
                    success: function(data){
                        $("#list-trailer").html(data);
                    }
                })
            }
            $(document).on('click',"#removelist",function(){
                var id = $(this).data("id")
                $.ajax({
                    url: "../php/update-main-remove-trailer.php",
                    method:"POST",
                    data:{id:id},
                    success: function(data){
                        if(data == "done")
                        {
                            swal("Successfully Created", "trailer removed", "success");
                                    load_data(1)
                                    listdata()
                        }
                        
            
                    }
                })
                })
})