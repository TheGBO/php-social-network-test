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
    <div class="searchbar-header">
        <input type="text" placeholder="Search" class="styled-input" id="search-input">
        <button class="styled-btn" onclick="search()">Search</button>
    </div>
    <main id="search-results">
        
    </main>
    <?php footer_import(); ?>
    <script src="assets/js/discoverApi.js"></script>
</body>
</html>
