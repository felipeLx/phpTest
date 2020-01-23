CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `contacts`
  ADD PRIMARY KEY NOT NULL AUTO_INCREMENT (`id`),
  ADD UNIQUE KEY `name` (`phone`),
  ADD UNIQUE KEY `phone` (`phone`);

  INSERT INTO `contacts` (`id`, `name`, `phone`) VALUES
(1, 'Jean-Luc Picard', '(11)12345-6789'),
(2, 'Data', '(21)98765-4321'),
(3, 'Hugh', '(23)99999-9999'),
(4, 'Deanna Troi', '(18)11111-1111'),
(5, 'William Riker', '(11)55555-5555');