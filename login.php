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
    session_start();

    if(isset($_POST['username']) && isset($_POST['password'])){
        $username = mysqli_escape_string($conn, $_POST['username']);
        $password = mysqli_escape_string($conn, $_POST['password']);
        
        $query = "SELECT * FROM users WHERE username = '{$username}' AND pass = '{$password}'";
        $result = mysqli_query($conn, $query);
        $authrows = mysqli_num_rows($result);
        if($authrows == 1){
            $usr_arr = mysqli_fetch_array($result);
            $_SESSION['auth'] = 1;
            $_SESSION['id'] = $usr_arr['id'];
            $_SESSION['username'] = $usr_arr['username'];
            $_SESSION['perms'] = $usr_arr['perms'];
            $_SESSION['profile_picture'] = $usr_arr['profile_picture'];
            header('Location: feed.php');
        }else{
            session_destroy();
            header('Location: login.php');
        }
        
    }
?>
