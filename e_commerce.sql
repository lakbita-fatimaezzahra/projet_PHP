-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 03 nov. 2024 à 16:44
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `e_commerce`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date_creation` date NOT NULL,
  `date_modification` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `libelle`, `description`, `date_creation`, `date_modification`) VALUES
(1, 'smart phone', 'description smart phone', '2024-10-26', '0000-00-00'),
(2, 'pc portable', 'descrition pc portable', '2024-10-26', '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `date_modification` date NOT NULL,
  `date_creation` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `nom`, `prenom`, `email`, `password`, `telephone`, `date_modification`, `date_creation`) VALUES
(12, '', '', 'nnnn@gmail.com', '7777', '', '0000-00-00', '2024-10-27'),
(13, 'BENCHAHYD', 'q', 'taha@gmail.com', '123', '222222222222', '0000-00-00', '2024-10-28'),
(14, '', '', '', '', '', '0000-00-00', '2024-10-28'),
(15, '', '', 'l@gmail.com', '123456789\r\n', '', '0000-00-00', '2024-10-28'),
(16, '', '', 'lakbitafatimaezzahra0@gmail.com', '0999999999999999', '', '0000-00-00', '2024-10-28'),
(17, '', '', 'lak@gmail.com', '2222222222222222', '', '0000-00-00', '2024-10-29'),
(18, 'lak', 'hhhhh', 'lakbitafatimaezzahra0@gmail.com', '123', '0714391756', '0000-00-00', '2024-10-31'),
(19, 'lakbita', 'fatimaezzahra', 'lakbitafati@gmail.com', 'fati12345678', '0687654333', '0000-00-00', '2024-10-31');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id` int(11) NOT NULL,
  `produit` varchar(255) NOT NULL,
  `quantite` int(11) NOT NULL,
  `panier` int(11) NOT NULL,
  `total` float NOT NULL,
  `date_modification` date NOT NULL,
  `date_creation` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE `panier` (
  `id` int(11) NOT NULL,
  `idClient` int(11) NOT NULL,
  `total` float NOT NULL,
  `date_creation` date NOT NULL,
  `date_modification` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `reference` varchar(255) NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `prix` double NOT NULL,
  `description` varchar(255) NOT NULL,
  `date_creation` date NOT NULL,
  `date_modification` date NOT NULL,
  `image` varchar(255) NOT NULL,
  `IdCat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`reference`, `libelle`, `prix`, `description`, `date_creation`, `date_modification`, `image`, `IdCat`) VALUES
('P001', 'Téléphone Portable', 699.99, 'Un smartphone avec 128 Go de stockage et 6 Go de RAM', '0000-00-00', '0000-00-00', 'image1.jpg', 1),
('P002', 'Ordinateur Portable', 1299.99, 'Ordinateur avec processeur Intel i7, 16 Go de RAM et SSD 512 Go', '0000-00-00', '0000-00-00', 'image2.jpg', 2),
('P003', 'Tablette', 399.99, 'Tablette 10 pouces avec 64 Go de stockage', '0000-00-00', '0000-00-00', 'image3.jpg', 1),
('P004', 'Écouteurs Sans Fil', 199.99, 'Écouteurs Bluetooth avec réduction de bruit active', '0000-00-00', '0000-00-00', 'image4.jpg', 2),
('P005', 'Télévision LED', 899.99, 'TV LED 55 pouces 4K avec HDR', '0000-00-00', '0000-00-00', 'image5.jpg', 1),
('pc2', 'asus i7', 9000, 'Découvrez le nouveau laptop avec des fonctionnalités avancées et un design élégant. Idéal pour les professionnels et les étudiants, ce modèle offre des performances exceptionnelles et une autonomie prolongée.\r\n', '2024-10-26', '0000-00-00', './images/a1.png', 2),
('pc3', 'lenovo', 4000, 'pc portable', '2024-10-26', '0000-00-00', './images/c1.png', 2),
('pc4', 'hp', 5000, 'pc', '2024-10-26', '0000-00-00', './images/c1.png', 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Fk_prod` (`produit`),
  ADD KEY `Fk_panier` (`panier`);

--
-- Index pour la table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Fk_Client` (`idClient`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`reference`),
  ADD KEY `Fk_categorie` (`IdCat`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `panier`
--
ALTER TABLE `panier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `Fk_panier` FOREIGN KEY (`panier`) REFERENCES `panier` (`id`),
  ADD CONSTRAINT `Fk_prod` FOREIGN KEY (`produit`) REFERENCES `produit` (`reference`);

--
-- Contraintes pour la table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `Fk_Client` FOREIGN KEY (`idClient`) REFERENCES `client` (`id`);

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `Fk_categorie` FOREIGN KEY (`IdCat`) REFERENCES `categorie` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
