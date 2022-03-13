<?php

function footer_import(){
    include 'assets/php/footer.php';
}

function is_null_or_empty_str($str){
    return ($str === null || trim($str) === '');
}

function check_login(){
    include './assets/php/checkLogin.php';
}

function sanitize($conn, $str){
    return mysqli_real_escape_string($conn,htmlspecialchars(trim($str)));
}