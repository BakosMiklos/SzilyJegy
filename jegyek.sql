-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2022. Feb 21. 11:11
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
-- Adatbázis: `jegyek`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `jegytipus`
--

CREATE TABLE `jegytipus` (
  `jegyTipusID` tinyint(12) UNSIGNED NOT NULL,
  `nev` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `rendeles`
--

CREATE TABLE `rendeles` (
  `rendelesID` bigint(20) UNSIGNED NOT NULL,
  `vasarloID` int(10) UNSIGNED NOT NULL,
  `rendelesDatuma` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `rendezvenyek`
--

CREATE TABLE `rendezvenyek` (
  `rendezvenyID` bigint(20) UNSIGNED NOT NULL,
  `szervezoID` int(10) UNSIGNED NOT NULL,
  `nev` varchar(254) NOT NULL,
  `tipus` varchar(7) NOT NULL,
  `ketegoria` varchar(21) NOT NULL,
  `reszveteliMod` tinyint(1) NOT NULL,
  `rendezvenyDatum` datetime NOT NULL,
  `jegyTipusID` tinyint(12) UNSIGNED NOT NULL,
  `jegyAr` bigint(20) UNSIGNED NOT NULL,
  `elerhetoJegyekSzama` mediumint(8) UNSIGNED NOT NULL,
  `eladottJegyekSzama` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `szervezok`
--

CREATE TABLE `szervezok` (
  `szervezoID` int(10) UNSIGNED NOT NULL,
  `szervezetNev` varchar(254) NOT NULL,
  `email` varchar(254) NOT NULL,
  `mobilSzam` varchar(31) NOT NULL,
  `telefonSzam` varchar(31) NOT NULL,
  `megye` varchar(30) NOT NULL,
  `varos` varchar(60) NOT NULL,
  `irSzam` varchar(10) NOT NULL,
  `cim` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `termekleiras`
--

CREATE TABLE `termekleiras` (
  `termekID` bigint(20) UNSIGNED NOT NULL,
  `rendelesID` bigint(20) UNSIGNED NOT NULL,
  `rendezvenyID` bigint(20) UNSIGNED NOT NULL,
  `jegyTipusID` tinyint(11) UNSIGNED NOT NULL,
  `mennyiseg` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `vasarlo`
--

CREATE TABLE `vasarlo` (
  `vasarloID` int(10) UNSIGNED NOT NULL,
  `email` varchar(254) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `vezetekNev` varchar(51) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `keresztNev` varchar(25) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `telefonSzam` varchar(31) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `megye` varchar(30) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `varos` varchar(60) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `irSzam` varchar(10) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `cim` varchar(30) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `fiokTipus` varchar(10) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `vasarlo`
--

INSERT INTO `vasarlo` (`vasarloID`, `email`, `vezetekNev`, `keresztNev`, `telefonSzam`, `megye`, `varos`, `irSzam`, `cim`, `fiokTipus`) VALUES
(1, 'lapuscica@gmail.com', 'Maday', 'Gábor', '06205984318', 'Budapest', 'Érd', '2030', 'Szénégető utca, 1.', 'admin');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `rendeles`
--
ALTER TABLE `rendeles`
  ADD PRIMARY KEY (`rendelesID`),
  ADD UNIQUE KEY `vasarloID` (`vasarloID`);

--
-- A tábla indexei `rendezvenyek`
--
ALTER TABLE `rendezvenyek`
  ADD PRIMARY KEY (`rendezvenyID`),
  ADD UNIQUE KEY `szervezoID` (`szervezoID`),
  ADD UNIQUE KEY `jegyTipusID` (`jegyTipusID`);

--
-- A tábla indexei `szervezok`
--
ALTER TABLE `szervezok`
  ADD PRIMARY KEY (`szervezoID`);

--
-- A tábla indexei `termekleiras`
--
ALTER TABLE `termekleiras`
  ADD PRIMARY KEY (`termekID`),
  ADD UNIQUE KEY `rendelesID` (`rendelesID`),
  ADD UNIQUE KEY `rendezvenyID` (`rendezvenyID`),
  ADD UNIQUE KEY `jegyTipusID` (`jegyTipusID`);

--
-- A tábla indexei `vasarlo`
--
ALTER TABLE `vasarlo`
  ADD PRIMARY KEY (`vasarloID`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `rendeles`
--
ALTER TABLE `rendeles`
  MODIFY `rendelesID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `rendezvenyek`
--
ALTER TABLE `rendezvenyek`
  MODIFY `rendezvenyID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `szervezok`
--
ALTER TABLE `szervezok`
  MODIFY `szervezoID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `termekleiras`
--
ALTER TABLE `termekleiras`
  MODIFY `termekID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `vasarlo`
--
ALTER TABLE `vasarlo`
  MODIFY `vasarloID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
