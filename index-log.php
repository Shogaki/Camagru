<?php
include('inc/header.php');

if (!isset($_SESSION['login']) && $_SESSION['login'] == null)
	header('Location: connexion.php?error=1');

$reponse = $bdd->query('SELECT COUNT(*) AS nb FROM `photo`');
$check = $reponse->fetch();
$nbimg = $check["nb"];
if (isset($_GET['page']) && is_numeric($_GET['page']))
	$page = intval($_GET['page']);
else
	$page = 1;
?>

<!DOCTYPE html>
<html>
<head>
			<link rel="stylesheet" type="text/css" href="resources/css/nikleskeuf.css">

	<title>Camagru</title>
</head>
<body>
	<div id="header">
		<p>
			CAMAGRU, BIENVENUE <?= $_SESSION['login']; ?>
			<br>
		</p>
	</div>
	<div id="main">
	<?php
	$min = (($page - 1) * 5) ;
	$max = $page * 5;
	$reponse = $bdd->query('SELECT user.`login` AS "login" , photo.id AS "id" , photo.`url photo` AS "photo" FROM `photo` INNER JOIN user ON user.id = photo.`id-proprio` LIMIT ' . $min . ', ' . $max );
	$i = 0;
	while ($i < 5 && $check = $reponse->fetch()) {
		$login = $check["login"];
		$photo = $check["photo"];
	?>
	 <div class="gallery">
	 	<a href="image.php?id=<?= $check['id'] ?>">
		  	<div class="divimage">
    			<img class="pute" src='<?= $check['photo'] ?>'>
  			</div>
	 		<div class="desc"><?= $login ?></div>
	 	</a>
	 </div>
	<?php
	$i++;
}
?></div><br><?php
	$buf = $page - 2;
	 	while ($buf <= $page + 2 && $buf <= ($nbimg / 5) + ($nbimg % 5 ? 1 : 0)){
			if ($buf > 0)
		echo('<a class="pagination" href="index.php?page=' . $buf  .  '">' . $buf . '</a>    ');
			$buf++;
		}
	?>

</body>

</html>
