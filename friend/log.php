<?php
require('connect.php');
$uname = $_POST["uname"];
$pass = $_POST["pass"];
$query = "select userPassword from users where uName='$uname'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);
if (mysqli_num_rows($result) > 0) {
    while ($row) {
        if ($row['userPassword'] === $pass) {
            session_start();
            $_SESSION['userName'] = $uname;
            header("Location:http://localhost/friend/main.php");
        } else {
            header("Location:http://localhost/friend/index.php?error=1");
        }
    }
} else {
    header("Location:http://localhost/friend/index.php?error=1");
}
