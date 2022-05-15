<?php
session_start();
if (!isset($_SESSION['user']) && empty($_POST)) {
} else {
    if (isset($_POST['text'])) {
        require('connect.php');
        $uname =  $_SESSION['userName'];
        $comment = htmlspecialchars($_POST['text']);
        $postid = $_POST['post_id'];
        echo $postid;
        $query = "INSERT INTO comments (pId,comtext,uName) VALUES ('$postid','$comment','$uname')";
        mysqli_query($conn, $query);
        header("location:userprofile.php?u2=$uname");
    }
}
