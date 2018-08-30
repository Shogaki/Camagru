<?php
require_once("config/isConnected.php");
require_once("config/connect-db.php");

if (isset($_GET['id']))
{
	$id = htmlspecialchars($_GET['id']);
	$reponse = $bdd->query('SELECT * FROM photo WHERE id = '. $id);
	$check = $reponse->fetch();
	$auteur = $check['id-proprio'];
	if ($check == null)
		header('Location: index.php');
}
else
	header('Location: index.php');

?>

<!DOCTYPE html>
<html>
<head>
		<link rel="stylesheet" type="text/css" href="resources/css/nikleskeuf.css">
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<br>
<body style="text-align:center;">
	<?php include('inc/header.php'); ?>

	<a class="lien" href="like.php?id=<?= $check['id'] ?>" style="font-size:50px;text-decoration-line: none;">
		<?php if (hasLikePublication($check['id'], $auth['id']) == 0){ ?>
			<i class="fa fa-heart-o" aria-hidden="true"></i>
		<?php } else { ?>
			<i class="fa fa-heart" aria-hidden="true" style="color:red;"></i>
		<?php } 
		$reponse = $bdd->query('SELECT count(`id-jm`) AS lol FROM jm WHERE id_photo= \'' . $id . '\'');
		$choh = $reponse->fetch();
		echo($choh['lol']); ?>

	</a>

	<img src="<?= $check['url photo'] ?>">
	<?php
		include('com.php');
		$reponse = $bdd->query(' SELECT `id`FROM `user` WHERE `login` = \'' . $_SESSION['login'] . '\'');
		$cheh = $reponse->fetch();
		$user = ($cheh['id']);
		if ($user == $auteur)
		{
			echo("<a href='supp.php?post=" . $id . "'>Si tu veux supp clic ici :) </a>");
		}
	?>



</body>
</html>
