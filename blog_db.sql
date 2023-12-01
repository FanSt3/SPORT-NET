-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2023 at 08:54 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog_db`
--
CREATE DATABASE IF NOT EXISTS `blog_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `blog_db`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`) VALUES
(1, 'admin', '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2'),
(9, 'stefan', '8cb2237d0679ca88db6464eac60da96345513964');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` int(100) NOT NULL,
  `post_id` int(100) NOT NULL,
  `admin_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `comment` varchar(1000) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

DROP TABLE IF EXISTS `likes`;
CREATE TABLE `likes` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `admin_id` int(100) NOT NULL,
  `post_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `admin_id`, `post_id`) VALUES
(11, 5, 1, 31);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` int(100) NOT NULL,
  `admin_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` varchar(10000) NOT NULL,
  `category` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `admin_id`, `name`, `title`, `content`, `category`, `image`, `date`, `status`) VALUES
(31, 1, 'admin', 'Apex Legends HZS?', 'Apex Legends je ogromana Battle Royale igra i dostupana je na skoro svim glavnim platformama. Nedavno ažuriranje učinilo je iskustvo još zabavnijim na različitim uređajima. Apex Legends unakrsna progresija je konačno dodata nedavno, omogućavajući igračima da koriste isti nalog i rade na zajedničkim ciljevima na različitim platformama. Možete pokrenuti Battle Pass na računaru i završiti otključavanje Apex skinova na konzoli. Međutim, skoro mesec dana kasnije mnogo igrača još uvek čeka na pristup.', 'esports', 'apex.jpg', '2023-11-30', 'active'),
(32, 1, 'admin', '„Iskreno, bilo je teško“ – Gasli razmišlja o ranoj sezoni kada je došao zajedno sa timskim kolegom O', 'Pjer Gasli je govorio o svom dramatičnom sudaru sa Estebanom Okonom u ranoj fazi sezone 2023, opisujući to kao „najgori mogući scenario“ za nove saigrače iz Alpine.\r\n\r\nGasli je prešao sa AlphaTauri-ja tokom zime da bi se pridružio Okonu u francuskoj operaciji, pri čemu su se par prethodno takmičili jedan protiv drugog – i doživeo neke napete trenutke – tokom karting dana.\r\n\r\nU samo njihovoj trećoj zajedničkoj trci, Gasli i Okon su bili umešani u nesrećni incident kada su se sukobili tokom kasnog ponovnog starta na Velikoj nagradi Australije, pri čemu su oba automobila ugašena na licu mesta.\r\n\r\nGasli je trčao na petoj poziciji kada je izašao sa staze na skretanju 1 Albert Parka kako bi izbegao kontakt sa zadnjim delom Aston Martina Fernanda Alonsa, da bi sreo Okona kada se ponovo pridružio stazi.\r\n\r\nRazmišljajući o okupljanju u nedavnom pojavljivanju na podcastu Beiond The Grid, Gasli je rekao: „Iskreno, bilo je teško. Na povratku kući, bio sam samo tužan jer mi je to bila treća ili četvrta trka u sezoni sa timom, a ja sam se borio sa Ferarijem, sa Mercedesom.', 'auto-moto', 'gasly.png', '2023-11-30', 'active'),
(33, 1, 'admin', 'NBA počinje! Zvezda OKC-a Čet Holmgren se vraća', 'Sinoć su se dve zvezde, Jamal Murrai & CJ McCollum, vratile na teren po prvi put za mesec dana.\r\n\r\nDanas?\r\n\r\nZvezdani top u usponu se pridružuje početnoj 5, dok nas Čet Holmgren vodi na svoje putovanje nazad. I kako ga je oblikovala godina pauze od obruča.\r\n\r\nDeja vu: Jalen Suggs i Cole Anthoni rekreirali su jednu od najpoznatijih NBA fotografija – fotografiju zakucavanja Dviane Vade-LeBron James iz 2010. godine – dok je Jalen Suggs držao ruke raširenih (a la Vade) dok je Entoni bacao zakucavanje (a la LeBron) ). \r\n\r\nEvo još jednog ugla\r\n\r\nUčinite to 8: To zakucavanje je došlo u četvrtoj četvrtini Orlandove osme uzastopne pobede, zbog čega je Medžik ostao bez rezultata da izjednači svoj rekord u franšizi (devet utakmica, ostvarenih tri puta, poslednja u sezoni 2010-11). Pogledajte najbolje predstave iz Magic niza\r\n\r\nKako je to uspeo?: Brendon Ingram je ustao za polaganje, fauliran, izgubio kontrolu nad loptom, vratio je i završio cirkuski polaganje za i-jedan tokom pobede Nju Orleansa', 'košarka', 'nbaavif.png', '2023-11-30', 'active'),
(34, 1, 'admin', 'Pro Recco i Savona krstare do bodova u derbi utakmicama', 'Bilo je nekoliko tesnih borbi u 10. kolu italijanske lige. Ali, u derbi utakmicama je nedostajalo uzbuđenja. Pro Reko je lako pobedio Ortigiju. Savona pregazio Trst u susretu klubova LEN Evrokupa.\r\n\r\nItalija, 10. kolo\r\nOdbrana Pro Reka bila je savršena u prvim minutima utakmice u Sirakuzi i gosti su poveli sa 3:0. Ortiđa, ​​koja se upisala na semafor u 7. minutu, u drugoj četvrtini je dva puta smanjila na jedan (2:3, 3:4). Reko je uzvratio novom serijom od 3:0 (Frančesko Kondemi, koji je do ovog leta igrao za Ortiđiju, postigao je dva od ova tri gola) i skočio na 7:3. Karneseki domaćina je u finišu prvog poluvremena postigao rezultat od 4:7. Rekovi centri, Aikardi i Halok, otvorili su treći period golovima za 9:4; od tada razlika nikada nije bila manja od četiri gola. Reko je pobedio Sicilijance sa 12:7 uz tri gola Đakoma Kanele, dva Frančeska Kondemija i Bena Haloka...\r\n\r\nSavona zadržava 2. mesto iza Pro Recca i dokazuje da je u dobroj formi. Dočekao je Trst. Posle prvog poluvremena 10:3 bilo je jasno koji će tim pobediti. Posle 32 minuta rivala je delilo 11 golova – 17:6.\r\n\r\nBreša je zabeležila laku pobedu nad Astra Roma Nuoto (19:4).\r\n\r\nČetvrtoplasirani Telimar se mučio da pobedi Kamoglija, koji još nije osvojio bod. Početkom treće četvrtine Telimar je poveo 6:4. Kamoglji, gostujući tim na ovom meču, je do poslednjeg odmora postigao tri neodgovorena gola i u završni deo ušao sa prednošću od 7:6. Telimar je preuzeo kontrolu u četvrtoj četvrtini i napravio seriju od 3:0 za vođstvo od 9:7. Camogli je smanjio zaostatak na jedan u poslednjim sekundama.\r\n\r\nPosilipo je pobedio Kataniju 11:10 zahvaljujući dobroj završnici. Utakmice Salerno – Roma Vis Nova i De Aker – Kvinto završene su bez pobednika.', 'vaterpolo', 'prorecowebp.png', '2023-11-30', 'active'),
(35, 1, 'admin', 'Može li &#39;Otrov&#39; Viciaro zaustaviti Haaland-a i Man City', 'U svom bivšem klubu Empoli, Guljelmo Vikario je imao nadimak „Venom“, po zastrašujućem Marvelovom liku, iz dva razloga: njegovih natprirodnih refleksa i ljutitog i intenzivnog načina na koji je odbijao udarce.\r\n\r\n&#34;Njegova sposobnost, njegovi refleksi, bilo je ludo!&#34; opoziva Samira Ujkanija za Ski Sports. Bivši golman Empolija proveo je dve godine radeći sa Vikarijem u klubu iz Serije A i bio je deo njegovog napredovanja pre nego što je prešao u Totenhem ranije ove godine.', 'fudbal', 'mancity.jpg', '2023-11-30', 'active'),
(36, 1, 'admin', 'Nuvali spreman za poslednji Beach Pro Tour Challenge događaj u sezoni', 'Integrisani samonosni eko-grad Nuvali, koji se nalazi u okviru većeg grada Santa Rosa na Filipinima, dao je ime poslednjem redovnom događaju Volleiball Vorld Beach Pro Tour sezone pre finala sledeće nedelje u Dohi. \r\nNuvali Challenge počinje u četvrtak, 30. novembra, i trajaće do nedelje, 3. decembra. To je 10. Challenge događaj u sezoni i četvrti po redu koji će se održati na azijskom kontinentu, posle Goe u Indiji, Haikou u Kini i Chiang Mai na Tajlandu.\r\n\r\nNuvali je drugo mesto na Filipinima koje je domaćin Beach Pro Tour događaja, nakon što je Subic Bai prošle godine dočekao Futures turnir. Biće to ukupno četvrto takmičenje na svetskom nivou i najprestižnije održano u zemlji, nakon što su Manila i Borakaj organizovali događaje sa 1 zvezdicom na FIVB svetskoj turneji odbojke na pesku 2018. i 2019. godine.', 'odbojka', 'odbojkajpg.jpg', '2023-11-30', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(5, 'HZS', 'jovisicstefan73@gmail.com', '31b812383e292f13518817b8aa81e615fd8e8d34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
