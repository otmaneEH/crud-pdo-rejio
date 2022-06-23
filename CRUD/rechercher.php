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
    <form action="" method='post'>
        <div>
            <label for="name">Username</label>
            <input type="text" name='username'>
        </div>
        <div>
            <label for="email">Email</label>
            <input type="text" name="email" id="">
        </div>
        <div>
            <input type="submit" name='search'>
        </div>
    </form>
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>user_name</th>
                <th>email</th>
                <th>password</th>
                <th>role</th>
                <th>delete</th>
                <th>edit</th>
            </tr>
        </thead>
        <tbody>
    <?php 
        if(isset($_POST['search'])){
          $username = $_POST['username'];
          $email = $_POST['email'];

            if($email == "" and !empty($username)){
                $query = "SELECT * FROM users WHERE user_name LIKE'$username%'";
                $select_users = mysqli_query($connection,$query);

                while($row = mysqli_fetch_assoc($select_users)){
                    $user_id = $row['user_id'];
                    $user_name = $row['user_name'];
                    $user_email = $row['user_email'];
                    $password = $row['password'];
                    $role = $row['role'];
    
                    echo "<tr>";
                    echo "<td>{$user_id}</td>";
                    echo "<td>{$user_name}</td>";
                    echo "<td>{$user_email}</td>";
                    echo "<td>{$password}</td>";
                    echo "<td>{$role}</td>";
                    echo "<td><a class='delete' onClick=\"javascript: return confirm('Are you sure you want to delete this user')\" href='users.php?delete={$user_id}'>Delet</a></td>";
                    echo "<td><a class='edite' href='edit_user.php?edit_user={$user_id}'>Edit</a></td>";
                }
            }elseif ($username == "" and !empty($email)) {
                $query = "SELECT * FROM users WHERE user_name LIKE'$email%'";
                $select_users = mysqli_query($connection,$query);

                while($row = mysqli_fetch_assoc($select_users)){
                    $user_id = $row['user_id'];
                    $user_name = $row['user_name'];
                    $user_email = $row['user_email'];
                    $password = $row['password'];
                    $role = $row['role'];
    
                    echo "<tr>";
                    echo "<td>{$user_id}</td>";
                    echo "<td>{$user_name}</td>";
                    echo "<td>{$user_email}</td>";
                    echo "<td>{$password}</td>";
                    echo "<td>{$role}</td>";
                    echo "<td><a class='delete' onClick=\"javascript: return confirm('Are you sure you want to delete this user')\" href='users.php?delete={$user_id}'>Delet</a></td>";
                    echo "<td><a class='edite' href='edit_user.php?edit_user={$user_id}'>Edit</a></td>";
                }
            }elseif(!empty($email) and !empty($username)){
                $query = "SELECT * FROM users WHERE user_name LIKE'$username%' AND user_email LIKE '$email%'";
                $select_users = mysqli_query($connection,$query);

                while($row = mysqli_fetch_assoc($select_users)){
                    $user_id = $row['user_id'];
                    $user_name = $row['user_name'];
                    $user_email = $row['user_email'];
                    $password = $row['password'];
                    $role = $row['role'];
    
                    echo "<tr>";
                    echo "<td>{$user_id}</td>";
                    echo "<td>{$user_name}</td>";
                    echo "<td>{$user_email}</td>";
                    echo "<td>{$password}</td>";
                    echo "<td>{$role}</td>";
                    echo "<td><a class='delete' onClick=\"javascript: return confirm('Are you sure you want to delete this user')\" href='users.php?delete={$user_id}'>Delet</a></td>";
                    echo "<td><a class='edite' href='edit_user.php?edit_user={$user_id}'>Edit</a></td>";
                }
            }else{
                echo"<h1>!!!!!!!!!!!!!!!!</h1>";
            }
        }
    ?>
</body>
</html>