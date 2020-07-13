-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  lun. 13 juil. 2020 à 19:11
-- Version du serveur :  5.7.26
-- Version de PHP :  7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `webserviceapi_db`
--
CREATE DATABASE IF NOT EXISTS `webserviceapi_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `webserviceapi_db`;

-- --------------------------------------------------------

--
-- Structure de la table `administrator`
--

CREATE TABLE `administrator` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `administrator`
--

INSERT INTO `administrator` (`id`) VALUES
(48),
(49),
(50);

-- --------------------------------------------------------

--
-- Structure de la table `apiuser`
--

CREATE TABLE `apiuser` (
  `id` int(11) NOT NULL,
  `username` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `creatdat` datetime NOT NULL,
  `upddat` datetime DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `apiuser`
--

INSERT INTO `apiuser` (`id`, `username`, `roles`, `password`, `email`, `creatdat`, `upddat`, `type`) VALUES
(48, 'drigos1er', '[\"ROLE_ADMIN\"]', '$2y$13$95G4nHHc3pReOhXF3U06kevTc5UJSIHVyYczgab7t9kV78IIp3AGC', 'drigos1er@ocr.ci', '2020-07-13 00:00:00', '2020-07-13 00:00:00', 'administrator'),
(49, 'admin1', '[\"ROLE_ADMIN\"]', '$2y$13$at8PDR0MpGLIx5EaagigIeiOx0DG/ofKoZqRatqkCyv3QYLv01u4m', 'admin1@ocr.ci', '2010-07-13 15:25:22', '2010-07-13 15:25:22', 'administrator'),
(50, 'admin2', '[\"ROLE_ADMIN\"]', '$2y$13$WH9MF6yz1vNDO5FOlGxD8uTmDGqscAVGMIquLzZuDKV/PVoC9O1kC', 'admin2@ocr.ci', '2020-07-13 17:10:25', '2020-07-13 17:10:25', 'administrator'),
(51, 'customer2', '[\"ROLE_CUSTOMER\"]', '$2y$13$PxBXPjfz34GZJC/mav1/9ODcV9PA8/vdwSSzTXnNAVhJ0GcC3uV92', 'customer2@ocr.ci', '2020-07-13 17:13:45', '2020-07-13 17:13:45', 'customer'),
(52, 'customer3', '[\"ROLE_CUSTOMER\"]', '$2y$13$J4IQoavuWKJ6vrJAa.4JL.PafESU5wm6zmUV2aAlnG9aUNS/G7ali', 'customer3@ocr.ci', '2020-07-13 17:14:13', '2020-07-13 17:14:13', 'customer'),
(53, 'customer5', '[\"ROLE_CUSTOMER\"]', '$2y$13$OmJCljyB879uL8c6PGe3Q.3tb/cyvbWacQ3r8BRvdG9x7yICe0MnK', 'customer5@ocr.ci', '2020-07-13 17:14:24', '2020-07-13 17:14:24', 'customer');

-- --------------------------------------------------------

--
-- Structure de la table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `contact` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `customer`
--

INSERT INTO `customer` (`id`, `contact`) VALUES
(51, 58099212),
(52, 58099212),
(53, 58099212);

-- --------------------------------------------------------

--
-- Structure de la table `migration_versions`
--

CREATE TABLE `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migration_versions`
--

INSERT INTO `migration_versions` (`version`, `executed_at`) VALUES
('20200606133331', '2020-06-06 13:40:19'),
('20200606133912', '2020-06-06 13:40:19');

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `administrators_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `series` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numseries` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pictureurl` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL,
  `creatdat` datetime NOT NULL,
  `upddat` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`id`, `administrators_id`, `name`, `series`, `numseries`, `description`, `pictureurl`, `quantity`, `price`, `creatdat`, `upddat`) VALUES
(60, 48, 'Nokia 106', '106', 'aze19986564', 'Nokia 106-Dual SIM-1,8bonus 1575', 'https://ci.jumia.is/unsafe/fit-in/680x680/filters:fill(white)/product/85/248711/1.jpg?5176', 64, 64000, '2010-05-06 15:25:22', '2010-05-06 15:25:22'),
(61, 48, 'SAMSUNG', 'A70', 'KILO19986564', 'SAMSUNG A70-Dual SIM-1,8bonus 1575', 'https://ci.jumia.is/unsafe/fit-in/680x680/filters:fill(white)/product/85/248711/1.jpg?5176', 64, 64000, '2010-05-06 15:25:22', '2010-05-06 15:25:22'),
(62, 48, 'TECNO', 'PHANTOM Z', 'POLO19986564', 'TECNO-Dual SIM-1,8bonus 1575', 'https://ci.jumia.is/unsafe/fit-in/680x680/filters:fill(white)/product/85/248711/1.jpg?5176', 64, 64000, '2010-05-06 15:25:22', '2010-05-06 15:25:22');

-- --------------------------------------------------------

--
-- Structure de la table `product_shopper`
--

CREATE TABLE `product_shopper` (
  `product_id` int(11) NOT NULL,
  `shopper_id` int(11) NOT NULL,
  `qty` int(11) DEFAULT NULL,
  `buydate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `product_shopper`
--

INSERT INTO `product_shopper` (`product_id`, `shopper_id`, `qty`, `buydate`) VALUES
(60, 72, NULL, NULL),
(61, 72, NULL, NULL),
(61, 73, NULL, NULL),
(62, 73, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `shopper`
--

CREATE TABLE `shopper` (
  `id` int(11) NOT NULL,
  `customers_id` int(11) NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` int(11) NOT NULL,
  `creatdat` datetime NOT NULL,
  `upddat` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `shopper`
--

INSERT INTO `shopper` (`id`, `customers_id`, `firstname`, `lastname`, `email`, `contact`, `creatdat`, `upddat`) VALUES
(72, 51, 'shopper8', 'shopper8', 'shopper8@ocr.ci', 58099212, '2010-05-06 15:25:22', '2010-05-06 15:25:22'),
(73, 51, 'shopper9', 'shopper9', 'shopper9@ocr.ci', 58099212, '2020-07-13 18:10:54', '2020-07-13 18:10:54');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `apiuser`
--
ALTER TABLE `apiuser`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_837A8987F85E0677` (`username`);

--
-- Index pour la table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migration_versions`
--
ALTER TABLE `migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_D34A04ADD5E2D82F` (`administrators_id`);

--
-- Index pour la table `product_shopper`
--
ALTER TABLE `product_shopper`
  ADD PRIMARY KEY (`product_id`,`shopper_id`),
  ADD KEY `IDX_F7BF24ED4584665A` (`product_id`),
  ADD KEY `IDX_F7BF24EDFE2A96A4` (`shopper_id`);

--
-- Index pour la table `shopper`
--
ALTER TABLE `shopper`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_26663F5DC3568B40` (`customers_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `apiuser`
--
ALTER TABLE `apiuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT pour la table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT pour la table `shopper`
--
ALTER TABLE `shopper`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `administrator`
--
ALTER TABLE `administrator`
  ADD CONSTRAINT `FK_58DF0651BF396750` FOREIGN KEY (`id`) REFERENCES `apiuser` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `FK_81398E09BF396750` FOREIGN KEY (`id`) REFERENCES `apiuser` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_D34A04ADD5E2D82F` FOREIGN KEY (`administrators_id`) REFERENCES `administrator` (`id`);

--
-- Contraintes pour la table `product_shopper`
--
ALTER TABLE `product_shopper`
  ADD CONSTRAINT `FK_F7BF24ED4584665A` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_F7BF24EDFE2A96A4` FOREIGN KEY (`shopper_id`) REFERENCES `shopper` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `shopper`
--
ALTER TABLE `shopper`
  ADD CONSTRAINT `FK_26663F5DC3568B40` FOREIGN KEY (`customers_id`) REFERENCES `customer` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
