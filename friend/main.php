<?php
session_start();
require('connect.php');
if (!isset($_SESSION['userName'])) {
    header("Location:index.php");
}
$uname =  $_SESSION['userName'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>friendBook</title>
</head>

<body>
    <nav class="navbar navbar-expand-sm bg-light">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="main.php">home</a>
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
    <div class="main">
        <form class="form1" action="upload.php" method="post" enctype="multipart/form-data">
            <label for="text" class="form-label">Add post</label>
            <input type="text" name="text" placeholder="Text" class="form-control"></input>
            <input class="file" type="file" name="file" id="file" class="">
            <input class="btn btn-secondary" type="submit" value="Upload" name="submit">
        </form>
        <!-- hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh -->
        <div class="container">
            <div class="1 row align-items-start">
                <div class="col add">
                    <h1>find friends</h1>
                    <?php
                    $query = "SELECT uName from users where not uName='$uname'";
                    $result = mysqli_query($conn, $query);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                            //echo gettype($row);
                            $_SESSION['row'] = $row;
                            $user2 = $row['uName'];
                            echo "<span class='span1'>user :<a href='userprofile.php?u2=$user2'>" . $user2 . " </a></span>   ";
                            echo  "<span><a href='friendreq.php?u2=$user2'>  add </a></span>";
                        }
                    } else {
                        echo "no users";
                    } ?>
                </div>
                <style>

                </style>
                <div class="col">
                    <div>
                        <div class="col users">
                            <?php
                            $tquery = "SELECT * FROM posts INNER JOIN friendship 
                    ON posts.uName=friendship.user1 and '$uname'=friendship.user2 or posts.uName=friendship.user2 and '$uname'=friendship.user1 or posts.uName='$uname' 
                    order by dop desc";
                            $result2 = mysqli_query($conn, $tquery);
                            while ($row = mysqli_fetch_array($result2)) {
                                $postid = $row['pId'];

                                echo "  <p class='post1'>" . $row['textPost'] . " </p>";
                                echo "  <img src=' " . $row['mediaPost'] . " 'alt='' class='post1'>";

                                //comments:
                                $query1 = "SELECT * from comments WHERE pId ='$postid'";
                                $result1 = mysqli_query($conn, $query1);
                                while ($row1 = mysqli_fetch_assoc($result1)) { ?>
                                    <div class="card card-inner comment">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-10">
                                                    <a href=''><?php echo $row1['uName']; ?> </a>
                                                    <p class='comment'><?php echo $row1['comtext']; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php  } ?>
                                <form action="addcomment.php" method="post" class="ajax form-inline ml-auto">
                                    <input class="form-control" style="width: 700px" type="text" name="text" id="newcomment" placeholder="Write a comment" aria-describedby="basic-addon2" required>
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
                                    <?php  } else { ?>
                                        <div id=" plikes">
                                            <span class="<?php echo $postid; ?> like btn btn-secondary" data-id="<?php echo $postid; ?>">like</span>
                                            <span class="<?php echo $postid; ?> collapse unlike btn btn-secondary" data-id="<?php echo $postid; ?>">unlike</span>
                                            <p class="likes_count" id="likes1"><?php echo $numoflikes . "  " ?>likes</p>
                                        </div>
                                    <?php  }
                                    ?>

                                <?php
                            }
                                ?>
                                    </div>
                        </div>
                    </div>
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