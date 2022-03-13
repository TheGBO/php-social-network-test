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
        <form action="" method="post" >
            <input type="text" class="styled-input" name="username" placeholder="user name">
            <input type="password" class="styled-input" name="password" placeholder="password">
            <button type="submit" class="styled-btn">Register</button>
        </form>
    </div>
</body>
</html>

<?php
    include_once './assets/php/import.php';

    if(isset($_POST['username'])){
        if(!is_null_or_empty_str($_POST['username']) && !is_null_or_empty_str($_POST['password'])){
            session_start();
            include 'assets/php/db.php';
            $username = sanitize($conn, trim($_POST['username']));
            $password = sanitize($conn, trim($_POST['password']));
            
            $query = "SELECT * FROM users WHERE username = '{$username}'";
            $result = mysqli_query($conn, $query);
            $authrows = mysqli_num_rows($result);
        
            if($authrows == 1){
                $_SESSION['msg'] = "username Already Exists";
                header('Location: register.php');
            }else{
                $query = "INSERT INTO users(username, pass, perms) VALUES('{$username}','{$password}',0)";
                if(mysqli_query($conn, $query)){
                    $_SESSION['register_status'] = true;
                    header('Location: login.php');
                }
            }
        }
    }
?>
