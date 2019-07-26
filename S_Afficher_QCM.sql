/* Cette requ�te permet d'afficher aleatoirement une s�rie de questions et 
reponses correspondantes pour un exercice donn� d'un type donn�*/

--R�cup�ration de l'id exo apr�s avoir, au pr�alable, r�cup�r� le nom du type et le nom de l'exo
SELECT id_exo
FROM exo,type_exo
WHERE type_exo.id_type_exo = type_exo.id_type_exo
AND type_exo.nom_type_exo LIKE '-----NOM_TYPE----'
AND exo.nom_exo LIKE '-----NOM_EXO----'

--Affichage al�atoire � partir de l'id exo r�cup�r�
SELECT id_question, nom_question, repA, repB, repC, repD --Le champ id_question ne doit pas �tre affich�, il servira pour enregistrer les r�ponses de l'user
FROM question, exo, reponse
WHERE exo.id_exo=question.id_exo
AND question.id_question=reponse.id_question
AND exo.id_exo like '----ID_EXO-------'
ORDER BY RAND()
