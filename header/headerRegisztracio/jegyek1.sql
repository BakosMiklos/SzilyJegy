-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2022. Feb 21. 21:00
-- Kiszolgáló verziója: 10.4.21-MariaDB
-- PHP verzió: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `jegyek1`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `szervezok`
--

CREATE TABLE `szervezok` (
  `szervezoID` int(10) NOT NULL,
  `szervezetNev` varchar(254) COLLATE utf8_hungarian_ci NOT NULL,
  `email` varchar(254) COLLATE utf8_hungarian_ci NOT NULL,
  `jelszo` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `mobilSzam` varchar(31) COLLATE utf8_hungarian_ci NOT NULL,
  `telefonSzam` varchar(31) COLLATE utf8_hungarian_ci NOT NULL,
  `megye` varchar(30) COLLATE utf8_hungarian_ci NOT NULL,
  `varos` varchar(60) COLLATE utf8_hungarian_ci NOT NULL,
  `irSzam` varchar(10) COLLATE utf8_hungarian_ci NOT NULL,
  `cim` varchar(30) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `vasarlo`
--

CREATE TABLE `vasarlo` (
  `vasarloID` int(10) NOT NULL,
  `email` varchar(254) COLLATE utf8_hungarian_ci NOT NULL,
  `jelszo` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `vezetekNev` varchar(51) COLLATE utf8_hungarian_ci NOT NULL,
  `keresztNev` varchar(25) COLLATE utf8_hungarian_ci NOT NULL,
  `telefonSzam` varchar(31) COLLATE utf8_hungarian_ci NOT NULL,
  `megye` varchar(30) COLLATE utf8_hungarian_ci NOT NULL,
  `varos` varchar(60) COLLATE utf8_hungarian_ci NOT NULL,
  `irSzam` varchar(10) COLLATE utf8_hungarian_ci NOT NULL,
  `cim` varchar(30) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `vasarlo`
--

INSERT INTO `vasarlo` (`vasarloID`, `email`, `jelszo`, `vezetekNev`, `keresztNev`, `telefonSzam`, `megye`, `varos`, `irSzam`, `cim`) VALUES
(1, 'lapuscica@gmail.com', '04b50b8482d30bda278def40daa6e543', 'Maday', 'Gábor', '06205984318', 'Pest', 'Érd', '2030', 'Alma utca, 8.');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `szervezok`
--
ALTER TABLE `szervezok`
  ADD PRIMARY KEY (`szervezoID`);

--
-- A tábla indexei `vasarlo`
--
ALTER TABLE `vasarlo`
  ADD PRIMARY KEY (`vasarloID`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `szervezok`
--
ALTER TABLE `szervezok`
  MODIFY `szervezoID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `vasarlo`
--
ALTER TABLE `vasarlo`
  MODIFY `vasarloID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
