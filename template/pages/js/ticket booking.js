const file = document.querySelector('#file');
if(file){
    file.addEventListener('change', (e) => {
        // Get the selected file
        const [file] = e.target.files;
        // Get the file name and size
        const { name: fileName, size } = file;
        // Convert size in bytes to kilo bytes
        const fileSize = (size / 1000).toFixed(2);
        // Set the text content
        const fileNameAndSize = `${fileName} - ${fileSize}KB`;
        document.querySelector('.file-name').textContent = fileNameAndSize;
      });
}

$(document).ready(function(){
    $('#loader').hide();
    $('#loader1').hide();
    // $('#view-shows').hide();
    $('#view-theatre').hide();
    $('.create-shows').hide();
    $('.create-theatres').hide();
    $(document).on('click','#view-theatre-btn',function(){
      $('#view-shows').hide();
    $('#view-theatre').show();
    $('.create-shows').hide();
    $('.create-theatres').hide();
  })
  $(document).on('click','#create-theatre-btn',function(){
    $('#view-shows').hide();
  $('#view-theatre').hide();
  $('.create-shows').hide();
  $('.create-theatres').show();
})
$(document).on('click','#create-shows',function(){
    $('#view-shows').hide();
  $('#view-theatre').hide();
  $('.create-shows').show();
  $('.create-theatres').hide();
})
$(document).on('click','#view',function(){
    $('#view-shows').show();
  $('#view-theatre').hide();
  $('.create-shows').hide();
  $('.create-theatres').hide();
})
    $('#upload_csv').on('submit',function(e){
        e.preventDefault();
        $.ajax({
            url:'../php/import_csv.php',
            method:'POST',
            data:new FormData(this),
            dataType:'json',
            contentType:false,
            cache:false,
            processData:false,
            success:function(data){
                alert(data)
                var html = '<table class="table table-bordered">';
                if(data.column){
                   html += '<tr>';
                   for(var count=0;count< data.column.length; count++)
                   {
                     
                       html+='<th>'+data.column[count]+'</th>';
                       
                   }
                   html+='</tr>';
                }
                if(data.row_data){
                    
                     for(var count=0;count< data.row_data.length; count++)
                     {
                         html +='<tr>';
                         html +='<td class="name" contenteditable>'+data.row_data[count].name+'</td>';
                         html +='<td class="place" contenteditable>'+data.row_data[count].place+'</td>';
                         html +='<td class="totalcapacity" contenteditable>'+data.row_data[count].totalcapacity+'</td> </tr>';
                     }
                     
                }
                html +='</table>';
                html+='<button id="import_data" class="btn btn-info mt-2">import</button>';
                $('#csv_file_data').html(html);
                $('#upload_csv')[0].reset();
            }
        })
    })
    $(document).on('click','#import_data',function(){
         var name = [];
         var place = [];
         var totalcapacity = [];
         $('.name').each(function(){
             name.push($(this).text());
         })
         $('.place').each(function(){
            place.push($(this).text());
         })
         $('.totalcapacity').each(function(){
            totalcapacity.push($(this).text());
         })
         $.ajax({
             url:'../php/fetch_csv.php',
             method:'POST',
             data:{name,place,totalcapacity},
             success:function(data){
                 if(data == 'done'){
                 $('#csv_file_data').html('<div class=alert alert-primary>imported successfully</div>');
                 load_data1(1)
                 }
                 else{
                     $('#csv_file_data').html(data);
                     load_data1(1)
                 }
             }
         })
    })
    //create theatre
    $('#submit').on("click", function () {
        $('#loader').show();
        name1 = $('#name').val();
        place = $('#place').val();
        capacity = $('#capacity').val();
        if (name1 == "" || place == ""|| capacity =="")
            swal({
                icon: "error",
                title: "All Feilds Required!",
            });
        else {
            var formdata = new FormData()
            formdata.append('name', name1)
            formdata.append('place', place)
            formdata.append('capacity', capacity)
            $.ajax({
                url: "../php/add-theatre.php",
                method: "POST",
                data: formdata,
                contentType: false,
                processData: false,
                success: function (data) {
                    if(data == "done"){
                        $('#name').val('');
                        $('#place').val('');
                        $('#capacity').val('');
                        $('#loader').hide();
                        swal("Successfully Created", "theatre Created", "success");
                        load_data1(1)
                    }
                    else if(data == "exists"){
                        $('#name').val('');
                        $('#place').val('');
                        $('#capacity').val('');
                        $('#loader').hide();
                        swal("theatre Exists", "Already Exists", "warning");
                    }else{

                    }
                }
            })
        }
    })
    //create shows
    $('#submit-show').on("click", function () {
        movie = $('#movie').val();
        theatre = $('#theatre').val();
        date = $('#date').val();
        type = $('#type').val();
        price = $('#priceval').val();
       console.log(movie,theatre,date,type,price)
        if (movie == "" || type == "" || theatre == "" || date == ""||price=="" ) {
              console.log("All feilds required")
              swal({
                    icon: "error",
                    title: "All Feilds Required!",
              });
        }
        else {
           var morn = 0;
           var aft = 0;
           var nig =0;
              $('#submit-show').hide();
              $('#loader1').show();
              var formdata = new FormData()
              formdata.append('movie', movie)
              formdata.append('theatre', theatre)
              formdata.append('date', date)
              formdata.append('price',price)
              $.each(type, function (index, i) {
               if(i == 'Morning')
               {
                morn = 1
               }
               else if(i == 'Afternoon'){
                aft = 1
               }
               else if(i == 'Night')
               {
                nig = 1
               }
               else{
                console.log(i);
               }
               formdata.append('morn', morn)
               formdata.append('aft', aft)
               formdata.append('nig',nig)
               
          })
              
              $.ajax({
                    url: "../php/add-show.php",
                    method: "POST",
                    data: formdata,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        console.log(data);
                          if (data == "done") {
                                $('#submit-show').show();
                                $('#loader1').hide();
                                $('#movie').val('');
                                $('#theatre').val('');
                                $('#date').val('');
                                $('#type').val('');
                                $('#price').val('')
                                swal("Successfully Created", "Show Created", "success");
                                load_data(1)

                          }   
                          else if (data.indexOf("exists") != -1) {
                            $('#submit-show').show();
                            $('#loader1').hide();
                            $('#movie').val('');
                            $('#theatre').val('');
                            $('#date').val('');
                            $('#type').val('');
                                swal("show Exists", "Already Exists", "warning");
                          }
                          else{
                            $('#submit-show').show();
                            $('#loader1').hide();
                                swal("Contact admin", "something went wrong", "error");
                          }
                                
                    }


              })
        }
  })
  //view shows
  load_data(1)
  function load_data(page,query=""){
    $.ajax({
        url: "../php/load-shows.php",
        method:"POST",
        data:{page: page,query: query},
        success: function(data){
            $("#list-shows").html(data);
        }
    })
}
$(document).on('click', '.page-link', function () {
    var page = $(this).data('page_number');
    var query = $('#search-shows').val();
    load_data(page, query);
});
$('#search-shows').keyup(function(){
    var query = $(this).val();
    load_data(1,query);
})

$(document).on('click',"#show-delete",function(){
    var id = $(this).data("id")
    $.ajax({
        url: "../php/delete-show.php",
        method:"POST",
        data:{id:id},
        success: function(data){
            swal("Successfully Deleted", "show Deleted", "success");
            load_data(1)
        }
    })
    }) 
    load_data1(1)
    function load_data1(page,query=""){
      $.ajax({
          url: "../php/load-theatre.php",
          method:"POST",
          data:{page: page,query: query},
          success: function(data){
              $("#list-Theatre").html(data);
          }
      })
  }
  $(document).on('click', '#page-link1', function () {
      var page = $(this).data('pagenumber');
      var query = $('#search-theatre').val();
      load_data1(page, query);
  });
  $('#search-theatre').keyup(function(){
      var query = $(this).val();
      load_data1(1,query);
  })
  
  $(document).on('click',"#theatre-delete",function(){
      var id = $(this).data("id")
      $.ajax({
          url: "../php/delete-theatre.php",
          method:"POST",
          data:{id:id},
          success: function(data){
              swal("Successfully Deleted", "show Deleted", "success");
              load_data1(1)
          }
      })
      }) 
})