<?php 
require_once("config/isConnected.php");
require_once("config/connect-db.php");

?>
<form action=post_com.php method=POST>
	<input type=text id=com name=com>
	<input type=hidden id=image name=image value= <?php echo ($id); ?>>
	<input type="submit">
</form>

<?php

$reponse=$bdd->query('SELECT * FROM komentair INNER JOIN user ON user.id = komentair.`id-user` WHERE ' . $id . ' = komentair.`id-photo` ');
	while ($check = $reponse->fetch()) { 
		$user = $check["id-user"];
		$text = $check["chankometair"];
		echo($check['login']);
		echo("<br>");
		echo("Commentaire: " . $text);
		echo ("<br>");
		echo("<br>");
	}
	?>