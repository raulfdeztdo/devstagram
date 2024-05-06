-- -------------------------------------------------------------
-- TablePlus 5.3.8(500)
--
-- https://tableplus.com/
--
-- Database: devstagram
-- Generation Time: 2023-07-29 20:19:02.7120
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


CREATE TABLE `comentarios` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `post_id` bigint unsigned NOT NULL,
  `comentario` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comentarios_user_id_foreign` (`user_id`),
  KEY `comentarios_post_id_foreign` (`post_id`),
  CONSTRAINT `comentarios_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  CONSTRAINT `comentarios_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `followers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `follower_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `followers_user_id_foreign` (`user_id`),
  KEY `followers_follower_id_foreign` (`follower_id`),
  CONSTRAINT `followers_follower_id_foreign` FOREIGN KEY (`follower_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `followers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `likes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `post_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `likes_user_id_foreign` (`user_id`),
  KEY `likes_post_id_foreign` (`post_id`),
  CONSTRAINT `likes_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  CONSTRAINT `likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `posts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `posts_user_id_foreign` (`user_id`),
  CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `comentarios` (`id`, `user_id`, `post_id`, `comentario`, `created_at`, `updated_at`) VALUES
(2, 5, 1, 'Hola Big Data!', '2023-01-25 19:55:45', '2023-01-25 19:55:45'),
(3, 5, 16, 'jhvjhvhk', '2023-01-25 20:33:14', '2023-01-25 20:33:14'),
(4, 3, 16, 'oh k guay jaja', '2023-01-25 20:33:38', '2023-01-25 20:33:38'),
(5, 3, 17, 'Muy buena foto!', '2023-06-17 23:54:27', '2023-06-17 23:54:27');

INSERT INTO `followers` (`id`, `user_id`, `follower_id`, `created_at`, `updated_at`) VALUES
(10, 5, 9, NULL, NULL),
(11, 3, 9, NULL, NULL),
(13, 5, 3, NULL, NULL),
(14, 9, 3, NULL, NULL),
(15, 9, 5, NULL, NULL);

INSERT INTO `likes` (`id`, `user_id`, `post_id`, `created_at`, `updated_at`) VALUES
(12, 3, 3, '2023-01-25 19:45:18', '2023-01-25 19:45:18'),
(14, 5, 1, '2023-01-25 19:54:53', '2023-01-25 19:54:53'),
(15, 5, 2, '2023-01-25 19:55:03', '2023-01-25 19:55:03'),
(17, 5, 16, '2023-01-25 19:56:54', '2023-01-25 19:56:54'),
(19, 3, 1, '2023-01-25 20:33:05', '2023-01-25 20:33:05'),
(20, 3, 16, '2023-01-25 20:33:44', '2023-01-25 20:33:44'),
(21, 5, 14, '2023-06-13 22:27:30', '2023-06-13 22:27:30'),
(73, 5, 17, '2023-06-17 23:59:55', '2023-06-17 23:59:55'),
(74, 3, 17, '2023-06-18 00:00:06', '2023-06-18 00:00:06'),
(77, 3, 15, '2023-07-29 18:02:24', '2023-07-29 18:02:24'),
(78, 3, 14, '2023-07-29 18:02:44', '2023-07-29 18:02:44');

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(7, '2022_12_06_115844_add_user_name_column_to_users_table', 2),
(9, '2022_12_13_182134_create_posts_table', 3),
(11, '2022_12_18_194357_create_comentarios_table', 4),
(13, '2023_01_25_185636_create_likes_table', 5),
(14, '2023_06_13_235419_add_imagen_field_to_users_table', 6),
(15, '2023_06_17_151305_create_followers_table', 7);

INSERT INTO `posts` (`id`, `titulo`, `descripcion`, `imagen`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Big Data', 'Descripción para mi nuevo curso de Big Data', '0f2a4a65-ff82-4e6e-951f-501954595299.jpg', 3, '2022-12-17 15:59:36', '2022-12-17 15:59:36'),
(2, 'Un día en el trabajo', 'Trabajando con Laravel 9', '1aa91f30-51bc-45af-8910-fea810629018.jpg', 3, '2022-12-17 16:53:05', '2022-12-17 16:53:05'),
(3, 'Programación', 'Banner programación', 'f5f86ef7-237c-4d78-a047-8df52ff0669a.jpg', 3, '2022-12-17 17:18:14', '2022-12-17 17:18:14'),
(5, 'Chill day', 'Una imagen de prueba', '95ba3fec-0a03-4f4b-861f-a8f699812c3a.jpg', 3, '2022-12-18 01:08:34', '2022-12-18 01:08:34'),
(6, 'Work day!', 'One more day at office', '8c31c377-11a6-423f-9f2a-462ea347c16d.jpg', 3, '2022-12-18 01:08:51', '2022-12-18 01:08:51'),
(9, 'Sunset!', 'Sea sunset in Cantabria, Spain :)', 'e954de7c-eb5d-4b78-a0f0-d0334c0887fd.jpg', 3, '2022-12-18 01:10:27', '2022-12-18 01:10:27'),
(10, 'Spain North Sea', 'Fantastic photo in Santander, Cantabría, Spain', '4724114c-2904-404d-a7c0-54b78c20a7ba.jpg', 3, '2022-12-18 01:11:30', '2022-12-18 01:11:30'),
(12, 'Night sky.', 'Wonderful night with incredible views!', '06468b4f-1cb7-48ff-97cf-19b41ebdd539.jpg', 3, '2022-12-18 01:12:53', '2022-12-18 01:12:53'),
(14, 'Cloudly Forest!', 'A pic of a cloudly day in the forest :D', '9780e31b-4bb2-4668-9bd4-a0674544fff1.jpg', 5, '2022-12-18 02:13:42', '2022-12-18 02:13:42'),
(15, 'Nueva foto', '#new #picoftheday', 'db3a46c0-7ae9-4000-84ad-04ec3b2b4728.jpg', 3, '2023-01-24 19:21:29', '2023-01-24 19:21:29'),
(16, 'Lluvia de ciudad!', '#rainyDay #rain', '171d30ba-159c-4b9d-ba3e-381ee5f4b9d1.jpg', 5, '2023-01-25 19:56:49', '2023-01-25 19:56:49'),
(17, 'San Juan de Gaztelugatxe', '#Bilbao #PV #Sea', 'ce24fe2b-2d6d-41e5-a99d-30bd1c50f96a.jpg', 9, '2023-06-17 19:14:35', '2023-06-17 19:14:35');

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `imagen`) VALUES
(3, 'Raúl', 'raulfdeztdo', 'raul@email.com', NULL, '$2y$10$Au7IRCwBMC1vBJ0OY8H/i.1W.oJ2d0vs2Ln2dOa9mTFCGHjUM3Xfy', 'MOYmLbWUiFvzdniPiJMeRk61Gc5TSaiiopjOTVYrHMgL7CyXxG9WVkPaPUq1', '2022-12-06 12:39:38', '2023-07-29 18:03:16', '3dee4db0-140e-4dc2-a05e-2479fcda66e1.jpg'),
(5, 'Raquel', 'raqlgc', 'raqgc@correo.co', NULL, '$2y$10$KXhRdHRhAtNfi4Snr0vvN.1ybuGnyQq1mkJFdvyi6Hns6Fe7JUFQi', 'iVNUp90dgdevPPCiibnO0auLQb9glUogykeGP6274mPGtkrzdFIfbnblvMMi', '2022-12-06 12:45:35', '2023-06-17 15:03:22', '7d10f736-f349-4480-92fa-25b871fe1b95.png'),
(9, 'Miguel', 'Hernandez', 'migue.hern@email.com', NULL, '$2y$10$hvsUCiLXMzsaNz6wZ/4V0OSdcrIMRmbBO9KXAApp/6bWobm0TZQ9e', NULL, '2023-06-17 16:58:50', '2023-06-17 16:58:50', NULL);



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;