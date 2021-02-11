-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Feb 11, 2021 alle 08:04
-- Versione del server: 10.4.10-MariaDB
-- Versione PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mercatino`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `acquista`
--

CREATE TABLE `acquista` (
  `CF` varchar(16) NOT NULL,
  `ID_A` int(11) NOT NULL,
  `MetodoPagamento` enum('di persona','carta di credito') NOT NULL,
  `Conferma` tinyint(1) NOT NULL,
  `DataAcquisto` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `acquista`
--

INSERT INTO `acquista` (`CF`, `ID_A`, `MetodoPagamento`, `Conferma`, `DataAcquisto`) VALUES
('BRBRCR99S05D142T', 3, 'di persona', 1, '2021-01-02'),
('MRCPSE98S02F346Z', 2, 'di persona', 1, '2021-01-01'),
('MRCPSE98S02F346Z', 7, 'di persona', 1, '2021-01-05');

-- --------------------------------------------------------

--
-- Struttura della tabella `annuncio`
--

CREATE TABLE `annuncio` (
  `ID_A` int(11) NOT NULL,
  `Nome_A` varchar(255) DEFAULT NULL,
  `Prezzo` float(10,0) DEFAULT NULL,
  `Comune` varchar(20) DEFAULT NULL,
  `Provincia` varchar(20) DEFAULT NULL,
  `Regione` varchar(20) DEFAULT NULL,
  `DataFine` date DEFAULT current_timestamp(),
  `ID_P` int(11) DEFAULT NULL,
  `Tipo` enum('pubblico','privato','ristretto') DEFAULT NULL,
  `AreaGeo` varchar(20) DEFAULT NULL,
  `CF` varchar(16) DEFAULT NULL,
  `DataPubb` date DEFAULT current_timestamp(),
  `Descrizione` varchar(5000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `annuncio`
--

INSERT INTO `annuncio` (`ID_A`, `Nome_A`, `Prezzo`, `Comune`, `Provincia`, `Regione`, `DataFine`, `ID_P`, `Tipo`, `AreaGeo`, `CF`, `DataPubb`, `Descrizione`) VALUES
(1, 'Annuncio1', 32, 'Crema', 'Pieranica', 'CR', '2021-02-28', 6, 'pubblico', '', 'BRBRCR99S05D142T', '2020-12-17', 'Forno nuovo mai usato'),
(2, 'Annuncio2', 43, 'Crema', 'CR', 'Lombardia', '2021-01-31', 7, 'pubblico', '', 'BRBRCR99S05D142T', '2020-12-17', 'Racchetta da tennis'),
(3, 'Annuncio3', 90, 'Venosa', 'PZ', 'Basilicata', '2021-01-31', 8, 'privato', '', 'RMNMAL98D03T251Z', '2020-12-17', 'Videocamera mai usata'),
(4, 'Annuncio4', 66, 'Venosa', 'PZ', 'Basilicata', '2021-02-28', 9, 'ristretto', 'Basilicata', 'RMNMAL98D03T251Z', '2020-12-24', 'Camicia quasi mai indossata, taglia L'),
(5, 'Annuncio5', 89, 'Crema', 'CR', 'Lombardia', '2021-02-28', 10, 'pubblico', '', 'BRBRCR99S05D142T', '2021-01-01', 'Scarpe nuove, taglia 41'),
(6, 'Annuncio6', 95, 'Firenze', 'Firenze', 'Toscana', '2021-02-28', 11, 'pubblico', '', 'GRGGOI73S02A172Z', '2020-12-24', 'Lavatrice portatile 2 in 1'),
(7, 'Annuncio7', 20, 'Firenze', 'Firenze', 'Toscana', '2021-01-31', 12, 'pubblico', '', 'GRGGOI73S02A172Z', '2020-12-26', 'Pallone del mondiale del 2010'),
(8, 'Annunncio8', 12, 'Crema', 'CR', 'Lombardia', '2021-02-28', 13, 'pubblico', '', 'BRBRCR99S05D142T', '2020-12-30', 'Occhiali da sole mai usati, ancora incartati'),
(9, 'Annuncio9', 45, 'Crema', 'Chieti', 'Abruzzo', '2021-02-28', 14, 'pubblico', '', 'BRBRCR99S05D142T', '2021-01-17', 'Vestito mai usato'),
(10, 'Annuncio10', 8, 'Venosa', 'Potenza', 'Basilicata', '2021-02-09', 15, 'pubblico', NULL, 'RMNMAL98D03T251Z', '2021-02-02', 'Quaderno a quadretti 5 mm, verde ');

-- --------------------------------------------------------

--
-- Struttura della tabella `categoria`
--

CREATE TABLE `categoria` (
  `Categoria` enum('Elettrodomestici','Foto e video','Abbigliamento','Hobby') NOT NULL,
  `Sottocategoria` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `categoria`
--

INSERT INTO `categoria` (`Categoria`, `Sottocategoria`) VALUES
('', 'Occhiali'),
('Elettrodomestici', 'Forno'),
('Elettrodomestici', 'Lavatrici'),
('Foto e video', 'Occhial'),
('Foto e video', 'Videocamere'),
('Abbigliamento', 'Camicia'),
('Abbigliamento', 'Occhiali'),
('Abbigliamento', 'Scarpe'),
('Abbigliamento', 'Vestito'),
('Hobby', 'Accessori Sport'),
('Hobby', 'Cartoleria'),
('Hobby', 'Palla');

-- --------------------------------------------------------

--
-- Struttura della tabella `indirizzo`
--

CREATE TABLE `indirizzo` (
  `Via` varchar(100) NOT NULL,
  `Citta` varchar(100) NOT NULL,
  `Prov` varchar(100) NOT NULL,
  `Reg` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `indirizzo`
--

INSERT INTO `indirizzo` (`Via`, `Citta`, `Prov`, `Reg`) VALUES
('A. Manzoni, 31', 'Firenze', 'Firenze', 'Toscana'),
('Cocco', 'Venosa', 'PZ', 'Basilicata'),
('Medici', 'Brescia', 'BR', 'Lombardia'),
('Roma', 'Pieranica', 'CR', 'Lombardia'),
('Roma, 7', 'Pieranica', 'CR', 'Lombardia');

-- --------------------------------------------------------

--
-- Struttura della tabella `osserva`
--

CREATE TABLE `osserva` (
  `CF` varchar(16) NOT NULL,
  `ID_A` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `osserva`
--

INSERT INTO `osserva` (`CF`, `ID_A`) VALUES
('BRBRCR99S05D142T', 5),
('BRBRCR99S05D142T', 8);

-- --------------------------------------------------------

--
-- Struttura della tabella `prodotto`
--

CREATE TABLE `prodotto` (
  `ID_P` int(11) NOT NULL,
  `Nome_P` varchar(255) NOT NULL,
  `Tipo` enum('nuovo','usato') NOT NULL,
  `Foto` varchar(500) DEFAULT NULL,
  `PeriodoAssicurazione` int(11) DEFAULT NULL,
  `StatoUsura` varchar(255) DEFAULT NULL,
  `PeriodoUtilizzo` int(11) DEFAULT NULL,
  `Sottocategoria` varchar(100) NOT NULL,
  `Categoria` enum('Elettrodomestici','Foto e video','Abbigliamento','Hobby') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `prodotto`
--

INSERT INTO `prodotto` (`ID_P`, `Nome_P`, `Tipo`, `Foto`, `PeriodoAssicurazione`, `StatoUsura`, `PeriodoUtilizzo`, `Sottocategoria`, `Categoria`) VALUES
(6, 'Prodotto1', 'nuovo', 'forno.jpg', 0, '', 0, 'Forno', 'Elettrodomestici'),
(7, 'Prodotto2', 'usato', 'racchetta.jpg', 0, 'Usato', 12, 'Accessori Sport', 'Hobby'),
(8, 'Prodotto3', 'nuovo', 'videocamera.jpg', 12, '', 0, 'Videocamere', 'Foto e video'),
(9, 'Prodotto4', 'usato', 'product-5.jpg', 0, 'Quasi nuovo', 2, 'Camicia', 'Abbigliamento'),
(10, 'Prodotto5', 'nuovo', 'product-6.jpg', 0, '', 0, 'Scarpe', 'Abbigliamento'),
(11, 'Prodotto6', 'nuovo', 'lavatrice.jpg', 5, '', 0, 'Lavatrici', 'Elettrodomestici'),
(12, 'Prodotto7', 'usato', 'pallone.png', 0, 'Abbastanza usato', 24, 'Palla', 'Hobby'),
(13, 'Prodotto8', 'nuovo', 'occhiali.jpg', 0, '', 0, 'Occhiali', 'Abbigliamento'),
(14, 'Prodotto9', 'nuovo', 'product-3.jpg', 11, '', 0, 'Vestito', 'Abbigliamento'),
(15, 'Prodotto10', 'nuovo', 'quaderno.jpg', 0, '', 0, 'Cartoleria', 'Hobby');

-- --------------------------------------------------------

--
-- Struttura della tabella `regioni`
--

CREATE TABLE `regioni` (
  `provincia` varchar(50) NOT NULL,
  `regione` varchar(50) NOT NULL,
  `sigla` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `regioni`
--

INSERT INTO `regioni` (`provincia`, `regione`, `sigla`) VALUES
('Agrigento', 'Sicilia', 'AG'),
('Alessandria', 'Piemonte', 'AL'),
('Ancona', 'Marche', 'AN'),
('Aosta', 'Valle d\'Aosta', 'AO'),
('Arezzo', 'Toscana', 'AR'),
('Ascoli Piceno', 'Marche', 'AP'),
('Asti', 'Piemonte', 'AT'),
('Avellino', 'Campania', 'AV'),
('Bari', 'Puglia', 'BA'),
('Barletta-Andria-Trani', 'Puglia', 'BT'),
('Belluno', 'Veneto', 'BL'),
('Benevento', 'Campania', 'BN'),
('Bergamo', 'Lombardia', 'BG'),
('Biella', 'Piemonte', 'BI'),
('Bologna', 'Emilia-Romagna', 'BO'),
('Bolzano', 'Trentino-Alto Adige', 'BZ'),
('Brescia', 'Lombardia', 'BS'),
('Brindisi', 'Puglia', 'BR'),
('Cagliari', 'Sardegna', 'CA'),
('Caltanissetta', 'Sicilia', 'CL'),
('Campobasso', 'Molise', 'CB'),
('Carbonia-Iglesias', 'Sardegna', 'CI'),
('Caserta', 'Campania', 'CE'),
('Catania', 'Sicilia', 'CT'),
('Catanzaro', 'Calabria', 'CZ'),
('Chieti', 'Abruzzo', 'CH'),
('Como', 'Lombardia', 'CO'),
('Cosenza', 'Calabria', 'CS'),
('Cremona', 'Lombardia', 'CR'),
('Crotone', 'Calabria', 'KR'),
('Cuneo', 'Piemonte', 'CN'),
('Enna', 'Sicilia', 'EN'),
('Fermo', 'Marche', 'FM'),
('Ferrara', 'Emilia-Romagna', 'FE'),
('Firenze', 'Toscana', 'FI'),
('Foggia', 'Puglia', 'FG'),
('Forl?-Cesena', 'Emilia-Romagna', 'FC'),
('Frosinone', 'Lazio', 'FR'),
('Genova', 'Liguria', 'GE'),
('Gorizia', 'Friuli-Venezia Giulia', 'GO'),
('Grosseto', 'Toscana', 'GR'),
('Imperia', 'Liguria', 'IM'),
('Isernia', 'Molise', 'IS'),
('L\'Aquila', 'Abruzzo', 'AQ'),
('La Spezia', 'Liguria', 'SP'),
('Latina', 'Lazio', 'LT'),
('Lecce', 'Puglia', 'LE'),
('Lecco', 'Lombardia', 'LC'),
('Livorno', 'Toscana', 'LI'),
('Lodi', 'Lombardia', 'LO'),
('Lucca', 'Toscana', 'LU'),
('Macerata', 'Marche', 'MC'),
('Mantova', 'Lombardia', 'MN'),
('Massa-Carrara', 'Toscana', 'MS'),
('Matera', 'Basilicata', 'MT'),
('Medio Campidano', 'Sardegna', 'VS'),
('Messina', 'Sicilia', 'ME'),
('Milano', 'Lombardia', 'MI'),
('Modena', 'Emilia-Romagna', 'MO'),
('Monza e della Brianza', 'Lombardia', 'MB'),
('Napoli', 'Campania', 'NA'),
('Novara', 'Piemonte', 'NO'),
('Nuoro', 'Sardegna', 'NU'),
('Ogliastra', 'Sardegna', 'OG'),
('Olbia-Tempio', 'Sardegna', 'OT'),
('Oristano', 'Sardegna', 'OR'),
('Padova', 'Veneto', 'PD'),
('Palermo', 'Sicilia', 'PA'),
('Parma', 'Emilia-Romagna', 'PR'),
('Pavia', 'Lombardia', 'PV'),
('Perugia', 'Umbria', 'PG'),
('Pesaro e Urbino', 'Marche', 'PU'),
('Pescara', 'Abruzzo', 'PE'),
('Piacenza', 'Emilia-Romagna', 'PC'),
('Pisa', 'Toscana', 'PI'),
('Pistoia', 'Toscana', 'PT'),
('Pordenone', 'Friuli-Venezia Giulia', 'PN'),
('Potenza', 'Basilicata', 'PZ'),
('Prato', 'Toscana', 'PO'),
('Ragusa', 'Sicilia', 'RG'),
('Ravenna', 'Emilia-Romagna', 'RA'),
('Reggio Calabria', 'Calabria', 'RC'),
('Reggio Emilia', 'Emilia-Romagna', 'RE'),
('Rieti', 'Lazio', 'RI'),
('Rimini', 'Emilia-Romagna', 'RN'),
('Roma', 'Lazio', 'RM'),
('Rovigo', 'Veneto', 'RO'),
('Salerno', 'Campania', 'SA'),
('Sassari', 'Sardegna', 'SS'),
('Savona', 'Liguria', 'SV'),
('Siena', 'Toscana', 'SI'),
('Siracusa', 'Sicilia', 'SR'),
('Sondrio', 'Lombardia', 'SO'),
('Taranto', 'Puglia', 'TA'),
('Teramo', 'Abruzzo', 'TE'),
('Terni', 'Umbria', 'TR'),
('Torino', 'Piemonte', 'TO'),
('Trapani', 'Sicilia', 'TP'),
('Trento', 'Trentino-Alto Adige', 'TN'),
('Treviso', 'Veneto', 'TV'),
('Trieste', 'Friuli-Venezia Giulia', 'TS'),
('Udine', 'Friuli-Venezia Giulia', 'UD'),
('Varese', 'Lombardia', 'VA'),
('Venezia', 'Veneto', 'VE'),
('Verbano-Cusio-Ossola', 'Piemonte', 'VB'),
('Vercelli', 'Piemonte', 'VC'),
('Verona', 'Veneto', 'VR'),
('Vibo Valentia', 'Calabria', 'VV'),
('Vicenza', 'Veneto', 'VI'),
('Viterbo', 'Lazio', 'VT');

-- --------------------------------------------------------

--
-- Struttura della tabella `stati`
--

CREATE TABLE `stati` (
  `CF` varchar(16) NOT NULL,
  `ID_A` int(11) NOT NULL,
  `Stato` enum('in vendita','venduto','eliminato') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `stati`
--

INSERT INTO `stati` (`CF`, `ID_A`, `Stato`) VALUES
('BRBRCR99S05D142T', 1, 'in vendita'),
('BRBRCR99S05D142T', 2, 'venduto'),
('BRBRCR99S05D142T', 5, 'in vendita'),
('BRBRCR99S05D142T', 8, 'in vendita'),
('BRBRCR99S05D142T', 9, 'in vendita'),
('GRGGOI73S02A172Z', 6, 'in vendita'),
('GRGGOI73S02A172Z', 7, 'venduto'),
('RMNMAL98D03T251Z', 3, 'venduto'),
('RMNMAL98D03T251Z', 4, 'in vendita'),
('RMNMAL98D03T251Z', 10, 'eliminato');

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE `utente` (
  `CF` varchar(16) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Tipo` enum('Venditore','Acquirente','Venditore e Acquirente','') NOT NULL,
  `Nome` varchar(50) NOT NULL,
  `Cognome` varchar(50) NOT NULL,
  `Immagine` varchar(500) DEFAULT NULL,
  `Eliminato` tinyint(1) NOT NULL,
  `Via` varchar(100) NOT NULL,
  `Città` varchar(100) NOT NULL,
  `Prov` varchar(100) NOT NULL,
  `Reg` varchar(100) NOT NULL,
  `Password` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `utente`
--

INSERT INTO `utente` (`CF`, `Email`, `Tipo`, `Nome`, `Cognome`, `Immagine`, `Eliminato`, `Via`, `Città`, `Prov`, `Reg`, `Password`) VALUES
('BRBRCR99S05D142T', 'riccardobarbieri99@gmail.com', 'Venditore e Acquirente', 'Riccardo', 'Barbieri', 'IMG-20200808-WA0007.jpg', 0, 'Roma', 'Pieranica', 'CR', 'Lombardia', '$2y$10$jXAttecrLOqVazwzyVVrMO9dtxDk8fHO1cZ3VQxXa02hnVFLzd9Du'),
('GRGGOI73S02A172Z', 'giorgio@gmail.com', 'Venditore e Acquirente', 'Giorgio', 'Gori', 'giorgio-gori.jpg', 0, 'A. Manzoni, 31', 'Firenze', 'Firenze', 'Toscana', '$2y$10$0as9KXHv.hCgo0mAnSV41.uMSEIpx9sNNNfgMZjAJ2se70pySlhZS'),
('MRCPSE98S02F346Z', 'marco@pesce.it', 'Acquirente', 'Marco', 'Pesce', 'pesce.jpg', 0, 'Medici', 'Brescia', 'BR', 'Lombardia', '$2y$10$76y2ol.nvECJemuUx78OReE6j8kqGGIBJUMpTgccImH3DI.Hw.kUK'),
('RMNMAL98D03T251Z', 'sapo@gmail.com', 'Venditore', 'Romano', 'Maiorella', 'sapo.jpg', 0, 'Cocco', 'Venosa', 'PZ', 'Basilicata', '$2y$10$qprfKGEK.PVTJH9oHRj/Rud9PRX./jOzMtBh7hIxNAG0Zl2I9jCIe');

-- --------------------------------------------------------

--
-- Struttura della tabella `valutazione`
--

CREATE TABLE `valutazione` (
  `Serietà` enum('1','2','3','4','5') NOT NULL,
  `Puntualità` enum('1','2','3','4','5') NOT NULL,
  `ID_A` int(11) NOT NULL,
  `CF1` varchar(16) NOT NULL,
  `CF2` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `valutazione`
--

INSERT INTO `valutazione` (`Serietà`, `Puntualità`, `ID_A`, `CF1`, `CF2`) VALUES
('5', '5', 2, 'BRBRCR99S05D142T', 'MRCPSE98S02F346Z'),
('4', '2', 2, 'MRCPSE98S02F346Z', 'BRBRCR99S05D142T'),
('5', '5', 3, 'BRBRCR99S05D142T', 'RMNMAL98D03T251Z'),
('2', '3', 3, 'RMNMAL98D03T251Z', 'BRBRCR99S05D142T'),
('2', '5', 7, 'MRCPSE98S02F346Z', 'GRGGOI73S02A172Z');

-- --------------------------------------------------------

--
-- Struttura della tabella `visibilità`
--

CREATE TABLE `visibilità` (
  `Tipo` enum('pubblico','privato','ristretto') CHARACTER SET utf8 NOT NULL,
  `AreaGeo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `visibilità`
--

INSERT INTO `visibilità` (`Tipo`, `AreaGeo`) VALUES
('pubblico', ''),
('privato', ''),
('ristretto', 'Basilicata');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `acquista`
--
ALTER TABLE `acquista`
  ADD PRIMARY KEY (`CF`,`ID_A`),
  ADD KEY `ID_A` (`ID_A`);

--
-- Indici per le tabelle `annuncio`
--
ALTER TABLE `annuncio`
  ADD PRIMARY KEY (`ID_A`),
  ADD KEY `ID_P` (`ID_P`),
  ADD KEY `Tipo` (`Tipo`,`AreaGeo`),
  ADD KEY `CF` (`CF`);

--
-- Indici per le tabelle `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`Categoria`,`Sottocategoria`);

--
-- Indici per le tabelle `indirizzo`
--
ALTER TABLE `indirizzo`
  ADD PRIMARY KEY (`Via`,`Citta`,`Prov`,`Reg`);

--
-- Indici per le tabelle `osserva`
--
ALTER TABLE `osserva`
  ADD PRIMARY KEY (`CF`,`ID_A`),
  ADD KEY `ID_A` (`ID_A`);

--
-- Indici per le tabelle `prodotto`
--
ALTER TABLE `prodotto`
  ADD PRIMARY KEY (`ID_P`),
  ADD KEY `Categoria` (`Categoria`,`Sottocategoria`);

--
-- Indici per le tabelle `regioni`
--
ALTER TABLE `regioni`
  ADD PRIMARY KEY (`provincia`),
  ADD UNIQUE KEY `sigla` (`sigla`);

--
-- Indici per le tabelle `stati`
--
ALTER TABLE `stati`
  ADD PRIMARY KEY (`CF`,`ID_A`),
  ADD KEY `ID_A` (`ID_A`);

--
-- Indici per le tabelle `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`CF`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD KEY `Via` (`Via`,`Città`,`Prov`,`Reg`);

--
-- Indici per le tabelle `valutazione`
--
ALTER TABLE `valutazione`
  ADD PRIMARY KEY (`ID_A`,`CF1`,`CF2`),
  ADD KEY `CF1` (`CF1`),
  ADD KEY `CF2` (`CF2`);

--
-- Indici per le tabelle `visibilità`
--
ALTER TABLE `visibilità`
  ADD PRIMARY KEY (`Tipo`,`AreaGeo`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `annuncio`
--
ALTER TABLE `annuncio`
  MODIFY `ID_A` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT per la tabella `prodotto`
--
ALTER TABLE `prodotto`
  MODIFY `ID_P` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `acquista`
--
ALTER TABLE `acquista`
  ADD CONSTRAINT `acquista_ibfk_2` FOREIGN KEY (`ID_A`) REFERENCES `annuncio` (`ID_A`),
  ADD CONSTRAINT `acquista_ibfk_3` FOREIGN KEY (`CF`) REFERENCES `utente` (`CF`);

--
-- Limiti per la tabella `annuncio`
--
ALTER TABLE `annuncio`
  ADD CONSTRAINT `annuncio_ibfk_1` FOREIGN KEY (`ID_P`) REFERENCES `prodotto` (`ID_P`),
  ADD CONSTRAINT `annuncio_ibfk_2` FOREIGN KEY (`Tipo`,`AreaGeo`) REFERENCES `visibilità` (`Tipo`, `AreaGeo`),
  ADD CONSTRAINT `annuncio_ibfk_3` FOREIGN KEY (`CF`) REFERENCES `utente` (`CF`);

--
-- Limiti per la tabella `osserva`
--
ALTER TABLE `osserva`
  ADD CONSTRAINT `osserva_ibfk_2` FOREIGN KEY (`ID_A`) REFERENCES `annuncio` (`ID_A`),
  ADD CONSTRAINT `osserva_ibfk_3` FOREIGN KEY (`CF`) REFERENCES `utente` (`CF`);

--
-- Limiti per la tabella `prodotto`
--
ALTER TABLE `prodotto`
  ADD CONSTRAINT `prodotto_ibfk_1` FOREIGN KEY (`Categoria`,`Sottocategoria`) REFERENCES `categoria` (`Categoria`, `Sottocategoria`);

--
-- Limiti per la tabella `stati`
--
ALTER TABLE `stati`
  ADD CONSTRAINT `stati_ibfk_1` FOREIGN KEY (`CF`) REFERENCES `utente` (`CF`),
  ADD CONSTRAINT `stati_ibfk_2` FOREIGN KEY (`ID_A`) REFERENCES `annuncio` (`ID_A`);

--
-- Limiti per la tabella `utente`
--
ALTER TABLE `utente`
  ADD CONSTRAINT `utente_ibfk_1` FOREIGN KEY (`Via`,`Città`,`Prov`,`Reg`) REFERENCES `indirizzo` (`Via`, `Citta`, `Prov`, `Reg`);

--
-- Limiti per la tabella `valutazione`
--
ALTER TABLE `valutazione`
  ADD CONSTRAINT `valutazione_ibfk_1` FOREIGN KEY (`ID_A`) REFERENCES `annuncio` (`ID_A`),
  ADD CONSTRAINT `valutazione_ibfk_2` FOREIGN KEY (`CF1`) REFERENCES `utente` (`CF`),
  ADD CONSTRAINT `valutazione_ibfk_3` FOREIGN KEY (`CF2`) REFERENCES `utente` (`CF`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
