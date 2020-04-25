-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-04-2020 a las 22:09:26
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cafeteria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2016_06_01_000001_create_oauth_auth_codes_table', 2),
(5, '2016_06_01_000002_create_oauth_access_tokens_table', 2),
(6, '2016_06_01_000003_create_oauth_refresh_tokens_table', 2),
(7, '2016_06_01_000004_create_oauth_clients_table', 2),
(8, '2016_06_01_000005_create_oauth_personal_access_clients_table', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('2814bcf11b445f5b5db4b49caa03388d47e9f4b113295126cf12bc2b7cb9ade723909e0a2fd62b5c', 1, 2, NULL, '[]', 0, '2020-04-24 07:05:13', '2020-04-24 07:05:13', '2021-04-24 00:05:13'),
('5b902e0abd994312369d96cb41687d1977ae426eaa1310d7b7f6c71d5747c628e12108bf78241e55', 1, 2, NULL, '[]', 0, '2020-04-02 08:47:14', '2020-04-02 08:47:14', '2021-04-02 01:47:14'),
('724f27cf140b83571d0a0de1ec2720e8ee2f4c8701c38b57966d5c389bae66a471675b8bc18a307c', 1, 2, NULL, '[]', 0, '2020-04-05 06:32:38', '2020-04-05 06:32:38', '2021-04-04 23:32:38'),
('f0ea7a20712d928078664834d06311b7f5e9c42c8159d922f514585dfff95f0ee6ffeb5a52fa5703', 1, 2, NULL, '[]', 0, '2020-04-24 06:56:01', '2020-04-24 06:56:01', '2021-04-23 23:56:01'),
('f50ccf4cafc8bd8a4479764a90ccda5e684abec6fa62a76c97035d8984c0f361a95f5e5f8f705dcd', 17, 2, NULL, '[]', 0, '2020-04-24 07:06:52', '2020-04-24 07:06:52', '2021-04-24 00:06:52'),
('fc58a321987dc66834f3d28772444445e9ef60d8c3b471eb72d03790386105dea5cfc7608e558c86', 17, 2, NULL, '[]', 0, '2020-04-24 07:17:13', '2020-04-24 07:17:13', '2021-04-24 00:17:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'ZK7EuH15z7i0Fezbb6An5sxAVFvWPikPB3X5bfq9', 'http://localhost', 1, 0, 0, '2020-04-02 08:11:33', '2020-04-02 08:11:33'),
(2, NULL, 'Laravel Password Grant Client', 'xNwM7qxd7olxsjvQqhqR255lL8v7KyuiYAwcymmv', 'http://localhost', 0, 1, 0, '2020-04-02 08:11:33', '2020-04-02 08:11:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-04-02 08:11:33', '2020-04-02 08:11:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `oauth_refresh_tokens`
--

INSERT INTO `oauth_refresh_tokens` (`id`, `access_token_id`, `revoked`, `expires_at`) VALUES
('0adbc1e90a28a3e1aa846dd1eb95beaf2c0b553fa4f613c705a6dbdb277e83f25243d19c72aef86f', 'f50ccf4cafc8bd8a4479764a90ccda5e684abec6fa62a76c97035d8984c0f361a95f5e5f8f705dcd', 0, '2021-04-24 00:06:52'),
('558504537625cb36f4ca35cbe74cd6c5dc070446bceffedf4bb3bf741d10fad18b66334db230e1c7', 'fc58a321987dc66834f3d28772444445e9ef60d8c3b471eb72d03790386105dea5cfc7608e558c86', 0, '2021-04-24 00:17:13'),
('66a3f4f4ed4dbd7a643f506c6e5964a3d3c3a77d7d169d4a789c2555131bbaa2b69a76e37987681c', '724f27cf140b83571d0a0de1ec2720e8ee2f4c8701c38b57966d5c389bae66a471675b8bc18a307c', 0, '2021-04-04 23:32:39'),
('8daf3beb1efd4e14f7a03bf25b50d26062d5002f055fe4cf2310c27d22a1bbdcf3cda7b5bd88019c', 'f0ea7a20712d928078664834d06311b7f5e9c42c8159d922f514585dfff95f0ee6ffeb5a52fa5703', 0, '2021-04-23 23:56:02'),
('b5939ecfd2d7dfa87d1273a3ab8935806f97c4ccac8a2b1d907219a40bc7d8a1c29a0aade028ce08', '5b902e0abd994312369d96cb41687d1977ae426eaa1310d7b7f6c71d5747c628e12108bf78241e55', 0, '2021-04-02 01:47:15'),
('fbde3259a25840c56da63654e660c6edbb91091810a9bc25c3f9478351fd7fd0dc7c20f3299a79a5', '2814bcf11b445f5b5db4b49caa03388d47e9f4b113295126cf12bc2b7cb9ade723909e0a2fd62b5c', 0, '2021-04-24 00:05:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenes`
--

CREATE TABLE `ordenes` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nombre_cliente` varchar(150) NOT NULL,
  `direccion` varchar(150) NOT NULL,
  `telefono` varchar(150) NOT NULL,
  `orden` varchar(255) NOT NULL,
  `estado` varchar(255) DEFAULT 'pendiente',
  `created_by` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(150) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ordenes`
--

INSERT INTO `ordenes` (`id`, `id_user`, `nombre_cliente`, `direccion`, `telefono`, `orden`, `estado`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(11, 17, 'Susana Distancia', 'Calle #122 Col. UnaLejos', '5556767', 'Frappe Oreo', 'Pendiente', 'Admin', '2020-04-25 19:43:23', 'Admin', NULL),
(12, 17, 'Demetrio Ymedio', 'Calle #242 Col. UnaLejos', '5554352', 'Café americano chico', 'En camino', 'Admin', '2020-04-25 19:45:39', 'María', NULL),
(13, 24, 'Abraham Sealaverde', 'Calle #678 Col. UnaPaAllá', '5552476', 'Capuccino moka chico', 'Pendiente', 'María', '2020-04-25 20:08:22', 'María', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('analuciablanco@outlook.com', '$2y$10$uwNrTtc/xdLyaAaL.gZ9WeHIKbCUMCsFK9ktcvF2ZI1moIBty37I.', '2020-04-23 06:39:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user_type` int(11) NOT NULL DEFAULT 2,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'avatar5.jpeg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `id_user_type`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `user_type`, `picture`) VALUES
(17, 1, 'Admin', 'admin@cafeteria.com', NULL, '$2y$10$eResAvUJcHwCJIO7PqT8Gez5C6hWlE6MJWNudqHtag4GFRm5KB0PG', 'XN5VtF3fwgbtvhR86vIHyUlaCEA3B9LxSn8k7YmOtGPUD7ORvfv3TVYnuX9h', '2020-04-23 08:01:58', '2020-04-23 08:01:58', 'Administrador', 'avatar5.jpeg'),
(23, 3, 'Juan', 'juan@cafeteria.com', NULL, '$2y$10$M7HSIzdZsVYMPYoiKJBc4ed.PM/xAY.zbIvAHesbuj9YTSW/xT2CO', NULL, NULL, NULL, 'Repartidor', 'FHIMz5iHadNLxozIEZ4Rnpyj6uRd1F5QUyQbuqhK.jpeg'),
(24, 2, 'María', 'maria@cafeteria.com', NULL, '$2y$10$njo/WGEA3bBjGsgVTACdCOB1IgORSuSTEfhDmImE.JyLuTaolQWL.', NULL, NULL, NULL, 'Capturador', '0HS39G4Kq4JE5KAUXkKMrRjsjMva3ufMYp61oIOE.jpeg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_type`
--

CREATE TABLE `user_type` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `user_type`
--

INSERT INTO `user_type` (`id`, `descripcion`) VALUES
(1, 'Administrador'),
(2, 'Capturador'),
(3, 'Repartidor');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indices de la tabla `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indices de la tabla `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indices de la tabla `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ordenes`
--
ALTER TABLE `ordenes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `id_user_type` (`id_user_type`);

--
-- Indices de la tabla `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ordenes`
--
ALTER TABLE `ordenes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_user_type`) REFERENCES `user_type` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
