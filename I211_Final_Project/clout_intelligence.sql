-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2020 at 02:50 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clout_intelligence`
--
DROP DATABASE IF EXISTS `clout_intelligence`;
CREATE DATABASE IF NOT EXISTS `clout_intelligence` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `clout_intelligence`;

-- --------------------------------------------------------

--
-- Table structure for table `celebrity`
--

CREATE TABLE `celebrity` (
  `celeb_id` int(8) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `age` int(5) NOT NULL,
  `web_presence` text NOT NULL,
  `most_active` varchar(535) NOT NULL,
  `frequency` varchar(535) NOT NULL,
  `description` text NOT NULL,
  `occupation` varchar(50) NOT NULL,
  `nationality` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `celebrity`
--

INSERT INTO `celebrity` (`celeb_id`, `first_name`, `last_name`, `gender`, `age`, `web_presence`, `most_active`, `frequency`, `description`, `occupation`, `nationality`) VALUES
(1, 'Donald', 'Trump', 'Male', 72, 'Twitter: https://www.twitter.com/realDonaldTrump Facebook: https://www.facebook.com/donaldtrump/Website: https://www.donaldjtrump.com/', 'Twitter: https://www.twitter.com/realDonaldTrump', 'Posting: daily', 'Donald John Trump is the 45th and current president of the United States. Before entering politics, he was a businessman and television personality. Trump was born and raised in Queens, a borough of New York City, and received a bachelor&#39;s degree in economics from the Wharton School.', 'U.S. President', 'American'),
(2, 'Cody', 'Johnston', 'Male', 35, 'https://twitter.com/drmistercody?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor\r\n', 'https://twitter.com/drmistercody\r\n', 'bi-weekly\r\n', 'Cody Johnston is a charismatic news YouTuber. His channel on YouTube is called Some More News, where he brings up topics such as politics and pop-culture.', 'YouTuber', 'American'),
(3, 'Dwayne', 'Johnson', 'Male', 47, 'Instagram : https://www.instagram.com/therock/ Youtube: https://www.youtube.com/user/therock/videos Twitter: https://twitter.com/TheRock?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor', 'https://twitter.com/TheRock?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor', '14,035,109 total follower, following 271 people, 23,970 tweets overall, 7.6 tweets a day, 215 tweets a month', 'Dwayne Douglas Johnson, also known by his ring name The Rock, is an American-Canadian actor, producer, businessman, and former professional wrestler and football player. He was a professional wrestler for the World Wrestling Federation for eight years prior to pursuing an acting career.', 'Actor', 'American, Canadian, Samoan'),
(4, 'Pete', 'Buttigieg', 'Male', 37, 'Twitter: https://twitter.com/PeteButtigieg Facebook : https://www.facebook.com › petebuttigieg1 LINKEDIN: https://www.linkedin.com/company/pete-for-america/', 'https://twitter.com/PeteButtigieg', 'Posting: Daily, Number of Followers: 1.6M, Following: 2591, 6.6 tweets a day, 175 tweets a month', 'Peter Paul Montgomery Buttigieg is an American politician and Afghanistan War veteran. He served as the mayor of South Bend, Indiana from 2012 to 2020 and was a candidate for the Democratic nomination in the 2020 United States presidential election.', 'Former Mayor of South Bend', 'American'),
(5, 'Elon', 'Musk', 'Male', 48, 'Twitter: https://twitter.com/elonmusk?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor Instagram: https://www.instagram.com/elonmusk/?hl=en Facebook:N/A', 'https://twitter.com/elonmusk?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor', 'Posting: Daily Number of Followers: 29.7M, Following: 80, 5.4 tweets a day, 97 tweets a month', 'Elon Reeve Musk FRS is an engineer, industrial designer, technology entrepreneur, and philanthropist. He is a citizen of South Africa, the United States, and Canada.', 'CEO of SpaceX', 'American, South African, Canadian'),
(6, 'Joe', 'Rogan', 'Male', 52, 'Twitter: https://twitter.com/joerogan?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor                    https://www.facebook.com/JOEROGAN/                            http://podcasts.joerogan.net/', 'https://twitter.com/joerogan?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor', 'Posting: Daily\r\nNumber of Followers: 5.5M\r\nTotal Number of Posts: 45.2K\r\nTotal Number of Likes: 747', 'Joseph James Rogan is an American comedian and podcast host. He has also worked as a mixed martial arts color commentator, television host, and occasional actor. Rogan began a career in comedy in August 1988 in the Boston area.', 'Comedian', 'American'),
(7, 'Jared', 'Knabenbauer', 'Male', 34, 'Twitter: https://twitter.com/ProJared?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor    Youtube: https://www.youtube.com/channel/UC2e0bNZ6CzT-Xvr070VaGsw', 'https://twitter.com/ProJared?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor', 'Posting: Daily\r\nNumber of Followers: 184k\r\nTotal Number of Posts: 9156\r\nTotal Number of Likes: 12.6k', 'Jared Lee Knabenbauer, aka ProJared (Professional Jared), is a YouTube content creator focused on video games. He is most known for his ProReviews and Nuzlocke series, as well as his work at his former employer ScrewAttack.', 'YouTuber', 'American'),
(8, 'Craig', 'Thompson', 'Male', 24, 'Twitter: https://twitter.com/MiniLaddd?lang=en Youtube: https://www.youtube.com/user/MiniLaddd', 'https://twitter.com/MiniLaddd?lang=en', 'Posting: Daily\r\nNumber of Followers:1.65M\r\nTotal Number of Posts: 64.3K\r\nTotal Number of Likes:71', 'Craig Thompson, is an entertainer, comedian, vlogger, gamer and YouTuber, known by the online community as Mini Ladd. As of August 2019, he has accumulated over 10 million followers across all social platforms, over 1.4 billion views, and averages roughly 50,000 concurrent viewers during his live-streams.', 'Entertainer', 'American, Arab'),
(9, 'Kim', 'Kardashian', 'Female', 39, 'Instagram: https://www.instagram.com/kimkardashian/?hl=en\r\nTwitter: https://twitter.com/KimKardashian?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor\r\nFacebook: https://www.facebook.com/KimKardashian/', 'https://twitter.com/KimKardashian?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor', 'Postings: Average of 16 per day\r\nFollowers: 62.4M\r\nPosts: 30,905', 'Kimberly Kardashian West is an American media personality, model, businesswoman, socialite, and actress. Kardashian first gained media attention as a friend and stylist of Paris Hilton but received wider notice after a 2002 sex tape, Kim Kardashian, Superstar, with her then-boyfriend Ray J was released in 2007.', 'Media Personality', 'American'),
(10, 'Zendaya', 'Stoermer Coleman', 'Female', 23, 'Instagram: https://www.instagram.com/zendaya/\r\nTwitter: https://twitter.com/Zendaya\r\nFacebook: https://www.facebook.com/Zendaya/\r\nMySpace: https://myspace.com/zendaya', 'https://www.instagram.com/zendaya/', 'Posting: Between 3-5 days \r\nFollowers: 63.7M \r\nTotal Posting: 3,419\r\nMost Likes: 6M+', 'Zendaya Maree Stoermer Coleman, known mononymously as Zendaya, is an American actress and singer. She began her career as a child model and backup dancer, before gaining prominence for her role as Rocky Blue on the Disney Channel sitcom Shake It Up.', 'Actress', 'American'),
(11, 'Bernie', 'Sanders', 'Male', 78, 'Campaign Website: https://berniesanders.com/ \r\nInstagram: https://www.instagram.com/berniesanders/\r\nPresidential campaign Twitter: https://twitter.com/BernieSanders\r\nSenate Twitter: https://twitter.com/SenSanders', 'https://twitter.com/BernieSanders', 'Posting: Average of 10 tweets/day\r\nFollowers: 10M\r\nPosts: 15.9K\r\nMost likes: 882K+', 'Bernard Sanders is an American politician who has served as the junior United States Senator from Vermont since 2007 and as U.S. Representative for the state\'s at-large congressional district from 1991 to 2007.', 'U.S. Senator', 'American'),
(12, 'Russell', 'Vitale', 'Male', 27, 'Instagram: https://www.instagram.com/russ/?hl=en\r\nTwitter: https://twitter.com/russdiemon?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor\r\nFacebook: https://www.facebook.com/russtheone/', 'https://twitter.com/russdiemon?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor', 'Postings: Average of 11 per day\r\nFollowers: 2.2M\r\nPosts: 39.4K', 'Russell Vitale, better known by his stage name Russ, is an American rapper, singer, songwriter, author and record producer. He is known for his singles \"What They Want\" and \"Losin Control\", which peaked respectively at number 83 and 63 on the US Billboard Hot 100.', 'Rapper', 'American'),
(13, 'O.J.', 'Simpson', 'Male', 72, 'Twitter Url https://twitter.com/TheRealOJ32', 'https://twitter.com/TheRealOJ32/status/1198650054162231296', 'Posting: Daily\r\nFollowers: 923k\r\nPosts: 92\r\nLikes: 99', 'Orenthal James Simpson, nicknamed \"the Juice\", is an American former football running back, broadcaster, actor, advertising spokesman, and convicted felon. Once a popular figure with the U.S. public, he is best known for being tried for the murders of his former wife, Nicole Brown Simpson, and her friend, Ron Goldman.', 'Football Running Back', 'American'),
(14, 'Kanye', 'West', 'Male', 42, 'Twitter: https://twitter.com/kanyewest?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor', 'https://twitter.com/kanyewest?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor', 'Number of Followers: 29.4 million\r\nTotal Num of Post: 1,191\r\nTotal Num of Likes: 3\r\nPosting: Weekly/Monthly', 'Kanye Omari West is an American rapper, singer, songwriter, record producer, entrepreneur and fashion designer.', 'Rapper', 'American'),
(15, 'Ariana', 'Grande', 'Female', 26, 'https://www.instagram.com/arianagrande/?hl=en', 'https://www.instagram.com/arianagrande/?hl=en', 'posting:daily\r\nfollowers: 167.9 M\r\nposts:4415\r\nlikes: 11.2 B\r\nviews per day: 24,641', 'Ariana Grande-Butera is an American singer, songwriter, and actress. Born in Boca Raton, Florida, Grande began her career in the 2008 Broadway musical 13 and rose to prominence for her role as Cat Valentine in the Nickelodeon television series Victorious, and in its spin-off, Sam & Cat.', 'Singer', 'American'),
(16, 'John', 'Cena', 'Male', 42, 'Instgram (https://instagram.com/JohnCena), Facebook (https://facebook.com/johncena), Website (https://wwe.com/superstars/john-cena)', 'https://twitter.com/JohnCena', 'Posting: Daily (occasionally twice daily)\r\nNumber of Followers: 11.9M\r\nPosts: 6,233\r\nLikes: 7', 'John Felix Anthony Cena Jr. is an American professional wrestler, actor, rapper, and television presenter. He is currently signed to WWE on a part-time deal. He is also the current host of Are You Smarter Than a Fifth Grader? on Nickelodeon, and has starred in various films.', 'Professional Wrestler', 'American'),
(17, 'Justin', 'Bieber', 'Male', 25, 'https://www.instagram.com/justinbieber/ \r\nhttps://www.facebook.com/JustinBieber/\r\nhttps://twitter.com/justinbieber?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor', 'https://www.instagram.com/justinbieber/', 'Post : 4790 \r\nFollower: 122M\r\nFollowing: 331\r\nLike: 20M', 'Justin Drew Bieber is a Canadian singer, songwriter and actor. Discovered at 13 years old by talent manager Scooter Braun after he had watched his YouTube cover song videos, Bieber was signed to RBMG Records in 2008.', 'Singer/Songwriter', 'Canadian'),
(18, 'Stuart', 'Ashen', 'Male', 42, 'Youtube URL: https://www.youtube.com/channel/UCxt9Pvye-9x_AIcb1UtmF1Q\r\nTwitter URL: https://twitter.com/ashens\r\nAshens URL: https://www.ashens.com/', 'https://www.youtube.com/channel/UCxt9Pvye-9x_AIcb1UtmF1Q', 'Uploading: Biweekly/Weekly\r\n# of Subscribers: 1.43 Million\r\nTotal Views: 451 Million', 'Stuart Clive Ashen, commonly known by his online alias Ashens, is a British comedian, critic, animator, actor, author, producer and online reviewer of various products; his reviews usually include distinctive toys, video games and food.', 'Comedian', 'British'),
(19, 'Riley', 'Reid', 'Female', 28, 'https://twitter.com/rileyreidx3?lang=en', 'https://twitter.com/rileyreidx3?lang=en', 'Weekly', 'Riley Reid is an American pornographic actress. She briefly worked as a stripper, and entered the adult film industry in 2010 at the age of 19. Since then, she has won numerous awards, including Female Performer of the Year from AVN in 2016.', 'Pornographic Actress', 'American'),
(20, 'Ryan', 'Reynolds', 'Male', 43, 'https://twitter.com/vancityreynolds', 'https://twitter.com/vancityreynolds', 'Daily', 'Ryan Rodney Reynolds is a Canadian actor, comedian, film producer and entrepreneur. He began his career starring in the Canadian teen soap opera Hillside and had minor roles before landing the lead role on the sitcom Two Guys and a Girl between 1998 and 2001.', 'Actor', 'Canadian'),
(21, 'Marques', 'Brownlee', 'Male', 26, 'https://www.youtube.com/user/marquesbrownlee', 'https://twitter.com/MKBHD', 'Weekly', 'Marques Keith Brownlee, also known professionally as MKBHD, is an American YouTuber and former professional ultimate frisbee player, best known for his technology-focused videos and podcast.', 'YouTuber', 'American'),
(22, 'Gordon', 'Ramsay', 'Male', 53, 'Facebook:https://www.facebook.com/gordonramsay/\r\nInstagram:https://www.instagram.com/gordongram/?hl=en\r\nTwitter:https://twitter.com/GordonRamsay?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor', 'Facebook', 'Posting: Daily                         Number of Followers: 8.6M                           Total Num of Posts: N/A                 Total Num of Likes: 8.3M', 'Gordon James Ramsay, Junior OBE is a British chef, restaurateur, writer and television personality. He was born in Johnstone, Scotland, and raised in Stratford-upon-Avon, England. His restaurants have been awarded 16 Michelin stars in total and currently hold a total of seven.', 'Chef', 'British'),
(23, 'Travis', 'Scott', 'Male', 28, 'Instagram:https://www.instagram.com/travisscott/?hl=en\r\nTwitter:https://twitter.com/trvisXX?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor\r\nWebsite:https://www.travisscott.com/', 'Instagram', 'Posting: Randomly                         Number of Followers: 22.3M                           Total Num of Posts: 2.9M                 Total Num of Likes: N/A', 'Jacques Berman Webster II, known professionally as Travis Scott, is an American rapper, singer, songwriter, and record producer. In 2012, Scott signed his first major-label deal with Epic Records.', 'Rapper', 'American'),
(24, 'Ellen', 'DeGeneres', 'Female', 61, 'Instagram:https://www.instagram.com/theellenshow/?hl=en\r\nTwitter:https://twitter.com/TheEllenShow?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor\r\nFacebook:https://www.facebook.com/ellentv/', 'Instagram', 'Posting: Daily                        Number of Followers: 80.1M                           Total Num of Posts: 8,200                 Total Num of Likes: N/A', 'Ellen Lee DeGeneres is an American comedian, television host, actress, writer, and producer. She starred in the sitcom Ellen from 1994 to 1998 and has hosted her syndicated TV talk show, The Ellen DeGeneres Show, since 2003.', 'Television Host', 'American'),
(25, 'Adrian', 'Wojnarowski', 'Male', 50, 'Twitter Url : https://twitter.com/wojespn?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor\r\nInstagram Url  : https://www.instagram.com/wojespn/?hl=en\r\nEspnpressrom Url : https://espnpressroom.com/us/bios/adrian-wojnarowski/\r\nFacebook Url : https://www.facebook.com/wojespn/', 'https://twitter.com/wojespn?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor', 'Posting: Daily Number of Followers: 3.75M Total num of Post: 16.7k Total Num of likes: 6895 Total num of retweets:', 'Adrian Wojnarowski, nicknamed Woj, is an American sports columnist, reporter and author. He is currently employed with ESPN, having previously covered the NBA for Yahoo! Sports.', 'Columnist', 'American'),
(26, 'Jimmy', 'Fallon', 'Male', 45, 'Twitter Url : https://twitter.com/jimmyfallon?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor\r\nNBC Url : https://www.nbc.com/the-tonight-show\r\nYoutube Url : https://www.youtube.com/user/latenight\r\nFacebook Url : https://www.facebook.com/JimmyFallon/', 'https://twitter.com/jimmyfallon?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor', 'Posting: Daily Number of Followers: 51.5m Total num of Post: 12.2k Total Num of likes: 1466 Total num of retweets:', 'James Thomas Fallon is an American comedian, actor, television host, writer, and producer. He is known for his work in television as a cast member on Saturday Night Live and as the host of late-night talk show The Tonight Show Starring Jimmy Fallon and before that Late Night with Jimmy Fallon.', 'Television Host', 'American'),
(27, 'Mark', 'Hamill', 'Male', 68, 'Facebook URL: https://www.facebook.com/HamillHimself/\r\nInstagram URL: https://www.instagram.com/hamillhimself/?hl=en\r\nTwitter URL: https://twitter.com/HamillHimself?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor', 'https://twitter.com/HamillHimself?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor', 'Posting: Daily\r\nNumber of followers: 4.5m\r\nTotal number of posts: 8994\r\nTotal Number of Likes: 100M\r\nTotal Number of Retweets: 997', 'Mark Richard Hamill is an American actor, voice actor, and writer. Hamill is best known for playing Luke Skywalker in the Star Wars films, which won him the Saturn Award for Best Actor three times.', 'Actor', 'American'),
(28, 'Lexi', 'Kaufman', 'Female', 28, 'Twitter URL: https://twitter.com/AlexaBliss_WWE \r\nInstagram URL: https://www.instagram.com/alexa_bliss_wwe_/', 'https://twitter.com/AlexaBliss_WWE', '4.2M followers\r\n2671 posts\r\n7736 likes', 'Alexis Kaufman is an American professional wrestler currently signed to WWE, where she performs on the SmackDown brand under the ring name Alexa Bliss, and is one-half of the current WWE Women\'s Tag Team Champions with Nikki Cross in their second reign.', 'Professional Wrestler', 'American'),
(29, 'Markus', 'Persson', 'Male', 48, 'Twitter', 'https://twitter.com/notch', 'Posting: Daily, # of Followers: 3.73M, # of Posts: 73k, # of Likes: 9.7k', 'Markus Alexej Persson, better known as Notch, is a Swedish video game programmer and designer. He is best known for creating the sandbox video game Minecraft and for founding the video game company Mojang in 2010, alongside Carl Manneh and Jakob Porser.', 'Video Game Programmer', 'Swedish'),
(30, 'Andrew', 'George', 'Male', 27, 'LinkedIn URL: \r\nhttps://www.linkedin.com/in/adg/\r\nFacebook URL: \r\nhttps://www.facebook.com/andrew.george.7543', 'Facebook URL: \r\nhttps://www.facebook.com/andrew.george.7543', 'Posting: Randomly', 'Andrew George is a current student at IUPUI. He is looking to major in Informatics, with a specialization in Applied Data Science.', 'LiFT Scholars Recruitment Specialist / Peer Mentor', 'American'),
(31, 'Nasser', 'Paydar', 'Male', 64, 'Twitter URL: https://twitter.com/paydar\r\nFacebook URL: https://www.facebook.com/IUPUI/', 'https://twitter.com/paydar', 'Posting: Daily\r\nNumber of Followers: 4449\r\nTotal number of posts: 2485\r\nTotal number of likes: 7445\r\nTotal number of retweets: 68', 'Nasser H. Paydar is chancellor of IUPUI and executive vice president of Indiana University. An IU faculty member for more than 30 years, he has held various administrative and executive leadership positions at the university.', 'Chancellor of IUPUI', 'American'),
(32, 'Barack', 'Obama', 'Male', 58, 'Twitter URL: https://twitter.com/barackobama', 'https://twitter.com/barackobama', 'Posting: Daily\r\nNumber of Followers: 110.5M\r\nTotal number of posts: 15.7K\r\nTotal number of likes: 11\r\nTotal number of retweets: 40,693', 'Barack Hussein Obama II is an American politician and attorney who served as the 44th president of the United States from 2009 to 2017. A member of the Democratic Party, he was the first African-American president of the United States.', 'Former U.S. President', 'American'),
(33, 'Sean', 'Connery', 'Male', 89, 'https://www.seanconnery.com/', 'https://www.seanconnery.com/filmography/', 'Updated yearly', 'Sir Thomas Sean Connery CBE is a Scottish retired actor and producer, who has won an Academy Award, two BAFTA Awards, and three Golden Globes, including the Cecil B. DeMille Award and a Henrietta Award.', 'Actor', 'Scottish'),
(34, 'Justin', 'Trudeau', 'Male', 47, 'https://www.instagram.com/justinpjtrudeau/', 'https://www.instagram.com/p/B5eU8VhAOG5/', 'Posting - Daily, Followers 3.2M', 'Justin Pierre James Trudeau PC MP is a Canadian politician who has served as the 23rd prime minister of Canada since 2015 and has been the leader of the Liberal Party since 2013.', 'Prime Minister of Canada', 'Canadian'),
(35, 'Alison', 'Brie', 'Female', 36, 'https://www.instagram.com/alisonbrie/', 'https://www.instagram.com/p/B5YXdNrHt_U/', 'Posting - Daily, Followers 970K', 'Alison Brie Schermerhorn (born December 29, 1982) is an American actress. Brie is best known for her starring roles as Annie Edison in the comedy series Community (2009–2015), Trudy Campbell in the drama series Mad Men (2007–2015), Diane Nguyen in the animated comedy series BoJack Horseman (2014–2020) and as Ruth Wilder in the comedy-drama series GLOW (2017–present), for which she received nominations for the Screen Actors Guild Award and the Golden Globe Award for Best Actress – Television Series Musical or Comedy.', 'Actress', 'American'),
(36, 'Tommy', 'Lee', 'Male', 57, 'https://www.instagram.com/tommylee/', 'https://www.instagram.com/p/B5Zybf3l-xX/', 'Posting - Daily, Followers 919K', 'Thomas Lee Bass (born October 3, 1962) is an American musician and founding member of Mötley Crüe. As well as being the band\'s long-term drummer, Lee founded rap-metal band Methods of Mayhem, and has pursued solo musical projects.', 'Musician', 'American'),
(37, 'Eric', 'Egan', 'Male', 27, 'https://twitter.com/HeartAttackMane', 'https://twitter.com/HeartAttackMane', 'Twitter - 9k followers\r\nPosting: Multiple times a day', 'Eric Egan is the lead vocalist of a band called Heart Attack Man. Heart Attack Man is an American Rock band from Cleveland, Ohio.\r\n', 'Singer', 'American'),
(38, 'Robert', 'Downey Jr.', 'Male', 54, 'Twitter: https://twitter.com/RobertDowneyJr', 'Twitter: https://twitter.com/RobertDowneyJr', 'Posting: A few times a month\r\nFollowers: 14.6 million\r\nPosts: 618\r\nLikes: 1,299', 'Robert John Downey Jr. is an American actor, producer, and singer. His career has been characterized by critical and popular success in his youth, followed by a period of substance abuse and legal troubles, before a resurgence of commercial success in middle age.', 'Actor', 'American'),
(39, 'Matthew', 'Mercer', 'Male', 37, 'Twitter: https://twitter.com/matthewmercer', 'Twitter: https://twitter.com/matthewmercer', 'Posting: Every Day\r\nFollowers: 458 k\r\nPosts: 22.5 k\r\nLikes: 92.2 k', 'Matthew Christopher Miller, known professionally as Matthew Mercer, is an American voice actor, best known for his work in anime cartoons and video games.', 'Voice Actor', 'American'),
(40, 'Clayton', 'Huddleston', 'Male', 21, 'Instagram: https://www.instagram.com/nudah/?hl=en', 'Instagram: https://www.instagram.com/nudah/?hl=en', 'Posting: Every Other Day\r\nFollowers: 96.9 k\r\nPosts: 664', 'Clayton Huddleston is a YouTuber with over 5,000,000 subscribers. His channel is called Nudah. He is also the co-host of @dramaalert.', 'YouTuber', 'American'),
(41, 'James', 'Wilson', 'Male', 29, 'https://twitter.com/UberHaxorNova?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor \r\nyoutube: https://www.youtube.com/user/UberHaxorNova\r\ntwitch.tv: https://www.twitch.tv/uberhaxornova', 'https://twitter.com/UberHaxorNova?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor', 'Posting:daily\r\nnumber of followers:654k\r\nnumber of likes:1355\r\nnumber of posts:16.5k', 'James Richard Wilson Jr., also known by his screen name UberHaxorNova, is an American Streamer, YouTuber, and co-founder of the comedy and gaming channel, Cow Chop. He was a member of the Let\'s Play family and an affiliate with Rooster Teeth Productions.', 'Gaming Streamer', 'American'),
(42, 'Lewis', 'Hamilton', 'Male', 34, 'Twitter URL:\r\nhttps://twitter.com/lewishamilton\r\nInstagram URL :\r\nhttps://www.instagram.com/lewishamilton/\r\nFacebook URL :\r\nhttps://www.facebook.com/LewisHamilton/', 'https://www.instagram.com/lewishamilton/', 'Posting: Every 2 days\r\nNumber of followers: 13.7M\r\nTotal Num of Post: 693\r\nTotal Num of likes: 300000', 'Lewis Carl Davidson Hamilton MBE HonFREng is a British racing driver who races in Formula One for the Mercedes-AMG Petronas Formula One Team. A six-time Formula One World Champion, he is widely regarded as one of the greatest drivers in the history of the sport, and considered by some to be the greatest of all time.', 'Racing Driver', 'British, English'),
(43, 'Ray', 'Chase', 'Male', 32, 'Twitter URL:\r\nhttps://twitter.com/RayChase\r\nInstagram URL : instagram.com/raychasenation/?hl=en\r\nFacebook URL :', 'https://twitter.com/RayChase', 'Posting: Daily\r\nNumber of followers: 46.3k\r\nTotal Num of Post: N.A.\r\nTotal Num of likes: N.A.', 'Ray Chase is an American voice actor who has voiced in anime, animations, video games and audiobooks. His best known role is Noctis Lucis Caelum, the main character in Final Fantasy XV.', 'Voice Actor', 'American'),
(63, 'Julie', 'Tadrous', 'Female', 20, 'Instagram, Pinterest', 'Instagram', '6 hrs / day', 'Julie is a college student at IUPUI studying Informatics with a specialization in Web Design and Development.', 'Student 1', 'United States');

-- --------------------------------------------------------

--
-- Table structure for table `celebritydimension`
--

CREATE TABLE `celebritydimension` (
  `id` int(8) NOT NULL,
  `celeb_id` int(8) NOT NULL,
  `dim_id` int(8) NOT NULL,
  `frequency` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `celebritydimension`
--

INSERT INTO `celebritydimension` (`id`, `celeb_id`, `dim_id`, `frequency`) VALUES
(1, 1, 1, '1200.00'),
(2, 1, 2, '0.20'),
(3, 1, 3, '0.51'),
(4, 1, 4, '2.50'),
(5, 1, 5, '1.80'),
(6, 2, 1, '200.00'),
(7, 2, 2, '0.24'),
(8, 2, 3, '2.89'),
(9, 2, 4, '0.12'),
(10, 2, 5, '3.20'),
(11, 3, 1, '450.00'),
(12, 3, 2, '0.14'),
(13, 3, 3, '0.25'),
(14, 3, 4, '1.65'),
(15, 3, 5, '3.01'),
(16, 4, 1, '300.00'),
(17, 4, 2, '0.42'),
(18, 4, 3, '2.50'),
(19, 4, 4, '1.20'),
(20, 4, 5, '1.20'),
(21, 5, 1, '120.00'),
(22, 5, 2, '2.45'),
(23, 5, 3, '1.02'),
(24, 5, 4, '1.42'),
(25, 5, 5, '0.02'),
(26, 6, 1, '421.00'),
(27, 6, 2, '0.12'),
(28, 6, 3, '0.25'),
(29, 6, 4, '1.54'),
(30, 6, 5, '0.36'),
(31, 7, 1, '458.00'),
(32, 7, 2, '2.54'),
(33, 7, 3, '0.45'),
(34, 7, 4, '1.33'),
(35, 7, 5, '0.21'),
(36, 8, 1, '102.00'),
(37, 8, 2, '0.54'),
(38, 8, 3, '1.46'),
(39, 8, 4, '1.02'),
(40, 8, 5, '0.78'),
(41, 9, 1, '56.00'),
(42, 9, 2, '1.22'),
(43, 9, 3, '2.11'),
(44, 9, 4, '0.43'),
(45, 9, 5, '0.89'),
(46, 10, 1, '810.00'),
(47, 10, 2, '2.55'),
(48, 10, 3, '0.12'),
(49, 10, 4, '0.45'),
(50, 10, 5, '1.44');

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` int(8) NOT NULL,
  `user_id` int(8) NOT NULL,
  `celeb_id` int(8) NOT NULL,
  `like_value` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `personalitydimension`
--

CREATE TABLE `personalitydimension` (
  `dim_id` int(8) NOT NULL,
  `name` varchar(25) NOT NULL,
  `keywords` varchar(535) NOT NULL,
  `description` varchar(535) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personalitydimension`
--

INSERT INTO `personalitydimension` (`dim_id`, `name`, `keywords`, `description`) VALUES
(1, 'Extraversion', '# of posts and length of posts', 'Degree of activeness, sociability, and talkativeness'),
(2, 'Agreeableness', 'Thank you; love; kind; nice; cooperate, together', 'Personality traits such as cooperativeness, kindness and trust'),
(3, 'Conscientiousness', 'I am aware; proud, achieve, accomplish, success, know', 'Refers to the degree of achievement orientation. Being hardworking, organize and reliable is linked with high score'),
(4, 'Neuroticism', 'I, me, myself; mine, my, damn you, f word, so, I am the best, sad, happy, hate, hater', 'Indicates the emotional stability degree. People who have low degree of neuroticism are calm, secure and confident whereas the opposite anxious, insecure and moody'),
(5, 'Openness', 'Related with creative, cultural and intellectual interest', 'Related with creative, cultural and intellectual interest');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(8) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `role` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `username`, `password`, `email`, `role`) VALUES
(1, 'Admin', 'Coolpants', 'admin', 'password', 'admin@gmail.com', 1),
(2, 'Julie', 'Tadrous', 'jtadrous', 'dolls', 'jtadrous@iu.edu', 2),
(3, 'Jake', 'Miller', 'jakem', 'pineapple', 'jakem@gmail.com', 2),
(4, 'test', 'test', 'test', 'testt', 'test@gmail.com', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `celebrity`
--
ALTER TABLE `celebrity`
  ADD PRIMARY KEY (`celeb_id`);

--
-- Indexes for table `celebritydimension`
--
ALTER TABLE `celebritydimension`
  ADD PRIMARY KEY (`id`),
  ADD KEY `celeb_id` (`celeb_id`),
  ADD KEY `dim_id` (`dim_id`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `celeb_id` (`celeb_id`);

--
-- Indexes for table `personalitydimension`
--
ALTER TABLE `personalitydimension`
  ADD PRIMARY KEY (`dim_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `celebrity`
--
ALTER TABLE `celebrity`
  MODIFY `celeb_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `celebritydimension`
--
ALTER TABLE `celebritydimension`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personalitydimension`
--
ALTER TABLE `personalitydimension`
  MODIFY `dim_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `celebritydimension`
--
ALTER TABLE `celebritydimension`
  ADD CONSTRAINT `celebrity_to_ celebritydimension` FOREIGN KEY (`celeb_id`) REFERENCES `celebrity` (`celeb_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `celebritydimension_to_personalitydimension` FOREIGN KEY (`dim_id`) REFERENCES `personalitydimension` (`dim_id`) ON UPDATE CASCADE;

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_to_celebrity` FOREIGN KEY (`celeb_id`) REFERENCES `celebrity` (`celeb_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `favorites_to_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
