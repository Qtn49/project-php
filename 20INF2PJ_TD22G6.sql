-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 15, 2020 at 10:03 AM
-- Server version: 10.3.7-MariaDB
-- PHP Version: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `20INF2PJ_TD22G6`
--

-- --------------------------------------------------------

--
-- Table structure for table `Article`
--

CREATE TABLE `Article` (
  `id_arti` int(11) NOT NULL,
  `date_arti` date NOT NULL,
  `date_modif_arti` date DEFAULT NULL,
  `titre_arti` varchar(255) NOT NULL,
  `texte_arti` text NOT NULL,
  `mode_arti` varchar(9) NOT NULL DEFAULT 'brouillon',
  `id_uti` int(11) DEFAULT NULL,
  `id_cate` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Article`
--

INSERT INTO `Article` (`id_arti`, `date_arti`, `date_modif_arti`, `titre_arti`, `texte_arti`, `mode_arti`, `id_uti`, `id_cate`) VALUES
(1, '2020-10-07', NULL, 'test', 'brhuihuicbhckbhkz', 'brouillon', 1, NULL),
(2, '2020-10-07', NULL, 'test', 'bhbeihhefhefjkcejkncejnke', 'brouillon', NULL, NULL),
(3, '2020-10-07', NULL, 'Coucou les copains', 'Une chaise est un type de siège, c\'est-à-dire de meuble muni d’un dossier et destiné à ce qu’une personne s’assoie dessus. Un siège pour une personne sans dossier ni repose-bras est un tabouret ; pour plus d\'une personne c\'est un sofa ou un banc.\r\n\r\nLe dossier s’élève parfois au-dessus de la hauteur de la tête, et souvent ne s’étend pas jusqu’au siège, permettant une circulation d\'air. Le dossier et parfois l\'assise sont souvent faits de matériaux poreux ou sont ajourés à fins de décoration et de ventilation, il y a quelquefois des repose-têtes séparés.\r\n\r\nLa chaise comporte :\r\n\r\nun piètement, composé de quatre pieds, parfois renforcé par une entretoise ;\r\nune assise, la profondeur d\'assise d\'une chaise est comprise entre 45 et 55 cm, et sa hauteur est normalement de 45 cm ;\r\nun dossier.\r\nElle ne comprend que très rarement des accotoirs (bras) réservés aux fauteuils. mais elle peut comporter un accoudoir sur le haut du dossier comme pour le Prie-Dieu ou la chaise ponteuse.', 'finis', NULL, NULL),
(4, '2020-10-07', '2020-11-12', 'je met n\'importe quoi', 'bhbukbjkbhkcdbhckzelbehzdckbdhzckbjkbdcejhdecbhjdcebhjdcebhdcejkbcdehjbjkcbehcjbkdchejbcdehjkbhjdcbhjdcbehjkcbhjcdebzhczejhdzucalblidzabhlazdcbljbhjlcdzbhjbjhlbhlzbhljbhklbhlkbjhlbdzchkjlzdcbhzdjclbhdzcjlhzjadcvzgdkvdzcghkvzcdbkzcdvban,sdcbnsvqcbsnd, qdsbn,vsvgqsvsdjkvdhsjcvb;svbjxbdsjsvdxjqsvxjhdsxvhdjsqvs', 'finis', NULL, NULL),
(5, '2020-10-14', NULL, 'hiiiii', 'this is a mf test', 'brouillon', NULL, NULL),
(6, '2020-11-12', NULL, 'Mastermind pour téléphone', 'Le jeu mobile Mastermind est disponible gratuitement https://play.google.com/store/apps/details?id=com.theog.mastermind2020\" ici', 'finis', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Catégorie`
--

CREATE TABLE `Catégorie` (
  `id_cate` int(11) NOT NULL,
  `titre_cate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Correspondance`
--

CREATE TABLE `Correspondance` (
  `id_corres` int(11) NOT NULL,
  `id_arti` int(11) DEFAULT NULL,
  `id_hashtag` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Hashtag`
--

CREATE TABLE `Hashtag` (
  `id_hashtag` int(11) NOT NULL,
  `hashtag` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Hashtag`
--

INSERT INTO `Hashtag` (`id_hashtag`, `hashtag`) VALUES
(1, '#TropBo'),
(2, '#Nice'),
(3, '#Sympa'),
(4, '#Bv'),
(5, '#Bg');

-- --------------------------------------------------------

--
-- Table structure for table `Utilisateur`
--

CREATE TABLE `Utilisateur` (
  `id_uti` int(11) NOT NULL,
  `nom_uti` varchar(255) NOT NULL,
  `prenom_uti` varchar(255) NOT NULL,
  `mail_uti` varchar(255) NOT NULL,
  `mdp_uti` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Utilisateur`
--

INSERT INTO `Utilisateur` (`id_uti`, `nom_uti`, `prenom_uti`, `mail_uti`, `mdp_uti`) VALUES
(1, 'GUEZ', 'Quentin', 'quentin.guez.etu@univ-lemans.fr', '66c65f89e2836ba08530fe5da7fbbfa3'),
(2, 'yolo', 'jeanfédus', 'jeanfedus.yolo@orange.fr', 'f029fd46b8db73330f4cad4e930bd044'),
(3, 'yolo', 'jeanfédus', 'jeanfedus.yolo@orange.fr', 'f029fd46b8db73330f4cad4e930bd044'),
(4, 'yolo', 'jeanfédus', 'jeanfedus.yolo@orange.fr', 'f029fd46b8db73330f4cad4e930bd044'),
(5, 'Allain', 'Thibaud', 'thibaud.allain.etu@univ-lemans.fr', 'f34dd2e2c656d2643f153d81276fc969'),
(6, 'bhbhbjk', 'bhjkbjk', 'bhbhjh@bkhkbkh', 'cb9ba0050a7864f0061070acc9421864'),
(7, 'vbivfzivfzbi', 'nfnoivfz', 'nvfnivfze@veef', 'a169ef329e4e03a62b4d4fa7047b84e2'),
(8, 'Guillet', 'Théo', 'theoguillet.etu@univ-lemans.fr', '1697918c7f9551712f531143df2f8a37'),
(9, 'Orveillon', 'Orane', 'orane.orveillon.etu@univ-lemans.fr', 'fae1456853164b3201a9c62ae7f2fddd'),
(10, 'demo', 'php', 'demo@php', '35cedc34bb996b7bd068a18e7439a99f'),
(11, 'un', 'deux', 'trois@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(12, 'Rannou', 'Pierre', 'pierrerannou72@gmail.com', '8a92d54f3f367f9e081540727593e6a0'),
(13, 'test', 'test', 'test@test', '098f6bcd4621d373cade4e832627b4f6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Article`
--
ALTER TABLE `Article`
  ADD PRIMARY KEY (`id_arti`),
  ADD KEY `id_uti` (`id_uti`),
  ADD KEY `id_cate` (`id_cate`);

--
-- Indexes for table `Catégorie`
--
ALTER TABLE `Catégorie`
  ADD PRIMARY KEY (`id_cate`);

--
-- Indexes for table `Correspondance`
--
ALTER TABLE `Correspondance`
  ADD PRIMARY KEY (`id_corres`),
  ADD KEY `id_arti` (`id_arti`),
  ADD KEY `id_hashtag` (`id_hashtag`);

--
-- Indexes for table `Hashtag`
--
ALTER TABLE `Hashtag`
  ADD PRIMARY KEY (`id_hashtag`);

--
-- Indexes for table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  ADD PRIMARY KEY (`id_uti`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Article`
--
ALTER TABLE `Article`
  MODIFY `id_arti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `Catégorie`
--
ALTER TABLE `Catégorie`
  MODIFY `id_cate` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Correspondance`
--
ALTER TABLE `Correspondance`
  MODIFY `id_corres` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Hashtag`
--
ALTER TABLE `Hashtag`
  MODIFY `id_hashtag` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  MODIFY `id_uti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Article`
--
ALTER TABLE `Article`
  ADD CONSTRAINT `Article_ibfk_1` FOREIGN KEY (`id_uti`) REFERENCES `Utilisateur` (`id_uti`),
  ADD CONSTRAINT `Article_ibfk_2` FOREIGN KEY (`id_cate`) REFERENCES `Catégorie` (`id_cate`);

--
-- Constraints for table `Correspondance`
--
ALTER TABLE `Correspondance`
  ADD CONSTRAINT `Correspondance_ibfk_1` FOREIGN KEY (`id_arti`) REFERENCES `Article` (`id_arti`),
  ADD CONSTRAINT `Correspondance_ibfk_2` FOREIGN KEY (`id_hashtag`) REFERENCES `Hashtag` (`id_hashtag`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
