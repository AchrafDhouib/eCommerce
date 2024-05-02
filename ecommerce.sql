-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 02 mai 2024 à 01:25
-- Version du serveur :  10.4.18-MariaDB
-- Version de PHP : 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ecommerce`
--

-- --------------------------------------------------------

--
-- Structure de la table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `role` varchar(8) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `account`
--

INSERT INTO `account` (`id`, `user_name`, `email`, `pwd`, `role`) VALUES
(1, 'admin', 'admin@admin.tn', '$2y$10$WCNpmPFNsFSjkJC3mXTfxegL/fKH6q7bvRGJPAeCpO/Gg6WN/A5MG', '2'), /* password : admin */
(2, 'achraf', 'achraf.dhouib.7@gmail.com', '$2y$10$v8xUx4MhtRM.AoLlxvgks.OQ09Nu3ugvs.TcyuRF0h.lDrhFEKinW', '1'), /* password : achraf */
(3, 'user', 'user@user.tn', '$2y$10$e7KD0u4ccFd40CX2ylfedejxP6wEdjJYFDfwFpVC/dLskM1cxDqB.', '0'), /* password : user */
(4, 'user2', 'user2@user.tn', '$2y$10$qUG02asTMMyKZ6dkZj4OSuU24yAmE/T9qsr5CYf/10H7j03fIYEUq', '0'), /* password : user2 */
(5, 'user3', 'user3@user.tn', '$2y$10$D2zqUxBxupUoA.XbJvSDU.44JfC5.ouXVxMb6ILj5wx9/0jVvEmfO', '0'); /* password : user3 */

-- --------------------------------------------------------

--
-- Structure de la table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `quantity`) VALUES
(1, 2, 2, 2),
(2, 2, 3, 56),
(4, 1, 12, 2),
(5, 2, 13, 1),
(6, 1, 2, 1),
(8, 3, 1, 5);

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `price` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `discount`, `quantity`, `photo`, `description`) VALUES
(1, 'product 1', 120000, 10, 5, 'product-1.jpg', 'description of this product description of this product description of this product description of this product description of this product description of this product description of this product description of this product description of this product .'),
(2, 'product 2', 130000, 10, 5, 'product-2.jpg', 'description of this product description of this product description of this product description of this product description of this product description of this product description of this product description of this product description of this product .'),
(3, 'product 3', 650005, 15, 5, 'product-3.jpg', 'description of this produ'),
(4, 'product 4', 870000, 0, 5, 'product-4.jpg', 'description of this product description of this product description of this product description of this product description of this product description of this product description of this product description of this product description of this product .'),
(5, 'product 5', 60000, 50, 5, 'product-5.jpg', 'description of this product description of this product description of this product description of this product description of this product description of this product description of this product description of this product description of this product .'),
(6, 'product 6', 900000, 25, 5, 'product-6.jpg', 'description of this product description of this product description of this product description of this product description of this product description of this product description of this product description of this product description of this product .'),
(7, 'product 7', 50000, 15, 5, 'product-7.jpg', 'description of this product description of this product description of this product description of this product description of this product description of this product description of this product description of this product description of this product .'),
(8, 'product 8', 140000, 35, 5, 'product-8.jpg', 'description of this product description of this product description of this product description of this product description of this product description of this product description of this product description of this product description of this product .'),
(9, 'product 9', 300000, 45, 5, 'product-9.jpg', 'description of this product description of this product description of this product description of this product description of this product description of this product description of this product description of this product description of this product .'),
(10, 'product 10', 230000, 10, 5, 'product-1.jpg', 'description of this product description of this product description of this product description of this product description of this product description of this product description of this product description of this product description of this product .'),
(11, 'product 11', 130000, 10, 5, 'product-2.jpg', 'description of this product description of this product description of this product description of this product description of this product description of this product description of this product description of this product description of this product .'),
(12, 'product 12', 650000, 15, 5, 'product-3.jpg', 'description of this product description of this product description of this product description of this product description of this product description of this product description of this product description of this product description of this product .'),
(13, 'product 13', 870000, 0, 5, 'product-4.jpg', 'description of this product description of this product description of this product description of this product description of this product description of this product description of this product description of this product description of this product .'),
(14, 'product 14', 60000, 50, 5, 'product-5.jpg', 'description of this product description of this product description of this product description of this product description of this product description of this product description of this product description of this product description of this product .'),
(15, 'product 15', 900000, 25, 5, 'product-6.jpg', 'description of this product description of this product description of this product description of this product description of this product description of this product description of this product description of this product description of this product .'),
(16, 'product 16', 50000, 15, 5, 'product-7.jpg', 'description of this product description of this product description of this product description of this product description of this product description of this product description of this product description of this product description of this product .'),
(17, 'product 17', 140000, 35, 5, 'product-8.jpg', 'description of this product description of this product description of this product description of this product description of this product description of this product description of this product description of this product description of this product .'),
(18, 'product 18', 300000, 45, 5, 'product-9.jpg', 'description of this product description of this product description of this product description of this product description of this product description of this product description of this product description of this product description of this product .'),
(22, 'kiy', 1414, 1, 0, 'lokiju', 'lokijuhy');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Index pour la table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `account` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
