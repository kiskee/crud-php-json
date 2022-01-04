<?php  
session_start();
include 'partials/header.php';
require __DIR__.'/users/users.php';

$user=[
    'id' => '',
    'name' => '',
    'username' => '',
    'email' => '',
    'phone' => '',
    'website' => '',
    'password' => '',


];






?>

<?php  include 'form.php'; ?>



<?php include 'partials/footer.php';?>




           
