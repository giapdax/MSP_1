<?php
$target_dir = "images/";
$hinhanhpath = $target_dir . basename($_FILES['img']['name']);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($hinhanhpath, PATHINFO_EXTENSION));

// Check if image file is an actual image
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES['img']['tmp_name']);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($hinhanhpath)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["img"]["size"] > 1000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
$allowedExtensions = array("jpg", "jpeg", "png", "gif");
if (!in_array($imageFileType, $allowedExtensions)) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error or if the file already exists
if ($uploadOk == 0) {
    $hinhanhpath = NULL;
    echo "Sorry, your file was not uploaded.";
} else {
    // Try to upload the file only if $uploadOk is still 1
    if ($uploadOk == 1 && move_uploaded_file($_FILES["img"]["tmp_name"], $hinhanhpath)) {
        // echo "The file ". htmlspecialchars(basename($_FILES["img"]["name"])). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
