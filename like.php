<?php
require_once("config/isConnected.php");
require_once("config/connect-db.php");

$id = $_GET['id'];

if (hasLikePublication($id, $auth['id']) == 0)
{
	$bdd->query('INSERT INTO jm (id_user, id_photo) VALUE ("'.$auth['id'].'", "'.$id.'")');
}
else
{
	$bdd->query('DELETE FROM jm WHERE id_user = "'.$auth['id'].'" AND id_photo = "'.$id.'"');
}
header('Location: image.php?id='.$id);

?>
