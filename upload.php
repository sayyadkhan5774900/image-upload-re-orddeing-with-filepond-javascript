<?php
include 'connection.php';

if (!isset($_GET['product_id'])) {
    json_response("Product Id is not Set", 500);
} 
$product_id = $_GET['product_id'];

$alt_text = "";
$qry1 = "SELECT title FROM `products` WHERE product_id='$product_id'";
$result1 = mysqli_query($conn, $qry1);
if (mysqli_num_rows($result1) > 0) {
    while ($row = mysqli_fetch_array($result1)) {
        $alt_text = addslashes($row['title']);
    }
}

$imageCount = 1;
$qry = "SELECT MAX(position) as max_position  from products_images WHERE product_id='$product_id'";
$res = mysqli_query($conn, $qry);
if (isset($res) && mysqli_num_rows($res) > 0) {
    while ($row = mysqli_fetch_array($res)) {
        $imageCount += $row['max_position'];
    }
}

$isPrimary = 0;
if($imageCount == 1){
    $isPrimary = 1;
}

// define a folder to save image
$target_dir = "product_image/";

// Check If file exist
if (!$_FILES['image']) {
    json_response("Error", 500);
}

// Get File Name
$target_file_original_name =  basename($_FILES["image"]["name"]);

//Create Target File Name
$target_file = $target_dir . basename($_FILES["image"]["name"]);

// Validate the image
$check = getimagesize($_FILES["image"]["tmp_name"]);
if (!$check) {
    json_response("The file is not an Image", 419);
}

// Get Image File Meta Information
$target_file_width = $check["0"];
$target_file_height = $check["1"];

// Allow certain file formats
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
if (
    $imageFileType != "jpg"
    && $imageFileType != "png"
    && $imageFileType != "jpeg"
    && $imageFileType != "webp"
) {
    json_response("Sorry, only JPG, JPEG, PNG & GIF files are allowed.", 419);
}

// Create File Name
$random = substr(md5(mt_rand()), 0, 7);

$target_file_name =  $product_id . '_' . $imageCount . '_' .  $random . '.' . $imageFileType;

// Check if file already exists
if (file_exists($target_file_name)) {
    json_response("Sorry, file already exists." . $target_file_name, 419);
}

// Check file size
if ($_FILES["image"]["size"] > 500000) {
    json_response("Sorry, your file is too large.", 419);
}

// Save the image if it is valid
$uploadedImage = move_uploaded_file($_FILES["image"]["tmp_name"], $target_file_name);
if ($uploadedImage) {
    $date = date("Y-m-d H:i:s");
    $query = "INSERT INTO products_images(product_id,image,original_image,original_height,original_width,is_primary,position,alt_text,created_at,updated_at)VALUES('$product_id','$target_file_name','$target_file_original_name','$target_file_height','$target_file_width','$isPrimary','$imageCount','$alt_text','$date','$date')";
    mysqli_query($conn, $query);
    json_response($uploadedImage, 200);
} else {
    json_response("Sorry the file is NOT Uploaded.", 500);
}
