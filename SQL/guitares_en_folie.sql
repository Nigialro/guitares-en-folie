-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : ven. 25 nov. 2022 à 11:32
-- Version du serveur :  5.7.34
-- Version de PHP : 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `guitares_en_folie`
--
CREATE DATABASE IF NOT EXISTS `guitares_en_folie` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `guitares_en_folie`;

-- --------------------------------------------------------

--
-- Structure de la table `Administrateur`
--

CREATE TABLE `Administrateur` (
  `idAdmin` smallint(6) NOT NULL,
  `emailAdmin` varchar(50) DEFAULT NULL,
  `mdpAdmin` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Administrateur`
--

INSERT INTO `Administrateur` (`idAdmin`, `emailAdmin`, `mdpAdmin`) VALUES
(1, 'contact@guitares-en-folie.com', '5f4dcc3b5aa765d61d8327deb882cf99');

-- --------------------------------------------------------

--
-- Structure de la table `Categorie`
--

CREATE TABLE `Categorie` (
  `idCat` smallint(6) NOT NULL,
  `nomCat` varchar(50) DEFAULT NULL,
  `descripCat` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Commande`
--

CREATE TABLE `Commande` (
  `idOrder` smallint(6) NOT NULL,
  `htPriceOrder` float DEFAULT NULL,
  `ttcPriceOrder` float DEFAULT NULL,
  `dateorder` datetime DEFAULT NULL,
  `sendNameOrder` varchar(50) DEFAULT NULL,
  `sendSurnameOrder` varchar(50) DEFAULT NULL,
  `sendAdressOrder` varchar(150) DEFAULT NULL,
  `sendZipOrder` varchar(10) DEFAULT NULL,
  `sendCityOrder` varchar(50) DEFAULT NULL,
  `sendPhoneOrder` varchar(20) DEFAULT NULL,
  `billNameOrder` varchar(50) DEFAULT NULL,
  `billSurnameOrder` varchar(50) DEFAULT NULL,
  `billAdressOrder` varchar(150) DEFAULT NULL,
  `billZipOrder` varchar(10) DEFAULT NULL,
  `billCityOrder` varchar(50) DEFAULT NULL,
  `billPhoneOrder` varchar(20) DEFAULT NULL,
  `idUser` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `LignesCommande`
--

CREATE TABLE `LignesCommande` (
  `idOrderLine` smallint(6) NOT NULL,
  `htPriceOrderLine` float DEFAULT NULL,
  `ttcPriceOrderLine` float DEFAULT NULL,
  `qtyOrderLine` smallint(6) DEFAULT NULL,
  `idOrder` smallint(6) DEFAULT NULL,
  `idProd` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Produits`
--

CREATE TABLE `Produits` (
  `idProd` smallint(6) NOT NULL,
  `htPriceProd` float DEFAULT NULL,
  `ttcPriceProd` float DEFAULT NULL,
  `photoProd` varchar(100) DEFAULT NULL,
  `descripProd` varchar(500) DEFAULT NULL,
  `idSc` smallint(6) DEFAULT NULL,
  `idCat` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `SousCategorie`
--

CREATE TABLE `SousCategorie` (
  `idSc` smallint(6) NOT NULL,
  `nomSc` varchar(50) DEFAULT NULL,
  `descripSc` varchar(500) DEFAULT NULL,
  `idCat` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Utilisateur`
--

CREATE TABLE `Utilisateur` (
  `idUser` smallint(6) NOT NULL,
  `nameUser` varchar(50) DEFAULT NULL,
  `surnameUser` varchar(50) DEFAULT NULL,
  `adressUser` varchar(150) DEFAULT NULL,
  `zipUser` varchar(10) DEFAULT NULL,
  `cityUser` varchar(50) DEFAULT NULL,
  `emailUser` varchar(50) DEFAULT NULL,
  `phoneUser` varchar(20) DEFAULT NULL,
  `mdpUser` varchar(255) DEFAULT NULL,
  `modifMdpUser` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Administrateur`
--
ALTER TABLE `Administrateur`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Index pour la table `Categorie`
--
ALTER TABLE `Categorie`
  ADD PRIMARY KEY (`idCat`);

--
-- Index pour la table `Commande`
--
ALTER TABLE `Commande`
  ADD PRIMARY KEY (`idOrder`),
  ADD KEY `idUser` (`idUser`);

--
-- Index pour la table `LignesCommande`
--
ALTER TABLE `LignesCommande`
  ADD PRIMARY KEY (`idOrderLine`),
  ADD KEY `idOrder` (`idOrder`),
  ADD KEY `idProd` (`idProd`);

--
-- Index pour la table `Produits`
--
ALTER TABLE `Produits`
  ADD PRIMARY KEY (`idProd`),
  ADD KEY `idSc` (`idSc`),
  ADD KEY `idCat` (`idCat`);

--
-- Index pour la table `SousCategorie`
--
ALTER TABLE `SousCategorie`
  ADD PRIMARY KEY (`idSc`),
  ADD KEY `idCat` (`idCat`);

--
-- Index pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Administrateur`
--
ALTER TABLE `Administrateur`
  MODIFY `idAdmin` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `Categorie`
--
ALTER TABLE `Categorie`
  MODIFY `idCat` smallint(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Commande`
--
ALTER TABLE `Commande`
  MODIFY `idOrder` smallint(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `LignesCommande`
--
ALTER TABLE `LignesCommande`
  MODIFY `idOrderLine` smallint(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Produits`
--
ALTER TABLE `Produits`
  MODIFY `idProd` smallint(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `SousCategorie`
--
ALTER TABLE `SousCategorie`
  MODIFY `idSc` smallint(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  MODIFY `idUser` smallint(6) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Commande`
--
ALTER TABLE `Commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `Utilisateur` (`idUser`);

--
-- Contraintes pour la table `LignesCommande`
--
ALTER TABLE `LignesCommande`
  ADD CONSTRAINT `lignescommande_ibfk_1` FOREIGN KEY (`idOrder`) REFERENCES `Commande` (`idOrder`),
  ADD CONSTRAINT `lignescommande_ibfk_2` FOREIGN KEY (`idProd`) REFERENCES `Produits` (`idProd`);

--
-- Contraintes pour la table `Produits`
--
ALTER TABLE `Produits`
  ADD CONSTRAINT `produits_ibfk_1` FOREIGN KEY (`idSc`) REFERENCES `SousCategorie` (`idSc`),
  ADD CONSTRAINT `produits_ibfk_2` FOREIGN KEY (`idCat`) REFERENCES `Categorie` (`idCat`);

--
-- Contraintes pour la table `SousCategorie`
--
ALTER TABLE `SousCategorie`
  ADD CONSTRAINT `souscategorie_ibfk_1` FOREIGN KEY (`idCat`) REFERENCES `Categorie` (`idCat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
