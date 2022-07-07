-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tiempo de generación: 07-07-2022 a las 12:31:37
-- Versión del servidor: 5.0.51
-- Versión de PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Base de datos: `hair_salon`
-- 

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `assistance`
-- 

CREATE TABLE `assistance` (
  `id` int(11) NOT NULL auto_increment,
  `date` datetime NOT NULL,
  `entry_time` time NOT NULL,
  `departure_time` time NOT NULL,
  `id_users` int(11) NOT NULL,
  `observations` varchar(100) collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `assistance`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `clients`
-- 

CREATE TABLE `clients` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) collate utf8_spanish_ci NOT NULL,
  `last_name` varchar(100) collate utf8_spanish_ci NOT NULL,
  `phone` varchar(100) collate utf8_spanish_ci NOT NULL,
  `address` varchar(100) collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `clients`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `payment_methods`
-- 

CREATE TABLE `payment_methods` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) collate utf8_spanish_ci NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `payment_methods`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `payment_users_service`
-- 

CREATE TABLE `payment_users_service` (
  `id` int(11) NOT NULL auto_increment,
  `id_service_contract` int(11) NOT NULL,
  `id_payment_methods` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `observations` varchar(100) collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`id`)
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
  `amount` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `quote`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `roles`
-- 

CREATE TABLE `roles` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) collate utf8_spanish_ci NOT NULL,
  `funtions` varchar(100) collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `roles`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `services`
-- 

CREATE TABLE `services` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) collate utf8_spanish_ci NOT NULL,
  `date` datetime NOT NULL,
  `id_type_services` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `services`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `service_client_payment`
-- 

CREATE TABLE `service_client_payment` (
  `id` int(11) NOT NULL auto_increment,
  `id_service_contract` int(11) NOT NULL,
  `id_payment_methods` int(11) NOT NULL,
  `id_clients` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `service_client_payment`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `service_contract`
-- 

CREATE TABLE `service_contract` (
  `id` int(11) NOT NULL auto_increment,
  `id_users` int(11) NOT NULL,
  `id_services` int(11) NOT NULL,
  `id_type_services` int(11) NOT NULL,
  `id_service_detail` int(11) NOT NULL,
  `id_quote` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `observations` varchar(100) collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `service_contract`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `service_detail`
-- 

CREATE TABLE `service_detail` (
  `id` int(11) NOT NULL auto_increment,
  `id_services` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `service_detail`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `type_services`
-- 

CREATE TABLE `type_services` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) collate utf8_spanish_ci NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `type_services`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `users`
-- 

CREATE TABLE `users` (
  `id` int(11) NOT NULL auto_increment,
  `name_lastname` varchar(100) collate utf8_spanish_ci NOT NULL,
  `dni` varchar(100) collate utf8_spanish_ci NOT NULL,
  `phone` varchar(100) collate utf8_spanish_ci NOT NULL,
  `address` varchar(100) collate utf8_spanish_ci NOT NULL,
  `date` datetime NOT NULL,
  `id_roles` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `dni` (`dni`,`phone`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `users`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `user_role`
-- 

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL auto_increment,
  `id_users` int(11) NOT NULL,
  `id_roles` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `user_role`
-- 

