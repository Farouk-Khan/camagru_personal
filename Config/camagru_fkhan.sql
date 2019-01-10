SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `username` varchar(1000) NOT NULL,
  `picture_id` int(11) NOT NULL,
  `comment` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `pictures` (
  `pic_id` int(8) NOT NULL,
  `username` varchar(50) NOT NULL,
  `picture` longtext,
  `Likes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `users` (
  `user_id` int(8) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL,
  `conf` int(1) NOT NULL DEFAULT '0',
  `conf_code` varchar(150) NOT NULL,
  `comment_choice` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `comments_ibfk_1` (`picture_id`);

ALTER TABLE `pictures`
  ADD PRIMARY KEY (`pic_id`),
  ADD KEY `username` (`username`) USING BTREE;

ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username_2` (`username`,`email`),
  ADD KEY `username` (`username`);

ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

ALTER TABLE `pictures`
  MODIFY `pic_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

ALTER TABLE `users`
  MODIFY `user_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`picture_id`) REFERENCES `pictures` (`pic_id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `pictures`
  ADD CONSTRAINT `pictures_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;