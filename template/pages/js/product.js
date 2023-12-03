$(document).ready(
    function(){
        
      $('.create').hide();
      $('#loader').hide();
      $('#loader1').hide();
      $('.updateform').hide();
      $('.update').hide();
      fetch();
      $(document).on('click','#create',function(){
            $('.display').hide();
            $('.create').show();
            $('.update').hide();
      })
      $(document).on('click','#view-btn',function(){
            $('.display').show();
            $('.create').hide();
            $('.update').hide();
      })
      $(document).on('click','#viewbtn1',function(){
            $('.display').show();
            $('.create').hide();
            $('.update').hide();
      })
      $('#summernote').summernote({ tabsize: 4, height: 100 });
      $('#submit').on('click',function(){
        pname = $('#pname').val();
        price = $('#price').val();
        disPrice = $('#disPrice').val();
        type = $('#type').val();
        movie = $('#movie').val();
        image = $('#img').val();
        pdet = $('#summernote').val();
        if(pname == " "||price==""|| disPrice==""||type==""||image==""||pdet==""){
            swal({
                icon: "error",
                title: "All Feilds Required!",
          });
        }
        else{
            $('#submit').hide();
            $('#loader').show();
            var formdata = new FormData()
            var files = $('#img')[0].files;
            formdata.append('pname', pname)
            formdata.append('price', price)
            formdata.append('disPrice', disPrice)
            formdata.append('type', type)
            formdata.append('movie', movie)
            formdata.append('image', image)
            formdata.append('pdet', pdet)
            formdata.append("fileimg", files[0])
            $.ajax({
                url: "../php/create-product.php",
                method: "POST",
                data: formdata,
                contentType: false,
                processData: false,
                success: function (data) {
                    // alert(data)
                    if (data == "done") {
                        $('#view-data').DataTable().ajax.reload()
                        $('#submit').show();
                        $('#loader').hide();
                        $('#createform input[type="text"]').val('');
                        $('#price').val('');
                        $('#disPrice').val('');
                        $('#gender').val('');
                        $('#summernote').summernote("code", "");
                        swal("Successfully Created", "product Created", "success");

                  }
                  else if (data == "clouldError"){
                        $('#submit').show();
                        $('#loader').hide();
                        swal("Cloud error", "Try again", "error");
                  }
                        
                 
                  else{
                        $('#submit').show();
                        $('#loader').hide();
                        swal("Contact admin", "something went wrong", "error");
                  }
                            
                }
            })
        }
      })
      listdata()
            function listdata(){
                $.ajax({
                    url: "../php/list-product.php",
                    method:"POST",
                    success: function(data){
                        $("#list-product").html(data);
                    }
                })
            }
            $(document).on('click',"#actor-delete",function(){
                var id = $(this).data("id")
                $.ajax({
                    url: "../php/delete-product.php",
                    method:"POST",
                    data:{id:id},
                    success: function(data){
                        swal("Successfully Deleted", "Product Deleted", "success");
                        listdata()
                    }
                })
                }) 
    }
)