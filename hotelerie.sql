-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mar 03 Juin 2014 à 16:40
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `hotelerie`
--
CREATE DATABASE IF NOT EXISTS `hotelerie` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `hotelerie`;

-- --------------------------------------------------------

--
-- Structure de la table `chambre`
--

CREATE TABLE IF NOT EXISTS `chambre` (
  `N_chambre` int(11) NOT NULL AUTO_INCREMENT,
  `N_type` int(11) NOT NULL,
  `N_reservation` bigint(20) DEFAULT NULL,
  `N_etage` int(11) NOT NULL,
  `N_supplement` int(11) NOT NULL,
  PRIMARY KEY (`N_chambre`),
  KEY `N_Reservation` (`N_reservation`),
  KEY `N_type` (`N_type`),
  KEY `N_supplement` (`N_supplement`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=66 ;

--
-- Contenu de la table `chambre`
--

INSERT INTO `chambre` (`N_chambre`, `N_type`, `N_reservation`, `N_etage`, `N_supplement`) VALUES
(59, 1, 26, 0, 1),
(60, 1, 26, 0, 1),
(62, 1, 26, 0, 1),
(65, 3, 40, 4, 2);

-- --------------------------------------------------------

--
-- Structure de la table `client_principal`
--

CREATE TABLE IF NOT EXISTS `client_principal` (
  `Num_client_p` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(12) NOT NULL,
  `Prenom` varchar(12) NOT NULL,
  `titre` varchar(15) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `adresse` text NOT NULL,
  `ville` varchar(15) NOT NULL,
  `code_postal` int(11) NOT NULL,
  `raison_social` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`Num_client_p`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `client_principal`
--

INSERT INTO `client_principal` (`Num_client_p`, `Nom`, `Prenom`, `titre`, `tel`, `email`, `adresse`, `ville`, `code_postal`, `raison_social`) VALUES
(1, 'Soultan', 'Iman', 'Mlle', '+212', 'I.Soultan@gmail.com', '', '', 8000, NULL),
(2, 'Salhi', 'Mohamed', 'Mr', '+212 625369874', 'salhi.mohamed@gmail.com', '2eme etage N°13 , rue 17 mai hay mohammadi', 'Agadir', 80000, NULL),
(3, 'Rai', 'Raja', 'Mlle', '+212 659751553', 'Raja@gmail.com', '18 rue Libia , hay Dakhla', 'Agadir', 85000, NULL),
(4, 'Christmas', 'Sophie', 'Mme', '+212 695321475', 'Christmas.S@gmail.com', '', '', 0, NULL),
(5, 'Christmas', 'Sophie', 'Mme', '+212 695321475', 'Christmas.S@gmail.com', '', '', 5000, NULL),
(6, 'Elmousawi', 'Rajae', 'Mr', '+212678990654', 'rajae_e@hotmail.com', 'hay enahda bloc2 app  N 3', 'Agadir', 80360, NULL),
(7, 'Mourad', 'lamia', 'Mlle', '566666', 'sdsdsd', 'sdsdsd', 'dsdsd', 23232, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `client_secondaire`
--

CREATE TABLE IF NOT EXISTS `client_secondaire` (
  `N_Client_S` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(12) NOT NULL,
  `Prenom` varchar(12) NOT NULL,
  `Categorie` varchar(15) NOT NULL,
  `Age` int(11) NOT NULL,
  `N_reservation` bigint(20) DEFAULT NULL,
  `sexe` varchar(30) NOT NULL,
  PRIMARY KEY (`N_Client_S`),
  KEY `N_reservation` (`N_reservation`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `client_secondaire`
--

INSERT INTO `client_secondaire` (`N_Client_S`, `Nom`, `Prenom`, `Categorie`, `Age`, `N_reservation`, `sexe`) VALUES
(1, 'Alaoui', 'abdelilah', 'Adulte', 50, 1, '0'),
(2, 'Chakir', 'Nariman', 'Enfant', 10, 2, '0'),
(3, 'Ilias', 'Ilias', 'Jeune', 18, 3, '0'),
(5, 'sara', 'dsds', 'adulte', 19, 40, '');

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

CREATE TABLE IF NOT EXISTS `compte` (
  `N_compte` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_utilisateur` varchar(30) NOT NULL,
  `prenom_utilisateur` varchar(30) NOT NULL,
  `identifiant` varchar(50) NOT NULL,
  `mot_de_passe` int(10) NOT NULL,
  PRIMARY KEY (`N_compte`),
  UNIQUE KEY `identifiant` (`identifiant`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `contrat`
--

CREATE TABLE IF NOT EXISTS `contrat` (
  `N_contrat` int(11) NOT NULL AUTO_INCREMENT,
  `N_type` int(11) NOT NULL,
  `Libellé` varchar(50) NOT NULL,
  `Date_début` date NOT NULL,
  `Date_fin` date NOT NULL,
  PRIMARY KEY (`N_contrat`),
  KEY `N_type` (`N_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `contrat`
--

INSERT INTO `contrat` (`N_contrat`, `N_type`, `Libellé`, `Date_début`, `Date_fin`) VALUES
(1, 1, '', '2014-05-01', '2015-05-01');

-- --------------------------------------------------------

--
-- Structure de la table `extras`
--

CREATE TABLE IF NOT EXISTS `extras` (
  `N_extra` int(50) NOT NULL AUTO_INCREMENT,
  `Libelle` varchar(30) NOT NULL,
  PRIMARY KEY (`N_extra`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `extras`
--

INSERT INTO `extras` (`N_extra`, `Libelle`) VALUES
(1, 'Restauration');

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

CREATE TABLE IF NOT EXISTS `facture` (
  `N_facture` int(11) NOT NULL AUTO_INCREMENT,
  `N_reservation` bigint(20) NOT NULL,
  `Montant_impayé` int(11) NOT NULL,
  `Montant_payé` int(11) NOT NULL,
  `Montant_total` int(11) NOT NULL,
  `TVA` int(11) NOT NULL,
  PRIMARY KEY (`N_facture`),
  KEY `N_reservation` (`N_reservation`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `facture`
--

INSERT INTO `facture` (`N_facture`, `N_reservation`, `Montant_impayé`, `Montant_payé`, `Montant_total`, `TVA`) VALUES
(1, 1, 300, 500, 800, 3),
(2, 3, 0, 900, 900, 3);

-- --------------------------------------------------------

--
-- Structure de la table `mode_paiement`
--

CREATE TABLE IF NOT EXISTS `mode_paiement` (
  `N_mode` int(11) NOT NULL AUTO_INCREMENT,
  `Mode_paiement` varchar(50) NOT NULL,
  PRIMARY KEY (`N_mode`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `mode_paiement`
--

INSERT INTO `mode_paiement` (`N_mode`, `Mode_paiement`) VALUES
(1, 'Paiement espssqsqsèces'),
(2, 'Paiement par chèque ou postal'),
(3, 'paiement par versement bancaire'),
(4, 'Paiement par carte de paiement');

-- --------------------------------------------------------

--
-- Structure de la table `prestation`
--

CREATE TABLE IF NOT EXISTS `prestation` (
  `N_prestation` int(11) NOT NULL AUTO_INCREMENT,
  `N_reservation` bigint(20) DEFAULT NULL,
  `Libelle` varchar(50) NOT NULL,
  `Tarif` double NOT NULL,
  `N_extra` int(30) NOT NULL,
  PRIMARY KEY (`N_prestation`),
  KEY `N_reservation` (`N_reservation`),
  KEY `N_extra` (`N_extra`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `reglement`
--

CREATE TABLE IF NOT EXISTS `reglement` (
  `N_reglement` int(11) NOT NULL AUTO_INCREMENT,
  `N_mode` int(11) NOT NULL,
  `N_facture` int(11) NOT NULL,
  `Montant_reglé` int(11) NOT NULL,
  `Date_reglement` date NOT NULL,
  PRIMARY KEY (`N_reglement`),
  KEY `N_mode` (`N_mode`),
  KEY `N_facture` (`N_facture`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `reglement`
--

INSERT INTO `reglement` (`N_reglement`, `N_mode`, `N_facture`, `Montant_reglé`, `Date_reglement`) VALUES
(1, 1, 1, 600, '2014-05-22'),
(2, 2, 2, 900, '2014-05-23');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
  `N_reservation` bigint(20) NOT NULL AUTO_INCREMENT,
  `Client_P` int(11) NOT NULL,
  `Date_arrive` date NOT NULL,
  `Date_depart` date NOT NULL,
  PRIMARY KEY (`N_reservation`),
  KEY `Client_P` (`Client_P`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Contenu de la table `reservation`
--

INSERT INTO `reservation` (`N_reservation`, `Client_P`, `Date_arrive`, `Date_depart`) VALUES
(1, 1, '2014-05-15', '2014-05-30'),
(2, 3, '2014-05-16', '2014-05-20'),
(3, 4, '2014-05-28', '2014-06-19'),
(4, 5, '2014-07-24', '2014-07-31'),
(14, 3, '0000-00-00', '0000-00-00'),
(15, 2, '2014-06-26', '0000-00-00'),
(16, 2, '2014-06-07', '1970-01-01'),
(17, 3, '2014-06-19', '2014-06-09'),
(18, 6, '2014-06-28', '2014-06-30'),
(19, 6, '2014-06-23', '2014-06-25'),
(20, 6, '2014-06-23', '2014-06-25'),
(21, 6, '2014-06-23', '2014-06-25'),
(23, 2, '2014-06-21', '2014-06-10'),
(24, 6, '2014-06-02', '2014-06-04'),
(25, 3, '2014-06-12', '2014-06-04'),
(26, 1, '2014-06-19', '2014-06-17'),
(27, 1, '2014-06-19', '2014-06-17'),
(28, 4, '1970-01-01', '1970-01-01'),
(31, 2, '2014-06-04', '2014-06-03'),
(32, 2, '2014-06-04', '2014-06-03'),
(33, 2, '2014-06-11', '2014-06-02'),
(34, 1, '1970-01-01', '1970-01-01'),
(35, 1, '1970-01-01', '1970-01-01'),
(36, 2, '1970-01-01', '1970-01-01'),
(37, 3, '1970-01-01', '1970-01-01'),
(38, 1, '1970-01-01', '1970-01-01'),
(39, 7, '2014-06-11', '2014-06-17'),
(40, 6, '2014-06-06', '2014-06-13');

-- --------------------------------------------------------

--
-- Structure de la table `supplement`
--

CREATE TABLE IF NOT EXISTS `supplement` (
  `N_supplement` int(15) NOT NULL AUTO_INCREMENT,
  `Libelle` varchar(30) NOT NULL,
  `tarif` double NOT NULL,
  PRIMARY KEY (`N_supplement`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `supplement`
--

INSERT INTO `supplement` (`N_supplement`, `Libelle`, `tarif`) VALUES
(1, 'Vue mer', 450),
(2, 'Vue piscine', 450),
(5, 'Vue centre ville', 150);

-- --------------------------------------------------------

--
-- Structure de la table `type_chambre`
--

CREATE TABLE IF NOT EXISTS `type_chambre` (
  `N_type` int(11) NOT NULL AUTO_INCREMENT,
  `Type` varchar(50) NOT NULL,
  `Max_Personne` int(11) NOT NULL,
  `Lit_simple` tinyint(1) NOT NULL,
  `Lit_double` tinyint(1) NOT NULL,
  PRIMARY KEY (`N_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `type_chambre`
--

INSERT INTO `type_chambre` (`N_type`, `Type`, `Max_Personne`, `Lit_simple`, `Lit_double`) VALUES
(1, 'simple', 1, 1, 0),
(2, 'double', 2, 0, 1),
(3, 'triple', 3, 1, 1),
(4, 'quadriple', 4, 1, 1);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `chambre`
--
ALTER TABLE `chambre`
  ADD CONSTRAINT `chambre_ibfk_1` FOREIGN KEY (`N_supplement`) REFERENCES `supplement` (`N_supplement`),
  ADD CONSTRAINT `chambre_ibfk_2` FOREIGN KEY (`N_reservation`) REFERENCES `reservation` (`N_reservation`),
  ADD CONSTRAINT `chambre_ibfk_3` FOREIGN KEY (`N_type`) REFERENCES `type_chambre` (`N_type`);

--
-- Contraintes pour la table `contrat`
--
ALTER TABLE `contrat`
  ADD CONSTRAINT `contrat_ibfk_1` FOREIGN KEY (`N_type`) REFERENCES `type_chambre` (`N_type`);

--
-- Contraintes pour la table `prestation`
--
ALTER TABLE `prestation`
  ADD CONSTRAINT `prestation_ibfk_2` FOREIGN KEY (`N_extra`) REFERENCES `extras` (`N_extra`),
  ADD CONSTRAINT `prestation_ibfk_1` FOREIGN KEY (`N_reservation`) REFERENCES `reservation` (`N_reservation`);

--
-- Contraintes pour la table `reglement`
--
ALTER TABLE `reglement`
  ADD CONSTRAINT `reglement_ibfk_1` FOREIGN KEY (`N_mode`) REFERENCES `mode_paiement` (`N_mode`),
  ADD CONSTRAINT `reglement_ibfk_2` FOREIGN KEY (`N_facture`) REFERENCES `facture` (`N_facture`);

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`Client_P`) REFERENCES `client_principal` (`Num_client_p`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
