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
    <script src="assets/js/postApi.js"></script>
</head>
<body>
    <form id="post-form" class="create-post-form">
        <textarea name="content" class="big-input" spellcheck="false" id="pf__content"></textarea>
        <input type="button" onclick="submitPost()" class="styled-btn" value="Post"></input>
    </form>
    <main class="posts-container" id="feed-posts-container">
        
    </main>
    <div class="spacer">
        <br><br><br><br>
    </div>
    <?php footer_import(); ?>
    <script>
        getPosts();
    </script>
</body>
</html>
