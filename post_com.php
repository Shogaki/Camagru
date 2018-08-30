<?php
require_once("config/isConnected.php");
require_once("config/connect-db.php");

$photo = $_POST['image'];
$text = htmlspecialchars($_POST['com']);
$reponse = $bdd->query(' SELECT `id`FROM `user` WHERE `login` = \'' . $_SESSION['login'] . '\'');
$check = $reponse->fetch();
$user = ($check['id']);
echo($photo . $text . $user);
$reponse = $bdd->query('INSERT INTO `komentair`(`id-user`, `id-photo`, `chankometair`) VALUES (' . $user . ' ,' . $photo . ', \'' .  $text . '\')');
$reponse = $bdd->query('SELECT user.email, user.notif FROM user INNER JOIN photo ON photo.`id-proprio` = user.id WHERE photo.id = ' . $photo . '');
$check = $reponse->fetch();
if ($check['notif'] == 1)
{
$sujet = 'Nouveau commentaire';
		$message = '<html>';
		$message .= '<head><title>Petite nouvelle ! </title></head>';
		$message .= '<p>Bonjour, <br> un commentaire a ete laissé sur ta photo </p>';
		$message .= '<p>Bonjour, <br> Clic ici : <a href="http://localhost:8080/camagru/image.php?id=' . $_POST['image'] .'">LA</a> </p>';
		$message .= '<p>Bonjour, <br> Si le lien ne marche pas copie colle ce si"localhost:8080/image.php?id=' . $_POST['image'] .'"</p>';
		$message .= '</html>';
		$headers = 'MIME-Version: 1.0'."\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
		$headers .= 'From: "Camagru"<nepasrepondre@camagru.fr>'."\n";
		mail($check['email'], $sujet, $message, $headers);
	}
		header('Location: image.php?id=' . $_POST['image'] .'');

 ?>
