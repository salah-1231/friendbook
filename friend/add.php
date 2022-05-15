<?php
require("connect.php");
$un = $_POST["uname"];
$fn = $_POST["fname"];
$ln = $_POST["lname"];
$email = $_POST["email"];
$sex = $_POST["sex"];
$pass = $_POST["pass"];
$dob = $_POST["dob"];
//$text = htmlspecialchars($_POST['text']);
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

$query = "INSERT INTO users(uName,firstName,lastName,email,userPassword,dob,gender,userimg)
VALUES ('$un','$fn','$ln','$email','$pass','$dob','$sex','$fileDes')";
$result = mysqli_query($conn, $query);
if ($result == TRUE) {
    echo "New record created successfully";
    //header("Location:http://localhost/friend/index.php");
    die();
} else {
    echo mysqli_error($conn);
    header("Location:http://localhost/friend/index.php");
}
