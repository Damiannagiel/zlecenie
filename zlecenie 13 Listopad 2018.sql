-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 13 Sty 2018, 23:27
-- Wersja serwera: 10.1.26-MariaDB
-- Wersja PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `zlecenie`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kontakty`
--

CREATE TABLE `kontakty` (
  `id` int(11) NOT NULL,
  `id_ogloszenia` int(11) NOT NULL,
  `id_uzytkownika` mediumint(9) NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `kontakty`
--

INSERT INTO `kontakty` (`id`, `id_ogloszenia`, `id_uzytkownika`, `data`) VALUES
(1, 1, 2, '2017-10-02 18:20:42'),
(2, 3, 1, '2017-10-08 12:12:27'),
(3, 1, 4, '2017-10-08 12:18:19'),
(4, 37, 1, '2017-11-23 21:59:00'),
(5, 5, 10, '2017-11-24 09:26:58'),
(6, 32, 1, '2017-11-24 11:19:16'),
(7, 39, 5, '2017-11-26 22:09:22'),
(8, 5, 1, '2017-12-23 09:22:36'),
(9, 29, 1, '2017-12-23 13:27:45'),
(10, 34, 1, '2017-12-23 14:11:58'),
(11, 31, 13, '2018-01-07 17:55:16');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ogloszenia`
--

CREATE TABLE `ogloszenia` (
  `id` int(11) NOT NULL,
  `uzytkownik_id` mediumint(9) NOT NULL,
  `typ` char(1) COLLATE utf8_polish_ci NOT NULL,
  `dodano` datetime NOT NULL,
  `koniec` datetime NOT NULL,
  `zasieg` text COLLATE utf8_polish_ci NOT NULL,
  `miasto` tinytext CHARACTER SET utf32 COLLATE utf32_polish_ci,
  `tresc` text COLLATE utf8_polish_ci NOT NULL,
  `ile_zdjec` tinyint(4) NOT NULL DEFAULT '0',
  `tytul` tinytext COLLATE utf8_polish_ci NOT NULL,
  `kategoria` tinytext COLLATE utf8_polish_ci NOT NULL,
  `cena` mediumint(9) DEFAULT NULL,
  `cena_za` tinytext COLLATE utf8_polish_ci NOT NULL,
  `opis` tinytext COLLATE utf8_polish_ci,
  `telefon` int(11) DEFAULT NULL,
  `email` tinytext COLLATE utf8_polish_ci,
  `www` text COLLATE utf8_polish_ci,
  `wyswietlen` int(11) NOT NULL DEFAULT '0',
  `kontaktow` int(11) NOT NULL DEFAULT '0',
  `osobowosc` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `ogloszenia`
--

INSERT INTO `ogloszenia` (`id`, `uzytkownik_id`, `typ`, `dodano`, `koniec`, `zasieg`, `miasto`, `tresc`, `ile_zdjec`, `tytul`, `kategoria`, `cena`, `cena_za`, `opis`, `telefon`, `email`, `www`, `wyswietlen`, `kontaktow`, `osobowosc`) VALUES
(1, 1, '2', '0000-00-00 00:00:00', '2017-06-29 18:21:33', 'łódzkie_radomszczański', NULL, 'Donec blandit egestas ex. Vivamus mattis ex quis felis egestas convallis ut ac lorem. Nullam non accumsan libero. In elementum semper maximus. Nam a consectetur nulla. Nam dapibus ligula at ligula molestie posuere. Nunc tincidunt, ante et pharetra elementum, augue justo pretium odio, eget mattis arcu purus vitae mi. Maecenas pretium neque dignissim magna facilisis sagittis mattis sit amet libero. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris sollicitudin tempor magna a vulputate. Quisque vulputate pulvinar nisl sed tincidunt. Proin id tortor vitae neque lacinia consectetur at id ligula.\r\n\r\nUt sem velit, lobortis sed fringilla a, volutpat nec ligula. Ut quis aliquet neque. Sed consectetur tellus molestie aliquet fermentum. Proin non nisi eget dolor fermentum porta eget eget sem. Mauris ultrices quis enim in molestie. Nullam ornare lectus ipsum, a semper metus laoreet eget. Ut congue in mi eu volutpat. Pellentesque tempor sagittis justo, suscipit ultricies ipsum ultrices eget. Nam.', 1, 'Instalacje Elektryczne', 'Budowlanka > Instalacje > Elektryczne', 30, 'za punkt', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris semper urna vitae est auctor molestie. Ut accumsan viverra ligula id tincidunt. Aliquam mattis!!', 663685181, 'jacan1989@gmail.com', NULL, 66, 2, 1),
(3, 4, '2', '0000-00-00 00:00:00', '2017-07-01 18:24:45', 'łódzkie_pajęczański&łódzkie_radomszczański&łódzkie_bełchatowski&łódzkie_wieluński&śląskie_częstochowski&śląskie_kłobucki', NULL, 'Suspendisse dictum ac sem id commodo. Fusce eleifend rhoncus odio, in lobortis est ullamcorper vel. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vel augue ipsum. Donec sodales lobortis erat. Integer est tellus, facilisis non venenatis at, aliquet vel augue. Vestibulum ante ipsum primis in faucibus orci luctus et.', 1, 'Usługi Hydrauliczne', 'Budowlanka > Instalacje > Hydrauliczne', 110, 'za punkt', 'Usługi hydrauliczne w najniższych cenach!', 123321456, NULL, NULL, 31, 1, 2),
(5, 5, '2', '0000-00-00 00:00:00', '2017-07-01 18:26:09', 'dolnośląskie_Wrocław&dolnośląskie_Jelenia Góra&kujawsko-pomorskie_Bydgoszcz', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas arcu ligula, auctor non velit sit amet, malesuada lacinia felis. Sed ut viverra nisi, in condimentum massa. Etiam rhoncus blandit semper. Phasellus consequat quis nisi sed venenatis. Proin posuere, metus sit amet lobortis porta, mauris mauris tincidunt neque, a lobortis dui metus sed enim. Integer egestas tincidunt dictum. Pellentesque scelerisque urna id purus sodales eleifend. Phasellus scelerisque dolor purus, eu tempor dui molestie ut. Sed eget nunc gravida, porttitor purus vel, rutrum diam.\r\n\r\nIn molestie lobortis lacus, vitae tempus justo varius id. Nullam ac turpis hendrerit nunc auctor congue. Aenean facilisis nisl eget purus ultricies congue. Etiam rutrum est et libero imperdiet, et ultricies sem pulvinar. Praesent massa tortor, gravida eget pellentesque a, porttitor vel massa. Nulla in sapien vitae tortor tempus viverra. Donec a pulvinar risus. Integer vehicula elementum mattis.\r\n\r\nVivamus feugiat tortor id fermentum euismod. Donec leo tortor, scelerisque sit amet lacus at, consectetur consectetur lectus. Nullam sit amet orci lectus. Vestibulum tristique in quam non bibendum. Phasellus et vehicula urna. Donec nec auctor sem. Vivamus sit amet feugiat velit. Vivamus sit amet felis eros. Sed cursus, est id sagittis venenatis, nunc nisl pulvinar purus, non lobortis.', 1, 'Najlepsze suknie ślubne', 'Moda zdrowie i uroda > Krawiectwo', 2500, 'za sztukę', 'Suknie ślubne na wymiar, najlepsza jakość w rozsądnej cenie', 666435789, 'mondzia@wp.pl', NULL, 43, 2, 2),
(7, 1, '2', '0000-00-00 00:00:00', '2017-07-01 21:55:20', 'opolskie_kluczborski', NULL, 'Phasellus sodales mi a accumsan sagittis. In hac habitasse platea dictumst. Vestibulum a dolor aliquam arcu porta consequat sit amet quis orci. Sed vel tristique metus. Nam pharetra iaculis quam facilisis eleifend. Quisque nec finibus orci. Integer aliquet efficitur venenatis. Curabitur blandit ex quis tortor pellentesque, et dictum dui volutpat. Vivamus aliquet ornare dictum. Nullam a risus in justo ullamcorper maximus. Curabitur a augue a ligula cursus accumsan non ac odio. Ut sit amet eros lacinia orci finibus hendrerit. Quisque consectetur bibendum enim. Sed turpis tellus, porttitor quis leo a, lacinia bibendum tortor. Donec ut nunc et lacus lobortis finibus vel a odio. Pellentesque convallis metus vitae odio mollis, ut pellentesque leo faucibus.\r\n\r\nIn ut lobortis urna. Sed eget eleifend arcu, ut luctus quam. Mauris ac bibendum lectus, sed viverra risus. Maecenas pretium in nulla ut elementum. Phasellus consectetur tortor ut sagittis ornare. Cras eget nisi eget nibh mollis vulputate. Duis luctus sed orci vitae iaculis. Vivamus cursus, lectus non sodales faucibus, nisi orci iaculis sapien, vitae consequat tellus urna in mauris. Curabitur interdum est elit, sed vestibulum magna lobortis vel.\r\n\r\nPhasellus vitae urna vel metus mollis fermentum id sed ante. Sed sollicitudin, nisi ut faucibus imperdiet, mi turpis aliquam purus, vitae mattis magna nibh sit amet odio. Sed eu orci euismod, lobortis arcu ut, facilisis sapien. In faucibus ultricies diam eget rutrum. Curabitur odio lorem.', 1, 'Korepetycje z Angielskiego', 'Edukacja i finanse > Korepetycje', 40, 'za godzinę', 'Lorem Ipsum', NULL, 'korepetycje@wp.pl', NULL, 36, 0, 1),
(29, 10, '1', '0000-00-00 00:00:00', '2017-09-02 20:01:17', 'lubelskie_Zamość', 'Zamość', 'Vivamus consectetur nibh et vulputate aliquet. Nunc at iaculis risus. Mauris placerat ante ac metus sodales, et rhoncus mauris porta. Proin lacus leo, pretium in malesuada sed, eleifend nec libero. Curabitur blandit porta dignissim. In sollicitudin pharetra ultrices. Proin diam orci, iaculis et ante ut, efficitur varius diam. In sagittis imperdiet purus at porttitor. Aliquam at dolor auctor, eleifend lorem a, rutrum nisi.\r\n\r\nDonec blandit sem metus. Duis sit amet odio convallis, auctor risus vel, fringilla dui. Vivamus vitae bibendum metus, quis laoreet nisl. Vivamus imperdiet nisi quis felis dignissim sodales. Pellentesque nunc odio, interdum quis nibh non, ornare vehicula lectus. Donec consequat.', 2, 'przykładowe ogłoszenie 5', 'Inne', NULL, 'do uzgodnienia', 'dobry opis', 663685181, NULL, NULL, 8, 1, NULL),
(30, 1, '2', '0000-00-00 00:00:00', '2017-09-02 22:28:19', 'dolnośląskie_zgorzelecki', 'Bogatynia', 'Morbi tristique tempor sapien, in rhoncus quam. Donec aliquet ligula est, eget viverra nulla convallis a. Phasellus bibendum massa eget lectus egestas dapibus. Nullam sit amet nisi urna. Pellentesque id ex ut dolor tincidunt commodo. Donec a purus at justo mattis sollicitudin. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque pharetra velit in odio malesuada vestibulum. Nam molestie quam non turpis suscipit porttitor. Nullam egestas vehicula ligula ac consectetur. In id ornare est. Vestibulum sed magna eget velit facilisis eleifend nec ut nisi. Vestibulum egestas elit in diam tincidunt, at pellentesque magna elementum. Etiam feugiat pretium cursus. Vestibulum vehicula sem feugiat tellus feugiat, bibendum.', 2, 'Blacharka', 'Motoryzacja > Naprawy > Lakiernictwo i blacharstwo', 300, 'za element', 'Usługi blacharskie na najwyższym poziomie', 534734457, NULL, NULL, 69, 0, 1),
(31, 1, '1', '0000-00-00 00:00:00', '2017-09-03 12:33:27', 'kujawsko-pomorskie_kujawsko-pomorskie', NULL, 'Sed sollicitudin consequat velit, et pretium ante tincidunt ut. Nunc convallis, justo a vulputate mattis, lectus libero fringilla felis, nec dapibus augue nulla in sapien. Donec feugiat sagittis mi, ac mollis nunc auctor eget. Suspendisse dictum dolor eu nibh imperdiet finibus. Pellentesque rutrum lacinia varius. Aliquam sed hendrerit risus. In aliquam nunc mauris, convallis posuere libero rhoncus vitae. Quisque et consectetur ex. Cras sodales sapien ut nulla mollis, a luctus ipsum volutpat.\r\n\r\nSed sollicitudin, neque at iaculis convallis, quam diam posuere nibh, nec pulvinar sapien massa vitae mauris. Vestibulum vestibulum, nisi in facilisis ultrices, diam est sodales leo, ut accumsan odio lorem ac odio. Curabitur vehicula elit enim, non tempor est aliquam et. Vestibulum non efficitur enim. Phasellus in feugiat ante. Vestibulum est nulla, vehicula eu venenatis nec, tempus a justo. Donec eu egestas massa. Nunc scelerisque leo.', 3, 'Informatyk', 'AGD RTV i komputery > Informatyka', NULL, 'do uzgodnienia', 'Szukam kogoś kto złoży mi PC', NULL, 'komputer@gmail.com', NULL, 32, 1, 1),
(32, 10, '1', '0000-00-00 00:00:00', '2017-09-03 20:53:42', 'łódzkie_radomszczański', 'Nowa Brzeźnica', 'Suspendisse efficitur in lacus quis egestas. Sed imperdiet nec nulla vestibulum hendrerit. Aliquam fringilla neque ligula, sit amet varius nulla laoreet sed. Quisque et felis non ante finibus ultrices nec sed quam. Vestibulum turpis mi, placerat hendrerit neque eget, consectetur accumsan augue. Sed vulputate leo sed elementum tempus. Nullam id ex non tellus varius aliquam vitae eu nulla. Interdum et malesuada fames ac ante ipsum primis in faucibus. Curabitur non consequat neque.\r\n\r\nInteger lacinia mattis ullamcorper. Phasellus bibendum dictum nibh vitae congue. Aliquam sagittis tellus nulla, sed cursus augue rhoncus non. Mauris gravida, ligula sed dignissim venenatis, arcu felis mollis metus, ullamcorper tincidunt dui leo vitae lorem. Donec non augue felis. Morbi sit amet tempus nibh. Duis eleifend interdum lorem, ut dapibus sapien rhoncus id. In ornare rutrum dui, ac consectetur odio blandit nec. Integer iaculis nec lacus eu porttitor.\r\n\r\nVestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Quisque vestibulum mauris quam. Nulla tempus mi vel pulvinar mattis. Cras pharetra libero nec urna semper tincidunt. Pellentesque a risus ut enim consequat sodales. Aliquam erat volutpat. Integer volutpat felis sed turpis varius, eget maximus.', 1, 'To jest najdłuższy możliwy tytuł ogłoszenia na igu', 'Inne', NULL, 'do uzgodnienia', 'Lorem Ipsum', 123456789, NULL, NULL, 5, 1, NULL),
(33, 5, '2', '0000-00-00 00:00:00', '2017-09-03 21:27:24', 'łódzkie_pajęczański', 'Pajęczno', 'Duis pretium ipsum magna, sit amet consectetur purus viverra at. Vestibulum tortor ante, pellentesque ut felis in, bibendum tincidunt ipsum. Morbi nec lacus in nisl dictum porta at eu turpis. Aliquam congue ante massa, nec tincidunt ligula lobortis et. In sit amet imperdiet odio. Sed quis sagittis augue. Aliquam sed ultrices ligula. Vestibulum pellentesque justo in mattis varius. Nam venenatis id nunc sit amet laoreet. Nulla rhoncus lacus at tempor volutpat. Suspendisse ut dignissim quam. Vivamus.', 1, 'usługi kosmetyczne', 'Moda zdrowie i uroda > Fryzjerstwo i kosmetyka', 30, 'za usługę', 'Paznokcie', 987654321, NULL, NULL, 5, 0, 2),
(34, 2, '1', '0000-00-00 00:00:00', '2017-09-09 08:26:18', 'śląskie_kłobucki', 'Kłobuck', 'Duis ac purus eget tortor lacinia scelerisque non et dui. Donec vehicula felis quis fringilla ultrices. Curabitur lacinia nisl a magna accumsan vulputate. Maecenas molestie eros ut congue pellentesque. Etiam imperdiet massa nibh, at dapibus ante viverra a. Cras a nisl nisl. Integer dapibus tristique orci, ut malesuada justo elementum eu. Nam eu risus in neque pharetra elementum. Morbi blandit vel diam vitae cursus. Integer ornare sapien ut est accumsan, vel egestas velit pretium. In placerat metus enim, vel suscipit elit maximus eu. Duis elementum sem sed mi elementum, eget sagittis ipsum ultricies. Nam ut consectetur justo.\r\n\r\nIn id commodo risus. Phasellus id urna elementum, dapibus urna a, mollis erat. Mauris vel lobortis eros, id varius felis. Ut nec nisl tortor. Maecenas ullamcorper ante leo, placerat.', 2, 'Wykonanie i montaż bramy kutej', 'Budowlanka > Posesja > Bramy i ogrodzenia', NULL, 'do uzgodnienia', 'Zlecę wykonanie i montaż bramy kutej w miejscowości puławy, najlepiej firmi', 888756564, NULL, NULL, 29, 1, 1),
(35, 11, '1', '0000-00-00 00:00:00', '2017-09-17 12:49:42', 'dolnośląskie_Wrocław', 'Wrocław', 'Nunc tincidunt ligula eget porta scelerisque. Nulla tempus, tellus sit amet tempus cursus, nibh nisi malesuada nisl, ut ultricies elit turpis et sem. In porta laoreet velit, et lobortis magna posuere sed. Duis at scelerisque leo, ac volutpat dui. Sed tincidunt libero sit amet odio euismod, non pellentesque magna lacinia. Nulla porttitor eu quam vel vulputate. Fusce rhoncus ultrices dui, et porttitor erat tincidunt quis. Duis aliquet imperdiet viverra. Aliquam vehicula est vel lorem volutpat, et maximus mi ornare. Nulla ut convallis mauris. Fusce venenatis luctus lacinia. Nulla vel commodo elit, id pharetra eros. In nulla orci, volutpat vel purus eu, ullamcorper mattis est. Maecenas placerat, est nec congue aliquam, nibh est ullamcorper ligula, eu pulvinar mi erat quis urna.\r\n\r\nIn elementum porttitor tincidunt. Vivamus volutpat pretium ipsum malesuada dignissim. Nunc velit est, maximus vel nunc eu, ullamcorper porttitor elit. Aliquam tempus, metus eget rhoncus dignissim, metus ex pellentesque ante, ut placerat nisi.', 2, 'Zlecę wykonanie remontu łazienki w bloku 2 piętro.', 'Budowlanka > Wykończenie > Płytki i ceramika', 4000, 'do uzgodnienia', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris semper urna vitae est auctor molestie. Ut accumsan viverra ligula id tincidunt. Aliquam mattis!!', 673892334, NULL, NULL, 69, 0, NULL),
(36, 4, '1', '0000-00-00 00:00:00', '2017-10-03 19:41:11', 'kujawsko-pomorskie_Toruń', 'Toruń', 'Ut a urna elit. Integer a faucibus libero, vehicula lobortis eros. Pellentesque non luctus turpis, vel luctus nisi. Integer ac tortor a enim rhoncus interdum luctus iaculis quam. Vestibulum eleifend lacus ex, quis convallis enim tempus at. Nullam porta elit vel cursus eleifend. Cras rhoncus ut eros at ultrices. Fusce eu ex augue. Duis molestie lobortis mi. Integer ultrices lobortis volutpat. Nulla id odio sapien. Sed congue tristique dolor, eget rhoncus enim lacinia id. Morbi hendrerit elit eu libero pretium luctus. Proin ultrices commodo arcu sed consectetur.\r\n\r\nEtiam augue tortor, finibus at cursus nec, laoreet vel sem. Aenean ut ex volutpat odio auctor ultricies in non sapien. Nulla bibendum rutrum nulla id varius. Nunc quis eleifend dolor. Pellentesque semper sed lorem ac facilisis. Proin non diam accumsan, placerat neque sed, hendrerit erat. Integer sed venenatis lacus, non finibus nunc. Sed lobortis ex quis ultrices elementum. Nam lacinia neque malesuada, venenatis turpis ac, posuere mauris. Pellentesque fringilla lectus at porttitor tempus. Mauris hendrerit laoreet ligula, fermentum pellentesque tortor. Donec pretium pretium ipsum vel congue. Fusce gravida ligula id tincidunt varius.\r\n\r\nVivamus dapibus pellentesque placerat. Pellentesque vestibulum gravida consequat. Quisque malesuada vitae dolor sit amet viverra. Mauris tempor eu diam dignissim porttitor. Curabitur efficitur ipsum ut nibh ornare semper quis nec nisl. Maecenas sagittis libero massa, eu laoreet magna auctor vitae.', 1, 'Koszenie trawnika', 'Dom i ogród > Ogród i posesja', 50, 'za usługę', 'Koszenie trawnika raz w tygodniu', 675885763, NULL, NULL, 33, 0, 2),
(37, 10, '1', '0000-00-00 00:00:00', '2017-11-11 22:10:26', 'lubelskie_janowski', 'Janów Lubelski', 'Lorem ipsum', 0, 'Szukam zespołu na wesele', 'Gastronomia i przyjęcia > Muzyka', NULL, 'do uzgodnienia', 'Szukam zespołu na wesele które odbędzie się 23-24 Czerwca 2018 roku w domu weselnym Bankiet w Janowie Lubelskim', 882678953, NULL, NULL, 8, 1, NULL),
(38, 11, '1', '0000-00-00 00:00:00', '2017-11-11 22:31:14', 'dolnośląskie_Wrocław', 'Wrocław', 'Jestem imigrantką z Ukrainy, na co dzień pracuję i mieszkam w Polsce. Język Polski znam w stopniu komunikatywnym w mowie i podstawowym w piśmie. Aby podnieść swoją atrakcyjność na rynku pracy muszę biegle posługiwać się językiem zarówno w mowie jak i w piśmie. Szukam korepetytora bądź korepetytorki z którym 3 razy w tygodniu odbywała bym godzinne lekcje najlepiej w godzinach 17-20 w moim mieszkaniu w centrum Wrocławia. Mile widziani nauczyciele posługujący się językiem Ukraińskim.\r\nZapraszam do kontaktu najlepiej mailowo bądź telefonicznie. ', 2, 'Szukam korepetytora języka Polskiego', 'Edukacja i finanse > Korepetycje', 50, 'za godzinę', 'Szukam korepetytora bądź korepetytorki języka Polskiego. Lekcje w moim mieszkaniu w centrum Wrocławia 3 razy w tygodniu.', 655485244, 'damiannagiel@wp.pl', NULL, 7, 0, NULL),
(39, 1, '2', '2017-10-31 07:35:18', '2017-11-14 07:35:18', 'kujawsko-pomorskie_Toruń', 'Toruń', 'lorem ipsum', 3, 'do edycji i usunięcia', 'Dom i ogród > Opieka > Dzieci', 1000, 'za usługę', 'lorem iipsum', 378956189, 'jacapno@wp.com', 'https://www.youtube.com/user/elw666', 12, 1, 1),
(41, 5, '1', '2017-11-26 15:33:08', '2017-12-10 15:33:08', 'lubelskie_Lublin', 'Lublin', 'Dom jednorodzinny dwukondygnacyjny, wolnostojący', 2, 'szukam sprzątaczki', 'Dom i ogród > Sprzątanie', 15, 'za godzinę', 'Szukam pani do sprzątania domu jednorodzinnego (ok 150m2) dwa razy w tygodniu, wtorki i piątki, pora do ustalenia', NULL, NULL, 'www.interia.pl', 17, 0, 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id` mediumint(9) NOT NULL,
  `email` tinytext COLLATE utf8_polish_ci NOT NULL,
  `user` tinytext COLLATE utf8_polish_ci NOT NULL,
  `pass` text COLLATE utf8_polish_ci NOT NULL,
  `skad` tinytext COLLATE utf8_polish_ci NOT NULL,
  `zweryfikowany` char(1) COLLATE utf8_polish_ci NOT NULL DEFAULT '0',
  `autoryzacja_kod` int(10) UNSIGNED NOT NULL,
  `ostatnio` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id`, `email`, `user`, `pass`, `skad`, `zweryfikowany`, `autoryzacja_kod`, `ostatnio`) VALUES
(1, 'jacan1989@gmail.com', 'jacapno', '$2y$10$5d3MvDAUTsmoShWzlSeATuTocGbPbIemUyijSbuqiS4WIzWOjapx.', 'fb', '1', 3213907938, '2018-01-13'),
(2, 'ziomek123@wp.pl', 'Edek', '$2y$10$.3h8a0LEc8SSA5EGPN257e4O5aNombVBz77DigvZg754L9uzXXc2C', 'inne', '0', 2232267134, '2017-10-08'),
(4, 'damiannagiel24@wp.pl', 'czesiekhydraulik', '$2y$10$aiI3C732TsYccr3HaE4/cOER0gd3UxwZ27NFs3T4QekiwUX2A1ure', 'polecenie', '0', 2693750403, '2018-01-02'),
(5, 'monisia22666@wp.pl', 'mondzia', '$2y$10$TEeihWpq0NA8unFuOfj7m.x164LM2l7CbWIC0CpvsdCCMh8LzyrXa', 'fb', '0', 3385640958, '2018-01-06'),
(10, 'ziomek333@wp.pl', 'damian_pno', '$2y$10$fe.rsjFb7FoRjmaPeGRCcemB2Xm.L.jJarS2XQvpBpr6kstNGGeI.', 'polecenie', '1', 1730420695, '2017-11-27'),
(11, 'damiannagiel@wp.pl', 'hilary_clinton', '$2y$10$LRw5Bu5OE4831ZLROiDCouT9rOQMXkhhcmA7YPaUJ.VAOhWI.mdoW', 'fb', '0', 1863542437, '2018-01-05'),
(12, 'ziomek335@wp.pl', 'anulka', '$2y$10$Hun9ziuETYEJw1YLHXIRq.ofJlLORjDcln2nnYpZZvlxQVOnb0Yju', 'inne', '1', 2657111626, '2018-01-06'),
(13, 'mateuszblaszczyk14@gmail.com', 'bishop', '$2y$10$omqMex.8S4oonHvq1hPC2e.oB8C7Pc.rjyBww1JZhwhAqWvwYITZi', 'polecenie', '0', 2384027069, '2018-01-07');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy_full`
--

CREATE TABLE `uzytkownicy_full` (
  `uzytkownik_id` mediumint(9) NOT NULL,
  `dolaczyl` date NOT NULL,
  `osobowosc` char(1) COLLATE utf8_polish_ci DEFAULT NULL,
  `imie` tinytext COLLATE utf8_polish_ci,
  `nazwisko` tinytext COLLATE utf8_polish_ci,
  `miejscowosc` tinytext COLLATE utf8_polish_ci,
  `wojewodztwo` tinytext COLLATE utf8_polish_ci,
  `wiek` smallint(6) DEFAULT NULL,
  `opis` tinytext COLLATE utf8_polish_ci,
  `email` tinytext COLLATE utf8_polish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `uzytkownicy_full`
--

INSERT INTO `uzytkownicy_full` (`uzytkownik_id`, `dolaczyl`, `osobowosc`, `imie`, `nazwisko`, `miejscowosc`, `wojewodztwo`, `wiek`, `opis`, `email`) VALUES
(1, '2017-10-01', '1', 'Damian', 'Łeiganek', 'Pajęczno', 'łódzkie', 1989, 'Elektryk z 12 letnim doświadczeniem zawodowym.', 'jacan1989@gmail.com'),
(2, '2017-10-02', '1', 'Edward', 'Gierek', 'Katowice', 'pomorskie', 1938, 'Pierwszy sekretarz KZPR', 'e.gierek@komuna.pl'),
(4, '2017-10-03', '2', 'Hydro-Czesiek', '', 'Dworszowice Pakoszowe', 'łódzkie', 2009, 'Firma handlowo usługowa HydroCzesiek Sp. z o.o. od 2009 roku nieprzerwanie świadczy usługi hydrauliczne na najwyższym poziomie. Wykonujemy instalacje hydrauliczne grzewcze, montaż piecy CO a także systemów solarnych.', 'czesekhydraulik@onet.pl'),
(5, '2017-10-15', '2', 'Magic Make Up', '', 'Dubidze', 'łódzkie', 2012, 'Salon kosmetyczny Magic Make Up w Dubidzach przy ul.Słonecznej 112 50m. od drogi wojewódzkiej dw 529 zaprasza na najlepsze zabiegi kosmetyczne w okolicy w mocno konkurencyjnych cenach. Dla stałych klientek wysokie rabaty', 'monisia22666@wp.pl'),
(10, '2017-10-28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, '2017-10-28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, '2018-01-05', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, '2018-01-07', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wiadomosci`
--

CREATE TABLE `wiadomosci` (
  `id` int(11) NOT NULL,
  `id_ogloszenia` mediumint(9) NOT NULL,
  `id_nadawcy` mediumint(9) NOT NULL,
  `id_adresata` mediumint(9) NOT NULL,
  `tresc` text COLLATE utf8_polish_ci NOT NULL,
  `data` datetime NOT NULL,
  `odczytana` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `wiadomosci`
--

INSERT INTO `wiadomosci` (`id`, `id_ogloszenia`, `id_nadawcy`, `id_adresata`, `tresc`, `data`, `odczytana`) VALUES
(1, 5, 1, 5, 'hej jaka cena', '2017-12-06 21:02:12', 1),
(2, 5, 5, 1, 'witam. Wstępna cena to 4000zł ale wszystko zależy od użytych materiałów, kroju itp;)', '2017-12-06 21:12:33', 1),
(3, 5, 1, 5, 'kiedy można się umówić na pierwszą przymiarkę?', '2017-12-06 21:53:59', 1),
(4, 3, 1, 4, 'witam, jaka jest cena za punkt??', '2017-12-06 21:55:48', 1),
(5, 37, 1, 10, 'Hej, coś tam gram może mógł bym trochę pochendorzyć u ciebie na weselichu za kielicha?', '2017-12-11 21:47:43', 1),
(6, 5, 5, 1, 'choćby jutro, proszę dzwonić 663663663', '2017-12-11 21:51:16', 1),
(7, 37, 10, 1, 'wal sie', '2017-12-12 20:41:30', 1),
(8, 5, 1, 5, 'ok', '2017-12-12 21:48:23', 1),
(9, 7, 11, 1, 'witaj świecie', '2017-12-12 22:41:47', 1),
(10, 3, 4, 1, '130 zł', '2017-12-12 22:42:14', 1),
(11, 7, 5, 1, 'Hej hej helo oglądasz mecz bayernu??', '2017-12-13 20:45:16', 1),
(12, 5, 10, 5, 'Witam czy była by pani w stanie uszyć suknię do Czerwca przyszłego roku??', '2017-12-15 20:25:21', 1),
(45, 3, 1, 4, 'no to sporo', '2017-12-15 21:34:06', 1),
(46, 3, 1, 4, '5 razy?', '2017-12-15 21:34:37', 1),
(47, 3, 1, 4, 'a teraz??', '2017-12-17 11:01:46', 1),
(50, 3, 1, 4, 'sory', '2017-12-18 21:17:39', 1),
(51, 5, 5, 10, 'faf', '2017-12-23 09:10:40', 0),
(52, 5, 5, 1, 'czy dalej jest pan zainteresowany??', '2017-12-23 09:23:31', 1),
(55, 5, 1, 5, 'tak tak oczywiście, nie miałem ostatnio czasu ale postaram się dzisiaj zadzwonić', '2017-12-23 10:06:30', 1),
(56, 5, 1, 5, 'nie mogę się dodzwonić', '2017-12-23 13:28:57', 1),
(57, 34, 1, 2, 'Cześć edziu', '2017-12-23 16:45:38', 0),
(58, 34, 1, 2, 'aas', '2018-01-01 19:29:12', 0),
(59, 34, 1, 2, '12', '2018-01-01 19:30:08', 0),
(60, 34, 1, 2, 'a4', '2018-01-01 19:31:18', 0),
(61, 34, 1, 2, 'a5', '2018-01-01 19:31:25', 0),
(62, 34, 1, 2, 'a6', '2018-01-01 19:32:02', 0),
(63, 34, 1, 2, 'a7', '2018-01-01 19:32:08', 0),
(64, 34, 1, 2, 'a8', '2018-01-01 19:32:13', 0),
(65, 34, 1, 2, 'a9', '2018-01-01 19:32:22', 0),
(66, 34, 1, 2, 'a10', '2018-01-01 19:32:26', 0),
(67, 34, 1, 2, 'a11', '2018-01-02 08:46:03', 0),
(68, 34, 1, 2, 'a12', '2018-01-02 08:46:08', 0),
(69, 34, 1, 2, 'a13', '2018-01-02 08:46:14', 0),
(70, 34, 1, 2, 'a14', '2018-01-02 08:46:20', 0),
(71, 34, 1, 2, 'a15', '2018-01-02 08:46:25', 0),
(72, 3, 4, 1, 'to se kurwa zrób sam', '2018-01-02 10:52:17', 1),
(73, 34, 1, 2, '16', '2018-01-05 16:29:42', 0),
(74, 34, 1, 2, '17', '2018-01-05 16:29:46', 0),
(75, 34, 1, 2, '18', '2018-01-05 16:29:50', 0),
(76, 34, 1, 2, '29', '2018-01-05 16:29:54', 0),
(77, 34, 1, 2, '20', '2018-01-05 16:29:58', 0),
(78, 34, 1, 2, '21', '2018-01-05 16:30:02', 0),
(79, 34, 1, 2, '22', '2018-01-05 16:30:05', 0),
(80, 34, 1, 2, '23', '2018-01-05 16:30:08', 0),
(81, 34, 1, 2, '24', '2018-01-05 16:30:12', 0),
(82, 34, 1, 2, '25', '2018-01-05 16:30:15', 0),
(83, 34, 1, 2, '26 o tutaj powinien wyświetlić się już plus!', '2018-01-05 16:30:39', 0);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `kontakty`
--
ALTER TABLE `kontakty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ogloszenia`
--
ALTER TABLE `ogloszenia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uzytkownicy_full`
--
ALTER TABLE `uzytkownicy_full`
  ADD PRIMARY KEY (`uzytkownik_id`);

--
-- Indexes for table `wiadomosci`
--
ALTER TABLE `wiadomosci`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `kontakty`
--
ALTER TABLE `kontakty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT dla tabeli `ogloszenia`
--
ALTER TABLE `ogloszenia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT dla tabeli `wiadomosci`
--
ALTER TABLE `wiadomosci`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
