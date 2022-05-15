<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sign up </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>
    <div class="sign" style="display: flexbox;margin: 0% 20%; ">
        <span>
            <h2> sign up </h2>
            <h3>its free and anyone can join</h3>
        </span>
        <form action="add.php" method="POST" enctype="multipart/form-data">
            <span id="s"><label for="uname">user name</label><input class="form-control" type="text" name="uname"></span>
            <span><label for="fname">first name</label><input class="form-control" type="text" name="fname"></span>
            <span><label for="lname">last name</label><input class="form-control" type="text" name="lname"></span>
            <span><label for="email">email</label><input class="form-control" type="email" name="email"></span>
            <span><label for="pass">password</label><input class="form-control" type="password" name="pass"></span>
            <span><label for="sex">male</label><input type="radio" name="sex" value="male">
                <label for="sex">female</label><input type="radio" name="sex" value="female"></span>
            <span><label for="dob">date of birth</label></span>
            <span><input type="date" name="dob" min="1970-01-01" defaultValue="2022-4-01"></span>
            <span><input type="file" name="file" id="file" class="form-control"></span>
            <span><button type="submit" class="btn btn-secondary">sign up</button></span>
        </form>
    </div>
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