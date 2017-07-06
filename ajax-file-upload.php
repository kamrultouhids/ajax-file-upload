<?php
/**
 * Created by PhpStorm.
 * User: PHP_1
 * Date: 7/6/2017
 * Time: 10:08 AM
 */
/*if ($_POST["name"]) {
    $label = $_POST["name"];
}*/

$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);

    if ((($_FILES["file"]["type"] == "image/gif")
        || ($_FILES["file"]["type"] == "image/jpeg")
        || ($_FILES["file"]["type"] == "image/jpg")
        || ($_FILES["file"]["type"] == "image/pjpeg")
        || ($_FILES["file"]["type"] == "image/x-png")
        || ($_FILES["file"]["type"] == "image/png"))
    && ($_FILES["file"]["size"] < 200000) && in_array($extension, $allowedExts)) {
        if ($_FILES["file"]["error"] > 0) {
            echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
        } else {

           $filename = $_FILES["file"]["name"];
           
           if (file_exists("uploads/" . $filename)) {
               echo $filename . " already exists. ";
           } else {
               move_uploaded_file($_FILES["file"]["tmp_name"],
                   "uploads/" . $filename);
              
           }

           echo json_encode("success");
        }
    } else {
    echo "Invalid file";
    }