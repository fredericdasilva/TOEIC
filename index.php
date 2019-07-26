<html>
<head>
<title>Identification</title>
<link title="style" type="text/css" rel="stylesheet" href="../css/styles.css">
<script type="text/javascript">
/* On crée une fonction de verification */
function verifForm(formulaire)
{
 if(document.formulaire.login.value == "" || document.formulaire.mot2passe.value == ""){/* on detecte si les champs login et mdp est vide */
	alert('Veuillez renseigner tous les champs'); /* dans ce cas on lance un message d'alerte */
	document.formulaire.login.focus(); 
	return false;
 }
 return true;
}
</script>
</head>
<body id="background">
<div class="titre1"></div>

<table id="styleIdentification2" align="center">
  <form name="formulaire" action="verifIdent.php" method="post" onSubmit="return verifForm()">
    <tr>
      <td width="20%" height="35" align="right"> Identifiant :</td>
      <td width="40%" align="center"><input type="text" name="login" maxlength="20"></td>
    </tr>
    <tr>
      <td width="20%" height="35" align="right"> Mot de passe :</td>
      <td width="40%" align="center"><input type="password" name="mot2passe"></td>
    </tr>
    <tr>
      <td height="42" colspan="2" align="center"><input type="submit" value="Valider"></td>
    </tr>
  </form>
</table>

</body>
</html>