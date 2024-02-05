-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2023 at 01:15 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `login_users`
--

CREATE TABLE `login_users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_users`
--

INSERT INTO `login_users` (`id`, `username`, `password`) VALUES
(12, 'alwin', '$2y$10$8FSNU58NGDQ5qTkdQmlKvOSrsu82KuckGEt5IbFKLVKu6FPx8.JgW'),
(13, 'alwin', '$2y$10$0ejHGvJHpxnbvizpQha9suiLw66B.fheOSIGE57lfh9i./fA3n.Au'),
(14, 'alwin', '$2y$10$8svu3VClp3.f6xZmkPyhqOHN0p6CNsdQh8MK/cQl8EJhQtpm6artO'),
(15, 'kenneth', '$2y$10$51TAVy3U1vOBjSbbQEqL9u7UC9o4t..HPNEQTOH7e3HeZuo3SUcXm'),
(16, 'aldrin123', '$2y$10$ROJvWJ7kh87ONARCXjmki.0j1s/lON1bjbZhjo4R7rObWgVDbHLDO'),
(17, 'aldrin123', '$2y$10$8KZkMwEKR8GHnSxzfdhJpOiRxAGRRh3BxtCHCe3xeLWkJ.0DrZsjK');

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `picture_path` varchar(255) NOT NULL,
  `type` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `steps` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`id`, `title`, `picture_path`, `type`, `description`, `steps`) VALUES
(1, 'Sipo Egg(mix vegeta)', 'creamy-sipo-egg-6-1152x1536.jpg', 'on', ' Ingredients\n12 pieces quail eggs, hard-boiled and peeled\n1 tablespoon butter\n1 onion, peeled and chopped\n2 cloves garlic, peeled and minced\n1 tablespoon fish sauce\n2 large carrots, peeled and cut into ½-inch cubes\n1 large singkamas (jicama), peeled and cut into ½-inch cubes\n½ cup water or chicken stock\n1 cup frozen sweet peas, thawed\n1 cup table cream (all-purpose cream)\nsalt and pepper to taste\n\nInstructions\nIn a wide pan over medium heat, heat butter until melted. \nAdd onions and garlic and cook, stirring regularly, until softened.\nAdd fish sauce and continue to cook for about 1 minute.\nAdd carrots and jicama and stir to combine. \nAdd water or stock and bring to a boil. Continue to cook for about 7 to 10 minutes or until vegetables are tender yet crisp and liquid is reduced. \nAdd green peas and stir to combine.\nAdd cream and quail eggs. Season with salt and pepper to taste. \nContinue to simmer for about 2 to 3 minutes or until green peas and eggs are heated through, vegetables are tender-crisp, and sauce is slightly thickened. Serve hot.', ' Ingredients\r\n12 pieces quail eggs, hard-boiled and peeled\r\n1 tablespoon butter\r\n1 onion, peeled and chopped\r\n2 cloves garlic, peeled and minced\r\n1 tablespoon fish sauce\r\n2 large carrots, peeled and cut into ½-inch cubes\r\n1 large singkamas (jicama), peeled and cut into ½-inch cubes\r\n½ cup water or chicken stock\r\n1 cup frozen sweet peas, thawed\r\n1 cup table cream (all-purpose cream)\r\nsalt and pepper to taste\r\n\r\nInstructions\r\nIn a wide pan over medium heat, heat butter until melted. \r\nAdd onions and garlic and cook, stirring regularly, until softened.\r\nAdd fish sauce and continue to cook for about 1 minute.\r\nAdd carrots and jicama and stir to combine. \r\nAdd water or stock and bring to a boil. Continue to cook for about 7 to 10 minutes or until vegetables are tender yet crisp and liquid is reduced. \r\nAdd green peas and stir to combine.\r\nAdd cream and quail eggs. Season with salt and pepper to taste. \r\nContinue to simmer for about 2 to 3 minutes or until green peas and eggs are heated through, vegetables are tender-crisp, and sauce is slightly thickened. Serve hot.'),
(2, 'Sipo Egg(mix vegeta)', 'creamy-sipo-egg-6-1152x1536.jpg', 'on', ' Ingredients\r\n12 pieces quail eggs, hard-boiled and peeled\r\n1 tablespoon butter\r\n1 onion, peeled and chopped\r\n2 cloves garlic, peeled and minced\r\n1 tablespoon fish sauce\r\n2 large carrots, peeled and cut into ½-inch cubes\r\n1 large singkamas (jicama), peeled and cut into ½-inch cubes\r\n½ cup water or chicken stock\r\n1 cup frozen sweet peas, thawed\r\n1 cup table cream (all-purpose cream)\r\nsalt and pepper to taste\r\n\r\nInstructions\r\nIn a wide pan over medium heat, heat butter until melted. \r\nAdd onions and garlic and cook, stirring regularly, until softened.\r\nAdd fish sauce and continue to cook for about 1 minute.\r\nAdd carrots and jicama and stir to combine. \r\nAdd water or stock and bring to a boil. Continue to cook for about 7 to 10 minutes or until vegetables are tender yet crisp and liquid is reduced. \r\nAdd green peas and stir to combine.\r\nAdd cream and quail eggs. Season with salt and pepper to taste. \r\nContinue to simmer for about 2 to 3 minutes or until green peas and eggs are heated through, vegetables are tender-crisp, and sauce is slightly thickened. Serve hot.', ' Ingredients\r\n12 pieces quail eggs, hard-boiled and peeled\r\n1 tablespoon butter\r\n1 onion, peeled and chopped\r\n2 cloves garlic, peeled and minced\r\n1 tablespoon fish sauce\r\n2 large carrots, peeled and cut into ½-inch cubes\r\n1 large singkamas (jicama), peeled and cut into ½-inch cubes\r\n½ cup water or chicken stock\r\n1 cup frozen sweet peas, thawed\r\n1 cup table cream (all-purpose cream)\r\nsalt and pepper to taste\r\n\r\nInstructions\r\nIn a wide pan over medium heat, heat butter until melted. \r\nAdd onions and garlic and cook, stirring regularly, until softened.\r\nAdd fish sauce and continue to cook for about 1 minute.\r\nAdd carrots and jicama and stir to combine. \r\nAdd water or stock and bring to a boil. Continue to cook for about 7 to 10 minutes or until vegetables are tender yet crisp and liquid is reduced. \r\nAdd green peas and stir to combine.\r\nAdd cream and quail eggs. Season with salt and pepper to taste. \r\nContinue to simmer for about 2 to 3 minutes or until green peas and eggs are heated through, vegetables are tender-crisp, and sauce is slightly thickened. Serve hot.'),
(3, 'Sipo Egg(mix vegeta)', 'creamy-sipo-egg-6-1152x1536.jpg', 'on', ' Ingredients\n12 pieces quail eggs, hard-boiled and peeled\n1 tablespoon butter\n1 onion, peeled and chopped\n2 cloves garlic, peeled and minced\n1 tablespoon fish sauce\n2 large carrots, peeled and cut into ½-inch cubes\n1 large singkamas (jicama), peeled and cut into ½-inch cubes\n½ cup water or chicken stock\n1 cup frozen sweet peas, thawed\n1 cup table cream (all-purpose cream)\nsalt and pepper to taste\n\nInstructions\nIn a wide pan over medium heat, heat butter until melted. \nAdd onions and garlic and cook, stirring regularly, until softened.\nAdd fish sauce and continue to cook for about 1 minute.\nAdd carrots and jicama and stir to combine. \nAdd water or stock and bring to a boil. Continue to cook for about 7 to 10 minutes or until vegetables are tender yet crisp and liquid is reduced. \nAdd green peas and stir to combine.\nAdd cream and quail eggs. Season with salt and pepper to taste. \nContinue to simmer for about 2 to 3 minutes or until green peas and eggs are heated through, vegetables are tender-crisp, and sauce is slightly thickened. Serve hot.', ' Ingredients\r\n12 pieces quail eggs, hard-boiled and peeled\r\n1 tablespoon butter\r\n1 onion, peeled and chopped\r\n2 cloves garlic, peeled and minced\r\n1 tablespoon fish sauce\r\n2 large carrots, peeled and cut into ½-inch cubes\r\n1 large singkamas (jicama), peeled and cut into ½-inch cubes\r\n½ cup water or chicken stock\r\n1 cup frozen sweet peas, thawed\r\n1 cup table cream (all-purpose cream)\r\nsalt and pepper to taste\r\n\r\nInstructions\r\nIn a wide pan over medium heat, heat butter until melted. \r\nAdd onions and garlic and cook, stirring regularly, until softened.\r\nAdd fish sauce and continue to cook for about 1 minute.\r\nAdd carrots and jicama and stir to combine. \r\nAdd water or stock and bring to a boil. Continue to cook for about 7 to 10 minutes or until vegetables are tender yet crisp and liquid is reduced. \r\nAdd green peas and stir to combine.\r\nAdd cream and quail eggs. Season with salt and pepper to taste. \r\nContinue to simmer for about 2 to 3 minutes or until green peas and eggs are heated through, vegetables are tender-crisp, and sauce is slightly thickened. Serve hot.'),
(4, 'Sipo Egg(mix vegeta)', 'creamy-sipo-egg-6-1152x1536.jpg', 'on', ' Ingredients\r\n12 pieces quail eggs, hard-boiled and peeled\r\n1 tablespoon butter\r\n1 onion, peeled and chopped\r\n2 cloves garlic, peeled and minced\r\n1 tablespoon fish sauce\r\n2 large carrots, peeled and cut into ½-inch cubes\r\n1 large singkamas (jicama), peeled and cut into ½-inch cubes\r\n½ cup water or chicken stock\r\n1 cup frozen sweet peas, thawed\r\n1 cup table cream (all-purpose cream)\r\nsalt and pepper to taste\r\n\r\nInstructions\r\nIn a wide pan over medium heat, heat butter until melted. \r\nAdd onions and garlic and cook, stirring regularly, until softened.\r\nAdd fish sauce and continue to cook for about 1 minute.\r\nAdd carrots and jicama and stir to combine. \r\nAdd water or stock and bring to a boil. Continue to cook for about 7 to 10 minutes or until vegetables are tender yet crisp and liquid is reduced. \r\nAdd green peas and stir to combine.\r\nAdd cream and quail eggs. Season with salt and pepper to taste. \r\nContinue to simmer for about 2 to 3 minutes or until green peas and eggs are heated through, vegetables are tender-crisp, and sauce is slightly thickened. Serve hot.', ' Ingredients\r\n12 pieces quail eggs, hard-boiled and peeled\r\n1 tablespoon butter\r\n1 onion, peeled and chopped\r\n2 cloves garlic, peeled and minced\r\n1 tablespoon fish sauce\r\n2 large carrots, peeled and cut into ½-inch cubes\r\n1 large singkamas (jicama), peeled and cut into ½-inch cubes\r\n½ cup water or chicken stock\r\n1 cup frozen sweet peas, thawed\r\n1 cup table cream (all-purpose cream)\r\nsalt and pepper to taste\r\n\r\nInstructions\r\nIn a wide pan over medium heat, heat butter until melted. \r\nAdd onions and garlic and cook, stirring regularly, until softened.\r\nAdd fish sauce and continue to cook for about 1 minute.\r\nAdd carrots and jicama and stir to combine. \r\nAdd water or stock and bring to a boil. Continue to cook for about 7 to 10 minutes or until vegetables are tender yet crisp and liquid is reduced. \r\nAdd green peas and stir to combine.\r\nAdd cream and quail eggs. Season with salt and pepper to taste. \r\nContinue to simmer for about 2 to 3 minutes or until green peas and eggs are heated through, vegetables are tender-crisp, and sauce is slightly thickened. Serve hot.'),
(5, 'Bistek Tagaloggggggg', 'bistek-tagalog-3-730x973.jpg', 'on', ' Ingredients\r\n2 pounds top round or sirloin, sliced thinly\r\n2 lemons, juiced (about ¼ cup juice)\r\n¼ cup soy sauce\r\n1 onion, peeled and sliced thinly\r\n1 head garlic, peeled and minced\r\n¼ teaspoon pepper\r\n3 tablespoons canola oil\r\n1 cup water\r\nsalt to taste\r\n1 onion, peeled and sliced into rings\r\n\r\nInstructions\r\nIn a bowl, combine beef, lemon juice, soy sauce, sliced onions, garlic, and pepper. Massage marinade into the meat and marinate for about 30 minutes. \r\nRemove meat, onions, and garlic from marinade, squeezing and reserving excess liquid.\r\nIn a pan over high heat, heat oil. Add beef and cook for about 3 to 5 minutes per side or until lightly browned. Spoon out and reserve released meat juices during frying. Remove meat.\r\nIn the pan,  add onions and garlic, and cook, stirring regularly, until softened. Return browned beef to pan.\r\nAdd reserved marinade and meat juices. Add water and bring to a boil. \r\nCover, lower heat, and simmer for about 40 to 50 minutes or until meat is fork-tender and liquid is reduced. Season with salt to taste. \r\nTurn off heat. Garnish with onion rings, if desired, and cover to allow onions to cook slightly in the steam. Serve hot.', ' Ingredients\r\n2 pounds top round or sirloin, sliced thinly\r\n2 lemons, juiced (about ¼ cup juice)\r\n¼ cup soy sauce\r\n1 onion, peeled and sliced thinly\r\n1 head garlic, peeled and minced\r\n¼ teaspoon pepper\r\n3 tablespoons canola oil\r\n1 cup water\r\nsalt to taste\r\n1 onion, peeled and sliced into rings\r\n\r\nInstructions\r\nIn a bowl, combine beef, lemon juice, soy sauce, sliced onions, garlic, and pepper. Massage marinade into the meat and marinate for about 30 minutes. \r\nRemove meat, onions, and garlic from marinade, squeezing and reserving excess liquid.\r\nIn a pan over high heat, heat oil. Add beef and cook for about 3 to 5 minutes per side or until lightly browned. Spoon out and reserve released meat juices during frying. Remove meat.\r\nIn the pan,  add onions and garlic, and cook, stirring regularly, until softened. Return browned beef to pan.\r\nAdd reserved marinade and meat juices. Add water and bring to a boil. \r\nCover, lower heat, and simmer for about 40 to 50 minutes or until meat is fork-tender and liquid is reduced. Season with salt to taste. \r\nTurn off heat. Garnish with onion rings, if desired, and cover to allow onions to cook slightly in the steam. Serve hot.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(6, 'kurt123', '$2y$10$JApQVpeBHz0Pkwj0qLAruukkG0cAiAF7Z0iU1tltsFQsj279loWHa'),
(8, 'aldrin', '$2y$10$qZ4ONvkNw7mkjQJ9dbOw0eWDxjQORaJN1V1lM2pGSLkKlt1aUq52W'),
(9, 'alwin', '$2y$10$9UP/eqkUGtsTH6XHvMhhW.SFP2oHSfLJTMHhlgkV.Y6JCTyaYNjSe'),
(10, 'kenneth', '$2y$10$Dc.OKJErcvKTU0vcvliVquB9E4uWUnlE1e7wTCu2Hb/Urssd6Hw4y'),
(11, 'aldrin123', '$2y$10$5w/Loc2pfok1t1bjm5FbdOGL9TFYtwTB2VRDGd.3wVOH/HhVN1vZe'),
(12, 'kenneth', '$2y$10$s1auHn4SXffScOH9PPs5xurvF3q4COpIaFXmZihR6AdpM/2o43Chq'),
(13, 'kenneth123', '$2y$10$CuK2st.OqszYHEN/Tndmxu362sHIsLruSRkfKQe4HdtRKP29IAwMW'),
(14, 'fechalinaldrin1000@gmail.com', '$2y$10$g.EKpB4V/gm0Cx6UB97yDOtfjcRAF2rvHWJfOvfbopkrTJk4WLHjm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login_users`
--
ALTER TABLE `login_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login_users`
--
ALTER TABLE `login_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
