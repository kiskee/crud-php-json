<?php
session_start();

require __DIR__.'/users/users.php';

ensure_user_is_authenticated();


echo $_SESSION['email'];

?>