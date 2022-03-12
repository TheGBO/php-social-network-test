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
    <form action="createPost.php" class="create-post-form" method="POST">
        <textarea name="content" class="big-input" spellcheck="false"></textarea>
        <button type="submit" class="styled-btn">Post</button>
    </form>
    <main class="posts-container">
        <div class="post">
            
        </div>
    </main>
    <?php footer_import(); ?>
</body>
</html>
