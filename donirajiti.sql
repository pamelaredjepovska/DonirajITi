-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2021 at 03:44 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `donirajiti`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategorii`
--

CREATE TABLE `kategorii` (
  `Kategorija_ID` int(11) NOT NULL,
  `Kategorija` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kategorii`
--

INSERT INTO `kategorii` (`Kategorija_ID`, `Kategorija`) VALUES
(1, 'Tehnologija'),
(3, 'Sredstva za higiena'),
(4, 'Obleka'),
(5, 'Medicinska pomos'),
(6, 'Socijalna pomos'),
(8, 'Drugo'),
(9, 'Paricna pomos');

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `Korisnik_ID` int(11) NOT NULL,
  `Ime` varchar(50) NOT NULL,
  `Prezime` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Telefon` varchar(11) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(260) NOT NULL,
  `Uloga` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`Korisnik_ID`, `Ime`, `Prezime`, `Email`, `Telefon`, `Username`, `Password`, `Uloga`) VALUES
(2, 'Pamela', 'Redjepovska', 'pamela.redzepovska@gmail.com', '077-123-456', 'pamred99', 'WatermelonSugar_1', 1),
(1081, 'Pamela', 'Redzepovska', 'Redzepovska@gmail.com', '071-066-066', 'admin001', '9946cc61fde04976822faea105deaabefd1694185f05d04d24e166af017a2c39', 1),
(1084, 'Селина', 'Реџеповска', 'selinar@gmail.com', '077-123-134', 'SelinaR1', '37389ef367b949fe09fd26f40e3df463590969b6f8b81bc84bd54d40aab8c758', 2),
(1085, 'Елизабета', 'Реџеповска', 'beti_r@yahoo.com', '078-300-300', 'Beti_R', 'e82c4ab752812aa6c12971d9e382c2fa09c6cd65b404c65fbf6a71c4ca360b0b', 2),
(1150, 'Нафис', 'Реџеповски', 'nafisredj@gmail.com', '077-804-804', 'NafisRedj', '3d86136df30e311d96d81a487169624b2f5eeb66facfe06a56dc89c9571f1e72', 2),
(1172, 'Angelarij', 'Ivanovski', 'AngelarijIvanovski94@gmail.com', '077-222-233', 'Angelarij94', '7d11a76802530c41da419fb02c7761e88ac8a4a8c50e62af8d6b0caeb8c9dbbd', 2),
(1173, 'Violeta', 'Mihailoska', 'VioletaMihailoska44@gmail.com', '077-224-533', 'VikiM44', 'e971692e241eaab4d4fe65aa229deba9ac8bfcf6c9a8bb3f311b76a76518830d', 2),
(1174, 'Danail', 'Milevski', 'DanailMIlevski27@gmail.com', '070-222-543', 'Danail27', '998689f70bd08213774de274e1aac6db6d75f9cca3e169c85a50620578c184e0', 2),
(1175, 'Bojana', 'Dimitrova', 'BojanaDimitrova79@gmail.com', '077-342-256', 'BojanaDim79', '99ae6b15dbded9b93bb63cd9f16238229d7647bf02524d53fbb23e9aaa41e184', 2),
(1176, 'Evgenij', 'Donevski', 'EvgenijDonevski006@gmail.com', '077-762-753', 'Evgenij006', '9c635de5ef9b97ca4ae838474d13768bfe72f21ff163ebb63f011134b70f1582', 2),
(1177, 'Emanuel', 'Malinovski', 'EmanuelMalinovski010@gmail.com', '070-042-298', 'Emanuel010', 'e006901ce50235f675a9799e9ed39b09d1073f519fc00213bf9ea8654033c8b4', 2),
(1178, 'Евгенија', 'Јанкоска', 'EvgenijaJankoska016@gmail.com', '070-402-678', 'Evgenija016', '6da6c3947b9a40a8ca7ee8775ad5e9b70fb43afe542d2b636777119a1c90262a', 2),
(1179, 'Zaharij', 'Krstovski', 'ZaharijKrstovski032@gmail.com', '077-234-060', 'Zaharij032', 'ac880e285cfc7076b639f82c0e508eed18a71103bab79bbc6eb18498c88bfba4', 2),
(1180, 'Zorica', 'Nedelkova', 'ZoricaNedelkova043@gmail.com', '070-289-298', 'Zorica043', '99b1f1c278f83275809ac730dedb034f40979945817b809626d406e6cf505958', 2),
(1181, 'Ignatij', 'Tasev', 'IgnatijTasev047@gmail.com', '070-009-308', 'Ignatij047', '9f3faf22a4e4396ed7ea4374d957ae7217252d1790fbb7740b8841a518d8ff6b', 2),
(1182, 'Isidora', 'Stojcevska', 'IsidoraStojcevska053@gmail.com', '070-042-200', 'Isidora53', '7e0ebfd0765f575186ce724f6d0036ac7249bd3a0d533737b3bf248352ebec88', 2),
(1183, 'Јаков', 'Новаков', 'JakovNovakov060@gmail.com', '078-290-754', 'Jakov60', '81799ace8256247d5f468ec1a0b114eea0229f7069b05b57e7027bbdcd5f5e4f', 2),
(1184, 'Jasmina', 'Alabakova', 'JasminaAlabakova072@gmail.com', '070-902-218', 'Jasmina72', '8ce591c5be28f447168ae010794521a9a6da63c18969ed39e944241d81c6a6b4', 2),
(1185, 'Калин', 'Цветковски', 'KalinCvetkovski080@yahoo.com', '077-912-668', 'Kalin80', '67d15ef84c22366b18ef93b41505b886e679be6cff58acf1babf6951130d9acf', 2),
(1186, 'Kalina', 'Arsovkska', 'KalinaArsovska097@yahoo.com', '070-565-818', 'Kalina97', 'b5c22cafb8e9af8d1d84657070e94581baeb394624cbf419fcfb9d6d118d7444', 2),
(1187, 'Katina', 'Ristevska', 'KatinaRistevska093@yahoo.com', '070-110-200', 'Katina93', '66a6a13d35a39dec3818afb17be9ca56aa0dc2daaece0e4adf1cff9559456a03', 2),
(1188, 'Валентина', 'Орцева', 'ValentinaOrceva54@gmail.com', '077-873-112', 'Vale54', '18d458f4cc76e6a9dadfbe71d4d0876a6a94218e0549f097107653a89b681069', 2),
(1189, 'Eftim', 'Malinkoski', 'EftimMalinkoski013@gmail.com', '070-042-298', 'Eftim13', '2473519307535fe1ee304f910c21d646f0c28c32ae2d2734d5f37c1729742966', 2),
(1190, 'Penelope', 'Garcia', 'PenelopeGarcia15@gmail.com', '077-905-802', 'Penelope15', 'a722b00714470226bda4b4178d43d28c7f0614674d447b95f53d939b3239b736', 2),
(1191, 'Емили', 'Прентис', 'EmilyPrentiss20@gmail.com', '078-341-022', 'EmilyP20', 'cfc9029e2d9ea58b7c4c8b69f8c62f7729e4d381194c2c46e909f1c5ed8e82e5', 2);

-- --------------------------------------------------------

--
-- Table structure for table `objavi`
--

CREATE TABLE `objavi` (
  `Objava_ID` int(11) NOT NULL,
  `Naslov` varchar(1000) NOT NULL,
  `Sodrzina` text NOT NULL,
  `Lokacija` varchar(50) NOT NULL,
  `Datum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Tip` enum('Baranje','Donacija') NOT NULL,
  `Picture` varchar(100) NOT NULL,
  `KorisnikID` int(11) NOT NULL,
  `KategorijaID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `objavi`
--

INSERT INTO `objavi` (`Objava_ID`, `Naslov`, `Sodrzina`, `Lokacija`, `Datum`, `Tip`, `Picture`, `KorisnikID`, `KategorijaID`) VALUES
(6, 'пример2', '<p>пример2 донација</p>', 'Aerodrom', '2021-04-10 11:25:55', 'Donacija', 'baranja1.png', 1081, 1),
(7, 'донирам ', '<b>донирам телефон</b><p>, малку користен</p>', 'Aerodrom', '2021-04-10 11:27:25', 'Donacija', 'd2.jpg', 1081, 1),
(8, 'Барање за донација', '<p>Барам </p><b>парична помош </b><p>за лекување</p>', 'Aerodrom', '2021-04-10 11:29:20', 'Baranje', 'connect.png', 1081, 9),
(9, 'Doniram one plus 5T', '<p>Telefonot e perfektno zacuvan.Se prodava so originalniot polnac, eu adapter, hydrogel screen protector(veke zalepen) i 2 maski.</p><p>Poveke info za telefonot:</p><p>https://www.google.com/amp/s/m.gsmarena.com/oneplus_5t-ampp-8912.php				 						</p>', 'Stip', '2021-04-10 15:31:23', 'Donacija', 'Prodavam-one-plus-5T--BEZ-ZAMENI-.jpeg', 1084, 1),
(10, 'LG TV', '<p>Model: 47LB580V</p><div>dobro socuvan</div>', 'Stip', '2021-04-10 15:33:06', 'Donacija', 'LG-TV.jpeg', 1084, 1),
(11, 'Klub masa', '<p>masivno drvo, plus zastitno staklo				 						</p><div>120x60, visocina 55 cm</div>', 'Stip', '2021-04-10 15:34:23', 'Donacija', 'Klub-masa---masivno-drvo--plus-zastitno-staklo-.jpeg', 1084, 6),
(12, 'Апел за помош на Грозда Лазароска', '<p>Гоки е млада девојка која боледува од парализа. За подобрување на нејзината состојба потребни се повеќе третмани за ослободување на мускулната контрактура. Треба да се изврши операција на клиниката во Чуприја, Србијa</p><p>Да&nbsp;ѝ&nbsp;помогнеме на Гоки во исполнувањето на нејзиниот сон – здрав живот.</p><p>Да подадеме рака!</p><p><strong>Телефонски број за донации од мрежата на Телеком: 070 143-119</strong></p><p><strong>Телефонски број за донации преку мрежата на А1: 143-468</strong></p><p>Преземено од фб и А1.</p>', 'Veles', '2021-04-10 15:35:56', 'Baranje', '169144615_10219744191663356_3769014475798001210_n1.jpg', 1085, 9),
(13, 'Sporet Alfa Plam', '<p>Sporetot e mnogu cuvan mnogu malce e koristen moze da se vidi vo sekoe vreme				 						</p>', 'Veles', '2021-04-10 15:37:32', 'Donacija', 'Sporet-Alfa-Plam.jpeg', 1085, 6),
(14, 'Zenska zimska jakna', '<p>Донирам супер женска зимска јакна за скијање или сноубординг, марка Protest водоотпорна и заштитува од ветер купена во Madness Skopje				 						</p>', 'Berovo', '2021-04-10 15:40:17', 'Donacija', 'Zenska-zimska-jakna-skijanje-snowboard-.jpeg', 1150, 4),
(15, 'Апел за помош на Ребека Александровска', '<p>По ненадеен мозочен удар на 3 месеци и по 5 операции, направени во период од 12 месеци, сега на малата Ребека и е дијагностицирана церебрална парализа.</p><p>Таа сега има 1 година, но се уште е во состојба на новороденче.</p><p>За среќа сега е понудена можноста за лекување во Турција, каде би требало да добие две дози на матични клетки, по што би требало да го пронајде својот пат до закрепнување.</p><p>За таа цел се потребни 19.000 евра кои родителите не можат да ги обезбедат, па молат за помош кај сите луѓе кои имаат желба и можност да помогнат!</p><p>Да помогнеме.</p>', 'Berovo', '2021-04-10 15:41:05', 'Baranje', 'giving-2-768x519.jpg', 1150, 9),
(16, 'Апел за помош на Среќко Стојковски', '<p>Да му помогнеме на Среќко Стојковски. Тој е заболен од Ковид 19, и поради тешката здравствена состојба семејството самостјно решава да се смести во приватната болница „Филип Втори”.</p><p>Сумата која му е потребна за лекување е 732000 денари.</p><p>Да помогнеме!</p><p><strong>Телефонски број за донации преку мрежата на Телеком:&nbsp;070 143-191</strong></p><p><strong>Телефонски број за донации преку мрежата на А1: 077 143-505</strong></p><p>Преземено од Телеком и А1.</p>', 'Grad Skopje', '2021-04-10 15:42:01', 'Baranje', 'depositphotos_315256992-stock-photo-young-man-sitting-grass-park1.jpg', 1150, 9),
(17, 'DONIRAM LAPTOP LENOVO', '<p>LAPTOP LENOVO IDEAPAD 320 SILVER</p><p>UPOTREBUVAN DVA MESECA</p><p>OD EDEN KORISNIK</p><p>NABAVEN VO NEPTUN MKD</p><p>SOSTOJBA KAKO NOV</p><p>CPU I3 6TA GEN</p><p>RAM 4GB</p><p>HDD 500GB</p><p>15.6 INCEN LCD DISPLAY</p><p>VRAM NVIDIA MX 2GB</p><p>WIN 10				 						</p>', 'Grad Skopje', '2021-04-10 15:44:34', 'Donacija', 'LAPTOP-LENOVO-IDEAPAD-320-SILVER.jpeg', 1172, 1),
(18, 'Se DONIRAAT ucebnici za EKONOMSKI FAKULTET', '<p>Se doniraat ucebnici za ekonomski fakultet:</p><ul><li>STATISTIKA ZA BIZNIS I EKONOMIJA- Slave</li><li>EKONOMIJA- Taki</li><li>PRETPRIEMNISTVO- Taki</li><li>MATEMATICKI TABLICI- Drage janev</li><li>BUDZETSKO PRAVO- za Praven fakultet				 						</li></ul>', 'Grad Skopje', '2021-04-10 15:46:09', 'Donacija', 'Se-POKLONUVAAT-ucebnici-za-EKONOMSKI-FAKULTET.jpeg', 1172, 8),
(19, 'Апел за помош на Ристо Гиовски', '<p>Ристо Гиовски боледува од карцином на абдоменот. Семејството самостојно решава да го продолжи лекувањето со хемотерапии во Турција.</p><p>Сумата која е потребна се 8700 евра.</p><p>Да бидеме хумани и да помогнеме заедно во оваа негова битка со тешката болест.</p><p><strong>Телефонски број за донации преку мрежата на Телеком:&nbsp;070 143-124</strong></p><p><strong>Сметки на кои може да донирате:</strong></p><p>Ристо Гиовски</p><p>с-ка 300007081853830</p><p>комерцијална банка АД Скопје				 						</p>', 'Struga', '2021-04-10 15:47:58', 'Baranje', 'C06-mrnoMAIN.jpg', 1173, 9),
(20, 'Апел за помош на Кристијан Андреев', '<p>Да му помогнеме на Кристијан Андреев. Тој е младо момче кое има повреда на колкот и мора да се оперира. Семејството одлучува интервенцијата да се изведе во Турција, со метод на калемење на коската.</p><p>Сумата која е потребна е 10 000 евра.</p><p>Да помогнеме.</p><h3>Број за донација</h3><p><strong>070 143-125</strong>&nbsp;(Телеком)</p><p><strong>077 143-464</strong>&nbsp;(A1)</p><h3>Сметка за донација</h3><p>210-7000006478-05</p><p>НЛБ Банка</p><h3>За донации од странство</h3><p>IBAN CODE MK 07210501699259629</p><p>SWIFT TUTNMK22</p><p>Отворен е и профил за донации на&nbsp;<a href=\"https://www.gofundme.com/f/qf6yz6\">GoFundMe</a>.</p>', 'Karpos', '2021-04-10 15:48:56', 'Baranje', 'Little-boy-and-toy-sitting-on-the-hill-Stock-Photo1.jpg', 1173, 9),
(21, 'Донирам ЛАПТОП', '<p>Модел: HP 250 G4</p><p>Процесор: Intel Coleron N3050 with Intel HD Graphics(1.6 GHz, up to 2.16 GHz, 2 MB cache, 2 cores)</p><p>Рам: 4 GB DDR3</p><p>Графика: Intel HD* Graphics</p><p>Екран: 15.6 in diagonal HD* SVA anti-glare flat LED-backlit(1366x768)</p><p>Хард диск: 500 GB 5400 rpm SATA Hard Drive</p><p>*Мрежна картичка, Wireless, Аудио, ХД Камера</p><p>*Додатоци: Полнач, Торба				 						</p>', 'Gostivar', '2021-04-11 12:46:22', 'Donacija', 'laptop.jpeg', 1174, 1),
(22, 'DETSKI KREVET NA DVA SPRATA', '<p>KREVETOT E VO ODLICNA SOSTOJBA .				 						</p>', 'Gostivar', '2021-04-11 12:49:14', 'Donacija', 'DETSKI-KREVET-NA-DVA-SPRATA.jpeg', 1174, 6),
(23, 'Апел за помош на Томи Џатев', '<p>Да му помогнене на Томи Џатев, кој боледува од тумор на панкреас , проширен на мезентерexијална артерија. Заради местополжбата на туморот, истиот хируршки не е отстранет, што додатно го отежнува лекувањето.</p><p>Семејството самостојно се одлучува да одат на варијанта хемотерапија и радиотерапија кои што влеват додатна надеж за подобрување на неговиот квалитет на живеење и целосно оздравување. За овие третмани потребни се 33.405 еу.</p><p><strong>Телефонски број за донации преку мрежата на Телеком:&nbsp;070 143-118</strong></p><p><strong>Телефонски број за донации преку мрежата на А1: 077 143-462</strong></p><p><strong>Сметка за донација: 270-7000567713-33 Хулк Банка</strong></p>', 'Krusevo', '2021-04-11 12:50:11', 'Baranje', 'man_gazing_landscape_looking_male-836548.jpgs_.jpg', 1174, 9),
(24, 'Baram maska obleka za doniranje', '<p>Golemina X/Xl</p><div>Ve molam kontaktirajte me</div>', 'Novo Selo', '2021-04-11 12:51:50', 'Baranje', 'Visoko-kvalitetna-maska-obleka.jpeg', 1175, 4),
(26, 'huawei p20 lite i samsung a6 kupeni 2018 god', '<p>Se doniraat dva telefoni: huawei p20 lite i samsung a6 kupeni 2018 godina odlicno socuvani, moze da vidite na slikite. Telefonite se vo odlicna sostojba bez mani.&nbsp;				 						</p>', 'Ohrid', '2021-04-11 12:55:47', 'Donacija', 'se-prodava-huawei-p20-lite-i-samsung-a6-kupeni-2018-god.jpeg', 1177, 1),
(27, 'Adidas kopacki', '<b>Se doniraat Adidas kopacki br. 41&nbsp;				 						</b>', 'Ohrid', '2021-04-11 12:56:56', 'Donacija', 'Adidas-kopacki-br--41.jpeg', 1177, 4),
(29, 'Апел за помош на Марина Гулеска', '<p>39-годишната прилепчанка Марина Гулеска пред 12 години имала кpваpeње во мозокот по што целата нејзина лева страна од телото и ocтанала пapaлизиpaна. Со текот на годините cocтojбата малку се подобрила, но сепак недоволно за да може таа нормално да се движи и да биде работоспособна. Марина е самохрана мајка на 16 годишен син. Сега во една клиника во Ниш, соседна Србија и понудиле третман со кој што во голема мера ќе и се врати функционалноста на мускулатурата. Но таа ги нема потребните 6.500 евра колку што чини терапијата.</p><p>Да помогнеме!</p>', 'Valandovo', '2021-04-11 13:00:02', 'Baranje', '360_F_405877047_hgQ1bj9fz3B7kncBaNST2p8jIMTHyH1W1.jpg', 1177, 9),
(30, 'Detska kolicka', '<p>Zacuvana koristena e samo 2 meseci vo dobra sostojba				 						</p>', 'Stip', '2021-04-11 13:01:21', 'Donacija', 'Detska-kolicka.jpeg', 1178, 6),
(31, 'Apple Macbook Pro 2012', '<i>Doniram&nbsp;Apple Macbook Pro 2012 vo dobra sostojba</i>', 'Stip', '2021-04-11 13:02:25', 'Donacija', 'Apple-Macbook-Pro-2012.jpeg', 1178, 1),
(32, 'Baram laptop za donacija', '<p>&nbsp;Baram laptop za donacija za sledenje na online nastava</p>', 'Kratovo', '2021-04-11 13:04:17', 'Baranje', 'Laptop-Acer-Aspire.jpeg', 1179, 1),
(33, 'Апел за помош на Ангел Ацковски', '<p>Малиот Ангел Ацковски има само две години и боледува од сколиоза. Поради неговата состојба тој не е во можност самостојно да се движи.</p><p>Семејството самостојно одлучува операцијата на детето да се изврши во Турција. На Ангел му е потребна итна помош, затоа што болеста прогресира.</p><p>Да помогнеме!</p><p><strong>Телефонски број за донации преку мрежата на Телеком:&nbsp;070 143-134</strong></p>', 'Vinica', '2021-04-11 13:05:22', 'Baranje', '147008003_10158215001944039_5560884531440549759_o1-768x512.jpg', 1179, 9),
(34, 'Атлас на човечката анатомија од Френк Нетер', '<p>Најново 7 издание на книгата Атлас на човечката анатомија од Френк Нетер. Прво Издание на Македонски Јазик, Број на страни: 642.				 						</p>', 'Negotino', '2021-04-11 13:07:28', 'Donacija', 'covecka anatomija.jpeg', 1180, 8),
(35, 'Doniram', '<p>Digitalen aparat za merenje pritisok				 						</p>', 'Negotino', '2021-04-11 13:09:35', 'Donacija', '5f60e2d0-f163-4559-acc8-44810faaf737.jpg', 1180, 5),
(36, 'Samsung Galaxy Tab 3', '<p>tablet Samsung Galaxy Tab 3 16 GB</p><p>Odlicno socuvan i mnogu malku koristen.				 						</p>', 'Karpos', '2021-04-11 13:11:46', 'Donacija', 'Samsung-Galaxy-Tab-3.jpeg', 1182, 1),
(37, 'Doniram sediste za vo kola', '<p>Novo e, odlicno socuvano</p>', 'Kisela Voda', '2021-04-11 13:14:13', 'Donacija', 'Sediste-za-vo-kola.jpeg', 1182, 8),
(38, 'Апел за помош на Maријана Димоска', '<p>Maријана Димоска боледува од тумор на мозокот. Поради неоперативноста на туморот, семејството самостојно решава таа да оди на имунотерапија во Турција. Сумата која е потребна се 18000 евра за циклус од 6 недели. Третманите не се одобрени од фондот затоа што станува збор за алтернативно лекување.</p><p>Да помогнеме.</p><p><strong>Телефонски број за донации преку мрежата на Телеком:&nbsp;070 143-127</strong></p>', 'Probistip', '2021-04-11 13:15:06', 'Baranje', 'womens-snow-boots-today-main-200108_0c256423263debbd2e7d83c390eec1c4.fit-2000w1-768x384.jpg', 1182, 9),
(39, 'Апел за помош на Адријан Билбил', '<p>Да му помогнеме на Адријан Билбил. Поради компликации од оперативен зафат неколкупати неуспешно третирани, семејството на своја иницијатива решава Адриан да оди на нов оперативен зафат во Турција, за што му се потребни финансиски средства кои семејството неможе да ги обезбеди, а тоа е сума од 18000 евра.</p><p>Да помогнеме.</p><p><strong>Телефонски број за донации преку мрежата на Телеком:&nbsp;070 143-183</strong></p>', 'Resen', '2021-04-11 13:16:21', 'Baranje', 'pexels-lucas-pezeta-3772365.jpg', 1183, 9),
(40, 'SAMSUNG GRAND PRIME', '<p>Odlicno socuvan, ima microsoft teams</p>', 'Aerodrom', '2021-04-11 13:17:33', 'Donacija', 'SAMSUNG-GRAND-PRIME.jpeg', 1183, 1),
(41, 'Novi visoki zenski cevli', '<p>необлечен нов пар чевли (бр. 42/28цм должина на стопало) - кожни, високи				 						</p>', 'Aerodrom', '2021-04-11 13:18:47', 'Donacija', 'Novi-visoki-zenski-cevli.jpeg', 1183, 4),
(42, 'Baram patiki za donacija', '<p>Za moeto dete, broj 39</p>', 'Gazi Baba', '2021-04-11 13:20:16', 'Baranje', 'Se-prodavaat-nike-air-max-br-42-5.jpeg', 1184, 4),
(43, 'Baram tablet', '<p>Mi treba za online nastava, min 2GB</p>', 'Gazi Baba', '2021-04-11 13:21:22', 'Baranje', 'Tablet-Lenovo-Tab-4--10-Plus.jpeg', 1184, 1),
(44, '27inch monitor', '<p>Se donira 27inch Benq monitor. Bez nikakvi defekti ili mrtvi pikseli. Si raboti bez problemi.				 						</p>', 'Kavadarci', '2021-04-11 13:22:53', 'Donacija', 'Prodavam-27inch-monitor.jpeg', 1185, 1),
(45, 'Работно биро за детска соба', '<p>Донирам работна маса - биро.</p><p>Погодна за ученици.</p><p>Модерен дизајн.</p><p>Изработена од медијапан.				 						</p>', 'Kavadarci', '2021-04-11 13:24:10', 'Donacija', 'biro.jpeg', 1185, 6),
(46, 'BEZKONTAKTEN DIGITALEN TOPLOMER/TERMOMETAR', '<p>Безконтактен дигитален инфраред топломер за мерење телесна температура, плус опција за мерење температура на предмети...</p><p>- 2 модови на мерење: телесна и температура на предмети</p><p>- 1 секунда време на мерење температура</p><p>-LCD дисплеј</p><p>-безконтактен со голема прецизност инфраред сензор</p><p>-звучен и визуелен боја аларм</p><p>-20 мемории на измерени вредности</p><p>-индикатор на батерија</p><p>-автоматско исклучување				 						</p>', 'Veles', '2021-04-11 13:25:20', 'Donacija', '183d934a-a340-4802-8e50-f995f6f345ff.jpg', 1185, 5),
(47, 'Апел за помош на Ѓорѓе Џонов', '<p>29- годишниот Ѓорѓи Џонов од Пирава, Валандово е наш фудбалер, кој е пред&nbsp; најголемиот предизвик во својот живот, во битка со болест за која е неопходно итно лекување во Турција.</p><p>За лекувањето на Џонов се неопходни&nbsp;<strong>100.000</strong>&nbsp;евра, средства кои во моментов ги нема на располагање, поради што голем број наши сограѓани се повикуваат да&nbsp; се активираат во трката со времето за собирање на финансиските средства.</p><p>Да помогнеме.</p><p><strong>Бидете хумани и со јавување на телефонските броеви: A1-077 143-460&nbsp; и T-Mobile-070 143-113, донирајте 100 денари за ЃОРЃИ!</strong></p>', 'Bitola', '2021-04-11 13:26:48', 'Baranje', 'frostbite-winter-running-tips1-768x576.jpg', 1186, 9),
(48, 'Апел за помош на Виктор Видојевиќ', '<p>Да му помогнеме на малиот Виктор Видојевиќ. Тој боледува од церебрална парализа. За подобрување на неговата состојба семејството смета дека треба да оди на рехабилитација во Австрија, но сумата која е потребна се 331 500 денари. Овој тип на лекување не е финансиран од фондот за здравство затоа што станува збор за алтернативно лекување. Да помогнеме.				 						</p>', 'Bitola', '2021-04-11 13:27:41', 'Baranje', 'toddler-child-play-playing-preview1.jpg', 1186, 9),
(49, 'Skolski ranec школски ранец', '<p>Odlicno socuvan, malku koristen</p>', 'Valandovo', '2021-04-11 13:29:28', 'Donacija', 'Skolski-ranec.jpeg', 1186, 8),
(50, 'Baram telefon', '<p>Model bilo kakov, min da e 2GB RAM</p>', 'Vevcani', '2021-04-11 13:31:30', 'Baranje', 'POCO-NFC-X3-.jpeg', 1187, 1),
(51, 'Кампања на Црвен крст за помош на предвремно родени и болни бебиња', '<p>Црвениот крст на Република Северна Македонија во своите простории на 03.03.2021 година во 11:00 часот организираше прес конференција каде Црвениот крст од денеска ја спроведува “Кампања за помош на предвремно родени и болни бебиња”. Со цел да обезбеди донација за одделот за Неонатологија при Универзитетска Клиника за детски Болести – Скопје. Средствата што ќе се соберат ќе бидат наменети за набавка на инкубатор за предвремно родени и болни бебиња сместени на Детската Клиника.</p><p>На самиот прес се обрати генералниот секретар на Црвениот крст д-р Саит Саити, сопругата на претседателот на државата Др. Елизабета Георгиевска и директорката на Детската Клиника Др. Наташа Најдановска Алулоска.</p><p>Поддржувач на “Кампања за помош на предвремно родени и болни бебиња” е сопругата на претседателот на државата Др. Елизабета Георгиевска.</p><p>Од денеска на располагање се и телефонските броеви за донации за корисниците на&nbsp;<strong>Македонски Телеком 143 400</strong>&nbsp;и за корисниците на&nbsp;<strong>А1 Македонија 143 400</strong>&nbsp;каде може со еден повик од било кој оператор да донирате 100 денари.</p><p>Заинтересирани лица и компании може да донираат и преку&nbsp;<strong>жиро сметката на фондот за солидарност 300000001327966</strong>.</p>', 'Grad Skopje', '2021-04-11 13:32:39', 'Baranje', 'Kampanja-Crven-krst-032020-small-768x508.png', 1187, 9),
(52, 'PC vo odlicna sostojba', '<p>Pc e vo odlicna sostojba nova graficka novo naponsko</p><p>Graficka 1050 ti 4 g</p><p>Procesor athlon 2</p><p>Naponsko 45000AB</p><p>Kopjuterot podrzuva sekakvi igri&nbsp;				 						</p>', 'Sveti Nikole', '2021-04-11 13:35:46', 'Donacija', 'PC-vo-odlicna-sostojba-.jpeg', 1189, 1),
(53, 'Zenski obuvki', '<p>Se doniraat zenski obuvki, br 41, novi, nenoseni.				 						</p>', 'Sveti Nikole', '2021-04-11 13:37:14', 'Donacija', 'Zenski-obuvki.jpeg', 1189, 4),
(54, 'Lenovo laptop', '<p>Doniram Lenovo laptop 400gb, kontaktirajte me na tel.broj</p>', 'Sveti Nikole', '2021-04-11 13:38:17', 'Donacija', 'Lenovo-llaptop.jpeg', 1189, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ulogi`
--

CREATE TABLE `ulogi` (
  `Uloga_ID` int(11) NOT NULL,
  `Uloga` enum('admin','normal') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ulogi`
--

INSERT INTO `ulogi` (`Uloga_ID`, `Uloga`) VALUES
(1, 'admin'),
(2, 'normal');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategorii`
--
ALTER TABLE `kategorii`
  ADD PRIMARY KEY (`Kategorija_ID`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`Korisnik_ID`),
  ADD KEY `korisnik_uloga` (`Uloga`);

--
-- Indexes for table `objavi`
--
ALTER TABLE `objavi`
  ADD PRIMARY KEY (`Objava_ID`),
  ADD KEY `KorisnikID` (`KorisnikID`),
  ADD KEY `KategorijaID` (`KategorijaID`);

--
-- Indexes for table `ulogi`
--
ALTER TABLE `ulogi`
  ADD PRIMARY KEY (`Uloga_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategorii`
--
ALTER TABLE `kategorii`
  MODIFY `Kategorija_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `Korisnik_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1192;

--
-- AUTO_INCREMENT for table `objavi`
--
ALTER TABLE `objavi`
  MODIFY `Objava_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD CONSTRAINT `korisnik_uloga` FOREIGN KEY (`Uloga`) REFERENCES `ulogi` (`Uloga_ID`);

--
-- Constraints for table `objavi`
--
ALTER TABLE `objavi`
  ADD CONSTRAINT `objavi_ibfk_1` FOREIGN KEY (`KorisnikID`) REFERENCES `korisnik` (`Korisnik_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `objavi_ibfk_2` FOREIGN KEY (`KategorijaID`) REFERENCES `kategorii` (`Kategorija_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
