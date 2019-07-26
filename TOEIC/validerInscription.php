<?php
include("fonctions.php");

//Recuperation des parametres
$nom = "";
$prenom = "";
$mdp = "";
$mail = "";
$message = "Erreur interne !";
if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['login']) && isset($_POST['mdp']))
{
	if (isset($_POST['mail']))
	{
		$mail = $_POST['mail'];
	}
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$login = $_POST['login'];
	$mdp = $_POST['mdp'];
}
//requetes
$res1 = "";
//Insertion en base
if (isset($_POST['modification']))
{
	if ($_POST['modification'] == "1")
	{
		$res2 = requete("UPDATE user SET login = [valeur 1], colonne 2 = [valeur 2]
WHERE '', '0', 'user', '".$login."', '".$mdp."', '".$nom."', '".$prenom."')");
	}
}else
{
	$res = requete("SELECT * FROM user WHERE login_user = '".$login."'");
	$count = mysql_num_rows($res);
	$res1 = requete("INSERT INTO user VALUES ('', '0', 'user', '".$login."', '".$mdp."', '".$nom."', '".$prenom."')");
}
//On recupere l id_user
$res2 = requete("SELECT id_user FROM user WHERE login_user = '".$login."'");
$data = mysql_fetch_array($res2);
if ($count == 0)
{
	if ($res1)
	{
		$message = "Votre compte a été créé, vous allez recevoir un mail d'activation";
		
		activerCompteByMail($mail, $data['id_user'], $login);
	}else
	{
		$message = "Erreur d'insertion en base !";
	}

}else
{
	$message =  "Login déjà utilisé";
}
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
           
            <td class="forTexts" align="center">|&nbsp;&nbsp;&nbsp;Inscription&nbsp;&nbsp;&nbsp;&nbsp; |</td>
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
                <td height="20" bgcolor="#80A0C6" class="forTexts"> 
                  <div align="center"><font color="#FFFFFF">Information</font></div></td>
              </tr>
          	<tr>
                <td bgcolor="#E9EFF5" class="forTexts">
<table width="100%" border="0" cellspacing="1" cellpadding="3">
                    <tr> 
                      <td class="forTexts">&nbsp;
		      </td>
                    </tr>
                  </table></td>
              </tr>
            </table>
          </td>
          <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="5">
                 <td class="forTexts">
                  <p class="forText"><br>
		  		<?php echo $message ; ?>
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
