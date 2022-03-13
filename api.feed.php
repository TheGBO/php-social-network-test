<?php

include 'assets/php/import.php';
include 'assets/php/db.php';
check_login();

$post_arr = array();
$my_id = $_SESSION['id'];

$stmt = mysqli_query($conn, 
    "SELECT posts.id, owid, username, profile_picture, content 
    FROM posts
    LEFT JOIN users ON posts.owid = users.id 
    RIGHT JOIN followers ON followers.followed_id = users.id AND followers.follower_id = '$my_id' 
    OR posts.owid = '$my_id'
    ORDER BY posts.id desc
");
while ($nr = mysqli_fetch_assoc($stmt)){
    $pfp = "./assets/img/defaultpfp.png";
    if($nr['profile_picture'] != null){
        $pfp = $nr['profile_picture'];
    }
    $nr['profile_picture'] = $pfp;

    $post_arr[] = $nr;
}
header('Content-Type: application/json; charset=utf-8');
echo json_encode($post_arr);