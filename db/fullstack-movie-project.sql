# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.38-0ubuntu0.14.04.1)
# Database: Prutor
# Generation Time: 2014-12-16 06:10:03 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

SET FOREIGN_KEY_CHECKS=OFF;

# Dump of table movies
# ------------------------------------------------------------

DROP TABLE IF EXISTS `movies`;

CREATE TABLE `movies` (
  `movie_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `movie_name` varchar(255) NOT NULL DEFAULT '',
  `movie_year` int(4) NOT NULL,
  `movie_rating` varchar(10) NOT NULL DEFAULT '',
  `movie_bio` varchar(255) DEFAULT NULL,
  `movie_img` varchar(200) NOT NULL,
  PRIMARY KEY (`movie_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `movies` WRITE;
/*!40000 ALTER TABLE `movies` DISABLE KEYS */;

INSERT INTO `movies` (`movie_id`, `movie_name`, `movie_year`, `movie_rating`, `movie_bio`, `movie_img`)
VALUES
    (1, 'Star Wars: Episode VII - The Force Awakens', 2015, 'PG-13', 'Set 30 years after the Battle of Endor, a new generation of heroes emerges, and the balance of power is once again at stake.', 'assets/movieimg/movie1.jpg'),
    (2, 'Mad Max: Fury Road', 2015, 'R', 'A post-apocalyptic warrior races through the wasteland in a desperate search for his kidnapped wife.', 'assets/movieimg/movie2.jpg'),
    (3, 'Captain America: Civil War', 2016, 'PG-13', 'The Avengers clash over the Sokovia Accords, an international agreement that regulates superhero activity.', 'assets/movieimg/movie3.jpg'),
    (4, 'Rogue One: A Star Wars Story', 2016, 'PG-13', 'A group of rebels sets out on a mission to steal the plans for the Death Star.', 'assets/movieimg/movie4.jpg'), 
    (5, 'Doctor Strange', 2016, 'PG-13', 'A former neurosurgeon learns the secrets of sorcery and becomes the Sorcerer Supreme.', 'assets/movieimg/movie5.png'),
    (6, 'Arrival', 2016, 'PG-13', 'A linguist and a physicist work together to decipher the language of extraterrestrial beings who have arrived on Earth.', 'assets/movieimg/movie6.jpg'),
    (7, 'Guardians of the Galaxy Vol. 2', 2017, 'PG-13', 'The Guardians travel the galaxy and try to stay out of trouble, but they soon find themselves on a dangerous quest.', 'assets/movieimg/movie7.jpg'),
    (8, 'Logan', 2017, 'R', 'An aging Wolverine and his young charge must protect themselves from a group of cyborgs.', 'assets/movieimg/movie8.jpg'),
    (9, 'Blade Runner 2049', 2017, 'R', 'A blade runner must track down a replicant who has gone missing.', 'assets/movieimg/movie9.png'),
    (10, 'Ghost in the Shell', 2017, 'PG-13', 'A cyborg policewoman must investigate a mysterious hacker who is attacking the world s computer systems.', 'assets/movieimg/movie10.jpg'),
    (11, 'Life', 2017, 'R', 'A team of scientists on a space station discover a new lifeform that turns out to be highly intelligent and deadly.', 'assets/movieimg/movie11.jpg'),
    (12, 'The Cloverfield Paradox', 2018, 'R', 'A scientist accidentally opens a rift in time and space, unleashing a horrifying monster on the world.', 'assets/movieimg/movie12.jpg'),
    (13, 'Annihilation', 2018, 'R', 'A team of scientists enters a mysterious quarantined zone to investigate a deadly alien force.', 'assets/movieimg/movie13.jpg'),
    (14, 'Serenity', 2019, 'R', 'A fishing boat captain takes on a mysterious passenger who turns out to be a dangerous alien.', 'assets/movieimg/movie14.jpg'),
    (15, 'Captive State', 2019, 'R', 'A group of young people living under alien occupation must decide whether to join the resistance or collaborate with the invaders.', 'assets/movieimg/movie15.jpg');

	 -- (1,'Lord of the Rings: The Fellowship of the Ring',2001,'PG-13','A battle between good and evil in which a Hobbit must deliver a ring into a volcano.','assets/img/lordOfRings.jpg'),
	-- (2,'Pacific Rim',2013,'PG-13','Giant robots fight giant monsters in Japan.','assets/img/pacificRim.jpg'),
	-- (3,'Dazed and Confused',1993,'PG-13','A bunch friends enjoy their last day of highschool.','assets/img/dazedConfused.jpg'),
	-- (4,'Batman & Robin',1997,'PG','The worst Batman movie, ever...','assets/img/batmanRobin.jpg'),
	-- (5,'District 9',2009,'R','A man has an unexpected surprise when he visits an alien slum in Johannesburg, South Africa.','assets/img/district9.jpg'); 

/*!40000 ALTER TABLE `movies` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `user_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL DEFAULT '',
  `user_full_name` varchar(150) NOT NULL DEFAULT '',
  `user_email` varchar(255) NOT NULL DEFAULT '',
  `user_password` varchar(255) NOT NULL DEFAULT '',
  `user_role` int(11) NOT NULL,
  `profilePicturePath` varchar(255) NOT NULL DEFAULT '', 
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`user_id`, `user_name`, `user_full_name`, `user_email`, `user_password`, `user_role`,`profilePicturePath`)
VALUES
  (38,'admin','Admin 1','admin@admin.com','admin',1,'usera.jpg'),
  (39,'test','Test','test@test.com','test',2,'usera.jpg');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table reviews
# ------------------------------------------------------------

DROP TABLE IF EXISTS `reviews`;

CREATE TABLE `reviews` (
  `review_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `review_movie_id` int(11) unsigned NOT NULL,
  `review_user_id` int(11) unsigned NOT NULL,
  `review_rating` int(11) NOT NULL,
  `review_content` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`review_id`),
  KEY `users_foreign_key` (`review_user_id`),
  KEY `movies_foreign_key` (`review_movie_id`),
  CONSTRAINT `movies_foreign_key` FOREIGN KEY (`review_movie_id`) REFERENCES `movies` (`movie_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `users_foreign_key` FOREIGN KEY (`review_user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `reviews` WRITE;
/*!40000 ALTER TABLE `reviews` DISABLE KEYS */;

INSERT INTO `reviews` (`review_id`, `review_movie_id`, `review_user_id`, `review_rating`, `review_content`)
VALUES
	(6,1,39,4,'This is one of my favorite movies of all time!'),
	(7,1,39,1,'On second thought, this was awful.');

/*!40000 ALTER TABLE `reviews` ENABLE KEYS */;
UNLOCK TABLES;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


# Dump of table feedback
# ------------------------------------------------------------

DROP TABLE IF EXISTS `feedback`;

CREATE TABLE `feedback` (
  `feedback_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NULL,
  `user_email` varchar(255) NULL,
  `feedback_content` text NOT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`feedback_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



LOCK TABLES `feedback` WRITE;
/*!40000 ALTER TABLE `feedback` DISABLE KEYS */;

INSERT INTO `feedback` (`user_name`, `user_email`, `feedback_content`)
VALUES
    ('Test', 'test@test.com', 'This is a test feedback from the user Test.'),
    ('Admin', 'admin@admin.com', 'This is a test feedback from the user Admin.');


/*!40000 ALTER TABLE `feedback` ENABLE KEYS */;
UNLOCK TABLES;




# Dump of table liked_reviews
# ------------------------------------------------------------

DROP TABLE IF EXISTS `liked_reviews`;

CREATE TABLE `liked_reviews` (
  `like_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `like_user_id` int(11) unsigned NOT NULL,
  `like_review_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`like_id`),
  KEY `liked_users_foreign_key` (`like_user_id`),
  KEY `liked_reviews_foreign_key` (`like_review_id`),
  CONSTRAINT `liked_reviews_foreign_key` FOREIGN KEY (`like_review_id`) REFERENCES `reviews` (`review_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `liked_users_foreign_key` FOREIGN KEY (`like_user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `liked_reviews` WRITE;
/*!40000 ALTER TABLE `liked_reviews` DISABLE KEYS */;
INSERT INTO `liked_reviews` (`like_id`, `like_user_id`, `like_review_id`)
VALUES
    (1, 39, 6), -- User 39 likes Review 6
    (2, 39, 7); -- User 39 likes Review 7

/*!40000 ALTER TABLE `liked_reviews` ENABLE KEYS */;
UNLOCK TABLES;

SET FOREIGN_KEY_CHECKS=ON;
