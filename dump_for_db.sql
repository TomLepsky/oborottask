SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS `oborot_task` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `oborot_task`;

CREATE USER `testUser`@`localhost` identified by '000000';

GRANT all privileges on oborot_task . * to `testUser`@`localhost`;

CREATE TABLE `bridge` (
  `author_id` int(10) NOT NULL,
  `note_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `bridge` (`author_id`, `note_id`) VALUES
(9, 39),
(9, 40),
(10, 41),
(10, 42),
(10, 43),
(11, 44),
(11, 45);

CREATE TABLE `notes` (
  `id` int(10) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `date_create` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `notes` (`id`, `title`, `content`, `date_create`) VALUES
(39, 'title1', 'sam note1', '16:56 10.January.2019'),
(40, 'title2', 'sam note2', '16:56 10.January.2019'),
(41, 'title1', 'john note', '16:56 10.January.2019'),
(42, 'title 3', 'john note 4', '16:57 10.January.2019'),
(43, 'title5', 'john note ', '16:57 10.January.2019'),
(44, 'title3', 'tom note', '16:57 10.January.2019'),
(45, 'title5', 'tom note 7', '16:58 10.January.2019');

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users` (`id`, `name`, `email`) VALUES
(9, 'sam', 'sam@mail.ru'),
(10, 'john', 'john@mail.ru'),
(11, 'tom', 'tom@mail.ru');


ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `notes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
