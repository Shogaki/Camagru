<?php
if (isset($_SESSION['login']) && $_SESSION['login'] != null)
	header('Location: connexion.php?error=1');

?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="resources/css/nikleskeuf.css">
	</head>
	<body>

		<div id=iskription>
		<?php if (isset($_GET['status'])) { ?>

		<div style="padding:5px;border:1px solid blue;color: blue !important;font-weight: bold;text-align:center;width:100%;margin:10px;">

			<?php if ($_GET['status'] == "1") { ?>
				Vous vous êtes correctement déconnecté.
			<?php } ?>

		</div>

		<?php } ?>
		<div>CONNEXION</div>
		<img class=frez src="resources/img/plane.png" height=" 50%" width="50%">
		<form method="POST" action="login.php">
			<label for="login">
				Login :
			</label>
			<input name="login" id="login">
			<br>
			<br>
			<label for="mdp">
				Mot de passe :
			</label>
			<input type="password" name="mdp" id="mdp">
			<input type="hidden" name="valid" value=<?php echo(isset($_GET['code']) ? $_GET['code'] : 0) ?>>
			<br>
			<br>
			<button role="submit">Envoyer</button>
			 <a href="mdpoublie.php">Mot de passe oublié</a>
		</div>
		</form>
	</body>
</html>
