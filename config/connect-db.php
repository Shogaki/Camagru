<?php

require_once("config/database.php");
try{
	$bdd = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (Exception $e)
{
	die('Erreur : ' . $e->getMessage());
}
if (isset($_SESSION["login"]))
{
$auth = $bdd->query('SELECT * FROM user WHERE login = "'.$_SESSION["login"].'"')->fetch();

function hasLikePublication($photo_id, $user_id)
{
	global $bdd;
	$like = $bdd->query('SELECT count(*) FROM jm WHERE id_user = "'.$user_id.'" AND id_photo = "'.$photo_id.'"');
	$req = $like->fetch()[0];
	return $req;
}
}

?>
