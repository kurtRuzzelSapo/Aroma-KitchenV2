-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2024 at 02:25 PM
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'admin@gmail.com', '$2y$10$.cEv9VQwZlTQVfObp16SXeGjjTPhI7PKAnfegVcDx5nxL1uhlHDqa');

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `category` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `steps` text NOT NULL,
  `url_dish` varchar(10000) NOT NULL,
  `creator` varchar(100) NOT NULL,
  `user_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`id`, `title`, `category`, `description`, `steps`, `url_dish`, `creator`, `user_id`) VALUES
(46, 'Chicken Adobo', 'Lunch', 'This is a recipe post for Filipino Pork Adobo. It is a dish composed of pork slices cooked in soy sauce, vinegar, and garlic. There are version wherein onions are also added. Adobo is a popular dish in the Philippines, along with Sinigang. Adobo, in general, can be cooked using different kinds of protein. Chicken…', ' Marinate The Pork Belly In Soy Sauce And Crushed Garlic\r\nThe first thing to do is marinate the pork belly in soy sauce and crushed garlic. It is best to marinate it overnight. If time is limited, one hour should be enough. Some like to add vinegar during the process. You may do so if preferred.\r\n\r\nBrown The Marinated Pork\r\nDrain the marinade. Save it for later. The marinated pork needs to be browned. Heat a cooking pot. Add pork with garlic. You can also add a few tablespoons of cooking oil. Cook the pork until it turns brown.\r\n\r\nPour Water And Add The Spices\r\nCook the pork until tender. Do this by pouring the remaining marinade, if any. Also add water. Let the liquid boil.\r\n\r\nThis is the part where I put the whole peppercorn and dried bay leaves. These ingredients complete my pork adobo. Boiling for 40 minutes should be enough to tenderize the pork. There are times when you have to cook longer.\r\n\r\nAdd The Vinegar\r\nIf you have not added the vinegar as part of the marinade, pour it into the pot and let it cook for 10 minutes. Salt is an optional ingredient for this recipe. Use it only if you think it is needed.\r\n\r\nSeason\r\nTaste the sauce first so that you know what seasonings to add. Since we already added a good amount of soy sauce, salt might not be needed. However, this depends on your preference. You can also add more water here if you think that then saltiness is on the upper side. Sometimes I also add a dash of sugar to balance the flavor.', 'IMG-65d490810dc862.93259175.jpg', '', '0'),
(47, 'Fried chicken', 'Lunch', ' Indulge your taste buds with the crispy perfection of our golden-brown Fried Chicken. A mouthwatering harmony of seasoned succulent chicken, coated in a crunchy, flavorful crust that delivers a satisfying crunch with every bite. This classic comfort food is a beloved favorite, bringing together the simplicity of ingredients with the irresistible allure of perfectly fried goodness. Elevate your home-cooking experience with our easy-to-follow recipe, and savor the joy of creating a delicious, crispy masterpiece that will have everyone coming back for seconds', ' Cut the whole chickens into 4 breasts, 4 thighs, 4 legs and 4 wings and set aside.\r\nPreheat your oil, in either a heavy pan on the stove or a deep-fryer, to 325 degrees F.\r\nIn a large bowl, combine the flour, salt, black pepper, garlic powder, onion powder and cayenne pepper until thoroughly mixed. Set aside.\r\nPour the buttermilk into another bowl large enough for the chicken to be immersed in the buttermilk.\r\nPrepare your dredging station. Place your chicken in a bowl. Next to that, your bowl of buttermilk, and next to that, your dry mixture.\r\nTake your breasts, lightly dust them with your flour mixture, then dip them in the buttermilk until they are coated, and then place them in the flour mixture.\r\nTake the breasts that are in the flour mixture and aggressively push the flour mixture into the wet chicken. Make sure that the chicken in very thoroughly coated, or you will not achieve the crust and crunch you are looking for. Gently place the breasts in your hot oil.\r\nNext, repeat the dredging steps with your other pieces of chicken in this order: thigh, leg then wing.\r\nWhen you place the last wing into the fryer, you should have 16 pieces of chicken in the oil. Set a timer for 15 minutes.\r\nAfter 15 minutes, take a probe thermometer and check the temperature of a breast. If it reads 180 degrees F, all of your chicken is done. (Keep in mind that it will continue to cook after it has been removed from the fryer.)\r\nRemove the chicken from the oil and let it drain for 5 minutes. Let cool for an additional 10 minutes before serving', 'IMG-65d4a7ecec49a1.55061702.jpg', '', '0'),
(48, 'Herb Chaffle', 'Breakfast', 'A chaffle is a low-carb, cheese-and-egg-based waffle that\'s taken the keto world by storm, thanks to its fluffy texture and crispy edges. We opted to use Cheddar for the cheese and added scallions and parsley for a sweet and savory twist on the popular dish. For the fluffiest chaffle, use only finely shredded cheese––it will blend better with the egg than large shreds', ' Preheat a waffle iron to medium-high. Whisk the eggs in a large bowl until well beaten and smooth. Whisk in the Cheddar, scallions, parsley, 1/4 teaspoon salt and a few grinds of pepper.\r\nCoat the waffle iron with nonstick cooking spray, then ladle a heaping 1/4 cup of batter into each section. Close the lid and cook until well browned and fluffy, 4 to 5 minutes. Use a small offset spatula or tongs to transfer the chaffles to a serving plate. Repeat with the remaining batter. \r\nTop each chaffle with a pat of butter and drizzle with maple syrup.  ', 'IMG-65d4b25f54fc30.46479231.jpeg', '', '0'),
(50, 'Icecream', 'Dinner', 'This chocolate ice cream is a rich, custard-style ice cream flavored with semisweet chocolate and cocoa powder.', ' Place the cocoa powder along with 1 cup of the half-and-half into a medium saucepan over medium heat and whisk to combine. Add the remaining half-and-half and the heavy cream. Bring the mixture just to a simmer, stirring occasionally, and remove from the heat.\r\nIn a medium mixing bowl whisk the egg yolks until they lighten in color. Gradually add the sugar and whisk to combine. Temper the cream mixture into the eggs and sugar by gradually adding small amounts, until about 1/3 of the cream mixture has been added. Pour in the remainder and return the entire mixture to the saucepan and place over low heat. Continue to cook, stirring frequently, until the mixture thickens slightly and coats the back of a spoon and reaches 170 to 175 degrees F. Pour the mixture into a container and allow to sit at room temperature for 30 minutes. Stir in the vanilla extract. Place the mixture into the refrigerator and once it is cool enough not to form condensation on the lid, cover and store for 4 to 8 hours or until the temperature reaches 40 degrees F or below.\r\nPour into an ice cream maker and process according to the manufacturer\'s directions. This should take approximately 25 to 35 minutes. Serve as is for soft serve or freeze for another 3 to 4 hours to allow the ice cream to harden.', 'IMG-65d4c4d5da90a6.49556912.jpg', '', '0'),
(52, 'Sinigang', 'Lunch', ' Sinigang is a sour soup native to the Philippines. This recipe uses pork as the main ingredient. Other proteins and seafood can also be used. Beef, shrimp, fish are commonly used to cook sinigang.', ' Heat the pot and put-in the cooking oil\r\nSauté the onion until its layers separate from each other\r\nAdd the pork belly and cook until outer part turns light brown\r\nPut-in the fish sauce and mix with the ingredients\r\nPour the water and bring to a boil\r\nAdd the taro and tomatoes then simmer for 40 minutes or until pork is tender\r\nPut-in the sinigang mix and chili\r\nAdd the string beans (and other vegetables if there are any) and simmer for 5 to 8 minutes\r\nPut-in the spinach, turn off the heat, and cover the pot. Let the spinach cook using the remaining heat in the pot.\r\nServe hot. Share and enjoy!', 'IMG-65da4841b94041.17476088.png', '', '0'),
(58, 'Graham Mango', 'Lunch', ' I would describe this dessert as a big hit during fiesta celebration. I always make this on special occasion. It’s an easy recipe and most of all you don’t even need to bake. Although I love baking but it’s nice to have a quick and easy recipe. Most of all, this is a refreshing dessert for the whole family.', ' In a rectangular dish, arrange 8 to 10 pieces of graham crackers. Set aside.\r\nIn a bowl, combine the cream/cool whip and condensed milk. (Mix well)\r\nThen on the layered crackers on the bottom, spread the milk and cream mixture.\r\nThen spread out the thin sliced mangoes evenly on top of the cream.\r\nMake another layer of graham crackers; spread the cream and mango slices. (You can do lots of layers if you want)\r\nGarnish top layer with mango and sprinkle the crushed graham.\r\nChill for at least 3 hours before serving.', 'IMG-65daf8a110a322.20875151.jpg', 'Kurt Ruzzel', '28'),
(65, 'gdfgdf', 'Breakfast', ' gdfg', ' gdfgd', 'IMG-65dcb2e1bae699.33366818.png', 'gdfg', '16');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `recipe_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `user_id`, `recipe_id`, `rating`, `comment`) VALUES
(1, 28, 50, 3, 'wew'),
(2, 28, 52, 1, 'ewewwewew'),
(3, 28, 52, 5, 'It was good'),
(4, 28, 52, 1, 'lol'),
(5, 28, 52, 1, 'dsdas');

-- --------------------------------------------------------

--
-- Table structure for table `savedrecipe`
--

CREATE TABLE `savedrecipe` (
  `user_id` int(50) NOT NULL,
  `recipe_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `savedrecipe`
--

INSERT INTO `savedrecipe` (`user_id`, `recipe_id`) VALUES
(28, 52),
(26, 60),
(26, 48);

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
(16, 'kurt123@gmail.com', '$2y$10$IJbInmQQHc.WKfy5R52xZOZ7sndWeNB87zHxjrm.5vmqYc2Ejs0oC'),
(18, 'ruzzel@gmail.com', '$2y$10$ZD5R14ntB7QK2lNH9FCggOd.KknG4XawHGMjtlpeCeqIzdtdp5ESW'),
(19, 'kenneth@gmail.com', '$2y$10$oVUrhMYW1FNfTW96auF.OOs8uTPPkWz9WfEqQI.nYHaNRwQiViebi'),
(20, 'ruzzel@gmail.com', '$2y$10$.X7eVbcOkuhUYl9Z36GgpOjrZvGePfjJvKESmP/snOJMO0fleZaQK'),
(25, 'ruzz@gmail.com', '$2y$10$i/uNxwQoveAAoJhhomBIk.yV/vSYKitBlT3BfUYfhtNLlL0/mWabi'),
(26, 'juan@gmail.com', '$2y$10$a6nX9EgXxa6u/aZ0O9F0q.XfKVNXeWRi.82TQXb4raoLpo.KOA5Pa'),
(27, 'turon@gmail.com', '$2y$10$pKhoCO04OTi3Qsv3FqKw9ui41MESe/eumihdirXoNgAzStKB4zKwK'),
(28, 'lol@gmail.com', '$2y$10$So/hIEcl5l/SbWGdi0./Dum.sL6zyzCjap9c0EbCRRv9mEHFzjbDS'),
(29, 'kayezelds@gmail.com', '$2y$10$Zn3KjezLKK2UNPpEZSCQOehwMHeyUsUDDBVFbYpU0SACOxj4ugDYS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `recipe_id` (`recipe_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
