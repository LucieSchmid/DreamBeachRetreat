-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 09. Mai 2024 um 16:18
-- Server-Version: 10.4.28-MariaDB
-- PHP-Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `dreambeachretreat`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bewertung`
--

CREATE TABLE `bewertung` (
  `id` int(11) NOT NULL,
  `sterne` int(11) NOT NULL,
  `kommentar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `bewertung`
--

INSERT INTO `bewertung` (`id`, `sterne`, `kommentar`) VALUES
(1, 4, 'Es ist ein tolles Resort. Danke für alles!'),
(2, 1, 'Die Toiletten waren eine reine Schweinerei!'),
(3, 3, 'War nicht großtartig, aber auch nicht ganz schlecht. 3 Sterne von mir.'),
(4, 5, '5116');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `buchung`
--

CREATE TABLE `buchung` (
  `id` int(11) NOT NULL,
  `nachname` varchar(100) DEFAULT NULL,
  `vorname` varchar(100) DEFAULT NULL,
  `anschrift` varchar(200) DEFAULT NULL,
  `ort` varchar(150) DEFAULT NULL,
  `telefon` varchar(20) DEFAULT NULL,
  `wieAlt` int(11) DEFAULT NULL,
  `zimmer` int(11) DEFAULT NULL,
  `personenProZimmer` int(11) DEFAULT NULL,
  `anreise` varchar(30) DEFAULT NULL,
  `abreise` varchar(30) DEFAULT NULL,
  `verpflegung` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `buchung`
--

INSERT INTO `buchung` (`id`, `nachname`, `vorname`, `anschrift`, `ort`, `telefon`, `wieAlt`, `zimmer`, `personenProZimmer`, `anreise`, `abreise`, `verpflegung`, `email`) VALUES
(1, 'srpgjwpj', 'ojono', 'konokn', 'oionok', 'nllkml', 56, 1, 1, '2024-04-25 13:48', '2024-05-09 13:48', 'Vollpension', 'sch.l@hak.at'),
(2, 'Mitterberger', 'Lucas', 'Baldramsdorf 3', '6519 dkjdkn', '261619', 20, 1, 1, '2024-04-15 09:47', '2024-04-22 09:53', 'Vollpension', 'm@hakspittal.at');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kontakt`
--

CREATE TABLE `kontakt` (
  `id` int(11) NOT NULL,
  `vorname` varchar(50) NOT NULL,
  `nachname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nachricht` text NOT NULL,
  `screenshot` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `kontakt`
--

INSERT INTO `kontakt` (`id`, `vorname`, `nachname`, `email`, `nachricht`, `screenshot`) VALUES
(1, 'Lucie', 'Schmid', 's@gmail.com', 'test test test test', 'pizza.jpg'),
(2, 'Corinna', 'Wallner', 'c@gmail.com', 'Ich hätte eine Frage zum Resort. Warum kann man die Anmeldedaten nicht sehen?', '2024-03-04 11_05_04-DreamBeachtRetreat.jpg'),
(3, 'Tyler', 'Stranig', 't@gmail.com', 'Hallo liebes DreamBeachRetreat, ich möchte eine Beschwerde einreichen. Und zwar hatte ich in meinem Urlaub in meine Apartment keine saubere Toilette.', 'toilette.jpg');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kunden`
--

CREATE TABLE `kunden` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `passwort` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `kunden`
--

INSERT INTO `kunden` (`id`, `email`, `passwort`) VALUES
(1, 's@gmail.com', '$2y$10$8x4PlFA8W4u.rE8FlvFakOCTIHr9LT5xV5g1Vdk.oLKFV6Tgk0s.W'),
(2, 'c@gmail.com', '$2y$10$ap5P40WiyFztTwkhKoy0yOSM3i4v1.Gn7oRo1BxiVxDzeduYWpgwa'),
(3, 's@hak.at', '$2y$10$FQd/ClSojZnyHKIzmegt3./DHuoso7IzgtbxNSBtV1r6Sdof37Mfq'),
(4, 'sch.l@hak.at', '$2y$10$qkCM.LzZBTWW5vMYtpo0Uekve2lLT8nTcQNBqd1DJvE1BNsIJ5kdC'),
(5, 'm@hakspittal.at', '$2y$10$seq3YMc8OLTcxfimo9awWuAkulRxqO6QWSeXEFdZGS/TEduDsTbBe');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `sportb`
--

CREATE TABLE `sportb` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `art` varchar(255) NOT NULL,
  `preis` int(11) NOT NULL,
  `uhrzeit` time NOT NULL,
  `wochentag` varchar(50) NOT NULL,
  `zeitBuchung` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `sportb`
--

INSERT INTO `sportb` (`id`, `email`, `art`, `preis`, `uhrzeit`, `wochentag`, `zeitBuchung`) VALUES
(73, 's@gmail.com', 'Stand-up Paddeln', 25, '10:00:00', 'Samstag', '2024-02-26 10:28:02'),
(75, 's@gmail.com', 'Basketball', 20, '09:00:00', 'Mittwoch', '2024-02-26 10:28:02'),
(76, 's@gmail.com', 'Stand-up Paddeln', 25, '10:00:00', 'Samstag', '2024-02-26 10:28:12'),
(77, 's@gmail.com', 'Tennis', 20, '16:00:00', 'Dienstag', '2024-02-26 10:28:12'),
(78, 's@gmail.com', 'Basketball', 20, '09:00:00', 'Mittwoch', '2024-02-26 10:28:12'),
(79, 's@hak.at', 'Surfen', 25, '10:00:00', 'Donnerstag', '2024-03-20 11:59:18'),
(80, 'sch.l@hak.at', 'Surfen', 25, '10:00:00', 'Donnerstag', '2024-04-01 11:49:21'),
(81, 'm@hakspittal.at', 'Stand-up Paddeln', 25, '10:00:00', 'Samstag', '2024-04-08 07:48:45');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `sportf`
--

CREATE TABLE `sportf` (
  `id` int(11) NOT NULL,
  `art` varchar(100) NOT NULL,
  `preis` int(11) NOT NULL,
  `wochentag` varchar(25) NOT NULL,
  `uhrzeit` time NOT NULL,
  `gruppe` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `sportf`
--

INSERT INTO `sportf` (`id`, `art`, `preis`, `wochentag`, `uhrzeit`, `gruppe`) VALUES
(1, 'Volleyball', 20, 'Montag', '15:00:00', 'Landsport'),
(2, 'Tennis', 20, 'Dienstag', '16:00:00', 'Landsport'),
(3, 'Basketball', 20, 'Mittwoch', '09:00:00', 'Landsport'),
(4, 'Surfen', 25, 'Donnerstag', '10:00:00', 'Wassersport'),
(5, 'Segeln', 25, 'Freitag', '14:00:00', 'Wassersport'),
(6, 'Stand-up Paddeln', 25, 'Samstag', '10:00:00', 'Wassersport');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `wellnessb`
--

CREATE TABLE `wellnessb` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `art` varchar(50) NOT NULL,
  `preis` int(11) NOT NULL,
  `uhrzeit` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `wellnessb`
--

INSERT INTO `wellnessb` (`id`, `email`, `art`, `preis`, `uhrzeit`) VALUES
(26, 's@gmail.com', 'Rückenmassage', 25, '21:00:00'),
(31, 'c@gmail.com', 'Massage (alles)', 45, '19:00:00'),
(32, 'c@gmail.com', 'Rückenmassage', 25, '21:00:00'),
(33, 's@hak.at', 'Rückenmassage', 25, '21:00:00'),
(34, 'sch.l@hak.at', 'Rückenmassage', 25, '21:00:00'),
(35, 'm@hakspittal.at', 'Massage (alles)', 45, '19:00:00');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `wellnessf`
--

CREATE TABLE `wellnessf` (
  `id` int(11) NOT NULL,
  `art` varchar(100) NOT NULL,
  `uhrzeit` time NOT NULL,
  `preis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `wellnessf`
--

INSERT INTO `wellnessf` (`id`, `art`, `uhrzeit`, `preis`) VALUES
(1, 'Massage (alles)', '19:00:00', 45),
(2, 'Thai-Massage', '20:00:00', 30),
(3, 'Rückenmassage', '21:00:00', 25),
(4, 'Fußmassage', '20:30:00', 25);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `bewertung`
--
ALTER TABLE `bewertung`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `buchung`
--
ALTER TABLE `buchung`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `kontakt`
--
ALTER TABLE `kontakt`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `kunden`
--
ALTER TABLE `kunden`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `sportb`
--
ALTER TABLE `sportb`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `sportf`
--
ALTER TABLE `sportf`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `wellnessb`
--
ALTER TABLE `wellnessb`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `wellnessf`
--
ALTER TABLE `wellnessf`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `bewertung`
--
ALTER TABLE `bewertung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `buchung`
--
ALTER TABLE `buchung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `kontakt`
--
ALTER TABLE `kontakt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `kunden`
--
ALTER TABLE `kunden`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT für Tabelle `sportb`
--
ALTER TABLE `sportb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT für Tabelle `sportf`
--
ALTER TABLE `sportf`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT für Tabelle `wellnessb`
--
ALTER TABLE `wellnessb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT für Tabelle `wellnessf`
--
ALTER TABLE `wellnessf`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
