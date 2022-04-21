-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2022. Ápr 08. 17:04
-- Kiszolgáló verziója: 10.1.39-MariaDB
-- PHP verzió: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `szilyjegy`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `rendeles`
--

CREATE TABLE `rendeles` (
  `rendelesID` int(11) NOT NULL,
  `vasarloID` int(11) NOT NULL,
  `termekID` int(11) NOT NULL,
  `rendelesDatuma` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `rendezvenyek`
--

CREATE TABLE `rendezvenyek` (
  `rendezvenyID` int(11) NOT NULL,
  `szervezoID` int(11) NOT NULL,
  `nev` varchar(254) COLLATE utf8_hungarian_ci NOT NULL,
  `reszveteliMod` int(11) NOT NULL,
  `rendezvenyDatuma` datetime NOT NULL,
  `helyszin` varchar(256) COLLATE utf8_hungarian_ci NOT NULL,
  `leiras` varchar(1000) COLLATE utf8_hungarian_ci NOT NULL,
  `jegyAr` int(20) NOT NULL,
  `kep` varchar(256) COLLATE utf8_hungarian_ci NOT NULL,
  `elerhetoJegyekSzama` int(11) NOT NULL,
  `eladottJegyekSzama` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `szervezok`
--

CREATE TABLE `szervezok` (
  `szervezoID` int(11) NOT NULL,
  `szervezetNev` varchar(256) COLLATE utf8_hungarian_ci NOT NULL,
  `email` varchar(256) COLLATE utf8_hungarian_ci NOT NULL,
  `jelszo` varchar(256) COLLATE utf8_hungarian_ci NOT NULL,
  `mobilSzam` varchar(31) COLLATE utf8_hungarian_ci NOT NULL,
  `telefonSzam` varchar(31) COLLATE utf8_hungarian_ci NOT NULL,
  `megye` varchar(30) COLLATE utf8_hungarian_ci NOT NULL,
  `varos` varchar(60) COLLATE utf8_hungarian_ci NOT NULL,
  `irSzam` varchar(10) COLLATE utf8_hungarian_ci NOT NULL,
  `cim` varchar(30) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `szervezok`
--

INSERT INTO `szervezok` (`szervezoID`, `szervezetNev`, `email`, `jelszo`, `mobilSzam`, `telefonSzam`, `megye`, `varos`, `irSzam`, `cim`) VALUES
(1, 'AdminKFT', 'adminkft@admin.com', 'fd3e6cc704e65d76d66444044e24aadf', '06321548750', '06306257510', 'Szabolcs-Szatmár-Bereg', 'Fábiánháza', '4354', 'Ősz utca 43');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `termekleiras`
--

CREATE TABLE `termekleiras` (
  `termekID` int(11) NOT NULL,
  `rendelesID` int(11) NOT NULL,
  `rendezvenyID` int(11) NOT NULL,
  `mennyiseg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `vasarlo`
--

CREATE TABLE `vasarlo` (
  `vasarloID` int(11) NOT NULL,
  `email` varchar(254) COLLATE utf8_hungarian_ci NOT NULL,
  `jelszo` varchar(256) COLLATE utf8_hungarian_ci NOT NULL,
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
(1, 'admin@admin.com', 'fd3e6cc704e65d76d66444044e24aadf', 'Admin', 'Admin', '06205984318', 'Pest', 'Érd', '2030', 'Szénégető utca, 1.');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `rendeles`
--
ALTER TABLE `rendeles`
  ADD PRIMARY KEY (`rendelesID`),
  ADD KEY `vasarloID` (`vasarloID`);

--
-- A tábla indexei `rendezvenyek`
--
ALTER TABLE `rendezvenyek`
  ADD PRIMARY KEY (`rendezvenyID`),
  ADD KEY `szervezoID` (`szervezoID`);

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
  ADD KEY `rendezvenyID` (`rendezvenyID`),
  ADD KEY `rendelesID` (`rendelesID`);

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
  MODIFY `rendelesID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `rendezvenyek`
--
ALTER TABLE `rendezvenyek`
  MODIFY `rendezvenyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT a táblához `szervezok`
--
ALTER TABLE `szervezok`
  MODIFY `szervezoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT a táblához `termekleiras`
--
ALTER TABLE `termekleiras`
  MODIFY `termekID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `vasarlo`
--
ALTER TABLE `vasarlo`
  MODIFY `vasarloID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `rendeles`
--
ALTER TABLE `rendeles`
  ADD CONSTRAINT `rendeles_ibfk_1` FOREIGN KEY (`vasarloID`) REFERENCES `vasarlo` (`vasarloID`);

--
-- Megkötések a táblához `rendezvenyek`
--
ALTER TABLE `rendezvenyek`
  ADD CONSTRAINT `rendezvenyek_ibfk_1` FOREIGN KEY (`szervezoID`) REFERENCES `szervezok` (`szervezoID`);

--
-- Megkötések a táblához `termekleiras`
--
ALTER TABLE `termekleiras`
  ADD CONSTRAINT `termekleiras_ibfk_1` FOREIGN KEY (`termekID`) REFERENCES `rendeles` (`rendelesID`),
  ADD CONSTRAINT `termekleiras_ibfk_2` FOREIGN KEY (`rendezvenyID`) REFERENCES `rendezvenyek` (`rendezvenyID`),
  ADD CONSTRAINT `termekleiras_ibfk_3` FOREIGN KEY (`rendelesID`) REFERENCES `rendeles` (`rendelesID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
