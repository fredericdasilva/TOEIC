<?php
include("fonctions.php");

// On appelle la session
session_start();

$res = requete("SELECT * FROM type_exo");


//Si on a au moins une reponse, on ajoute une feuille de reponse
if( (isset($_POST['reponse1'])) || (isset($_POST['reponse2'])) || (isset($_POST['reponse3'])) || (isset($_POST['reponse4'])) || (isset($_POST['reponse5'])) )
{
	$flag = 0;
}
else	//	l'user a repondu à aucune questions
{
	$flag = 1;
}

if ($flag == 0)
{
		$res1 = requete("INSERT INTO `feuille_reponse` VALUES ('', '".$_POST['id_exo']."', '".$_SESSION['id_user']."', NOW())");	
	//On recupere l'id auto-incrementé de la feuille de reponse qu'on vient d'inserer
	$res1 = requete("SELECT MAX(`id_feuille_reponse`) as ID FROM `feuille_reponse` WHERE `id_user`= ".$_SESSION['id_user']." AND `id_exo`=".$_POST['id_exo']." ");	
		while($val=mysql_fetch_array($res1))
		{
			$id_feuille_rep = $val["ID"];
		}
				
		//Insertions des reponses de l'user
		if ((isset($_POST['Q1'])) && (isset($_POST['reponse1'])))
			{	$res1 = requete("INSERT INTO `reponse_user` VALUES ('".$_POST['Q1']."','".$_POST['reponse1']."', '".$id_feuille_rep."')"); }
		
		if ((isset($_POST['Q2'])) && (isset($_POST['reponse2'])))
			{	$res1 = requete("INSERT INTO `reponse_user` VALUES ('".$_POST['Q2']."','".$_POST['reponse2']."', '".$id_feuille_rep."')"); }
				
		if ((isset($_POST['Q3'])) && (isset($_POST['reponse3'])))
			{	$res1 = requete("INSERT INTO `reponse_user` VALUES ('".$_POST['Q3']."','".$_POST['reponse3']."', '".$id_feuille_rep."')"); }
			
		if ((isset($_POST['Q4'])) && (isset($_POST['reponse4'])))
			{	$res1 = requete("INSERT INTO `reponse_user` VALUES ('".$_POST['Q4']."','".$_POST['reponse4']."', '".$id_feuille_rep."')"); }
		
		if ((isset($_POST['Q5'])) && (isset($_POST['reponse5'])))
			{	$res1 = requete("INSERT INTO `reponse_user` VALUES ('".$_POST['Q5']."','".$_POST['reponse5']."', '".$id_feuille_rep."')"); }

	$res_tableau_rep = requete("SELECT question.nom_question
								, reponse_user.reponse AS Votre_Reponse
								, corrige.reponse AS Bonne_Reponse
								FROM exo, corrige, question, reponse_user
								WHERE question.id_question=corrige.id_question
								AND question.id_exo=exo.id_exo
								AND reponse_user.id_question =question.id_question
								AND reponse_user.id_feuille_reponse = '".$id_feuille_rep."'
								AND exo.id_exo = '".$_POST['id_exo']."'");
	
	
	$res_bonnes_rep = requete("SELECT count(*) as NB_BON_REP
							FROM feuille_reponse, reponse_user, question, corrige, exo
							WHERE reponse_user.id_question = question.id_question
							AND question.id_question = corrige.id_question
							AND reponse_user.reponse = corrige.reponse
							AND feuille_reponse.id_feuille_reponse=reponse_user.id_feuille_reponse
							AND exo.id_exo = feuille_reponse.id_exo
							AND id_user= '".$_SESSION['id_user']."'
							AND feuille_reponse.id_exo = '".$_POST['id_exo']."'
							AND feuille_reponse.id_feuille_reponse = '".$id_feuille_rep."'");
			
	$res_nb_total_quest = requete("SELECT COUNT(*) AS NB_REP_TOTAL
									FROM `question` 
									WHERE `id_exo` = '".$_POST['id_exo']."'");
}


		
?>

<html>
<head>
<title>TOEIC</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="forAll.css" rel="stylesheet" type="text/css">

<?php
	if (empty($_SESSION['login_user'])) { ?>
		<div class="titreErreur">Erreur de session, vous allez être redirigé automatiquement</div>
		<meta http-equiv="refresh" content="20; url=index.php"/>
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
                <td class="forTexts"><p class="forText"><strong>Resultat de l'exercice :</strong><br></p>
                  <hr>
                  <p class="forText">
		  <table width="100%" border="0" cellspacing="10" cellpadding="0">
						
			<?php
			if ($flag == 0)
			{
					//Calcul des reponses
					
					echo " <tr><td class=\"forQuestion\" width=\"60%\">Questions</td>	<td class=\"forQuestion\">Vos réponses</td>	<td class=\"forQuestion\">Bonnes réponses</td>	</tr> ";
		
					
					while($val1=mysql_fetch_array($res_tableau_rep))
					 {
					 
						echo "<tr>";
						echo "<td class=\"forTexts\" width=\"60%\"> ".$val1["nom_question"]."</td>";
						
						//Gestion des couleurs pour les réponses
						if($val1["Votre_Reponse"] == $val1["Bonne_Reponse"] )
						{
								echo "<td  class=\"forTexts\"><FONT COLOR=\"Green\"> ".$val1["Votre_Reponse"]."</Font></td>";
						}
						else
						{
								echo "<td  class=\"forTexts\"><FONT COLOR=\"Red\"> ".$val1["Votre_Reponse"]."</Font></td>";
						}
						echo "<td class=\"forTexts\"> ".$val1["Bonne_Reponse"]."</td>";
						echo "</tr>";
		
					 }
					
					while($val1=mysql_fetch_array($res_bonnes_rep))
					 {
					 	$nb_bon_rep = $val1["NB_BON_REP"];
					}
					
					while($val1=mysql_fetch_array($res_nb_total_quest))
					 {
					  	$nb_rep_total = $val1["NB_REP_TOTAL"];
					}
					
					$resultat_reussite = ($nb_bon_rep/$nb_rep_total) *100;
					echo "<p><td align=\"center\"><H3>Vous avez obtenu </H3><H2>".$resultat_reussite." %</H2><H3> de réussite à cet exercice</H3></td>";
					echo "</tr>";
			}
			else //Cas où le JavaScript est desactivé et que l'user parvient quand même à cette page
			{
				echo "<p><tr><td align=\"center\">Vous devez répondre aux moins à une réponse</td></tr>";
			}
			
			
			?>

			
			
			
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

