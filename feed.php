<?php
    include 'assets/php/import.php';
    include 'assets/php/db.php';
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
    <form action="createPost.php" class="create-post-form" method="POST">
        <textarea name="content" class="big-input" spellcheck="false"></textarea>
        <button type="submit" class="styled-btn">Post</button>
    </form>
    <main class="posts-container">
    <?php
        $stmt = mysqli_query($conn, "SELECT * FROM posts LEFT JOIN users ON posts.owid = users.id");
        while ($nr = mysqli_fetch_array($stmt)){
            $pfp = "./assets/img/defaultpfp.png";
            if(isset($nr['profile_picture'])){
                $pfp = $nr['profile_picture'];
            }

            echo 
            '
            <div class="post">
                <img src="'.$pfp.'" class="profile-pfp">
                <h3 class="post-profile-name">'.$nr['username'].'</h3>
                <p class="post-content">'.$nr['content'].'</p>
            </div>
            <br>
            ';
        }
    ?>
    </main>
    <br><br><br>
    <?php footer_import(); ?>
</body>
</html>
