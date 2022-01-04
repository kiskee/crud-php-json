<?php 


function getUsers(){
   return json_decode(file_get_contents(__DIR__ . '/users.json'), true);
  

}

function getUsersById($id){

    $users = getUsers();
    foreach ($users as $user){
        if($user['id']==$id){
            return $user;
        }
        
    }
    return null;

}

function createUser($data){
    $users = getUsers();
    $data['id'] = rand(1000000,20000000);
    $users[]= $data;

    putJson($users);    

    return $data;

}
function updateUser($data,$id){
    $updateUser = [];
    $users = getUsers();
    foreach ($users as $i => $user){
        if($user['id']==$id){

            $users[$i] = $updateUser = array_merge($user,$data);
        }
        
    }
putJson($users);
    
    return $updateUser;
}



function deleteUser($id){

    $users = getUsers();

    foreach ($users as $i => $user){
        if ($user['id'] == $id){
            //array_splice($users, $i, 1);
            unset($users[$i]);
        }
    }

    putJson($users);     

}

 


function aunthenticate_user($email,$password){
    $users = getUsers();
    foreach($users as $user){
       // $user_name = $user['email'];
       // $pass = $user['password'];
        //return $email == $user_name && $password == $pass;
        if($email==$user['email'] && $password==$user['password']){
             $username = $user['email'];
            $password = $user['password'];   
            return $email == $username && $password == $password;

        }
    }
    return null;
    //return $email == USER_NAME && $password == PASSWORD;
   
    
    
}

function redirect ($url){
    header("Location: $url");
}

function is_authenticated(){
    return isset($_SESSION['email']);
}

function ensure_user_is_authenticated(){
    if(!is_authenticated()){
        redirect('index.php');
    }
}


function   uploadImage($file,$user){

    if(isset($_FILES['picture']) && $_FILES['picture']['name']){


    if(!is_dir(__DIR__."/images")){
        mkdir(__DIR__."/images");
    }
    //get the file extension from filename
    $fileName = $file['name'];
    //search for the dot in the filename
    //$dotPosition = strpos($fileName,'.');
    $dot = explode('.',$fileName);
    //take  the substring  from the dot position till the end of the string
    $extension = end($dot);

    move_uploaded_file($_FILES['picture']['tmp_name'],__DIR__."/images/${user['id']}.$extension");

    $user['extension'] = $extension;
    updateUser($user,$user['id']);
};
}

function putJson($users){
    file_put_contents(__DIR__ . '/users.json', json_encode($users,JSON_PRETTY_PRINT));

}

function validatePass($password){
    if(preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z])(?=.*[*-.]).{6,}$/g',$password)){
        
        return true;   
    }
}






?>