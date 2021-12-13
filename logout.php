<?php

session_start();
session_unset();
session_destroy();
require __DIR__.'/users/users.php';


redirect('index.php')


?>