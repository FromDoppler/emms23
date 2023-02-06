-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Nov 16, 2022 at 07:14 PM
-- Server version: 8.0.29
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `EMMS22`
--
CREATE DATABASE IF NOT EXISTS `EMMS22` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `EMMS22`;

-- --------------------------------------------------------

--
-- Table structure for table `aliados_media_partner`
--

DROP TABLE IF EXISTS `aliados_media_partner`;
CREATE TABLE `aliados_media_partner` (
  `id` int NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image_home` varchar(255) DEFAULT NULL,
  `alt_image_home` varchar(255) DEFAULT NULL,
  `orden_home` varchar(255) DEFAULT NULL,
  `status` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `aliados_media_partner`
--

INSERT INTO `aliados_media_partner` (`id`, `name`, `image_home`, `alt_image_home`, `orden_home`, `status`) VALUES
(20, 'Girls in Tech', 'girls-in-tech-mediapartner-V2.png', 'Girls in Tech', '1', NULL),
(21, 'Chiletec', 'chiletec-mediapartner.png', 'Chiletec', '2', NULL),
(22, 'My Pyme no para', 'mi-pyme-no-para-mediapartner-V3.png', 'My Pyme no Para', '3', NULL),
(23, 'Revista NEO', 'revista-neo-mediapartner-V2.png', 'Revista Neo', '4', NULL),
(24, 'Infonegocios', 'infonegocios-mediapartner-V2.png', 'Infonegocios', '5', NULL),
(25, 'China Rodriguez', 'china-rodriguez-mediapartner-V4.png', 'China Rodriguez', '6', NULL),
(26, 'Girls in Tech Ec', 'girls-in-tech-ecuador-mediapartner-V2.png', 'Girls in Tech Ec', '7', NULL),
(27, 'Sofi Alicio', 'sofia-alicio-mediapartner-V2.png', 'Sofi Alicio', '8', NULL),
(29, 'Jacuna', 'jacuna-mediapartner-V2.png', 'Jacuna', '10', NULL),
(30, 'Digitalizadas', 'digitalizadas-mediapartner-V2.png', 'Digitalizadas', '11', NULL),
(31, 'Rampa Publicidad', 'rampa-digital-mediapartner-V2.png', 'Rampa Publicidad', '12', NULL),
(32, 'Mica Sabja', 'micaela-sab-mediapartner.png', 'Mica Sabja', '13', NULL),
(33, 'Ultravioleta', 'ultravioleta-mediapartner-V2.png', 'Ultravioleta', '14', NULL),
(34, 'Luis Maram', 'luis-maram-mediapartner-V3.png', 'Luis Maram', '15', NULL),
(35, 'Mkt Digital Experience', 'marketing-digital-experience-mediapartner-V3.png', 'Mkt Digital Experience', '16', NULL),
(36, 'Club de las Emprendedoras', 'club-emprendedoras-mediapartner-V3.png', 'Club de las Emprendedoras', '17', NULL),
(37, 'Ignacio Santiago', 'ignacio-santiago-mediapartner-V3.png', 'Ignacio Santiago', '18', NULL),
(38, 'AVE', 'alianza-valor-estrategico-mediapartner-V2.png', 'AVE', '19', NULL),
(39, 'Epico', 'epico-mediapartner-V2.png', 'Epico', '20', NULL),
(40, 'Angie Sanmartino', 'angie-mediapartner-V2.png', 'Angie Sanmartino', '21', NULL),
(41, 'Mamá Emprende', 'mama-emprende-V3.png', 'Mamá Emprende', '22', NULL),
(42, 'Consejo de la Comunicación', 'consejo-comunicacion-mediapartner-V2.png', 'Consejo de la Comunicación', '23', NULL),
(43, 'Red de Vendedores', 'red-vendedores-mediapartner-V2.png', 'Red de Vendedores', '24', NULL),
(44, 'Mimec', 'mimec-mediapartner-V3.png', 'Mimec', '25', NULL),
(45, 'Cam Fintech AR', 'camara-argentina-fintech-mediapartner-V3.png', 'Cam Fintech AR', '26', NULL),
(46, 'Camcocba', 'camara-comercio-cordoba-mediapartner-V2.png', 'Camcocba', '27', NULL),
(47, 'Benomad', 'benomad-mediapartner-V3.png', 'Benomad', '28', NULL),
(48, 'Growby', 'growby-mediaparner-V2.png', 'Growby', '29', NULL),
(49, 'Del querer al hacer', 'del-querer-al-hacer-mediapartner-V2.png', 'Del querer al hacer', '30', NULL),
(50, 'IT Ahora', 'it-ahora-mediapartner-V2.png', 'IT Ahora', '31', NULL),
(51, 'Emprendedores News', 'emprendedores-news-mediapartner-V2.png', 'Emprendedores News', '32', NULL),
(52, 'Grandes Pymes', 'grandes-pymes-mediapartner-V2.png', 'Grandes Pymes', '33', NULL),
(53, 'Mundo Contact', 'mundo-contact-mediapartner-V2.png', 'Mundo Contact', '34', NULL),
(54, 'Mkt al día', 'marketing-al-dia-mediapartner-V3.png', 'Mkt al día', '35', NULL),
(55, 'Bulb', 'bulb-mediapartner-V2.png', 'Bulb', '36', NULL),
(56, 'Moni en la Web', 'moni-en-la-web-mediapartner-V2.png', 'Moni en la Web', '37', NULL),
(57, 'Entre Emp WS', 'entreemprendedores-mediapartner-V2.png', 'Entre Emp WS', '38', NULL),
(58, 'Disruptivo TV', 'disruptivo-mediapartner-V3.png', 'Disruptivo TV', '39', NULL),
(59, 'Caro Siri', 'caro-siri-mediapartner.png', 'Uffa Studio', '40', NULL),
(60, 'Sed Emprendedor', 'sed-emprendedor-mediapartner-V2.png', 'Sed Emprendedor', '41', NULL),
(61, 'Mis eventos online', 'mis-eventos-online-mediapartner-V2.png', 'Mis eventos online', '42', NULL),
(62, 'Factor Humano', 'factor-humano-mediapartner-V3.png', 'Factor Humano', '43', NULL),
(63, 'E-mkt Chile', 'e-marketing-mediapartner-V2.png', 'E-mkt Chile', '44', NULL),
(64, 'Partners Academy', 'partners-academy-mediapartner-V3.png', 'Partners Academy', '45', NULL),
(65, 'Flor Lamas', 'flor-lamas-mediapartner.png', 'Flor Lamas', '40', NULL),
(66, 'Ad Media Rock', 'admediarock-mediapartner.png', 'Ad media Rock', '70', NULL),
(67, 'We Connect', 'weconnect-mediapartner.png', 'WeConnect', '80', NULL),
(68, 'AMDAR', 'amdar-mediapartner (1).png', 'AMDAR', '30', NULL),
(69, 'Partner Press', 'partner-press-mediapartner.png', 'Partner-press', '60', NULL),
(70, 'Mujeres que Emprenden ', 'mujeres-que-emprenden-mediapartner-V2.png', 'Mujeres que Emprenden', '5', NULL),
(72, 'Cooltabs', 'cooltabs-mediapartner.png', 'Cooltabs', '100', NULL),
(73, 'Educación IT', 'educacion-it-mediapartner.png', 'Educación IT', '110', NULL),
(74, 'EUDE', 'eude-mediapartner.png', 'Eude', '120', NULL),
(75, 'Asociación Internet Mx', 'asociacion-internet-mx.png', 'Asociación Internet Mx', '120', NULL),
(76, 'Pulsión Digital', 'pulsion-digital-mediapartner.png', 'Pulsión Digital', '10', NULL),
(77, 'Aleti', 'aleti-media-partner.png', 'Aleti', '20', NULL),
(78, 'Cessi', 'cessi-media-partner.png', 'Cessi', '30', NULL),
(79, 'Adity', 'adity-media-partner.png', 'Adity', '92', NULL),
(80, 'Cyberclick', 'cyberclick-mediapartner.png', 'Cyberclick', '40', NULL),
(81, 'Pymes Power Hub', 'powehub-network-mediapartner.png', 'Pymes Power Hub', '90', NULL),
(82, 'América Retail', 'america-retail-mediapartner.png', 'América Retail', '46', NULL),
(83, 'Genwords', 'genwords-media-partner.png', 'Genwords', '47', NULL),
(84, 'Webescuela', 'webescuela-media-partner.png', 'Webescuela', '62', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `aliados_media_partner_bk`
--

DROP TABLE IF EXISTS `aliados_media_partner_bk`;
CREATE TABLE `aliados_media_partner_bk` (
  `id` int NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image_home` varchar(255) DEFAULT NULL,
  `alt_image_home` varchar(255) DEFAULT NULL,
  `orden_home` varchar(255) DEFAULT NULL,
  `status` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `aliados_media_partner_bk`
--

INSERT INTO `aliados_media_partner_bk` (`id`, `name`, `image_home`, `alt_image_home`, `orden_home`, `status`) VALUES
(20, 'Girls in Tech', 'girls-in-tech-mediapartner-V2.png', 'Girls in Tech', '1', NULL),
(21, 'Chiletec', 'chiletec-mediapartner.png', 'Chiletec', '2', NULL),
(22, 'My Pyme no para', 'mi-pyme-no-para-mediapartner-V3.png', 'My Pyme no Para', '3', NULL),
(23, 'Revista NEO', 'revista-neo-mediapartner-V2.png', 'Revista Neo', '4', NULL),
(24, 'Infonegocios', 'infonegocios-mediapartner-V2.png', 'Infonegocios', '5', NULL),
(25, 'China Rodriguez', 'china-rodriguez-mediapartner-V4.png', 'China Rodriguez', '6', NULL),
(26, 'Girls in Tech Ec', 'girls-in-tech-ecuador-mediapartner-V2.png', 'Girls in Tech Ec', '7', NULL),
(27, 'Sofi Alicio', 'sofia-alicio-mediapartner-V2.png', 'Sofi Alicio', '8', NULL),
(28, 'Mujeres que Emprenden', 'mujeres-que-emprenden-mediapartner-V2.png', 'Mujeres que Emprenden', '9', NULL),
(29, 'Jacuna', 'jacuna-mediapartner-V2.png', 'Jacuna', '10', NULL),
(30, 'Digitalizadas', 'digitalizadas-mediapartner-V2.png', 'Digitalizadas', '11', NULL),
(31, 'Rampa Publicidad', 'rampa-digital-mediapartner-V2.png', 'Rampa Publicidad', '12', NULL),
(32, 'Mica Sabja', 'micaela-sab-mediapartner.png', 'Mica Sabja', '13', NULL),
(33, 'Ultravioleta', 'ultravioleta-mediapartner-V2.png', 'Ultravioleta', '14', NULL),
(34, 'Luis Maram', 'luis-maram-mediapartner-V3.png', 'Luis Maram', '15', NULL),
(35, 'Mkt Digital Experience', 'marketing-digital-experience-mediapartner-V3.png', 'Mkt Digital Experience', '16', NULL),
(36, 'Club de las Emprendedoras', 'club-emprendedoras-mediapartner-V3.png', 'Club de las Emprendedoras', '17', NULL),
(37, 'Ignacio Santiago', 'ignacio-santiago-mediapartner-V3.png', 'Ignacio Santiago', '18', NULL),
(38, 'AVE', 'alianza-valor-estrategico-mediapartner-V2.png', 'AVE', '19', NULL),
(39, 'Epico', 'epico-mediapartner-V2.png', 'Epico', '20', NULL),
(40, 'Angie Sanmartino', 'angie-mediapartner-V2.png', 'Angie Sanmartino', '21', NULL),
(41, 'Mamá Emprende', 'mama-emprende-V3.png', 'Mamá Emprende', '22', NULL),
(42, 'Consejo de la Comunicación', 'consejo-comunicacion-mediapartner-V2.png', 'Consejo de la Comunicación', '23', NULL),
(43, 'Red de Vendedores', 'red-vendedores-mediapartner-V2.png', 'Red de Vendedores', '24', NULL),
(44, 'Mimec', 'mimec-mediapartner-V3.png', 'Mimec', '25', NULL),
(45, 'Cam Fintech AR', 'camara-argentina-fintech-mediapartner-V3.png', 'Cam Fintech AR', '26', NULL),
(46, 'Camcocba', 'camara-comercio-cordoba-mediapartner-V2.png', 'Camcocba', '27', NULL),
(47, 'Benomad', 'benomad-mediapartner-V3.png', 'Benomad', '28', NULL),
(48, 'Growby', 'growby-mediaparner-V2.png', 'Growby', '29', NULL),
(49, 'Del querer al hacer', 'del-querer-al-hacer-mediapartner-V2.png', 'Del querer al hacer', '30', NULL),
(50, 'IT Ahora', 'it-ahora-mediapartner-V2.png', 'IT Ahora', '31', NULL),
(51, 'Emprendedores News', 'emprendedores-news-mediapartner-V2.png', 'Emprendedores News', '32', NULL),
(52, 'Grandes Pymes', 'grandes-pymes-mediapartner-V2.png', 'Grandes Pymes', '33', NULL),
(53, 'Mundo Contact', 'mundo-contact-mediapartner-V2.png', 'Mundo Contact', '34', NULL),
(54, 'Mkt al día', 'marketing-al-dia-mediapartner-V3.png', 'Mkt al día', '35', NULL),
(55, 'Bulb', 'bulb-mediapartner-V2.png', 'Bulb', '36', NULL),
(56, 'Moni en la Web', 'moni-en-la-web-mediapartner-V2.png', 'Moni en la Web', '37', NULL),
(57, 'Entre Emp WS', 'entreemprendedores-mediapartner-V2.png', 'Entre Emp WS', '38', NULL),
(58, 'Disruptivo TV', 'disruptivo-mediapartner-V3.png', 'Disruptivo TV', '39', NULL),
(59, 'Uffa Studio', 'uffa-estudio-mediapartner-V2.png', 'Uffa Studio', '40', NULL),
(60, 'Sed Emprendedor', 'sed-emprendedor-mediapartner-V2.png', 'Sed Emprendedor', '41', NULL),
(61, 'Mis eventos online', 'mis-eventos-online-mediapartner-V2.png', 'Mis eventos online', '42', NULL),
(62, 'Factor Humano', 'factor-humano-mediapartner-V3.png', 'Factor Humano', '43', NULL),
(63, 'E-mkt Chile', 'e-marketing-mediapartner-V2.png', 'E-mkt Chile', '44', NULL),
(64, 'Partners Academy', 'partners-academy-mediapartner-V3.png', 'Partners Academy', '45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `aliados_pro`
--

DROP TABLE IF EXISTS `aliados_pro`;
CREATE TABLE `aliados_pro` (
  `id` int NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image_home` varchar(255) DEFAULT NULL,
  `alt_image_home` varchar(255) DEFAULT NULL,
  `link_site` varchar(255) DEFAULT NULL,
  `orden_home` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description_card` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `orden_card` varchar(255) DEFAULT NULL,
  `description` text,
  `image_landing` varchar(255) DEFAULT NULL,
  `alt_image_landing` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `image_youtube` varchar(255) DEFAULT NULL,
  `alt_image_youtube` varchar(255) DEFAULT NULL,
  `title_magnet` text,
  `description_magnet` text,
  `link_magnet` varchar(255) DEFAULT NULL,
  `title_learnmore` text,
  `description_learnmore` text,
  `link_learnmore` varchar(255) DEFAULT NULL,
  `status` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `aliados_pro`
--

INSERT INTO `aliados_pro` (`id`, `name`, `image_home`, `alt_image_home`, `link_site`, `orden_home`, `title`, `description_card`, `slug`, `orden_card`, `description`, `image_landing`, `alt_image_landing`, `youtube`, `image_youtube`, `alt_image_youtube`, `title_magnet`, `description_magnet`, `link_magnet`, `title_learnmore`, `description_learnmore`, `link_learnmore`, `status`) VALUES
(6, 'Siteground', 'siteground-pro (1).png', 'Siteground', 'https://siteground.es', '10', 'Experiencia de usuario, hosting y resultados de negocio', 'Mejora la experiencia de usuario de tu negocio en Internet y optimiza tus resultados', 'siteground', '10', 'Descubre en esta píldora de 15 minutos cómo mejorar la experiencia de usuario de tu negocio en Internet y optimizar tus resultados. Diseño, CTAs, objetivos y rendimiento, entre otros.                     ', 'siteground-capsula.png', 'Siteground', 'PMP3wF2JFc0', '', '', 'eBook gratis de Marketing de Contenidos ', 'Diseña la estrategia de contenidos de tu negocio y mide resultados de forma práctica y fácil con el eBook gratuito de SiteGround.                        ', 'https://stgrnd.co/dopplerebookcontenidos ', 'Tu sitio web hasta un 500% más rápido', 'SiteGround es el hosting web gestionado especializado en WordPress en el que confían los propietarios de más de 2 millones de dominios. Incluye multitud de soluciones internas únicas que hacen que tus webs sean más rápidas y seguras y soporte experto 24h en español.\r\n', 'https://www.siteground.es/', NULL),
(7, 'Doofinder', 'doofinder-pro (1).png', 'Doofinder', 'https://bit.ly/3A4xoNc', '20', '¿Cómo se comportan tus clientes?', 'Ayuda a tus clientes a encontrar lo que buscan y mejorar las ventas de tu E-commerce', 'doofinder', '20', 'Puedes tratar de intuirlo o preguntárselo, pero la única manera fiable de saber qué hacen tus clientes cuando llegan a tu eCommerce es con datos. Descubre cómo averiguar lo que más quieren, qué valor real tiene esta información y cómo plantear estrategias para ayudarles a encontrar lo que buscan y mejorar tus ventas.', 'doofinder-capsula (2).png', 'Doofinder', '', 'imagen-capsula-doofinder.png', 'Estrategias para Ecommerce', 'Curso Growth Hacking para eCommerce', 'Haz crecer tu eCommerce con el método que usó (y usa) Amazon para convertirse en lo que es. Un curso gratuito de 6 emails, con vídeos y artículos, donde adquirirás conocimientos muy prácticos y aplicables con pocos recursos en el día a día de tu tienda online.', 'https://go.doofinder.com/curso-growth?utm_source=event&utm_medium=web%20&utm_campaign=doppler%20 ', 'El plus que tu eCommerce necesita', 'Imagina que la persona más apropiada para trabajar en tu tienda estuviera a un clic de distancia. Lista en menos de 5 minutos. Siempre dispuesta a ayudar a tus clientes a encontrar, descubrir y comprar. Y entrenada para aumentar tus ventas en un 10-20%.', 'https://www.doofinder.com/es/?utm_source=event&utm_medium=web%20&utm_campaign=doppler%20 ', NULL),
(8, 'Tiendup', 'tiendup-pro-20220913.png', 'tiendup', 'https://tiendup.com?utm_source=emms&utm_medium=landing&utm_campaign=emms&utm_content=web ', '30', 'Negocios digitales', 'Descubre cómo aprovechar un negocio digital para ganar visibilidad y autoridad con tu marca.', 'tiendup', '30', '¿Compartirías tu conocimiento para aumentar la venta de tus servicios? Miles de profesionales y negocios de Latam lograron posicionarse como autoridad compartiendo lo que saben y obviamente esto les trajo grandes beneficios. En este video te contamos como aprovechar un negocio digital para ganar visibilidad y autoridad con tu marca. \r\n', 'tiendup-capsula.png', 'negocios-digitales', 'GlsFjpQW5bI', 'imagen-capsula-tiendup.png', 'visivilidad-negocios-digitales', 'Inicia tu negocio digital paso a paso ', 'Los negocios digitales y la escalabilidad que ofrecen pueden darte un nuevo horizonte de posibilidades. Si estás viendo esto, seguro ya tenes todo lo necesario para empezar ¿La clave? No saltarse pasos. En este e-book mostramos cómo evitar los errores más comunes. ', 'https://recursos.tiendup.com/p/como-iniciar-tu-negocio-digital?utm_source=emms&utm_med ium=landing&utm_campaign=emms&utm_content=ebook ', 'Tiendup ', 'Tiendup es una plataforma de e-commerce para negocios digitales, dónde vas a encontrar distintas soluciones para vender todo tipo de productos, como: cursos online, descargables, accesos a eventos, sesiones y productos físicos. Todo desde tu propio sitio web de venta.', 'https://tiendup.com?utm_source=emms&utm_medium=landing&utm_campaign=emms&utm _content=web', NULL),
(9, 'Metricool', 'metricool-pro.png', 'Metricool', 'https://metricool.com/?&utm_source=doppler&utm_medium=referral&utm_campaign=emms2022&utm_term=q2', '40', 'Métricas para crecer en redes', 'Cómo encontrar a golpe de vista los datos necesarios para tomar decisiones correctas en redes sociales.', 'metricool', '40', 'Te mostramos cómo encontrar a golpe de vista los datos necesarios para tomar decisiones correctas en redes sociales.\r\nAsí podrás analizar al detalle el rendimiento de tus publicaciones y crear un plan de contenido rompedor.\r\nY ojo al dato: sácale el partido a tus competidores. Obsérvalos bajo lupa y conoce a tu público objetivo.', 'metricool-capsula.png', 'metricool', 'QWdU3MJVJC0', '', '', 'De regalo: nuestra plantilla de estrategia', 'Descarga gratis esta plantilla, organiza tu estrategia de contenidos para todos los canales y olvídate de trabajar con un sinfín de archivos.\r\nCon ella podrás crear tu plan editorial para cada semana con las ideas principales y desarrollar en detalle el contenido.', 'https://bit.ly/PlantillaMetricoolEMMS2022', 'Prueba Metricool Premium GRATIS por 30 días', 'Prueba las funcionalidades favoritas de los Metricoolers: programar contenido en LinkedIn, comparar más competidores, descargar informes personalizados, acceder a métricas ilimitadas, utilizar en buscador de hashtag, aprovechar el conector de Google Data Studio, y más.', ' https://app.metricool.com/settings-subscription?couponcode=EMMS2022L', NULL),
(11, 'Ontranslation', 'on-translation-pro.png', 'Ontranslation', 'https://ontranslation.es', '90', 'Estrategias de traducción web', 'Estrategias para comunicarte digitalmente con tus clientes gracias a una combinación de servicios de traducción.', 'ontranslation', '90', 'Vender cross-border con éxito no es conectar nuestra web o ecommerce a una API de traducción automática. Dependerá de en qué fase de internacionalización estemos y del tipo de contenido de nuestra web. Aprende las estrategias básicas para comunicarte con tus clientes mediante servicios de traducción.', 'on-translation-capsula.png', 'ontranslation', '', 'imagen-capsula-onstranslation.png', 'Estrategias-cross-border', 'Guía rápida para hacer negocios por el mundo', '¿Tienes una web y vas a vender en otros países? No te pierdas nuestra guía que recoge las principales diferencias culturales que influyen cuando hacemos negocios. Descubre por qué no es lo mismo comunicarse con un chino que con un alemán y ten éxito internacionalmente. ', 'http://10f3034cf9b.benchmarkpages.com/emms2022 ', 'Conoce más sobre Ontranslation', 'Tanto si empiezas como si llevas años vendiendo en otros países, confía en Ontranslation agencia de traducción y comunicación multilingüe. Con +10 años de experiencia y certificados ISO 9011, te ayudarán a trazar la mejor estrategia para internacionalizar de tu negocio.', 'https://ontranslation.es', NULL),
(12, 'easycommerce®️', 'easycommerce-starter.png', 'easycommerce®️', 'https://www.easycommerce.tech/', '99', 'Tu roadmap de Ecommerce e Integraciones', 'Descubre cuáles son las integraciones que no pueden faltar en tu ecommerce para lograr el éxito. ', 'easycommerce.tech', '99', 'Ya sea que cuentes con un ecommerce B2C, B2B o B2B2C, si buscas ampliar el alcance de tus  clientes y abrir un nuevo canal de ventas, debes crear una experiencia de cliente perfecta, en todas las plataformas. \r\nDescubre cuáles son las integraciones que no pueden faltar en tu ecommerce para lograr el éxito.', 'easycommerce-capsula (1).png', 'easycommerce', 'cUtnt2jEPTI', '', '', 'Guía ecommerce 2022: Especial Plataformas B2B2C', 'Hoy, más que nunca, los operadores B2B2C con éxito son ágiles, transparentes, están conectados y se centran en el cliente. \r\nEn esta guía descubrirás las posibilidades que te brinda una plataforma B2B2C. ', 'https://easycommerce.tech/documentos/Guia-Ecommerce-2022-easycommerce.pdf', 'Conoce más sobre easycommerce®️', 'easycommerce®️ es una plataforma de comercio electrónico dedicada a desarrollar, consolidar y expandir el negocio de nuestros clientes en internet. Integramos con todas las soluciones IT y servicios de valor agregado que necesitas para tu negocio. \r\n', 'https://www.easycommerce.tech/', NULL),
(13, 'fede', 'batman-logo.png', 'batman-logo-amarillo', '', '5', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `aliados_starter`
--

DROP TABLE IF EXISTS `aliados_starter`;
CREATE TABLE `aliados_starter` (
  `id` int NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image_home` varchar(255) DEFAULT NULL,
  `alt_image_home` varchar(255) DEFAULT NULL,
  `link_site` varchar(255) DEFAULT NULL,
  `orden_home` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description_card` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `orden_card` varchar(255) DEFAULT NULL,
  `description` text,
  `image_landing` varchar(255) DEFAULT NULL,
  `alt_image_landing` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `image_youtube` varchar(255) DEFAULT NULL,
  `alt_image_youtube` varchar(255) DEFAULT NULL,
  `title_magnet` text,
  `description_magnet` text,
  `link_magnet` varchar(255) DEFAULT NULL,
  `title_learnmore` text,
  `description_learnmore` text,
  `link_learnmore` varchar(255) DEFAULT NULL,
  `status` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `google_oauth`
--

DROP TABLE IF EXISTS `google_oauth`;
CREATE TABLE `google_oauth` (
  `id` int NOT NULL,
  `provider` varchar(255) NOT NULL,
  `provider_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `google_oauth`
--

INSERT INTO `google_oauth` (`id`, `provider`, `provider_value`) VALUES
(1, 'google', '{\"access_token\":\"ya29.a0AeTM1ifDB1FFvy4p4Q6OkFYTklxgToY1JawOz5y2_UwsL24m0fJvmQC-8G9Dpq8tXBkRgvh6jCtzVe2jXA7Ng4x0YvtMUdM8BvIAO7M1UzgwWJe_DIKoyf2hdRIwz4GkatHWCDvtoPSMHW39pA157F1uw-UhaasaCgYKAWASARISFQHWtWOmhk_n1MyBEg4rszB--OHqZQ0166\",\"expires_in\":3599,\"scope\":\"https://www.googleapis.com/auth/spreadsheets\",\"token_type\":\"Bearer\",\"refresh_token\":\"1//0hxOIS9W4oqXZCgYIARAAGBESNwF-L9Irgwst8lyC5Bae8RyYuX6y3U-m1_wZdZYDIPoZSIJKyl1xdEcXlke10sDSBblQAPcWMfs\"}'),
(2, 'google', '{\"access_token\":\"ya29.a0AeTM1ifDB1FFvy4p4Q6OkFYTklxgToY1JawOz5y2_UwsL24m0fJvmQC-8G9Dpq8tXBkRgvh6jCtzVe2jXA7Ng4x0YvtMUdM8BvIAO7M1UzgwWJe_DIKoyf2hdRIwz4GkatHWCDvtoPSMHW39pA157F1uw-UhaasaCgYKAWASARISFQHWtWOmhk_n1MyBEg4rszB--OHqZQ0166\",\"expires_in\":3599,\"scope\":\"https://www.googleapis.com/auth/spreadsheets\",\"token_type\":\"Bearer\",\"refresh_token\":\"1//0hxOIS9W4oqXZCgYIARAAGBESNwF-L9Irgwst8lyC5Bae8RyYuX6y3U-m1_wZdZYDIPoZSIJKyl1xdEcXlke10sDSBblQAPcWMfs\"}'),
(3, 'google', '{\"access_token\":\"ya29.a0AeTM1ifDB1FFvy4p4Q6OkFYTklxgToY1JawOz5y2_UwsL24m0fJvmQC-8G9Dpq8tXBkRgvh6jCtzVe2jXA7Ng4x0YvtMUdM8BvIAO7M1UzgwWJe_DIKoyf2hdRIwz4GkatHWCDvtoPSMHW39pA157F1uw-UhaasaCgYKAWASARISFQHWtWOmhk_n1MyBEg4rszB--OHqZQ0166\",\"expires_in\":3599,\"scope\":\"https://www.googleapis.com/auth/spreadsheets\",\"token_type\":\"Bearer\",\"refresh_token\":\"1//0hxOIS9W4oqXZCgYIARAAGBESNwF-L9Irgwst8lyC5Bae8RyYuX6y3U-m1_wZdZYDIPoZSIJKyl1xdEcXlke10sDSBblQAPcWMfs\"}'),
(4, 'google', '{\"access_token\":\"ya29.a0AeTM1ifDB1FFvy4p4Q6OkFYTklxgToY1JawOz5y2_UwsL24m0fJvmQC-8G9Dpq8tXBkRgvh6jCtzVe2jXA7Ng4x0YvtMUdM8BvIAO7M1UzgwWJe_DIKoyf2hdRIwz4GkatHWCDvtoPSMHW39pA157F1uw-UhaasaCgYKAWASARISFQHWtWOmhk_n1MyBEg4rszB--OHqZQ0166\",\"expires_in\":3599,\"scope\":\"https://www.googleapis.com/auth/spreadsheets\",\"token_type\":\"Bearer\",\"refresh_token\":\"1//0hxOIS9W4oqXZCgYIARAAGBESNwF-L9Irgwst8lyC5Bae8RyYuX6y3U-m1_wZdZYDIPoZSIJKyl1xdEcXlke10sDSBblQAPcWMfs\"}'),
(5, 'google', '{\"access_token\":\"ya29.a0AeTM1ifDB1FFvy4p4Q6OkFYTklxgToY1JawOz5y2_UwsL24m0fJvmQC-8G9Dpq8tXBkRgvh6jCtzVe2jXA7Ng4x0YvtMUdM8BvIAO7M1UzgwWJe_DIKoyf2hdRIwz4GkatHWCDvtoPSMHW39pA157F1uw-UhaasaCgYKAWASARISFQHWtWOmhk_n1MyBEg4rszB--OHqZQ0166\",\"expires_in\":3599,\"scope\":\"https://www.googleapis.com/auth/spreadsheets\",\"token_type\":\"Bearer\",\"refresh_token\":\"1//0hxOIS9W4oqXZCgYIARAAGBESNwF-L9Irgwst8lyC5Bae8RyYuX6y3U-m1_wZdZYDIPoZSIJKyl1xdEcXlke10sDSBblQAPcWMfs\"}'),
(6, 'google', '{\"access_token\":\"ya29.a0AeTM1ifDB1FFvy4p4Q6OkFYTklxgToY1JawOz5y2_UwsL24m0fJvmQC-8G9Dpq8tXBkRgvh6jCtzVe2jXA7Ng4x0YvtMUdM8BvIAO7M1UzgwWJe_DIKoyf2hdRIwz4GkatHWCDvtoPSMHW39pA157F1uw-UhaasaCgYKAWASARISFQHWtWOmhk_n1MyBEg4rszB--OHqZQ0166\",\"expires_in\":3599,\"scope\":\"https://www.googleapis.com/auth/spreadsheets\",\"token_type\":\"Bearer\",\"refresh_token\":\"1//0hxOIS9W4oqXZCgYIARAAGBESNwF-L9Irgwst8lyC5Bae8RyYuX6y3U-m1_wZdZYDIPoZSIJKyl1xdEcXlke10sDSBblQAPcWMfs\"}'),
(7, 'google', '{\"access_token\":\"ya29.a0AeTM1ifDB1FFvy4p4Q6OkFYTklxgToY1JawOz5y2_UwsL24m0fJvmQC-8G9Dpq8tXBkRgvh6jCtzVe2jXA7Ng4x0YvtMUdM8BvIAO7M1UzgwWJe_DIKoyf2hdRIwz4GkatHWCDvtoPSMHW39pA157F1uw-UhaasaCgYKAWASARISFQHWtWOmhk_n1MyBEg4rszB--OHqZQ0166\",\"expires_in\":3599,\"scope\":\"https://www.googleapis.com/auth/spreadsheets\",\"token_type\":\"Bearer\",\"refresh_token\":\"1//0hxOIS9W4oqXZCgYIARAAGBESNwF-L9Irgwst8lyC5Bae8RyYuX6y3U-m1_wZdZYDIPoZSIJKyl1xdEcXlke10sDSBblQAPcWMfs\"}'),
(8, 'google', '{\"access_token\":\"ya29.a0AeTM1ifDB1FFvy4p4Q6OkFYTklxgToY1JawOz5y2_UwsL24m0fJvmQC-8G9Dpq8tXBkRgvh6jCtzVe2jXA7Ng4x0YvtMUdM8BvIAO7M1UzgwWJe_DIKoyf2hdRIwz4GkatHWCDvtoPSMHW39pA157F1uw-UhaasaCgYKAWASARISFQHWtWOmhk_n1MyBEg4rszB--OHqZQ0166\",\"expires_in\":3599,\"scope\":\"https://www.googleapis.com/auth/spreadsheets\",\"token_type\":\"Bearer\",\"refresh_token\":\"1//0hxOIS9W4oqXZCgYIARAAGBESNwF-L9Irgwst8lyC5Bae8RyYuX6y3U-m1_wZdZYDIPoZSIJKyl1xdEcXlke10sDSBblQAPcWMfs\"}'),
(9, 'google', '{\"access_token\":\"ya29.a0AeTM1ifDB1FFvy4p4Q6OkFYTklxgToY1JawOz5y2_UwsL24m0fJvmQC-8G9Dpq8tXBkRgvh6jCtzVe2jXA7Ng4x0YvtMUdM8BvIAO7M1UzgwWJe_DIKoyf2hdRIwz4GkatHWCDvtoPSMHW39pA157F1uw-UhaasaCgYKAWASARISFQHWtWOmhk_n1MyBEg4rszB--OHqZQ0166\",\"expires_in\":3599,\"scope\":\"https://www.googleapis.com/auth/spreadsheets\",\"token_type\":\"Bearer\",\"refresh_token\":\"1//0hxOIS9W4oqXZCgYIARAAGBESNwF-L9Irgwst8lyC5Bae8RyYuX6y3U-m1_wZdZYDIPoZSIJKyl1xdEcXlke10sDSBblQAPcWMfs\"}'),
(10, 'google', '{\"access_token\":\"ya29.a0AeTM1ifDB1FFvy4p4Q6OkFYTklxgToY1JawOz5y2_UwsL24m0fJvmQC-8G9Dpq8tXBkRgvh6jCtzVe2jXA7Ng4x0YvtMUdM8BvIAO7M1UzgwWJe_DIKoyf2hdRIwz4GkatHWCDvtoPSMHW39pA157F1uw-UhaasaCgYKAWASARISFQHWtWOmhk_n1MyBEg4rszB--OHqZQ0166\",\"expires_in\":3599,\"scope\":\"https://www.googleapis.com/auth/spreadsheets\",\"token_type\":\"Bearer\",\"refresh_token\":\"1//0hxOIS9W4oqXZCgYIARAAGBESNwF-L9Irgwst8lyC5Bae8RyYuX6y3U-m1_wZdZYDIPoZSIJKyl1xdEcXlke10sDSBblQAPcWMfs\"}'),
(11, 'google', '{\"access_token\":\"ya29.a0AeTM1ifDB1FFvy4p4Q6OkFYTklxgToY1JawOz5y2_UwsL24m0fJvmQC-8G9Dpq8tXBkRgvh6jCtzVe2jXA7Ng4x0YvtMUdM8BvIAO7M1UzgwWJe_DIKoyf2hdRIwz4GkatHWCDvtoPSMHW39pA157F1uw-UhaasaCgYKAWASARISFQHWtWOmhk_n1MyBEg4rszB--OHqZQ0166\",\"expires_in\":3599,\"scope\":\"https://www.googleapis.com/auth/spreadsheets\",\"token_type\":\"Bearer\",\"refresh_token\":\"1//0hxOIS9W4oqXZCgYIARAAGBESNwF-L9Irgwst8lyC5Bae8RyYuX6y3U-m1_wZdZYDIPoZSIJKyl1xdEcXlke10sDSBblQAPcWMfs\"}'),
(12, 'google', '{\"access_token\":\"ya29.a0AeTM1ifDB1FFvy4p4Q6OkFYTklxgToY1JawOz5y2_UwsL24m0fJvmQC-8G9Dpq8tXBkRgvh6jCtzVe2jXA7Ng4x0YvtMUdM8BvIAO7M1UzgwWJe_DIKoyf2hdRIwz4GkatHWCDvtoPSMHW39pA157F1uw-UhaasaCgYKAWASARISFQHWtWOmhk_n1MyBEg4rszB--OHqZQ0166\",\"expires_in\":3599,\"scope\":\"https://www.googleapis.com/auth/spreadsheets\",\"token_type\":\"Bearer\",\"refresh_token\":\"1//0hxOIS9W4oqXZCgYIARAAGBESNwF-L9Irgwst8lyC5Bae8RyYuX6y3U-m1_wZdZYDIPoZSIJKyl1xdEcXlke10sDSBblQAPcWMfs\"}'),
(13, 'google', '{\"access_token\":\"ya29.a0AeTM1ifDB1FFvy4p4Q6OkFYTklxgToY1JawOz5y2_UwsL24m0fJvmQC-8G9Dpq8tXBkRgvh6jCtzVe2jXA7Ng4x0YvtMUdM8BvIAO7M1UzgwWJe_DIKoyf2hdRIwz4GkatHWCDvtoPSMHW39pA157F1uw-UhaasaCgYKAWASARISFQHWtWOmhk_n1MyBEg4rszB--OHqZQ0166\",\"expires_in\":3599,\"scope\":\"https://www.googleapis.com/auth/spreadsheets\",\"token_type\":\"Bearer\",\"refresh_token\":\"1//0hxOIS9W4oqXZCgYIARAAGBESNwF-L9Irgwst8lyC5Bae8RyYuX6y3U-m1_wZdZYDIPoZSIJKyl1xdEcXlke10sDSBblQAPcWMfs\"}'),
(14, 'google', '{\"access_token\":\"ya29.a0AeTM1ifDB1FFvy4p4Q6OkFYTklxgToY1JawOz5y2_UwsL24m0fJvmQC-8G9Dpq8tXBkRgvh6jCtzVe2jXA7Ng4x0YvtMUdM8BvIAO7M1UzgwWJe_DIKoyf2hdRIwz4GkatHWCDvtoPSMHW39pA157F1uw-UhaasaCgYKAWASARISFQHWtWOmhk_n1MyBEg4rszB--OHqZQ0166\",\"expires_in\":3599,\"scope\":\"https://www.googleapis.com/auth/spreadsheets\",\"token_type\":\"Bearer\",\"refresh_token\":\"1//0hxOIS9W4oqXZCgYIARAAGBESNwF-L9Irgwst8lyC5Bae8RyYuX6y3U-m1_wZdZYDIPoZSIJKyl1xdEcXlke10sDSBblQAPcWMfs\"}'),
(15, 'google', '{\"access_token\":\"ya29.a0AeTM1ifDB1FFvy4p4Q6OkFYTklxgToY1JawOz5y2_UwsL24m0fJvmQC-8G9Dpq8tXBkRgvh6jCtzVe2jXA7Ng4x0YvtMUdM8BvIAO7M1UzgwWJe_DIKoyf2hdRIwz4GkatHWCDvtoPSMHW39pA157F1uw-UhaasaCgYKAWASARISFQHWtWOmhk_n1MyBEg4rszB--OHqZQ0166\",\"expires_in\":3599,\"scope\":\"https://www.googleapis.com/auth/spreadsheets\",\"token_type\":\"Bearer\",\"refresh_token\":\"1//0hxOIS9W4oqXZCgYIARAAGBESNwF-L9Irgwst8lyC5Bae8RyYuX6y3U-m1_wZdZYDIPoZSIJKyl1xdEcXlke10sDSBblQAPcWMfs\"}'),
(16, 'google', '{\"access_token\":\"ya29.a0AeTM1ifDB1FFvy4p4Q6OkFYTklxgToY1JawOz5y2_UwsL24m0fJvmQC-8G9Dpq8tXBkRgvh6jCtzVe2jXA7Ng4x0YvtMUdM8BvIAO7M1UzgwWJe_DIKoyf2hdRIwz4GkatHWCDvtoPSMHW39pA157F1uw-UhaasaCgYKAWASARISFQHWtWOmhk_n1MyBEg4rszB--OHqZQ0166\",\"expires_in\":3599,\"scope\":\"https://www.googleapis.com/auth/spreadsheets\",\"token_type\":\"Bearer\",\"refresh_token\":\"1//0hxOIS9W4oqXZCgYIARAAGBESNwF-L9Irgwst8lyC5Bae8RyYuX6y3U-m1_wZdZYDIPoZSIJKyl1xdEcXlke10sDSBblQAPcWMfs\"}'),
(17, 'google', '{\"access_token\":\"ya29.a0AeTM1ifDB1FFvy4p4Q6OkFYTklxgToY1JawOz5y2_UwsL24m0fJvmQC-8G9Dpq8tXBkRgvh6jCtzVe2jXA7Ng4x0YvtMUdM8BvIAO7M1UzgwWJe_DIKoyf2hdRIwz4GkatHWCDvtoPSMHW39pA157F1uw-UhaasaCgYKAWASARISFQHWtWOmhk_n1MyBEg4rszB--OHqZQ0166\",\"expires_in\":3599,\"scope\":\"https://www.googleapis.com/auth/spreadsheets\",\"token_type\":\"Bearer\",\"refresh_token\":\"1//0hxOIS9W4oqXZCgYIARAAGBESNwF-L9Irgwst8lyC5Bae8RyYuX6y3U-m1_wZdZYDIPoZSIJKyl1xdEcXlke10sDSBblQAPcWMfs\"}'),
(18, 'google', '{\"access_token\":\"ya29.a0AeTM1ifDB1FFvy4p4Q6OkFYTklxgToY1JawOz5y2_UwsL24m0fJvmQC-8G9Dpq8tXBkRgvh6jCtzVe2jXA7Ng4x0YvtMUdM8BvIAO7M1UzgwWJe_DIKoyf2hdRIwz4GkatHWCDvtoPSMHW39pA157F1uw-UhaasaCgYKAWASARISFQHWtWOmhk_n1MyBEg4rszB--OHqZQ0166\",\"expires_in\":3599,\"scope\":\"https://www.googleapis.com/auth/spreadsheets\",\"token_type\":\"Bearer\",\"refresh_token\":\"1//0hxOIS9W4oqXZCgYIARAAGBESNwF-L9Irgwst8lyC5Bae8RyYuX6y3U-m1_wZdZYDIPoZSIJKyl1xdEcXlke10sDSBblQAPcWMfs\"}'),
(19, 'google', '{\"access_token\":\"ya29.a0AeTM1ifDB1FFvy4p4Q6OkFYTklxgToY1JawOz5y2_UwsL24m0fJvmQC-8G9Dpq8tXBkRgvh6jCtzVe2jXA7Ng4x0YvtMUdM8BvIAO7M1UzgwWJe_DIKoyf2hdRIwz4GkatHWCDvtoPSMHW39pA157F1uw-UhaasaCgYKAWASARISFQHWtWOmhk_n1MyBEg4rszB--OHqZQ0166\",\"expires_in\":3599,\"scope\":\"https://www.googleapis.com/auth/spreadsheets\",\"token_type\":\"Bearer\",\"refresh_token\":\"1//0hxOIS9W4oqXZCgYIARAAGBESNwF-L9Irgwst8lyC5Bae8RyYuX6y3U-m1_wZdZYDIPoZSIJKyl1xdEcXlke10sDSBblQAPcWMfs\"}'),
(20, 'google', '{\"access_token\":\"ya29.a0AeTM1ifDB1FFvy4p4Q6OkFYTklxgToY1JawOz5y2_UwsL24m0fJvmQC-8G9Dpq8tXBkRgvh6jCtzVe2jXA7Ng4x0YvtMUdM8BvIAO7M1UzgwWJe_DIKoyf2hdRIwz4GkatHWCDvtoPSMHW39pA157F1uw-UhaasaCgYKAWASARISFQHWtWOmhk_n1MyBEg4rszB--OHqZQ0166\",\"expires_in\":3599,\"scope\":\"https://www.googleapis.com/auth/spreadsheets\",\"token_type\":\"Bearer\",\"refresh_token\":\"1//0hxOIS9W4oqXZCgYIARAAGBESNwF-L9Irgwst8lyC5Bae8RyYuX6y3U-m1_wZdZYDIPoZSIJKyl1xdEcXlke10sDSBblQAPcWMfs\"}'),
(21, 'google', '{\"access_token\":\"ya29.a0AeTM1ifDB1FFvy4p4Q6OkFYTklxgToY1JawOz5y2_UwsL24m0fJvmQC-8G9Dpq8tXBkRgvh6jCtzVe2jXA7Ng4x0YvtMUdM8BvIAO7M1UzgwWJe_DIKoyf2hdRIwz4GkatHWCDvtoPSMHW39pA157F1uw-UhaasaCgYKAWASARISFQHWtWOmhk_n1MyBEg4rszB--OHqZQ0166\",\"expires_in\":3599,\"scope\":\"https://www.googleapis.com/auth/spreadsheets\",\"token_type\":\"Bearer\",\"refresh_token\":\"1//0hxOIS9W4oqXZCgYIARAAGBESNwF-L9Irgwst8lyC5Bae8RyYuX6y3U-m1_wZdZYDIPoZSIJKyl1xdEcXlke10sDSBblQAPcWMfs\"}'),
(22, 'google', '{\"access_token\":\"ya29.a0AeTM1ifDB1FFvy4p4Q6OkFYTklxgToY1JawOz5y2_UwsL24m0fJvmQC-8G9Dpq8tXBkRgvh6jCtzVe2jXA7Ng4x0YvtMUdM8BvIAO7M1UzgwWJe_DIKoyf2hdRIwz4GkatHWCDvtoPSMHW39pA157F1uw-UhaasaCgYKAWASARISFQHWtWOmhk_n1MyBEg4rszB--OHqZQ0166\",\"expires_in\":3599,\"scope\":\"https://www.googleapis.com/auth/spreadsheets\",\"token_type\":\"Bearer\",\"refresh_token\":\"1//0hxOIS9W4oqXZCgYIARAAGBESNwF-L9Irgwst8lyC5Bae8RyYuX6y3U-m1_wZdZYDIPoZSIJKyl1xdEcXlke10sDSBblQAPcWMfs\"}'),
(23, 'google', '{\"access_token\":\"ya29.a0AeTM1ifDB1FFvy4p4Q6OkFYTklxgToY1JawOz5y2_UwsL24m0fJvmQC-8G9Dpq8tXBkRgvh6jCtzVe2jXA7Ng4x0YvtMUdM8BvIAO7M1UzgwWJe_DIKoyf2hdRIwz4GkatHWCDvtoPSMHW39pA157F1uw-UhaasaCgYKAWASARISFQHWtWOmhk_n1MyBEg4rszB--OHqZQ0166\",\"expires_in\":3599,\"scope\":\"https://www.googleapis.com/auth/spreadsheets\",\"token_type\":\"Bearer\",\"refresh_token\":\"1//0hxOIS9W4oqXZCgYIARAAGBESNwF-L9Irgwst8lyC5Bae8RyYuX6y3U-m1_wZdZYDIPoZSIJKyl1xdEcXlke10sDSBblQAPcWMfs\"}'),
(24, 'google', '{\"access_token\":\"ya29.a0AeTM1ifDB1FFvy4p4Q6OkFYTklxgToY1JawOz5y2_UwsL24m0fJvmQC-8G9Dpq8tXBkRgvh6jCtzVe2jXA7Ng4x0YvtMUdM8BvIAO7M1UzgwWJe_DIKoyf2hdRIwz4GkatHWCDvtoPSMHW39pA157F1uw-UhaasaCgYKAWASARISFQHWtWOmhk_n1MyBEg4rszB--OHqZQ0166\",\"expires_in\":3599,\"scope\":\"https://www.googleapis.com/auth/spreadsheets\",\"token_type\":\"Bearer\",\"refresh_token\":\"1//0hxOIS9W4oqXZCgYIARAAGBESNwF-L9Irgwst8lyC5Bae8RyYuX6y3U-m1_wZdZYDIPoZSIJKyl1xdEcXlke10sDSBblQAPcWMfs\"}'),
(25, 'google', '{\"access_token\":\"ya29.a0AeTM1ifDB1FFvy4p4Q6OkFYTklxgToY1JawOz5y2_UwsL24m0fJvmQC-8G9Dpq8tXBkRgvh6jCtzVe2jXA7Ng4x0YvtMUdM8BvIAO7M1UzgwWJe_DIKoyf2hdRIwz4GkatHWCDvtoPSMHW39pA157F1uw-UhaasaCgYKAWASARISFQHWtWOmhk_n1MyBEg4rszB--OHqZQ0166\",\"expires_in\":3599,\"scope\":\"https://www.googleapis.com/auth/spreadsheets\",\"token_type\":\"Bearer\",\"refresh_token\":\"1//0hxOIS9W4oqXZCgYIARAAGBESNwF-L9Irgwst8lyC5Bae8RyYuX6y3U-m1_wZdZYDIPoZSIJKyl1xdEcXlke10sDSBblQAPcWMfs\"}'),
(26, 'google', '{\"access_token\":\"ya29.a0AeTM1ifDB1FFvy4p4Q6OkFYTklxgToY1JawOz5y2_UwsL24m0fJvmQC-8G9Dpq8tXBkRgvh6jCtzVe2jXA7Ng4x0YvtMUdM8BvIAO7M1UzgwWJe_DIKoyf2hdRIwz4GkatHWCDvtoPSMHW39pA157F1uw-UhaasaCgYKAWASARISFQHWtWOmhk_n1MyBEg4rszB--OHqZQ0166\",\"expires_in\":3599,\"scope\":\"https://www.googleapis.com/auth/spreadsheets\",\"token_type\":\"Bearer\",\"refresh_token\":\"1//0hxOIS9W4oqXZCgYIARAAGBESNwF-L9Irgwst8lyC5Bae8RyYuX6y3U-m1_wZdZYDIPoZSIJKyl1xdEcXlke10sDSBblQAPcWMfs\"}'),
(27, 'google', '{\"access_token\":\"ya29.a0AeTM1ifDB1FFvy4p4Q6OkFYTklxgToY1JawOz5y2_UwsL24m0fJvmQC-8G9Dpq8tXBkRgvh6jCtzVe2jXA7Ng4x0YvtMUdM8BvIAO7M1UzgwWJe_DIKoyf2hdRIwz4GkatHWCDvtoPSMHW39pA157F1uw-UhaasaCgYKAWASARISFQHWtWOmhk_n1MyBEg4rszB--OHqZQ0166\",\"expires_in\":3599,\"scope\":\"https://www.googleapis.com/auth/spreadsheets\",\"token_type\":\"Bearer\",\"refresh_token\":\"1//0hxOIS9W4oqXZCgYIARAAGBESNwF-L9Irgwst8lyC5Bae8RyYuX6y3U-m1_wZdZYDIPoZSIJKyl1xdEcXlke10sDSBblQAPcWMfs\"}'),
(28, 'google', '{\"access_token\":\"ya29.a0AeTM1ifDB1FFvy4p4Q6OkFYTklxgToY1JawOz5y2_UwsL24m0fJvmQC-8G9Dpq8tXBkRgvh6jCtzVe2jXA7Ng4x0YvtMUdM8BvIAO7M1UzgwWJe_DIKoyf2hdRIwz4GkatHWCDvtoPSMHW39pA157F1uw-UhaasaCgYKAWASARISFQHWtWOmhk_n1MyBEg4rszB--OHqZQ0166\",\"expires_in\":3599,\"scope\":\"https://www.googleapis.com/auth/spreadsheets\",\"token_type\":\"Bearer\",\"refresh_token\":\"1//0hxOIS9W4oqXZCgYIARAAGBESNwF-L9Irgwst8lyC5Bae8RyYuX6y3U-m1_wZdZYDIPoZSIJKyl1xdEcXlke10sDSBblQAPcWMfs\"}'),
(29, 'google', '{\"access_token\":\"ya29.a0AeTM1ifDB1FFvy4p4Q6OkFYTklxgToY1JawOz5y2_UwsL24m0fJvmQC-8G9Dpq8tXBkRgvh6jCtzVe2jXA7Ng4x0YvtMUdM8BvIAO7M1UzgwWJe_DIKoyf2hdRIwz4GkatHWCDvtoPSMHW39pA157F1uw-UhaasaCgYKAWASARISFQHWtWOmhk_n1MyBEg4rszB--OHqZQ0166\",\"expires_in\":3599,\"scope\":\"https://www.googleapis.com/auth/spreadsheets\",\"token_type\":\"Bearer\",\"refresh_token\":\"1//0hxOIS9W4oqXZCgYIARAAGBESNwF-L9Irgwst8lyC5Bae8RyYuX6y3U-m1_wZdZYDIPoZSIJKyl1xdEcXlke10sDSBblQAPcWMfs\"}'),
(30, 'google', '{\"access_token\":\"ya29.a0AeTM1ifDB1FFvy4p4Q6OkFYTklxgToY1JawOz5y2_UwsL24m0fJvmQC-8G9Dpq8tXBkRgvh6jCtzVe2jXA7Ng4x0YvtMUdM8BvIAO7M1UzgwWJe_DIKoyf2hdRIwz4GkatHWCDvtoPSMHW39pA157F1uw-UhaasaCgYKAWASARISFQHWtWOmhk_n1MyBEg4rszB--OHqZQ0166\",\"expires_in\":3599,\"scope\":\"https://www.googleapis.com/auth/spreadsheets\",\"token_type\":\"Bearer\",\"refresh_token\":\"1//0hxOIS9W4oqXZCgYIARAAGBESNwF-L9Irgwst8lyC5Bae8RyYuX6y3U-m1_wZdZYDIPoZSIJKyl1xdEcXlke10sDSBblQAPcWMfs\"}'),
(31, 'google', '{\"access_token\":\"ya29.a0AeTM1ifDB1FFvy4p4Q6OkFYTklxgToY1JawOz5y2_UwsL24m0fJvmQC-8G9Dpq8tXBkRgvh6jCtzVe2jXA7Ng4x0YvtMUdM8BvIAO7M1UzgwWJe_DIKoyf2hdRIwz4GkatHWCDvtoPSMHW39pA157F1uw-UhaasaCgYKAWASARISFQHWtWOmhk_n1MyBEg4rszB--OHqZQ0166\",\"expires_in\":3599,\"scope\":\"https://www.googleapis.com/auth/spreadsheets\",\"token_type\":\"Bearer\",\"refresh_token\":\"1//0hxOIS9W4oqXZCgYIARAAGBESNwF-L9Irgwst8lyC5Bae8RyYuX6y3U-m1_wZdZYDIPoZSIJKyl1xdEcXlke10sDSBblQAPcWMfs\"}'),
(32, 'google', '{\"access_token\":\"ya29.a0AeTM1ifDB1FFvy4p4Q6OkFYTklxgToY1JawOz5y2_UwsL24m0fJvmQC-8G9Dpq8tXBkRgvh6jCtzVe2jXA7Ng4x0YvtMUdM8BvIAO7M1UzgwWJe_DIKoyf2hdRIwz4GkatHWCDvtoPSMHW39pA157F1uw-UhaasaCgYKAWASARISFQHWtWOmhk_n1MyBEg4rszB--OHqZQ0166\",\"expires_in\":3599,\"scope\":\"https://www.googleapis.com/auth/spreadsheets\",\"token_type\":\"Bearer\",\"refresh_token\":\"1//0hxOIS9W4oqXZCgYIARAAGBESNwF-L9Irgwst8lyC5Bae8RyYuX6y3U-m1_wZdZYDIPoZSIJKyl1xdEcXlke10sDSBblQAPcWMfs\"}'),
(33, 'google', '{\"access_token\":\"ya29.a0AeTM1ifDB1FFvy4p4Q6OkFYTklxgToY1JawOz5y2_UwsL24m0fJvmQC-8G9Dpq8tXBkRgvh6jCtzVe2jXA7Ng4x0YvtMUdM8BvIAO7M1UzgwWJe_DIKoyf2hdRIwz4GkatHWCDvtoPSMHW39pA157F1uw-UhaasaCgYKAWASARISFQHWtWOmhk_n1MyBEg4rszB--OHqZQ0166\",\"expires_in\":3599,\"scope\":\"https://www.googleapis.com/auth/spreadsheets\",\"token_type\":\"Bearer\",\"refresh_token\":\"1//0hxOIS9W4oqXZCgYIARAAGBESNwF-L9Irgwst8lyC5Bae8RyYuX6y3U-m1_wZdZYDIPoZSIJKyl1xdEcXlke10sDSBblQAPcWMfs\"}'),
(34, 'google', '{\"access_token\":\"ya29.a0AeTM1ifDB1FFvy4p4Q6OkFYTklxgToY1JawOz5y2_UwsL24m0fJvmQC-8G9Dpq8tXBkRgvh6jCtzVe2jXA7Ng4x0YvtMUdM8BvIAO7M1UzgwWJe_DIKoyf2hdRIwz4GkatHWCDvtoPSMHW39pA157F1uw-UhaasaCgYKAWASARISFQHWtWOmhk_n1MyBEg4rszB--OHqZQ0166\",\"expires_in\":3599,\"scope\":\"https://www.googleapis.com/auth/spreadsheets\",\"token_type\":\"Bearer\",\"refresh_token\":\"1//0hxOIS9W4oqXZCgYIARAAGBESNwF-L9Irgwst8lyC5Bae8RyYuX6y3U-m1_wZdZYDIPoZSIJKyl1xdEcXlke10sDSBblQAPcWMfs\"}'),
(35, 'google', '{\"access_token\":\"ya29.a0AeTM1ifDB1FFvy4p4Q6OkFYTklxgToY1JawOz5y2_UwsL24m0fJvmQC-8G9Dpq8tXBkRgvh6jCtzVe2jXA7Ng4x0YvtMUdM8BvIAO7M1UzgwWJe_DIKoyf2hdRIwz4GkatHWCDvtoPSMHW39pA157F1uw-UhaasaCgYKAWASARISFQHWtWOmhk_n1MyBEg4rszB--OHqZQ0166\",\"expires_in\":3599,\"scope\":\"https://www.googleapis.com/auth/spreadsheets\",\"token_type\":\"Bearer\",\"refresh_token\":\"1//0hxOIS9W4oqXZCgYIARAAGBESNwF-L9Irgwst8lyC5Bae8RyYuX6y3U-m1_wZdZYDIPoZSIJKyl1xdEcXlke10sDSBblQAPcWMfs\"}'),
(36, 'google', '{\"access_token\":\"ya29.a0AeTM1ifDB1FFvy4p4Q6OkFYTklxgToY1JawOz5y2_UwsL24m0fJvmQC-8G9Dpq8tXBkRgvh6jCtzVe2jXA7Ng4x0YvtMUdM8BvIAO7M1UzgwWJe_DIKoyf2hdRIwz4GkatHWCDvtoPSMHW39pA157F1uw-UhaasaCgYKAWASARISFQHWtWOmhk_n1MyBEg4rszB--OHqZQ0166\",\"expires_in\":3599,\"scope\":\"https://www.googleapis.com/auth/spreadsheets\",\"token_type\":\"Bearer\",\"refresh_token\":\"1//0hxOIS9W4oqXZCgYIARAAGBESNwF-L9Irgwst8lyC5Bae8RyYuX6y3U-m1_wZdZYDIPoZSIJKyl1xdEcXlke10sDSBblQAPcWMfs\"}'),
(37, 'google', '{\"access_token\":\"ya29.a0AeTM1ifDB1FFvy4p4Q6OkFYTklxgToY1JawOz5y2_UwsL24m0fJvmQC-8G9Dpq8tXBkRgvh6jCtzVe2jXA7Ng4x0YvtMUdM8BvIAO7M1UzgwWJe_DIKoyf2hdRIwz4GkatHWCDvtoPSMHW39pA157F1uw-UhaasaCgYKAWASARISFQHWtWOmhk_n1MyBEg4rszB--OHqZQ0166\",\"expires_in\":3599,\"scope\":\"https://www.googleapis.com/auth/spreadsheets\",\"token_type\":\"Bearer\",\"refresh_token\":\"1//0hxOIS9W4oqXZCgYIARAAGBESNwF-L9Irgwst8lyC5Bae8RyYuX6y3U-m1_wZdZYDIPoZSIJKyl1xdEcXlke10sDSBblQAPcWMfs\"}'),
(38, 'google', '{\"access_token\":\"ya29.a0AeTM1ifDB1FFvy4p4Q6OkFYTklxgToY1JawOz5y2_UwsL24m0fJvmQC-8G9Dpq8tXBkRgvh6jCtzVe2jXA7Ng4x0YvtMUdM8BvIAO7M1UzgwWJe_DIKoyf2hdRIwz4GkatHWCDvtoPSMHW39pA157F1uw-UhaasaCgYKAWASARISFQHWtWOmhk_n1MyBEg4rszB--OHqZQ0166\",\"expires_in\":3599,\"scope\":\"https://www.googleapis.com/auth/spreadsheets\",\"token_type\":\"Bearer\",\"refresh_token\":\"1//0hxOIS9W4oqXZCgYIARAAGBESNwF-L9Irgwst8lyC5Bae8RyYuX6y3U-m1_wZdZYDIPoZSIJKyl1xdEcXlke10sDSBblQAPcWMfs\"}'),
(39, 'google', '{\"access_token\":\"ya29.a0AeTM1ifDB1FFvy4p4Q6OkFYTklxgToY1JawOz5y2_UwsL24m0fJvmQC-8G9Dpq8tXBkRgvh6jCtzVe2jXA7Ng4x0YvtMUdM8BvIAO7M1UzgwWJe_DIKoyf2hdRIwz4GkatHWCDvtoPSMHW39pA157F1uw-UhaasaCgYKAWASARISFQHWtWOmhk_n1MyBEg4rszB--OHqZQ0166\",\"expires_in\":3599,\"scope\":\"https://www.googleapis.com/auth/spreadsheets\",\"token_type\":\"Bearer\",\"refresh_token\":\"1//0hxOIS9W4oqXZCgYIARAAGBESNwF-L9Irgwst8lyC5Bae8RyYuX6y3U-m1_wZdZYDIPoZSIJKyl1xdEcXlke10sDSBblQAPcWMfs\"}'),
(40, 'google', '{\"access_token\":\"ya29.a0AeTM1ifDB1FFvy4p4Q6OkFYTklxgToY1JawOz5y2_UwsL24m0fJvmQC-8G9Dpq8tXBkRgvh6jCtzVe2jXA7Ng4x0YvtMUdM8BvIAO7M1UzgwWJe_DIKoyf2hdRIwz4GkatHWCDvtoPSMHW39pA157F1uw-UhaasaCgYKAWASARISFQHWtWOmhk_n1MyBEg4rszB--OHqZQ0166\",\"expires_in\":3599,\"scope\":\"https://www.googleapis.com/auth/spreadsheets\",\"token_type\":\"Bearer\",\"refresh_token\":\"1//0hxOIS9W4oqXZCgYIARAAGBESNwF-L9Irgwst8lyC5Bae8RyYuX6y3U-m1_wZdZYDIPoZSIJKyl1xdEcXlke10sDSBblQAPcWMfs\"}'),
(41, 'google', '{\"access_token\":\"ya29.a0AeTM1ifDB1FFvy4p4Q6OkFYTklxgToY1JawOz5y2_UwsL24m0fJvmQC-8G9Dpq8tXBkRgvh6jCtzVe2jXA7Ng4x0YvtMUdM8BvIAO7M1UzgwWJe_DIKoyf2hdRIwz4GkatHWCDvtoPSMHW39pA157F1uw-UhaasaCgYKAWASARISFQHWtWOmhk_n1MyBEg4rszB--OHqZQ0166\",\"expires_in\":3599,\"scope\":\"https://www.googleapis.com/auth/spreadsheets\",\"token_type\":\"Bearer\",\"refresh_token\":\"1//0hxOIS9W4oqXZCgYIARAAGBESNwF-L9Irgwst8lyC5Bae8RyYuX6y3U-m1_wZdZYDIPoZSIJKyl1xdEcXlke10sDSBblQAPcWMfs\"}'),
(42, 'google', '{\"access_token\":\"ya29.a0AeTM1ifDB1FFvy4p4Q6OkFYTklxgToY1JawOz5y2_UwsL24m0fJvmQC-8G9Dpq8tXBkRgvh6jCtzVe2jXA7Ng4x0YvtMUdM8BvIAO7M1UzgwWJe_DIKoyf2hdRIwz4GkatHWCDvtoPSMHW39pA157F1uw-UhaasaCgYKAWASARISFQHWtWOmhk_n1MyBEg4rszB--OHqZQ0166\",\"expires_in\":3599,\"scope\":\"https://www.googleapis.com/auth/spreadsheets\",\"token_type\":\"Bearer\",\"refresh_token\":\"1//0hxOIS9W4oqXZCgYIARAAGBESNwF-L9Irgwst8lyC5Bae8RyYuX6y3U-m1_wZdZYDIPoZSIJKyl1xdEcXlke10sDSBblQAPcWMfs\"}'),
(43, 'google', '{\"access_token\":\"ya29.a0AeTM1ifDB1FFvy4p4Q6OkFYTklxgToY1JawOz5y2_UwsL24m0fJvmQC-8G9Dpq8tXBkRgvh6jCtzVe2jXA7Ng4x0YvtMUdM8BvIAO7M1UzgwWJe_DIKoyf2hdRIwz4GkatHWCDvtoPSMHW39pA157F1uw-UhaasaCgYKAWASARISFQHWtWOmhk_n1MyBEg4rszB--OHqZQ0166\",\"expires_in\":3599,\"scope\":\"https://www.googleapis.com/auth/spreadsheets\",\"token_type\":\"Bearer\",\"refresh_token\":\"1//0hxOIS9W4oqXZCgYIARAAGBESNwF-L9Irgwst8lyC5Bae8RyYuX6y3U-m1_wZdZYDIPoZSIJKyl1xdEcXlke10sDSBblQAPcWMfs\"}'),
(44, 'google', '{\"access_token\":\"ya29.a0AeTM1ifDB1FFvy4p4Q6OkFYTklxgToY1JawOz5y2_UwsL24m0fJvmQC-8G9Dpq8tXBkRgvh6jCtzVe2jXA7Ng4x0YvtMUdM8BvIAO7M1UzgwWJe_DIKoyf2hdRIwz4GkatHWCDvtoPSMHW39pA157F1uw-UhaasaCgYKAWASARISFQHWtWOmhk_n1MyBEg4rszB--OHqZQ0166\",\"expires_in\":3599,\"scope\":\"https://www.googleapis.com/auth/spreadsheets\",\"token_type\":\"Bearer\",\"refresh_token\":\"1//0hxOIS9W4oqXZCgYIARAAGBESNwF-L9Irgwst8lyC5Bae8RyYuX6y3U-m1_wZdZYDIPoZSIJKyl1xdEcXlke10sDSBblQAPcWMfs\"}'),
(45, 'google', '{\"access_token\":\"ya29.a0AeTM1ifDB1FFvy4p4Q6OkFYTklxgToY1JawOz5y2_UwsL24m0fJvmQC-8G9Dpq8tXBkRgvh6jCtzVe2jXA7Ng4x0YvtMUdM8BvIAO7M1UzgwWJe_DIKoyf2hdRIwz4GkatHWCDvtoPSMHW39pA157F1uw-UhaasaCgYKAWASARISFQHWtWOmhk_n1MyBEg4rszB--OHqZQ0166\",\"expires_in\":3599,\"scope\":\"https://www.googleapis.com/auth/spreadsheets\",\"token_type\":\"Bearer\",\"refresh_token\":\"1//0hxOIS9W4oqXZCgYIARAAGBESNwF-L9Irgwst8lyC5Bae8RyYuX6y3U-m1_wZdZYDIPoZSIJKyl1xdEcXlke10sDSBblQAPcWMfs\"}'),
(46, 'google', '{\"access_token\":\"ya29.a0AeTM1ifDB1FFvy4p4Q6OkFYTklxgToY1JawOz5y2_UwsL24m0fJvmQC-8G9Dpq8tXBkRgvh6jCtzVe2jXA7Ng4x0YvtMUdM8BvIAO7M1UzgwWJe_DIKoyf2hdRIwz4GkatHWCDvtoPSMHW39pA157F1uw-UhaasaCgYKAWASARISFQHWtWOmhk_n1MyBEg4rszB--OHqZQ0166\",\"expires_in\":3599,\"scope\":\"https://www.googleapis.com/auth/spreadsheets\",\"token_type\":\"Bearer\",\"refresh_token\":\"1//0hxOIS9W4oqXZCgYIARAAGBESNwF-L9Irgwst8lyC5Bae8RyYuX6y3U-m1_wZdZYDIPoZSIJKyl1xdEcXlke10sDSBblQAPcWMfs\"}'),
(47, 'google', '{\"access_token\":\"ya29.a0AeTM1ifDB1FFvy4p4Q6OkFYTklxgToY1JawOz5y2_UwsL24m0fJvmQC-8G9Dpq8tXBkRgvh6jCtzVe2jXA7Ng4x0YvtMUdM8BvIAO7M1UzgwWJe_DIKoyf2hdRIwz4GkatHWCDvtoPSMHW39pA157F1uw-UhaasaCgYKAWASARISFQHWtWOmhk_n1MyBEg4rszB--OHqZQ0166\",\"expires_in\":3599,\"scope\":\"https://www.googleapis.com/auth/spreadsheets\",\"token_type\":\"Bearer\",\"refresh_token\":\"1//0hxOIS9W4oqXZCgYIARAAGBESNwF-L9Irgwst8lyC5Bae8RyYuX6y3U-m1_wZdZYDIPoZSIJKyl1xdEcXlke10sDSBblQAPcWMfs\"}'),
(48, 'google', '{\"access_token\":\"ya29.a0AeTM1ifDB1FFvy4p4Q6OkFYTklxgToY1JawOz5y2_UwsL24m0fJvmQC-8G9Dpq8tXBkRgvh6jCtzVe2jXA7Ng4x0YvtMUdM8BvIAO7M1UzgwWJe_DIKoyf2hdRIwz4GkatHWCDvtoPSMHW39pA157F1uw-UhaasaCgYKAWASARISFQHWtWOmhk_n1MyBEg4rszB--OHqZQ0166\",\"expires_in\":3599,\"scope\":\"https://www.googleapis.com/auth/spreadsheets\",\"token_type\":\"Bearer\",\"refresh_token\":\"1//0hxOIS9W4oqXZCgYIARAAGBESNwF-L9Irgwst8lyC5Bae8RyYuX6y3U-m1_wZdZYDIPoZSIJKyl1xdEcXlke10sDSBblQAPcWMfs\"}'),
(49, 'google', '{\"access_token\":\"ya29.a0AeTM1ifDB1FFvy4p4Q6OkFYTklxgToY1JawOz5y2_UwsL24m0fJvmQC-8G9Dpq8tXBkRgvh6jCtzVe2jXA7Ng4x0YvtMUdM8BvIAO7M1UzgwWJe_DIKoyf2hdRIwz4GkatHWCDvtoPSMHW39pA157F1uw-UhaasaCgYKAWASARISFQHWtWOmhk_n1MyBEg4rszB--OHqZQ0166\",\"expires_in\":3599,\"scope\":\"https://www.googleapis.com/auth/spreadsheets\",\"token_type\":\"Bearer\",\"refresh_token\":\"1//0hxOIS9W4oqXZCgYIARAAGBESNwF-L9Irgwst8lyC5Bae8RyYuX6y3U-m1_wZdZYDIPoZSIJKyl1xdEcXlke10sDSBblQAPcWMfs\"}'),
(50, 'google', '{\"access_token\":\"ya29.a0AeTM1ifDB1FFvy4p4Q6OkFYTklxgToY1JawOz5y2_UwsL24m0fJvmQC-8G9Dpq8tXBkRgvh6jCtzVe2jXA7Ng4x0YvtMUdM8BvIAO7M1UzgwWJe_DIKoyf2hdRIwz4GkatHWCDvtoPSMHW39pA157F1uw-UhaasaCgYKAWASARISFQHWtWOmhk_n1MyBEg4rszB--OHqZQ0166\",\"expires_in\":3599,\"scope\":\"https://www.googleapis.com/auth/spreadsheets\",\"token_type\":\"Bearer\",\"refresh_token\":\"1//0hxOIS9W4oqXZCgYIARAAGBESNwF-L9Irgwst8lyC5Bae8RyYuX6y3U-m1_wZdZYDIPoZSIJKyl1xdEcXlke10sDSBblQAPcWMfs\"}');

-- --------------------------------------------------------

--
-- Table structure for table `log_errors`
--

DROP TABLE IF EXISTS `log_errors`;
CREATE TABLE `log_errors` (
  `id` int NOT NULL,
  `date` varchar(150) NOT NULL,
  `function_name` varchar(300) NOT NULL,
  `description` text NOT NULL,
  `data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `log_errors`
--

INSERT INTO `log_errors` (`id`, `date`, `function_name`, `description`, `data`) VALUES
(1, '2022-10-21 05:39:59 PM', 'Index main', 'DB: Error Unable to prepare MySQL statement (check your syntax) - ', '[]'),
(2, '2022-10-21 05:41:40 PM', 'Index main', 'DB: Error Unable to prepare MySQL statement (check your syntax) - ', '[]'),
(3, '2022-10-25 11:02:54 AM', 'setTransmission', 'DB: Error Unable to prepare MySQL statement (check your syntax) - You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near \'where 1=1\' at line 1', '{\"POST\":{\"problems\":1,\"youtube\":0}}'),
(4, '2022-10-25 11:03:06 AM', 'setTransmission', 'DB: Error Unable to prepare MySQL statement (check your syntax) - You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near \'where 1=1\' at line 1', '{\"POST\":{\"problems\":0,\"youtube\":0}}'),
(5, '2022-10-25 11:04:29 AM', 'setTransmission', 'DB: Error Unable to prepare MySQL statement (check your syntax) - You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near \'where 1=1\' at line 1', '{\"POST\":{\"problems\":0,\"youtube\":0}}'),
(6, '2022-10-25 11:04:40 AM', 'setTransmission', 'DB: Error Unable to prepare MySQL statement (check your syntax) - You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near \'where 1=1\' at line 1', '{\"POST\":{\"problems\":0,\"youtube\":0}}'),
(7, '2022-10-25 11:05:03 AM', 'setTransmission', 'DB: Error Unable to prepare MySQL statement (check your syntax) - You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near \'where 1=1\' at line 1', '{\"POST\":{\"problems\":1,\"youtube\":1}}'),
(8, '2022-10-25 11:05:09 AM', 'setTransmission', 'DB: Error Unable to prepare MySQL statement (check your syntax) - You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near \'where 1=1\' at line 1', '{\"POST\":{\"problems\":1,\"youtube\":0}}'),
(9, '2022-10-25 11:05:18 AM', 'setTransmission', 'DB: Error Unable to prepare MySQL statement (check your syntax) - You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near \'where 1=1\' at line 1', '{\"POST\":{\"problems\":0,\"youtube\":0}}'),
(10, '2022-10-25 11:05:33 AM', 'setTransmission', 'DB: Error Unable to prepare MySQL statement (check your syntax) - You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near \'where 1=1\' at line 1', '{\"POST\":{\"problems\":1,\"youtube\":1}}');

-- --------------------------------------------------------

--
-- Table structure for table `registered`
--

DROP TABLE IF EXISTS `registered`;
CREATE TABLE `registered` (
  `id` bigint NOT NULL,
  `register` varchar(50) NOT NULL,
  `phase` varchar(150) NOT NULL,
  `email` varchar(250) NOT NULL,
  `firstname` varchar(150) DEFAULT NULL,
  `lastname` varchar(150) DEFAULT NULL,
  `country` varchar(150) DEFAULT NULL,
  `phone` varchar(300) DEFAULT NULL,
  `industry` varchar(300) NOT NULL,
  `company` varchar(300) DEFAULT NULL,
  `source_utm` text,
  `medium_utm` text,
  `campaign_utm` text,
  `content_utm` text,
  `term_utm` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `registered`
--

INSERT INTO `registered` (`id`, `register`, `phase`, `email`, `firstname`, `lastname`, `country`, `phone`, `industry`, `company`, `source_utm`, `medium_utm`, `campaign_utm`, `content_utm`, `term_utm`) VALUES
(1, '2022-10-19 11:26:36 AM', 'preevento', 'hcardoso+new+fields@fromdoppler.com', 'Fede', NULL, NULL, NULL, 'Agencias-de-comunicacion-Publicidad-Consultor', NULL, 'direct', '', '', '', ''),
(2, '2022-11-09 11:52:47 AM', 'during', 'hernan.f.cardoso@gmail.com', 'fede', '', '', '', 'Agencias-de-Empleo', '', 'direct', '', '', '', ''),
(3, '2022-10-26 12:54:36 PM', 'pre', 'hcardoso+pre@fromdoppler.com', 'fede', NULL, NULL, NULL, 'Agencias-de-comunicacion-Publicidad-Consultor', NULL, 'direct', '', '', '', ''),
(4, '2022-10-26 01:00:27 PM', 'during', 'hcardoso+during@fromdoppler.com', 'fede', NULL, NULL, NULL, 'Entretenimiento', NULL, 'direct', '', '', '', ''),
(5, '2022-10-26 01:04:21 PM', 'post', 'hcardoso+post@fromdoppler.com', 'fede', NULL, NULL, NULL, 'Belleza-Cosmética', NULL, 'direct', '', '', '', ''),
(6, '2022-10-26 01:13:57 PM', 'during', 'hcardoso+simulador+during@fromdoppler.com', 'fede', NULL, NULL, NULL, 'Salud', NULL, 'direct', '', '', '', ''),
(7, '2022-10-26 01:29:38 PM', 'post', 'hcardoso+post+1@fromdoppler.com', 'fede', NULL, NULL, NULL, 'Entretenimiento', NULL, 'direct', '', '', '', ''),
(8, '2022-10-26 01:30:43 PM', 'during', 'hcardoso+during+1@fromdoppler.com', 'fede', NULL, NULL, NULL, 'Educación', NULL, 'direct', '', '', '', ''),
(9, '2022-10-26 01:31:57 PM', 'pre', 'hcardoso+simulador+pre@fromdoppler.com', 'fede', NULL, NULL, NULL, 'Agencias-de-Empleo', NULL, 'direct', '', '', '', ''),
(10, '2022-10-27 10:48:35 AM', 'pre', 'hcardoso+during+local@fromdoppler.com', 'fede', NULL, NULL, NULL, 'Supermercado', NULL, 'direct', '', '', '', ''),
(11, '2022-10-27 10:53:34 AM', 'during', 'hcardoso+during+local+2@fromdoppler.com', 'fede', NULL, NULL, NULL, 'Servicios', NULL, 'direct', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `settings_during_days`
--

DROP TABLE IF EXISTS `settings_during_days`;
CREATE TABLE `settings_during_days` (
  `day` int NOT NULL,
  `live` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `settings_during_days`
--

INSERT INTO `settings_during_days` (`day`, `live`) VALUES
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `settings_phase`
--

DROP TABLE IF EXISTS `settings_phase`;
CREATE TABLE `settings_phase` (
  `pre` tinyint NOT NULL,
  `during` tinyint NOT NULL,
  `post` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `settings_phase`
--

INSERT INTO `settings_phase` (`pre`, `during`, `post`) VALUES
(0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `settings_simulator`
--

DROP TABLE IF EXISTS `settings_simulator`;
CREATE TABLE `settings_simulator` (
  `enabled` tinyint NOT NULL,
  `pre` tinyint NOT NULL,
  `during` tinyint NOT NULL,
  `post` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `settings_simulator`
--

INSERT INTO `settings_simulator` (`enabled`, `pre`, `during`, `post`) VALUES
(0, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `settings_simulator_during_days`
--

DROP TABLE IF EXISTS `settings_simulator_during_days`;
CREATE TABLE `settings_simulator_during_days` (
  `day` int NOT NULL,
  `live` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `settings_simulator_during_days`
--

INSERT INTO `settings_simulator_during_days` (`day`, `live`) VALUES
(1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `settings_transmission`
--

DROP TABLE IF EXISTS `settings_transmission`;
CREATE TABLE `settings_transmission` (
  `problems` tinyint(1) NOT NULL,
  `youtube` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `settings_transmission`
--

INSERT INTO `settings_transmission` (`problems`, `youtube`) VALUES
(0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `speakers`
--

DROP TABLE IF EXISTS `speakers`;
CREATE TABLE `speakers` (
  `id` int NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `alt_image` varchar(255) DEFAULT NULL,
  `job` varchar(255) DEFAULT NULL,
  `sm_twitter` varchar(255) DEFAULT NULL,
  `sm_linkedin` varchar(255) DEFAULT NULL,
  `sm_instagram` varchar(255) DEFAULT NULL,
  `sm_facebook` varchar(255) DEFAULT NULL,
  `description` text,
  `bio` text,
  `image_company` varchar(255) DEFAULT NULL,
  `alt_image_company` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `link_time` varchar(500) NOT NULL,
  `orden` varchar(255) DEFAULT NULL,
  `day` varchar(1) NOT NULL,
  `youtube` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL,
  `slug` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL,
  `status` enum('0','1') DEFAULT NULL,
  `meta_title` varchar(350) CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL,
  `meta_description` text CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL,
  `meta_image` varchar(500) CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL,
  `meta_twitter` text CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `speakers`
--

INSERT INTO `speakers` (`id`, `name`, `image`, `alt_image`, `job`, `sm_twitter`, `sm_linkedin`, `sm_instagram`, `sm_facebook`, `description`, `bio`, `image_company`, `alt_image_company`, `time`, `link_time`, `orden`, `day`, `youtube`, `slug`, `status`, `meta_title`, `meta_description`, `meta_image`, `meta_twitter`) VALUES
(5, 'Raquel Oberlander', 'raquel-oberlander-site (1).png', 'Raquel Oberlander', ' CEO en Hep!c Marketing', 'https://twitter.com/raquelober?lang=es', 'https://www.linkedin.com/in/raqueloberlander?originalSubdomain=uy', 'https://www.instagram.com/raquelober/?hl=es', 'https://www.facebook.com/RaquelOberlanderErnst', '¿Por qué el Contenido es la nueva publicidad?', NULL, 'hepc-speaker.png', 'Hep!c Marketing', '1', '', '3', '1', '', '', NULL, '', '', '', ''),
(7, 'Vedant Misra', 'vedant-misra-site.png', 'Vedan Misra', 'AI Researcher en Google <br>                                                                                    ', 'https://twitter.com/vedantmisra?lang=es', 'https://www.linkedin.com/in/vedantmisra/', '', '', 'Cómo la Inteligencia Artificial transformará la generación de demanda', NULL, 'google-speaker.png', 'Google', '1', '', '10', '2', '', '', NULL, '', '', '', ''),
(8, 'Leo Larrea', 'leo-larrea-site.png', 'Metricool', 'Social Media Manager en Metricool', 'https://twitter.com/leo_la', 'https://www.linkedin.com/in/leolarreavelasco/?originalSubdomain=es', 'https://www.instagram.com/leolarrea/?hl=es', 'https://www.facebook.com/leolarrea', 'Cómo crecer en Instagram con datos reales en la mano', NULL, 'metricool-speaker.png', 'Metricool', '1', '', '4', '1', '', '', NULL, '', '', '', ''),
(9, 'Álvaro Fontela', 'alvaro-raiola-site.png', 'Alvaro Fontela', 'CEO en Raiola Networks', '', 'https://www.linkedin.com/in/alvarofontela/?originalSubdomain=es', 'https://www.instagram.com/alvarofontela/?hl=es', 'https://www.facebook.com/afontelasanchez', '10 tareas de Marketing Digital que puedes solucionar con WordPress', NULL, 'raiola-speaker.png', 'Raiola Networks', '1', '', '5', '1', '', '', NULL, '', '', '', ''),
(10, 'Mariano Platner', 'mariano-platner-site.png', 'Mariano Platner', 'Co-fundador en Tiendup', 'https://mobile.twitter.com/marianasso', 'https://www.linkedin.com/in/mariano-platner-47473b110/?originalSubdomain=ar', '', '', 'Sobre tendencias en Negocios Digitales: todos somos creadores', NULL, 'tiendup-speaker.png', 'Tiendup', '1', '', '6', '1', '', '', NULL, '', '', '', ''),
(11, 'Llorenç Palomas', 'lloren-palomas-site (1).png', 'Llorenç Palomas', 'CMO & Head of Marketing en Doofinder', 'https://twitter.com/llorensp', 'https://www.linkedin.com/in/llorencpalomas/?originalSubdomain=es', '', '', 'El valor de los datos: caza tendencias para tu eCommerce ', NULL, 'doofinder-speaker.png', 'Doofinder', '1', '', '30', '2', '', '', NULL, '', '', '', ''),
(12, 'Oscar Nogueras', 'oscar-noregas-site.png', 'Oscar Nogueras', 'CEO en Ontranslation', 'https://twitter.com/oscarnogueras', 'https://www.linkedin.com/in/oscarnogueras/?originalSubdomain=es', '', '', '10 consejos para vender cross-border con éxito', NULL, 'on-translation-speaker.png', 'Ontranslation', '1', '', '30', '2', '', '', NULL, '', '', '', ''),
(13, 'Juan Lombana', 'juan-lombana-site.png', 'Juan Lombana', 'CEO en Mercatitlán', '', 'https://www.linkedin.com/in/juanglombana/', 'https://www.instagram.com/juanlombana/', 'https://www.facebook.com/mercatitlan/', 'Los 4 ingredientes para triunfar en redes sociales', '', 'mercatitlan-speaker.png', 'Mercatitlan', '1', 'https://www.timeanddate.com/worldclock/fixedtime.html?msg=Juan+Lombana%3A+Los+4+ingredientes+para+triunfar+en+Social+Media&iso=20221108T11&p1=51&am=40', '10', '1', '', '', NULL, '', '', '', ''),
(14, 'Ángela Blones', 'angela-blones-site (1).png', 'Ángela Blones', 'Directora en RRBRANDSS', 'https://twitter.com/AngelaBlones', '', 'https://www.instagram.com/angelablones/', '', 'Cómo potenciar tu negocio a través del Branding', NULL, 'ab-speaker.png', 'Angela Blones', '1', '', '20', '2', '', '', NULL, '', '', '', ''),
(15, 'Andreína Espino', 'andreina-espino-site.png', 'Andreina Espino', 'CCO en Brainwave', 'https://mobile.twitter.com/andreinaespino', 'https://www.linkedin.com/in/andreinaespino/', 'https://www.instagram.com/andreinaespino/?hl=es', 'https://www.facebook.com/andreinaespinotv', 'El poder de Reels, Tiktok y Youtube Shorts en Tu Estrategia de Marketing', NULL, 'brainwave-site.png', 'Brainwave', '1', '', '25', '2', '', '', NULL, '', '', '', ''),
(18, 'Albert Esplugas', 'alberto-esplugas-site.png', 'Albert Esplugas', 'Head of AI Solutions Marketing en Amazon Web Services', 'https://twitter.com/albert_esplugas', 'https://www.linkedin.com/in/albertesplugas/', '', '', 'Aplicación de Inteligencia Artificial en Marketing y casos de uso', 'Inició su carrera en Apple. Durante los siguientes 10 años creó y dirigió diversas empresas, hasta que se unió a Microsoft. Actualmente es el Responsable de Marketing de los Servicios de IA en Amazon Web Services.', 'aws-speaker.png', 'Amazon Web Services', '13:30', 'https://www.timeanddate.com/worldclock/fixedtime.html?msg=Albert+Esplugas%3A+Aplicaci%C3%B3n+de+Inteligencia+Artificial+en+Marketing+y+casos+de+uso&iso=20221108T1330&p1=51&ah=1', '3', '1', 'SzsghlcoqPU', 'albertesplugas', NULL, 'titulo seo', 'descripcion para e l seo', 'batman-logo.png', 'texto para le twiiter');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions_doppler`
--

DROP TABLE IF EXISTS `subscriptions_doppler`;
CREATE TABLE `subscriptions_doppler` (
  `id` int NOT NULL,
  `email` varchar(250) NOT NULL,
  `list` varchar(50) NOT NULL,
  `register` varchar(50) NOT NULL,
  `form_id` varchar(50) NOT NULL,
  `firstname` varchar(150) DEFAULT NULL,
  `lastname` varchar(150) DEFAULT NULL,
  `phone` varchar(300) DEFAULT NULL,
  `country` varchar(150) DEFAULT NULL,
  `industry` varchar(300) NOT NULL,
  `company` varchar(300) DEFAULT NULL,
  `ip` varchar(150) NOT NULL,
  `country_ip` varchar(150) NOT NULL,
  `privacy` tinyint(1) NOT NULL,
  `promotions` tinyint(1) DEFAULT NULL,
  `source_utm` text,
  `medium_utm` text,
  `campaign_utm` text,
  `content_utm` text,
  `term_utm` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `subscriptions_doppler`
--

INSERT INTO `subscriptions_doppler` (`id`, `email`, `list`, `register`, `form_id`, `firstname`, `lastname`, `phone`, `country`, `industry`, `company`, `ip`, `country_ip`, `privacy`, `promotions`, `source_utm`, `medium_utm`, `campaign_utm`, `content_utm`, `term_utm`) VALUES
(1, 'hcardoso+new+fields@fromdoppler.com', '28547158', '2022-10-19 11:26:38 AM', 'preevento', 'Fede', NULL, NULL, NULL, 'Agencias-de-comunicacion-Publicidad-Consultor', NULL, '172.18.0.1', 'Not Recognized', 1, 0, 'direct', '', '', '', ''),
(2, 'hernan.f.cardoso@gmail.com', '28547158', '2022-10-25 02:11:08 PM', 'preevento', 'fede', NULL, NULL, NULL, 'Supermercado', NULL, '172.18.0.1', 'Not Recognized', 1, 0, 'direct', '', '', '', ''),
(3, 'hcardoso+pre@fromdoppler.com', '28547158', '2022-10-26 12:54:39 PM', 'pre', 'fede', NULL, NULL, NULL, 'Agencias-de-comunicacion-Publicidad-Consultor', NULL, '172.18.0.1', 'Not Recognized', 1, 0, 'direct', '', '', '', ''),
(4, 'hcardoso+during@fromdoppler.com', '28547158', '2022-10-26 01:00:29 PM', 'during', 'fede', NULL, NULL, NULL, 'Entretenimiento', NULL, '172.18.0.1', 'Not Recognized', 1, 0, 'direct', '', '', '', ''),
(5, 'hcardoso+post@fromdoppler.com', '28547158', '2022-10-26 01:04:27 PM', 'post', 'fede', NULL, NULL, NULL, 'Belleza-Cosmética', NULL, '172.18.0.1', 'Not Recognized', 1, 0, 'direct', '', '', '', ''),
(6, 'hcardoso+simulador+during@fromdoppler.com', '28547158', '2022-10-26 01:13:59 PM', 'during', 'fede', NULL, NULL, NULL, 'Salud', NULL, '172.18.0.1', 'Not Recognized', 1, 0, 'direct', '', '', '', ''),
(7, 'hcardoso+post+1@fromdoppler.com', '28547158', '2022-10-26 01:29:41 PM', 'post', 'fede', NULL, NULL, NULL, 'Entretenimiento', NULL, '172.18.0.1', 'Not Recognized', 1, 0, 'direct', '', '', '', ''),
(8, 'hcardoso+during+1@fromdoppler.com', '28547158', '2022-10-26 01:30:45 PM', 'during', 'fede', NULL, NULL, NULL, 'Educación', NULL, '172.18.0.1', 'Not Recognized', 1, 0, 'direct', '', '', '', ''),
(9, 'hcardoso+simulador+pre@fromdoppler.com', '28547158', '2022-10-26 01:32:11 PM', 'pre', 'fede', NULL, NULL, NULL, 'Agencias-de-Empleo', NULL, '172.18.0.1', 'Not Recognized', 1, 0, 'direct', '', '', '', ''),
(10, 'hcardoso+during+local@fromdoppler.com', '28547158', '2022-10-27 10:48:37 AM', 'pre', 'fede', NULL, NULL, NULL, 'Supermercado', NULL, '172.18.0.1', 'Not Recognized', 1, 0, 'direct', '', '', '', ''),
(11, 'hcardoso+during+local+2@fromdoppler.com', '28547158', '2022-10-27 10:53:36 AM', 'during', 'fede', NULL, NULL, NULL, 'Servicios', NULL, '172.18.0.1', 'Not Recognized', 1, 0, 'direct', '', '', '', ''),
(12, 'hernan.f.cardoso@gmail.com', '28547158', '2022-10-31 02:27:49 PM', 'during', 'fede', NULL, NULL, NULL, 'Servicios', NULL, '172.18.0.1', 'Not Recognized', 1, 0, 'direct', '', '', '', ''),
(13, 'hernan.f.cardoso@gmail.com', '28547158', '2022-11-09 11:52:53 AM', 'during', 'fede', NULL, NULL, NULL, 'Agencias-de-Empleo', NULL, '172.18.0.1', 'Not Recognized', 1, 0, 'direct', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aliados_media_partner`
--
ALTER TABLE `aliados_media_partner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aliados_media_partner_bk`
--
ALTER TABLE `aliados_media_partner_bk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aliados_pro`
--
ALTER TABLE `aliados_pro`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aliados_starter`
--
ALTER TABLE `aliados_starter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `google_oauth`
--
ALTER TABLE `google_oauth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_errors`
--
ALTER TABLE `log_errors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registered`
--
ALTER TABLE `registered`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `speakers`
--
ALTER TABLE `speakers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions_doppler`
--
ALTER TABLE `subscriptions_doppler`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aliados_media_partner`
--
ALTER TABLE `aliados_media_partner`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `aliados_media_partner_bk`
--
ALTER TABLE `aliados_media_partner_bk`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `aliados_pro`
--
ALTER TABLE `aliados_pro`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `aliados_starter`
--
ALTER TABLE `aliados_starter`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `google_oauth`
--
ALTER TABLE `google_oauth`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `log_errors`
--
ALTER TABLE `log_errors`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `registered`
--
ALTER TABLE `registered`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `speakers`
--
ALTER TABLE `speakers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `subscriptions_doppler`
--
ALTER TABLE `subscriptions_doppler`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
