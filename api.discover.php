<?php
include 'assets/php/import.php';
include 'assets/php/db.php';

header('Content-Type: application/json; charset=utf-8');

check_login();

if(is_null_or_empty_str($_GET['q'])){
    echo json_encode(array("message" => "error, no query set"));
    exit();
}

$search = mysqli_real_escape_string($conn, "%".trim($_GET['q'])."%");
$query = "SELECT id, username, profile_picture FROM users usr WHERE usr.username LIKE '$search'";
$results = mysqli_query($conn, $query);

$data = array();

while($row = mysqli_fetch_assoc($results)){
    $data["users"][] = $row;
}

echo json_encode($data);