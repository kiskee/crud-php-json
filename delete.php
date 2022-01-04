<?php
session_start();
include 'partials/header.php';
require __DIR__.'/users/users.php';
ensure_user_is_authenticated();
if(!isset($_GET['id'])){
    include "partials/not_found.php";
    exit;
}

$userId = $_GET['id'];
deleteUser($userId);
//$user = getUsersById($userId);

//if(!$user){
//    include "partials/not_found.php";
//    exit;
//}

//session_unset();
//session_destroy();
redirect('all.php');




?>