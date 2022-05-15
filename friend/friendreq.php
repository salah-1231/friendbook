<?php
session_start();
require('connect.php');
$u1 =  $_SESSION['userName'];
$u2 = $_GET['u2'];
// echo $u1 . "<br>";
// echo $u2;
$query = "INSERT INTO `friendreq` (`sende`, `recive`) VALUES ( '$u1', '$u2')";
$result = mysqli_query($conn, $query);
// $row = mysqli_fetch_array($result);
echo "done";
