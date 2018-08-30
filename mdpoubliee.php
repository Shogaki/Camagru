<?php
require_once("config/connect-db.php");
$mail 	= $_POST['mail'];
$reponse = $bdd->query('SELECT login , id FROM user WHERE email = \'' .  $mail . '\'');
$check = $reponse->fetch();
if ($check){
	$char = 'ABDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
$code = str_shuffle($char);
$code = substr($code, 0, 6);
$reponse = $bdd->query('INSERT INTO `mdpoublie`(`id_user`, `code`) VALUES (\'' . $check['id'] . '\' , \'' . $code . '\')');
$sujet = 'FALLAIT PAS OUBLIER';
		$message = '<html>';
		$message .= '<head><title> OUBLIE PAS LA PROCHAINE FOIS ! </title></head>';
		$message .= '<p>Bonjour, <br> Clic ici : <a href="http://localhost:8080/camagru/newmdp.php?code=' . $code .'">LA</a> </p>';
		$message .= '<p>Si le lien ne marche pas copie colle ce si"localhost:8080/newmdp.php?code=' . $code .'"</p>';
		$message .= '</html>';
		$headers = 'MIME-Version: 1.0'."\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
		$headers .= 'From: "Camagru"<nepasrepondre@camagru.fr>'."\n";
		mail($mail, $sujet, $message, $headers);
		header('Location: connexion.php');
}
else
{
 echo('TEXISTEPA');
 echo ("<script>setTimeout(function(){ window.location.href = 'mdpoublie.php';}, 500);</script>");
}
?>
