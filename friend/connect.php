<?php
$servername = "localhost";
$username = "salah";
$password = "1234www";
$dbname = "friend";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo 'yes';
