-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 26 okt 2020 om 13:41
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
(3, 'Test', 'Test', 'gerjan.vanoenen@nhlstenden.com', '611233333', 'gerjanvoenen', '098f6bcd4621d373cade4e832627b4f6', NULL, 'realDonaldTrump', 'wat', 'wat');

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
(3, '11:11 - 11:11', NULL, NULL, NULL, NULL);

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
(3, 23);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klassen`
--

CREATE TABLE `klassen` (
  `klas_id` int(11) NOT NULL,
  `klas_naam` varchar(255) NOT NULL,
  `jaar` int(11) NOT NULL,
  `periode` int(11) NOT NULL,
  `opleiding_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

--
-- Gegevens worden geëxporteerd voor tabel `klassen`
--

INSERT INTO `klassen` (`klas_id`, `klas_naam`, `jaar`, `periode`, `opleiding_id`) VALUES
(1, 'INF1A', 1, 1, 12),
(2, 'INF1B', 1, 1, 4),
(3, 'INF1C', 1, 1, 9),
(4, 'INF1D', 1, 1, 4),
(5, 'INF1E', 1, 1, 9),
(6, 'INF1F', 1, 1, 4),
(7, 'INF1G', 1, 1, 9),
(8, 'INF1H', 1, 1, 4);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klassen_vakken`
--

CREATE TABLE `klassen_vakken` (
  `klas_id` int(11) NOT NULL,
  `vak_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `klassen_vakken`
--

INSERT INTO `klassen_vakken` (`klas_id`, `vak_id`) VALUES
(1, 23),
(2, 23),
(3, 23);

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
(32, 3, '2020-10-25 20:27:42'),
(33, 3, '2020-10-25 20:28:18'),
(36, 3, '2020-10-25 21:17:37'),
(37, 3, '2020-10-25 21:24:33'),
(38, NULL, '2020-10-25 21:49:18');

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
(38, 'Dit is een nieuw nieuwsbericht!', 'Voorbeeldnieuws', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `opleidingen`
--

CREATE TABLE `opleidingen` (
  `opleiding_id` int(11) NOT NULL,
  `opleidingnaam` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `opleidingen`
--

INSERT INTO `opleidingen` (`opleiding_id`, `opleidingnaam`) VALUES
(13, 'masters'),
(14, 'test');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `vakken`
--

CREATE TABLE `vakken` (
  `vak_id` int(11) NOT NULL,
  `vak` varchar(45) CHARACTER SET ascii NOT NULL,
  `jaarlaag` int(11) NOT NULL,
  `periode` int(11) NOT NULL,
  `moduleboek` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=binary;

--
-- Gegevens worden geëxporteerd voor tabel `vakken`
--

INSERT INTO `vakken` (`vak_id`, `vak`, `jaarlaag`, `periode`, `moduleboek`) VALUES
(23, 'Obama', 1, 1, NULL);

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
-- Indexen voor tabel `klassen`
--
ALTER TABLE `klassen`
  ADD PRIMARY KEY (`klas_id`),
  ADD KEY `fk_klassen_opleidingen1_idx` (`opleiding_id`);

--
-- Indexen voor tabel `klassen_vakken`
--
ALTER TABLE `klassen_vakken`
  ADD PRIMARY KEY (`klas_id`,`vak_id`),
  ADD KEY `key1` (`vak_id`),
  ADD KEY `key2` (`klas_id`);

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
  MODIFY `docent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT voor een tabel `klassen`
--
ALTER TABLE `klassen`
  MODIFY `klas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT voor een tabel `nieuws`
--
ALTER TABLE `nieuws`
  MODIFY `nieuws_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT voor een tabel `opleidingen`
--
ALTER TABLE `opleidingen`
  MODIFY `opleiding_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT voor een tabel `vakken`
--
ALTER TABLE `vakken`
  MODIFY `vak_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

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
  ADD CONSTRAINT `fk_docent_has_subject_docent1` FOREIGN KEY (`docent_id`) REFERENCES `docenten` (`docent_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_docent_has_subject_subject1` FOREIGN KEY (`vak_id`) REFERENCES `vakken` (`vak_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `klassen_vakken`
--
ALTER TABLE `klassen_vakken`
  ADD CONSTRAINT `key1` FOREIGN KEY (`klas_id`) REFERENCES `klassen` (`klas_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `key2` FOREIGN KEY (`vak_id`) REFERENCES `vakken` (`vak_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `nieuws`
--
ALTER TABLE `nieuws`
  ADD CONSTRAINT `fk_docentid` FOREIGN KEY (`docent_id`) REFERENCES `docenten` (`docent_id`) ON DELETE SET NULL;

--
-- Beperkingen voor tabel `nieuws_en`
--
ALTER TABLE `nieuws_en`
  ADD CONSTRAINT `fk_nieuws_en_nieuws1` FOREIGN KEY (`nieuws_en_id`) REFERENCES `nieuws` (`nieuws_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `nieuws_nl`
--
ALTER TABLE `nieuws_nl`
  ADD CONSTRAINT `fk_nieuws_nl_nieuws1` FOREIGN KEY (`nieuws_nl_id`) REFERENCES `nieuws` (`nieuws_id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
