<?php
    include 'assets/php/db.php';
    include 'assets/php/import.php';
    check_login();
    $safeid = mysqli_real_escape_string($conn,$_GET['id']);
    $result = mysqli_query($conn, "SELECT * FROM users WHERE id='$safeid'");
    $usr_arr = mysqli_fetch_array($result);

    $ismyprofile = $usr_arr['id'] == $_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>Document</title>
</head>
<body>
    <div class="profile-info">
        <?php
            if(isset($usr_arr['profile_picture'])){
                echo '<img src="'.$usr_arr['profile_picture'].'" class="profile-pfp">';
            }else{
                echo '<img src="./assets/img/defaultpfp.png" class="profile-pfp">';
            }
        ?>
        
        <h1 class="profile-name"><?php echo $usr_arr['username'] ?></h1>
    </div>
    <form action="uploadProfile.php" method="post" enctype="multipart/form-data">
        <input type="file" name="pfp-file" id="">
        <button type="submit" class="styled-btn" name="submit">Update Profile Picture</button>
    </form>
    <?php footer_import(); ?>
</body>
</html>
