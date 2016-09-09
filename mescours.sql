-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 07 Septembre 2016 à 01:47
-- Version du serveur :  10.1.13-MariaDB
-- Version de PHP :  5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mescours`
--

-- --------------------------------------------------------

--
-- Structure de la table `courses`
--

CREATE TABLE `courses` (
  `CourseID` varchar(4) NOT NULL,
  `CourseName` varchar(60) NOT NULL,
  `Price` decimal(14,2) DEFAULT NULL,
  `Tutor` varchar(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Liste des cours ';

--
-- Contenu de la table `courses`
--

INSERT INTO `courses` (`CourseID`, `CourseName`, `Price`, `Tutor`) VALUES
('1101', 'Caligraphy', '175.00', 'Jones'),
('2101', 'Writing For Fun and Profit', '250.00', 'Rodrigues'),
('3101', 'Tracing Your Ancestory', '325.00', 'Lane');

-- --------------------------------------------------------

--
-- Structure de la table `students`
--

CREATE TABLE `students` (
  `StudentID` varchar(4) NOT NULL,
  `LastName` varchar(30) NOT NULL,
  `FirstName` varchar(30) NOT NULL,
  `Address` varchar(60) DEFAULT NULL,
  `City` varchar(30) DEFAULT NULL,
  `Province` varchar(2) DEFAULT NULL,
  `PostalCode` varchar(7) DEFAULT NULL,
  `EmailAddress` varchar(50) DEFAULT NULL,
  `UserName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `students`
--

INSERT INTO `students` (`StudentID`, `LastName`, `FirstName`, `Address`, `City`, `Province`, `PostalCode`, `EmailAddress`, `UserName`) VALUES
('1111', 'Starr', 'Mona', '256 Tananger Way', 'High River', 'AL', 'A1A 1A1', 'imastarr@myisp.ca', 'imastarr5'),
('1112', 'Ash', 'Mary', '156 East Street', 'Wexford', 'PE', 'B2B 2B2', 'ashtree@cable.net', 'imasuccess6'),
('1131', 'Aprea', 'James', '11 North Road', 'Parry Sound', 'ON', 'L1L 1L1', 'apreaciate@highspeed.com', 'phoenix9');

-- --------------------------------------------------------

--
-- Structure de la table `studentscourses`
--

CREATE TABLE `studentscourses` (
  `CourseID` varchar(4) NOT NULL,
  `StudentID` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `studentscourses`
--

INSERT INTO `studentscourses` (`CourseID`, `StudentID`) VALUES
('1101', '1112'),
('2101', '1111'),
('3101', '1131');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `UserName` varchar(20) NOT NULL,
  `Password` varchar(10) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`UserName`, `Password`, `admin`) VALUES
('imastarr5', 'eggcel', 0),
('imasuccess6', 'wizard', 0),
('magister', 'signum', 1),
('phoenix9', '5aces', 0);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`CourseID`);

--
-- Index pour la table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`StudentID`),
  ADD UNIQUE KEY `UserName` (`UserName`);

--
-- Index pour la table `studentscourses`
--
ALTER TABLE `studentscourses`
  ADD PRIMARY KEY (`CourseID`,`StudentID`),
  ADD KEY `studentid` (`StudentID`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserName`);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `username` FOREIGN KEY (`UserName`) REFERENCES `users` (`UserName`);

--
-- Contraintes pour la table `studentscourses`
--
ALTER TABLE `studentscourses`
  ADD CONSTRAINT `courseid` FOREIGN KEY (`CourseID`) REFERENCES `courses` (`CourseID`),
  ADD CONSTRAINT `studentid` FOREIGN KEY (`StudentID`) REFERENCES `students` (`StudentID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
