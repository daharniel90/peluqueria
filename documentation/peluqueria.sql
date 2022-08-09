-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tiempo de generación: 04-08-2022 a las 17:48:47
-- Versión del servidor: 5.0.51
-- Versión de PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Base de datos: `peluqueria`
-- 

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `assistance`
-- 

CREATE TABLE `assistance` (
  `id` int(11) NOT NULL auto_increment,
  `create_at` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `entry_time` time NOT NULL,
  `departure_time` time NOT NULL,
  `id_user` int(11) NOT NULL,
  `observations` varchar(100) collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `id_user` (`id_user`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=11 ;

-- 
-- Volcar la base de datos para la tabla `assistance`
-- 

INSERT INTO `assistance` VALUES (1, '2022-07-25 19:03:50', '19:03:50', '00:00:00', 3, '');
INSERT INTO `assistance` VALUES (2, '2022-07-26 19:04:53', '19:04:53', '00:00:00', 3, '');
INSERT INTO `assistance` VALUES (3, '2022-07-26 19:13:10', '19:13:10', '00:00:00', 3, '');
INSERT INTO `assistance` VALUES (4, '2022-07-26 19:47:45', '00:00:00', '19:47:45', 3, '');
INSERT INTO `assistance` VALUES (5, '2022-07-26 19:48:07', '19:48:07', '00:00:00', 3, '');
INSERT INTO `assistance` VALUES (6, '2022-07-26 19:48:29', '00:00:00', '19:48:29', 3, '');
INSERT INTO `assistance` VALUES (7, '2022-07-26 19:49:14', '19:49:14', '00:00:00', 5, '');
INSERT INTO `assistance` VALUES (8, '2022-07-26 19:49:56', '19:49:56', '00:00:00', 3, '');
INSERT INTO `assistance` VALUES (9, '2022-07-26 19:50:23', '00:00:00', '19:50:23', 5, '');
INSERT INTO `assistance` VALUES (10, '2022-07-26 19:50:39', '00:00:00', '19:50:39', 3, '');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `banks`
-- 

CREATE TABLE `banks` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(50) collate utf8_spanish_ci NOT NULL,
  `create_at` timestamp NOT NULL default '0000-00-00 00:00:00' on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

-- 
-- Volcar la base de datos para la tabla `banks`
-- 

INSERT INTO `banks` VALUES (1, 'banco de venezuela', '2022-07-28 17:56:24');
INSERT INTO `banks` VALUES (2, 'banesco', '2022-07-28 17:56:24');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `categories`
-- 

CREATE TABLE `categories` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) collate utf8_spanish_ci NOT NULL,
  `color` varchar(59) collate utf8_spanish_ci NOT NULL,
  `icon` varchar(50) collate utf8_spanish_ci NOT NULL,
  `date` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=11 ;

-- 
-- Volcar la base de datos para la tabla `categories`
-- 

INSERT INTO `categories` VALUES (4, 'peluqueria', 'bg-danger', 'fas fa-chair-office', '2022-07-29 18:05:24');
INSERT INTO `categories` VALUES (3, 'Barberia', 'bg-info', 'fas fa-male', '2022-07-29 18:05:34');
INSERT INTO `categories` VALUES (9, 'manicure', 'bg-success', 'far fa-hand-heart', '2022-07-25 20:07:55');
INSERT INTO `categories` VALUES (10, 'Tatuajes', '', '', '2022-07-29 19:21:21');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `clients`
-- 

CREATE TABLE `clients` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(20) collate utf8_spanish_ci NOT NULL,
  `last_name` varchar(20) collate utf8_spanish_ci NOT NULL,
  `dni` int(9) NOT NULL,
  `phone` varchar(50) collate utf8_spanish_ci NOT NULL,
  `address` varchar(100) collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `dni` (`dni`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

-- 
-- Volcar la base de datos para la tabla `clients`
-- 

INSERT INTO `clients` VALUES (1, 'juan', 'perez', 20890765, '04249724874', '          unare');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `employee_invoices`
-- 

CREATE TABLE `employee_invoices` (
  `id` int(11) NOT NULL auto_increment,
  `id_user` int(11) NOT NULL,
  `id_quote` int(11) NOT NULL,
  `total` double NOT NULL,
  `paid_bill` tinyint(1) NOT NULL default '0',
  `created_at` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`),
  KEY `id_client` (`id_user`),
  KEY `id_quote` (`id_quote`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

-- 
-- Volcar la base de datos para la tabla `employee_invoices`
-- 

INSERT INTO `employee_invoices` VALUES (1, 3, 3, 0, 0, '2022-08-02 18:11:17');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `invoices`
-- 

CREATE TABLE `invoices` (
  `id` int(11) NOT NULL auto_increment,
  `id_client` int(11) NOT NULL,
  `id_quote` int(11) NOT NULL,
  `total` double NOT NULL,
  `paid_bill` tinyint(1) NOT NULL default '0',
  `created_at` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`),
  KEY `id_client` (`id_client`),
  KEY `id_quote` (`id_quote`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

-- 
-- Volcar la base de datos para la tabla `invoices`
-- 

INSERT INTO `invoices` VALUES (1, 1, 3, 0, 0, '2022-07-28 19:17:14');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `payment_client_service`
-- 

CREATE TABLE `payment_client_service` (
  `id` int(11) NOT NULL auto_increment,
  `id_payment_method` int(11) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `created_at` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`),
  KEY `id_payment_method` (`id_payment_method`),
  KEY `id_invoice` (`id_invoice`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `payment_client_service`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `payment_methods`
-- 

CREATE TABLE `payment_methods` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) collate utf8_spanish_ci NOT NULL,
  `id_bank` int(11) NOT NULL,
  `pay_data` varchar(200) collate utf8_spanish_ci NOT NULL,
  `created_at` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`),
  KEY `id_bank` (`id_bank`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

-- 
-- Volcar la base de datos para la tabla `payment_methods`
-- 

INSERT INTO `payment_methods` VALUES (1, 'pago movil', 0, '', '2022-07-27 15:14:42');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `payment_users_service`
-- 

CREATE TABLE `payment_users_service` (
  `id` int(11) NOT NULL auto_increment,
  `id_employee_invoice` int(11) NOT NULL,
  `id_payment_method` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `observations` varchar(100) collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `id_payment_method` (`id_payment_method`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `payment_users_service`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `quote`
-- 

CREATE TABLE `quote` (
  `id` int(11) NOT NULL auto_increment,
  `amount` double NOT NULL,
  `date` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

-- 
-- Volcar la base de datos para la tabla `quote`
-- 

INSERT INTO `quote` VALUES (2, 5.8, '2022-07-28 19:02:22');
INSERT INTO `quote` VALUES (3, 6.1, '2022-07-28 19:02:49');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `roles`
-- 

CREATE TABLE `roles` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) collate utf8_spanish_ci NOT NULL,
  `functions` text collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=5 ;

-- 
-- Volcar la base de datos para la tabla `roles`
-- 

INSERT INTO `roles` VALUES (1, 'peluquera', 'cortar cabello');
INSERT INTO `roles` VALUES (3, 'Barbero', '');
INSERT INTO `roles` VALUES (4, 'Tatuador(a)', '');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `services`
-- 

CREATE TABLE `services` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) collate utf8_spanish_ci NOT NULL,
  `date` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `id_category` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `id_category` (`id_category`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=15 ;

-- 
-- Volcar la base de datos para la tabla `services`
-- 

INSERT INTO `services` VALUES (14, 'manicure rusaaaa', '2022-07-29 18:59:15', 9);
INSERT INTO `services` VALUES (10, 'Secado cabello corto', '2022-07-22 20:33:06', 4);
INSERT INTO `services` VALUES (6, 'Hair Tatoo', '2022-07-22 20:37:44', 3);
INSERT INTO `services` VALUES (11, 'pintar cabello', '2022-07-25 14:58:05', 4);
INSERT INTO `services` VALUES (8, 'Secado cabello corto', '2022-07-29 19:21:00', 4);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `service_contract`
-- 

CREATE TABLE `service_contract` (
  `id` int(11) NOT NULL auto_increment,
  `id_user` int(11) NOT NULL,
  `id_service` int(11) NOT NULL,
  `id_service_detail` int(11) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `created_at` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `observations` varchar(100) collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `id_user` (`id_user`),
  KEY `id_service` (`id_service`),
  KEY `id_invoice` (`id_invoice`),
  KEY `id_service_detail` (`id_service_detail`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

-- 
-- Volcar la base de datos para la tabla `service_contract`
-- 

INSERT INTO `service_contract` VALUES (1, 3, 6, 6, 1, '2022-07-27 16:20:04', '');
INSERT INTO `service_contract` VALUES (2, 4, 8, 7, 1, '2022-07-27 16:20:04', '');
INSERT INTO `service_contract` VALUES (3, 3, 8, 7, 1, '2022-07-28 20:06:56', '');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `service_detail`
-- 

CREATE TABLE `service_detail` (
  `id` int(11) NOT NULL auto_increment,
  `id_service` int(11) NOT NULL,
  `created_at` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `price` double NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `id_service` (`id_service`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=8 ;

-- 
-- Volcar la base de datos para la tabla `service_detail`
-- 

INSERT INTO `service_detail` VALUES (1, 14, '2022-07-29 18:59:45', 5);
INSERT INTO `service_detail` VALUES (2, 14, '2022-07-29 19:00:17', 6);
INSERT INTO `service_detail` VALUES (3, 14, '2022-07-29 19:02:34', 5);
INSERT INTO `service_detail` VALUES (4, 14, '2022-07-29 19:11:09', 6);
INSERT INTO `service_detail` VALUES (5, 14, '2022-07-29 19:11:39', 8);
INSERT INTO `service_detail` VALUES (6, 6, '2022-07-29 19:19:47', 12);
INSERT INTO `service_detail` VALUES (7, 8, '2022-07-29 19:20:44', 7);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `users`
-- 

CREATE TABLE `users` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(50) collate utf8_spanish_ci NOT NULL,
  `lastname` varchar(50) collate utf8_spanish_ci NOT NULL,
  `dni` varchar(100) collate utf8_spanish_ci NOT NULL,
  `phone` varchar(100) collate utf8_spanish_ci NOT NULL,
  `address` varchar(100) collate utf8_spanish_ci NOT NULL,
  `email` text collate utf8_spanish_ci NOT NULL,
  `user_name` varchar(15) collate utf8_spanish_ci NOT NULL,
  `password` varchar(12) collate utf8_spanish_ci NOT NULL,
  `created_at` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `active` tinyint(1) NOT NULL default '1',
  `deleted` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `user_name` (`user_name`),
  UNIQUE KEY `dni` (`dni`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=6 ;

-- 
-- Volcar la base de datos para la tabla `users`
-- 

INSERT INTO `users` VALUES (3, 'Maria', 'Perez', '20000999', '0999999', 'Caura 2', 'sanchezgenesisd@gmail.com', 'mariaperez', '1234567890', '2022-07-22 18:11:14', 1, 0);
INSERT INTO `users` VALUES (4, 'Pedro', 'yepez', '19000888', '0997766', 'Unare 2', 'pedroperez@gmail.com', 'pedroperez', '1234567890', '2022-07-22 18:40:12', 1, 0);
INSERT INTO `users` VALUES (5, 'Robertooooo', 'Mejiasooooo', '239996660000', '978765500000', 'Caujaroooooo', 'robertomejis@gmail.comooooo', 'robertomejiasoo', '12345678909', '2022-07-22 18:42:16', 1, 0);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `user_role`
-- 

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL auto_increment,
  `id_user` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `created_at` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

-- 
-- Volcar la base de datos para la tabla `user_role`
-- 

INSERT INTO `user_role` VALUES (1, 5, 4, '2022-07-22 18:42:16');
