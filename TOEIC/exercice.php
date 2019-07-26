<?php
include("fonctions.php");

// On appelle la session
session_start();

$i=1; //Compteur de question

//requetes
//liste menu
$res = requete("SELECT * FROM type_exo");
//Affichage questions de l exo
$res1 = requete("SELECT question.id_question, id_reponse, nom_question, repA, repB, repC, repD FROM question, exo, reponse
WHERE exo.id_exo=question.id_exo
AND question.id_question=reponse.id_question
AND exo.id_exo = ".$_GET['id']."
ORDER BY RAND() LIMIT 0,5");

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
</head>


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
           
            <td class="forTexts" align="center">|&nbsp;&nbsp;&nbsp;&nbsp;Utiliisateur authentifié : <?php echo $_SESSION['login_user']; ?>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;<a href="deconnexion.php">Déconnexion</a> &nbsp;&nbsp;&nbsp;&nbsp;|</td>
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
                <td class="forTexts"><p class="forText"><strong>Liste des exercices disponibles :</strong><br></p>
                  <hr>
                  <p class="forText">
		  <table width="100%" border="0" cellspacing="10" cellpadding="0">
			<form name="MonFormulaire" action="validation.php" method="POST" >
			<?php
			while($val1=mysql_fetch_array($res1)) 
			{
		   			echo "<tr><td class=\"forQuestion\">Q";
					echo "".$i.".";
					echo " ".$val1["nom_question"]."</td>";
					echo "</tr>";
					echo "<tr><td class=\"forAnswer\">";
					echo "<input type=\"radio\" name=\"reponse$i\" value=\"".$val1["repA"]." \" id=\"A$i\" >".$val1["repA"]."&nbsp;";   
					
					echo "<input type=\"radio\" name=\"reponse$i\" value=\"".$val1["repB"]." \" id=\"B$i\">".$val1["repB"]."&nbsp;"; 
		
					echo "<input type=\"radio\" name=\"reponse$i\" value=\"".$val1["repC"]." \" id=\"C$i\">".$val1["repC"]."&nbsp;"; 
		
					if ($val1["repD"]!=null)
					{
						echo "<input type=\"radio\" name=\"reponse$i\" value=\"".$val1["repD"]." \" id=\"D$i\" >".$val1["repD"]."";
					}
					
					echo "<input type=\"hidden\" name=\"Q$i\" value=\"".$val1["id_question"]."\"";
					echo "</td></tr>";
					$i++;
			}
			?>
			
			<input type="hidden" name="nbParam" value="<?php echo $i; ?>">
			
			<input type="hidden" name="id_exo" value="1">
																																			
			<tr><td align="center"><input type="submit" value="Envoyer">
			
			<input type="reset" value="Réinitialiser"></td></tr>
			</form>
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
<?php } ?>
</body>
</html>

