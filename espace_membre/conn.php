<?php

$user='root';
$pass='';
$bdd = new PDO('mysql:host=127.0.0.1;
dbname=espace_membre1',
			   $user, $pass);

//ou bien

 /*   $user = 'root';
	$pw = '';
	$db = 'login3';
	$db1 = new mysqli('localhost',$user, $pw, $db) 
		or die("Impossible de se connecter!!!");  */
?>