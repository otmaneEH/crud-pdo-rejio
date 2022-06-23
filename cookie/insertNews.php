<?php
$message = "";
if( isset($_POST['submit_data']) ){
	// Includs database connection
	include ('db.php');
	// Gets the data from post
	$titre = $_POST['titre'];
	$contenue = $_POST['contenue'];
	$query = "INSERT INTO ARTICLE (titre, contenue, `date`) VALUES ('$titre', '$contenue', '".date('Y-m-d H:i:s')."')";
	if($db->exec($query))
		$message = "Bien ajouté";
	else
		$message = "Error d'ajout";
}
?>
<html>
<head>
	<title>Insert News</title>
</head>
<body>
	<div style="width: 500px; margin: 20px auto;">
		
		<!--  message-->
		<div><?php echo $message;?></div>

		<table width="100%" cellpadding="5" cellspacing="1" border="1">
			<h1>AJOUTER:</h1>
			<form action="" method="post">
				<tr>
					<td>Titre :</td>
					<td><input name="titre" type="text"></td>
				</tr>
				<tr>
					<td>Contenu :</td>
					<td><input name="contenue" type="text"></td>
				</tr>
				<tr>
					<td><a href="home.php">retour a la une</a></td>
					<td><input name="submit_data" type="submit" value="Insert Data"></td>
				</tr>
			</form>
		</table>
	</div>
</body>
</html>