<?php 
session_start();

require __DIR__.'/users/users.php';

if(is_authenticated()){
    redirect('all.php');
    die();
}


/*if(!isset($_GET['id'])){
    include "partials/not_found.php";
    exit;
}*/

//$userId = $_GET['id'];
//$userId = filter_input(INPUT_GET,'id',FILTER_VALIDATE_INT);

//$user = getUsersById($userId);

/*if(!$user){
    include "partials/not_found.php";
    exit;
};*/

//if(isset($_POST['login'])){
   // print_r($_POST);
//};

if($_SERVER['REQUEST_METHOD']== 'POST'){
   // print_r ($_POST);
   $email = filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL);
   $password = $_POST['password'];

//compare with data store

if(aunthenticate_user($email,$password)){
    $_SESSION['email'] = $email;
    redirect('all.php');
    
}else{
    $status = 'the privided credentials didnt not work';
    //echo '<script language="javascript">alert("the privided credentials didnt not work");</script>';
}


   if($email==false){
       $status = 'Please enter a valid email adress';
   };
  // print_r($_POST);
}
include 'partials/header.php';

/*<div class="row">
        <?php echo $user['name' ]?>
    </div>*/
?>
<div class="container card text-white bg-warning"  style="width: 400px">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1>Login</h1>

        </div>
    </div>
    
    <div class="row justify-content-center">
    <form action="" method="POST">
        <div class="form-group">
            <label for="email">Email: </label>
            <input type="text" name="email" id="email"  class="form-control" />
        </div>
        <div class="form-group">
            <label for="password">Password: </label>
            <input type="password" name="password" id="password"  class="form-control" />
        </div>
        <div class="form-group">
            <input type="submit" value="Login" name="login">
        </div>

    </form>
    </div>
    <div class="row">
    
        <?php  
        if(isset($status)){
            echo $status;
        }
        ?>
        
    </div>
</div>

<?php include 'partials/footer.php';?>