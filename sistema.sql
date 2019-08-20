-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 02-07-2019 a las 13:21:18
-- Versión del servidor: 5.7.21
-- Versión de PHP: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistema`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
  `IDCategoria` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(255) NOT NULL,
  PRIMARY KEY (`IDCategoria`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`IDCategoria`, `Nombre`) VALUES
(1, 'Perros'),
(2, 'PibesBuenos'),
(3, 'Libros'),
(4, 'Peleadores');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
CREATE TABLE IF NOT EXISTS `pedidos` (
  `IDPedidos` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_Producto` varchar(255) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Precio` float NOT NULL,
  PRIMARY KEY (`IDPedidos`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE IF NOT EXISTS `productos` (
  `IDProducto` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(255) NOT NULL,
  `Codigo` varchar(255) NOT NULL,
  `Precio` float NOT NULL,
  `Descuento` int(11) NOT NULL,
  `Stock_Minimo` int(11) NOT NULL,
  `Stock_Actual` int(11) NOT NULL,
  `Categoria` int(11) NOT NULL,
  `Foto` varchar(255) NOT NULL,
  `Video` varchar(255) NOT NULL,
  `Descripcion_Corta` varchar(255) NOT NULL,
  `Descripcion_Larga` varchar(900) NOT NULL,
  `Destacado` tinyint(1) NOT NULL,
  `OnSale` tinyint(1) NOT NULL,
  `Mostrar_Home` tinyint(1) NOT NULL,
  PRIMARY KEY (`IDProducto`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`IDProducto`, `Nombre`, `Codigo`, `Precio`, `Descuento`, `Stock_Minimo`, `Stock_Actual`, `Categoria`, `Foto`, `Video`, `Descripcion_Corta`, `Descripcion_Larga`, `Destacado`, `OnSale`, `Mostrar_Home`) VALUES
(1, 'HarryPotter', 'tfh82t', 150, 0, 10, 27, 3, 'HarryPotter.jpg', '.mp4', 'Chabon con magia', 'Harry Potter nunca ha sido tarea fácil, menos aún desde que se ha convertido en un atareadisimo empleado del Ministerio de Magia, un hombre casado y padre de tres hijos. Y si Harry planta cara a un pasado que se resiste a quedar atrás, su hijo del medio, Albus Severus, ha de luchar contra el peso de una herencia familiar de la que él nunca ha querido saber nada. Cuando el destino conecte el pasado con el presente, padre e hijo deberán afrontar una verdad muy incómoda: a veces, la oscuridad surge de los lugares menos pensados', 1, 0, 1),
(2, 'ShadowHunters', 'shtf25', 300, 0, 20, 25, 3, 'ShadowHunters.jpg', '.mp4', 'Una chabona caza demonios', 'Una adolescente neoyorquina descubre que sus antepasados fueron guerreros ángeles que tenían como misión proteger a los humanos de los demonios. Un día, la madre de la joven desaparece y la chica decide buscar la unión con un grupo de cazadores de sombras y bajar al inframundo. Allí se encontrará con toda clase de criaturas diabólicas, entre ellas, vampiros y hombres lobos, además de un sinfín de peligros', 1, 1, 0),
(3, 'LaCiudadDeLasBestias', 'dfh2kl', 100, 10, 5, 7, 3, 'LaCiudadDeLasBestias.jpg', '.mp4', 'Chabon viaja en un viaje re loco', 'Alexander Cold es un muchacho americano de quince años que parte al Amazonas con su abuela Kate, periodista especializada en viajes. La expedición se interna en la selva en busca de una extraña bestia gigantesca. Junto con su compañera de viaje, Nadia Santos, y un centenario chamán indígena, Alex conocerá un mundo sorprendente y juntos vivirán una gran aventura. El universo ya conocido de Isabel Allende se amplía en La Ciudad de las Bestias con nuevos elementos de realismo mágico, aventura y naturaleza. Los jóvenes protagonistas, Nadia y Alexander, se internan en la inexplorada selva amazónica llevando de la mano al lector en un viaje sin pausa por un territorio misterioso donde se borran los límites entre la realidad y el sueño, hombres y dioses se confunden y los espíritus andan de la mano con los vivos', 0, 0, 0),
(4, 'Husky', 'lgbtq0a', 2000, 0, 1, 3, 1, 'Husky.jpg', 'mp4', 'Perro que acarrea trineos', 'El husky siberiano es una raza de perro de trabajo originaria del noreste de Siberia (Chukotka, Rusia). Esta raza presenta un acusado parecido con el lobo. Originalmente fue criado por la tribu chukchi, en la que se utilizaba como perro de compañía para pastorear a los ciervos, tirar de los trineos y mantener calientes a los niños; en la actualidad se encuentra en muy diversas zonas del mundo', 1, 1, 1),
(5, 'Sharpei', 'pafma2o9', 7000, 0, 10, 16, 1, 'Sharpei.jpg', '.mp4', 'Perro arrugado', 'El significado de shar pei en chino es Piel de Arena. Esta raza se utilizó como guardián de tumbas en sus orígenes; posteriormente fue empleado como perro de defensa, en peleas de perros, y finalmente como mascota. En la década de los años 60, el Shar Pei estuvo a punto de desaparecer a causa de la persecución del régimen comunista de la República Popular China contra los animales de compañía, a los que consideraba símbolos de la burguesía y un derroche innecesario de comida. Cuando son cachorros, los Shar Pei tienen muchas arrugas, pero a medida que crecen, estas arrugas disminuyen, ya que la piel se va estirando y poniendo tersa', 1, 1, 1),
(6, 'BorderCollie', 'agj234fgn', 3500, 15, 2, 10, 1, 'BorderCollie.jpg', '.mp4', 'Perro bien fisicamente', 'La raza border collie destaca por ser tremendamente ágil, con una forma física idónea para hacer ejercicio, saltar y correr. Los machos suelen medir unos 53 centímetros hasta la cruz y las hembras algo menos, como suele ser habitual en muchas razas de perros', 1, 1, 1),
(10, 'ShawnMendes', 'akñbjhju13', 100, 10, 1, 1, 2, 'ShawnMendes.jpg', '´.mp4', 'Canta cancioncitas en ingles', 'es un músico y cantante canadiense, que empezó a ganar notoriedad a mediados de 2013, cuando comenzó a publicar sus interpretaciones de versiones de canciones populares en la aplicación Vine. Al año siguiente, llamó la atención del representante Andrew Gertler y del jefe de A&R de Island Rescords, Ziggy Chareton, quienes lo llevaron a Nueva York a firmar un contrato con el sello discográfico antes mencionado. En 2015, publicó su primer álbum Handwritten, que tuvo éxito en Estados Unidos al entrar en la número 1 del Billboard 200, al igual que su sencillo «Stitches» que ingresó a las diez principales posiciones del Billboard Hot 100 en Estados Unidos y Canadá, y la número uno en la lista de sencillos de Reino Unido.', 0, 0, 0),
(7, 'JohnCena', '3fk8zl', 50000, 0, 1, 1, 4, 'JohnCena.jpg', '.mp4', 'John es un tira magia en el wwe', 'John Cena es un exculturista, actor, cantante rapero y luchador profesional estadounidense que trabaja para la WWE, como agente libre. Durante su trayectoria en WWE, Cena ha ganado un total de 25 campeonatos, con 16 reinados como campeón mundial (13 veces como Campeón de WWE y tres veces como Campeón Mundial peso pesado de WWE). Es el segundo luchador en tener 16 reinados mundiales oficiales junto con Ric Flair. El además es cinco veces Campeón de los Estados Unidos y cuatro veces campeón mundial en pareja. Fue ganador del Money in the Bank ladder match (2012) y también ha ganado en dos ocasiones el Royal Rumble (2008, 2013). Cena tiene el cuarto lugar en el total acumulado de días como campeón de WWE detrás de Bruno Sammartino, Bob Backlund, y Hulk Hogan. En adición ha encabezado varias eventos pague-por-ver de la WWE, incluyendo ser maint event de los WrestleMania', 1, 0, 0),
(8, 'RandyOrton', 'jrwgu75', 100000, 0, 1, 1, 4, 'RandyOrton.jpg', '.mp4', 'Randy Orton alto crack en la WWE', 'Randy Orton es un luchador profesional estadounidense que trabaja para la WWE en su marca Smackdown Live. Dentro de su carrera, ha sido 13 veces campeón, 9 veces como Campeón de la WWE y 4 como Campeón Mundial Peso Pesado. Además posee un reinado como Campeón Intercontinental, uno como Campeón Mundial en Parejas junto a Edge y Campeón en Parejas de SmackDown con Bray Wyatt y Luke Harper, todo esto lo convierte en Campeón de Triple Corona y también ganó una vez el Campeonato de los Estados Unidos que lo convierte en un Grand Slam.', 1, 0, 0),
(9, 'ReyMisterio', 'dfghhd55', 75000, 0, 1, 1, 4, 'ReyMisterio.jpg', '.mp4', 'Enano crack de la WWE', 'es un luchador profesional mexicano-estadounidense que actualmente trabaja para la WWE, en la marca Raw, además de ser considerado el mejor luchador mexicano activo del mundo. También pasó por la Extreme Championship Wrestling (ECW) y la World Championship Wrestling (WCW). Gutiérrez fue entrenado por su tío Rey Misterio Sr., aprendiendo el estilo basado en movimientos aéreos de la lucha libre mexicana que ha sido su marca', 1, 0, 0),
(11, 'Thor', 'afhd45', 7000, 25, 1, 10, 2, 'Thor.jpg', '.mp4', 'Dios que esta re bueno SeMeCaeLaBaba', ' es un actor australiano. Adquirió fama en su país natal al interpretar el papel de Kim Hyde en la serie Home and Away (2004). Posteriormente, alcanzaría la fama a nivel mundial por interpretar el papel de Thor en las adaptaciones cinematográficas de los cómics de Marvel, y por sus papeles protagonistas en Snow White & the Huntsman (2012) y Rush (2013). En 2011, fue nominado al premio BAFTA en la categoría de mejor estrella emergente. Fue nombrado hombre del año en 2010 y 2012 por la revista GQ y en ese mismo año también por Empire. En 2014 fue declarado como uno de \"los hombres más sexys del mundo\". En 2014 fue nombrado por la revista People el hombre vivo más sexy.', 1, 1, 1),
(12, 'ZacEfron', 'bonbon2', 3000, 10, 10, 50, 2, 'ZacEfron.jpg', '.mp4', 'Chabon que esra rrrrrrrre bueno', 'Su debut televisivo tiene lugar con un pequeño papel episódico en la serie protagonizada por Nathan Fillion Firefly, y los siguientes años continúa haciendo diversas apariciones en la pequeña pantalla como en Urgencias, El guardián, CSI: Miami o Navy: Investigación criminal. En 2004 comienza a ser conocido por el público gracias a su papel en la serie Summerland, en la que interpreta a un valiente surfista. En 2006, y gracias a sus dotes como cantante, protagoniza la película para televisión High School Musical y poco después sería elegido por John Travolta para coprotagonizar el musical Hairspray. En 2007 y 2008 vuelve a meterse en la piel de Troy Bolton en High School Musical 2 y High School Musical 3 respectivamente, esta última estrenada en pantalla grande. Posteriormente el actor inicia una prometedora carrera en Hollywood con filmes como 17 otra vez o Siempre a mi lado.', 1, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `slider`
--

DROP TABLE IF EXISTS `slider`;
CREATE TABLE IF NOT EXISTS `slider` (
  `IDSlider` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(255) NOT NULL,
  `Foto` varchar(255) NOT NULL,
  PRIMARY KEY (`IDSlider`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `slider`
--

INSERT INTO `slider` (`IDSlider`, `Nombre`, `Foto`) VALUES
(2, 'sharpei', 'Sharpei.jpg'),
(3, 'husky', 'Husky.jpg'),
(4, 'border_collie', 'BorderCollie.jpg'),
(9, 'shawn_mendes', 'ShawnMendes.jpg'),
(6, 'shadow_hunter', 'ShadowHunters.jpg'),
(7, 'ciudad_de_las_bestias', 'CiudadDeLasBestias.jpg'),
(8, 'harry_potter', 'HarryPotter.jpg'),
(10, 'thor', 'Thor.jpg'),
(11, 'zac_efron', 'ZacEfron.jpg'),
(12, 'john_cena', 'JohnCena.jpg'),
(13, 'randy_orton', 'RandyOrton.jpg'),
(14, 'rey_misterio', 'ReyMisterio.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `IDUsuarios` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(255) NOT NULL,
  `Mail` varchar(255) NOT NULL,
  PRIMARY KEY (`IDUsuarios`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`IDUsuarios`, `Nombre`, `Mail`) VALUES
(1, 'Paula', 'pau.larra@gmail.com'),
(2, 'marian', 'marian@ReGAY.com'),
(3, 'Maia', 'maiacita@tomate.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
