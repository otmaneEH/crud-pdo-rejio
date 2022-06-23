<?php
require 'conn.php';

if(isset($_POST['forminscription'])) {
   $pseudo = htmlspecialchars($_POST['pseudo']);
   $mail = htmlspecialchars($_POST['mail']);
   $mail2 = htmlspecialchars($_POST['mail2']);
  $mdp1 =sha1($_POST['mdp1']);
  $mdp2 = sha1($_POST['mdp2']);
   if(!empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['mail2']) 
	  AND !empty($_POST['mdp1']) AND !empty($_POST['mdp2'])) {
      $pseudolength = strlen($pseudo);
      if($pseudolength <= 20) {
         if($mail == $mail2) {
            if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
               $reqmail = $bdd->prepare("SELECT * FROM membres WHERE mail = ?");
               $reqmail->execute(array($mail));
               $mailexist = $reqmail->rowCount();
               if($mailexist == 0) {
                  if($mdp1 == $mdp2) {
                     $insertmbr = $bdd->prepare("INSERT INTO membres(pseudo, mail, mdp) VALUES(?, ?, ?)");
                     $insertmbr->execute(array($pseudo, $mail, $mdp2));
                     $erreur = "Votre compte a bien été créé ! <a href=\"authentification.php\">Me connecter</a>";
                  } else {
                     $erreur = "Vos mots de passes ne correspondent pas !";
                  }
               } else {
                  $erreur = "Adresse mail déjà utilisée !";
               }
            } else {
               $erreur = "Votre adresse mail n'est pas valide !";
            }
         } else {
            $erreur = "Vos adresses mail ne correspondent pas !";
         }
      } else {
         $erreur = "Votre pseudo ne doit pas dépasser 20 caractères !";
      }
   } else {
      $erreur = "Tous les champs doivent être complétés !";
   }
}
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Espace membres</title>
</head>

<body> <div align="center">
		 <h2> Inscription<h2/>
         <br/> <br/>
<form method="POST" action="">
         <table>
         	<tr>
         		<td align="right">
                <label for="pseudo">Pseudo:</label>
         		</td>
         		<td>
                <input type="text" placeholder="Votre pseudo" id="pseudo" name="pseudo" value="<?php if(isset($pseudo)){echo $pseudo;}?>"/>
                 </td>
         	</tr>
         
         
			<tr>
         		<td align="right">
                <label for="mail">Mail:</label>
         		</td>
         		<td>
                <input type="email" placeholder="Votre mail" id="mail" name="mail" value="<?php if(isset($mail)){echo $mail;}?>"/>
                 </td>
         	</tr>         
            <tr>
         		<td align="right">
                <label for="mail">Confirmation mail:</label>
         		</td>
         		<td>
                <input type="email" placeholder="Confirmez votre mail mail" id="mail2" name="mail2" value="<?php if(isset($mail2)){echo $mail2;}?>"/>
                 </td>
         	</tr>
            <tr>
         		<td align="right">
                <label for="mail">Mot de passe:</label>
         		</td>
         		<td>
                <input type="password" placeholder="Votre password" id="mdp1" name="mdp1" value="<?php if(isset($mdp1)){echo $mdp1;}?>"/>
                 </td>
         	</tr> 
             <tr>
         		<td align="right">
                <label for="mail">Confirmation password:</label>
         		</td>
         		<td>
                <input type="password" placeholder="Confirmez password" id="mdp2" name="mdp2" value="<?php if(isset($mdp2)){echo $mdp2;}?>"/>
                 </td>                      
         	</tr> 
            <tr>
            <br/><br/>
            <td></td>
            <td align="center">
            <input type="submit" name="forminscription" value="Je m'inscrit"/>
            </td>
            </tr>
         </table>      
         </form>
         <?php if(isset($erreur)){
         			echo '<font color="red">'.$erreur."</font>";
         		 }
		 ?>	
         
</body>
</html>