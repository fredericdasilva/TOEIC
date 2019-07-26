-- phpMyAdmin SQL Dump
-- version 2.6.1
-- http://www.phpmyadmin.net
-- 
-- Serveur: localhost
-- Généré le : Lundi 22 Octobre 2007 à 10:09
-- Version du serveur: 4.1.9
-- Version de PHP: 4.3.10
-- 
-- Base de données: `toeic`
-- 
DROP DATABASE `toeic`;
CREATE DATABASE `toeic` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE toeic;

-- --------------------------------------------------------

-- 
-- Structure de la table `corrige`
-- 

DROP TABLE IF EXISTS `corrige`;
CREATE TABLE IF NOT EXISTS `corrige` (
  `id_question` int(11) NOT NULL default '0',
  `reponse` varchar(50) NOT NULL default '0',
  `id_exo` int(2) NOT NULL default '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Contenu de la table `corrige`
-- 

INSERT INTO `corrige` VALUES (1, 'a', 1);
INSERT INTO `corrige` VALUES (2, 'the', 1);
INSERT INTO `corrige` VALUES (3, 'yours', 1);
INSERT INTO `corrige` VALUES (4, 'a friend of yours', 1);
INSERT INTO `corrige` VALUES (5, 'living', 1);
INSERT INTO `corrige` VALUES (6, 'call on', 2);
INSERT INTO `corrige` VALUES (7, 'had written', 2);
INSERT INTO `corrige` VALUES (8, 'can hire', 2);
INSERT INTO `corrige` VALUES (9, 'installed', 2);
INSERT INTO `corrige` VALUES (10, 'however', 2);
INSERT INTO `corrige` VALUES (11, 'Even though', 1);
INSERT INTO `corrige` VALUES (12, 'on', 1);
INSERT INTO `corrige` VALUES (13, 'have been documented weekly', 1);
INSERT INTO `corrige` VALUES (14, 'on', 1);
INSERT INTO `corrige` VALUES (15, 'until', 1);
INSERT INTO `corrige` VALUES (16, 'sign', 1);
INSERT INTO `corrige` VALUES (17, 'have', 1);
INSERT INTO `corrige` VALUES (18, 'has been using', 1);
INSERT INTO `corrige` VALUES (19, 'catch on', 1);
INSERT INTO `corrige` VALUES (20, 'final', 1);
INSERT INTO `corrige` VALUES (21, 'go through', 1);
INSERT INTO `corrige` VALUES (22, 'finished', 1);
INSERT INTO `corrige` VALUES (23, 'were', 1);
INSERT INTO `corrige` VALUES (24, 'but also', 1);
INSERT INTO `corrige` VALUES (25, 'is being presented', 1);
INSERT INTO `corrige` VALUES (26, 'should order', 1);
INSERT INTO `corrige` VALUES (27, 'leave', 1);
INSERT INTO `corrige` VALUES (28, 'therefore', 1);
INSERT INTO `corrige` VALUES (29, 'of', 1);
INSERT INTO `corrige` VALUES (30, 'identification', 1);
INSERT INTO `corrige` VALUES (31, 'Before', 1);
INSERT INTO `corrige` VALUES (32, 'yet', 1);
INSERT INTO `corrige` VALUES (33, 'in spite of', 1);
INSERT INTO `corrige` VALUES (34, 'from', 1);
INSERT INTO `corrige` VALUES (35, 'for example', 1);

-- --------------------------------------------------------

-- 
-- Structure de la table `exo`
-- 

DROP TABLE IF EXISTS `exo`;
CREATE TABLE IF NOT EXISTS `exo` (
  `id_exo` int(11) NOT NULL default '0',
  `id_type_exo` int(11) NOT NULL default '0',
  `nom_exo` varchar(25) NOT NULL default '',
  `description` varchar(50) default NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Contenu de la table `exo`
-- 

INSERT INTO `exo` VALUES (1, 1, 'Exercice 1', 'Basic point');
INSERT INTO `exo` VALUES (2, 1, 'Exercice 2', 'Intermediate point');
INSERT INTO `exo` VALUES (3, 1, 'Exercice 3', 'Advanced point');

-- --------------------------------------------------------

-- 
-- Structure de la table `feuille_reponse`
-- 

DROP TABLE IF EXISTS `feuille_reponse`;
CREATE TABLE IF NOT EXISTS `feuille_reponse` (
  `id_user` int(11) NOT NULL default '0',
  `id_feuille_reponse` int(11) NOT NULL default '0',
  `id_exo` int(2) NOT NULL default '0',
  `id_question` int(11) NOT NULL default '0',
  `reponse` varchar(5) default '0',
  `date_f_rep` date NOT NULL default '0000-00-00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Contenu de la table `feuille_reponse`
-- 


-- --------------------------------------------------------

-- 
-- Structure de la table `question`
-- 

DROP TABLE IF EXISTS `question`;
CREATE TABLE IF NOT EXISTS `question` (
  `id_question` int(11) NOT NULL auto_increment,
  `id_exo` int(11) NOT NULL default '0',
  `nom_question` varchar(250) NOT NULL default '',
  PRIMARY KEY  (`id_question`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

-- 
-- Contenu de la table `question`
-- 

INSERT INTO `question` VALUES (1, 1, 'She''s ... university teacher.');
INSERT INTO `question` VALUES (2, 1, 'I like ... small animals.');
INSERT INTO `question` VALUES (3, 1, 'Is this coat ... ?');
INSERT INTO `question` VALUES (4, 1, 'Is Diana ... ?');
INSERT INTO `question` VALUES (5, 1, 'Salary increase will not be higher than cost of ... .');
INSERT INTO `question` VALUES (6, 2, 'Feel free to ... the engineer for more assistance.');
INSERT INTO `question` VALUES (7, 2, 'Mr. Goa ... the proposal before he looked at the guidelines.');
INSERT INTO `question` VALUES (8, 2, 'If the project is a success, the office ... more help.');
INSERT INTO `question` VALUES (9, 2, 'The office manager wants the computers ... by tomorrow.');
INSERT INTO `question` VALUES (10, 2, 'Suggestions were requested; ..., none were offered.');
INSERT INTO `question` VALUES (11, 1, '... the workers put in a lot of effort, profits were not high.');
INSERT INTO `question` VALUES (12, 1, 'Ms.Kwak has already conducted market research ... two new products.');
INSERT INTO `question` VALUES (13, 1, 'Transactions ... .');
INSERT INTO `question` VALUES (14, 1, 'An answering machine takes messages ... weekends.');
INSERT INTO `question` VALUES (15, 1, 'The solution cannot be determined ... the problem is identified.');
INSERT INTO `question` VALUES (16, 1, 'The director had her assistant ... the memo.');
INSERT INTO `question` VALUES (17, 1, 'If you ... a touch tone phone, you won''t need an operator.');
INSERT INTO `question` VALUES (18, 1, 'Our company ... Metro Messenger Service since 1988.');
INSERT INTO `question` VALUES (19, 1, 'The new employees will ... during training sessions.');
INSERT INTO `question` VALUES (20, 1, 'The ... result will be announced next week.');
INSERT INTO `question` VALUES (21, 1, 'The financing deal is expected to ... in a matter of weeks.');
INSERT INTO `question` VALUES (22, 1, 'The supervisor wants the inventory ... by next Thursday.');
INSERT INTO `question` VALUES (23, 1, 'I would ask for a special meeting if I ... her.');
INSERT INTO `question` VALUES (24, 1, 'The company appreciates not only the president''s ambition ... his idea.');
INSERT INTO `question` VALUES (25, 1, 'A new collection of programs ... in the conference room.');
INSERT INTO `question` VALUES (26, 1, 'The suplier said the department ... a surplus in the future.');
INSERT INTO `question` VALUES (27, 1, 'Some managers wouldn''t let the secretaries ... early yesterday.');
INSERT INTO `question` VALUES (28, 1, 'Sales performances has been poor; ..., the store will close soon.');
INSERT INTO `question` VALUES (29, 1, 'Ms.Jacobs is one ... our best agents.');
INSERT INTO `question` VALUES (30, 1, 'Please refer to your personal ... identification number.');
INSERT INTO `question` VALUES (31, 1, '... you transfer your account, sign on the dotted line.');
INSERT INTO `question` VALUES (32, 1, 'No one has turned on the air conditioner ... .');
INSERT INTO `question` VALUES (33, 1, 'Akinori remained calm ... his anticipation.');
INSERT INTO `question` VALUES (34, 1, 'All bank branches are open ... 8:30 A.M to 4:00 P.M.');
INSERT INTO `question` VALUES (35, 1, 'We need more details; ..., who, when, what, and where.');

-- --------------------------------------------------------

-- 
-- Structure de la table `reponse`
-- 

DROP TABLE IF EXISTS `reponse`;
CREATE TABLE IF NOT EXISTS `reponse` (
  `id_reponse` int(11) NOT NULL auto_increment,
  `id_question` int(11) NOT NULL default '0',
  `repA` varchar(50) NOT NULL default '',
  `repB` varchar(50) NOT NULL default '',
  `repC` varchar(50) default NULL,
  `repD` varchar(50) default NULL,
  PRIMARY KEY  (`id_reponse`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

-- 
-- Contenu de la table `reponse`
-- 

INSERT INTO `reponse` VALUES (1, 1, 'a', 'an', 'the', 'one');
INSERT INTO `reponse` VALUES (2, 2, 'the', '(nothing)', 'every', 'all');
INSERT INTO `reponse` VALUES (3, 3, 'yours', 'your', 'the yours', NULL);
INSERT INTO `reponse` VALUES (4, 4, 'a friend of yours', 'a your friend', 'your friend', NULL);
INSERT INTO `reponse` VALUES (5, 5, 'life', 'live', 'living', 'lived');
INSERT INTO `reponse` VALUES (6, 6, 'call on', 'call to', 'call forward', 'call at');
INSERT INTO `reponse` VALUES (7, 7, 'writes', 'had written', 'has written', 'will write');
INSERT INTO `reponse` VALUES (8, 8, 'would hire', 'hired', 'can hire', 'could have hired');
INSERT INTO `reponse` VALUES (9, 9, 'will be installed', 'installing', 'install', 'installed');
INSERT INTO `reponse` VALUES (10, 10, 'in spite of', 'therefore', 'however', 'for this purpose');
INSERT INTO `reponse` VALUES (11, 11, 'Whatever', 'Why', 'Even though', 'However');
INSERT INTO `reponse` VALUES (12, 12, 'around', 'from', 'on', 'near');
INSERT INTO `reponse` VALUES (13, 13, 'have weekly been documented', 'have been documented weekly', 'weekly have been documented', 'have been weekly documented');
INSERT INTO `reponse` VALUES (14, 14, 'from', 'at', 'in', 'on');
INSERT INTO `reponse` VALUES (15, 15, 'if', 'when', 'until', 'wich');
INSERT INTO `reponse` VALUES (16, 16, 'signing', 'signed', 'will sign', 'sign');
INSERT INTO `reponse` VALUES (17, 17, 'had', 'are having', 'have', 'will have');
INSERT INTO `reponse` VALUES (18, 18, 'use', 'used', 'had used', 'has been using');
INSERT INTO `reponse` VALUES (19, 19, 'catch out', 'catch on', 'catch in', 'catch down');
INSERT INTO `reponse` VALUES (20, 20, 'finalized', 'finally', 'finalist', 'final');
INSERT INTO `reponse` VALUES (21, 21, 'go ahead', 'go out', 'go through', 'go beyond');
INSERT INTO `reponse` VALUES (22, 22, 'will be finished', 'finish', 'finished', 'finishing');
INSERT INTO `reponse` VALUES (23, 23, 'was', 'were', 'am', 'would be');
INSERT INTO `reponse` VALUES (24, 24, 'or', 'but also', 'with', 'and if');
INSERT INTO `reponse` VALUES (25, 25, 'are presenting', 'are presented', 'present', 'is being presented');
INSERT INTO `reponse` VALUES (26, 26, 'has been ordered', 'order', 'should order', 'ordered');
INSERT INTO `reponse` VALUES (27, 27, 'leave', 'leaves', 'leaving', 'left');
INSERT INTO `reponse` VALUES (28, 28, 'neverthless', 'therefore', 'on the whole', 'but');
INSERT INTO `reponse` VALUES (29, 29, 'from', 'by', 'of', 'than');
INSERT INTO `reponse` VALUES (30, 30, 'identify', 'identifies', 'identification', 'identied');
INSERT INTO `reponse` VALUES (31, 31, 'While', 'Because', 'During', 'Before');
INSERT INTO `reponse` VALUES (32, 32, 'yet', 'never', 'already', 'soon');
INSERT INTO `reponse` VALUES (33, 33, 'while', 'in spite of', 'with', 'as');
INSERT INTO `reponse` VALUES (34, 34, 'in', 'at', 'from', 'by');
INSERT INTO `reponse` VALUES (35, 35, 'for example', 'moreover', 'however', 'accordingly');

-- --------------------------------------------------------

-- 
-- Structure de la table `resultats`
-- 

DROP TABLE IF EXISTS `resultats`;
CREATE TABLE IF NOT EXISTS `resultats` (
  `id_resultat` int(4) NOT NULL auto_increment,
  `id_user` int(2) NOT NULL default '0',
  `id_feuille_reponse` int(11) NOT NULL default '0',
  `tx_reussite` float NOT NULL default '0',
  `date_resulat` date NOT NULL default '0000-00-00',
  PRIMARY KEY  (`id_resultat`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Contenu de la table `resultats`
-- 


-- --------------------------------------------------------

-- 
-- Structure de la table `type_exo`
-- 

DROP TABLE IF EXISTS `type_exo`;
CREATE TABLE IF NOT EXISTS `type_exo` (
  `id_type_exo` int(2) NOT NULL auto_increment,
  `nom_type_exo` varchar(30) NOT NULL default '',
  PRIMARY KEY  (`id_type_exo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- 
-- Contenu de la table `type_exo`
-- 

INSERT INTO `type_exo` VALUES (1, 'Grammaire');
INSERT INTO `type_exo` VALUES (2, 'Correction des erreurs');

-- --------------------------------------------------------

-- 
-- Structure de la table `user`
-- 

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL auto_increment,
  `activation` binary(1) NOT NULL default '0',
  `groupe` varchar(25) NOT NULL default '',
  `login_user` varchar(20) NOT NULL default '',
  `mdp_user` varchar(20) NOT NULL default '',
  `nom_user` varchar(30) NOT NULL default '',
  `prenom_user` varchar(30) NOT NULL default '',
  PRIMARY KEY  (`id_user`),
  UNIQUE KEY `login_user` (`login_user`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- 
-- Contenu de la table `user`
-- 

INSERT INTO `user` VALUES (1, 0x31, 'admin', 'Frederic', 'TOEIC', 'DA SILVA', 'Frederic');
INSERT INTO `user` VALUES (2, 0x30, 'admin', 'damien', 'pass', 'COURMONT', 'Damien');
        