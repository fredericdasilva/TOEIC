<p>&lt;?php<br>
include(&quot;fonctions.php&quot;);<br>
<br>
// On appelle la session<br>
session_start();<br>
<br>
//requetes<br>
//liste menu<br>
$res = requete(&quot;SELECT * FROM type_exo&quot;);<br>
//liste exo<br>
//$res1 = requete(&quot;SELECT * FROM exo WHERE id_type_exo = &quot;.$_GET['id'].&quot;&quot;);<br>
?&gt;<br>
<br>
&lt;html&gt;<br>
&lt;head&gt;<br>
&lt;title&gt;TOEIC&lt;/title&gt;<br>
&lt;meta http-equiv=&quot;Content-Type&quot; content=&quot;text/html; charset=iso-8859-1&quot;&gt;<br>
&lt;link href=&quot;forAll.css&quot; rel=&quot;stylesheet&quot; type=&quot;text/css&quot;&gt;<br>
<br>
&lt;?php<br>
if (empty($_SESSION['login_user'])) { ?&gt;<br>
&lt;div class=&quot;titreErreur&quot;&gt;Erreur de session, vous allez être redirigé <br>
automatiquement&lt;/div&gt;<br>
&lt;meta http-equiv=&quot;refresh&quot; content=&quot;2; url=index.php&quot;/&gt;<br>
&lt;?php } else { <br>
?&gt;<br>
<br>
&lt;/head&gt;<br>
<br>
&lt;?php //récupération des paramètres<br>
<br>
?&gt;<br>
<br>
&lt;body background=&quot;images/bg.gif&quot; link=&quot;#003399&quot; vlink=&quot;#0044D2&quot; alink=&quot;#FF3300&quot; 
leftmargin=&quot;0&quot; topmargin=&quot;0&quot; marginwidth=&quot;0&quot; marginheight=&quot;0&quot;&gt;<br>
&lt;table width=&quot;760&quot; height=&quot;100%&quot; border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot;&gt;<br>
&lt;tr&gt; <br>
&lt;td height=&quot;70&quot; background=&quot;images/top_bg.gif&quot; valign=&quot;middle&quot;&gt;&lt;table 
width=&quot;100%&quot; border=&quot;0&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot;&gt;<br>
&lt;tr&gt; <br>
&lt;td width=&quot;50%&quot;&gt;&lt;STRONG&gt;ENTRAINEMENT AU TOEIC&lt;STRONG&gt;&lt;/td&gt;<br>
&lt;td width=&quot;50%&quot; align=&quot;right&quot;&gt;&amp;nbsp;&lt;/td&gt;<br>
&lt;/tr&gt;<br>
&lt;/table&gt;&lt;/td&gt;<br>
&lt;/tr&gt;<br>
&lt;tr&gt; <br>
&lt;td height=&quot;22&quot; background=&quot;images/menu_bg.gif&quot; class=&quot;forTexts&quot;&gt;&lt;div 
align=&quot;right&quot;&gt;<br>
&lt;table width=&quot;100%&quot; border=&quot;0&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot;&gt;<br>
&lt;tr&gt;<br>
<br>
&lt;td class=&quot;forTexts&quot; align=&quot;center&quot;&gt;|&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;Utilisateur 
authentifié : &lt;?php echo $_SESSION['login_user']; 
?&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;|&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;a 
href=&quot;deconnexion.php&quot;&gt;Déconnexion&lt;/a&gt; <br>
&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;|&lt;/td&gt;<br>
&lt;/tr&gt;<br>
&lt;/table&gt;<br>
&lt;/div&gt;&lt;/td&gt;<br>
&lt;/tr&gt;<br>
&lt;tr&gt; <br>
&lt;td valign=&quot;top&quot;&gt;&lt;table width=&quot;100%&quot; border=&quot;0&quot; cellspacing=&quot;0&quot; cellpadding=&quot;2&quot;&gt;<br>
&lt;tr&gt; <br>
&lt;td width=&quot;170&quot; valign=&quot;top&quot;&gt; <br>
&lt;table width=&quot;100%&quot; border=&quot;0&quot; cellspacing=&quot;1&quot; cellpadding=&quot;1&quot;&gt;<br>
&lt;tr&gt; <br>
&lt;td bgcolor=&quot;#4F7DB0&quot; class=&quot;forTexts&quot;&gt;&amp;nbsp;&lt;/td&gt;<br>
&lt;td bgcolor=&quot;#D9E3EE&quot; class=&quot;forTexts&quot;&gt;&amp;nbsp;&lt;a 
href=&quot;accueil.php&quot;&gt;Accueil&lt;/a&gt;&lt;/td&gt;<br>
&lt;/tr&gt;<br>
&lt;tr&gt; <br>
&lt;td bgcolor=&quot;#4F7DB0&quot; class=&quot;titreMenu&quot; colspan=&quot;2&quot;&gt;&amp;nbsp;Types <br>
d'exercice&lt;/td&gt;<br>
&lt;/tr&gt;<br>
&lt;?php<br>
//affichage du menu<br>
while($val=mysql_fetch_array($res)) {<br>
echo &quot;&lt;tr&gt;&lt;td bgcolor=\&quot;#4F7DB0\&quot; class=\&quot;forTexts\&quot;&gt;&amp;nbsp;&lt;/td&gt;<br>
&lt;td bgcolor=\&quot;#D9E3EE\&quot; class=\&quot;forTexts\&quot;&gt;&amp;nbsp;&lt;a 
href=\&quot;typeExo.php?id=&quot;.$val[&quot;id_type_exo&quot;].&quot;\&quot;&gt;&quot;.$val[&quot;nom_type_exo&quot;].&quot;&lt;/a&gt;&lt;/td&gt;&lt;/tr&gt;&quot;;<br>
}?&gt;<br>
&lt;tr&gt;&lt;td bgcolor=&quot;#4F7DB0&quot; class=&quot;titreMenu&quot; colspan=&quot;2&quot;&gt;&amp;nbsp;&lt;/td&gt;&lt;/tr&gt;<br>
&lt;tr&gt;<br>
&lt;td bgcolor=&quot;#4F7DB0&quot; class=&quot;forTexts&quot;&gt;&amp;nbsp;&lt;/td&gt;<br>
&lt;?php<br>
if ($_SESSION['group'] == 'admin')<br>
{<br>
echo &quot;&lt;td bgcolor=\&quot;#D9E3EE\&quot; class=\&quot;forTexts\&quot;&gt;&amp;nbsp;&lt;a href=\&quot;administrerCompte.php\&quot;&gt;G&eacute;rer comptes&lt;/a&gt;&lt;/td&gt;&quot;;<br>
echo &quot;&lt;tr&gt;&lt;td bgcolor=\&quot;#4F7DB0\&quot; class=\&quot;forTexts\&quot;&gt;&amp;nbsp;&lt;/td&gt;<br>
&lt;td bgcolor=\&quot;#D9E3EE\&quot; class=\&quot;forTexts\&quot;&gt;&amp;nbsp;&lt;a href=\&quot;gererExo.php\&quot;&gt;Gerer les Exercices&lt;/a&gt;&lt;/td&gt;&lt;/tr&gt;&quot;;<br>
}else<br>
{<br>
echo &quot;&lt;td bgcolor=\&quot;#D9E3EE\&quot; class=\&quot;forTexts\&quot;&gt;&amp;nbsp;&lt;a href=\&quot;monCompte.php\&quot;&gt;Mon compte&lt;/a&gt;&lt;/td&gt;&quot;;<br>
echo &quot;&lt;tr&gt;&lt;td bgcolor=\&quot;#4F7DB0\&quot; class=\&quot;forTexts\&quot;&gt;&amp;nbsp;&lt;/td&gt;&lt;/tr&gt;&quot;;<br>
}<br>
?&gt;<br>
&lt;/table&gt;<br>
&lt;br&gt;<br>
&lt;/td&gt;<br>
&lt;td valign=&quot;top&quot;&gt;&lt;table width=&quot;100%&quot; border=&quot;0&quot; cellspacing=&quot;0&quot; cellpadding=&quot;5&quot;&gt;<br>
&lt;tr&gt; <br>
&lt;td class=&quot;forTexts&quot;&gt;&lt;p class=&quot;forText&quot;&gt;&lt;strong&gt;Création d'un nouvel Exercice 
:&lt;/strong&gt;&lt;br&gt;&lt;/p&gt;<br>
&lt;hr&gt;<br>
&lt;p class=&quot;forText&quot;&gt;<br>
&lt;table width=&quot;100%&quot; border=&quot;0&quot; cellspacing=&quot;10&quot; cellpadding=&quot;0&quot;&gt;<br>
&lt;?php<br>
while($val1=mysql_fetch_array($res1))<br>
{<br>
echo &quot;&lt;tr&gt;&lt;td class=\&quot;forTexts\&quot; width=\&quot;80\&quot;&gt;&quot;.$val1[1].&quot;&lt;/td&gt;&quot;;<br>
echo &quot;&lt;td class=\&quot;forDescription\&quot;&gt;&quot;.$val1[2].&quot;&lt;/td&gt;&quot;;<br>
echo &quot;&lt;/tr&gt;&quot;;<br>
}?&gt;<br>
&lt;/table&gt;<br>
&lt;/p&gt;<br>
&lt;/td&gt;<br>
&lt;/tr&gt;<br>
&lt;tr&gt; <br>
&lt;td class=&quot;forTexts&quot;&gt;&lt;/td&gt;<br>
&lt;/tr&gt;<br>
<br>
&lt;/table&gt;&lt;/td&gt;<br>
&lt;/tr&gt;<br>
&lt;/table&gt;&lt;/td&gt;<br>
&lt;/tr&gt;<br>
&lt;tr&gt;<br>
&lt;td height=&quot;40&quot; background=&quot;images/bottom_bg.gif&quot; class=&quot;forTexts&quot;&gt;<br>
&lt;div align=&quot;center&quot;&gt;All Rights Reserved. 2007. Design by Fridou&amp;amp;Castor 
Inc&lt;/div&gt;&lt;/td&gt;<br>
&lt;/tr&gt;<br>
&lt;/table&gt;<br>
&lt;?php } ?&gt;<br>
&lt;/body&gt;<br>
&lt;/html&gt;<br>
&nbsp;</p>
