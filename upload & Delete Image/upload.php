<?php
if($_FILES['file']['name'] != '') {
    $filename = $_FILES['file']['name'];

   $extension = pathinfo($filename, PATHINFO_EXTENSION);

   $valid_extensions = array("jpg", "jpeg", "png", "gif");

   if(in_array($extension, $valid_extensions)) {
    $new_name = rand(). "." . $extension;
     $path = "image/". $new_name;

     if(move_uploaded_file($_FILES['file']['tmp_name'], $path)) {
        echo '<img src="'.$path.'"><br><br>
        <button class="btn btn-danger" id="delete_btn" data-path="'.$path.'">Delete</button>';
     }

   }else {
    echo '<script>alert("Invalid File Format.")</script>';
   }



}else {
    echo '<script>alert("Please Select File")</script>';
}






?>