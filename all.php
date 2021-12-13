<?php 
session_start();
require __DIR__.'/users/users.php';
ensure_user_is_authenticated();
$users = getUsers();

include 'partials/header.php';
?>

<div class="container">
    <p>
        <a class="btn btn-outline-success"  href="create.php">Create new User</a>
    </p>
<table class="table table-hover table-dark">
    <thead class="table-info">
        <tr>
            <th>Name</th>
            <th>UserName</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Website</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($users as $user ):?>
        <tr>
            <!--<td>
            <?php if(isset($user['extension'])): ?> 
                <img style="width:60px"src="<?php echo "users/images/${user['id']}" ?>" alt="">
            <?php endif; ?>
            </td>-->
            <td><?php echo $user['name'] ?></td>
            <td><?php echo $user['username'] ?></td>
            <td><?php echo $user['email'] ?></td>
            <td><?php echo $user['phone'] ?></td>
            <td>
                <a target="_blank" href="http://<?php echo $user['website'] ?>">
                    <?php echo $user['website'] ?>
                    </a>
            </td>
            <td>
                <a href="view.php?id=<?php echo $user['id'] ?>" class="btn btn-sm btn-success">View</a>
                <a href="update.php?id=<?php echo $user['id'] ?>" class="btn btn-sm btn-info">Update</a>
                <a href="delete.php?id=<?php echo $user['id'] ?>" class="btn btn-sm btn-danger">Delete</a>
                
                
            </td>
        </tr>
        <?php endforeach;  ?>
    </tbody>



</table>
</div>
    
<?php include 'partials/footer.php';?>