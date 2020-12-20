-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 20. Dez 2020 um 16:57
-- Server-Version: 8.0.19
-- PHP-Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `mssn-insecure`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `categoryname` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Daten für Tabelle `categories`
--

INSERT INTO `categories` (`id`, `categoryname`) VALUES
(1, 'Sports'),
(2, 'Life'),
(3, 'Meals');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `comments`
--

CREATE TABLE `comments` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `post_id` int NOT NULL,
  `comment_id` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `posts`
--

CREATE TABLE `posts` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `published` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `category` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `image`, `body`, `published`, `created_at`, `category`) VALUES
(1, '5 Habits that can improve your life', '5-habits-that-can-improve-your-life', 'banner.jpg', '<p>- Read every day</p>\r\n<p>- Drink a lot of water</p>\r\n<p>- Eat healty</p>\r\n<p>- Do a lot of sport</p>\r\n<p>- Don`t work to much</p>', 0, '2020-12-10 07:30:12', 2),
(2, 'The right workout music', 'music-workout', 'workout.jpg', '<p>It sends shivers down your back, gives you sudden bursts of energy, sparks joy and tears…music can do this and much more for you. But did you know that music can also have a positive influence on your workout? The right beats can help you reach your goal faster while making your fitness routine more fun.</p>', 1, '2020-12-08 07:30:12', 1),
(3, 'Healthy Buffalo Chicken Meatballs', 'buffalo-chicken-meatballs', 'meatballs.jpg', '<p>Add these Healthy Buffalo Chicken Meatballs to your weeknight dinner menu, weekend meal prep rotation, or enjoy them as a tasty and fun appetizer! Serve them on top of tender spaghetti squash strands or lightly steamed zucchini noodles for a delicious, satisfying, and veggie-filled meal. A recipe the entire family will love!</p>', 1, '2020-12-07 07:30:12', 3),
(4, 'Cold shower morning routine', 'cold-shower-morning', 'cold-shower.jpg', '<p>Here are four reasons why to have cold shower in the morning:</p>\r\n<br>\r\n<p>- Cold water improves your circulation</p>\r\n<p>- Improves your health</p>\r\n<p>- Cold showers help treat depression</p>\r\n<p>- Stimulates weight loss</p>', 1, '2020-12-09 07:30:12', 2),
(5, 'Running helps you live longer', 'running-live-longer', 'running.jpg', '<p>It’s no secret that running is healthy. In fact, studies have shown that exercise can extend your life by several years! Whether you run for pleasure, to deal with stressful situations or for the health benefits.</p>', 1, '2020-12-19 17:26:15', 1),
(6, 'Hot-smoked salmon salad with chive buttermilk dressing', 'hot-smoked-salmon-salad', 'salad.jpg', '<p>This fresh, crunchy salad, topped with soft hunks of salmon, is finished off perfectly with a tangy buttermilk and chive dressing – and it\'s on the table in a quarter of an hour.</p>', 1, '2020-12-19 17:32:09', 3);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `comment_id` (`comment_id`);

--
-- Indizes für die Tabelle `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `category` (`category`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_3` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints der Tabelle `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`category`) REFERENCES `categories` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
