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


?>

<div class="container">
<div class="card">
    <div class="card-header text-center">
        <h3>View User: <?php echo $user['name']?></h3>
    </div>

    <div class="card-body text-center">
        <a  class="btn btn-secondary"  href="update.php?id=<?php echo $user['id'] ?>">Update</a>
        <a class="btn btn-danger"  href="delete.php?id=<?php echo $user['id'] ?>">Delete</a>
    </div>

<table class="table table-hover table-success">
    <tbody>
        <tr>
            <th>Name:</th>
            <td><?php echo $user['name']?></td>
        </tr>
        <tr>
            <th>Username:</th>
            <td><?php echo $user['username']?></td>
        </tr>
        <tr>
            <th>Email:</th>
            <td><?php echo $user['email']?></td>
        </tr>
        <tr>
            <th>Phone:</th>
            <td><?php echo $user['phone']?></td>
        </tr>
        <tr>
            <th>Website:</th>
            <td>
            <a target="_blank" href="http://<?php echo $user['website'] ?>">
                    <?php echo $user['website'] ?>
                    </a>
            </td>
        </tr>
    </tbody>
</table>
</div>
</div>


<?php include 'partials/footer.php';?>