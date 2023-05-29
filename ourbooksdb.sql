-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Mag 29, 2023 alle 15:40
-- Versione del server: 10.4.28-MariaDB
-- Versione PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ourbooksdb`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `books`
--

CREATE TABLE `books` (
  `id_book` varchar(45) NOT NULL,
  `isbn` varchar(14) NOT NULL,
  `title` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `lang` varchar(45) NOT NULL,
  `cover` varchar(400) NOT NULL,
  `status` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELAZIONI PER TABELLA `books`:
--

--
-- Dump dei dati per la tabella `books`
--

INSERT INTO `books` (`id_book`, `isbn`, `title`, `author`, `lang`, `cover`, `status`) VALUES
('64738196bd07f', '9780001857131', 'The Chronicles of Narnia', 'C.S. Lewis', 'Inglese', './images/libri.png', 'gg'),
('6473822ac3218', '9788817080897', 'Alice nel paese delle meraviglie', 'Lewis Carroll', 'Italiano', 'http://books.google.com/books/content?id=7RRKrgEACAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api', NULL),
('647382fb1f985', '9788834729878', 'Maze Runner - il labirinto', 'James Dashner', 'Ita', 'http://books.google.com/books/content?id=A4bYsgEACAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api', 'giovanna'),
('647479040ebc6', '9788868362065', '22/11/63', 'Stephen King', 'Italiano', 'http://books.google.com/books/content?id=ITeJoAEACAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api', NULL),
('647479f8643ea', '9788804665793', 'L\'arte di essere fragili', 'Alessandro D\'Avenia', 'Italiano', 'http://books.google.com/books/content?id=twXIDAEACAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api', NULL),
('64747ae5bd1c7', '9788807018909', 'La meccanica del cuore', 'Mathias Malzieu ', 'Italiano', 'http://books.google.com/books/content?id=_dicpwAACAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api', NULL),
('64747b62a2636', '9788804747222', 'Eden', 'Stanislaw Lem', 'Italiano ', 'http://books.google.com/books/content?id=oNp-zwEACAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api', 'carmelo20'),
('64747e0f7ab5f', '9788807902901', 'Ventimila leghe sotto i mari', 'Jules Verne', 'Italiano', 'http://books.google.com/books/content?id=nkkCtAEACAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api', NULL),
('6474805ec7c60', '9788842931539', 'I leoni di Sicilia', 'Stefania Auci', 'Italiano', './images/libri.png', 'ruredzen'),
('64748a720b607', '9788834741573', 'Odissea Nello Spazio', 'Clarke', 'Italiano', 'http://books.google.com/books/content?id=PxMszgEACAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api', 'ruredzen'),
('6474a7a70c9b8', '9788817139250', 'In un volo di storni', 'Giorgio Parisi', 'Italiano', 'http://books.google.com/books/content?id=RXW7zgEACAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api', NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `provincie`
--

CREATE TABLE `provincie` (
  `Nome` varchar(40) NOT NULL,
  `Sigla` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELAZIONI PER TABELLA `provincie`:
--

--
-- Dump dei dati per la tabella `provincie`
--

INSERT INTO `provincie` (`Nome`, `Sigla`) VALUES
('Agrigento', 'AG'),
('Alessandria', 'AL'),
('Ancona', 'AN'),
('Aosta', 'AO'),
('Arezzo', 'AR'),
('Ascoli Piceno', 'AP'),
('Asti', 'AT'),
('Avellino', 'AV'),
('Bari', 'BA'),
('Barletta-Andria-Trani', 'BT'),
('Belluno', 'BL'),
('Benevento', 'BN'),
('Bergamo', 'BG'),
('Biella', 'BI'),
('Bologna', 'BO'),
('Bolzano', 'BZ'),
('Brescia', 'BS'),
('Brindisi', 'BR'),
('Cagliari', 'CA'),
('Caltanissetta', 'CL'),
('Campobasso', 'CB'),
('Carbonia-Iglesias', 'CI'),
('Caserta', 'CE'),
('Catania', 'CT'),
('Catanzaro', 'CZ'),
('Chieti', 'CH'),
('Como', 'CO'),
('Cosenza', 'CS'),
('Cremona', 'CR'),
('Crotone', 'KR'),
('Cuneo', 'CN'),
('Enna', 'EN'),
('Fermo', 'FM'),
('Ferrara', 'FE'),
('Firenze', 'FI'),
('Foggia', 'FG'),
('Forl�-Cesena', 'FC'),
('Frosinone', 'FR'),
('Genova', 'GE'),
('Gorizia', 'GO'),
('Grosseto', 'GR'),
('Imperia', 'IM'),
('Isernia', 'IS'),
('L\'Aquila', 'AQ'),
('La Spezia', 'SP'),
('Latina', 'LT'),
('Lecce', 'LE'),
('Lecco', 'LC'),
('Livorno', 'LI'),
('Lodi', 'LO'),
('Lucca', 'LU'),
('Macerata', 'MC'),
('Mantova', 'MN'),
('Massa-Carrara', 'MS'),
('Matera', 'MT'),
('Medio Campidano', 'VS'),
('Messina', 'ME'),
('Milano', 'MI'),
('Modena', 'MO'),
('Monza e della Brianza', 'MB'),
('Napoli', 'NA'),
('Novara', 'NO'),
('Nuoro', 'NU'),
('Ogliastra', 'OG'),
('Olbia-Tempio', 'OT'),
('Oristano', 'OR'),
('Padova', 'PD'),
('Palermo', 'PA'),
('Parma', 'PR'),
('Pavia', 'PV'),
('Perugia', 'PG'),
('Pesaro e Urbino', 'PU'),
('Pescara', 'PE'),
('Piacenza', 'PC'),
('Pisa', 'PI'),
('Pistoia', 'PT'),
('Pordenone', 'PN'),
('Potenza', 'PZ'),
('Prato', 'PO'),
('Ragusa', 'RG'),
('Ravenna', 'RA'),
('Reggio Calabria', 'RC'),
('Reggio Emilia', 'RE'),
('Rieti', 'RI'),
('Rimini', 'RN'),
('Roma', 'RM'),
('Rovigo', 'RO'),
('Salerno', 'SA'),
('Sassari', 'SS'),
('Savona', 'SV'),
('Siena', 'SI'),
('Siracusa', 'SR'),
('Sondrio', 'SO'),
('Taranto', 'TA'),
('Teramo', 'TE'),
('Terni', 'TR'),
('Torino', 'TO'),
('Trapani', 'TP'),
('Trento', 'TN'),
('Treviso', 'TV'),
('Trieste', 'TS'),
('Udine', 'UD'),
('Varese', 'VA'),
('Venezia', 'VE'),
('Verbano-Cusio-Ossola', 'VB'),
('Vercelli', 'VC'),
('Verona', 'VR'),
('Vibo Valentia', 'VV'),
('Vicenza', 'VI'),
('Viterbo', 'VT');

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `username` varchar(35) NOT NULL,
  `email` varchar(35) NOT NULL,
  `nome` varchar(35) NOT NULL,
  `cognome` varchar(35) NOT NULL,
  `psw` varchar(10000) NOT NULL,
  `privacy` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELAZIONI PER TABELLA `users`:
--

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`username`, `email`, `nome`, `cognome`, `psw`, `privacy`) VALUES
('airam', 'utente@utente.it', 'Maria ', 'La Terra', '$2y$10$URRLCXd6.GyE3KYiZ6UDouRWACzRmvxHjNFckfOC8cVJvsJy1ITA6', 1),
('carmelo20', 'carmelo@utente.it', 'Carmelo', 'Guarino', '$2y$10$mjU9jzBrq0GSpwGWcTpazOrgug5bQoQv2HXvkYroMzec/TrwVfRCS', 1),
('fagiolin', 'fagiolin@utente.it', 'Enrica   ', 'Guarino', '$2y$10$Z4GawQZNfvK8CkZI9u4b5uYHzL/BhrGjJz6au.g6EQ8777wq78UrO', 1),
('gg', 'gg@utente.it', 'Giovanni', 'Cassarino', '$2y$10$1xAgov7JTVrsHnrU7Ij.PeBncurZ5X5gP.BA0sDNMU1kMlE1ckZKe', 1),
('giovanna', 'giovanna@utente.it', 'Lucia', 'Logiudice', '$2y$10$0GdHhJtwmMPR0ZjTnMz1fecfkiFSoE.PsTT/bStNKf2PkN3/pJZuW', 1),
('ruredzen', 'ruredzen@utente.it', 'Giuseppe ', 'Dibartolo', '$2y$10$y1ZbH6aRJiKwq45FE6yaA.iXoqdWy0eeQipfOxFynV/VGVIIV6GIG', 1),
('sili', 'sili@utente.it', 'Silvia', 'Carbi', '$2y$10$xW8j/IocG6O7Xmh.UBd.tOIA0jFtR2JE6n7qlPLbyLTTYj41u3Npm', 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `uses`
--

CREATE TABLE `uses` (
  `id_book` varchar(45) NOT NULL,
  `username` varchar(40) NOT NULL,
  `place` varchar(90) NOT NULL,
  `provincia` varchar(45) NOT NULL,
  `when_release_found` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `type_book` tinyint(1) NOT NULL COMMENT '1 = libro trovato\r\n0 = libro lasciato\r\n2 = libro rilasciato'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELAZIONI PER TABELLA `uses`:
--   `id_book`
--       `books` -> `id_book`
--   `username`
--       `users` -> `username`
--

--
-- Dump dei dati per la tabella `uses`
--

INSERT INTO `uses` (`id_book`, `username`, `place`, `provincia`, `when_release_found`, `type_book`) VALUES
('64738196bd07f', 'fagiolin', 'Ragusa - CCC', 'Ragusa', '2023-05-28 16:30:15', 0),
('64738196bd07f', 'gg', '', '', '2023-05-29 10:23:29', 1),
('64738196bd07f', 'ruredzen', '', '', '2023-05-28 22:29:27', 1),
('64738196bd07f', 'ruredzen', 'Palazzolo', 'Siracusa', '2023-05-29 10:19:17', 2),
('6473822ac3218', 'fagiolin', 'Torino - p.zza garibaldi', 'Torino', '2023-05-28 16:32:44', 0),
('647382fb1f985', 'fagiolin', 'Ragusa - Area bookcrossing centro', 'Ragusa', '2023-05-28 16:36:12', 0),
('647382fb1f985', 'giovanna', '', '', '2023-05-29 10:18:18', 1),
('647479040ebc6', 'fagiolin', '', '', '2023-05-29 11:56:04', 1),
('647479040ebc6', 'fagiolin', 'TORINO - PO', 'Torino', '2023-05-29 11:56:28', 2),
('647479040ebc6', 'giovanna', 'Catania ', 'Catania', '2023-05-29 10:06:25', 0),
('647479f8643ea', 'fagiolin', '', '', '2023-05-29 11:33:10', 1),
('647479f8643ea', 'fagiolin', 'Torino', 'Torino', '2023-05-29 11:57:17', 2),
('647479f8643ea', 'giovanna', 'Catania - ABC', 'Catania', '2023-05-29 10:10:01', 0),
('64747ae5bd1c7', 'gg', '', '', '2023-05-29 11:48:41', 1),
('64747ae5bd1c7', 'gg', 'Ispica', 'Ragusa', '2023-05-29 11:53:20', 2),
('64747ae5bd1c7', 'giovanna', 'Catania -CCC', 'Catania', '2023-05-29 10:13:59', 0),
('64747b62a2636', 'carmelo20', '', '', '2023-05-29 13:07:00', 1),
('64747b62a2636', 'giovanna', 'Catania', 'Catania', '2023-05-29 10:16:03', 0),
('64747e0f7ab5f', 'gg', 'Marina di Ragusa', 'Ragusa', '2023-05-29 10:27:28', 0),
('6474805ec7c60', 'gg', 'Santa Croce Camerina', 'Ragusa', '2023-05-29 10:37:19', 0),
('64748a720b607', 'gg', 'Santa Croce Camerina', 'Ragusa', '2023-05-29 11:20:19', 0),
('64748a720b607', 'ruredzen', '', '', '2023-05-29 11:27:09', 1),
('6474a7a70c9b8', 'carmelo20', 'Genova', 'Genova', '2023-05-29 13:25:23', 0);

--
-- Trigger `uses`
--
DELIMITER $$
CREATE TRIGGER `UPDATE_BOOKS` AFTER INSERT ON `uses` FOR EACH ROW BEGIN
	IF NEW.type_book = 1
    THEN
    	UPDATE books b
        SET b.status = NEW.username
        WHERE b.id_book = NEW.id_book;
     END IF;
     
     IF (NEW.type_book = 0 OR NEW.type_book = 2)
     THEN
     	UPDATE books b
        SET b.status = NULL
        WHERE b.id_book = NEW.id_book;
      END IF;
END
$$
DELIMITER ;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id_book`);

--
-- Indici per le tabelle `provincie`
--
ALTER TABLE `provincie`
  ADD PRIMARY KEY (`Nome`,`Sigla`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indici per le tabelle `uses`
--
ALTER TABLE `uses`
  ADD PRIMARY KEY (`id_book`,`username`,`place`,`provincia`,`when_release_found`,`type_book`),
  ADD KEY `username` (`username`);

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `uses`
--
ALTER TABLE `uses`
  ADD CONSTRAINT `uses_ibfk_1` FOREIGN KEY (`id_book`) REFERENCES `books` (`id_book`),
  ADD CONSTRAINT `uses_ibfk_2` FOREIGN KEY (`username`) REFERENCES `users` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
