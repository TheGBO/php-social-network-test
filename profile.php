<?php
    include 'assets/php/db.php';
    include 'assets/php/import.php';
    check_login();
    $result = mysqli_query($conn, "SELECT * FROM users WHERE id=".$_GET['id']);
    $usr_arr = mysqli_fetch_array($result);
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
    <?php footer_import(); ?>
</body>
</html>
