<?php
include 'assets/php/import.php';
include 'assets/php/db.php';

check_login();

$content = mysqli_real_escape_string($conn, htmlspecialchars($_POST['content']));
if(!is_null_or_empty_str($content)){
    $query = "INSERT INTO posts(owid, content) VALUES('{$_SESSION['id']}', '{$content}')";
    $stmt = mysqli_query($conn, $query);
}

header('Location: feed.php');
