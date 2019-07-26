<?
include("fonctions.php");

$flag = 0;
if (!isset($_POST['login']))
{
	$message = "INTERDIT...";
	$flag = 1;
}
else
{	
	$database = "toeic";
	$flag = 0;
	$user = $_POST['login'];
	$mdp = $_POST['mot2passe'];
	connexion($database);
	$erreur = verif_id($user, $mdp);
	
	if ($erreur)
	{
		$message = "Identifiant et/ou mot de passe incorrect";
		$flag = 1;
	}
}
?>
<html>
<head>
<title>Identification - TOEIC</title>
<link title="style" type="text/css" rel="stylesheet" href="../css/styles.css">
</head>
<body id="background">
<?

if ($flag)
{ ?>
	<div class="titreErreur"><? echo $message; ?></div>
	<meta http-equiv="refresh" content="4; url=index.php"/>
	<?
}
else
{?>
	<div class="titre2">Connexion en cours ...</div>
	<meta http-equiv="refresh" content="2; url=accueil.php"/>
<?
} ?>
</body>
</html>