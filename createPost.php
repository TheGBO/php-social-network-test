<?php
include 'assets/php/import.php';
include 'assets/php/db.php';
header('Content-Type: application/json; charset=utf-8');

check_login();

$message = array();

$content = @mysqli_real_escape_string($conn, htmlspecialchars($_POST['content']));
if(!is_null_or_empty_str($content)){
    $query = "INSERT INTO posts(owid, content) VALUES('{$_SESSION['id']}', '{$content}')";
    $stmt = mysqli_query($conn, $query);
    $message = json_encode(array('message' => 'post created','success' => true));
}else{
    $message = json_encode(array('message' => 'post not created','success' => false));
}
echo $message;

