
$(document).ready(function () {
     
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
      $('#summernote1').summernote({ tabsize: 4, height: 100 });
      //creating the actor 
      $('#submit').on("click", function () {
            fname = $('#fname').val();
            sname = $('#sname').val();
            dob = $('#dob').val();
            actedno = $('#actedno').val();
            place = $('#place').val();
            gender = $('#gender').val();
            image = $('#img').val();
            summernote = $('#summernote').val();
            if (fname == "" || sname == "" || dob == "" || actedno == "" || place == "" || gender == "" || image == "" || summernote == "") {
                  console.log("All feilds required")
                  swal({
                        icon: "error",
                        title: "All Feilds Required!",
                  });
            }
            else {
                  $('#submit').hide();
                  $('#loader').show();
                  var formdata = new FormData()

                  var files = $('#img')[0].files;
                  formdata.append('fname', fname)
                  formdata.append('sname', sname)
                  formdata.append('dob', dob)
                  formdata.append('actedno', actedno)
                  formdata.append('place', place)
                  formdata.append('gender', gender)
                  formdata.append('details', summernote)
                  formdata.append("fileimg", files[0])
                  $.ajax({
                        url: "../php/create-actor.php",
                        method: "POST",
                        data: formdata,
                        contentType: false,
                        processData: false,
                        success: function (data) {
                              if (data == "done") {
                                    $('#view-data').DataTable().ajax.reload()
                                    $('#submit').show();
                                    $('#loader').hide();
                                    $('#createform input[type="text"]').val('');
                                    $('#actedno').val('');
                                    $('#dob').val('');
                                    $('#gender').val('');
                                    $('#summernote').summernote("code", "");
                                    swal("Successfully Created", "Actor Created", "success");

                              }
                              else if (data == "clouldError"){
                                    $('#submit').show();
                                    $('#loader').hide();
                                    swal("Cloud error", "Try again", "error");
                              }
                                    
                              else if (data == "exists") {
                                    $('#submit').show();
                                    $('#loader').hide();
                                    $('#createform input[type="text"]').val('');
                                    $('#actedno').val('');
                                    $('#dob').val('');
                                    $('#gender').val('');
                                     $('#summernote').summernote("code", "");
                                    swal("Actor Exists", "Already Exists", "warning");
                              }
                              else{
                                    $('#submit').show();
                                    $('#loader').hide();
                                    swal("Contact admin", "something went wrong", "error");
                              }
                                    
                        }


                  })
            }
      }
      
      )
      //create actor ends
      //view tables
      function fetch(){
            var dataTable = $('#view-data').DataTable(
                  {
                        "processing" : true,
                        "serverSide": true,
                        "order": [],
                        "ajax":{
                              url:"../php/fetch-actor.php",
                              type :"POST"
                        }
                  }
      
            );
      }
      
      //view model
    
      //delete
      $(document).on('click', '#actor-delete', function(){
            var id = $(this).data("id")
            $.ajax({
              url:"../php/delete-actor.php",
              method:"POST",
              data:{id},
              success:function(data)
              {
                   if(data)
                   {

                        swal("Successfully Deleted", "Actor Deleted", "success");
                        $('#view-data').DataTable().ajax.reload()
                   }
              }
            })
        }) 
        $(document).on('click', '#actor-edit', function(){
            $('.update').show();
            $('.create').hide();
            $('.display').hide();
            var id = $(this).data("id")
            $.ajax({
              url:"../php/edit-actor.php",
              method:"POST",
              data:{id},
              success:function(data)
              {
                   if(data)
                   {
                        $('#spinner').hide()
                        $('#updateform').show()
                       var parsedData =  JSON.parse(data);
                       id1 =  $("#updateId").val(parsedData[8]); 
                       fname1 = $('#fname1').val(parsedData[0]);
                       sname1 = $('#sname1').val(parsedData[1]);
                       dob1 = $('#dob1').val(parsedData[2]);
                       actedno1 = $('#actedno1').val(parsedData[3]);
                       place1 = $('#place1').val(parsedData[4]);
                       gender1 = $('#gender1').val(parsedData[5]);
                       summernote1 = $('#summernote1').summernote("code", parsedData[6]);
                   }
              }
            })
        })
        $(document).on('click',"#update",function(){
                        updateid = $("#updateId").val();
                       fname1 = $('#fname1').val();
                       sname1 = $('#sname1').val();
                       dob1 = $('#dob1').val();
                       actedno1 = $('#actedno1').val();
                       place1 = $('#place1').val();
                       gender1 = $('#gender1').val();
                       summernote1 = $('#summernote1').val();
                       image1 = $('#img1').val();
                       if(updateid==""||fname1 =="" ||sname1=="" || dob1  =="" ||actedno1=="" ||place1=="" ||gender1=="" ||summernote1==""){
                        swal({
                              icon: "error",
                              title: "All Feilds Required!",
                        });
                       }
                       else{
                        $('#update').hide();
                        $('#loader1').show();
                        var formdata1 = new FormData()
                                    var files = $('#img1')[0].files;
                                    formdata1.append('id',updateid)
                                    formdata1.append('fname', fname1)
                                    formdata1.append('sname', sname1)
                                    formdata1.append('dob', dob1)
                                    formdata1.append('actedno', actedno1)
                                    formdata1.append('place', place1)
                                    formdata1.append('gender', gender1)
                                    formdata1.append('details', summernote1)
                                    formdata1.append("fileimg", files[0])
                              
                              
                              $.ajax({
                                    url: "../php/edit-update-actor.php",
                                    method: "POST",
                                    data: formdata1,
                                    contentType: false,
                                    processData: false,
                                    success: function (data) {
                                          if(data == "done"){
                                                $('#view-data').DataTable().ajax.reload()
                                                $('#update').show();
                                                $('#loader1').hide();   
                                                swal("Successfully Updated", "Actor Updated", "success");
                                          }
                                    }
                              })
                       }      
        })

})

