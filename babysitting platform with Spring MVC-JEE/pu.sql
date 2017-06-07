-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 03 Mars 2016 à 13:53
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `pu`
--

-- --------------------------------------------------------

--
-- Structure de la table `parent`
--

CREATE TABLE IF NOT EXISTS `parent` (
  `idUser` bigint(20) NOT NULL AUTO_INCREMENT,
  `adresse` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `tel` varchar(30) NOT NULL,
  `userName` varchar(30) NOT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `parent`
--

INSERT INTO `parent` (`idUser`, `adresse`, `email`, `nom`, `password`, `prenom`, `tel`, `userName`) VALUES
(1, 'mohilugkyfht', 'mhlugykthdr', 'mkjlhvgcfx', ':lkb;jng', 'kljoihkujgyftdr', ':kj;,hng', 'kjh;kgcnfxg'),
(2, 'pmolikhuj', 'ùjpnholbikuvjgychtxg', 'ùpmoliuvyjgct', 'moliukjyht', 'olibvhujyct', 'mohluigkyjht', 'oièuytrg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
