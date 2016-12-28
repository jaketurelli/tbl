-- COPY/PASTA TO GENERATE ALL NECESSARY TABLES 
CREATE TABLE `thebachleague`.`contestants` ( `contestant_id` INT(11) NOT NULL AUTO_INCREMENT ,  
											 `name` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
											 `aka` TEXT NOT NULL , 
											 `age` INT(11) NOT NULL , 
											 `occupation` TEXT NOT NULL ,
											 `height` TEXT NOT NULL ,
											 `image_dir` VARCHAR(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , 
											 `eliminated` INT(11) NOT NULL DEFAULT '0' , 
											 `city` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
											 `bio` VARCHAR(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
											 `search` VARCHAR(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
											 `first_name` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
											 `last_name` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
											 `pick_count` INT(11) NOT NULL DEFAULT '0' , 
											 `pick_percent` INT(11) NOT NULL DEFAULT '0' , 
											 PRIMARY KEY (`contestant_id`)) ENGINE = InnoDB;                                                                              

INSERT INTO `thebachleague`.`contestants` (`contestant_id`, `name`, `aka`, `age`, `occupation`, `height`, `image_dir`, `eliminated`, `city`, `bio`, `search`, `first_name`, `last_name`) VALUES (NULL, 'Alexis' ,  '', 23 , 'Aspiring Dolphin Trainer' , '5''6"' ,'img/alexis.jpg'  , 0, 'Secaucus, NJ', 'http://abc.go.com/shows/the-bachelor/cast/alexis', 'http://www.google.com/search?q=alexis+waters+bachelor', 'Alexis', 'Waters');
INSERT INTO `thebachleague`.`contestants` (`contestant_id`, `name`, `aka`, `age`, `occupation`, `height`, `image_dir`, `eliminated`, `city`, `bio`, `search`, `first_name`, `last_name`) VALUES (NULL, 'Angela' ,  '', 26 , 'Model' , '5''7"' ,'img/angela.jpg'  , 0, 'Greenville, SC', 'http://abc.go.com/shows/the-bachelor/cast/angela', 'http://www.google.com/search?q=angela+amezcua+bachelor', 'Angela', 'Amezcua');
INSERT INTO `thebachleague`.`contestants` (`contestant_id`, `name`, `aka`, `age`, `occupation`, `height`, `image_dir`, `eliminated`, `city`, `bio`, `search`, `first_name`, `last_name`) VALUES (NULL, 'Astrid' ,  '', 26 , 'Plastic Surgery Office Manager' , '5''7"' ,'img/astrid.jpg'  , 0, 'Tampa, FL', 'http://abc.go.com/shows/the-bachelor/cast/astrid', 'http://www.google.com/search?q=astrid+loch+bachelor', 'Astrid', 'Loch');
INSERT INTO `thebachleague`.`contestants` (`contestant_id`, `name`, `aka`, `age`, `occupation`, `height`, `image_dir`, `eliminated`, `city`, `bio`, `search`, `first_name`, `last_name`) VALUES (NULL, 'Briana' ,  '', 28 , 'Surgical Unit Nurse' , '5''4"' ,'img/briana.jpg'  , 0, 'Salt Lake City, UT', 'http://abc.go.com/shows/the-bachelor/cast/briana', 'http://www.google.com/search?q=briana+guertler+bachelor', 'Briana', 'Guertler');
INSERT INTO `thebachleague`.`contestants` (`contestant_id`, `name`, `aka`, `age`, `occupation`, `height`, `image_dir`, `eliminated`, `city`, `bio`, `search`, `first_name`, `last_name`) VALUES (NULL, 'Brittany' ,  '', 26 , 'Travel Nurse' , '5''2"' ,'img/brittany.jpg'  , 0, 'Santa Monica, CA', 'http://abc.go.com/shows/the-bachelor/cast/brittany', 'http://www.google.com/search?q=brittany+farrar+bachelor', 'Brittany', 'Farrar');
INSERT INTO `thebachleague`.`contestants` (`contestant_id`, `name`, `aka`, `age`, `occupation`, `height`, `image_dir`, `eliminated`, `city`, `bio`, `search`, `first_name`, `last_name`) VALUES (NULL, 'Christen' ,  '', 25 , 'Wedding Videographer' , '5''5"' ,'img/christen.jpg'  , 0, 'Tulsa, OK', 'http://abc.go.com/shows/the-bachelor/cast/christen', 'http://www.google.com/search?q=christen+whitney+bachelor', 'Christen', 'Whitney');
INSERT INTO `thebachleague`.`contestants` (`contestant_id`, `name`, `aka`, `age`, `occupation`, `height`, `image_dir`, `eliminated`, `city`, `bio`, `search`, `first_name`, `last_name`) VALUES (NULL, 'Corinne' ,  '', 24 , 'Business Owner' , '5''1"' ,'img/corinne.jpg'  , 0, 'Miami, FL', 'http://abc.go.com/shows/the-bachelor/cast/corinne', 'http://www.google.com/search?q=corinne+olympios+bachelor', 'Corinne', 'Olympios');
INSERT INTO `thebachleague`.`contestants` (`contestant_id`, `name`, `aka`, `age`, `occupation`, `height`, `image_dir`, `eliminated`, `city`, `bio`, `search`, `first_name`, `last_name`) VALUES (NULL, 'Danielle L.' ,  '', 27 , 'Small Business Owner' , '5''5"' ,'img/daniellel.jpg'  , 0, 'Los Angeles, CA', 'http://abc.go.com/shows/the-bachelor/cast/danielle-l', 'http://www.google.com/search?q=danielle+lombard+bachelor', 'Danielle', 'Lombard');
INSERT INTO `thebachleague`.`contestants` (`contestant_id`, `name`, `aka`, `age`, `occupation`, `height`, `image_dir`, `eliminated`, `city`, `bio`, `search`, `first_name`, `last_name`) VALUES (NULL, 'Danielle M.' ,  '', 31 , 'Neonatal Nurse' , '5''10"' ,'img/daniellem.jpg'  , 0, 'Nashville, TN', 'http://abc.go.com/shows/the-bachelor/cast/danielle-m', 'http://www.google.com/search?q=danielle+maltby+bachelor', 'Danielle', 'Maltby');
INSERT INTO `thebachleague`.`contestants` (`contestant_id`, `name`, `aka`, `age`, `occupation`, `height`, `image_dir`, `eliminated`, `city`, `bio`, `search`, `first_name`, `last_name`) VALUES (NULL, 'Dominique' ,  '', 25 , 'Restaurant Server' , '5''4"' ,'img/dominique.jpg'  , 0, 'Los Angeles, CA', 'http://abc.go.com/shows/the-bachelor/cast/dominique', 'http://www.google.com/search?q=dominique+alexis+bachelor', 'Dominique', 'Alexis');
INSERT INTO `thebachleague`.`contestants` (`contestant_id`, `name`, `aka`, `age`, `occupation`, `height`, `image_dir`, `eliminated`, `city`, `bio`, `search`, `first_name`, `last_name`) VALUES (NULL, 'Elizabeth (Liz)' ,  '', 29 , 'Doula' , '5''4"' ,'img/liz.jpg'  , 0, 'Las Vegas, NV', 'http://abc.go.com/shows/the-bachelor/cast/elizabeth-liz', 'http://www.google.com/search?q=elizabeth+sandoz+bachelor', 'Elizabeth', 'Sandoz');
INSERT INTO `thebachleague`.`contestants` (`contestant_id`, `name`, `aka`, `age`, `occupation`, `height`, `image_dir`, `eliminated`, `city`, `bio`, `search`, `first_name`, `last_name`) VALUES (NULL, 'Elizabeth' ,  '', 24 , 'Marketing Manager' , '5''7"' ,'img/elizabeth.jpg'  , 0, 'Dallas, TX', 'http://abc.go.com/shows/the-bachelor/cast/elizabeth ', 'http://www.google.com/search?q=elizabeth+whitelaw+bachelor', 'Elizabeth', 'Whitelaw');
INSERT INTO `thebachleague`.`contestants` (`contestant_id`, `name`, `aka`, `age`, `occupation`, `height`, `image_dir`, `eliminated`, `city`, `bio`, `search`, `first_name`, `last_name`) VALUES (NULL, 'Ida Marie' ,  '', 23 , 'Sales Manager' , '5''8"' ,'img/idamarie.jpg'  , 0, 'Harlingen, TX', 'http://abc.go.com/shows/the-bachelor/cast/ida-marie', 'http://www.google.com/search?q=ida+marie+bachelor', 'Ida Marie', 'DeLosSantos');
INSERT INTO `thebachleague`.`contestants` (`contestant_id`, `name`, `aka`, `age`, `occupation`, `height`, `image_dir`, `eliminated`, `city`, `bio`, `search`, `first_name`, `last_name`) VALUES (NULL, 'Hailey' ,  '', 23 , 'Photographer' , '5''7"' ,'img/hailey.jpg'  , 0, 'Vancouver, BC', 'http://abc.go.com/shows/the-bachelor/cast/hailey', 'http://www.google.com/search?q=hailey+merkt+bachelor', 'Hailey', 'Merkt');
INSERT INTO `thebachleague`.`contestants` (`contestant_id`, `name`, `aka`, `age`, `occupation`, `height`, `image_dir`, `eliminated`, `city`, `bio`, `search`, `first_name`, `last_name`) VALUES (NULL, 'Jaimi' ,  '', 28 , 'Chef' , '5''2"' ,'img/jaimi.jpg'  , 0, 'New Orleans, LA', 'http://abc.go.com/shows/the-bachelor/cast/jaimi', 'http://www.google.com/search?q=jaimi+king+bachelor', 'Jaimi', 'King');
INSERT INTO `thebachleague`.`contestants` (`contestant_id`, `name`, `aka`, `age`, `occupation`, `height`, `image_dir`, `eliminated`, `city`, `bio`, `search`, `first_name`, `last_name`) VALUES (NULL, 'Jasmine B.' ,  '', 25 , 'Flight Attendant' , '5''2"' ,'img/jasmineb.jpg'  , 0, 'Tacoma, WA', 'http://abc.go.com/shows/the-bachelor/cast/jasmine-b', 'http://www.google.com/search?q=jasmine+brown+bachelor', 'Jasmine', 'Brown');
INSERT INTO `thebachleague`.`contestants` (`contestant_id`, `name`, `aka`, `age`, `occupation`, `height`, `image_dir`, `eliminated`, `city`, `bio`, `search`, `first_name`, `last_name`) VALUES (NULL, 'Jasmine G.' ,  '', 29 , 'Pro Basketball Dancer' , '5''7"' ,'img/jasmineg.jpg'  , 0, 'San Francisco, CA', 'http://abc.go.com/shows/the-bachelor/cast/jasmine-g', 'http://www.google.com/search?q=jasmine+goode+bachelor', 'Jasmine', 'Goode');
INSERT INTO `thebachleague`.`contestants` (`contestant_id`, `name`, `aka`, `age`, `occupation`, `height`, `image_dir`, `eliminated`, `city`, `bio`, `search`, `first_name`, `last_name`) VALUES (NULL, 'Josephine' ,  '', 24 , 'Registered Nurse' , '5''7"' ,'img/josephine.jpg'  , 0, 'Santa Cruz, CA', 'http://abc.go.com/shows/the-bachelor/cast/josephine', 'http://www.google.com/search?q=josephine+tutman+bachelor', 'Josephine', 'Tutman');
INSERT INTO `thebachleague`.`contestants` (`contestant_id`, `name`, `aka`, `age`, `occupation`, `height`, `image_dir`, `eliminated`, `city`, `bio`, `search`, `first_name`, `last_name`) VALUES (NULL, 'Kristina' ,  '', 24 , 'Dental Hygienist' , '5''2"' ,'img/kristina.jpg'  , 0, 'Lexington, KY', 'http://abc.go.com/shows/the-bachelor/cast/kristina', 'http://www.google.com/search?q=kristina+schulman+bachelor', 'Kristina', 'Schulman');
INSERT INTO `thebachleague`.`contestants` (`contestant_id`, `name`, `aka`, `age`, `occupation`, `height`, `image_dir`, `eliminated`, `city`, `bio`, `search`, `first_name`, `last_name`) VALUES (NULL, 'Lacey' ,  '', 25 , 'Digital Marketing Manager' , '5''3"' ,'img/lacey.jpg'  , 0, 'Manhattan, NY', 'http://abc.go.com/shows/the-bachelor/cast/lacey', 'http://www.google.com/search?q=lacey+mark+bachelor', 'Lacey', 'Mark');
INSERT INTO `thebachleague`.`contestants` (`contestant_id`, `name`, `aka`, `age`, `occupation`, `height`, `image_dir`, `eliminated`, `city`, `bio`, `search`, `first_name`, `last_name`) VALUES (NULL, 'Lauren' ,  '', 30 , 'Law School Graduate' , '5''7"' ,'img/lauren.jpg'  , 0, 'Naples, FL', 'http://abc.go.com/shows/the-bachelor/cast/lauren', 'http://www.google.com/search?q=lauren+hussey+bachelor', 'Lauren', 'Hussey');
INSERT INTO `thebachleague`.`contestants` (`contestant_id`, `name`, `aka`, `age`, `occupation`, `height`, `image_dir`, `eliminated`, `city`, `bio`, `search`, `first_name`, `last_name`) VALUES (NULL, 'Michelle' ,  '', 24 , 'Food Truck Owner' , '5''1"' ,'img/michelle.jpg'  , 0, 'Los Angeles, CA', 'http://abc.go.com/shows/the-bachelor/cast/michelle', 'http://www.google.com/search?q=michelle+ramkissoon+bachelor', 'Michelle', 'Ramkissoon');
INSERT INTO `thebachleague`.`contestants` (`contestant_id`, `name`, `aka`, `age`, `occupation`, `height`, `image_dir`, `eliminated`, `city`, `bio`, `search`, `first_name`, `last_name`) VALUES (NULL, 'Olivia' ,  '', 25 , 'Apparel Sales Representative' , '5''7"' ,'img/olivia.jpg'  , 0, 'Anchorage, AK', 'http://abc.go.com/shows/the-bachelor/cast/olivia', 'http://www.google.com/search?q=olivia+burnette+bachelor', 'Olivia', 'Burnette');
INSERT INTO `thebachleague`.`contestants` (`contestant_id`, `name`, `aka`, `age`, `occupation`, `height`, `image_dir`, `eliminated`, `city`, `bio`, `search`, `first_name`, `last_name`) VALUES (NULL, 'Rachel' ,  '', 31 , 'Attorney' , '5''4"' ,'img/rachel.jpg'  , 0, 'Dallas, TX', 'http://abc.go.com/shows/the-bachelor/cast/rachel', 'http://www.google.com/search?q=rachel+lindsay+bachelor', 'Rachel', 'Lindsay');
INSERT INTO `thebachleague`.`contestants` (`contestant_id`, `name`, `aka`, `age`, `occupation`, `height`, `image_dir`, `eliminated`, `city`, `bio`, `search`, `first_name`, `last_name`) VALUES (NULL, 'Raven' ,  '', 25 , 'Fashion Boutique Owner' , '5''6"' ,'img/raven.jpg'  , 0, 'Hoxie, AR', 'http://abc.go.com/shows/the-bachelor/cast/raven', 'http://www.google.com/search?q=raven+gates+bachelor', 'Raven', 'Gates');
INSERT INTO `thebachleague`.`contestants` (`contestant_id`, `name`, `aka`, `age`, `occupation`, `height`, `image_dir`, `eliminated`, `city`, `bio`, `search`, `first_name`, `last_name`) VALUES (NULL, 'Sarah' ,  '', 26 , 'Grade School Teacher' , '5''5"' ,'img/sarah.jpg'  , 0, 'Newport Beach, CA', 'http://abc.go.com/shows/the-bachelor/cast/sarah', 'http://www.google.com/search?q=sarah+vendal+bachelor', 'Sarah', 'Vendal');
INSERT INTO `thebachleague`.`contestants` (`contestant_id`, `name`, `aka`, `age`, `occupation`, `height`, `image_dir`, `eliminated`, `city`, `bio`, `search`, `first_name`, `last_name`) VALUES (NULL, 'Susannah' ,  '', 26 , 'Account Manager' , '5''6"' ,'img/susannah.jpg'  , 0, 'San Diego, CA', 'http://abc.go.com/shows/the-bachelor/cast/susannah', 'http://www.google.com/search?q=susannah+milan+bachelor', 'Susannah', 'Milan');
INSERT INTO `thebachleague`.`contestants` (`contestant_id`, `name`, `aka`, `age`, `occupation`, `height`, `image_dir`, `eliminated`, `city`, `bio`, `search`, `first_name`, `last_name`) VALUES (NULL, 'Taylor' ,  '', 23 , 'Mental Health Counselor' , '5''4"' ,'img/taylor.jpg'  , 0, 'Seattle, WA', 'http://abc.go.com/shows/the-bachelor/cast/taylor', 'http://www.google.com/search?q=taylor+nolan+bachelor', 'Taylor', 'Nolan');
INSERT INTO `thebachleague`.`contestants` (`contestant_id`, `name`, `aka`, `age`, `occupation`, `height`, `image_dir`, `eliminated`, `city`, `bio`, `search`, `first_name`, `last_name`) VALUES (NULL, 'Vanessa' ,  '', 29 , 'Special Education Teacher' , '5''3"' ,'img/vanessa.jpg'  , 0, 'Montreal, Quebec', 'http://abc.go.com/shows/the-bachelor/cast/vanessa', 'http://www.google.com/search?q=vanessa+grimaldi+bachelor', 'Vanessa', 'Grimaldi');
INSERT INTO `thebachleague`.`contestants` (`contestant_id`, `name`, `aka`, `age`, `occupation`, `height`, `image_dir`, `eliminated`, `city`, `bio`, `search`, `first_name`, `last_name`) VALUES (NULL, 'Whitney' ,  '', 25 , 'Pilates Instructor' , '5''8"' ,'img/whitney.jpg'  , 0, 'Chanhassen, MN', 'http://abc.go.com/shows/the-bachelor/cast/whitney', 'http://www.google.com/search?q=whitney+fransway+bachelor', 'Whitney', 'Fransway');

CREATE TABLE `thebachleague`.`user` ( `user_id` 		INT(11) NOT NULL AUTO_INCREMENT,
									  `email` 		    VARCHAR(100) NOT NULL , 
									  `first_name` 		VARCHAR(25) NOT NULL , 
									  `last_name` 		VARCHAR(25) NOT NULL , 
									  `alias`			VARCHAR(25) NOT NULL ,
									  `password` 		VARCHAR(255) NOT NULL, 
									  `league_id` 		INT(11) NOT NULL DEFAULT '0', 
									  `is_admin` 		BOOLEAN NOT NULL DEFAULT '0',
									  `is_logged_in` 	BOOLEAN NOT NULL DEFAULT '1',
									  `fb_id`			BIGINT(255) UNSIGNED NULL DEFAULT NULL,
									  `twit_id`			BIGINT(255) UNSIGNED NULL DEFAULT NULL,
									  `goog_id`			BIGINT(255) UNSIGNED NULL DEFAULT NULL,
									  `pwrd_reset_hash` VARCHAR(255) DEFAULT NULL,
									  PRIMARY KEY (`user_id`) ) ENGINE = InnoDB;

CREATE TABLE `thebachleague`.`ceremony` ( `id` INT(11) NOT NULL AUTO_INCREMENT , 
										  `ceremony_number` INT(11) NOT NULL , 
										  `number_picks` INT(11) NOT NULL , 
										  `lock_time` TIMESTAMP NOT NULL,
										  `is_current` BOOLEAN NOT NULL DEFAULT '0' , 
										  PRIMARY KEY (`id`)) ENGINE = InnoDB;

CREATE TABLE `thebachleague`.`picks` ( `pick_ind` INT(11) NOT NULL AUTO_INCREMENT , 
									   `user_id` INT(11) NOT NULL , 
									   `ceremony` INT(11) NOT NULL , 
									   `league_id` INT(11) NOT NULL , 
									   `contestant_id` INT(11) NOT NULL , 
									   `pick_order` INT(11) NOT NULL, 
									   `score` INT(11) NOT NULL , 
									   PRIMARY KEY (`pick_ind`)) ENGINE = InnoDB;

CREATE TABLE `thebachleague`.`score` ( `id` INT(11) NOT NULL AUTO_INCREMENT , 
									   `user_id` INT(11) NOT NULL , 
									   `league_id` INT(11) NOT NULL , 
									   `total_score` INT(11) NOT NULL , 
									   PRIMARY KEY (`id`)) ENGINE = InnoDB;

CREATE TABLE `thebachleague`.`chat` ( `id` INT(11) NOT NULL AUTO_INCREMENT , 
									  `league_id` INT(11) NOT NULL , 
									  `user_id` INT(11) NOT NULL, 
									  `alias` VARCHAR(25) NOT NULL , 
									  `comment` TEXT NOT NULL , 
									  `time_stamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
									  PRIMARY KEY (`id`)) ENGINE = InnoDB;

CREATE TABLE `thebachleague`.`league` ( `league_id` INT(11) NOT NULL AUTO_INCREMENT,
									  	`name` VARCHAR(25) NOT NULL , 
									  	`commissioner_id` INT(11) NOT NULL, 
									  	`password` VARCHAR(255) NOT NULL, 
									  	PRIMARY KEY (`league_id`) ) ENGINE = InnoDB;

CREATE TABLE `thebachleague`.`commissioner_announcements` ( 	`id` INT(11) NOT NULL AUTO_INCREMENT,
											  					`league_id`  INT(11) NOT NULL , 
															  	`commissioner_id` INT(11) NOT NULL, 
															  	`announcement` VARCHAR(255) NOT NULL, 
															  	`time_stamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
															  	PRIMARY KEY (`id`) ) ENGINE = InnoDB;

CREATE TABLE `thebachleague`.`league_join_code`   ( `id`        	INT(11) NOT NULL AUTO_INCREMENT,
									  				`user_email` 	VARCHAR(100) NOT NULL , 
									  				`league_id` 	INT(11) NOT NULL, 
												  	`code`      	INT(11) NOT NULL,
												  	PRIMARY KEY (`id`) ) ENGINE = InnoDB;