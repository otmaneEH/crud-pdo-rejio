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
<div class='center'>
    <a href='' class='buttons'>rechercher</a>
    <a href='add_user.php' class='buttons'>add user</a>
</div>



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
            $query = "SELECT * FROM users";
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

            if(isset($_GET['delete'])){
                $the_user_id = $_GET['delete'];
                
                $query = "DELETE FROM users WHERE user_id=$the_user_id";
                $delete_query = mysqli_query($connection, $query);
                header("location: users.php");
            }
                

            ?>
        </tbody>
    </table>
</body>
</html>