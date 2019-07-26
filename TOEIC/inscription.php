<?php
include("fonctions.php");
?>

<html>
<head>
<title>TOEIC</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="forAll.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style2 {color: #FF0000}
-->
</style>
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
 if(document.formulaire.mail.value.indexOf('@') == -1 ||document.formulaire.mail.value == "") {
   alert("Veuillez entrer votre mail!");
   document.formulaire.mail.focus();
   return false;
  }
  return true;
 }
  //-->
</script>
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
           
            <td class="forTexts" align="center">|&nbsp;&nbsp;&nbsp;&nbsp;Fiche d'inscription&nbsp;&nbsp;&nbsp;&nbsp; |</td>
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
                <td width="6%" bgcolor="#4F7DB0" class="forTexts">&nbsp;</td>
                <td width="94%" bgcolor="#D9E3EE" class="forTexts"><a href="index.php">Retour</a></td>
              </tr>
			  </table>
	    <table width="100%" border="0" cellspacing="1" cellpadding="1">
		
              <tr> 
                <td height="20" bgcolor="#80A0C6" class="forTexts"> 
                  <div align="center"><font color="#FFFFFF">Information</font></div></td>
              </tr>
          	<tr>
                <td bgcolor="#E9EFF5" class="forTexts">
<table width="100%" border="0" cellspacing="1" cellpadding="3">
                    <tr>
					 <td class="forTexts">&nbsp;</td>
                      <td class="forTexts">
		      Inscription en cours...
		      </td>
                    </tr>
				</table></td>
              </tr>
            </table>
          </td>
          <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="5">
              <tr> 
                <td class="forTexts"><p class="forText"><strong>Veuillez remplir tous les champs</strong><br></p></td>
		</tr>
                 <td class="forTexts"><hr>
                  <p class="forText"><br>
		  <form name="formulaire" action="validerInscription.php" method="post" onSubmit="return verif_formulaire()">
		  <table width="100%" border="0" cellspacing="1" cellpadding="1">
		<tr> 
                       <td height="20" width="180" bgcolor="#80A0C6" class="forTexts"><font color="#FFFFFF">Login :</font></td> 
                <td height="20" class="forTexts"><input type="text" name="login"></td> 
                    </tr>
					<tr> 
                      <td height="20" width="180" bgcolor="#80A0C6" class="forTexts">
		      <font color="#FFFFFF">Mot de passe :</font></td>
		      <td height="20" class="forTexts"><input type="password" name="mdp"></td>
                    </tr>
		    <tr valign="middle"> 
                      <td height="20" width="150" bgcolor="#80A0C6" class="forTexts">
		      <font color="#FFFFFF">Confirmer mot de passe :</font></td>
		      <td height="20" class="forTexts"><input type="password" name="mdp2"></td>
                    </tr>
					<tr> 
               <td height="20" width="180" bgcolor="#80A0C6" class="forTexts">
		      <font color="#FFFFFF">Nom :</font></td>
		      <td height="20" class="forTexts"><input type="text" name="nom"></td>
              </tr>
			<tr> 
                      <td height="20" width="180" bgcolor="#80A0C6" class="forTexts">
		      <font color="#FFFFFF">Prénom :</font></td>
		      <td height="20" class="forTexts"><input type="text" name="prenom"></td>
                    </tr>
    
		    <tr> 
                      <td height="20" width="180" bgcolor="#80A0C6" class="forTexts">
		      <font color="#FFFFFF">Adresse mail :</font></td>
		      <td height="20" class="forTexts"><input type="text" name="mail"></td>
                    </tr>
		    <tr>
     		      <td align="center"></br><input type="submit" value="Envoyer"></td>
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
<div align="center">All 
        Rights Reserved. 2007. Design by Fridou&Castor Inc</div></td>
  </tr>
</table>
</body>
</html>
