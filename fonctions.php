<?

/*--------------------------------------------------------------------------------------
FONCTION D'AFFICHAGE DES ERREURS DE CONNEXION
--------------------------------------------------------------------------------------*/

function erreur($message)
{
 echo $message ;
 exit ;
}

/*--------------------------------------------------------------------------------------
FONCTION DE CONNEXION A LA BASE DE DONNEES
--------------------------------------------------------------------------------------*/
function connexion($database)
{
	$hote = "127.0.0.1";
	$user = "root";
	$mdp = "password";
	
	$connexion=mysql_connect($hote, $user, $mdp)
   		or die("Connexion au serveur impossible:".mysql_error());
		
	mysql_select_db($database, $connexion)
   		or die("Sélection de la BD impossible:".mysql_error());

}

/*--------------------------------------------------------------------------------------
FONCTION DE DECONNEXION A LA BASE DE DONNEES
--------------------------------------------------------------------------------------*/

function deconnexion()
{
 @mysql_close();
}


/*--------------------------------------------------------------------------------------
FONCTION DE D'EXECUTION D'UNE REQUETE
Entrée : 
  $requete : requete
Sortie :
  $resultat : résultat de la requete
  ou
  message d'erreur
--------------------------------------------------------------------------------------*/

 function requete($requete)
 {
 	if($resultat = mysql_query($requete))
	{
		return $resultat ;
	}
 	erreur("Erreur dans la requête : $requete<br>".mysql_error()); //remplacer $requete par un message
												
 }

/*--------------------------------------------------------------------------------------
FONCTION DE VERIFICATION DES IDENTIFIANTS SAISIS
Cette fonction retourne la variable $erreur.
$erreur = 0 si le mot de passe est correcte
$erreur = 1 sinon
--------------------------------------------------------------------------------------*/
function verif_id($user, $mdp)
{		
	$erreur = 0;
	$password = explode(" ",$mdp);
	$req = "SELECT * FROM user WHERE mdp_user = '$mdp' AND login_user = '$user'";
	$res = requete($req);
	$data = mysql_fetch_array($res);
	
	if (empty($data['mdp_user']))
	{	
		$erreur = 1;
	}
	else //OK, l'utilisateur existe on initialise la session
	{
	 session_start();
	 $_SESSION['login_user'] = $data['login_user'];
  	 $_SESSION['nom_user'] = $data['nom_user'];
     $_SESSION['prenom_user'] = $data['prenom_user'];

	}
		
	return $erreur;
}

/*--------------------------------------------------------------------------------------
FONCTION D'INITIALISATION DE LA SESSION
Cette fonction retourne la variable $erreur
$erreur = 1 si user non authentifié
$erreur = 0 si user authentifié
--------------------------------------------------------------------------------------*/

function initialisation_session($user)
{		
	$erreur = 1;
	$req = "SELECT * FROM user WHERE login_user = '$user'"; 
	$res = requete($req);
	$data = mysql_fetch_array($res);
	
	if(!empty($data))
	{
		session_start();
		$_SESSION['user'] = $user;
		$_SESSION['ouverte'] = "oui";
		echo "<meta http-equiv='refresh' content='0; url=accueil.php'>";
		$erreur = 0;
	}		

	return $erreur;
}

/*--------------------------------------------------------------------------------------
FONCTION DE MISE EN FORME DES NOTES
--------------------------------------------------------------------------------------*/

function miseEnForme($note)
{
	
	// On remplace la virgule par un point
	$pattern = Array("/,/");
	$rep_pat = Array(".");
	$note = preg_replace($pattern, $rep_pat, $note);

	// On ajoute un 0 devant la note si elle est inférieure à 10
	if (!empty($note))
	{
		$nbr = sprintf("%01.2f", $note);
		if($note < 10){
			$note = "0$nbr";
		}else{
			$note = "$nbr";
		}
	}
	return $note;
}
?>