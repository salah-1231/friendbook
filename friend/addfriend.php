<?php

session_start();
require('connect.php');

if (isset($_SESSION['userName']) && !empty($_GET)) {

    $friend = $stripped = str_replace(' ', '', $_GET['username']);
    $uname =  $_SESSION['userName'];
    $query = "INSERT INTO `friendship` (`fId`, `user1`, `user2`, `dof`) VALUES (NULL, '$uname', '$friend', current_timestamp());";
    mysqli_query($conn, $query);
    $query2 = "DELETE FROM friendreq WHERE recive = '$uname' AND sende ='$friend'";
    if (mysqli_query($conn, $query2)) {
        header('Location:main.php');
    } else {
        echo "Error: " .  "<br>" . mysqli_error($conn);
    }
}
