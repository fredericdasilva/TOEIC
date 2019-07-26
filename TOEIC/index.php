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
           
            <td class="forTexts" align="center">|&nbsp;&nbsp;&nbsp;&nbsp;<a href="inscription.php">Inscription</a>&nbsp;&nbsp;&nbsp;&nbsp; |</td>
          </tr>
        </table>
      </div></td>
  </tr>
  <tr> 
    <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="2">
        <tr> 
          <td width="170" valign="top"> 
<?php /***********************************************************************/
/************************Partie Authentification************************/
/***********************************************************************/ ?>

	    <table width="100%" border="0" cellspacing="1" cellpadding="1">
              <tr> 
                <td height="20" bgcolor="#80A0C6" class="forTexts"> 
                  <div align="center"><font color="#FFFFFF">LOGIN</font></div></td>
              </tr>
              <tr> 
                <td bgcolor="#E9EFF5" class="forTexts">
<table width="100%" border="0" cellspacing="1" cellpadding="3">
                    <tr> 
                      <td class="forForms">
		      <form name="formulaire" action="verifIdent.php" method="post" onSubmit="return verifForm()">
    			<tr>
     			  <td class="forForms" align="left"> Identifiant</td>
      			  <td align="center"><input type="text" name="login" maxlength="20" size="10"></td>
    			</tr>
    			<tr>
      			  <td class="forForms" align="left"> Mot de passe</td>
     			  <td align="center"><input type="password" name="mot2passe" size="10"></td>
    			</tr>
    			<tr>
     			  <td colspan="2" align="center"><input type="submit" value="Valider"></td>
    			</tr>
  		      </form>
		      </td>
                    </tr>
                  </table></td>
              </tr>
            </table>
<?php /***********************************************************************/
/***********************************************************************/ ?>

          </td>
          <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="5">
              <tr> 
                <td class="forTexts"><p class="forText"><strong>Bienvenue </strong><br></p>
                  <hr>
                  <p class="forText">Ce site a pour but de vous entraîner sur la partie grammaire du TOEIC
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
