/* Cette requête permet d'afficher aleatoirement une série de questions et 
reponses correspondantes pour un exercice donné d'un type donné*/

--Récupération de l'id exo aprés avoir, au préalable, récupéré le nom du type et le nom de l'exo
SELECT id_exo
FROM exo,type_exo
WHERE type_exo.id_type_exo = type_exo.id_type_exo
AND type_exo.nom_type_exo LIKE '-----NOM_TYPE----'
AND exo.nom_exo LIKE '-----NOM_EXO----'

--Affichage aléatoire à partir de l'id exo récupéré
SELECT id_question, nom_question, repA, repB, repC, repD --Le champ id_question ne doit pas être affiché, il servira pour enregistrer les réponses de l'user
FROM question, exo, reponse
WHERE exo.id_exo=question.id_exo
AND question.id_question=reponse.id_question
AND exo.id_exo like '----ID_EXO-------'
ORDER BY RAND()
