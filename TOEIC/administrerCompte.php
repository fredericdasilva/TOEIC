<?php
include("fonctions.php");

// On appelle la session
session_start();
//recuperation des parametres
if (isset($_POST['id_choix']))
{
	if  ($_POST['id_choix'] != 'false')
	{
		$res3 = requete ("SELECT * FROM user WHERE id_user = '".$_POST['id_choix']."'");
		$data = mysql_fetch_array($res3);
		$message = 'Compte : '.$data['login_user'];
		$message .= '<form name="formulaire" action="validerInscription.php" method="post" onSubmit="return verif_formulaire()">
		  <table width="100%" border="0" cellspacing="1" cellpadding="1">
		<tr> 
                       <td height="20" width="180" bgcolor="#80A0C6" class="forTexts"><font color="#FFFFFF">Login :</font></td> 
                <td height="20" class="forTexts"><input type="text" name="login" value="'.$data['login_user'].'"></td> 
                    </tr>
					<tr> 
                      <td height="20" width="180" bgcolor="#80A0C6" class="forTexts">
		      <font color="#FFFFFF">Mot de passe :</font></td>
		      <td height="20" class="forTexts"><input type="password" name="mdp" value="'.$data['mdp_user'].'"></td>
                    </tr>
		    <tr valign="middle"> 
                      <td height="20" width="150" bgcolor="#80A0C6" class="forTexts">
		      <font color="#FFFFFF">Confirmer mot de passe :</font></td>
		      <td height="20" class="forTexts"><input type="password" name="mdp2" value="'.$data['mdp_user'].'"></td>
                    </tr>
					<tr> 
               <td height="20" width="180" bgcolor="#80A0C6" class="forTexts">
		      <font color="#FFFFFF">Nom :</font></td>
		      <td height="20" class="forTexts"><input type="text" name="nom" value="'.$data['nom_user'].'"></td>
              </tr>
			<tr> 
                      <td height="20" width="180" bgcolor="#80A0C6" class="forTexts">
		      <font color="#FFFFFF">Prénom :</font></td>
		      <td height="20" class="forTexts"><input type="text" name="prenom" value="'.$data['prenom_user'].'"></td>
                    </tr>
		    <tr>
     		      <td align="center"></br><input type="submit" value="Modifier"></td>
				  <input type="hidden" name="modification" value="1">
                  </table>
		  </form>';
	}
}else
{
	$result = "";
	$res2 = requete("SELECT * FROM user");
	while($val=mysql_fetch_array($res2)) {
  		$result .= "<option value=\"".$val["id_user"]."\">".$val["login_user"]."</option>";
	}
	$message = '<form action="administrerCompte.php" method="POST">
<select name = "id_choix" onchange="submit()"><option value="false" selected>Sélectionner un compte</option>';
}

//liste menu
$res = requete("SELECT * FROM type_exo");
//liste comptes
$res1 = requete("SELECT * FROM user");
?>

<html>
<head>
<title>TOEIC</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="forAll.css" rel="stylesheet" type="text/css">

<?php
	if (empty($_SESSION['login_user'])) { ?>
		<div class="titreErreur">Erreur de session, vous allez être redirigé automatiquement</div>
		<meta http-equiv="refresh" content="2; url=index.php"/>
<?php } else { 
		 ?>
<script type="text/javascript">
<!--
function verif_formulaire()
{
 if(document.formulaire.login.value == "")  {
   alert("Veuillez entrer votre login!");
   document.formulaire.login.focus();
   return false;
  }
 if(document.formulaire.mdp.value == "") {
   alert("Veuillez entrer votre mdp!");
   document.formulaire.mdp.focus();
   return false;
  }
 if(document.formulaire.mdp2.value == "") {
   alert("Veuillez confirmer votre mdp!");
   document.formulaire.mdp2.focus();
   return false;
  }
 if(document.formulaire.mdp.value != document.formulaire.mdp2.value) {
   alert("Les mots de passe ne sont pas identiquent");
   document.formulaire.mdp.focus();
   return false;
  }
 if(document.formulaire.nom.value == "") {
   alert("Veuillez entrer votre nom!");
   document.formulaire.nom.focus();
   return false;
  }
 if(document.formulaire.prenom.value == "") {
   alert("Veuillez entrer votre pénom!");
   document.formulaire.prenom.focus();
   return false;
  }
  return true;
 }
  //-->
</script>
</head>

<?php //récupération des paramètres

?>

<body background="images/bg.gif" link="#003399" vlink="#0044D2" alink="#FF3300" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="760" height="100%" border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td height="70" background="images/top_bg.gif" valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td width="50%"><STRONG>ENTRAINEMENT AU TOEIC<STRONG></td>
          <td width="50%" align="right">&nbsp;</td>
        </tr>
      </table></td>
  </tr>
  <tr> 
    <td height="22" background="images/menu_bg.gif" class="forTexts"><div align="right">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
           
            <td class="forTexts" align="center">|&nbsp;&nbsp;&nbsp;&nbsp;Utilisateur authentifié : <?php echo $_SESSION['login_user']; ?>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;<a href="deconnexion.php">Déconnexion</a> &nbsp;&nbsp;&nbsp;&nbsp;|</td>
          </tr>
        </table>
      </div></td>
  </tr>
  <tr> 
    <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="2">
        <tr> 
          <td width="170" valign="top"> 
            <table width="100%" border="0" cellspacing="1" cellpadding="1">
              <tr> 
                <td bgcolor="#4F7DB0" class="forTexts">&nbsp;</td>
                <td bgcolor="#D9E3EE" class="forTexts">&nbsp;<a href="accueil.php">Accueil</a></td>
              </tr>
              <tr> 
                <td bgcolor="#4F7DB0" class="titreMenu" colspan="2">&nbsp;Types d'exercice</td>
              </tr>
		<?php
		//affichage du menu
		while($val=mysql_fetch_array($res)) {
   		echo "<tr><td bgcolor=\"#4F7DB0\" class=\"forTexts\">&nbsp;</td>
                <td bgcolor=\"#D9E3EE\" class=\"forTexts\">&nbsp;<a href=\"typeExo.php?id=".$val["id_type_exo"]."\">".$val["nom_type_exo"]."</a></td></tr>";
		}?>
	      <tr><td bgcolor="#4F7DB0" class="titreMenu" colspan="2">&nbsp;</td></tr>
              <tr>
                <td bgcolor="#4F7DB0" class="forTexts">&nbsp;</td>
				<?php
				if ($_SESSION['group'] == 'admin')
				{
					echo "<td bgcolor=\"#D9E3EE\" class=\"forTexts\">&nbsp;<a href=\"administrerCompte.php\">Gérer comptes</a></td>";
					echo "<tr><td bgcolor=\"#4F7DB0\" class=\"forTexts\">&nbsp;</td>
               		<td bgcolor=\"#D9E3EE\" class=\"forTexts\">&nbsp;<a href=\"gererExo.php\">Gerer les Exercices</a></td></tr>";
             	}else
				{
					echo "<td bgcolor=\"#D9E3EE\" class=\"forTexts\">&nbsp;<a href=\"monCompte.php\">Mon compte</a></td>";
					echo "<tr><td bgcolor=\"#4F7DB0\" class=\"forTexts\">&nbsp;</td></tr>";
				}
				?>
            </table>
            <br>
          </td>
          <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="5">
              <tr> 
                <td class="forTexts"><p class="forText"><strong>Sélectionner le compte à administrer :</strong></p>
                  <hr>
                  <p class="forText">
		  <table width="100%" border="0" cellspacing="10" cellpadding="0">
			<?php
			echo $message;
			if (isset($result))
			{
				echo $result;
			}?>
			</select></form>
		  </table>
                </p>
                </td>
              </tr>
              <tr> 
                <td class="forTexts"></td>
              </tr>
              
            </table></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td height="40" background="images/bottom_bg.gif" class="forTexts">
<div align="center">All 
        Rights Reserved. 2007. Design by Fridou&Castor Inc</div></td>
  </tr>
</table>
</body>
<?php } ?>
</html>
