Explication d'installation et d'utilisation du site de ChatRoom de Antoine Neuveglise et Antoine Levilloux :

Le site de ChatRoom est codée en PHP et liée avec une base de donnée SQL.

Voici les codes d'initialisation de la base de donnée SQL "chatroom" :

--------------------------------------------------------------------------------------------------------------------------

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 12 fév. 2024 à 09:23
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `chatroom`
--

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id_m` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `msg` varchar(500) NOT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id_m`)
) ENGINE=MyISAM AUTO_INCREMENT=86 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id_u` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_u`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_u`, `email`, `mdp`, `admin`) VALUES
(15, 'admin@admin.com', '$2y$10$kXYJm.vElEmy4e93lDY6F.fmjsyDyOZIu6qwpVMD//vK18a/dOXMC', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

---------------------------------------------------------------------------------------------------------------------------------------

Quand l'application se lance, elle s'ouvre sur le menu de connexion.

Celui-ci possède 2 zones, permettant de mettre un identifiant et un mot de passe et un bouton "Se crée un compte".

La page de création a la mise en place de l'identifiant avec une adresse et aussi la mise en place et la confirmation du mot de passe.
Le mot de passe devra etre de moins de 8 caractères et au moins 1 chiffres.

Une fois connecter, l'utilisateur pourra envoyer des messages, des photos, des gifs, des liens internet.

Il est possible de changer le style du texte grace a des balises.

[noir]texte[/noir] : pour mettre en noir.
[blanc]texte[/blanc] : pour mettre en blanc.
[rouge]texte[/rouge] : pour mettre en rouge.
[vert]texte[/vert] : pour mettre en vert.
[bleu]texte[/bleu] : pour mettre en bleu.
[italic]texte[/italic] : pour mettre en italic.
[gras]texte[/gras] : pour mettre en gras.


Pour le role admin qui permet de supprimmer les messages grace au bouton de suppression.

Identifiant : admin@admin.com
Mot de passe : jesuisle1admindechatroom

Bonne séance :)
