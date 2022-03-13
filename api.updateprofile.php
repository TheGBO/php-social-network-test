<?php
include 'assets/php/import.php';
include 'assets/php/db.php';
check_login();

if(isset($_POST['submit'])){
    $file = $_FILES['pfp-file'];

    $file_name = $_FILES['pfp-file']['name'];
    $file_tmp_name = $_FILES['pfp-file']['tmp_name'];
    $file_size = $_FILES['pfp-file']['size'];
    $file_type = $_FILES['pfp-file']['type'];
    $file_error = $_FILES['pfp-file']['error'];

    $file_ext = explode('.',$file_name);
    $file_actual_ext = strtolower(end($file_ext));
    $allowed = array('jpg','jpeg','png');

    if(in_array($file_actual_ext, $allowed)){
        if($file_size < 500000){
            $file_name_new = uniqid('',true).".".$file_actual_ext;
            $file_destination = "./data/uploads/profilepics/".$file_name_new;

            $stmt = mysqli_query($conn, "SELECT profile_picture FROM users WHERE id = ".$_SESSION['id']);
            $result = mysqli_fetch_array($stmt);
            
            $oldpfp = $result['profile_picture'];
            if($oldpfp != null){
                unlink($oldpfp);
            }

            move_uploaded_file($file_tmp_name, $file_destination);

            $sql = "UPDATE users SET profile_picture = '$file_destination' WHERE id = ".$_SESSION['id'];
            mysqli_query($conn, $sql);

        }else{
            echo 'file too big!';
        }
    }else{
        echo 'Unallowed extension: '.$file_actual_ext;
    }
}
header("Location: profile.php?id=".$_SESSION['id']);