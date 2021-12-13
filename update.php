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

$user = getUsersById($userId);

if(!$user){
    include "partials/not_found.php";
    exit;
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $user = updateUser($_POST,$userId);

   
    uploadImage($_FILES['picture'], $user); 


       
    

   // echo '<pre>';
    //var_dump();
   // echo '</pre>';
    redirect('all.php');
    
}




?>

    <?php  include 'form.php'; ?>
            