-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 10 avr. 2020 à 08:35
-- Version du serveur :  5.7.17
-- Version de PHP :  7.1.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ppe-mesguen`
--

-- --------------------------------------------------------

--
-- Structure de la table `chauffeur`
--

CREATE TABLE `chauffeur` (
  `CHFID` char(32) NOT NULL,
  `CHFNOM` char(32) DEFAULT NULL,
  `CHFPRENOM` char(32) DEFAULT NULL,
  `CHFTEL` char(32) DEFAULT NULL,
  `CHFMAIL` char(32) DEFAULT NULL,
  `Permis` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `chauffeur`
--

INSERT INTO `chauffeur` (`CHFID`, `CHFNOM`, `CHFPRENOM`, `CHFTEL`, `CHFMAIL`, `Permis`) VALUES
('MAT', 'Autret', 'Mathis', '06.27.35.46.00', 'AutretMathis@mesguen.fr', 1),
('MQL', 'Quentel', 'Mehdi', '06.31.80.60.98', 'QuentelMehdi@mesguen.fr', 1),
('NRD', 'Richard', 'Noe', '06.71.18.59.80', 'RichardNoe@mesguen.fr', 0),
('MLX', 'Leroux', 'Maxence', '06.34.42.65.40', 'LerouxMaxence@mesguen.fr', 0),
('TFH', 'Floch', 'Thomas', '06.59.59.20.13', 'FlochThomas@mesguen.fr', 0),
('ELN', 'LeBihan', 'Enzo', '06.62.35.08.02', 'LeBihanEnzo@mesguen.fr', 0),
('AMN', 'Morvan', 'Aaron', '06.72.78.10.32', 'MorvanAaron@mesguen.fr', 0),
('ELE', 'LeBorgne', 'Evan', '06.58.28.72.17', 'LeBorgneEvan@mesguen.fr', 0),
('MPT', 'Prigent', 'Marwane', '06.88.18.35.93', 'PrigentMarwane@mesguen.fr', 0),
('DBN', 'Bizien', 'Dorian', '06.51.05.52.29', 'BizienDorian@mesguen.fr', 0),
('AHN', 'Hamon', 'Alexis', '06.47.11.91.40', 'HamonAlexis@mesguen.fr', 3),
('TBN', 'Breton', 'Thibault', '06.44.47.42.83', 'BretonThibault@mesguen.fr', 0),
('BAL', 'Abgrall', 'Baptiste', '06.99.24.04.51', 'AbgrallBaptiste@mesguen.fr', 0),
('ACE', 'Corre', 'Anthony', '06.84.03.04.90', 'CorreAnthony@mesguen.fr', 0),
('ASN', 'Simon', 'Amaury', '06.46.97.80.81', 'SimonAmaury@mesguen.fr', 3),
('MRD', 'Richard', 'Maelys', '06.56.87.66.27', 'RichardMaelys@mesguen.fr', 0),
('CPT', 'Prigent', 'Chloe', '06.25.16.54.72', 'PrigentChloe@mesguen.fr', 0),
('YTY', 'Tanguy', 'Yuna', '06.80.69.11.89', 'TanguyYuna@mesguen.fr', 0),
('LCE', 'Corre', 'Lilou', '06.26.04.98.04', 'CorreLilou@mesguen.fr', 0),
('PBN', 'Breton', 'Pauline', '06.57.63.88.88', 'BretonPauline@mesguen.fr', 0),
('MDL', 'Daniel', 'Maewenn', '06.49.46.01.77', 'DanielMaewenn@mesguen.fr', 0),
('LLE', 'LeBorgne', 'Lana', '06.23.25.84.63', 'LeBorgneLana@mesguen.fr', 0),
('ELS', 'Lucas', 'Elise', '06.15.88.27.03', 'LucasElise@mesguen.fr', 0),
('GGM', 'Guillerm', 'Guillemette', '06.21.64.71.35', 'GuillermGuillemette@mesguen.fr', 0),
('CLE', 'Le Moigne', 'Chloe', '06.20.80.34.93', 'LeMoigneChloe@mesguen.fr', 0),
('MCT', 'Coat', 'Melissa', '06.60.79.10.15', 'CoatMelissa@mesguen.fr', 0),
('NMN', 'Martin', 'Nathalie', '06.45.81.97.69', 'MartinNathalie@mesguen.fr', 0),
('MLL', 'LeGall', 'Mathilde', '06.90.34.28.81', 'LeGallMathilde@mesguen.fr', 0),
('PDN', 'Derrien', 'Pauline', '06.25.30.65.32', 'DerrienPauline@mesguen.fr', 0);

-- --------------------------------------------------------

--
-- Structure de la table `commune`
--

CREATE TABLE `commune` (
  `VILID` char(32) NOT NULL,
  `VILNOM` char(32) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commune`
--

INSERT INTO `commune` (`VILID`, `VILNOM`) VALUES
('29098', 'LAMPAUL-PLOUARZEL'),
('29029', 'CLEDEN-POHER'),
('29149', 'MILIZAC'),
('29063', 'GOULIEN'),
('29059', 'GARLAN'),
('29219', 'LE PONTHOU'),
('29295', 'TREMAOUEZAN'),
('29184', 'PLOUENAN'),
('29246', 'SAINT-ELOY'),
('29013', 'BOTMEUR'),
('29016', 'BRASPARTS'),
('29134', 'LOCRONAN'),
('29119', 'LANRIVOARE'),
('29065', 'GOURLIZON'),
('29090', 'KERLAZ'),
('29025', 'CAST'),
('29068', 'GUICLAN'),
('29204', 'PLOUNEVENTER'),
('29112', 'LANILDUT'),
('29173', 'PLONEIS'),
('29080', 'HOPITAL-CAMFROUT'),
('29108', 'LANDUDEC'),
('29293', 'TREGUNC'),
('29259', 'SAINT-POL-DE-LEON'),
('29185', 'PLOUESCAT'),
('29132', 'LOCQUENOLE'),
('29113', 'LANMEUR'),
('29206', 'PLOUNEVEZ-LOCHRIST'),
('29193', 'PLOUGOURVEST'),
('29094', 'KERNOUES'),
('29276', 'SIBIRIL'),
('29160', 'PLABENNEC'),
('29089', 'KERGLOFF'),
('29176', 'PLONEVEZ-PORZAY'),
('29282', 'TREBABU'),
('29075', 'GUIPAVAS'),
('29174', 'PLONEOUR-LANVERN'),
('29216', 'PLUGUFFAN'),
('29266', 'SAINT-THEGONNEC'),
('29278', 'SPEZET'),
('29158', 'PENMARCH'),
('29034', 'LE CLOITRE-SAINT-THEGONNEC'),
('29101', 'LANDEDA'),
('29239', 'ROSCOFF'),
('29288', 'TREGARANTEC'),
('29218', 'PONT-CROIX'),
('29135', 'LOCTUDY'),
('29167', 'PLOGASTEL-SAINT-GERMAIN'),
('29145', 'CONFORT-MEILARS'),
('29226', 'POULLAN-SUR-MER'),
('29128', 'LOC-EGUINER'),
('29245', 'SAINT-DIVY'),
('29084', 'ILE-MOLENE'),
('29175', 'PLONEVEZ-DU-FAOU'),
('29179', 'PLOUDANIEL'),
('29008', 'BEUZEC-CAP-SIZUN'),
('29250', 'SAINT-HERNIN'),
('29229', 'QUEMENEVEN'),
('29042', 'CROZON'),
('29079', 'HENVIC'),
('29265', 'SAINTE-SEVE'),
('29040', 'LE CONQUET'),
('29275', 'SCRIGNAC'),
('29249', 'SAINT-GOAZEC'),
('29151', 'MORLAIX'),
('29263', 'SAINT-SEGAL'),
('29209', 'PLOUVIEN'),
('29106', 'LANDREVARZEC'),
('29195', 'PLOUGUERNEAU'),
('29221', 'PORSPODER'),
('29289', 'TREGARVAN'),
('29041', 'CORAY'),
('29110', 'LANGOLEN'),
('29010', 'BODILIS'),
('29060', 'GOUESNACH'),
('29202', 'PLOUNEOUR-MENEZ'),
('29236', 'RIEC-SUR-BELON'),
('29187', 'PLOUGAR'),
('29189', 'PLOUGASTEL-DAOULAS'),
('29035', 'COAT-MEAL'),
('29213', 'PLOUZEVEDE'),
('29248', 'SAINT-FREGANT'),
('29153', 'NEVEZ'),
('29224', 'POULDERGAT'),
('29299', 'TREOUERGAT'),
('29005', 'BAYE'),
('29024', 'CARHAIX-PLOUGUER'),
('29260', 'SAINT-RENAN'),
('29047', 'LE DRENNEC'),
('29099', 'LAMPAUL-PLOUDALMEZEAU'),
('29093', 'KERNILIS'),
('29046', 'DOUARNENEZ'),
('29056', 'LA FOREST-LANDERNEAU'),
('29286', 'TREFLEVENEZ'),
('29205', 'PLOUNEVEZEL'),
('29012', 'BOLAZEC'),
('29241', 'ROSPORDEN'),
('29198', 'PLOUIDER'),
('29190', 'PLOUGONVELIN'),
('29002', 'ARZANO'),
('29227', 'POULLAOUEN'),
('29095', 'KERSAINT-PLABENNEC'),
('29066', 'GUENGAT'),
('29215', 'PLOZEVET'),
('29243', 'SAINT-COULITZ'),
('29087', 'LE JUCH'),
('29201', 'PLOUMOGUER'),
('29191', 'PLOUGONVEN'),
('29078', 'HANVEC'),
('29053', 'LE FAOU'),
('29021', 'BRIGNOGAN-PLAGE'),
('29270', 'SAINT-URBAIN'),
('29083', 'ILE-DE-SEIN'),
('29166', 'PLOEVEN'),
('29214', 'PLOVAN'),
('29264', 'SAINT-SERVAIS'),
('29247', 'SAINT-EVARZEC'),
('29032', 'CLOHARS-FOUESNANT'),
('29294', 'LE TREHOU'),
('29233', 'QUIMPERLE'),
('29287', 'TREFLEZ'),
('29234', 'REDENE'),
('29027', 'CHATEAUNEUF-DU-FAOU'),
('29156', 'PENCRAN'),
('29072', 'GUILVINEC'),
('29178', 'PLOUDALMEZEAU'),
('29272', 'SAINT-YVI'),
('29237', 'LA ROCHE-MAURICE'),
('29062', 'GOUEZEC'),
('29064', 'GOULVEN'),
('29232', 'QUIMPER'),
('29269', 'SAINT-THURIEN'),
('29131', 'LOCMELAR'),
('29285', 'TREFLAOUENAN'),
('29133', 'LOCQUIREC'),
('29114', 'LANNEANOU'),
('29023', 'CARANTEC'),
('29212', 'PLOUZANE'),
('29150', 'MOELAN-SUR-MER'),
('29159', 'PEUMERIT'),
('29022', 'CAMARET-SUR-MER'),
('29107', 'LANDUDAL'),
('29073', 'GUIMAEC'),
('29081', 'HUELGOAT'),
('29061', 'GOUESNOU'),
('29163', 'PLEYBER-CHRIST'),
('29100', 'LANARVILY'),
('29271', 'SAINT-VOUGAY'),
('29014', 'BOTSORHEL'),
('29217', 'PONT-AVEN'),
('29147', 'MELLAC'),
('29102', 'LANDELEAU'),
('29069', 'GUILERS'),
('29199', 'PLOUIGNEAU'),
('29162', 'PLEYBEN'),
('29123', 'LENNON'),
('29045', 'DIRINON'),
('29067', 'GUERLESQUIN'),
('29017', 'BRELES'),
('29220', 'PONT-L\'ABBE'),
('29148', 'MESPAUL'),
('29007', 'BERRIEN'),
('29104', 'LANDEVENNEC'),
('29296', 'TREMEOC'),
('29172', 'PLOMODIERN'),
('29281', 'TOURCH'),
('29291', 'TREGOUREZ'),
('29235', 'LE RELECQ-KERHUON'),
('29279', 'TAULE'),
('29036', 'COLLOREC'),
('29280', 'TELGRUC-SUR-MER'),
('29018', 'BRENNILIS'),
('29254', 'SAINT-MARTIN-DES-CHAMPS'),
('29207', 'PLOURIN-LES-MORLAIX'),
('29033', 'LE CLOITRE-PLEYBEN'),
('29251', 'SAINT-JEAN-DU-DOIGT'),
('29180', 'PLOUDIRY'),
('29015', 'BOURG-BLANC'),
('29126', 'LOC-BREVALAIRE'),
('29290', 'TREGLONOU'),
('29124', 'LESNEVEN'),
('29006', 'BENODET'),
('29146', 'MELGVEN'),
('29115', 'LANNEDERN'),
('29019', 'BREST'),
('29111', 'LANHOUARNEAU'),
('29001', 'ARGOL'),
('29211', 'PLOUYE'),
('29054', 'LA FEUILLEE'),
('29169', 'PLOGONNEC'),
('29130', 'LOCMARIA-PLOUZANE'),
('29030', 'CLEDER'),
('29082', 'ILE-DE-BATZ'),
('29052', 'ESQUIBIEN'),
('29120', 'LANVEOC'),
('29196', 'PLOUGUIN'),
('29085', 'ILE-TUDY'),
('29222', 'PORT-LAUNAY'),
('29208', 'PLOURIN'),
('29142', 'LOTHEY'),
('29262', 'SAINT-SAUVEUR'),
('29057', 'LA FORET-FOUESNANT'),
('29183', 'PLOUEGAT-MOYSAN'),
('29268', 'SAINT-THONAN'),
('29116', 'LANNEUFFRET'),
('29244', 'SAINT-DERRIEN'),
('29298', 'TREOGAT'),
('29161', 'PLEUVEN'),
('29004', 'BANNALEC'),
('29192', 'PLOUGOULM'),
('29051', 'ERGUE-GABERIC'),
('29225', 'POULDREUZIC'),
('29300', 'LE TREVOUX'),
('29091', 'KERLOUAN'),
('29105', 'LANDIVISIAU'),
('29165', 'PLOBANNALEC-LESCONIL'),
('29125', 'LEUHAN'),
('29109', 'LANDUNVEZ'),
('29182', 'PLOUEGAT-GUERAND'),
('29277', 'SIZUN'),
('29228', 'PRIMELIN'),
('29152', 'MOTREFF'),
('29186', 'PLOUEZOC\'H'),
('29144', 'LA MARTYRE'),
('29230', 'QUERRIEN'),
('29011', 'BOHARS'),
('29297', 'TREMEVEN'),
('29043', 'DAOULAS'),
('29136', 'LOCUNOLE'),
('29055', 'LE FOLGOET'),
('29140', 'LOPERHET'),
('29139', 'LOPEREC'),
('29197', 'PLOUHINEC'),
('29284', 'TREFFIAGAT'),
('29038', 'COMMANA'),
('29256', 'SAINT-NIC'),
('29141', 'LOQUEFFRET'),
('29070', 'GUILER-SUR-GOYEN'),
('29127', 'LOC-EGUINER-SAINT-THEGONNEC'),
('29117', 'LANNILIS'),
('29168', 'PLOGOFF'),
('29301', 'TREZILIDE'),
('29292', 'TREGUENNEC'),
('29302', 'PONT-DE-BUIS-LES-QUIMERCH'),
('29267', 'SAINT-THOIS'),
('29003', 'AUDIERNE'),
('29031', 'CLOHARS-CARNOET'),
('29037', 'COMBRIT'),
('29261', 'SAINT-RIVOAL'),
('29103', 'LANDERNEAU'),
('29086', 'IRVILLAC'),
('29143', 'MAHALON'),
('29097', 'LAMPAUL-GUIMILIAU'),
('29181', 'PLOUEDERN'),
('29058', 'FOUESNANT'),
('29238', 'ROSCANVEL'),
('29026', 'CHATEAULIN'),
('29020', 'BRIEC'),
('29039', 'CONCARNEAU'),
('29071', 'GUILLIGOMARC\'H'),
('29188', 'PLOUGASNOU'),
('29240', 'ROSNOEN'),
('29048', 'EDERN'),
('29273', 'SANTEC'),
('29076', 'GUIPRONVEL'),
('29129', 'LOCMARIA-BERRIEN'),
('29171', 'PLOMEUR'),
('29155', 'OUESSANT'),
('29077', 'GUISSENY'),
('29044', 'DINEAULT'),
('29257', 'SAINT-PABU'),
('29177', 'PLOUARZEL'),
('29170', 'PLOMELIN'),
('29252', 'SAINT-JEAN-TROLIMON'),
('29274', 'SCAER'),
('29137', 'LOGONNA-DAOULAS'),
('29203', 'PLOUNEOUR-TREZ'),
('29049', 'ELLIANT'),
('29074', 'GUIMILIAU'),
('29122', 'LAZ'),
('29210', 'PLOUVORN'),
('29028', 'CLEDEN-CAP-SIZUN'),
('29255', 'SAINT-MEEN');

-- --------------------------------------------------------

--
-- Structure de la table `documentation`
--

CREATE TABLE `documentation` (
  `DOCID` char(32) NOT NULL,
  `TRNNUM` char(32) NOT NULL,
  `TYPDOCID` char(32) NOT NULL,
  `DOCURL` char(32) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `etape`
--

CREATE TABLE `etape` (
  `TRNNUM` char(32) NOT NULL,
  `ETPID` char(32) NOT NULL,
  `LIEUID` char(32) NOT NULL,
  `ETPHREMIN` datetime DEFAULT NULL,
  `ETPHREMAX` datetime DEFAULT NULL,
  `ETPHREDEBUT` datetime DEFAULT NULL,
  `ETPHREFIN` datetime DEFAULT NULL,
  `ETPNBPALLIV` smallint(6) DEFAULT NULL,
  `ETPNBPALLIVEUR` smallint(6) DEFAULT NULL,
  `ETPNBPALCHARG` smallint(6) DEFAULT NULL,
  `ETPNBPALCHARGEUR` datetime DEFAULT NULL,
  `ETPCHEQUE` smallint(6) DEFAULT NULL,
  `ETPETATLIV` char(32) DEFAULT NULL,
  `ETPCOMMENTAIRE` char(32) DEFAULT NULL,
  `ETPVAL` char(32) DEFAULT NULL,
  `ETPKM` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `etape`
--

INSERT INTO `etape` (`TRNNUM`, `ETPID`, `LIEUID`, `ETPHREMIN`, `ETPHREMAX`, `ETPHREDEBUT`, `ETPHREFIN`, `ETPNBPALLIV`, `ETPNBPALLIVEUR`, `ETPNBPALCHARG`, `ETPNBPALCHARGEUR`, `ETPCHEQUE`, `ETPETATLIV`, `ETPCOMMENTAIRE`, `ETPVAL`, `ETPKM`) VALUES
('1164367', '3', '1443', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('1164367', '4', '1431', '2019-09-13 15:30:00', '2019-09-13 18:00:00', '2013-09-19 09:33:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Proxi Baye entre 15:30 et 18:00', NULL, NULL),
('1164368', '1', '1429', '2019-09-27 15:42:00', '2019-09-27 15:43:00', '2027-09-19 10:05:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL),
('1164369', '1', '1428', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('1164369', '2', '1442', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('1164369', '3', '1436', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('1164369', '4', '1451', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('1164369', '5', '1438', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('1164370', '1', '1429', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('1164370', '2', '1440', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('1164370', '3', '1443', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('1164370', '4', '1448', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `lieu`
--

CREATE TABLE `lieu` (
  `LIEUID` char(32) NOT NULL,
  `VILID` char(32) NOT NULL,
  `LIEUNOM` char(32) DEFAULT NULL,
  `LIEUCOORDGPS` char(32) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `lieu`
--

INSERT INTO `lieu` (`LIEUID`, `VILID`, `LIEUNOM`, `LIEUCOORDGPS`) VALUES
('1427', '29001', 'Auchan ARGOL', NULL),
('1428', '29002', 'Monoprix ARZANO', NULL),
('1429', '29003', 'Auchan AUDIERNE', NULL),
('1430', '29004', 'Super U BANNALEC', NULL),
('1431', '29005', 'Proxi BAYE', NULL),
('1432', '29006', 'Biocoop BENODET', NULL),
('1433', '29007', 'Casino BERRIEN', NULL),
('1434', '29008', 'Super U BEUZEC-CAP-SIZUN', NULL),
('1435', '29010', 'Proxi BODILIS', NULL),
('1436', '29011', 'Monoprix BOHARS', NULL),
('1437', '29012', 'Leclerc BOLAZEC', NULL),
('1438', '29013', 'Franprix BOTMEUR', NULL),
('1439', '29014', 'Auchan BOTSORHEL', NULL),
('1440', '29015', 'Auchan BOURG-BLANC', NULL),
('1441', '29016', 'Carrefour BRASPARTS', NULL),
('1442', '29017', 'Auchan BRELES', NULL),
('1443', '29018', 'Casino BRENNILIS', NULL),
('1444', '29019', 'Franprix BREST', NULL),
('1445', '29020', 'Carrefour BRIEC', NULL),
('1446', '29021', 'Carrefour Market BRIGNOGAN-PLAGE', NULL),
('1447', '29022', 'Carrefour CAMARET-SUR-MER', NULL),
('1448', '29023', 'Casino CARANTEC', NULL),
('1449', '29024', 'Super U CARHAIX-PLOUGUER', NULL),
('1450', '29025', 'Franprix CAST', NULL),
('1451', '29026', 'Carrefour Market CHATEAULIN', NULL),
('1452', '29027', 'Super U CHATEAUNEUF-DU-FAOU', NULL),
('1453', '29028', 'Franprix  CLEDEN-CAP-SIZUN', NULL),
('1454', '29029', 'Proxi CLEDEN-POHER', NULL),
('1455', '29030', 'Franprix CLEDER', NULL),
('1456', '29031', 'Intermarche CLOHARS-CARNOET', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `permis`
--

CREATE TABLE `permis` (
  `idPermis` int(10) NOT NULL,
  `libellePermis` char(30) NOT NULL,
  `remorque` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `permis`
--

INSERT INTO `permis` (`idPermis`, `libellePermis`, `remorque`) VALUES
(0, 'C1', 0),
(1, 'C1E', 1),
(2, 'C', 0),
(3, 'CE', 1);

-- --------------------------------------------------------

--
-- Structure de la table `photo`
--

CREATE TABLE `photo` (
  `PHOID` char(32) NOT NULL,
  `TRNNUM` char(32) NOT NULL,
  `ETPID` char(32) NOT NULL,
  `PHOURL` char(32) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `remorque`
--

CREATE TABLE `remorque` (
  `idRemorque` int(10) NOT NULL,
  `annee` year(4) NOT NULL,
  `PTAC` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `remorque`
--

INSERT INTO `remorque` (`idRemorque`, `annee`, `PTAC`) VALUES
(0, 2013, 875),
(1, 2018, 1380),
(2, 2016, 900);

-- --------------------------------------------------------

--
-- Structure de la table `tournee`
--

CREATE TABLE `tournee` (
  `TRNNUM` int(11) NOT NULL,
  `VEHIMMAT` char(32) NOT NULL,
  `CHFID` char(32) NOT NULL,
  `TRNCOMMENTAIRE` char(32) DEFAULT NULL,
  `TRNPECCHAUFFEUR` char(32) DEFAULT NULL,
  `TRNDTE` date DEFAULT NULL,
  `Remorque` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tournee`
--

INSERT INTO `tournee` (`TRNNUM`, `VEHIMMAT`, `CHFID`, `TRNCOMMENTAIRE`, `TRNPECCHAUFFEUR`, `TRNDTE`, `Remorque`) VALUES
(1164367, 'IP-540-OX', 'MAT', 'Autret sur IP-540-OX', '13/09/19 09:31', '2018-05-04', 0),
(1164423, 'IP-540-OX', 'AMN', '', '23/03/20 15:56', '2020-03-23', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `typedocumentation`
--

CREATE TABLE `typedocumentation` (
  `TYPDOCID` char(32) NOT NULL,
  `TYPDOCLIB` char(32) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `numero` int(11) NOT NULL,
  `login` char(20) NOT NULL,
  `password` char(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`numero`, `login`, `password`) VALUES
(47, 'MQL', 'b9d4390f67bd5410f884344b31d0446b'),
(46, 'MAT', 'e2404621b1ad01f647c5b220f932bde7');

-- --------------------------------------------------------

--
-- Structure de la table `vehicule`
--

CREATE TABLE `vehicule` (
  `VEHIMMAT` char(32) NOT NULL,
  `VEHNOM` char(32) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `vehicule`
--

INSERT INTO `vehicule` (`VEHIMMAT`, `VEHNOM`) VALUES
('BD-802-HE', 'MERCEDES'),
('ER-862-IQ', 'SCANIA'),
('FJ-553-HU', 'VOLVO'),
('HO-766-TL', 'SCANIA'),
('IP-540-OX', 'MAN'),
('IZ-221-YP', 'SCANIA'),
('JZ-782-IL', 'MAN'),
('LE-383-TY', 'MAN'),
('OP-958-OM', 'SCANIA'),
('PJ-818-MU', 'SCANIA'),
('PW-231-BN', 'VOLVO'),
('RW-979-GC', 'MERCEDES'),
('RY-709-GU', 'VOLVO'),
('TB-301-PJ', 'MAN'),
('TO-971-YB', 'VOLVO'),
('TT-815-QS', 'MAN'),
('VL-924-XU', 'MERCEDES'),
('XG-597-CO', 'VOLVO');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `chauffeur`
--
ALTER TABLE `chauffeur`
  ADD PRIMARY KEY (`CHFID`);

--
-- Index pour la table `commune`
--
ALTER TABLE `commune`
  ADD PRIMARY KEY (`VILID`);

--
-- Index pour la table `documentation`
--
ALTER TABLE `documentation`
  ADD PRIMARY KEY (`DOCID`),
  ADD KEY `I_FK_DOCUMENTATION_TOURNEE` (`TRNNUM`),
  ADD KEY `I_FK_DOCUMENTATION_TYPEDOCUMENTATION` (`TYPDOCID`);

--
-- Index pour la table `etape`
--
ALTER TABLE `etape`
  ADD PRIMARY KEY (`TRNNUM`,`ETPID`),
  ADD KEY `I_FK_ETAPE_TOURNEE` (`TRNNUM`),
  ADD KEY `I_FK_ETAPE_LIEU` (`LIEUID`);

--
-- Index pour la table `lieu`
--
ALTER TABLE `lieu`
  ADD PRIMARY KEY (`LIEUID`),
  ADD KEY `I_FK_LIEU_COMMUNE` (`VILID`);

--
-- Index pour la table `permis`
--
ALTER TABLE `permis`
  ADD PRIMARY KEY (`idPermis`);

--
-- Index pour la table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`PHOID`),
  ADD KEY `I_FK_PHOTO_ETAPE` (`TRNNUM`,`ETPID`);

--
-- Index pour la table `remorque`
--
ALTER TABLE `remorque`
  ADD PRIMARY KEY (`idRemorque`);

--
-- Index pour la table `tournee`
--
ALTER TABLE `tournee`
  ADD PRIMARY KEY (`TRNNUM`),
  ADD KEY `I_FK_TOURNEE_VEHICULE` (`VEHIMMAT`),
  ADD KEY `I_FK_TOURNEE_CHAUFFEUR` (`CHFID`);

--
-- Index pour la table `typedocumentation`
--
ALTER TABLE `typedocumentation`
  ADD PRIMARY KEY (`TYPDOCID`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`numero`),
  ADD UNIQUE KEY `login` (`login`);

--
-- Index pour la table `vehicule`
--
ALTER TABLE `vehicule`
  ADD PRIMARY KEY (`VEHIMMAT`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `tournee`
--
ALTER TABLE `tournee`
  MODIFY `TRNNUM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1164424;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `numero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
