<?php
$hostname="localhost";
  $dsn = 'mysql:host=localhost;dbname=crude';
  $dbusername = 'root';
  $dbpassword = '';
//   try {
//   $connection = new PDO($dsn, $username, $password,[]) ;
//   }
//   catch(PDOException $e) {
//   };
// if($connection){
//     echo "<h1>connection</h1>";
// }else{
//     echo " not connection";


// }
$connection =new mysqli($hostname,$dbusername,$dbpassword,"crud");
if(!$connection)echo " not connection";


