/* Cette commande affiche les questions et réponses où l'user à eu faux
ainsi que son score en pourcentage */


-- Bonnes reponses

SELECT question.id_question, nom_question, reponse_user.reponse as REP_USER, corrige.reponse as BON_REP
FROM feuille_reponse, reponse_user, question, corrige, exo
WHERE reponse_user.id_question = question.id_question
AND question.id_question = corrige.id_question
AND reponse_user.reponse = corrige.reponse
AND feuille_reponse.id_feuille_reponse=reponse_user.id_feuille_reponse
AND exo.id_exo = feuille_reponse.id_exo
AND id_user= '1'
AND feuille_reponse.id_exo = '1'
AND feuille_reponse.id_feuille_reponse = '1'

-- Mauvaises reponse

SELECT question.id_question, nom_question, feuille_reponse.reponse
FROM `feuille_reponse`, 'question', `corrige`
WHERE feuille_reponse.id_question = question.id_question
AND question.id_question = corrige.id_question
AND `id_user`= '--ID_USER--'
AND `id_type_exo` = '--ID_EXO--'
AND `id_feuille_reponse` = '--ID_FEUILLE_REPONSE--'
AND id_question IS NOT IN(
							SELECT question.id_question
							FROM `feuille_reponse`, 'question', `corrige`
							WHERE feuille_reponse.id_question = question.id_question
							AND question.id_question = corrige.id_question
							AND feuille_reponse.reponse = corrige.reponse
							AND `id_user`= '--ID_USER--'
							AND `id_type_exo` = '--ID_EXO--'
							AND `id_feuille_reponse` = '--ID_FEUILLE_REPONSE--'
							)

-- Taux de réussite (Bonnes reponses/ Nb questions)

DECLARE @TX_REUSSITE FLOAT

SET @TX_REUSSITE = ( SELECT CAST( COUNT( 
							SELECT question.id_question, nom_question, feuille_reponse.reponse
							FROM `feuille_reponse`, 'question', `corrige`
							WHERE feuille_reponse.id_question = question.id_question
							AND question.id_question = corrige.id_question
							AND `id_user`= '--ID_USER--'
							AND `id_feuille_reponse` = '--ID_FEUILLE_REPONSE--'
							AND `id_type_exo` = '--ID_EXO--') AS FLOAT) / 
					( SELECT CAST( COUNT( 
							SELECT question.id_question, nom_question, feuille_reponse.reponse
							FROM `feuille_reponse`, 'question', `corrige`
							WHERE feuille_reponse.id_question = question.id_question
							AND question.id_question = corrige.id_question
							AND feuille_reponse.reponse = corrige.reponse
							AND `id_user`= '--ID_USER--'
							AND `id_feuille_reponse` = '--ID_FEUILLE_REPONSE--'
							AND `id_type_exo` = '--ID_EXO--') AS FLOAT)) 

-- Enregistrement du Tx de reussite
INSERT INTO `resultats` VALUES ('--ID_USER--','--ID_FEUILLE_REPONSE--', @TX_REUSSITE, getdate());