-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 16, 2022 alle 21:48
-- Versione del server: 10.4.24-MariaDB
-- Versione PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbmyc`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `carrello`
--

CREATE TABLE `carrello` (
  `NumeroAcquisto` int(11) NOT NULL,
  `ID_Utente` int(15) NOT NULL,
  `CodiceProdotto` int(10) NOT NULL,
  `Quantita` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `prodotto`
--

CREATE TABLE `prodotto` (
  `CodiceProdotto` int(15) NOT NULL,
  `NomeProdotto` varchar(40) NOT NULL,
  `Categoria` varchar(20) NOT NULL,
  `Reparto` varchar(30) NOT NULL,
  `PrezzoUnitario` float NOT NULL,
  `Magazzino` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `prodotto`
--

INSERT INTO `prodotto` (`CodiceProdotto`, `NomeProdotto`, `Categoria`, `Reparto`, `PrezzoUnitario`, `Magazzino`) VALUES
(1, 'calamari', 'CarnePesce', '1', 1.45, 100),
(2, 'salmone', 'CarnePesce', '1', 1.67, 92),
(3, 'persico', 'CarnePesce', '1', 1.99, 98),
(4, 'tonno', 'CarnePesce', '1', 1.24, 96),
(5, 'spada', 'CarnePesce', '1', 3.44, 97),
(6, 'trota salmonata', 'CarnePesce', '1', 5.45, 35),
(7, 'svizzere', 'CarnePesce', '1', 1.99, 98),
(8, 'vitello', 'CarnePesce', '1', 5.34, 150),
(9, 'maiale', 'CarnePesce', '1', 3.23, 150),
(10, 'cavallo', 'CarnePesce', '1', 4.12, 96),
(11, 'prosciutto crudo', 'CarnePesce', '1', 2, 248),
(12, 'prosciutto cotto', 'CarnePesce', '1', 1.15, 249),
(13, 'pasta', 'Dispensa', '2', 0.99, 299),
(14, 'riso', 'Dispensa', '2', 0.75, 300),
(15, 'farina', 'Dispensa', '2', 0.45, 399),
(16, 'minestra', 'Dispensa', '2', 1, 149),
(17, 'preparato pizza', 'Dispensa', '2', 1.5, 72),
(18, 'preparato purea', 'Dispensa', '2', 1.02, 100),
(19, 'pan carre', 'Dispensa', '2', 1.5, 500),
(20, 'biscotti', 'Dispensa', '2', 1.46, 500),
(21, 'marmellata', 'Dispensa', '2', 2.25, 100),
(22, 'nutella', 'Dispensa', '2', 3.5, 100),
(23, 'cracker', 'Dispensa', '2', 1.5, 250),
(24, 'grissini', 'Dispensa', '2', 1.25, 200),
(25, 'patatine', 'Snack', '3', 1.6, 200),
(26, 'caramelle', 'Snack', '3', 1.5, 100),
(27, 'barette di cioccolat', 'Snack', '3', 2, 75),
(28, 'taralli', 'Snack', '3', 0.99, 200),
(29, 'ringo', 'Snack', '3', 1.89, 100),
(30, 'oro ciok', 'Snack', '3', 2.25, 100),
(31, 'ritz', 'Snack', '3', 1.15, 200),
(32, 'snack cocktail', 'Snack', '3', 2.25, 100),
(33, 'acqua frizzante San ', 'AcquaBibite', '4', 0.16, 500),
(34, 'acqua frizzante Ferr', 'AcquaBibite', '4', 0.14, 500),
(35, 'acqua naturale rocch', 'AcquaBibite', '4', 0.12, 500),
(36, 'acqua naturale Sant\'', 'AcquaBibite', '4', 0.1, 500),
(37, 'coca-cola', 'AcquaBibite', '4', 0.95, 250),
(38, 'sprite', 'AcquaBibite', '4', 0.95, 250),
(39, 'fanta', 'AcquaBibite', '4', 0.95, 250),
(40, 'chinotto', 'AcquaBibite', '4', 0.95, 250),
(41, 'succo', 'AcquaBibite', '4', 2.25, 100),
(42, 'the pesca', 'AcquaBibite', '4', 2, 72),
(43, 'the limone', 'AcquaBibite', '4', 2, 75),
(44, 'gatorade', 'AcquaBibite', '4', 1, 100),
(45, 'vodka', 'Alcolici', '5', 5.5, 84),
(46, 'jack daniels', 'Alcolici', '5', 12.5, 100),
(47, 'brauilo', 'Alcolici', '5', 8, 100),
(48, 'montenegro', 'Alcolici', '5', 12.5, 100),
(49, 'gin', 'Alcolici', '5', 8, 100),
(50, 'sambuca', 'Alcolici', '5', 7.5, 98),
(51, 'limoncello', 'Alcolici', '5', 6, 100),
(52, 'tequila', 'Alcolici', '5', 8.9, 100),
(53, 'assenzio', 'Alcolici', '5', 14, 100),
(54, 'jagermaister', 'Alcolici', '5', 15, 100),
(55, 'rum', 'Alcolici', '5', 9, 100),
(56, 'birra', 'Alcolici', '5', 1.75, 398),
(57, 'Merlot marche rosso', 'Vino', '6', 120, 15),
(58, 'san carro merche rosso', 'Vino', '6', 8.9, 100),
(59, 'tignanello rosso', 'Vino', '6', 55, 30),
(60, 'valpolicella rosso', 'Vino', '6', 7.9, 100),
(61, 'chianti rosso', 'Vino', '6', 15, 50),
(62, 'avegiano cerasuolo abruzzo rosso', 'Vino', '6', 4.5, 100),
(63, 'indio bianchi', 'Vino', '6', 8.2, 78),
(64, 'safari pecorino terre chieti bianco', 'Vino', '6', 15.17, 70),
(65, 'colomba salapatura bianco', 'Vino', '6', 9.5, 90),
(66, 'muller bianco', 'Vino', '6', 10.2, 80),
(67, 'fotonico bianco', 'Vino', '6', 12.9, 80),
(68, 'casteldama bianco', 'Vino', '6', 14.8, 85),
(69, 'pc portatile', 'Informatica', '7', 600, 10),
(70, 'tablet', 'Informatica', '7', 300, 25),
(71, 'cassa bluetooth', 'Informatica', '7', 65, 50),
(72, 'pc fisso', 'Informatica', '7', 450, 20),
(73, 'cuffie', 'Informatica', '7', 25, 50),
(74, 'tastiera', 'Informatica', '7', 12.5, 75),
(75, 'mouse', 'Informatica', '7', 9.5, 75),
(76, 'stampante', 'Informatica', '7', 65, 50),
(77, 'iphone', 'Telefonia', '8', 799, 25),
(78, 'samsung', 'Telefonia', '8', 275, 25),
(79, 'huawei', 'Telefonia', '8', 275, 25),
(80, 'motorola', 'Telefonia', '8', 220, 2),
(81, 'bicicletta elettrica uomo', 'Bici', '9', 350, 5),
(82, 'bicicletta elettrica donna', 'Bici', '9', 350, 5),
(83, 'mountain bike uomo', 'Bici', '9', 250, 10),
(84, 'mountain bike donna', 'Bici', '9', 250, 10),
(85, 'graziella', 'Bici', '9', 100, 15),
(86, 'mountain bike bambino', 'Bici', '9', 125, 15),
(87, 'mountain bike bambina', 'Bici', '9', 125, 15),
(88, 'bicicletta da corsa', 'Bici', '9', 450, 5),
(89, 'pallone', 'Calcio', '10', 25, 30),
(90, 'cinesini', 'Calcio', '10', 2.5, 150),
(91, 'pettorine', 'Calcio', '10', 5, 100),
(92, 'conetti', 'Calcio', '10', 4, 100),
(93, 'porta', 'Calcio', '10', 30, 30),
(94, 'parastinchi', 'Calcio', '10', 15, 20),
(95, 'scarpe', 'Calcio', '10', 175, 45),
(96, 'guanti portiere', 'Calcio', '10', 35, 25),
(97, 'amuchina', 'CuraCasa', '11', 2.5, 100),
(98, 'sgrassatore', 'CuraCasa', '11', 1.5, 100),
(99, 'carta igienica', 'CuraCasa', '11', 3.2, 500),
(100, 'tappeto bagno', 'CuraCasa', '11', 5.6, 28),
(101, 'tappeto cucina', 'CuraCasa', '11', 6.4, 29),
(102, 'scopa', 'CuraCasa', '11', 2.5, 100),
(103, 'mocio', 'CuraCasa', '11', 2, 100),
(104, 'contenitori cibo', 'CuraCasa', '11', 2.2, 100),
(105, 'insetticida', 'CuraCasa', '11', 3.25, 100),
(106, 'spugna', 'CuraCasa', '11', 1.15, 200),
(107, 'sapone', 'CuraCasa', '11', 1.09, 300),
(108, 'sacchetti', 'CuraCasa', '11', 0.75, 500),
(109, 'deodorante', 'CuraCorpo', '12', 1.25, 200),
(110, 'shampoo', 'CuraCorpo', '12', 2.2, 200),
(111, 'docciaschiuma', 'CuraCorpo', '12', 2.5, 200),
(112, 'dentifricio', 'CuraCorpo', '12', 1.1, 300),
(113, 'spazzolino', 'CuraCorpo', '12', 0.45, 400),
(114, 'spazzola', 'CuraCorpo', '12', 1.45, 100),
(115, 'cotton fioc', 'CuraCorpo', '12', 1.5, 200),
(116, 'rasoio', 'CuraCorpo', '12', 1, 125),
(117, 'spugna doccia', 'CuraCorpo', '12', 0.85, 75),
(118, 'forbici unghie', 'CuraCorpo', '12', 1.5, 90),
(119, 'assorbenti', 'CuraCorpo', '12', 1.65, 400),
(120, 'crema viso', 'CuraCorpo', '12', 2.2, 80);

-- --------------------------------------------------------

--
-- Struttura della tabella `tessera`
--

CREATE TABLE `tessera` (
  `CodiceTessera` int(15) NOT NULL,
  `ID_Utente` int(10) NOT NULL,
  `Punti` int(6) NOT NULL,
  `Saldo` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `tessera`
--

INSERT INTO `tessera` (`CodiceTessera`, `ID_Utente`, `Punti`, `Saldo`) VALUES
(1, 1, 137, 155),
(2, 2, 0, 500),
(3, 3, 55, 15),
(4, 4, 0, 500),
(7, 13, 0, 500),
(9, 15, 0, 500);

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE `utenti` (
  `ID_Utente` int(10) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Nome` varchar(30) NOT NULL,
  `Cognome` varchar(30) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`ID_Utente`, `Email`, `Nome`, `Cognome`, `Username`, `Password`) VALUES
(1, 'mattiademaria03@gmail.com', 'Mattia', 'De Maria', 'Dema_63_', 'Password1'),
(2, 'cattaneomarcello@gmail.com', 'Marcello', 'Cattaneo', 'Marcello_Cattaneo', 'Password2'),
(3, 'villariccardo@gmail.com', 'Riccardo', 'Villa', 'Riccardo_Villa', 'Password3'),
(4, 'emailprova@gmail.com', 'Test', 'Test', 'Test', 'Test'),
(13, 'TestDefinitivo@gmail.com', 'Test', 'Definitivo', 'TestDefinitvo', 'Psw1'),
(15, 'admin@admin.it', 'Admin', 'Admin', 'Admin', 'Root');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `carrello`
--
ALTER TABLE `carrello`
  ADD PRIMARY KEY (`NumeroAcquisto`),
  ADD KEY `ID_Utente` (`ID_Utente`),
  ADD KEY `CodiceProdotto` (`CodiceProdotto`);

--
-- Indici per le tabelle `prodotto`
--
ALTER TABLE `prodotto`
  ADD PRIMARY KEY (`CodiceProdotto`);

--
-- Indici per le tabelle `tessera`
--
ALTER TABLE `tessera`
  ADD PRIMARY KEY (`CodiceTessera`),
  ADD KEY `ID_Utente` (`ID_Utente`);

--
-- Indici per le tabelle `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`ID_Utente`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `carrello`
--
ALTER TABLE `carrello`
  MODIFY `NumeroAcquisto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT per la tabella `tessera`
--
ALTER TABLE `tessera`
  MODIFY `CodiceTessera` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT per la tabella `utenti`
--
ALTER TABLE `utenti`
  MODIFY `ID_Utente` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `carrello`
--
ALTER TABLE `carrello`
  ADD CONSTRAINT `carrello_ibfk_1` FOREIGN KEY (`ID_Utente`) REFERENCES `utenti` (`ID_Utente`),
  ADD CONSTRAINT `carrello_ibfk_2` FOREIGN KEY (`CodiceProdotto`) REFERENCES `prodotto` (`CodiceProdotto`);

--
-- Limiti per la tabella `tessera`
--
ALTER TABLE `tessera`
  ADD CONSTRAINT `tessera_ibfk_1` FOREIGN KEY (`ID_Utente`) REFERENCES `utenti` (`ID_Utente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
