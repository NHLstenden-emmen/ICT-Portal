-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 27 okt 2020 om 16:11
-- Serverversie: 10.4.14-MariaDB
-- PHP-versie: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ictportal`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `docenten`
--

CREATE TABLE `docenten` (
  `docent_id` int(11) NOT NULL,
  `voornaam` varchar(32) NOT NULL,
  `achternaam` varchar(32) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefoonnummer` varchar(11) NOT NULL,
  `gebruikersnaam` varchar(100) NOT NULL,
  `wachtwoord` varchar(100) NOT NULL,
  `foto` longblob DEFAULT NULL,
  `twitter` varchar(45) DEFAULT NULL,
  `linkedin` varchar(45) DEFAULT NULL,
  `instagram` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `docenten`
--

INSERT INTO `docenten` (`docent_id`, `voornaam`, `achternaam`, `email`, `telefoonnummer`, `gebruikersnaam`, `wachtwoord`, `foto`, `twitter`, `linkedin`, `instagram`) VALUES
(19, 'Gerjan', ' van Oenen', 'gerjanvoenen@nhlstenden.com', '0641182000', 'gerjanvoenen', '098f6bcd4621d373cade4e832627b4f6', NULL, NULL, NULL, NULL),
(20, 'Jan', 'Doornbos', 'jan.doornbos@nhl.stenden.com', '', 'doornbosj', '098f6bcd4621d373cade4e832627b4f6', NULL, '', '', ''),
(21, 'Raymond', 'Blankestijn', 'raymond.blakestijn@nhlstenden.com', '', 'raymondb', '098f6bcd4621d373cade4e832627b4f6', NULL, '', '', ''),
(22, 'Rene', 'Laan', 'rene.laan@nhlstenden.com', '', 'renelaan', '098f6bcd4621d373cade4e832627b4f6', NULL, '', '', ''),
(23, 'Rob', 'Loves', 'rob.loves@nhlstenden.com', '', 'robloves', '098f6bcd4621d373cade4e832627b4f6', NULL, '', '', ''),
(24, 'Winnie', 'van Schilt', 'winnievanschilt@nhlstenden.com', '', 'winnievschilt', '098f6bcd4621d373cade4e832627b4f6', NULL, '', '', ''),
(25, 'Albert', 'de Jonge', 'albertdejonge@nhlstenden.com', '', 'albertdejonge', '098f6bcd4621d373cade4e832627b4f6', NULL, '', '', '');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `docenten_beschikbaarheid`
--

CREATE TABLE `docenten_beschikbaarheid` (
  `docent_id` int(11) NOT NULL,
  `Maandag` varchar(255) DEFAULT NULL,
  `Dinsdag` varchar(255) DEFAULT NULL,
  `Woensdag` varchar(255) DEFAULT NULL,
  `Donderdag` varchar(255) DEFAULT NULL,
  `Vrijdag` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `docenten_beschikbaarheid`
--

INSERT INTO `docenten_beschikbaarheid` (`docent_id`, `Maandag`, `Dinsdag`, `Woensdag`, `Donderdag`, `Vrijdag`) VALUES
(19, NULL, NULL, NULL, NULL, NULL),
(20, NULL, NULL, NULL, NULL, NULL),
(21, NULL, NULL, NULL, NULL, NULL),
(22, NULL, NULL, NULL, NULL, NULL),
(23, NULL, NULL, NULL, NULL, NULL),
(24, NULL, NULL, NULL, NULL, NULL),
(25, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `docenten_vakken`
--

CREATE TABLE `docenten_vakken` (
  `docent_id` int(11) NOT NULL,
  `vak_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `docenten_vakken`
--

INSERT INTO `docenten_vakken` (`docent_id`, `vak_id`) VALUES
(22, 27),
(23, 25),
(25, 26);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `nieuws`
--

CREATE TABLE `nieuws` (
  `nieuws_id` int(11) NOT NULL,
  `docent_id` int(11) DEFAULT NULL,
  `datum` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `nieuws`
--

INSERT INTO `nieuws` (`nieuws_id`, `docent_id`, `datum`) VALUES
(1, 19, '2020-10-27 16:06:58'),
(2, 19, '2020-10-27 16:07:19'),
(3, 19, '2020-10-27 16:10:40'),
(4, 19, '2020-10-27 16:11:16');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `nieuws_en`
--

CREATE TABLE `nieuws_en` (
  `nieuws_en_id` int(11) NOT NULL,
  `tekst_en` text NOT NULL,
  `titel_en` varchar(45) NOT NULL,
  `bijlage_en` longblob DEFAULT NULL,
  `bijlage_en_type` varchar(10) DEFAULT NULL,
  `afbeelding_en` longblob DEFAULT NULL,
  `afbeelding_en_type` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `nieuws_nl`
--

CREATE TABLE `nieuws_nl` (
  `nieuws_nl_id` int(11) NOT NULL,
  `tekst_nl` text NOT NULL,
  `titel_nl` varchar(45) NOT NULL,
  `bijlage_nl` longblob DEFAULT NULL,
  `bijlage_nl_type` varchar(10) DEFAULT NULL,
  `afbeelding_nl` longblob DEFAULT NULL,
  `afbeelding_nl_type` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `nieuws_nl`
--

INSERT INTO `nieuws_nl` (`nieuws_nl_id`, `tekst_nl`, `titel_nl`, `bijlage_nl`, `bijlage_nl_type`, `afbeelding_nl`, `afbeelding_nl_type`) VALUES
(1, 'Beste studenten, \r\n\r\nHet nakijken heeft iets vertraging opgelopen. Wij doen onze uiterste best om de cijfers zo spoedig mogelijk kenbaar te maken (vermoedelijk deze week, uiterlijk volgende week). \r\n\r\nMet vriendelijke groet, \r\n\r\nGerjan van Oenen & Winnie van Schilt\r\n', 'Cijfers PHP-tentamen', NULL, NULL, NULL, NULL),
(3, '\r\nBeste huidige eerstejaars, \r\n\r\nDe bestanden voor de eindopdracht zijn aangepast en de nieuwe versie staat onder Course Documents\r\n\r\nEDIT: Het moduleboek is bijgewerkt met de nieuwe conditienummers-conversietabel. Als je deze aanhoudt dan functioneert de eindopdracht naar behoren.\r\n\r\nSucces!\r\n\r\nMet vriendelijke groet, \r\n\r\nGerjan van Oenen en Winnie van Schilt', 'Fix Eindopdracht', NULL, NULL, NULL, NULL),
(4, 'Beste studenten,\r\n\r\nIk heb helaas nog niet de HTML tentamens beoordeeld. Ik hoop deze eind volgende week af te hebben.\r\n\r\nMet vriendelijke groet,\r\n\r\nRob Smit', 'Vertraging in cijfers HTML tentamen', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `opleidingen`
--

CREATE TABLE `opleidingen` (
  `opleiding_id` int(11) NOT NULL,
  `opleiding_naam` varchar(255) NOT NULL,
  `jaar` int(11) NOT NULL,
  `periode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

--
-- Gegevens worden geëxporteerd voor tabel `opleidingen`
--

INSERT INTO `opleidingen` (`opleiding_id`, `opleiding_naam`, `jaar`, `periode`) VALUES
(2, 'ICT Beheer', 1, 1),
(3, 'Technische Informatica', 1, 1),
(4, 'Front End Development', 1, 1),
(5, 'Software Engineering', 1, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `opleiding_vakken`
--

CREATE TABLE `opleiding_vakken` (
  `opleiding_id` int(11) NOT NULL,
  `vak_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `opleiding_vakken`
--

INSERT INTO `opleiding_vakken` (`opleiding_id`, `vak_id`) VALUES
(2, 26),
(2, 27),
(3, 25),
(3, 26),
(3, 27),
(4, 26),
(4, 27),
(5, 26),
(5, 27);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `vakken`
--

CREATE TABLE `vakken` (
  `vak_id` int(11) NOT NULL,
  `vak` varchar(45) NOT NULL,
  `jaarlaag` int(11) NOT NULL,
  `periode` int(11) NOT NULL,
  `blackboard` text DEFAULT NULL,
  `teams` text DEFAULT NULL,
  `moduleboek` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

--
-- Gegevens worden geëxporteerd voor tabel `vakken`
--

INSERT INTO `vakken` (`vak_id`, `vak`, `jaarlaag`, `periode`, `blackboard`, `teams`, `moduleboek`) VALUES
(25, 'PHP', 1, 1, '', '', NULL),
(26, 'SLB', 1, 1, '', '', NULL),
(27, 'Informatiemanagement', 1, 1, '', '', NULL);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `docenten`
--
ALTER TABLE `docenten`
  ADD PRIMARY KEY (`docent_id`);

--
-- Indexen voor tabel `docenten_beschikbaarheid`
--
ALTER TABLE `docenten_beschikbaarheid`
  ADD PRIMARY KEY (`docent_id`),
  ADD KEY `fk_docenten_beschikbaarheid_docenten1_idx` (`docent_id`);

--
-- Indexen voor tabel `docenten_vakken`
--
ALTER TABLE `docenten_vakken`
  ADD PRIMARY KEY (`docent_id`,`vak_id`),
  ADD KEY `fk_docent_has_subject_subject1_idx` (`vak_id`),
  ADD KEY `fk_docent_has_subject_docent1_idx` (`docent_id`);

--
-- Indexen voor tabel `nieuws`
--
ALTER TABLE `nieuws`
  ADD PRIMARY KEY (`nieuws_id`),
  ADD KEY `fk_docentid` (`docent_id`);

--
-- Indexen voor tabel `nieuws_en`
--
ALTER TABLE `nieuws_en`
  ADD PRIMARY KEY (`nieuws_en_id`),
  ADD KEY `fk_nieuws_en_nieuws1_idx` (`nieuws_en_id`);

--
-- Indexen voor tabel `nieuws_nl`
--
ALTER TABLE `nieuws_nl`
  ADD PRIMARY KEY (`nieuws_nl_id`),
  ADD KEY `fk_nieuws_nl_nieuws1_idx` (`nieuws_nl_id`);

--
-- Indexen voor tabel `opleidingen`
--
ALTER TABLE `opleidingen`
  ADD PRIMARY KEY (`opleiding_id`);

--
-- Indexen voor tabel `opleiding_vakken`
--
ALTER TABLE `opleiding_vakken`
  ADD PRIMARY KEY (`opleiding_id`,`vak_id`),
  ADD KEY `vak_id` (`vak_id`);

--
-- Indexen voor tabel `vakken`
--
ALTER TABLE `vakken`
  ADD PRIMARY KEY (`vak_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `docenten`
--
ALTER TABLE `docenten`
  MODIFY `docent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT voor een tabel `nieuws`
--
ALTER TABLE `nieuws`
  MODIFY `nieuws_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `opleidingen`
--
ALTER TABLE `opleidingen`
  MODIFY `opleiding_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT voor een tabel `vakken`
--
ALTER TABLE `vakken`
  MODIFY `vak_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `docenten_beschikbaarheid`
--
ALTER TABLE `docenten_beschikbaarheid`
  ADD CONSTRAINT `fk_docenten_beschikbaarheid_docenten1` FOREIGN KEY (`docent_id`) REFERENCES `docenten` (`docent_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `docenten_vakken`
--
ALTER TABLE `docenten_vakken`
  ADD CONSTRAINT `fk_docent_has_subject_docent1` FOREIGN KEY (`docent_id`) REFERENCES `docenten` (`docent_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `nieuws`
--
ALTER TABLE `nieuws`
  ADD CONSTRAINT `fk_docentid` FOREIGN KEY (`docent_id`) REFERENCES `docenten` (`docent_id`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `nieuws_en`
--
ALTER TABLE `nieuws_en`
  ADD CONSTRAINT `fk_nieuws_en_nieuws1` FOREIGN KEY (`nieuws_en_id`) REFERENCES `nieuws` (`nieuws_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Beperkingen voor tabel `nieuws_nl`
--
ALTER TABLE `nieuws_nl`
  ADD CONSTRAINT `fk_nieuws_nl_nieuws1` FOREIGN KEY (`nieuws_nl_id`) REFERENCES `nieuws` (`nieuws_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Beperkingen voor tabel `opleiding_vakken`
--
ALTER TABLE `opleiding_vakken`
  ADD CONSTRAINT `key1` FOREIGN KEY (`opleiding_id`) REFERENCES `opleidingen` (`opleiding_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `vak_id` FOREIGN KEY (`vak_id`) REFERENCES `vakken` (`vak_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
