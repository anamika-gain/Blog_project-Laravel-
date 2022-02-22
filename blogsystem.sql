-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2021 at 02:07 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Health And Beauty', 'health-and-beauty', '2021-07-31 12:19:30', '2021-07-31 12:19:30'),
(2, 'Children\'s Health', 'childrens-health', '2021-08-01 03:51:11', '2021-08-01 03:51:11'),
(3, 'Women\'s Health', 'womens-health', '2021-08-01 03:51:30', '2021-08-01 03:51:30'),
(4, 'Men\'s Health', 'mens-health', '2021-08-01 03:51:46', '2021-08-01 03:51:46'),
(5, 'Mind & Mood', 'mind-mood', '2021-08-01 03:52:02', '2021-08-01 03:52:02'),
(6, 'Exercise & Fitness', 'exercise-fitness', '2021-08-01 03:52:47', '2021-08-01 03:52:47');

-- --------------------------------------------------------

--
-- Table structure for table `category_post`
--

CREATE TABLE `category_post` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_post`
--

INSERT INTO `category_post` (`id`, `post_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2021-07-31 12:20:04', '2021-07-31 12:20:04'),
(2, 2, 1, '2021-08-01 00:36:05', '2021-08-01 00:36:05'),
(3, 3, 1, '2021-08-01 07:34:02', '2021-08-01 07:34:02');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `user_id`, `comment`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 'hfascdhb', '2021-07-31 12:20:34', '2021-07-31 12:20:34');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2021_03_14_130509_create_roles_table', 1),
(4, '2021_03_17_122820_create_tags_table', 1),
(5, '2021_03_18_062354_create_categories_table', 1),
(6, '2021_03_18_063850_create_posts_table', 1),
(7, '2021_03_18_064132_create_category_post_table', 1),
(8, '2021_03_18_064226_create_post_tag_table', 1),
(9, '2021_03_19_183901_create_subscribers_table', 1),
(10, '2021_03_20_181005_create_comments_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `view_count` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `is_approved` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `slug`, `image`, `body`, `view_count`, `status`, `is_approved`, `created_at`, `updated_at`) VALUES
(1, 2, 'Creamy BBQ Chicken Salad', 'creamy-bbq-chicken-salad', 'image/Capjture.PNG', 'ryhdryhdryhdryhdryhdryhdryhdkiiiiiiiiiujhnkj', 0, 1, 1, '2021-07-31 12:20:04', '2021-07-31 12:20:04'),
(2, 2, 'HOW TO PROPERLY APPLY YOUR SKINCARE', 'how-to-properly-apply-your-skincare', 'image/Captfure.PNG', 'It’s not unusual for women to feel down or depressed after giving birth, but if the feelings persist or become debilitating, it’s cause for concern. Many of the symptoms overlap between postpartum depression and postpartum anxiety, but some women do not respond as well to some treatments for depression, so it’s important to establish the correct diagnosis.It’s common for doctors to prescribe opioid pain medications for their patients after surgery; however, prescribing large numbers of pills increases the possibility of dependence and overdose. Writing prescriptions for smaller quantities of pills while still monitoring people\'s pain is one way to reduce the likelihood that a person develops a problem.', 0, 1, 1, '2021-08-01 00:36:05', '2021-08-01 00:36:05'),
(3, 2, 'Food And Tea Pairings Guide: WHAT FOODS GO WELL WITH GREEN TEA?', 'food-and-tea-pairings-guide-what-foods-go-well-with-green-tea', 'image/Captfgture.PNG', 'Drinking tea is a lifestyle that many people enjoy. Green tea, in particular, is very popular among tea drinkers, and it’s one of the best teas you can have.\r\n\r\nBy pairing green tea with food, you’ll enhance both the flavor of the green tea and the meal. Even though green tea can be consumed with anything, it is better you don’t pair it with heavy meals.\r\n\r\nThis is because green tea could overpower the taste of the meal, which isn’t the idea you’re after. For this reason, it is best suited to subtly flavored foods. In this post, we’ll explore the different foods you can pair with green tea for the best results:\r\n\r\nSeafood \r\nGreen tea and seafood is arguably the best pairing you can ever have. Since most green teas, especially in Japan, are usually steamed, they have a vegetable flavor that blends well with seafood providing you with one of the best flavors you can get.\r\n\r\nGreen teas, especially sencha green tea, when combined with seafood, leave a bitter and grassy aftertaste that will have you coming back for more.\r\n\r\nChocolate-Based Desserts \r\nAnother great pairing you might want to try is green tea and chocolate-based dessert. This is because chocolate majorly contains cocoa which provides a bitter taste. When you go for dark chocolate, you get an even intense bitter taste.\r\n\r\nBy pairing green tea with chocolate-based desserts, you’ll get to harmonize both flavors because the sweetness of the tea will complement the bitterness of the desert.\r\n\r\nHowever, if you’re all about sweet chocolates such as milk chocolate, vegetable green tea is the best option for you if you want a great pairing. This is because the slight bitterness of the vegetable green tea is bound to enhance the sweetness of the milk chocolate.\r\n\r\n\r\nPizza With Vegetable Toppings \r\nIf you’d like to pair green tea with a pizza, it’s only right you go for one with vegetable toppings. Also, smoky green teas are the best ones to try with the pizza.\r\n\r\nThis is because the strong flavor of your smoky green tea will blend well with the vegetable toppings giving you a great mouthful of flavor.\r\n\r\nBarbecue Dinner \r\nIn most barbecue parties, you find that beer is the common beverage. However, green tea can be a great substitute for beer the next time you’re hosting a barbecue party.\r\n\r\nIf you’re trying to quit drinking or you don’t drink completely, green tea can be a great alternative for you to pair with that barbecue dinner. Gunpowder green tea is the ideal tea you want to have with those mouthwatering barbecue foods. Visit this website to find out how you can prepare the best gunpowder green tea. This is because the smoky flavor contained in the gunpowder green tea compliments the smoky flavors of the barbecues more than any other tea can.\r\n\r\nPan-Fried Chicken \r\nIf you’re a pan-fried chicken lover, then it might interest you to know that it pairs well with green tea. This is because the smoky green tea flavor helps cover that greasy taste you feel every time you have pan-fried chicken.\r\n\r\nThis best explains why you’ll find most Chinese people pairing their oily foods with oolong tea. The best part is that oolong tea doesn’t just blend with pan-fried chicken alone, it also goes well with pan-fried turkey. For the holidays, try pairing either option with oolong tea, and you’ll be in for a flavorful experience.', 0, 1, 1, '2021-08-01 07:34:02', '2021-08-01 07:34:02');

-- --------------------------------------------------------

--
-- Table structure for table `post_tag`
--

CREATE TABLE `post_tag` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_tag`
--

INSERT INTO `post_tag` (`id`, `post_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2021-07-31 12:20:04', '2021-07-31 12:20:04'),
(2, 2, 1, '2021-08-01 00:36:05', '2021-08-01 00:36:05'),
(3, 3, 1, '2021-08-01 07:34:02', '2021-08-01 07:34:02');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', NULL, NULL),
(2, 'Author', 'author', NULL, NULL),
(3, 'user', 'user', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'gddfg', 'gddfg', NULL, NULL),
(2, 'Heart Health', 'heart-health', NULL, NULL),
(3, 'Nutrition', 'nutrition', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '3',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `about` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `password`, `image`, `about`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, '1', 'Md.Admin', 'admin@blog.com', '$2y$10$WwspCrPrMccdIyI2O0KXMeUnsEMs7FBHzuowD6LAteA4HmI4mo9xm', 'image/Capture1.PNG', 'Paperio is an expressive and responsive WordPress multipurpose blog website theme. This theme is a powerful blogging platform for everyone starting their first blo. With Paperio at hand, you can distribute your content to the whole world in a flash.', 'loPUugMvrGbB9aDs4afZI9QBAgyiXWUQ8QNaQ4sRhQEILiCPcIUJNOuzi2EE', NULL, '2021-08-01 03:35:48'),
(3, '2', 'Md.Author', 'author@blog.com', '$2y$10$NDIVgi/w.VusL1pzW0l83eeGcjMtjjcaFs6p6VItC2xTAC67vXCuy', 'default.png', NULL, 'RD6YXAYkkMyzZ7LPy5As0MwcqvI8tUOnt2yWmp2xYvQwKL5mHs5Z8ZphUPXo', NULL, NULL),
(4, '3', 'deb', 'debgain@blog.com', '$2y$10$fv6oBqgrEnZRftWzfxfNGeOP9iP5sl8Em/Olu9IB26ZrjTssEgJfi', 'default.png', NULL, 'DqgIMUkN0Q7mhjgWMmOB20wKuppUyoJvM1IrDm7tGnhN3PMVK3IM7y1UwJX8', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_post`
--
ALTER TABLE `category_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_post_id_foreign` (`post_id`),
  ADD KEY `comments_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Indexes for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `category_post`
--
ALTER TABLE `category_post`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `post_tag`
--
ALTER TABLE `post_tag`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
