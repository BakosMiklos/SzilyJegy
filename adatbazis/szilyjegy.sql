-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2022. Ápr 29. 21:01
-- Kiszolgáló verziója: 10.4.24-MariaDB
-- PHP verzió: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Tábla szerkezet ehhez a táblához `kosar`
--

CREATE TABLE `kosar` (
  `kosarID` int(11) NOT NULL,
  `rendezvenyID` int(11) NOT NULL,
  `rendezveny` varchar(256) COLLATE utf8_hungarian_ci NOT NULL,
  `vasarloID` int(11) NOT NULL,
  `mennyiseg` int(11) NOT NULL,
  `ar` int(11) NOT NULL
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
  `rendezvenyDatuma` date NOT NULL,
  `rendezvenyIdeje` time NOT NULL,
  `helyszin` varchar(256) COLLATE utf8_hungarian_ci NOT NULL,
  `leiras` varchar(1000) COLLATE utf8_hungarian_ci NOT NULL,
  `jegyAr` int(20) NOT NULL,
  `kep` varchar(256) COLLATE utf8_hungarian_ci NOT NULL,
  `elerhetoJegyekSzama` int(11) NOT NULL,
  `eladottJegyekSzama` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `rendezvenyek`
--

INSERT INTO `rendezvenyek` (`rendezvenyID`, `szervezoID`, `nev`, `reszveteliMod`, `rendezvenyDatuma`, `rendezvenyIdeje`, `helyszin`, `leiras`, `jegyAr`, `kep`, `elerhetoJegyekSzama`, `eladottJegyekSzama`) VALUES
(17, 1, 'Sound on!', 0, '2022-04-30', '23:00:00', 'Miami', 'Hhahah, Hihihih!\r\n\r\n', 3450, 'kepek/festival.jpg', -3, 3),
(19, 1, 'Anyád', 0, '2022-04-29', '22:00:00', 'Budapest Park', 'sdjhmngfdthdgnf', 2500, 'kepek/mokus.jpg', -1, 1);

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
(1, 'admin@admin.com', 'fd3e6cc704e65d76d66444044e24aadf', 'Admin', 'Admin', '06205984318', 'Pest', 'Érd', '2030', 'Szénégető utca, 1.'),
(11, 'bakosmik74@gmail.com', '7815696ecbf1c96e6894b779456d330e', 'Bakos', 'Miklós', '06306257510', 'Szabolcs-Szatmár-Bereg', 'Fábiánháza', '4354', 'Ősz utca 43');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `kosar`
--
ALTER TABLE `kosar`
  ADD PRIMARY KEY (`kosarID`);

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
-- A tábla indexei `vasarlo`
--
ALTER TABLE `vasarlo`
  ADD PRIMARY KEY (`vasarloID`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `kosar`
--
ALTER TABLE `kosar`
  MODIFY `kosarID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT a táblához `rendezvenyek`
--
ALTER TABLE `rendezvenyek`
  MODIFY `rendezvenyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT a táblához `szervezok`
--
ALTER TABLE `szervezok`
  MODIFY `szervezoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT a táblához `vasarlo`
--
ALTER TABLE `vasarlo`
  MODIFY `vasarloID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
