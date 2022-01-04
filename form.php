

<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>
                <?php  if($user['id']):  ?>
                Update user: <?php echo $user['name'] ?>
                <?php else: ?>
                Create New User
                <?php endif ?>
            </h3>
        </div>
        <div class="card-body">


<form  method="POST" enctype="multipart/form-data"    action="">
                <div class="form-group">
                    <label>Name</label>
                    <input name="name" value="<?php echo $user['name'] ?>" class="form-control" >
                    <span class="error">* <?php echo $nameErr;?></span>
                    <div class="row">
    
                   
                    
                </div>
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input name="username" value="<?php echo $user['username'] ?>" class="form-control" >
                    
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input name="email" value="<?php echo $user['email'] ?>" class="form-control" >
                    <span class="error">* <?php echo $emailErr;?></span>
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input name="phone" value="<?php echo $user['phone'] ?>" class="form-control" >
                </div>
                <div class="form-group">
                    <label>Website</label>
                    <input name="website" value="<?php echo $user['website'] ?>" class="form-control" >
                    <span class="error"><?php echo $websiteErr;?></span>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input name="password" value="<?php echo $user['password'] ?>" class="form-control" >
                    
                    <?php  
                    if(isset($errorPass)){
                        echo $errorPass;
                    }
                    ?>
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <input name="picture" type="file"  class="form-control" >
                </div>
                
                <button class="btn btn-success">Submit</button>

</form>

</div>
    </div>
</div>




