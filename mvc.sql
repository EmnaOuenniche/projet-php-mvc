-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : Dim 28 août 2022 à 14:56
-- Version du serveur :  8.0.30-0ubuntu0.20.04.2
-- Version de PHP : 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mvc`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` int NOT NULL,
  `title` text NOT NULL,
  `image` text NOT NULL,
  `content` text NOT NULL,
  `date` text NOT NULL,
  `user_id` int NOT NULL,
  `status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `title`, `image`, `content`, `date`, `user_id`, `status`) VALUES
(6, 'test 2', '5851-2364-1661559866-1746-warning with space.jpg', 'test 2', '1661559866', 3, 1),
(7, 'test 3', '6987-6641-1661562954-4594-37521601_2041044882879293_972714916068720640_n.jpg', '<div>test test test test</div>', '1661562954', 3, 1),
(8, 'test 4', '4889-989-1661566699-291-blog_test.jpeg', '<h1><strong>test</strong></h1><div><br>dsfsd<br>fsd<br>fs<br>df<br>sd<br>fs<br>df<br>sd<br>fs<br>df<br>sd<br>fs<br>df<br>sd<br>f<br>sdf<br>sd<br>f</div>', '1661566699', 3, 1),
(9, 'test 55', '3711-3743-1661627088-1857-chat-logo.png', '<h1>lkjjljk</h1><div><br>sdsd<br>d<br>ds<br>ds<br>sds<br><br>dsd<br><br>sdsd<br>sd<br>d<br>s<br>sdsd<br>sd</div>', '1661627088', 3, 1),
(11, 'test admin 2 ', '5665-1448-1661682533-8415-logo.jpg', '<div>hhhhh</div>', '1661680914', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `article_comments`
--

CREATE TABLE `article_comments` (
  `id` int NOT NULL,
  `article_id` int NOT NULL,
  `user_id` int NOT NULL,
  `comment` text NOT NULL,
  `date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `article_comments`
--

INSERT INTO `article_comments` (`id`, `article_id`, `user_id`, `comment`, `date`) VALUES
(1, 8, 3, 'bonjour1111', '1661570530'),
(2, 5, 3, 'test comment 2 ', '1661570999'),
(3, 8, 3, 'testtttttttttt', '1661571031'),
(4, 8, 3, 'yooo', '1661571533'),
(5, 8, 3, '1', '1661575182'),
(6, 8, 3, '3', '1661575335');

-- --------------------------------------------------------

--
-- Structure de la table `article_fav`
--

CREATE TABLE `article_fav` (
  `id` int NOT NULL,
  `article_id` int NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `article_notes`
--

CREATE TABLE `article_notes` (
  `id` int NOT NULL,
  `article_id` int NOT NULL,
  `user_id` int NOT NULL,
  `note` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `article_notes`
--

INSERT INTO `article_notes` (`id`, `article_id`, `user_id`, `note`) VALUES
(19, 8, 3, 3),
(20, 6, 3, 4),
(21, 6, 1, 5),
(22, 7, 3, 5),
(23, 7, 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `pass` text NOT NULL,
  `role` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `pass`, `role`) VALUES
(1, 'admin', 'admin@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '1'),
(2, 'lecteur', 'lecteur@gmail.com', '529f6d5288b55300e1efbb6da70ccc92', '3'),
(3, 'auteur', 'auteur@gmail.com', '529f6d5288b55300e1efbb6da70ccc92', '2');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `article_comments`
--
ALTER TABLE `article_comments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `article_fav`
--
ALTER TABLE `article_fav`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `article_notes`
--
ALTER TABLE `article_notes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `article_comments`
--
ALTER TABLE `article_comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `article_fav`
--
ALTER TABLE `article_fav`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `article_notes`
--
ALTER TABLE `article_notes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
