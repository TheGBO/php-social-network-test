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
    <div class="center-div">
        <form action="" method="post">
            <input type="text" class="styled-input" name="username" placeholder="user name">
            <input type="password" class="styled-input" name="password" placeholder="password">
            <button type="submit" class="styled-btn">Login</button>
        </form>
    </div>
</body>
</html>

<?php
    include 'assets/php/db.php';
    if(isset($_POST['username']) && isset($_POST['password'])){
        $username = mysqli_escape_string($conn, $_POST['username']);
        $password = mysqli_escape_string($conn, $_POST['password']);
        echo $username;
    }
?>
