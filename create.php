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

if($_SERVER['REQUEST_METHOD'] == 'POST'){
$user = createUser($_POST);

uploadImage($_FILES['picture'], $user); 


   


// echo '<pre>';
//var_dump();
// echo '</pre>';
redirect('all.php');
}




?>

<?php  include 'form.php'; ?>



<?php include 'partials/footer.php';?>




           
