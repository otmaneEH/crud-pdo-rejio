
<?php
	if(isset($_GET['id'])) {
		// Includs database connection
		include "db.php";
		//get PERSONNEs:
		$res = $db->prepare("SELECT * FROM article where id = ".$_GET['id']." order by `date` desc");
		$res->execute();
		$results = $res->fetch();

		// get readed list if exist
		if(isset($_COOKIE['readed_list']))
			$r_list = unserialize($_COOKIE['readed_list']);
		else
			$r_list = array();

		// check if this article id in list or add it
		if(!in_array($_GET['id'], $r_list)) {
			array_push($r_list, $_GET['id']);
			setcookie('readed_list', serialize($r_list), time()+3600*24*30);
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<span><?php echo $results['titre'] ?></span>
</body>
</html>