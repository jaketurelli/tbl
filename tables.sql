-- For Harrison/localhost:
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
											 PRIMARY KEY (`contestant_id`)) ENGINE = InnoDB;                                                                              



INSERT INTO `thebachleague`.`contestants` (`contestant_id`, `name`, `aka`, `age`, `occupation`, `height`, `image_dir`, `eliminated`, `city`, `bio`, `search`, `first_name`, `last_name`) 
VALUES (NULL, 'Alex'     ,  'The Child'                   ,    25  ,   'U.S. Marine'                 ,    '5''7"'    ,'img/alex.jpg'        , 0, 'Oceanside, CA', 'http://abc.go.com/shows/the-bachelorette/cast/alex', 'http://www.google.com/search?q=alex+bachelorette', 'Alex', 'Woytkiw');
INSERT INTO `thebachleague`.`contestants` (`contestant_id`, `name`, `aka`, `age`, `occupation`, `height`, `image_dir`, `eliminated`, `city`, `bio`, `search`, `first_name`, `last_name`) 
VALUES (NULL, 'Ali'      ,  'The Disappointment'          ,    27  ,   'Bartender'                   ,    '5''8"'    ,'img/ali.jpg'         , 0, 'Santa Monica, CA', 'http://abc.go.com/shows/the-bachelorette/cast/ali', 'http://www.google.com/search?q=ali+zahiri+bachelorette', 'Ali', 'Zahiri');
INSERT INTO `thebachleague`.`contestants` (`contestant_id`, `name`, `aka`, `age`, `occupation`, `height`, `image_dir`, `eliminated`, `city`, `bio`, `search`, `first_name`, `last_name`) 
VALUES (NULL, 'Brandon'  ,  'Hopeless Romantic'           ,    28  ,   'Hipster'                     ,    '6''4"'    ,'img/brandon.jpg'     , 0, 'Los Angeles, CA', 'http://abc.go.com/shows/the-bachelorette/cast/brandon', 'http://www.google.com/search?q=brandon+bachelorette', 'Brandon', 'Howell');
INSERT INTO `thebachleague`.`contestants` (`contestant_id`, `name`, `aka`, `age`, `occupation`, `height`, `image_dir`, `eliminated`, `city`, `bio`, `search`, `first_name`, `last_name`) 
VALUES (NULL, 'Chad'     ,  'Super Douche'                ,    28  ,   'Luxury Real Estate Agent'    ,    '6''2"'    ,'img/chad.jpg'        , 0, 'Tulsa, OK', 'http://abc.go.com/shows/the-bachelorette/cast/chad', 'http://www.google.com/search?q=chad+bachelorette', 'Chad', 'Johnson');
INSERT INTO `thebachleague`.`contestants` (`contestant_id`, `name`, `aka`, `age`, `occupation`, `height`, `image_dir`, `eliminated`, `city`, `bio`, `search`, `first_name`, `last_name`) 
VALUES (NULL, 'Chase'    ,  'Who?'                        ,    27  ,   'Medical Sales Rep'           ,    '6''3"'    ,'img/chase.jpg'       , 0, 'Highlands Ranch, CO', 'http://abc.go.com/shows/the-bachelorette/cast/chase', 'http://www.google.com/search?q=chase+bachelorette', 'Chase', 'McNary');
INSERT INTO `thebachleague`.`contestants` (`contestant_id`, `name`, `aka`, `age`, `occupation`, `height`, `image_dir`, `eliminated`, `city`, `bio`, `search`, `first_name`, `last_name`) 
VALUES (NULL, 'Christian',  'Forsett''s Cuz'              ,    26  ,   'Telecom Consultant'          ,    '5''11"'   ,'img/christian.jpg'   , 0, 'Los Angeles, CA', 'http://abc.go.com/shows/the-bachelorette/cast/christian', 'http://www.google.com/search?q=christian+bishop+bachelorette', 'Christian', 'Bishop');
INSERT INTO `thebachleague`.`contestants` (`contestant_id`, `name`, `aka`, `age`, `occupation`, `height`, `image_dir`, `eliminated`, `city`, `bio`, `search`, `first_name`, `last_name`) 
VALUES (NULL, 'Coley'    ,  'Slicker the Hair, the Better',    27  ,   'Real Estate Consultant'      ,    '6''2"'    ,'img/coley.jpg'       , 0, 'Chicago, IL', 'http://abc.go.com/shows/the-bachelorette/cast/coley', 'http://www.google.com/search?q=coley+bachelorette', 'Coley', 'Knust');
INSERT INTO `thebachleague`.`contestants` (`contestant_id`, `name`, `aka`, `age`, `occupation`, `height`, `image_dir`, `eliminated`, `city`, `bio`, `search`, `first_name`, `last_name`) 
VALUES (NULL, 'Daniel'   ,  'Blue Eyes, Big Ears'         ,    29  ,   'Commercial Banker'           ,    '6''3"'    ,'img/daniel.jpg'      , 0, 'Fort Lauderdale, FL', 'http://abc.go.com/shows/the-bachelorette/cast/derek', 'http://www.google.com/search?q=derek+bachelorette', 'Derek', 'Peth');
INSERT INTO `thebachleague`.`contestants` (`contestant_id`, `name`, `aka`, `age`, `occupation`, `height`, `image_dir`, `eliminated`, `city`, `bio`, `search`, `first_name`, `last_name`) 
VALUES (NULL, 'Derek'    ,  'Canadian'                    ,    31  ,   'Male Model'                  ,    '6''1"'    ,'img/derek.jpg'       , 0, 'Vancouver, BC', 'http://abc.go.com/shows/the-bachelorette/cast/daniel', 'http://www.google.com/search?q=daniel+maguire+bachelorette', 'Daniel', 'Maguire');
INSERT INTO `thebachleague`.`contestants` (`contestant_id`, `name`, `aka`, `age`, `occupation`, `height`, `image_dir`, `eliminated`, `city`, `bio`, `search`, `first_name`, `last_name`) 
VALUES (NULL, 'Evan'     ,  'Wishes He Was Chad'          ,    33  ,   'Erectile Dysfunction Expert' ,    '5''11"'   ,'img/evan.jpg'        , 0, 'Nashville, TN', 'http://abc.go.com/shows/the-bachelorette/cast/evan', 'http://www.google.com/search?q=evan+bachelorette', 'Evan', 'Bass');
INSERT INTO `thebachleague`.`contestants` (`contestant_id`, `name`, `aka`, `age`, `occupation`, `height`, `image_dir`, `eliminated`, `city`, `bio`, `search`, `first_name`, `last_name`) 
VALUES (NULL, 'Grant'    ,  'Jawbones That Cut Glass'     ,    27  ,   'Firefighter'                 ,    '6''2"'    ,'img/grant.jpg'       , 0, 'Hayward, CA', 'http://abc.go.com/shows/the-bachelorette/cast/grant', 'http://www.google.com/search?q=grant+bachelorette', 'Grant', 'Kemp');
INSERT INTO `thebachleague`.`contestants` (`contestant_id`, `name`, `aka`, `age`, `occupation`, `height`, `image_dir`, `eliminated`, `city`, `bio`, `search`, `first_name`, `last_name`) 
VALUES (NULL, 'Jake'     ,  'Diversity'                   ,    27  ,   'Landscape Architect'         ,    '6''1"'    ,'img/jake.jpg'        , 0, 'Playa Vista, CA', 'http://abc.go.com/shows/the-bachelorette/cast/grant', 'http://www.google.com/search?q=grant+bachelorette', 'Jake', '????');
INSERT INTO `thebachleague`.`contestants` (`contestant_id`, `name`, `aka`, `age`, `occupation`, `height`, `image_dir`, `eliminated`, `city`, `bio`, `search`, `first_name`, `last_name`) 
VALUES (NULL, 'James F'  ,  'Old Navy Boys Dept'          ,    34  ,   'Boxing Club Owner'           ,    '6''2"'    ,'img/jamesf.jpg'      , 0, 'Nashville, TN', 'http://abc.go.com/shows/the-bachelorette/cast/james-f', 'http://www.google.com/search?q=james+f+bachelorette', 'James', 'Fuertes');
INSERT INTO `thebachleague`.`contestants` (`contestant_id`, `name`, `aka`, `age`, `occupation`, `height`, `image_dir`, `eliminated`, `city`, `bio`, `search`, `first_name`, `last_name`) 
VALUES (NULL, 'James S'  ,  'Really?'                     ,    27  ,   'Bachelor Superfan'           ,    '6''1"'    ,'img/jamess.jpg'      , 0, 'Phoenix, AZ', 'http://abc.go.com/shows/the-bachelorette/cast/james-s', 'http://www.google.com/search?q=james+s+bachelorette', 'James', 'Spadafore');
INSERT INTO `thebachleague`.`contestants` (`contestant_id`, `name`, `aka`, `age`, `occupation`, `height`, `image_dir`, `eliminated`, `city`, `bio`, `search`, `first_name`, `last_name`) 
VALUES (NULL, 'James T'  ,  'Not the Real JT'             ,    29  ,   'Singer Songwriter'           ,    '6''2"'    ,'img/jamest.jpg'      , 0, 'Katy, TX', 'http://abc.go.com/shows/the-bachelorette/cast/james-taylor', 'http://www.google.com/search?q=james+taylor+bachelorette', 'James', 'Taylor');
INSERT INTO `thebachleague`.`contestants` (`contestant_id`, `name`, `aka`, `age`, `occupation`, `height`, `image_dir`, `eliminated`, `city`, `bio`, `search`, `first_name`, `last_name`) 
VALUES (NULL, 'Jonathan' ,  'THE AZN (half)'              ,    29  ,   'Technical Sales Rep'         ,    '6''1"'    ,'img/jonathan.jpg'    , 0, 'Vancouver, BC', 'http://abc.go.com/shows/the-bachelorette/cast/jonathan', 'http://www.google.com/search?q=jonathan+hamilton+bachelorette', 'Jonathan', 'Hamilton');
INSERT INTO `thebachleague`.`contestants` (`contestant_id`, `name`, `aka`, `age`, `occupation`, `height`, `image_dir`, `eliminated`, `city`, `bio`, `search`, `first_name`, `last_name`) 
VALUES (NULL, 'Jordan'   ,  'Not Aaron'                   ,    27  ,   'Former Pro Quarterback'      ,    '6''2"'    ,'img/jordan.jpg'      , 0, 'Chino, CA', 'http://abc.go.com/shows/the-bachelorette/cast/jordan', 'http://www.google.com/search?q=jordan+rodgers', 'Jordan', 'Rodgers');
INSERT INTO `thebachleague`.`contestants` (`contestant_id`, `name`, `aka`, `age`, `occupation`, `height`, `image_dir`, `eliminated`, `city`, `bio`, `search`, `first_name`, `last_name`) 
VALUES (NULL, 'Luke'     ,  'Sensitive Farmer'            ,    31  ,   'War Veteran'                 ,    '6''1"'    ,'img/luke.jpg'        , 0, 'Burnet, Texas', 'http://abc.go.com/shows/the-bachelorette/cast/luke', 'http://www.google.com/search?q=luke+pell+bachelorette', 'Luke', 'Pell');
INSERT INTO `thebachleague`.`contestants` (`contestant_id`, `name`, `aka`, `age`, `occupation`, `height`, `image_dir`, `eliminated`, `city`, `bio`, `search`, `first_name`, `last_name`) 
VALUES (NULL, 'Nick B'   ,  'Santa'                       ,    33  ,   'Electrical Engineer'         ,    '6''1"'    ,'img/nickb.jpg'       , 0, 'Fort Lauderdale, FL', 'http://abc.go.com/shows/the-bachelorette/cast/nick-b', 'http://www.google.com/search?q=nick+b+bachelorette', 'Nick', 'Benvenutti');
INSERT INTO `thebachleague`.`contestants` (`contestant_id`, `name`, `aka`, `age`, `occupation`, `height`, `image_dir`, `eliminated`, `city`, `bio`, `search`, `first_name`, `last_name`) 
VALUES (NULL, 'Nick S'   ,  'Who???'                      ,    26  ,   'Software Salesman'           ,    '6''1"'    ,'img/nicks.jpg'       , 0, 'San Francisco, CA', 'http://abc.go.com/shows/the-bachelorette/cast/nick-s', 'http://www.google.com/search?q=nick+s+bachelorette', 'Nick', 'Sharp');
INSERT INTO `thebachleague`.`contestants` (`contestant_id`, `name`, `aka`, `age`, `occupation`, `height`, `image_dir`, `eliminated`, `city`, `bio`, `search`, `first_name`, `last_name`) 
VALUES (NULL, 'Peter'    ,  'Should Have Gotten a Rose'   ,    26  ,   'Staffing Agency Manager'     ,    '5''11"'   ,'img/peter.jpg'       , 0, 'Chicago, IL', 'http://abc.go.com/shows/the-bachelorette/cast/peter', 'http://www.google.com/search?q=peter+bachelorette', 'Peter', 'Medina');
INSERT INTO `thebachleague`.`contestants` (`contestant_id`, `name`, `aka`, `age`, `occupation`, `height`, `image_dir`, `eliminated`, `city`, `bio`, `search`, `first_name`, `last_name`) 
VALUES (NULL, 'Robby'    ,  'My Hair is Perfect'          ,    27  ,   'Former Competitive Swimmer'  ,    '6''1"'    ,'img/robby.jpg'       , 0, 'Jacksonville, FL', 'http://abc.go.com/shows/the-bachelorette/cast/robby', 'http://www.google.com/search?q=robby+bachelorette', 'Robby', 'Hayes');
INSERT INTO `thebachleague`.`contestants` (`contestant_id`, `name`, `aka`, `age`, `occupation`, `height`, `image_dir`, `eliminated`, `city`, `bio`, `search`, `first_name`, `last_name`) 
VALUES (NULL, 'Sal'      ,  'Who??'                       ,    28  ,   'Operations Manager'          ,    '6''2"'    ,'img/sal.jpg'         , 0, 'Fort Lauderdale, FL', 'http://abc.go.com/shows/the-bachelorette/cast/sal', 'http://www.google.com/search?q=sal+bachelorette', 'Sal', 'DeJulio');
INSERT INTO `thebachleague`.`contestants` (`contestant_id`, `name`, `aka`, `age`, `occupation`, `height`, `image_dir`, `eliminated`, `city`, `bio`, `search`, `first_name`, `last_name`) 
VALUES (NULL, 'Vinny'    ,  'My Cousin'                   ,    28  ,   'Barber'                      ,    '6''0"'    ,'img/vinny.jpg'       , 0, 'Delray Beach, FL', 'http://abc.go.com/shows/the-bachelorette/cast/vinny', 'http://www.google.com/search?q=vinny+bachelorette', 'Vinny', 'Ventiera');
INSERT INTO `thebachleague`.`contestants` (`contestant_id`, `name`, `aka`, `age`, `occupation`, `height`, `image_dir`, `eliminated`, `city`, `bio`, `search`, `first_name`, `last_name`) 
VALUES (NULL, 'Wells'    ,  'Not a Firefighter'           ,    31  ,   'Radio DJ'                    ,    '6''0"'    ,'img/wells.jpg'       , 0, 'Nashville, TN', 'http://abc.go.com/shows/the-bachelorette/cast/wells', 'http://www.google.com/search?q=wells+bachelorette', 'Wells', 'Adams');
INSERT INTO `thebachleague`.`contestants` (`contestant_id`, `name`, `aka`, `age`, `occupation`, `height`, `image_dir`, `eliminated`, `city`, `bio`, `search`, `first_name`, `last_name`) 
VALUES (NULL, 'Will'     ,  'Still TPing Houses'          ,    26  ,   'Civil Engineer'              ,    '6''2"'    ,'img/will.jpg'        , 0, 'Haduch, NJ', 'http://abc.go.com/shows/the-bachelorette/cast/will', 'http://www.google.com/search?q=will+bachelorette', 'Will', 'Haduch');

CREATE TABLE `thebachleague`.`user` ( `user_id` 		INT(11) NOT NULL AUTO_INCREMENT,
									  `username` 		VARCHAR(25) NOT NULL , 
									  `alias` 			VARCHAR(25) NOT NULL , 
									  `password` 		VARCHAR(255) NOT NULL, 
									  `league_id` 		INT(11) NOT NULL DEFAULT '-1', 
									  `is_admin` 		BOOLEAN NOT NULL DEFAULT '0',
									  `is_logged_in` 	BOOLEAN NOT NULL DEFAULT '1',
									  `fb_id`			BIGINT(255) UNSIGNED NULL DEFAULT NULL,
									  `email`			VARCHAR(100) NOT NULL , 
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
