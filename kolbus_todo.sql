-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 03 Sty 2023, 23:23
-- Wersja serwera: 10.4.21-MariaDB
-- Wersja PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `kolbus_todo`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `tasks_todo`
--

CREATE TABLE `tasks_todo` (
  `id` int(11) NOT NULL,
  `task` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `tasks_todo`
--

INSERT INTO `tasks_todo` (`id`, `task`, `status`, `user_id`) VALUES
(1, 'Go to drycleaners', 0, 1),
(2, 'Meet Jon Hamm\r\n ', 1, 1),
(4, 'Meet with coffee meister', 1, 1),
(5, 'Go to a golf game', 1, 1),
(6, 'Protect Queens from Sandman\r\n', 0, 2),
(7, 'Fight Venom', 0, 2),
(8, 'Wash my suit', 0, 2),
(9, 'Eat a sandwich', 0, 2),
(13, 'Go to lunch with Richard', 0, 1),
(14, 'Swing to tower', 1, 2),
(18, 'Watch Hamilton in Broadway', 0, 1),
(19, 'Watch TV with Leon Black', 1, 1),
(20, 'Make some more web in chemistry class\r\n', 1, 2),
(21, 'Reload my guns', 0, 3),
(22, 'Put on my great suit', 1, 3),
(23, 'Regenerate a broken limb', 1, 3),
(24, 'Eat some chimichangas', 0, 3),
(25, 'Become an Avenger', 0, 3);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `login`, `password`) VALUES
(1, 'larry_david', 'curb'),
(2, 'peter_parker', 'spiderman'),
(3, 'ryan_reynolds', 'deadpool'),
(7, 'Thorin', 'oak');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `tasks_todo`
--
ALTER TABLE `tasks_todo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `task_user.fko` (`user_id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `tasks_todo`
--
ALTER TABLE `tasks_todo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `tasks_todo`
--
ALTER TABLE `tasks_todo`
  ADD CONSTRAINT `task_user.fko` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
