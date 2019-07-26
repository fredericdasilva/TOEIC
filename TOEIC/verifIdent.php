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
	$flag = 0;
	$user = $_POST['login'];
	$mdp = $_POST['mot2passe'];
	$erreur = verif_id($user, $mdp);
	
	if ($erreur == 1)
	{
		$message = "Identifiant et/ou mot de passe incorrect";
		$flag = 1;
	}else if ($erreur == 2)
	{
		$message = "Votre compte n'est pas activé, si vous venez de vous inscrire pensez à cliquer sur le lien d'activation reçu par mail.";
		$flag = 1;
	}
}
?>
<html>
<head>
<title>Identification - TOEIC</title>
<link title="style" type="text/css" rel="stylesheet" href="../css/styles.css">
</head>
<body>
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