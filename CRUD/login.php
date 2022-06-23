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
<h2>Login</h2>
    <div>
        <form id="login-form" role="form" autocomplete="off"  method="post">
            <div>
                <div>
                    <input name="username" type="text"  placeholder="Enter Username">
                </div>
            </div>
            <div>
                <div class="input-group">
                    <input name="password" type="password"  placeholder="Enter Password">
                </div>
            </div>
            <div>
                <input name="login"  value="Login" type="submit">
            </div>
        </form>
        <?php
        if(isset($_POST['login'])){
            $username = $_POST['username'];
            $password = $_POST['password'];

            $hashed_password = sha1($password);

            $query = "SELECT * FROM users WHERE user_name = '{$username}'";

            $select_user = mysqli_query($connection,$query);

            while($row = mysqli_fetch_assoc($select_user)){
                $db_username = $row['user_name'];
                $db_password = $row['password'];

                if($username == $db_username and $hashed_password == $db_password){
                    header("Location:users.php");
                }else{
                    header("Location:login.php");
                }
            }

        }
        ?>
</body>
</html>