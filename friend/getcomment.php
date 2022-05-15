<?php
$post_id = $row['id'];
$query1 = "SELECT c.user_name_comm, c.text ,u.first_name,u.last_name from comments c INNER JOIN user u on  c.user_name_comm = u.user_name WHERE post_id =$post_id";

$result1 = mysqli_query($conn, $query1);
while ($row1 = mysqli_fetch_assoc($result1)) {
    echo '<div class="card card-inner comment">';
    echo '<div class="card-body">';
    echo '<div class="row">';
    echo '<div class="col-md-10">';
    // echo "<h4 class='card-title'>" "</h4>"; 
    echo "<p><strong>" . "<a class='colorbtn' href='others_profile.php?username=" . $row1['uname'] . "</a>" . "</strong></p>";
    echo "<p>" . $row1['text'] . "</p>";
    echo '</div>';
    echo ' </div>';
    echo '</div>';
    echo '</div>';
}
