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
    <h2>registration</h2>

<form action="" method="post" enctype="multipart/form-data">
    <div >
        <label for="title">UserName</label>
        <input type="text" value=""  name="UserName">
    </div>
    <div>
        <label for="title">Email</label>
        <input type="email" value=""  name="user_email">
    </div>
    <div >
        <label for="title">user_password</label>
        <input type="password" value="" name="user_password">
    </div>
    <div >
        <input type="submit"  name="creat_user" value="creat user">
    </div>
</form>
<?php 
        if(isset($_POST['creat_user'])){
    
            $UserName = $_POST['UserName'];
            $user_email = $_POST['user_email'];
            $user_role = $_POST['user_role'];
            $user_password = $_POST['user_password'];
              
            $hashed_password = sha1($user_password);
           
              $query = "INSERT INTO users(user_name,user_email,password,role) ";
              $query .= "VALUES('{$UserName}','{$user_email}','{$hashed_password}','subscriber' )";
              
              $creat_user_query = mysqli_query($connection,$query);

              header("Location:login.php");
        }
    ?>
</body>
</html>