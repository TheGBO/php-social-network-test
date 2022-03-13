<?php

include 'assets/php/import.php';
include 'assets/php/db.php';
check_login();

header('Content-Type: application/json; charset=utf-8');

$my_id = $_SESSION['id'];
$profile_id = sanitize($conn, $_GET['id']);

if(isset($_GET['follow'])){
    $query = "INSERT INTO followers(followed_id, follower_id) VALUES('$profile_id','$my_id')";
    $result = mysqli_query($conn, $query);
    die();
}

if(isset($_GET['unfollow'])){
    $query = "DELETE FROM followers WHERE followed_id = '$profile_id' AND follower_id = '$my_id'";
    $result = mysqli_query($conn, $query);
    die();
}


$profile_sql = mysqli_query($conn, "SELECT id, username, profile_picture FROM users WHERE id = '$profile_id'");
$followers_sql = mysqli_query($conn, "SELECT count(*) FROM followers WHERE followed_id = '$profile_id'");


$prof_arr = mysqli_fetch_assoc($profile_sql);
$foll_arr = mysqli_fetch_array($followers_sql);


$is_my_profile = $my_id == $prof_arr['id'];
$prof_arr["follower_count"] = $foll_arr[0];

$im_following_sql = mysqli_query($conn, "SELECT * FROM followers WHERE followed_id = '$profile_id' AND follower_id = '$my_id'");
$followed_by_me = mysqli_fetch_array($im_following_sql) != NULL;
$prof_arr['followed_by_me'] = $followed_by_me;
$prof_arr['owned_by_me'] = $is_my_profile;

echo json_encode($prof_arr);

