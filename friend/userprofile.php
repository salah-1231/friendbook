<html>
<?php
session_start();
require('connect.php');
if (!isset($_SESSION['userName'])) {
    header("Location:index.php");
}
$uname =  $_SESSION['userName'];
$user = $_GET['u2']; ?>


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="prifilecss.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <title>profile</title>
</head>

<body>
    <nav class="navbar navbar-expand-sm bg-light">
        <div class="container-fluid">
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link" href="main.php">friend book</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="userprofile.php?u2=<?php echo $uname ?>">profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php">logout</a>
                </li>
            </ul>
        </div>
    </nav>


    <div class="maindiv">
        <div class="info ">
            <?php

            $query = "SELECT * from users where uName='$user'";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    $uimg = $row['userimg'];
                    $fname = $row['firstName'];
                    $lname = $row['lastName'];
                    $email = $row['email'];
                    $dob = $row['dob'];
                    $ug = $row['gender'];
                    echo "<img src='" . $row['userimg'] . "' alt='no img' style='max-width: 60%;border-radius: 25px;'>";
                    echo  '<P>username : ' . $row['uName'] . '<br> first name : ' . $row['firstName'] . ' <br> last name  ' . $row['lastName'] . ' </P>';
                    echo  '<P>email : ' . $row['email'] . '</P>';
                    echo  '<P>born on : ' . $row['dob'] . '</P>';
                    echo  '<P>gender : ' . $row['gender'] . '</P>';
                }
            }
            echo "<form action='updateuserinfo.php'>";
            ?>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="revel()" id="btt"> update info </button>
            </form>
            <script>
                function revel() {
                    document.getElementById('btt').classList.remove("Collapse");
                }
            </script>



            <div class="update">
                <form action="updateuserinfo.php" method="POST" enctype="multipart/form-data" class="Collapse">
                    <label for="uname">user name</label><input type="text" name="uname" placeholder="">
                    <label for="fname">first name</label><input type="text" name="fname">
                    <label for="lname">last name</label><input type="text" name="lname">
                    <label for="email">email</label><input type="email" name="email">
                    <label for="pass">password</label><input type="password" name="pass">
                    <label for="sex">male</label><input type="radio" name="sex" value="male">
                    <label for="sex">female</label><input type="radio" name="sex" value="female">
                    <label for="dob">date of birth</label>
                    <input type="date" name="dob" min="1970-01-01" defaultValue="2022-4-01">
                    <input type="file" name="file" id="file">
                    <input type="submit">
                </form>
            </div>
        </div>
        <!--col 1-->
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form action="updateuserinfo.php" method="POST" enctype="multipart/form-data" class="form">
                            <label for="uname">user name</label><input type="text" name="uname">
                            <label for="fname">first name</label><input type="text" name="fname">
                            <label for="lname">last name</label><input type="text" name="lname">
                            <label for="email">email</label><input type="email" name="email"><br>
                            <label for="pass">password</label><input type="password" name="pass"><br>
                            <label for="sex">male</label><input type="radio" name="sex" value="male">
                            <label for="sex">female</label><input type="radio" name="sex" value="female"><br>
                            <label for="dob">date of birth</label>
                            <input type="date" name="dob" min="1970-01-01" defaultValue="2022-4-01">
                            <input type="file" name="file" id="file" required>
                            <input class="btn btn-primary" type="submit">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </form>
                    </div>
                    <div class="modal-footer">

                    </div>
                </div>
            </div>
        </div>


        <div class="col posts">
            <?php
            $tquery = "SELECT * FROM posts where uName='$user' order by dop desc";
            $result2 = mysqli_query($conn, $tquery);
            while ($row = mysqli_fetch_array($result2)) {

            ?>

                <?php
                echo "<div class='pp'>";
                echo '<div class="card" style="width:690px; background-color: #ffffffcf;border:0;">';
                $postid = $row['pId'];
                echo "  <img src=' " . $row['mediaPost'] . " 'alt='' class='card-img-top'>";
                echo "<div class='card-body'>";
                echo " <h4 class='card-title'>" . $row['uName'] . "</h4>";
                echo "  <p class='card-text '>" . $row['textPost'] . " </p>";
                echo "  <p class='card-text '>comments :</p>";;
                echo "</div>";

                //comments:
                $query1 = "SELECT * from comments WHERE pId ='$postid'";
                $result1 = mysqli_query($conn, $query1);
                while ($row1 = mysqli_fetch_assoc($result1)) { ?>
                    <div class="card card-inner comment " style=" background-color: transparent;border-top: 0;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-10">
                                    <a href=''><?php echo $row1["uName"]; ?> </a>
                                    <p class='comment'><?php echo $row1["comtext"]; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php  }
                echo "</div>"; ?>
                <form action="addcommenttoprofile.php" method="post" class="ajax form-inline ml-auto ">
                    <input class="form-control" style="width: 690px" type="text" name="text" id="newcomment" placeholder="Write a comment" aria-describedby="basic-addon2" required>
                    <input type='hidden' name='post_id' value=<?php echo $postid; ?>>
                    <input type="submit" name="submitcom" value="Add comment" class="btn btn-primary ">
                </form>
                <!-- likes: -->
                <?php
                $likedquery = " SELECT * from post_like WHERE post_id = '$postid' AND uname = '$uname'";
                $likeresult = mysqli_query($conn, $likedquery);
                $likerow = mysqli_fetch_assoc($likeresult);
                if (mysqli_num_rows($likeresult) == 0) {
                    $like_id = 0;
                } else {
                    $like_id = $likerow['like_id'];
                }

                $likenum = mysqli_query($conn, "SELECT likes  from posts WHERE pid = '$postid'");
                $likenumrow = mysqli_fetch_assoc($likenum);
                $numoflikes = $likenumrow['likes'];
                if (mysqli_num_rows($likeresult) == 1) {  ?>
                    <div id=" plikes">
                        <span class="<?php echo $postid; ?> unlike btn btn-secondary ' <?php echo $postid; ?>'" data-id="<?php echo $postid; ?>">unlike</span>
                        <span class="<?php echo $postid; ?> collapse like btn btn-secondary" id="<?php echo $postid; ?>" data-id="<?php echo $postid; ?>">like</span>
                        <p class="likes_count"><?php echo $numoflikes . "  "; ?>likes</p>
                    </div>
                <?php  } else { ?>
                    <div id=" plikes">
                        <span class="<?php echo $postid; ?> like btn btn-secondary" data-id="<?php echo $postid; ?>">like</span>
                        <span class="<?php echo $postid; ?> collapse unlike btn btn-secondary" data-id="<?php echo $postid; ?>">unlike</span>
                        <p class="likes_count" id="likes1"><?php echo $numoflikes . "  " ?>likes</p>
                    </div>
                <?php  }
                ?>

            <?php
                echo "</div>";
            }
            ?>

        </div>

        <!--clo2-->
    </div>
</body>

<script>
    $(document).ready(function() {
        // when the user clicks on like
        $('span.like').on('click', function() {
            var postid = $(this).data('id');

            $post = $(this);
            $.ajax({
                url: 'addlike.php',
                method: 'post',
                data: {
                    'liked': 1,
                    'postid1': postid

                },
                success: function(response) {

                    $("#plikes").load(location.href + " #plikes");
                    $post.siblings().removeClass('collapse');
                    $post.addClass('collapse');
                    $post.parent().find('p.likes_count').text(response);
                    console.log($post);
                }
            });
        });
        // when the user clicks on unlike
        $('span.unlike').on('click', function() {
            var postid = $(this).data('id');
            $post = $(this);
            $.ajax({
                url: 'addlike.php',
                method: 'post',
                data: {
                    'unliked': 1,
                    'postid1': postid
                },
                success: function(response) {
                    $post.addClass('collapse');
                    $post.siblings().removeClass('collapse');
                    $post.parent().find('p.likes_count').text(response);
                }

            });
        });
    });
</script>

</html>