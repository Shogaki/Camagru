<?php
require_once("database.php");

$pdo = new PDO('mysql:host=localhost', $DB_USER, $DB_PASSWORD);
$pdo->query("CREATE DATABASE IF NOT EXISTS camagru DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci");

try{
  $bdd = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
  $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (Exception $e)
{
  die('Erreur : ' . $e->getMessage());
}


$bdd->query("CREATE TABLE IF NOT EXISTS `jm` (
  `id-jm` int(11) NOT NULL,
  `id_photo` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1");

$bdd->query("INSERT INTO `jm` (`id-jm`, `id_photo`, `id_user`) VALUES
(1, 74, 11),
(2, 84, 13),
(3, 65, 16),
(4, 85, 16),
(11, 78, 13);");

$bdd->query("CREATE TABLE IF NOT EXISTS `komentair` (
  `id-kom` int(11) NOT NULL,
  `id-user` int(11) NOT NULL,
  `id-photo` int(11) NOT NULL,
  `chankometair` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;");

$bdd->query("INSERT INTO `komentair` (`id-kom`, `id-user`, `id-photo`, `chankometair`, `date`) VALUES
(1, 11, 66, 'wetwe', '2017-12-08 23:06:14'),
(2, 11, 66, 'wetwe', '2017-12-08 23:06:37'),
(3, 11, 76, 'ewrw', '2017-12-09 00:29:24'),
(4, 11, 76, 'ewrw', '2017-12-09 00:30:54'),
(5, 11, 76, 'ewrw', '2017-12-09 00:31:08'),
(6, 11, 76, 'ewrw', '2017-12-09 00:31:24'),
(7, 11, 76, 'ewrw', '2017-12-09 00:39:44'),
(8, 11, 66, ',kkjkjuu', '2017-12-09 02:11:54'),
(9, 13, 84, 'ptdr jerry', '2017-12-09 05:37:09'),
(10, 13, 84, 'pdr', '2017-12-09 05:38:31'),
(11, 13, 84, 'patatesa', '2017-12-09 05:40:08'),
(12, 13, 84, 'patatesa', '2017-12-09 05:40:37'),
(13, 13, 84, 'patatesa', '2017-12-09 05:40:52'),
(14, 13, 84, 'jtuygjygy', '2017-12-09 05:41:09'),
(15, 16, 84, '&lt;script&gt;alert(&quot;niktamer&quot;)&lt;/script&gt;', '2017-12-09 19:28:13');");

$bdd->query("CREATE TABLE IF NOT EXISTS `mdpoublie` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `code` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;");

$bdd->query("INSERT INTO `mdpoublie` (`id`, `id_user`, `code`) VALUES
(1, 11, '8QFVIB');");

$bdd->query("CREATE TABLE `photo` (
  `id` int(11) NOT NULL,
  `id-proprio` int(11) NOT NULL,
  `url photo` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;");


$bdd->query("INSERT INTO `photo` (`id`, `id-proprio`, `url photo`) VALUES
(73, 11, 'generated/Alyson-1512769980.png'),
(74, 11, 'generated/alyson-1512770354.png'),
(75, 11, 'generated/alyson-1512770470.png'),
(76, 11, 'generated/Alyson-1512779357.png'),
(78, 11, 'generated/Alyson-1512790541.png'),
(82, 11, 'generated/Alyson-1512790932.png'),
(83, 11, 'generated/Alyson-1512793257.png'),
(84, 13, 'generated/patate-1512797813.png');");


$bdd->query("CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `login` varchar(10) NOT NULL,
  `mdp` varchar(128) NOT NULL,
  `email` varchar(50) NOT NULL,
  `notif` tinyint(4) NOT NULL DEFAULT '1',
  `activ` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;");

$bdd->query("INSERT INTO `user` (`id`, `login`, `mdp`, `email`, `notif`, `activ`) VALUES
(10, 'staline', '91a67f6a53c9e6fefee8cc887e985acd402fbf4df4343cc29aa5f148ecef1e2bfd75c940af46ff9ceefc161b9b8c8ca7497cde359e4d92cdb705f331df980b1e', 'adaviere@studengdfdf.fr', 1, ''),
(11, 'Alyson', '1453f6036645d9c94d8e407da9ed15b28478fb31fdf1a211d444d230b015e860b78e41ef54e11dfd7738f3d667fd1b06980483208a50de994d977dc4f5a367ef', 'adaviere@student.42.fr', 0, ''),
(13, 'patatas', '0aeefb1028ffaf204432046b44224d86f68d9a8c6ad69e538e96110f0f3e0e7132af14b531ba44d4234a9c92317bebcd10b1f9680fe430e579fd2ac510115198', 'cde-laro@student.42.fr', 0, ''),
(17, 'ololol', '4ebc20a8b65b93c4cd559eb1861a830d5ae9a9d1f9a12bbc98f2570c3d9d0963e513a44ad838d47b002cfaca34dcd871f2707074f08974e387260b4e328cfd5f', 'flourme@student.42.fr', 1, '');");

$bdd->query("ALTER TABLE `jm`
  ADD PRIMARY KEY (`id-jm`);");

$bdd->query("ALTER TABLE `komentair`
  ADD PRIMARY KEY (`id-kom`);");

$bdd->query("ALTER TABLE `mdpoublie`
  ADD KEY `id` (`id`);");

$bdd->query("ALTER TABLE `photo`
  ADD PRIMARY KEY (`id`);");

$bdd->query("ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);");

$bdd->query("ALTER TABLE `jm`
  MODIFY `id-jm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;");

$bdd->query("ALTER TABLE `komentair`
  MODIFY `id-kom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;");

$bdd->query("ALTER TABLE `mdpoublie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;");

$bdd->query("ALTER TABLE `photo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;");

$bdd->query("ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;");
echo("OK");
?>
