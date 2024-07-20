<?php
# $_FILES["picture"]
function fileUpload($picture)
{
    if ($picture["error"] == 4) {
        #if you select no file

        $pictureName = "default.png";
        $message = "No Picture has been added! Please add one later!!";
    } else {
        #check if it is an image file
        $checkIfImage = getimagesize($picture["tmp_name"]);

        $message = $checkIfImage ? "OK" : "Not an Image!";
    }

    if ($message == "OK") {

        $ext = strtolower(pathinfo($picture["name"], PATHINFO_EXTENSION));
        $pictureName = uniqid("") . "." . $ext;

        $destination = "images/{$pictureName}";

        move_uploaded_file($picture["tmp_name"], $destination);
    }
    return [$pictureName, $message];
}
