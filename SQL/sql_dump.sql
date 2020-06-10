-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Φιλοξενητής: 127.0.0.1
-- Χρόνος δημιουργίας: 10 Ιουν 2020 στις 19:28:05
-- Έκδοση διακομιστή: 10.4.11-MariaDB
-- Έκδοση PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `proglab2`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `photo_source` varchar(1000) NOT NULL,
  `date` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `articles`
--

INSERT INTO `articles` (`id`, `title`, `message`, `photo_source`, `date`) VALUES
(1, 'Carlos Sainz to race for Scuderia Ferrari Mission Winnow in 2021 and 2022', 'Scuderia Ferrari Mission Winnow is pleased to announce that Carlos Sainz will drive for the team in the 2021 and 2022 seasons of the Formula 1 World Championship.\r\n\r\nMattia Binotto, Managing Director Gestione Sportiva and Team Principal\r\n\r\n\"I’m pleased to announce that Carlos will join Scuderia Ferrari as from the 2021 championship. With five seasons already behind him, Carlos has proved to be very talented and has shown that he has the technical ability and the right attributes to make him an ideal fit with our family.\r\n\r\n“We’ve embarked on a new cycle with the aim of getting back to the top in Formula 1. It will be a long journey, not without its difficulties, especially given the current financial and regulatory situation, which is undergoing a sudden change and will require this challenge to be tackled in a different way to the recent past.\r\n\r\nWe believe that a driver pairing with the talent and personality of Charles and Carlos, the youngest in the past fifty years of the Scuderia, will be the best possible combination to help us reach the goals we have set ourselves\".\r\n\r\nCarlos Sainz #55\r\n\r\n\"I am very happy that I will be driving for Scuderia Ferrari in 2021 and I\'m excited about my future with the team. I still have an important year ahead with McLaren Racing and I’m really looking forward to going racing again with them this season.\"\r\n\r\nBorn in Madrid on 1st September 1994, Carlos already has plenty of Formula 1 experience, having taken part in 102 World Championship Grands Prix, over five seasons. In 2019, he finished sixth in the Drivers’ Championship, his best ever result, in a year when he also made it to a podium position for the first time, finishing third in Brazil.', 'resources/news/sainz.jpg', '2020-06-09'),
(2, 'Scuderia Ferrari Mission Winnow and Sebastian Vettel decide not to extend their contract', 'Maranello, 12 May 2020 - Scuderia Ferrari Mission Winnow and Sebastian Vettel have jointly decided not to extend the current contract covering Sebastian’s services as a driver with the team, beyond its current expiry date of the end of the 2020 Formula 1 season.\r\n\r\nMattia Binotto, Managing Director Gestione Sportiva and Team Principal\r\n\r\n\"This is a decision taken jointly by ourselves and Sebastian, one which both parties feel is for the best. It was not an easy decision to reach, given Sebastian’s worth as a driver and as a person. There was no specific reason that led to this decision, apart from the common and amicable belief that the time had come to go our separate ways in order to reach our respective objectives.\r\n\r\nSebastian is already part of the Scuderia’s history, with his 14 Grands Prix wins making him the third most successful driver for the team, while he is also the one who has scored the most points with us. In our five years together, he has finished in the top three of the Drivers’ Championship three times, making a significant contribution to the team’s constant presence in the top three of the Constructors’ classification.\r\n\r\nOn behalf of everyone at Ferrari, I want to thank Sebastian for his great professionalism and the human qualities he has displayed over these five years, during which we shared so many great moments. We have not yet managed to win a world title together, which would be a fifth for him, but we believe that we can still get a lot out of this unusual 2020 season.\"\r\n\r\nSebastian Vettel #5	\r\n\r\n\"My relationship with Scuderia Ferrari will finish at the end of 2020. In order to get the best possible results in this sport, it’s vital for all parties to work in perfect harmony. The team and I have realised that there is no longer a common desire to stay together beyond the end of this season. Financial matters have played no part in this joint decision. That’s not the way I think when it comes to making certain choices and it never will be.\r\n\r\nWhat’s been happening in these past few months has led many of us to reflect on what are our real priorities in life. One needs to use one’s imagination and to adopt a new approach to a situation that has changed. I myself will take the time I need to reflect on what really matters when it comes to my future.\r\n\r\nScuderia Ferrari occupies a special place in Formula 1 and I hope it gets all the success it deserves. Finally, I want to thank the whole Ferrari family and above all its “tifosi” all around the world, for the support they have given me over the years. My immediate goal is to finish my long stint with Ferrari, in the hope of sharing some more beautiful moments together, to add to all those we have enjoyed so far.\"', 'resources/news/vettel.jpg', '2020-06-09'),
(3, 'Ferrari confirms IndyCar evaluation project', 'Mere days after racing icon Mario Andretti called on the Scuderia to consider entry into U.S. open-wheel racing, Binotto admitted that both IndyCar and world championship-level sportscar racing are under discussion at the team’s Maranello base.\r\n\r\nDuring an interview with SkySport Italia, the Ferrari team principal confirmed that the goal is to find championships that match the needs of the Prancing Horse when part of the sports management staff are otherwise destined to become redundant due to the Formula 1’s forthcoming budget cap.\r\n\r\n“Ferrari feels a lot of social responsibility towards its employees,” explained Binotto, “and we want to be sure that for each of them there will be a workspace in the future.\r\n\r\n“For this reason we have started to evaluate alternative programs, and I confirm that we are looking at IndyCar, which is currently a very different category from ours [F1] but with a change of regulation scheduled in 2022 [introduction of hybrid engines]. We also observe the world of endurance racing and other series. We will try to make the best choice.\r\n\r\n“In recent weeks there has been a lot of discussion about the downsizing of the budget available for Formula 1 teams,” concluded Binotto, “and a conclusion has now been reached. The limit of $175 million that had been defined and voted [in 2019] will be lowered to $145m.\r\n\r\n“At Ferrari we were structuring ourselves based on the budget approved last year, and the further reduction represents an important challenge that will inevitably lead to review staff, structure and organization.”', 'resources/news/indycar.jpg', '2020-06-08'),
(4, '123', 'asdf', 'resources/newscropped-carbon-header.jpg', '2020-06-10');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `constructors`
--

CREATE TABLE `constructors` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `constructors`
--

INSERT INTO `constructors` (`id`, `name`) VALUES
(1, 'Alfa Romeo Racing'),
(2, 'Scuderia Ferrari'),
(3, 'Haas F1 Team'),
(4, 'McLaren F1 Team '),
(5, 'Mercedes AMG Petronas Motorsport'),
(6, 'SportPesa Racing Point F1 Team'),
(7, 'Aston Martin Red Bull Racing '),
(8, 'Renault F1 Team '),
(9, 'Red Bull Toro Rosso Honda '),
(10, 'ROKiT Williams Racing');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `message` varchar(256) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `contact`
--

INSERT INTO `contact` (`id`, `title`, `message`, `userid`) VALUES
(1, 'test', 'mes', 6);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `current_drivers`
--

CREATE TABLE `current_drivers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `age` int(3) NOT NULL,
  `car_number` int(2) NOT NULL,
  `photo_source` varchar(100) NOT NULL,
  `wins` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `current_drivers`
--

INSERT INTO `current_drivers` (`id`, `name`, `age`, `car_number`, `photo_source`, `wins`) VALUES
(1, 'Sebastian Vettel', 32, 5, 'resources/drivers/vettel.jpg', 53),
(2, 'Charles Leclerc', 22, 16, 'resources/drivers/leclerc.jpg', 2);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `drivers`
--

CREATE TABLE `drivers` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `constrID` int(11) NOT NULL,
  `nationality` varchar(3) DEFAULT NULL,
  `carnumber` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `drivers`
--

INSERT INTO `drivers` (`id`, `name`, `constrID`, `nationality`, `carnumber`) VALUES
(1, 'Kimi Räikkönen', 1, 'FIN', 7),
(2, 'Antonio Giovinazzi', 1, 'ITA', 99),
(3, 'Sebastian Vettel', 2, 'GER', 5),
(4, 'Charles Leclerc', 2, 'MON', 16),
(5, 'Romain Grosjean', 3, 'FRA', 8),
(6, 'Kevin Magnussen', 3, 'DEN', 20),
(7, 'Lando Norris', 4, 'GBR', 4),
(8, 'Carlos Sainz Jr.', 4, 'ESP', 55),
(9, 'Lewis Hamilton', 5, 'GBR', 44),
(10, 'Valtteri Bottas', 5, 'FIN', 77),
(11, 'Sergio Pérez', 6, 'MEX', 11),
(12, 'Lance Stroll', 6, 'CAN', 18),
(13, 'Pierre Gasly', 7, 'FRA', 10),
(14, 'Alexander Albon', 7, 'THA', 23),
(15, 'Max Verstappen', 7, 'NED', 33),
(16, 'Daniel Ricciardo', 7, 'AUS', 3),
(17, 'Nico Hülkenberg', 8, 'GER', 27),
(18, 'Alexander Albon', 9, 'THA', 23),
(19, 'Pierre Gasly', 9, 'FRA', 10),
(20, 'Daniil Kvyat', 9, 'RUS', 26),
(21, 'George Russell', 10, 'GBR', 63),
(22, 'Robert Kubica', 10, 'POL', 88);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `photos`
--

CREATE TABLE `photos` (
  `id` int(11) NOT NULL,
  `photo_source` varchar(100) DEFAULT NULL,
  `category` enum('WIN','CHAMPIONSHIP','HISTORIC','CAR') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `photos`
--

INSERT INTO `photos` (`id`, `photo_source`, `category`) VALUES
(1, 'resources/photos/c1.jpg', 'CAR'),
(2, 'resources/photos/c2.jpg', 'CAR'),
(3, 'resources/photos/c3.jpg', 'CAR'),
(4, 'resources/photos/ch1.jpg', 'CHAMPIONSHIP'),
(5, 'resources/photos/ch2.jpg', 'CHAMPIONSHIP'),
(6, 'resources/photos/h1.jpg', 'HISTORIC'),
(7, 'resources/photos/h2.png', 'HISTORIC'),
(8, 'resources/photos/h3.jpg', 'HISTORIC'),
(9, 'resources/photos/h4.jpg', 'HISTORIC'),
(10, 'resources/photos/w1.jpg', 'WIN'),
(11, 'resources/photos/w2.jpg', 'WIN');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `races`
--

CREATE TABLE `races` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `year` int(4) NOT NULL,
  `isupcoming` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `races`
--

INSERT INTO `races` (`id`, `name`, `year`, `isupcoming`) VALUES
(1, 'Australian Grand Prix', 2019, 0),
(2, 'Bahrain Grand Prix', 2019, 0),
(11, 'AUSTRIA - Red Bull Ring', 2020, 1),
(12, 'HUNGARY - Hungaroring', 2020, 1),
(13, 'GREAT BRITAIN - Silverstone Circuit', 2020, 1),
(14, 'SPAIN - Circuit de Barcelona-Catalunya', 2020, 1);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `standings`
--

CREATE TABLE `standings` (
  `id` int(11) NOT NULL,
  `raceid` int(11) NOT NULL,
  `pos` int(2) NOT NULL,
  `driverid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `standings`
--

INSERT INTO `standings` (`id`, `raceid`, `pos`, `driverid`) VALUES
(1, 1, 1, 10),
(2, 1, 2, 9),
(3, 1, 3, 15),
(4, 1, 4, 3),
(5, 1, 5, 4),
(6, 1, 6, 6),
(7, 1, 7, 17),
(8, 1, 8, 1),
(9, 1, 9, 12),
(10, 1, 10, 20),
(11, 1, 11, 13),
(12, 1, 12, 7),
(13, 1, 13, 11),
(14, 1, 14, 18),
(15, 1, 15, 2),
(16, 1, 16, 21),
(17, 1, 17, 22),
(18, 1, 18, 5),
(19, 1, 19, 16),
(20, 1, 20, 8),
(21, 2, 1, 9),
(22, 2, 2, 10),
(23, 2, 3, 4),
(24, 2, 4, 15),
(25, 2, 5, 3),
(26, 2, 6, 7),
(27, 2, 7, 1),
(28, 2, 8, 13),
(29, 2, 9, 18),
(30, 2, 10, 11),
(31, 2, 11, 2),
(32, 2, 12, 20),
(33, 2, 13, 6),
(34, 2, 14, 6),
(35, 2, 15, 21),
(36, 2, 16, 22),
(37, 2, 17, 17),
(38, 2, 18, 16),
(39, 2, 19, 8),
(40, 2, 20, 5);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(70) NOT NULL,
  `password` varchar(32) NOT NULL,
  `status` enum('REGISTERED','REGISTEREDCARD','ATHLETE','ADMIN') NOT NULL,
  `registration_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `status`, `registration_date`) VALUES
(3, 'Asdf', 'asdf', 'a@a.com', '747e9d89ba4a5e0466b27ff8df76bbef', 'REGISTERED', '2020-06-10'),
(4, 'l', 'l', '123@a.com', 'ac41c126a197c9cbba70bf677dfaea0e', 'REGISTERED', '2020-06-10'),
(5, 'aa', 'aa', 'asdf@a', '111', 'REGISTERED', '2020-06-10'),
(6, 'Pw123', '123', 'a@b.com', '123', 'ADMIN', '2020-06-10'),
(7, 'asdf', 'asdf', 'asdf@asdf.com', '00d890252f1504f52110f1fc3c322404', 'REGISTERED', '2020-06-10');

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `constructors`
--
ALTER TABLE `constructors`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`);

--
-- Ευρετήρια για πίνακα `current_drivers`
--
ALTER TABLE `current_drivers`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `constrID` (`constrID`);

--
-- Ευρετήρια για πίνακα `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `races`
--
ALTER TABLE `races`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `standings`
--
ALTER TABLE `standings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `driverid` (`driverid`),
  ADD KEY `raceid` (`raceid`);

--
-- Ευρετήρια για πίνακα `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`) USING BTREE;

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT για πίνακα `constructors`
--
ALTER TABLE `constructors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT για πίνακα `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT για πίνακα `current_drivers`
--
ALTER TABLE `current_drivers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT για πίνακα `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT για πίνακα `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT για πίνακα `races`
--
ALTER TABLE `races`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT για πίνακα `standings`
--
ALTER TABLE `standings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT για πίνακα `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Περιορισμοί για άχρηστους πίνακες
--

--
-- Περιορισμοί για πίνακα `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `contact_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE NO ACTION;

--
-- Περιορισμοί για πίνακα `drivers`
--
ALTER TABLE `drivers`
  ADD CONSTRAINT `drivers_ibfk_1` FOREIGN KEY (`constrID`) REFERENCES `constructors` (`id`) ON DELETE CASCADE;

--
-- Περιορισμοί για πίνακα `standings`
--
ALTER TABLE `standings`
  ADD CONSTRAINT `standings_ibfk_1` FOREIGN KEY (`driverid`) REFERENCES `drivers` (`id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `standings_ibfk_2` FOREIGN KEY (`raceid`) REFERENCES `races` (`id`) ON DELETE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
