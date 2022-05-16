<?php
session_start();
if (!isset($_SESSION['user']) && empty($_POST)) {
    header("Location:index.php");
} else {
    require('connect.php');
    $uname =  $_SESSION['userName'];
    $text = htmlspecialchars($_POST['text']);
    $file = $_FILES['file'];
    $fileName = $_FILES['file']['name'];
    echo $fileName . '<br>';
    $fileTmpName = $_FILES['file']['tmp_name'];
    echo $fileTmpName . '<br>';
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];
    $fileExt = explode('.', $fileName);
    $fileActExt = strtolower(end($fileExt));
    $allowed = array('jpg', 'jpeg', 'png');
    if (in_array($fileActExt, $allowed)) {
        if ($fileError === 0) {
            $fileNameNew = uniqid('', true) . "." . $fileActExt;
            $fileDes = 'uploads/' . $fileNameNew;
            echo $fileDes . '<br>';
            move_uploaded_file($fileTmpName, $fileDes);
        } else {
            echo "error   :" . $fileError;
        }
    }
    $query = "INSERT INTO posts ( uName , textPost , mediaPost ) values ('$uname', '$text', '$fileDes')";
    $result = mysqli_query($conn, $query);
    if ($result) {
        echo "user saved successfully";
        header("location:main.php");
    } else {
        echo "Error " . mysqli_error($conn);
    }
}
