<?php

$errors=[];


$imgname = $_FILES['image']['name'];
$imgsize = $_FILES['image']['size'];
$imgtype = $_FILES['image']['type'];
$imgtmp = $_FILES['image']['tmp_name'];


$allowedExtentions =['jpeg','png','gif','svg','jpg'];

$explode = explode('.',$imgname);
$imgext = end($explode);

if(empty($imgname)){
    $errors[] = "image is required";
}elseif(!in_array($imgext,$allowedExtentions)){
    $errors[] = "this extention is not allowed";
}elseif($imgsize>2097152){
    $errors[] = "image size is should be less than 2MB";
}
if(empty($errors)){
    $img = time() . "_" . $imgname;
    move_uploaded_file($imgtmp,"uploaded/images/".$img);
    echo "the imaged uploaded successfully";
}else {
    foreach($errors as $error){
        echo "$error <br>";
    }
}
?>