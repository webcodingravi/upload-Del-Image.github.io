<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>upload & Delete Image</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" integrity="sha512-BnbUDfEUfV0Slx6TunuB042k9tuKe3xrD6q4mg5Ed72LTgzDIcLPxg6yI2gcMFRyomt+yJJxE+zJwNmxki6/RA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <script src="js/jquery.js" type="text/javascript"></script>
    <link href="css/style.css" rel="stylesheet" type="text/css">
  
   
</head>


<body>

<div class="container">
    <div class="row">
        <div class="col-12 mt-5">
            <h2>Upload & Delete Image</h2><br>
            <form id="submit_form">
             <div class="form-group">
                <label for="">Upload File :</label>
                <input type="file" name="file" id="Upload_file" class="form-control">
                <sapn>Allowed File type - JPG, JPEG, PNG, GIF</sapn>
             </div><br>
             <input type="submit" value="Submit" class="btn btn-primary">
            </form><br>
            <div id="preview">
                <h2>Image preview</h2>
                <div id="image_preview"></div>
            </div>
        </div>
    </div>






<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
$("#submit_form").on("submit", function(e) {
   e.preventDefault();
    var formData = new FormData(this);
    $.ajax({
          url : "upload.php",
          type : "POST",
          data : formData,
          contentType : false,
          processData : false,
          success : function(data) {
            $("#preview").show();
            $("#image_preview").html(data);
            $("#Upload_file").val('');
            

          }

    });
});
//Delete Image
$(document).on("click", "#delete_btn", function() {
    if(confirm("Are you sure you want to remove this image?")) {
        var path = $("#delete_btn").data("path");

        $.ajax({
          url :"delete.php",
          type : "POST",
          data : {path : path},
          success : function(data) {
            if(data != ""){
            $("#preview").hide();
            $("#image_preview").html('');
            }
          }
        });

    };
});

});

</script>
</body>
</html>