<?php
    include 'assets/php/import.php';
    include 'assets/php/db.php';
    check_login();

    $post_arr = array();

    $stmt = mysqli_query($conn, "SELECT posts.id, owid, username, profile_picture, content FROM posts LEFT JOIN users ON posts.owid = users.id ORDER BY posts.id desc");
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
?>