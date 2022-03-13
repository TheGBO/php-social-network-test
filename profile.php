<?php
    include 'assets/php/import.php';
    check_login();
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
    <div class="profile-info" id="profile-info">
        
    </div>
    <div class="profile-info">
        <div class="follow-btn" id="follow-btn" onclick="followProfile()">
            <span id="follower-count"></span>
            <span id="follow-action">Follow</span>
        </div>
    </div>
    <?php footer_import(); ?>
    <script src="./assets/js/profileApi.js"></script>
    <script>
        getProfileInfo();
    </script>
</body>
</html>
