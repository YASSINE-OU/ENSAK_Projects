-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2019 at 05:30 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pfe_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `absence`
--

CREATE TABLE `absence` (
  `id_absence` int(11) NOT NULL,
  `id_seance` int(11) NOT NULL,
  `id_etud` int(11) NOT NULL,
  `justifiee` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absence`
--

INSERT INTO `absence` (`id_absence`, `id_seance`, `id_etud`, `justifiee`) VALUES
(1, 1, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nom_admin` varchar(30) DEFAULT NULL,
  `prenom_admin` varchar(30) DEFAULT NULL,
  `email_admin` varchar(30) NOT NULL,
  `password_admin` varchar(30) NOT NULL,
  `login_admin` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nom_admin`, `prenom_admin`, `email_admin`, `password_admin`, `login_admin`) VALUES
(1, 'boukhla', 'yassine', 'yassineboukhla@gmail.com', '03210321.', 'admin'),
(2, 'ouaarab', 'yassine', 'yassineouaarab@gmail.com', '0526182276', 'admin2');

-- --------------------------------------------------------

--
-- Table structure for table `affecter`
--

CREATE TABLE `affecter` (
  `id_ens` int(11) NOT NULL,
  `id_module` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `affecter`
--

INSERT INTO `affecter` (`id_ens`, `id_module`) VALUES
(3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `enseignant`
--

CREATE TABLE `enseignant` (
  `id_ens` int(11) NOT NULL,
  `nom_ens` varchar(25) NOT NULL,
  `prenom_ens` varchar(25) NOT NULL,
  `adresse_ens` varchar(30) DEFAULT NULL,
  `email_ens` varchar(25) NOT NULL,
  `phone_ens` varchar(30) DEFAULT NULL,
  `password_ens` varchar(30) DEFAULT NULL,
  `login_ens` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enseignant`
--

INSERT INTO `enseignant` (`id_ens`, `nom_ens`, `prenom_ens`, `adresse_ens`, `email_ens`, `phone_ens`, `password_ens`, `login_ens`) VALUES
(1, 'bouk', 'soufiane', 'Adresse soufiane', 'soufiane.bouk@gmail.com', '0615335244', 'soufiane', 'soufiane'),
(2, 'MOHAMED', 'REDA', 'Adresse reda', 'mohamed.reda@gmail.com', '0622334455', 'reda', 'reda'),
(3, 'allo', 'mounir', 'Adresse mounir', 'mounir.allo@gmail.com', '0655998877', 'mounir', 'mounir'),
(4, 'aqas', 'anouar', 'Adresse anouar', 'anouar.aqas@gmail.com', '0699887766', 'anouar', 'anouar');

-- --------------------------------------------------------

--
-- Table structure for table `etudiant`
--

CREATE TABLE `etudiant` (
  `id_etud` int(11) NOT NULL,
  `CNE` int(11) NOT NULL,
  `nom_etud` varchar(25) NOT NULL,
  `prenom_etud` varchar(25) NOT NULL,
  `date_naiss_etud` date DEFAULT NULL,
  `adresse_etud` varchar(50) DEFAULT NULL,
  `email_etud` varchar(30) NOT NULL,
  `phone_etud` varchar(30) DEFAULT NULL,
  `password_etud` varchar(30) DEFAULT NULL,
  `login_etud` varchar(30) DEFAULT NULL,
  `convocation` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `etudiant`
--

INSERT INTO `etudiant` (`id_etud`, `CNE`, `nom_etud`, `prenom_etud`, `date_naiss_etud`, `adresse_etud`, `email_etud`, `phone_etud`, `password_etud`, `login_etud`, `convocation`) VALUES
(1, 1985858585, 'bensidi', 'jawad', '1998-02-13', 'Adresse jawad', 'jawad.bensidi@gmail.com', '0633114488', 'jawad', 'jawad', 'Tu as pas des Convocation'),
(2, 1985858586, 'bouksim', 'hamza', '1996-02-13', 'Adresse hamza', 'hamza.bouksim@gmail.com', '0633114400', 'hamza', 'hamza', 'Tu as pas des Convocation'),
(3, 1985858587, 'chahboun', 'mahdi', '1997-02-13', 'Adresse mahdi', 'mahdi.chahboun@gmail.com', '0633114477', 'mahdi', 'mahdi', 'Tu as pas des Convocation'),
(4, 1985858588, 'boulbaz', 'ayoub', '1998-02-13', 'Adresse ayoub', 'ayoub.boulbaz@gmail.com', '0633114411', 'ayoub', 'ayoub', 'Tu as pas des Convocation'),
(5, 1985858599, 'bouharta', 'yassine', '1998-02-13', 'Adresse yassine', 'yassine.bouharta@gmail.com', '0633114422', 'yassine', 'yassine', 'Tu as pas des Convocation'),
(6, 1985858555, 'soubani', 'marouane', '1998-02-13', 'Adresse marouane', 'marouane.soubani@gmail.com', '0633114433', 'marouane', 'marouane', 'Tu as pas des Convocation');

-- --------------------------------------------------------

--
-- Table structure for table `etudier`
--

CREATE TABLE `etudier` (
  `id_etud` int(11) NOT NULL,
  `id_module` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `etudier`
--

INSERT INTO `etudier` (`id_etud`, `id_module`) VALUES
(2, 1),
(4, 1),
(6, 1),
(2, 2),
(4, 2),
(4, 3),
(6, 3),
(4, 4),
(6, 4),
(6, 5),
(2, 6),
(3, 1),
(5, 2),
(6, 6);

-- --------------------------------------------------------

--
-- Table structure for table `filiere`
--

CREATE TABLE `filiere` (
  `id_filiere` int(11) NOT NULL,
  `nom_filiere` text DEFAULT NULL,
  `chef_filiere` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `filiere`
--

INSERT INTO `filiere` (`id_filiere`, `nom_filiere`, `chef_filiere`) VALUES
(1, 'GI', 'Khalid'),
(2, 'GE', 'Rachid'),
(3, 'GBI', 'Hafid'),
(4, 'TCC', 'Said'),
(5, 'TM', 'Bilal');

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `id_module` int(11) NOT NULL,
  `id_semestre` int(11) NOT NULL,
  `nom_module` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`id_module`, `id_semestre`, `nom_module`) VALUES
(1, 2, 'Developpement web'),
(2, 1, 'JAVA'),
(3, 1, 'Anglais'),
(4, 2, 'Reseau'),
(5, 1, 'Langage C'),
(6, 1, 'Architecture des ordinateur'),
(7, 2, 'Langage C++');

-- --------------------------------------------------------

--
-- Table structure for table `niveau`
--

CREATE TABLE `niveau` (
  `id_niveau` int(11) NOT NULL,
  `type_niveau` text DEFAULT NULL,
  `id_filiere` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `niveau`
--

INSERT INTO `niveau` (`id_niveau`, `type_niveau`, `id_filiere`) VALUES
(1, '1er', 1),
(2, '2eme', 1),
(3, '3eme', 1),
(4, '1er', 2),
(5, '2eme', 2),
(6, '3eme', 2);

-- --------------------------------------------------------

--
-- Table structure for table `retard`
--

CREATE TABLE `retard` (
  `id_retard` int(11) NOT NULL,
  `id_seance` int(11) NOT NULL,
  `id_etud` int(11) NOT NULL,
  `retard` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `retard`
--

INSERT INTO `retard` (`id_retard`, `id_seance`, `id_etud`, `retard`) VALUES
(4, 1, 2, 'Oui');

-- --------------------------------------------------------

--
-- Table structure for table `seance`
--

CREATE TABLE `seance` (
  `id_seance` int(11) NOT NULL,
  `id_module` int(11) NOT NULL,
  `id_ens` int(11) NOT NULL,
  `nom_seance` varchar(20) NOT NULL,
  `date_seance` date NOT NULL,
  `heure_debut` time DEFAULT NULL,
  `heure_fin` time DEFAULT NULL,
  `type_seance` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seance`
--

INSERT INTO `seance` (`id_seance`, `id_module`, `id_ens`, `nom_seance`, `date_seance`, `heure_debut`, `heure_fin`, `type_seance`) VALUES
(1, 1, 3, 'Seance 1', '2016-04-03', '13:30:00', '15:00:00', 'Cours');

-- --------------------------------------------------------

--
-- Table structure for table `semestre`
--

CREATE TABLE `semestre` (
  `id_semestre` int(11) NOT NULL,
  `nom_semestre` text DEFAULT NULL,
  `id_niveau` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semestre`
--

INSERT INTO `semestre` (`id_semestre`, `nom_semestre`, `id_niveau`) VALUES
(1, 'S1', 1),
(2, 'S2', 1),
(3, 'S1', 2),
(4, 'S2', 2),
(5, 'S1', 3),
(6, 'S2', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absence`
--
ALTER TABLE `absence`
  ADD PRIMARY KEY (`id_absence`),
  ADD KEY `id_seance` (`id_seance`),
  ADD KEY `id_etud` (`id_etud`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `affecter`
--
ALTER TABLE `affecter`
  ADD KEY `id_ens` (`id_ens`),
  ADD KEY `id_module` (`id_module`);

--
-- Indexes for table `enseignant`
--
ALTER TABLE `enseignant`
  ADD PRIMARY KEY (`id_ens`);

--
-- Indexes for table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`id_etud`);

--
-- Indexes for table `etudier`
--
ALTER TABLE `etudier`
  ADD KEY `id_etud` (`id_etud`),
  ADD KEY `id_module` (`id_module`);

--
-- Indexes for table `filiere`
--
ALTER TABLE `filiere`
  ADD PRIMARY KEY (`id_filiere`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`id_module`),
  ADD KEY `id_semestre` (`id_semestre`);

--
-- Indexes for table `niveau`
--
ALTER TABLE `niveau`
  ADD PRIMARY KEY (`id_niveau`),
  ADD KEY `id_filiere` (`id_filiere`);

--
-- Indexes for table `retard`
--
ALTER TABLE `retard`
  ADD PRIMARY KEY (`id_retard`),
  ADD KEY `id_seance` (`id_seance`),
  ADD KEY `id_etud` (`id_etud`);

--
-- Indexes for table `seance`
--
ALTER TABLE `seance`
  ADD PRIMARY KEY (`id_seance`),
  ADD KEY `id_ens` (`id_ens`),
  ADD KEY `id_module` (`id_module`);

--
-- Indexes for table `semestre`
--
ALTER TABLE `semestre`
  ADD PRIMARY KEY (`id_semestre`),
  ADD KEY `id_niveau` (`id_niveau`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absence`
--
ALTER TABLE `absence`
  MODIFY `id_absence` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `enseignant`
--
ALTER TABLE `enseignant`
  MODIFY `id_ens` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `id_etud` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `filiere`
--
ALTER TABLE `filiere`
  MODIFY `id_filiere` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
  MODIFY `id_module` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `niveau`
--
ALTER TABLE `niveau`
  MODIFY `id_niveau` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `retard`
--
ALTER TABLE `retard`
  MODIFY `id_retard` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `seance`
--
ALTER TABLE `seance`
  MODIFY `id_seance` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `semestre`
--
ALTER TABLE `semestre`
  MODIFY `id_semestre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absence`
--
ALTER TABLE `absence`
  ADD CONSTRAINT `absence_ibfk_1` FOREIGN KEY (`id_seance`) REFERENCES `seance` (`id_seance`),
  ADD CONSTRAINT `absence_ibfk_2` FOREIGN KEY (`id_etud`) REFERENCES `etudiant` (`id_etud`);

--
-- Constraints for table `affecter`
--
ALTER TABLE `affecter`
  ADD CONSTRAINT `affecter_ibfk_1` FOREIGN KEY (`id_ens`) REFERENCES `enseignant` (`id_ens`),
  ADD CONSTRAINT `affecter_ibfk_2` FOREIGN KEY (`id_module`) REFERENCES `module` (`id_module`);

--
-- Constraints for table `etudier`
--
ALTER TABLE `etudier`
  ADD CONSTRAINT `etudier_ibfk_1` FOREIGN KEY (`id_etud`) REFERENCES `etudiant` (`id_etud`),
  ADD CONSTRAINT `etudier_ibfk_2` FOREIGN KEY (`id_module`) REFERENCES `module` (`id_module`);

--
-- Constraints for table `module`
--
ALTER TABLE `module`
  ADD CONSTRAINT `module_ibfk_1` FOREIGN KEY (`id_semestre`) REFERENCES `semestre` (`id_semestre`);

--
-- Constraints for table `niveau`
--
ALTER TABLE `niveau`
  ADD CONSTRAINT `niveau_ibfk_1` FOREIGN KEY (`id_filiere`) REFERENCES `filiere` (`id_filiere`);

--
-- Constraints for table `retard`
--
ALTER TABLE `retard`
  ADD CONSTRAINT `retard_ibfk_1` FOREIGN KEY (`id_seance`) REFERENCES `seance` (`id_seance`),
  ADD CONSTRAINT `retard_ibfk_2` FOREIGN KEY (`id_etud`) REFERENCES `etudiant` (`id_etud`);

--
-- Constraints for table `seance`
--
ALTER TABLE `seance`
  ADD CONSTRAINT `seance_ibfk_1` FOREIGN KEY (`id_ens`) REFERENCES `enseignant` (`id_ens`),
  ADD CONSTRAINT `seance_ibfk_2` FOREIGN KEY (`id_module`) REFERENCES `module` (`id_module`);

--
-- Constraints for table `semestre`
--
ALTER TABLE `semestre`
  ADD CONSTRAINT `semestre_ibfk_1` FOREIGN KEY (`id_niveau`) REFERENCES `niveau` (`id_niveau`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
