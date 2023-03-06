CREATE TABLE `users`
(
  `id` int
(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `email` varchar
(255) NOT NULL UNIQUE,
    `password` varchar
(255) NOT NULL,
    `name` varchar
(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
