<?php
session_start();
require('connect.php');
if (!isset($_SESSION['userName'])) {
    header("Location:index.php");
}
//uName= '$un',firstName = '$fn',lastName,email,userPassword,dob,gender,userimg
$uname =  $_SESSION['userName'];
if (isset($_POST["uname"])) {
    $un = $_POST["uname"];
    $q1 = "UPDATE users SET uName= '$un'WHERE uName= '$uname'";
    $result = mysqli_query($conn, $q1);
}
if (isset($_POST["fname"]) and $_POST["fname"] != null) {
    $fn = $_POST["fname"];
    $q2 = "UPDATE users SET firstName= '$fn'WHERE uName= '$uname'";
    $result = mysqli_query($conn, $q2);
}
if (isset($_POST["lname"]) and $_POST["lname"] != null) {
    $ln = $_POST["lname"];
    $q3 = "UPDATE users SET lastName= '$ln'WHERE uName= '$uname'";
    $result = mysqli_query($conn, $q3);
}
if (isset($_POST["email"]) and $_POST["email"] != null) {
    $email = $_POST["email"];
    $q4 = "UPDATE users SET email= '$email'WHERE uName= '$uname'";
    $result = mysqli_query($conn, $q4);
}
if (isset($_POST["sex"]) and $_POST["sex"] != null) {
    $sex = $_POST["sex"];
    $q5 = "UPDATE users SET gender= '$sex'WHERE uName= '$uname'";
    $result = mysqli_query($conn, $q5);
}
if (isset($_POST["pass"]) and $_POST["pass"] != null) {
    $pass = $_POST["pass"];
    $q6 = "UPDATE users SET userPassword= '$pass'WHERE uName= '$uname'";
    $result = mysqli_query($conn, $q6);
}
if (isset($_POST["dob"]) and $_POST["dob"] != null) {
    $dob = $_POST["dob"];
    $q7 = "UPDATE users SET dob= '$dob'WHERE uName= '$uname'";
    $result = mysqli_query($conn, $q7);
}

//$text = htmlspecialchars($_POST['text']);
if (isset($_FILES["file"]) and $_FILES["file"] != null) {
    $file = $_FILES["file"];
    $fileName = $_FILES['file']['name'];
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
    $q11 = "UPDATE users SET userimg= '$fileDes' WHERE uName= '$uname'";
    $result = mysqli_query($conn, $q11);
}


if ($result == TRUE) {
    //echo "New record created successfully";
    header("Location:http://localhost/friend/userprofile.php?u2=$uname");
    die();
} else {
    echo mysqli_error($conn);
    //header("Location:http://localhost/friend/index.php");
}
