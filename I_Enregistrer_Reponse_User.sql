/* Cette commande SQL permet l'insertion des réponses de l'user dans la table feuille reponse
Qd l'user clique sur le bouton de validation du QCM,

Pour chaque question posée
	Si l'user a répondu à la question
		On appel cette commande en passant les bon parametres
	Sinon on passe la valeur NULL au champs reponse

*/

INSERT INTO `feuille_reponse` VALUES ('--ID_USER--', '--ID_EXO--', '--ID_QUESTION--', '--REP--', getdate());

