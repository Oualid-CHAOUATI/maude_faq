-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 28, 2023 at 10:10 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `adherent`
--

DROP TABLE IF EXISTS `adherent`;
CREATE TABLE IF NOT EXISTS `adherent` (
  `num` smallint NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `prenom` varchar(25) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `adr_rue` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `adr_cp` mediumint DEFAULT NULL,
  `adr_ville` varchar(25) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `tel` varchar(10) COLLATE utf8mb3_bin DEFAULT NULL,
  `adr_mail` varchar(25) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  PRIMARY KEY (`num`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `adherent`
--

INSERT INTO `adherent` (`num`, `nom`, `prenom`, `adr_rue`, `adr_cp`, `adr_ville`, `tel`, `adr_mail`) VALUES
(1, 'Deltour', 'Charles', '4 rue du Pont', 95100, 'Argenteuil', '01...', 'cdeltour@hotmail.com'),
(2, 'Fime', 'Nadia', '5 rue du Montparnasse', 75006, 'Paris', '06...', NULL),
(3, 'Ertau', 'Frank', '4 Avenue du président Wilson', 94320, 'Cachan', '01...', 'frank.ertau@laposte.net'),
(4, 'Maneur', 'David', '6 rue Charles Péguy', 94000, 'Créteil', '01...', NULL),
(5, 'Berezovski', 'Sylvie', '18 rue du Château', 91150, 'Etampes', '01...', NULL),
(6, 'Finley', 'Pascale', '25 rue de Tolbiac', 75013, 'Paris', '01...', 'pascfinley@yahoo.fr'),
(7, 'Vofur', 'Hector', '18 rue Deparcieux', 75014, 'Paris', '01...', 'hvofur@free.fr'),
(8, 'Derzou', 'Fred', '230 avenue de la liberté', 93100, 'Montreuil-sous-bois', '01...', 'ouzala@aol.com'),
(9, 'Serty', 'Julie', '23 rue du Calvaire', 92800, 'Suresnes', '01...', NULL),
(10, 'Vofur', 'Victor', '18 rue Deparcieux', 75014, 'Paris', '01...', 'victor.vofur@laposte.net'),
(11, 'Calende', 'Hugo', '22 rue des jardins', 91000, 'Evry', '01...', NULL),
(12, 'Jemba', 'Hubert', '10 rue du 8 mai 1945', 78000, 'Versailles', '01...', 'jaimeba@yahoo.fr'),
(13, 'Morin', 'Séverine', '4 rue du bac', 93000, 'Saint Denis', '01...', 'morinsev@hotmail.com'),
(14, 'Benrech', 'Tarek', '79 rue de Sèvres', 95000, 'Nanterre', '01...', NULL),
(15, 'Nguyen', 'Marc', '53 impasse Tourneur', 91400, 'Orsay', '01...', 'nguyen774@wanadoo.fr'),
(16, 'Louali', 'Karima', '89 avenue Poincaré', 75001, 'Paris', '01...', 'kloua@caramail.fr'),
(17, 'Paolo', 'Marco', '14 rue du Caire', 91300, 'Massy', '01...', NULL),
(18, 'Map', 'Joanna', '120 boulevard Voltaire', 75012, 'Paris', '01...', NULL),
(19, 'Koundé', 'Fatoumata', '4 Place Carrée', 77000, 'Melun', '01...ppp', 'àào'),
(20, 'Derissam___00', 'Bachir_', '1 rue des Indes__', 78550, 'Houdan__', '0753..', 'deissam.bachir@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `auteur`
--

DROP TABLE IF EXISTS `auteur`;
CREATE TABLE IF NOT EXISTS `auteur` (
  `num` smallint NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `prenom` varchar(25) COLLATE utf8mb3_bin DEFAULT NULL,
  `num_nationalite` smallint DEFAULT NULL,
  PRIMARY KEY (`num`),
  KEY `auteur_fk_1` (`num_nationalite`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `auteur`
--

INSERT INTO `auteur` (`num`, `nom`, `prenom`, `num_nationalite`) VALUES
(1, 'Dostoeïvskiàà', 'Fédor__', NULL),
(2, 'Semprun', 'Jorge', NULL),
(3, 'Tolstoï', 'Leon', NULL),
(4, 'Steinbeck', 'John', NULL),
(5, 'Ferro', 'Marc', NULL),
(6, 'Stocker', 'Bram', 5),
(7, 'Shelley', 'Marie', 6),
(8, 'King', 'Stephen', NULL),
(9, 'Grass', 'Gunter', 7),
(10, 'Barjavel', 'René', NULL),
(11, 'Simmons', 'Dan', NULL),
(12, 'Herbert', 'Frank', NULL),
(13, 'Clarke', 'Arthur C.', 6),
(14, 'Bradbury', 'Ray', NULL),
(15, 'Dick', 'Philip K.', NULL),
(16, 'Orwell', 'Georges', 6),
(17, 'Hugo', 'Victor', NULL),
(18, 'Zola', 'Emile', NULL),
(19, 'Morris', 'morriis', 8),
(20, 'Flaubert', 'Gustave', NULL),
(21, 'Asimov', 'Isaac', NULL),
(22, 'Miller', 'Frank', NULL),
(23, 'Eco', 'Umberto', 9),
(24, 'Irving', 'John', NULL),
(25, 'Braudel', 'Fernand', NULL),
(26, 'Camus', 'Albert', NULL),
(27, 'Vian', 'Boris', NULL),
(28, 'Lehane', 'Dennis', NULL),
(29, 'Oe', 'Kenzaburo', NULL),
(30, 'Kertesz', 'Imre', 11),
(31, 'Garcia Marquez', 'Gabriel', 12),
(32, 'Pratt', 'Hugo', 9),
(33, 'Cooper', 'Fenimore', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `continent`
--

DROP TABLE IF EXISTS `continent`;
CREATE TABLE IF NOT EXISTS `continent` (
  `num` int NOT NULL AUTO_INCREMENT,
  `libelle` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`num`),
  UNIQUE KEY `libelle` (`libelle`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `continent`
--

INSERT INTO `continent` (`num`, `libelle`) VALUES
(2, 'afrique'),
(4, 'amerique nord'),
(5, 'amerique sud'),
(3, 'asie'),
(6, 'australie'),
(1, 'europe__'),
(7, 'russie_');

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

DROP TABLE IF EXISTS `genre`;
CREATE TABLE IF NOT EXISTS `genre` (
  `num` tinyint NOT NULL AUTO_INCREMENT,
  `libelle` varchar(25) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`num`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`num`, `libelle`) VALUES
(1, 'Littérature__'),
(2, 'Terreur'),
(3, 'Science-Fiction'),
(4, 'BD'),
(5, 'Essai'),
(6, 'Policier'),
(7, 'Roman contemporain__'),
(15, 'azaz'),
(16, 'qqq'),
(17, 'ss'),
(18, 'sqa');

-- --------------------------------------------------------

--
-- Table structure for table `livre`
--

DROP TABLE IF EXISTS `livre`;
CREATE TABLE IF NOT EXISTS `livre` (
  `num` smallint NOT NULL AUTO_INCREMENT,
  `isbn` varchar(13) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `titre` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `langue` varchar(25) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `prix` float DEFAULT NULL,
  `editeur` varchar(25) COLLATE utf8mb3_bin DEFAULT NULL,
  `annee` smallint DEFAULT NULL,
  `num_auteur` smallint DEFAULT NULL,
  `num_genre` tinyint DEFAULT NULL,
  PRIMARY KEY (`num`),
  KEY `livre_fk_1` (`num_auteur`),
  KEY `livre_fk_2` (`num_genre`)
) ENGINE=InnoDB AUTO_INCREMENT=107 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `livre`
--

INSERT INTO `livre` (`num`, `isbn`, `titre`, `langue`, `prix`, `editeur`, `annee`, `num_auteur`, `num_genre`) VALUES
(1, '2-07-038692-6', 'Les fréres Karamazov', 'Russe', 7, 'Folio', 1880, 1, 1),
(2, '2-07-036893-9', 'Le Joueur', 'Russe', 5, 'Folio', 1866, 1, 1),
(3, '2-07-074049-8', 'L\'écriture ou la vie', 'Français', 15, 'Gallimard', 1994, 2, 1),
(4, '2-07-036287-6', 'Guerre et Paix', 'Russe', 8, 'Folio', 1869, 3, 1),
(5, '2-07-036083-0', 'Les raisins de la colère', 'Américain', 6, 'Folio', 1947, 4, 1),
(6, '2-02-018381-1', 'Histoire des colonisations', 'Français', 20, 'Seuil', 1994, 5, 5),
(7, '2-266-05366-3', 'Dracula', 'Anglais', 6, 'Pocket', 1897, 6, 2),
(8, '2-501-00279-2', 'Frankenstein', 'Anglais', 6, 'Marabout', 1818, 7, 2),
(9, '2-277-21197-4', 'Shining', 'Américain', 6, 'J\'ai Lu', 1977, 8, 2),
(10, '2-8001-1455-X', 'L\'évasion des Dalton', 'Français', 9, 'Dupuis', 1960, 19, 4),
(11, '2-258-00139-0', 'La Nuit des temps', 'Français', 6, 'Pocket', 1968, 10, 3),
(12, '2-253-13862-2', 'Nuit d\'été', 'Français', 6, 'Albin Michel', 1991, 11, 2),
(13, '2-266-02665-8', 'Dune', 'Américain', 6, 'Pocket', 1965, 12, 3),
(14, '2-290-00349-2', '2001 L\'odyssée de l\'espace', 'Anglais', 5, 'J\'ai Lu', 1968, 13, 3),
(15, '2-207-30008-0', 'Fahrenheit 451', 'Américain', 5, 'Denoël', 1953, 14, 3),
(16, '2-277-21768-9', 'Blade Runner', 'Américain', 5, 'J\'ai Lu', 1968, 15, 3),
(17, '2-8001-1452-5', 'Les cousins Dalton', 'Français', 7, 'Dupuis', 1958, 19, 4),
(18, '2-07-036822-X', '1984', 'Anglais', 7, 'Folio', 1948, 16, 1),
(19, '2-07-037093-3', 'Quatrevingt-treize', 'Français', 6, 'Folio', 1874, 17, 1),
(20, '2-266-08308-2', 'Les Misérables', 'Français', 12, 'Folio', 1862, 17, 1),
(21, '2-07-037001-1', 'Germinal', 'Français', 7, 'Folio', 1885, 18, 1),
(22, '2-07-037051-8', 'L\'assommoir', 'Français', 7, 'Folio', 1877, 18, 1),
(23, '2-8001-1441-X', 'La mine d\'or de Dick Digger', 'Français', 9, 'Dargaud', 1949, 19, 4),
(24, '2-234-04964-4', 'Lourdes', 'Français', 15, 'Stock', 1894, 18, 1),
(25, '2-234-04963-6', 'Paris', 'Français', 15, 'Stock', 1898, 18, 1),
(26, '2-8001-1457-6', 'Sur la piste des Dalton', 'Français', 9, 'Dupuis', 1962, 19, 4),
(27, '2-8001-1462-2', 'Les Dalton dans le blizzard', 'Français', 9, 'Dupuis', 1963, 19, 4),
(28, '2-205-00585-5', 'Ma Dalton', 'Français', 9, 'Dargaud', 1971, 19, 4),
(29, '2-234-049652', 'Rome', 'Français', 15, 'Stock', 1896, 18, 1),
(30, '2-02-031430-4', 'Le Tambour', 'Allemand', 9, 'Seuil', 1959, 9, 1),
(31, '2-8001-1471-1', 'Tortillas pour les Dalton', 'Français', 9, 'Dupuis', 1967, 19, 4),
(32, '2-070-30878-2', 'Salammbô', 'Français', 8, 'Folio', 1862, 20, 1),
(33, '2-207-30089-7', 'Fondation', 'Américain', 7, 'Denoël', 1951, 21, 3),
(34, '2-070-41311-X', 'Madame Bovary', 'Français', 8, 'Folio', 1857, 20, 1),
(35, '2-277-12453-2', 'Les robots', 'Américain', 5, 'J\'ai Lu', 1950, 21, 3),
(36, '2-070-74277-6', 'Notes de Hiroshima', 'Japonais', 11, 'Marabout', 1965, 29, 5),
(37, '2-7427-1542-8', 'Etre sans destin', 'Hongrois', 9, 'Actes Sud', 1975, 30, 1),
(38, '2-020-23811-X', 'Cent ans de solitude', 'Espagnol', 6, 'Actes Sud', 1967, 31, 1),
(39, '2-253-00597-5', 'A l\'Est d\'Eden', 'Américain', 7, 'Le Livre de Poche', 1952, 4, 1),
(40, '2-02-036376-3', 'Le Monde selon Garp', 'Américain', 8, 'Seuil', 1976, 24, 7),
(41, '2-253-00333-8', 'Le Nom de la Rose', 'Italien', 6, 'Le Livre de Poche', 1980, 23, 1),
(42, '2-7436-1281-9', 'Mystic River', 'Américain', 9, 'Rivages', 2001, 28, 6),
(43, '2-070-36042-3', 'La Peste', 'Français', 5, 'Folio', 1947, 26, 1),
(44, '2-2531-4087-2', 'L\'Ecume des Jours', 'Français', 8, 'Folio', 1947, 27, 7),
(45, '2-87827-038-X', 'Sin City', 'Américain', 11, 'Rackham', 1994, 22, 4),
(46, '2-203-34411-3', 'La Ballade de la Mer Salée', 'Italien', 14, 'Casterman', 1967, 32, 4),
(47, '2-253-06168-9', 'La Méditerranée', 'Français', 8, 'Le Livre de Poche', 1949, 25, 5),
(48, '2-08-070611-X', 'Le Dernier des Mohicans__', 'Américain', 7, 'Marabout', 1826, 33, 1);

-- --------------------------------------------------------

--
-- Table structure for table `nationalite`
--

DROP TABLE IF EXISTS `nationalite`;
CREATE TABLE IF NOT EXISTS `nationalite` (
  `num` smallint NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `num_continent` int DEFAULT NULL,
  PRIMARY KEY (`num`),
  KEY `fk_num_continent` (`num_continent`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `nationalite`
--

INSERT INTO `nationalite` (`num`, `libelle`, `num_continent`) VALUES
(5, 'Irlandais', 1),
(6, 'Britannique', 1),
(7, 'Allemand', 1),
(8, 'Belge', 1),
(9, 'Italien', 1),
(11, 'Hongrois', 1),
(12, 'Colombien', 5);

-- --------------------------------------------------------

--
-- Table structure for table `pret`
--

DROP TABLE IF EXISTS `pret`;
CREATE TABLE IF NOT EXISTS `pret` (
  `num` smallint NOT NULL AUTO_INCREMENT,
  `num_livre` smallint NOT NULL DEFAULT '0',
  `num_adherent` smallint NOT NULL DEFAULT '0',
  `date_pret` date DEFAULT NULL,
  `date_retour_prevue` date NOT NULL,
  `date_retour_reelle` date DEFAULT NULL,
  PRIMARY KEY (`num`),
  KEY `pret_fk_1` (`num_livre`),
  KEY `pret_fk_2` (`num_adherent`)
) ENGINE=InnoDB AUTO_INCREMENT=453 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Dumping data for table `pret`
--

INSERT INTO `pret` (`num`, `num_livre`, `num_adherent`, `date_pret`, `date_retour_prevue`, `date_retour_reelle`) VALUES
(5, 2, 5, '2013-05-22', '2013-06-05', '2013-06-04'),
(6, 2, 6, '2013-06-06', '2013-06-20', '2013-06-13'),
(7, 2, 14, '2013-05-04', '2013-05-18', '2013-05-20'),
(8, 3, 6, '2013-05-07', '2013-05-21', '2013-05-18'),
(9, 3, 7, '2013-05-19', '2013-06-02', '2013-06-02'),
(10, 3, 8, '2013-06-03', '2013-06-17', '2013-06-16'),
(11, 4, 9, '2013-05-10', '2013-05-24', '2013-05-19'),
(12, 4, 10, '2013-05-20', '2013-06-03', '2013-06-05');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auteur`
--
ALTER TABLE `auteur`
  ADD CONSTRAINT `auteur_fk_1` FOREIGN KEY (`num_nationalite`) REFERENCES `nationalite` (`num`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `livre`
--
ALTER TABLE `livre`
  ADD CONSTRAINT `livre_fk_1` FOREIGN KEY (`num_auteur`) REFERENCES `auteur` (`num`),
  ADD CONSTRAINT `livre_fk_2` FOREIGN KEY (`num_genre`) REFERENCES `genre` (`num`);

--
-- Constraints for table `nationalite`
--
ALTER TABLE `nationalite`
  ADD CONSTRAINT `fk_num_continent` FOREIGN KEY (`num_continent`) REFERENCES `continent` (`num`);

--
-- Constraints for table `pret`
--
ALTER TABLE `pret`
  ADD CONSTRAINT `pret_fk_1` FOREIGN KEY (`num_livre`) REFERENCES `livre` (`num`),
  ADD CONSTRAINT `pret_fk_2` FOREIGN KEY (`num_adherent`) REFERENCES `adherent` (`num`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
