<?php
include("fonctions.php");

// On appelle la session
session_start();
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Accueil</title>
</head>


<?php
	if (empty($_SESSION['login_user'])) { ?>
		<div class="titreErreur">Erreur de session, vous allez être redirigé automatiquement</div>
		<meta http-equiv="refresh" content="2; url=index.php"/>
<?php } else { 
		echo 'Bienvenue, ' .$_SESSION['login_user'] ; ?>
<table>
<th>Choisissez le type d'exercice que vous voulez faire</th>
<tr><td>
<form method=POST>
  <select>
<?php

$res = requete("SELECT * FROM type_exo");
while($val=mysql_fetch_array($res)) {
   echo "<option id=\"".$val["id_type_exo"]."\">".$val["nom_type_exo"]."</option>\n";

}

?>
   </select>
</form>
</td>
</tr>
</table>
<?php } ?>
<body>
</body>
</html>
