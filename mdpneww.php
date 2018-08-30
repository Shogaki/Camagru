<?php
require_once("config/connect-db.php");

if (!isset($_POST))
	header("index.php");
$mail 	= $_POST['mail'];
$code 	= $_POST['code'];
$mdp = hash('whirlpool', htmlspecialchars($_POST["mdp"]));
$reponse = $bdd->query('SELECT user.id AS id, mdpoublie.id AS lol FROM user INNER JOIN mdpoublie ON mdpoublie.id_user = user.id WHERE user.email= \'' .  $mail . '\' AND mdpoublie.code= \'' .  $code . '\'');
$check = $reponse->fetch();
if ($check){
	echo ('lweifhuwei');
	$id = $check['id'];
	$bdd->query('UPDATE `user` SET `mdp`=\'' . $mdp. '\' WHERE id= \'' . $id. '\'');
	$bdd->query('DELETE FROM mdpoublie WHERE id = \'' . $check['lol'] . '\'');
}
else
echo ('domaj');
?>