<?php
include("fonctions.php");

// On appelle la session
session_start();

//requetes
//liste menu
$res = requete("SELECT * FROM type_exo");
//liste exo
//$res1 = requete("SELECT * FROM exo WHERE id_type_exo = ".$_GET['id']."");
?>

<html>
<head>
<title>TOEIC</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="forAll.css" rel="stylesheet" type="text/css">

<?php
	if (empty($_SESSION['login_user'])) { ?>
		<div class="titreErreur">Erreur de session, vous allez être redirigé 
			automatiquement</div>
		<meta http-equiv="refresh" content="2; url=index.php"/>
<?php } else { 
		 ?>

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
           
            <td class="forTexts" align="center">|&nbsp;&nbsp;&nbsp;&nbsp;Utilisateur authentifié : <?php echo $_SESSION['login_user']; ?>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;<a href="deconnexion.php">Déconnexion</a> 
			&nbsp;&nbsp;&nbsp;&nbsp;|</td>
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
                <td bgcolor="#4F7DB0" class="titreMenu" colspan="2">&nbsp;Types 
				d'exercice</td>
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
                <td class="forTexts"><p class="forText"><strong>Création d'un nouvel Exercice :</strong><br></p>
                  <hr>
                  <p class="forTexts">
		  	<form name="MonFormulaire" action="validation.php" method="POST">
		  <table width="100%" border="0" cellspacing="10" cellpadding="0">
			
					
					<tr>
					
						<td class="forTexts" align="center">Nom de l'Exercice : 
							<input type="text" name="txt_nomExo" size="40">
						</td>
					</tr>
					<tr>
						<td align="center" class="forTexts">Type d'Exercice :	
							<select name="List_Type_Exo" size="1">
							<option selected>Grammaire</option>
							<option selected>Type n°2</option>
							</select>
							<p></p>
						</td>
					</tr>
					
					
						<table border="0" cellspacing="10" cellpadding="0">
								<tr>
								
									<td class="forTexts" align="center">Question : 
										<input type="text" name="txt_Q1" size="55">
									</td>
								</tr>
								<tr>
								<td class="forTexts" >
								A: <input type="text" name="txt_R1A" size="15">
								B: <input type="text" name="txt_R1B" size="15">
								C: <input type="text" name="txt_R1C" size="15">
								D: <input type="text" name="txt_R1D" size="15">
								<p></p>
									</td>

								</tr>
								
								<tr>
								
									<td class="forTexts" align="center">Question : 
										<input type="text" name="txt_Q1" size="55">
									</td>
								</tr>
								<tr>
									<td class="forTexts" align="center">
								A: <input type="text" name="txt_R2A" size="15">
								B: <input type="text" name="txt_R2B" size="15">
								C: <input type="text" name="txt_R2C" size="15">
								D: <input type="text" name="txt_R2D" size="15">
								<p></p>

									</td>
								</tr>
						</table>
					
					
					<tr>
										
						<td align="center"><input type="submit" value="Valider">
						</td>			
												
					
					</tr>		
			
			
			
		  </table>
		  </form>
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
<div align="center">All Rights Reserved. 2007. Design by Fridou&amp;Castor Inc</div></td>
  </tr>
</table>
<?php } ?>
</body>
</html>
