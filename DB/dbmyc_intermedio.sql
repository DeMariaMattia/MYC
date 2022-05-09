-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 09, 2022 alle 20:49
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

--
-- Dump dei dati per la tabella `carrello`
--

INSERT INTO `carrello` (`NumeroAcquisto`, `ID_Utente`, `CodiceProdotto`, `Quantita`) VALUES
(1, 1, 3, 3),
(2, 2, 2, 2),
(3, 1, 5, 1),
(4, 3, 1, 1),
(5, 1, 2, 2),
(6, 1, 2, 2),
(7, 3, 5, 3),
(8, 1, 3, 5),
(9, 1, 2, 5);

-- --------------------------------------------------------

--
-- Struttura della tabella `prodotto`
--

CREATE TABLE `prodotto` (
  `CodiceProdotto` int(15) NOT NULL,
  `NomeProdotto` varchar(20) NOT NULL,
  `Categoria` varchar(20) NOT NULL,
  `Reparto` varchar(30) NOT NULL,
  `PrezzoUnitario` float NOT NULL,
  `Magazzino` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `prodotto`
--

INSERT INTO `prodotto` (`CodiceProdotto`, `NomeProdotto`, `Categoria`, `Reparto`, `PrezzoUnitario`, `Magazzino`) VALUES
(1, 'Penne', 'Alimentari', '2', 0.9, 100),
(2, 'Fanta', 'Bevande', '5', 0.45, 190),
(3, 'Patatine', 'Snack', '4', 1.99, 245),
(4, 'Spaghetti', 'Alimentari', '2', 0.8, 500),
(5, 'Iphone12', 'Elettronica', '9', 519.99, 20);

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
(1, 1, 0, 500),
(2, 2, 0, 500),
(3, 3, 0, 500),
(4, 4, 0, 1000),
(7, 13, 0, 1000),
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
(1, 'mattiademaria03@gmail.com', 'Mattia', 'DeMaria', 'Dema_63_', 'Password1'),
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
  MODIFY `NumeroAcquisto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
