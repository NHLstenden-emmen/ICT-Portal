-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 12 okt 2020 om 11:12
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
  `telefoonnummer` int(11) NOT NULL,
  `gebruikersnaam` varchar(100) NOT NULL,
  `wachtwoord` varchar(100) NOT NULL,
  `foto` blob DEFAULT NULL,
  `twitter` varchar(45) DEFAULT NULL,
  `linkedin` varchar(45) DEFAULT NULL,
  `instagram` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `docenten`
--

INSERT INTO `docenten` (`docent_id`, `voornaam`, `achternaam`, `email`, `telefoonnummer`, `gebruikersnaam`, `wachtwoord`, `foto`, `twitter`, `linkedin`, `instagram`) VALUES
(3, 'Brian', 'Ortega', 'erat.volutpat.Nulla@eleifend.org', 1, 'JinWeaver', 'indigo', NULL, NULL, NULL, NULL),
(4, 'Tanek', 'Fischer', 'Suspendisse@tempus.net', 1, 'ThaddeusMartinez', 'violet', NULL, NULL, NULL, NULL),
(5, 'Justin', 'Benton', 'luctus.ipsum.leo@Etiamvestibulummassa.co.uk', 1, 'NoahBullock', 'orange', NULL, NULL, NULL, NULL),
(6, 'Bruno', 'Barrera', 'ante.blandit.viverra@Quisqueliberolacus.edu', 1, 'RahimBolton', 'orange', NULL, NULL, NULL, NULL),
(7, 'Robert', 'Solis', 'Mauris@Vestibulumanteipsum.co.uk', 1, 'AmeryWagner', 'blue', NULL, NULL, NULL, NULL),
(8, 'Linus', 'Delacruz', 'a.feugiat@aliquet.org', 1, 'OrlandoOsborn', 'yellow', NULL, NULL, NULL, NULL),
(9, 'Joseph', 'Patterson', 'tempor.arcu.Vestibulum@erat.net', 1, 'SolomonHenderson', 'green', NULL, NULL, NULL, NULL),
(10, 'Allen', 'Huber', 'Duis.dignissim@magnaa.net', 1, 'SimonNicholson', 'orange', NULL, NULL, NULL, NULL),
(11, 'Hakeem', 'Good', 'eget.ipsum@at.org', 1, 'JohnGilmore', 'green', NULL, NULL, NULL, NULL),
(12, 'Brody', 'Armstrong', 'aliquam@ut.edu', 1, 'EmmanuelYork', 'indigo', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `docenten_beschikbaarheid`
--

CREATE TABLE `docenten_beschikbaarheid` (
  `docent_id` int(11) NOT NULL,
  `beschikbaarheid_maandag` varchar(255) DEFAULT NULL,
  `beschikbaarheid_dinsdag` varchar(255) DEFAULT NULL,
  `beschikbaarheid_woensdag` varchar(255) DEFAULT NULL,
  `beschikbaarheid_donderdag` varchar(255) DEFAULT NULL,
  `beschikbaarheid_vrijdag` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `docenten_beschikbaarheid`
--

INSERT INTO `docenten_beschikbaarheid` (`docent_id`, `beschikbaarheid_maandag`, `beschikbaarheid_dinsdag`, `beschikbaarheid_woensdag`, `beschikbaarheid_donderdag`, `beschikbaarheid_vrijdag`) VALUES
(7, '00:00 - 00:00', '00:00 - 00:00', '00:00 - 00:00', '00:00 - 00:00', '00:00 - 00:00');

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
(5, 2),
(6, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klassen`
--

CREATE TABLE `klassen` (
  `klas_id` int(11) NOT NULL,
  `jaar` int(11) NOT NULL,
  `periode` int(11) NOT NULL,
  `opleidingen_idopleiding` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `klassen`
--

INSERT INTO `klassen` (`klas_id`, `jaar`, `periode`, `opleidingen_idopleiding`) VALUES
(1, 1, 1, 9),
(2, 1, 1, 4),
(3, 1, 1, 9),
(4, 1, 1, 4),
(5, 1, 1, 9),
(6, 1, 1, 4),
(7, 1, 1, 9),
(8, 1, 1, 4);

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
(1, 2),
(2, 6),
(7, 3);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `nieuws`
--

CREATE TABLE `nieuws` (
  `nieuws_id` int(11) NOT NULL,
  `klas_id` int(11) NOT NULL,
  `docent_id` int(11) NOT NULL,
  `datum` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `nieuws`
--

INSERT INTO `nieuws` (`nieuws_id`, `klas_id`, `docent_id`, `datum`) VALUES
(2, 1, 3, NULL),
(3, 1, 3, NULL),
(4, 5, 7, NULL),
(5, 1, 3, NULL),
(6, 6, 3, NULL),
(7, 7, 3, NULL),
(8, 3, 7, NULL),
(9, 6, 3, NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `nieuws_en`
--

CREATE TABLE `nieuws_en` (
  `nieuws_en_id` int(11) NOT NULL,
  `tekst_engels` text NOT NULL,
  `titel_engels` varchar(45) NOT NULL,
  `bijlage_engels` blob DEFAULT NULL,
  `afbeelding_engels` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `nieuws_en`
--

INSERT INTO `nieuws_en` (`nieuws_en_id`, `tekst_engels`, `titel_engels`, `bijlage_engels`, `afbeelding_engels`) VALUES
(2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum aliquam velit nec purus vehicula euismod. Sed commodo tincidunt nulla. Nulla vel mauris id dui molestie vehicula sit amet consectetur ante. Pellentesque maximus, urna vitae malesuada porttitor, purus quam varius augue, id dictum purus mi vitae leo. Integer hendrerit nisl ut tellus sodales, at consequat nisl faucibus. Nunc venenatis vestibulum urna, vitae facilisis nulla pretium tempor. Donec condimentum erat ac diam imperdiet, tempor euismod libero accumsan. Mauris ultricies nibh neque, sit amet finibus libero feugiat et. Nulla fermentum non sem id faucibus. Aliquam a condimentum purus. Morbi ut condimentum est, sed varius est. Cras fringilla est nulla, rhoncus pharetra sem varius sed. Morbi lobortis risus urna. Aenean luctus, massa et malesuada laoreet, sapien turpis interdum sem, id sodales eros ipsum quis risus. Quisque sollicitudin massa in odio pharetra interdum.', 'News1', NULL, NULL),
(4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum aliquam velit nec purus vehicula euismod. Sed commodo tincidunt nulla. Nulla vel mauris id dui molestie vehicula sit amet consectetur ante. Pellentesque maximus, urna vitae malesuada porttitor, purus quam varius augue, id dictum purus mi vitae leo. Integer hendrerit nisl ut tellus sodales, at consequat nisl faucibus. Nunc venenatis vestibulum urna, vitae facilisis nulla pretium tempor. Donec condimentum erat ac diam imperdiet, tempor euismod libero accumsan. Mauris ultricies nibh neque, sit amet finibus libero feugiat et. Nulla fermentum non sem id faucibus. Aliquam a condimentum purus. Morbi ut condimentum est, sed varius est. Cras fringilla est nulla, rhoncus pharetra sem varius sed. Morbi lobortis risus urna. Aenean luctus, massa et malesuada laoreet, sapien turpis interdum sem, id sodales eros ipsum quis risus. Quisque sollicitudin massa in odio pharetra interdum.', 'News1', NULL, NULL),
(6, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum aliquam velit nec purus vehicula euismod. Sed commodo tincidunt nulla. Nulla vel mauris id dui molestie vehicula sit amet consectetur ante. Pellentesque maximus, urna vitae malesuada porttitor, purus quam varius augue, id dictum purus mi vitae leo. Integer hendrerit nisl ut tellus sodales, at consequat nisl faucibus. Nunc venenatis vestibulum urna, vitae facilisis nulla pretium tempor. Donec condimentum erat ac diam imperdiet, tempor euismod libero accumsan. Mauris ultricies nibh neque, sit amet finibus libero feugiat et. Nulla fermentum non sem id faucibus. Aliquam a condimentum purus. Morbi ut condimentum est, sed varius est. Cras fringilla est nulla, rhoncus pharetra sem varius sed. Morbi lobortis risus urna. Aenean luctus, massa et malesuada laoreet, sapien turpis interdum sem, id sodales eros ipsum quis risus. Quisque sollicitudin massa in odio pharetra interdum.', 'News1', NULL, NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `nieuws_nl`
--

CREATE TABLE `nieuws_nl` (
  `nieuws_nl_id` int(11) NOT NULL,
  `tekst_nederlands` text NOT NULL,
  `titel_nederlands` varchar(45) NOT NULL,
  `bijlage_nederlands` blob DEFAULT NULL,
  `afbeelding_nederlands` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `nieuws_nl`
--

INSERT INTO `nieuws_nl` (`nieuws_nl_id`, `tekst_nederlands`, `titel_nederlands`, `bijlage_nederlands`, `afbeelding_nederlands`) VALUES
(2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum aliquam velit nec purus vehicula euismod. Sed commodo tincidunt nulla. Nulla vel mauris id dui molestie vehicula sit amet consectetur ante. Pellentesque maximus, urna vitae malesuada porttitor, purus quam varius augue, id dictum purus mi vitae leo. Integer hendrerit nisl ut tellus sodales, at consequat nisl faucibus. Nunc venenatis vestibulum urna, vitae facilisis nulla pretium tempor. Donec condimentum erat ac diam imperdiet, tempor euismod libero accumsan. Mauris ultricies nibh neque, sit amet finibus libero feugiat et. Nulla fermentum non sem id faucibus. Aliquam a condimentum purus. Morbi ut condimentum est, sed varius est. Cras fringilla est nulla, rhoncus pharetra sem varius sed. Morbi lobortis risus urna. Aenean luctus, massa et malesuada laoreet, sapien turpis interdum sem, id sodales eros ipsum quis risus. Quisque sollicitudin massa in odio pharetra interdum.', 'Nieuws1', NULL, NULL),
(3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum aliquam velit nec purus vehicula euismod. Sed commodo tincidunt nulla. Nulla vel mauris id dui molestie vehicula sit amet consectetur ante. Pellentesque maximus, urna vitae malesuada porttitor, purus quam varius augue, id dictum purus mi vitae leo. Integer hendrerit nisl ut tellus sodales, at consequat nisl faucibus. Nunc venenatis vestibulum urna, vitae facilisis nulla pretium tempor. Donec condimentum erat ac diam imperdiet, tempor euismod libero accumsan. Mauris ultricies nibh neque, sit amet finibus libero feugiat et. Nulla fermentum non sem id faucibus. Aliquam a condimentum purus. Morbi ut condimentum est, sed varius est. Cras fringilla est nulla, rhoncus pharetra sem varius sed. Morbi lobortis risus urna. Aenean luctus, massa et malesuada laoreet, sapien turpis interdum sem, id sodales eros ipsum quis risus. Quisque sollicitudin massa in odio pharetra interdum.', 'Nieuws1', NULL, NULL),
(4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum aliquam velit nec purus vehicula euismod. Sed commodo tincidunt nulla. Nulla vel mauris id dui molestie vehicula sit amet consectetur ante. Pellentesque maximus, urna vitae malesuada porttitor, purus quam varius augue, id dictum purus mi vitae leo. Integer hendrerit nisl ut tellus sodales, at consequat nisl faucibus. Nunc venenatis vestibulum urna, vitae facilisis nulla pretium tempor. Donec condimentum erat ac diam imperdiet, tempor euismod libero accumsan. Mauris ultricies nibh neque, sit amet finibus libero feugiat et. Nulla fermentum non sem id faucibus. Aliquam a condimentum purus. Morbi ut condimentum est, sed varius est. Cras fringilla est nulla, rhoncus pharetra sem varius sed. Morbi lobortis risus urna. Aenean luctus, massa et malesuada laoreet, sapien turpis interdum sem, id sodales eros ipsum quis risus. Quisque sollicitudin massa in odio pharetra interdum.', 'Nieuws1', NULL, NULL);

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
(1, 'Non Enim LLC'),
(2, 'Leo In Lobortis PC'),
(3, 'Varius Incorporated'),
(4, 'Sed Diam Industries'),
(5, 'Rutrum Justo Praesent Company'),
(6, 'Laoreet Ltd'),
(7, 'Odio Phasellus Incorporated'),
(8, 'Orci Company'),
(9, 'A Tortor Inc.'),
(10, 'Urna Suscipit Nonummy Foundation');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `vakken`
--

CREATE TABLE `vakken` (
  `vak_id` int(11) NOT NULL,
  `vak` varchar(45) NOT NULL,
  `jaarlaag` int(11) NOT NULL,
  `periode` int(11) NOT NULL,
  `moduleboek` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `vakken`
--

INSERT INTO `vakken` (`vak_id`, `vak`, `jaarlaag`, `periode`, `moduleboek`) VALUES
(1, 'Human Resources', 1, 3, NULL),
(2, 'Research and Development', 1, 4, NULL),
(3, 'Research and Development', 1, 2, NULL),
(4, 'Advertising', 1, 2, NULL),
(5, 'Customer Service', 1, 3, NULL),
(6, 'Public Relations', 1, 1, NULL),
(7, 'Human Resources', 1, 2, NULL),
(8, 'Research and Development', 1, 3, NULL),
(9, 'Advertising', 1, 1, NULL),
(10, 'Research and Development', 1, 4, NULL);

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
  ADD KEY `fk_docenten_beschikbaarheid_docenten1_idx` (`docent_id`);

--
-- Indexen voor tabel `docenten_vakken`
--
ALTER TABLE `docenten_vakken`
  ADD KEY `fk_docent_has_subject_subject1_idx` (`vak_id`),
  ADD KEY `fk_docent_has_subject_docent1_idx` (`docent_id`);

--
-- Indexen voor tabel `klassen`
--
ALTER TABLE `klassen`
  ADD PRIMARY KEY (`klas_id`),
  ADD KEY `fk_klassen_opleidingen1_idx` (`opleidingen_idopleiding`);

--
-- Indexen voor tabel `klassen_vakken`
--
ALTER TABLE `klassen_vakken`
  ADD KEY `fk_klas_has_vakken_vakken1_idx` (`vak_id`),
  ADD KEY `fk_klas_has_vakken_klas1_idx` (`klas_id`);

--
-- Indexen voor tabel `nieuws`
--
ALTER TABLE `nieuws`
  ADD PRIMARY KEY (`nieuws_id`),
  ADD KEY `fk_nieuws_curriculum1_idx` (`klas_id`),
  ADD KEY `fk_nieuws_docenten1_idx` (`docent_id`);

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
  MODIFY `docent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT voor een tabel `klassen`
--
ALTER TABLE `klassen`
  MODIFY `klas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT voor een tabel `nieuws`
--
ALTER TABLE `nieuws`
  MODIFY `nieuws_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT voor een tabel `opleidingen`
--
ALTER TABLE `opleidingen`
  MODIFY `opleiding_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT voor een tabel `vakken`
--
ALTER TABLE `vakken`
  MODIFY `vak_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `docenten_beschikbaarheid`
--
ALTER TABLE `docenten_beschikbaarheid`
  ADD CONSTRAINT `fk_docenten_beschikbaarheid_docenten1` FOREIGN KEY (`docent_id`) REFERENCES `docenten` (`docent_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `docenten_vakken`
--
ALTER TABLE `docenten_vakken`
  ADD CONSTRAINT `fk_docent_has_subject_docent1` FOREIGN KEY (`docent_id`) REFERENCES `docenten` (`docent_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_docent_has_subject_subject1` FOREIGN KEY (`vak_id`) REFERENCES `vakken` (`vak_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `klassen`
--
ALTER TABLE `klassen`
  ADD CONSTRAINT `fk_klassen_opleidingen1` FOREIGN KEY (`opleidingen_idopleiding`) REFERENCES `opleidingen` (`opleiding_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `klassen_vakken`
--
ALTER TABLE `klassen_vakken`
  ADD CONSTRAINT `fk_klas_has_vakken_klas1` FOREIGN KEY (`klas_id`) REFERENCES `klassen` (`klas_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_klas_has_vakken_vakken1` FOREIGN KEY (`vak_id`) REFERENCES `vakken` (`vak_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `nieuws`
--
ALTER TABLE `nieuws`
  ADD CONSTRAINT `fk_nieuws_curriculum1` FOREIGN KEY (`klas_id`) REFERENCES `klassen` (`klas_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_nieuws_docenten1` FOREIGN KEY (`docent_id`) REFERENCES `docenten` (`docent_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `nieuws_en`
--
ALTER TABLE `nieuws_en`
  ADD CONSTRAINT `fk_nieuws_en_nieuws1` FOREIGN KEY (`nieuws_en_id`) REFERENCES `nieuws` (`nieuws_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `nieuws_nl`
--
ALTER TABLE `nieuws_nl`
  ADD CONSTRAINT `fk_nieuws_nl_nieuws1` FOREIGN KEY (`nieuws_nl_id`) REFERENCES `nieuws` (`nieuws_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
