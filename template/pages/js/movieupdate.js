$(document).ready(function () {
      $('#summernote').summernote({ tabsize: 4, height: 100 });
      $('#loader').hide();
      $('.create').hide();
      $(document).on('click', '#create', function () {
            $('.display').hide();
            $('.create').show();
      })
      $(document).on('click', '#View', function () {
            $('.display').show();
            $('.create').hide();
      })
      $('#submit').on("click", function () {
            name = $('#name').val();
            imdbrat = $('#imdbrat').val();
            runtime = $('#runtime').val();
            releaseyear = $('#releaseyear').val();
            genre = $('#genre').val();
            mmpa = $('#mmpa').val();
            actor = $('#actor').val();
            actor1 = $('#actor1').val();
            actor2 = $('#actor2').val();
            actor3 = $('#actor3').val();
            director = $('#director').val();
            music = $('#music').val();
            producer = $('#producer').val();
            trailer = $('#trailer').val();

            image = $('#img').val();
            summernote = $('#summernote').val();
            if (name == "" || imdbrat == "" || runtime == "" || releaseyear == "" || genre == "" || mmpa == "" || actor == "" || actor1 == ""
                  || actor2 == "" || actor3 == "" || director == "" || producer == "" || music == "" || trailer == "" || image == "" || summernote == "") {
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
                  formdata.append('name', name)
                  formdata.append('imdbrat', imdbrat)
                  formdata.append('runtime', runtime)
                  formdata.append('releaseyear', releaseyear)
                  formdata.append('genre', genre)
                  formdata.append('mmpa', mmpa)
                  formdata.append('actor', actor)
                  formdata.append('actor1', actor1)
                  formdata.append('actor2', actor2)
                  formdata.append('actor3', actor3)
                  formdata.append('director', director)
                  formdata.append('music', music)
                  formdata.append('producer', producer)
                  formdata.append('trailer', trailer)
                  formdata.append('summernote', summernote)

                  formdata.append("fileimg", files[0])
                  $.ajax({
                        url: "../php/create-movie.php",
                        method: "POST",
                        data: formdata,
                        contentType: false,
                        processData: false,
                        success: function (data) {
                              if (data == "done") {
                                    $('#submit').show();
                                    $('#loader').hide();
                                    $('#createform input[type="text"]').val('');
                                    $('#createform input[type="number"]').val('');
                                    $('#runtime').val('');
                                    $('#releaseyear').val('');
                                    $('#genre').val('');
                                    $('#genre').val('');
                                    $('#mmpa').val('');
                                    $('#actor').val('');
                                    $('#actor1').val('');
                                    $('#actor2').val('');
                                    $('#actor3').val('');
                                    $('#director').val('');
                                    $('#producer').val('');
                                    $('#trailer').val('');
                                    $('#img').val('');


                                    $('#summernote').summernote("code", "");
                                    swal("Successfully Created", "Movie Created", "success");
                                    load_data(1)

                              }
                              else if (data == "clouldError") {
                                    $('#submit').show();
                                    $('#loader').hide();
                                    swal("Cloud error", "Try again", "error");
                              }

                              else if (data == "exists") {
                                    $('#submit').show();
                                    $('#loader').hide();
                                    $('#submit').show();
                                    $('#loader').hide();
                                    $('#createform input[type="text"]').val('');
                                    $('#createform input[type="number"]').val('');
                                    $('#runtime').val('');
                                    $('#releaseyear').val('');
                                    $('#genre').val('');
                                    $('#genre').val('');
                                    $('#mmpa').val('');
                                    $('#actor').val('');
                                    $('#actor1').val('');
                                    $('#actor2').val('');
                                    $('#actor3').val('');
                                    $('#director').val('');
                                    $('#producer').val('');
                                    $('#trailer').val('');
                                    $('#img').val('');
                                    $('#summernote').summernote("code", "");
                                    swal("movie Exists", "Already Exists", "warning");
                              }
                              else {
                                    $('#submit').show();
                                    $('#loader').hide();
                                    swal("Contact admin", "something went wrong", "error");
                              }

                        }


                  })
            }
      }

      )
      //create completed
      load_data(1)
      function load_data(page, query = "") {
            $.ajax({
                  url: "../php/load-movie.php",
                  method: "POST",
                  data: { page: page, query: query },
                  success: function (data) {
                        $("#movie-data").html(data);
                  }
            })
      }
      $(document).on('click', '.page-link', function () {
            var page = $(this).data('page_number');
            var query = $('#search_box').val();
            load_data(page, query);
      });
      $('#search-name').keyup(function () {
            var query = $(this).val();
            load_data(1, query);
      })
      $(document).on('click',"#delete_movie",function(){
            var id = $(this).data("id")
            $(this).hide()
            $.ajax({
                url: "../php/delete-movie.php",
                method:"POST",
                data:{id:id},
                success: function(data){
                    swal("Successfully Deleted", "show Deleted", "success");
                    load_data(1)
                }
            })
            })
})