-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 22 août 2022 à 11:05
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `eat_drink`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorieproduit`
--

DROP TABLE IF EXISTS `categorieproduit`;
CREATE TABLE IF NOT EXISTS `categorieproduit` (
  `id_type_produit` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom_type_produit` varchar(50) NOT NULL,
  `description_type_produit_1` varchar(50) NOT NULL,
  `id_gestionnaire` int(11) UNSIGNED NOT NULL,
  PRIMARY KEY (`id_type_produit`),
  KEY `id_gestionnaire` (`id_gestionnaire`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categorieproduit`
--

INSERT INTO `categorieproduit` (`id_type_produit`, `nom_type_produit`, `description_type_produit_1`, `id_gestionnaire`) VALUES
(1, 'Burger', 'Hamburger délicieux', 2),
(2, 'Pizza', 'Pizza bien garnie', 2),
(3, 'Boisson', 'Boisson rafraichissante', 2);

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id_client` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom_client` varchar(50) NOT NULL,
  `email_client` varchar(50) NOT NULL,
  `telephone` int(11) DEFAULT NULL,
  `passclient` varchar(100) NOT NULL,
  PRIMARY KEY (`id_client`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

DROP TABLE IF EXISTS `commandes`;
CREATE TABLE IF NOT EXISTS `commandes` (
  `id_commande` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `date_commande` datetime NOT NULL,
  `id_client` int(11) UNSIGNED NOT NULL,
  PRIMARY KEY (`id_commande`),
  KEY `id_client` (`id_client`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `fairepartie`
--

DROP TABLE IF EXISTS `fairepartie`;
CREATE TABLE IF NOT EXISTS `fairepartie` (
  `id_produit` int(11) UNSIGNED NOT NULL,
  `id_commande` int(11) UNSIGNED NOT NULL,
  `quantite` int(11) NOT NULL,
  PRIMARY KEY (`id_produit`,`id_commande`),
  KEY `id_produit` (`id_produit`),
  KEY `id_commande` (`id_commande`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `gestionnaires`
--

DROP TABLE IF EXISTS `gestionnaires`;
CREATE TABLE IF NOT EXISTS `gestionnaires` (
  `id_gestionnaire` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom_gestionnaire` varchar(50) NOT NULL,
  `prenom_gestionnaire` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` varchar(20) NOT NULL DEFAULT 'gestionnaire',
  PRIMARY KEY (`id_gestionnaire`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `gestionnaires`
--

INSERT INTO `gestionnaires` (`id_gestionnaire`, `nom_gestionnaire`, `prenom_gestionnaire`, `email`, `password`, `type`) VALUES
(2, 'John', 'Doe', 'john@gmail.com', '$2y$04$0Be4IVIHntvERjuNxjFLTuEPhIktvORw4WwbT5/WBM.ihGA7sRz46', 'admin') ,
(3, 'Thomas', 'Rodrigue', 'thomas@gmail.com', '$2y$04$2VgY82mGea9j3tRcAuj.7u2R8tHcVHWpB18XDA9uzI3e6w0LU7x/W', 'admin'),
(4, 'abolo', 'maxime', 'joh22n@gmail.com', '$2y$04$sFc3kLruTiO1GkqcGgCuLe4gWyvevfLZppBmBwzli6ik0sNf7Ie9i', 'gestionnaire'),
(5, 'abolo', 'maxime', 'john333@gmail.com', '$2y$04$o/3Uien43YtIdex3iU6L..N75o8DPceaWZ3/e2o451N706eAg9ZL2', 'gestionnaire');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id_produit` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom_produit` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `prix` int(11) NOT NULL,
  `chemin` varchar(50) NOT NULL,
  `quantity` int(11) UNSIGNED NOT NULL,
  `actif` tinyint(1) NOT NULL,
  `id_gestionnaire` int(11) UNSIGNED NOT NULL,
  `id_type_produit` int(11) UNSIGNED NOT NULL,
  PRIMARY KEY (`id_produit`),
  KEY `id_gestionnaire` (`id_gestionnaire`),
  KEY `id_type_produit` (`id_type_produit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `shoppingbag`;
CREATE TABLE IF NOT EXISTS `shoppingbag` (
  `id_produit` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom_produit` varchar(50) NOT NULL,
  `prix` varchar(50) NOT NULL,
  `quantity` int(11) UNSIGNED NOT NULL,
  `chemin` varchar(50) NOT NULL,
  PRIMARY KEY (`id_produit`) 
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `categorieproduit`
--
ALTER TABLE `categorieproduit`
  ADD CONSTRAINT `categorieproduit_ibfk_1` FOREIGN KEY (`id_gestionnaire`) REFERENCES `gestionnaires` (`id_gestionnaire`);

--
-- Contraintes pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `commandes_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`);

--
-- Contraintes pour la table `fairepartie`
--
ALTER TABLE `fairepartie`
  ADD CONSTRAINT `fairepartie_ibfk_1` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id_produit`),
  ADD CONSTRAINT `fairepartie_ibfk_2` FOREIGN KEY (`id_commande`) REFERENCES `commandes` (`id_commande`);

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`id_gestionnaire`) REFERENCES `gestionnaires` (`id_gestionnaire`),
  ADD CONSTRAINT `produit_ibfk_2` FOREIGN KEY (`id_type_produit`) REFERENCES `categorieproduit` (`id_type_produit`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


-- Inserting data in products table
INSERT INTO `produit` (`nom_produit`, `description`, `prix`, `chemin`, `quantity`, `actif`, `id_gestionnaire`, `id_type_produit`) VALUES
('Vegetarian Pizza', 'Pizza bien garnie', 4500, 'images/product_2.1.jpg', 50, 1, 2, 2),
('Chicken Burger', 'Pizza bien garnie', 4500, 'images/product_2.2.jpg', 50, 1, 2, 2),
('Double Cheese Margherita', 'Pizza bien garnie', 4500, 'images/product_3.1.jpg', 50, 1, 2, 2),
('Pizza With Mushroom', 'Pizza bien garnie', 4500, 'images/product_4.2.jpg', 50, 1, 2, 2),
('Maxican Green Wave', 'Pizza bien garnie', 3000, 'images/product_4.3.png', 50, 1, 2, 2),
('Royal Cheese Burger', 'Burger bien fourni', 1500, 'images/product_01.1.jpg', 50, 1, 2, 2),
('Classic Hamburger', 'Burger bien fourni', 1500, 'images/product_01.3.jpg', 50, 1, 2, 2),
('Cheese Burger', 'Burger bien fourni', 1500, 'images/product_01.jpg', 50, 1, 2, 2),
('Coca Cola', 'Boisson fraiche', 1500, 'images/drinks1.jpg', 50, 1, 2, 2),
('Fanta', 'Boisson fraiche', 1500, 'images/fanta.png', 50, 1, 2, 2),
('Pepsi', 'Boisson fraiche', 1500, 'images/Pepsi.jpg', 50, 1, 2, 2);