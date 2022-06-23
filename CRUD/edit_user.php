<?php include "connection.php"?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <?php
    if(isset($_GET['edit_user'])){
        $the_user_id = $_GET['edit_user'];
        
            $query = "SELECT * FROM users WHERE user_id = $the_user_id ";
            $select_users_query = mysqli_query($connection, $query);
    
            while($row = mysqli_fetch_assoc($select_users_query)){
                $user_id = $row['user_id'];
                $user_name = $row['user_name'];
                $user_email = $row['user_email'];
                $password = $row['password'];
                $role = $row['role'];
            }
        }
        if(isset($_POST['edit_user'])){
    
            $UserName = $_POST['UserName'];
            $user_email = $_POST['user_email'];
            $user_role = $_POST['user_role'];
            $user_password = $_POST['user_password'];
            
            $hashed_password = sha1($user_password);
            
      
              $query = "UPDATE users SET ";
              $query .= "user_name = '{$UserName}', ";
              $query .= "user_email = '{$user_email}', ";
              $query .= "role = '{$user_role}', ";
              $query .= "password = '{$hashed_password}' ";
              $query .= "WHERE user_id =$user_id  "; 
          
  
              $update_user_query = mysqli_query($connection,$query);
  
             header("Location:users.php");

      }

    ?>
      <form action="" method="post" enctype="multipart/form-data">
    <div >
        <label for="title">UserName</label>
        <input type="text" value="<?php echo  $user_name ?>"  name="UserName">
    </div>
    <div>
        <label for="title">Email</label>
        <input type="text" value="<?php echo $user_email ?>"  name="user_email">
    </div>
    <div >
        <label for="title">user Role</label>
        <input type="text" value="<?php echo $role ?>"  name="user_role">
    </div>
    <div >
        <label for="title">user_password</label>
        <input type="password" value="<?php echo $password ?>" name="user_password">
    </div>
    <div >
        <input type="submit"  name="edit_user" value="Edit User">
    </div>
</form>
</body>
</html>