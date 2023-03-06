-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2023 at 08:17 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `waleedshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `year` year(4) NOT NULL,
  `description` text NOT NULL,
  `cover` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `user_id`, `title`, `author`, `year`, `description`, `cover`) VALUES
(23, 4, 'A Court of Mist and Fury (A Court of Thorns and Roses)', ' Sarah J. Maas and Meric Keles', 2016, 'Though Feyre now has the powers of the High Fae, her heart remains human, but as she navigates the feared Night Court\'s dark web of politics, passion, and dazzling power, a greater evil looms--and she might be key to stopping it.', '8587804-L.png'),
(24, 4, 'In Cold Blood', 'Truman Capote', 1994, '\"On November 15, 1959, in the small town of Holcomb, Kansas, four members of the Clutter family were savagely murdered by blasts from a shotgun held a few inches from their faces. There was no apparent motive for the crime, and there were almost no clues.\"\r\nQuote from the back of the book.', '420662-L.jpg'),
(25, 4, 'Jurassic Park', 'Michael Crichton', 1993, 'An astonishing technique for recovering and cloning dinosaur DNA has been discovered. Now humankind’s most thrilling fantasies have come true. Creatures extinct for eons roam Jurassic Park with their awesome presence and profound mystery, and all the world can visit them—for a price. Until something goes wrong. ', '12008002-L.png'),
(26, 4, 'Harry Potter and the Deathly Hallows', 'J. K. Rowling', 2010, 'It\'s no longer safe for Harry at Hogwarts, so he and his best friends, Ron and Hermione, are on the run. Professor Dumbledore has given them clues about what they need to do to defeat the dark wizard, Lord Voldemort, once and for all, but it\'s up to them to figure out what these hints and suggestions really mean. Their cross-country odyssey has them searching desperately for the answers, while evading capture or death at every turn. At the same time, their friendship, fortitude, and sense of right and wrong are tested in ways they never could have imagined. The ultimate battle between good and evil that closes out this final chapter of the epic series takes place where Harry\'s Wizarding life began: at Hogwarts. The satisfying conclusion offers shocking last-minute twists, incredible acts of courage, powerful new forms of magic, and the resolution of many mysteries. Above all, this intense, cathartic book serves as a clear statement of the message at the heart of the Harry Potter series: that choice matters much more than destiny, and that love will always triumph over death.', '12001885-L.png'),
(27, 13, 'A Game of Thrones', 'George R. R. Martin', 2002, 'Here is the first volume in George R. R. Martin’s magnificent cycle of novels that includes A Clash of Kings and A Storm of Swords. As a whole, this series comprises a genuine masterpiece of modern fantasy, bringing together the best the genre has to offer. Magic, mystery, intrigue, romance, and adventure fill these pages and transport us to a world unlike any we have ever experienced. Already hailed as a classic, George R. R. Martin’s stunning series is destined to stand as one of the great achievements of imaginative fiction.\r\n\r\nA GAME OF THRONES\r\n\r\nLong ago, in a time forgotten, a preternatural event threw the seasons out of balance. In a land where summers can last decades and winters a lifetime, trouble is brewing. The cold is returning, and in the frozen wastes to the north of Winterfell, sinister and supernatural forces are massing beyond the kingdom’s protective Wall. At the center of the conflict lie the Starks of Winterfell, a family as harsh and unyielding as the land they were born to. Sweeping from a land of brutal cold to a distant summertime kingdom of epicurean plenty, here is a tale of lords and ladies, soldiers and sorcerers, assassins and bastards, who come together in a time of grim omens.\r\n\r\nHere an enigmatic band of warriors bear swords of no human metal; a tribe of fierce wildlings carry men off into madness; a cruel young dragon prince barters his sister to win back his throne; and a determined woman undertakes the most treacherous of journeys. Amid plots and counterplots, tragedy and betrayal, victory and terror, the fate of the Starks, their allies, and their enemies hangs perilously in the balance, as each endeavors to win that deadliest of conflicts: the game of thrones.', '11291394-L.png'),
(28, 13, 'Think Like a Monk', 'Jay Shetty', 2020, 'Jay Shetty, social media superstar and host of the #1 podcast On Purpose, distills the timeless wisdom he learned as a monk into practical steps\r\n\r\nWhen you think like a monk, you’ll understand:\r\n\r\nHow to overcome negativity\r\nHow to stop overthinking\r\nWhy comparison kills love\r\nHow to use your fear\r\nWhy you can’t find happiness by looking for it\r\nHow to learn from everyone you meet\r\nWhy you are not your thoughts\r\nHow to find your purpose\r\nWhy kindness is crucial to success\r\nAnd much more...\r\nShetty grew up in a family where you could become one of three things—a doctor, a lawyer, or a failure. His family was convinced he had chosen option three: instead of attending his college graduation ceremony, he headed to India to become a monk, to meditate every day for four to eight hours, and devote his life to helping others. After three years, one of his teachers told him that he would have more impact on the world if he left the monk’s path to share his experience and wisdom with others. Heavily in debt, and with no recognizable skills on his résumé, he moved back home in north London with his parents.\r\n\r\nShetty reconnected with old school friends—many working for some of the world’s largest corporations—who were experiencing tremendous stress, pressure, and unhappiness, and they invited Shetty to coach them on well-being, purpose, and mindfulness. Since then, Shetty has become one of the world’s most popular influencers. *In 2017, he was named in the Forbes magazine 30-under-30 for being a game-changer in the world of media. In 2018, he had the #1 video on Facebook with over 360 million views. His social media following totals over 38 million, he has produced over 400 viral videos which have amassed more than 8 billion views, and his podcast, On Purpose, is consistently ranked the world’s #1 Health and Wellness podcast.\r\n\r\nIn this inspiring, empowering book, Shetty draws on his time as a monk to show us how we can clear the roadblocks to our potential and power. Combining ancient wisdom and his own rich experiences in the ashram, Think Like a Monk reveals how to overcome negative thoughts and habits, and access the calm and purpose that lie within all of us. He transforms abstract lessons into advice and exercises we can all apply to reduce stress, improve relationships, and give the gifts we find in ourselves to the world. Shetty proves that everyone can—and should—think like a monk.', '10476383-L.png'),
(29, 13, 'The Psychology of Money', 'Morgan Housel', 2020, 'Timeless lessons on wealth, greed, and happiness doing well with money isn’t necessarily about what you know. It’s about how you behave. And behavior is hard to teach, even to really smart people. How to manage money, invest it, and make business decisions are typically considered to involve a lot of mathematical calculations, where data and formulae tell us exactly what to do. But in the real world, people don’t make financial decisions on a spreadsheet. They make them at the dinner table, or in a meeting room, where personal history, your unique view of the world, ego, pride, marketing, and odd incentives are scrambled together. In the psychology of money, the author shares 19 short stories exploring the strange ways people think about money and teaches you how to make better sense of one of life’s most important matters.', '12824425-L.png'),
(30, 13, 'A Little Life', ' Hanya Yanagihara', 2015, 'When four classmates from a small Massachusetts college move to New York to make their way, they\'re broke, adrift, and buoyed only by their friendship and ambition. There is kind, handsome Willem, an aspiring actor; JB, a quick-witted, sometimes cruel Brooklyn-born painter seeking entry to the art world; Malcolm, a frustrated architect at a prominent firm; and withdrawn, brilliant, enigmatic Jude, who serves as their center of gravity. Over the decades, their relationships deepen and darken, tinged by addiction, success, and pride. Yet their greatest challenge, each comes to realize, is Jude himself, by midlife a terrifyingly talented litigator yet an increasingly broken man, his mind and body scarred by an unspeakable childhood, and haunted by what he fears is a degree of trauma that he’ll not only be unable to overcome—but that will define his life forever.\r\n\r\nIn rich and resplendent prose, Hanya Yanagihara has fashioned a tragic and transcendent hymn to brotherly love, a masterful depiction of heartbreak, and a dark examination of the tyranny of memory and the limits of human endurance.', '12065783-L.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
