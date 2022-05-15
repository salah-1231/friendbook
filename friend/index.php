<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>friend login</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<?php
session_start();
if (isset($_GET['error'])) {
    echo 'no pass';
}
?>

<body>


    <span>
        <h1>log in to friend book</h1>
    </span>
    <form action="log.php" method="post">
        <span><label for="uname">user name</label><input type="text" name="uname"></span>
        <span><label for="pass">password</label><input type="password" name="pass"></span>
        <span><button class="btn btn-secondary" type="submit">log in</button></span>
    </form>
    <form action="signup.php">
        <span><button class="btn btn-secondary" type="submit">sign up</button></span>
    </form>

</body>
<style>
    body {
        background-image: url("uploads/mole-digital-login-background.jpg");
    }

    span {
        padding: 5px;
        display: grid;
        width: 50%;
        margin-left: 15%;
        color: whitesmoke;
    }
</style>

</html>