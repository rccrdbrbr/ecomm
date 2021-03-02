-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mar 02, 2021 alle 19:28
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
  `Nome_A` varchar(255) NOT NULL,
  `Prezzo` float(10,0) NOT NULL,
  `Comune` varchar(20) NOT NULL,
  `Provincia` varchar(100) NOT NULL,
  `Regione` varchar(100) NOT NULL,
  `DataFine` date NOT NULL DEFAULT current_timestamp(),
  `ID_P` int(11) NOT NULL,
  `Tipo` enum('pubblico','privato','ristretto') NOT NULL,
  `AreaGeo` varchar(20) NOT NULL,
  `CF` varchar(16) NOT NULL,
  `DataPubb` date NOT NULL DEFAULT current_timestamp(),
  `Descrizione` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `annuncio`
--

INSERT INTO `annuncio` (`ID_A`, `Nome_A`, `Prezzo`, `Comune`, `Provincia`, `Regione`, `DataFine`, `ID_P`, `Tipo`, `AreaGeo`, `CF`, `DataPubb`, `Descrizione`) VALUES
(1, 'Annuncio1', 32, 'Crema', 'Cremona', 'Lombardia', '2021-02-28', 6, 'pubblico', '', 'BRBRCR99S05D142T', '2020-12-17', 'Forno nuovo mai usato'),
(2, 'Annuncio2', 43, 'Crema', 'Cremona', 'Lombardia', '2021-01-31', 7, 'pubblico', '', 'BRBRCR99S05D142T', '2020-12-17', 'Racchetta da tennis'),
(3, 'Annuncio3', 90, 'Venosa', 'Potenza', 'Basilicata', '2021-01-31', 8, 'privato', '', 'RMNMAL98D03T251Z', '2020-12-17', 'Videocamera mai usata'),
(4, 'Annuncio4', 66, 'Venosa', 'Potenza', 'Basilicata', '2021-02-28', 9, 'pubblico', '', 'RMNMAL98D03T251Z', '2020-12-24', 'Camicia quasi mai indossata, taglia L'),
(5, 'Annuncio5', 89, 'Crema', 'Cremona', 'Lombardia', '2021-02-28', 10, 'pubblico', '', 'BRBRCR99S05D142T', '2021-01-01', 'Scarpe nuove, taglia 41'),
(6, 'Annuncio6', 95, 'Firenze', 'Firenze', 'Toscana', '2021-02-28', 11, 'pubblico', '', 'GRGGOI73S02A172Z', '2020-12-24', 'Lavatrice portatile 2 in 1'),
(7, 'Annuncio7', 20, 'Firenze', 'Firenze', 'Toscana', '2021-03-10', 12, 'pubblico', '', 'GRGGOI73S02A172Z', '2020-12-26', 'Pallone del mondiale del 2010'),
(8, 'Annuncio8', 12, 'Crema', 'Cremona', 'Lombardia', '2021-03-10', 13, 'pubblico', '', 'BRBRCR99S05D142T', '2020-12-30', 'Occhiali da sole mai usati, ancora incartati'),
(9, 'Annuncio9', 45, 'Crema', 'Chieti', 'Abruzzo', '2021-02-28', 14, 'pubblico', '', 'BRBRCR99S05D142T', '2021-01-17', 'Vestito mai usato'),
(10, 'Annuncio10', 8, 'Venosa', 'Potenza', 'Basilicata', '2021-03-10', 15, 'pubblico', '', 'RMNMAL98D03T251Z', '2021-02-02', 'Quaderno a quadretti 5 mm, verde '),
(11, 'Annuncio11', 123, 'Venosa', 'Potenza', 'Basilicata', '2021-03-01', 16, 'pubblico', '', 'RMNMAL98D03T251Z', '2021-02-15', 'dascbhob'),
(12, 'Annuncio12', 200, 'Venosa', 'Potenza', 'Basilicata', '2021-02-23', 17, 'pubblico', '', 'RMNMAL98D03T251Z', '2021-02-15', 'Sedia di design'),
(13, 'Annuncio13', 200, 'Venosa', 'Potenza', 'Basilicata', '2021-03-10', 18, 'pubblico', '', 'RMNMAL98D03T251Z', '2021-02-15', 'Sedia di design'),
(14, 'Annuncio14', 60, 'Venosa', 'Potenza', 'Basilicata', '2021-03-10', 19, 'pubblico', '', 'RMNMAL98D03T251Z', '2021-02-15', 'Camicia mai usata, taglia L');

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
('', 'Camicia'),
('', 'Occhiali'),
('Elettrodomestici', 'Forno'),
('Elettrodomestici', 'Lavatrici'),
('Elettrodomestici', 'Sedia'),
('Foto e video', 'Camicia'),
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
('A. Manzoni, 31\r\n', 'Firenze', 'FI', 'Toscana'),
('Cocco', 'Venosa', 'PZ', 'Basilicata'),
('Medici', 'Brescia', 'BR', 'Lombardia'),
('Medici', 'Brescia', 'CB', 'Molise'),
('Roma', 'Pieranica', 'AN', 'Marche'),
('Roma', 'Pieranica', 'CA', 'Sardegna'),
('Roma', 'Pieranica', 'CR', 'Lombardia'),
('Roma', 'Pieranica', 'PN', 'Friuli-Venezia Giulia'),
('roma', 'Pieranica', 'PV', 'Lombardia'),
('Roma, 7', 'Pieranica', 'CR', 'Lombardia');

-- --------------------------------------------------------

--
-- Struttura della tabella `osserva`
--

CREATE TABLE `osserva` (
  `CF` varchar(16) NOT NULL,
  `ID_A` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `prodotto`
--

CREATE TABLE `prodotto` (
  `ID_P` int(11) NOT NULL,
  `Nome_P` varchar(255) NOT NULL,
  `Tipo` enum('nuovo','usato') NOT NULL,
  `Foto` varchar(500) NOT NULL,
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
(9, 'Prodotto4', 'usato', 'product-5.jpg', 0, 'Quasi nuovo', 2, 'Camicia', ''),
(10, 'Prodotto5', 'nuovo', 'product-6.jpg', 0, '', 0, 'Scarpe', 'Abbigliamento'),
(11, 'Prodotto6', 'nuovo', 'lavatrice.jpg', 5, '', 0, 'Lavatrici', 'Elettrodomestici'),
(12, 'Prodotto7', 'usato', 'pallone.png', 0, 'Abbastanza usato', 24, 'Palla', 'Hobby'),
(13, 'Prodotto8', 'nuovo', 'occhiali.jpg', 0, '', 0, 'Occhiali', 'Abbigliamento'),
(14, 'Prodotto9', 'nuovo', 'product-3.jpg', 11, '', 0, 'Vestito', 'Abbigliamento'),
(15, 'Prodotto10', 'nuovo', 'quaderno.jpg', 0, '', 0, 'Cartoleria', 'Hobby'),
(16, 'Prodotto11', 'nuovo', 'CatturaSociologia.PNG', 12, '', 0, 'Camicia', 'Foto e video'),
(17, 'Prodotto12', 'nuovo', 'sedia.jpg', 12, '', 0, 'Sedia', 'Elettrodomestici'),
(18, 'Prodotto13', 'nuovo', 'sedia.jpg', 12, '', 0, 'Sedia', 'Elettrodomestici'),
(19, 'Prodotto14', 'nuovo', 'camicia.jpg', 6, '', 0, 'Camicia', 'Abbigliamento');

-- --------------------------------------------------------

--
-- Struttura della tabella `regioni`
--

CREATE TABLE `regioni` (
  `provincia` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `regione` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `sigla` varchar(2) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `regioni`
--

INSERT INTO `regioni` (`provincia`, `regione`, `sigla`) VALUES
('Agrigento', 'Sicilia', 'AG'),
('Alessandria', 'Piemonte', 'AL'),
('Ancona', 'Marche', 'AN'),
('Aosta', 'Valle d\'Aosta', 'AO'),
('Ascoli Piceno', 'Marche', 'AP'),
('L\'Aquila', 'Abruzzo', 'AQ'),
('Arezzo', 'Toscana', 'AR'),
('Asti', 'Piemonte', 'AT'),
('Avellino', 'Campania', 'AV'),
('Bari', 'Puglia', 'BA'),
('Bergamo', 'Lombardia', 'BG'),
('Biella', 'Piemonte', 'BI'),
('Belluno', 'Veneto', 'BL'),
('Benevento', 'Campania', 'BN'),
('Bologna', 'Emilia-Romagna', 'BO'),
('Brindisi', 'Puglia', 'BR'),
('Brescia', 'Lombardia', 'BS'),
('Barletta-Andria-Trani', 'Puglia', 'BT'),
('Bolzano', 'Trentino-Alto Adige', 'BZ'),
('Cagliari', 'Sardegna', 'CA'),
('Campobasso', 'Molise', 'CB'),
('Caserta', 'Campania', 'CE'),
('Chieti', 'Abruzzo', 'CH'),
('Carbonia-Iglesias', 'Sardegna', 'CI'),
('Caltanissetta', 'Sicilia', 'CL'),
('Cuneo', 'Piemonte', 'CN'),
('Como', 'Lombardia', 'CO'),
('Cremona', 'Lombardia', 'CR'),
('Cosenza', 'Calabria', 'CS'),
('Catania', 'Sicilia', 'CT'),
('Catanzaro', 'Calabria', 'CZ'),
('Enna', 'Sicilia', 'EN'),
('Forl?-Cesena', 'Emilia-Romagna', 'FC'),
('Ferrara', 'Emilia-Romagna', 'FE'),
('Foggia', 'Puglia', 'FG'),
('Firenze', 'Toscana', 'FI'),
('Fermo', 'Marche', 'FM'),
('Frosinone', 'Lazio', 'FR'),
('Genova', 'Liguria', 'GE'),
('Gorizia', 'Friuli-Venezia Giulia', 'GO'),
('Grosseto', 'Toscana', 'GR'),
('Imperia', 'Liguria', 'IM'),
('Isernia', 'Molise', 'IS'),
('Crotone', 'Calabria', 'KR'),
('Lecco', 'Lombardia', 'LC'),
('Lecce', 'Puglia', 'LE'),
('Livorno', 'Toscana', 'LI'),
('Lodi', 'Lombardia', 'LO'),
('Latina', 'Lazio', 'LT'),
('Lucca', 'Toscana', 'LU'),
('Monza e della Brianza', 'Lombardia', 'MB'),
('Macerata', 'Marche', 'MC'),
('Messina', 'Sicilia', 'ME'),
('Milano', 'Lombardia', 'MI'),
('Mantova', 'Lombardia', 'MN'),
('Modena', 'Emilia-Romagna', 'MO'),
('Massa-Carrara', 'Toscana', 'MS'),
('Matera', 'Basilicata', 'MT'),
('Napoli', 'Campania', 'NA'),
('Novara', 'Piemonte', 'NO'),
('Nuoro', 'Sardegna', 'NU'),
('Ogliastra', 'Sardegna', 'OG'),
('Oristano', 'Sardegna', 'OR'),
('Olbia-Tempio', 'Sardegna', 'OT'),
('Palermo', 'Sicilia', 'PA'),
('Piacenza', 'Emilia-Romagna', 'PC'),
('Padova', 'Veneto', 'PD'),
('Pescara', 'Abruzzo', 'PE'),
('Perugia', 'Umbria', 'PG'),
('Pisa', 'Toscana', 'PI'),
('Pordenone', 'Friuli-Venezia Giulia', 'PN'),
('Prato', 'Toscana', 'PO'),
('Parma', 'Emilia-Romagna', 'PR'),
('Pistoia', 'Toscana', 'PT'),
('Pesaro e Urbino', 'Marche', 'PU'),
('Pavia', 'Lombardia', 'PV'),
('Potenza', 'Basilicata', 'PZ'),
('Ravenna', 'Emilia-Romagna', 'RA'),
('Reggio Calabria', 'Calabria', 'RC'),
('Reggio Emilia', 'Emilia-Romagna', 'RE'),
('Ragusa', 'Sicilia', 'RG'),
('Rieti', 'Lazio', 'RI'),
('Roma', 'Lazio', 'RM'),
('Rimini', 'Emilia-Romagna', 'RN'),
('Rovigo', 'Veneto', 'RO'),
('Salerno', 'Campania', 'SA'),
('Siena', 'Toscana', 'SI'),
('Sondrio', 'Lombardia', 'SO'),
('La Spezia', 'Liguria', 'SP'),
('Siracusa', 'Sicilia', 'SR'),
('Sassari', 'Sardegna', 'SS'),
('Savona', 'Liguria', 'SV'),
('Taranto', 'Puglia', 'TA'),
('Teramo', 'Abruzzo', 'TE'),
('Trento', 'Trentino-Alto Adige', 'TN'),
('Torino', 'Piemonte', 'TO'),
('Trapani', 'Sicilia', 'TP'),
('Terni', 'Umbria', 'TR'),
('Trieste', 'Friuli-Venezia Giulia', 'TS'),
('Treviso', 'Veneto', 'TV'),
('Udine', 'Friuli-Venezia Giulia', 'UD'),
('Varese', 'Lombardia', 'VA'),
('Verbano-Cusio-Ossola', 'Piemonte', 'VB'),
('Vercelli', 'Piemonte', 'VC'),
('Venezia', 'Veneto', 'VE'),
('Vicenza', 'Veneto', 'VI'),
('Verona', 'Veneto', 'VR'),
('Medio Campidano', 'Sardegna', 'VS'),
('Viterbo', 'Lazio', 'VT'),
('Vibo Valentia', 'Calabria', 'VV');

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
('BRBRCR99S05D142T', 1, 'eliminato'),
('BRBRCR99S05D142T', 2, 'venduto'),
('BRBRCR99S05D142T', 5, 'eliminato'),
('BRBRCR99S05D142T', 8, 'in vendita'),
('BRBRCR99S05D142T', 9, 'eliminato'),
('GRGGOI73S02A172Z', 6, 'eliminato'),
('GRGGOI73S02A172Z', 7, 'in vendita'),
('RMNMAL98D03T251Z', 3, 'eliminato'),
('RMNMAL98D03T251Z', 4, 'eliminato'),
('RMNMAL98D03T251Z', 10, 'in vendita'),
('RMNMAL98D03T251Z', 11, 'eliminato'),
('RMNMAL98D03T251Z', 12, 'eliminato'),
('RMNMAL98D03T251Z', 13, 'in vendita'),
('RMNMAL98D03T251Z', 14, 'in vendita');

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
  `Immagine` varchar(500) NOT NULL,
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
('GRGGOI73S02A172Z', 'giorgio@gmail.com', 'Venditore e Acquirente', 'Giorgio', 'Gori', 'giorgio-gori.jpg', 0, 'A. Manzoni, 31\r\n', 'Firenze', 'FI', 'Toscana', '$2y$10$0as9KXHv.hCgo0mAnSV41.uMSEIpx9sNNNfgMZjAJ2se70pySlhZS'),
('MRCPSE98S02F346Z', 'marco@pesce.it', 'Acquirente', 'Marco', 'Pesce', 'pesce.jpg', 0, 'Medici', 'Brescia', 'BR', 'Lombardia', '$2y$10$76y2ol.nvECJemuUx78OReE6j8kqGGIBJUMpTgccImH3DI.Hw.kUK'),
('RMNMAL98D03T251Z', 'sapo@gmail.com', 'Venditore', 'Romano', 'Maiorella', 'sapo.jpg', 0, 'Cocco', 'Venosa', 'PZ', 'Basilicata', '$2y$10$qprfKGEK.PVTJH9oHRj/Rud9PRX./jOzMtBh7hIxNAG0Zl2I9jCIe');

-- --------------------------------------------------------

--
-- Struttura della tabella `valutazione`
--

CREATE TABLE `valutazione` (
  `Serietà` enum('1','2','3','4','5') NOT NULL,
  `Puntualità` enum('1','2','3','4','5') NOT NULL,
  `TipoValutante` enum('Venditore','Acquirente','','') NOT NULL,
  `ID_A` int(11) NOT NULL,
  `CF1` varchar(16) NOT NULL,
  `CF2` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `valutazione`
--

INSERT INTO `valutazione` (`Serietà`, `Puntualità`, `TipoValutante`, `ID_A`, `CF1`, `CF2`) VALUES
('3', '2', 'Venditore', 2, 'BRBRCR99S05D142T', 'MRCPSE98S02F346Z'),
('3', '3', 'Acquirente', 2, 'MRCPSE98S02F346Z', 'BRBRCR99S05D142T'),
('5', '5', 'Acquirente', 3, 'BRBRCR99S05D142T', 'RMNMAL98D03T251Z'),
('3', '4', 'Acquirente', 7, 'MRCPSE98S02F346Z', 'GRGGOI73S02A172Z');

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
  ADD KEY `CF` (`CF`),
  ADD KEY `Regione` (`Regione`),
  ADD KEY `Provincia` (`Provincia`);

--
-- Indici per le tabelle `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`Categoria`,`Sottocategoria`);

--
-- Indici per le tabelle `indirizzo`
--
ALTER TABLE `indirizzo`
  ADD PRIMARY KEY (`Via`,`Citta`,`Prov`,`Reg`),
  ADD KEY `Reg` (`Reg`),
  ADD KEY `Prov` (`Prov`);

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
  ADD PRIMARY KEY (`provincia`,`regione`),
  ADD UNIQUE KEY `sigla` (`sigla`),
  ADD KEY `regione` (`regione`),
  ADD KEY `regione_2` (`regione`);

--
-- Indici per le tabelle `stati`
--
ALTER TABLE `stati`
  ADD PRIMARY KEY (`CF`,`ID_A`) USING BTREE,
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
  MODIFY `ID_A` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT per la tabella `prodotto`
--
ALTER TABLE `prodotto`
  MODIFY `ID_P` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

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
  ADD CONSTRAINT `annuncio_ibfk_3` FOREIGN KEY (`CF`) REFERENCES `utente` (`CF`),
  ADD CONSTRAINT `annuncio_ibfk_4` FOREIGN KEY (`Regione`) REFERENCES `regioni` (`regione`),
  ADD CONSTRAINT `annuncio_ibfk_5` FOREIGN KEY (`Provincia`) REFERENCES `regioni` (`provincia`);

--
-- Limiti per la tabella `indirizzo`
--
ALTER TABLE `indirizzo`
  ADD CONSTRAINT `indirizzo_ibfk_1` FOREIGN KEY (`Reg`) REFERENCES `regioni` (`regione`),
  ADD CONSTRAINT `indirizzo_ibfk_2` FOREIGN KEY (`Prov`) REFERENCES `regioni` (`sigla`);

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
