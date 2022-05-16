<?php
session_start();
require('connect.php');
if (!isset($_SESSION['userName'])) {
    header("Location:index.php");
}
$uname =  $_SESSION['userName'];
if (isset($_POST['liked'])) {
    $postid11 = $_POST['postid1'];
    $likenum = mysqli_query($conn, "SELECT likes  from posts WHERE pid = '$postid11'");
    $likenumrow = mysqli_fetch_assoc($likenum);
    $numoflikes = $likenumrow['likes'];
    mysqli_query($conn, "INSERT INTO post_like (uname, post_id) VALUES ('$uname', '$postid11')");
    mysqli_query($conn, "UPDATE posts SET likes=$numoflikes+1 WHERE pid=$postid11");

    $numoflikes = $numoflikes + 1;
    echo  (int)$numoflikes . " likes";
    exit();
}
if (isset($_POST['unliked'])) {
    $postid11 = $_POST['postid1'];
    $likenum = mysqli_query($conn, "SELECT likes  from posts WHERE pid = '$postid11'");
    $likenumrow = mysqli_fetch_assoc($likenum);
    $numoflikes = $likenumrow['likes'];

    mysqli_query($conn, "DELETE FROM post_like WHERE post_id = '$postid11' AND uname='$uname'");
    mysqli_query($conn, "UPDATE posts SET likes='$numoflikes'-1 WHERE pid='$postid11'");

    $numoflikes = $numoflikes - 1;
    echo  (int)$numoflikes . " likes";
    exit();
}
