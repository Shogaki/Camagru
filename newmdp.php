<!DOCTYPE html>
<html>
<head> <link rel="stylesheet" type="text/css" href="resources/css/nikleskeuf.css">
	<title>mot de passe oublié</title>
</head>
<body>
	<div id=iskription>
		<div>NOUVEAU MOT DE PASSE</div>
<img class=frez src="resources/img/plane.png" height=" 50%" width="50%">
<br>
<form action="mdpneww.php" method="POST">
<label for="e-mail">E-mail:</label>
<input id="mon_id" type="text"  name="mail"/>
<br>
<label for="mdp">Mot de passe:</label>
<input type="password" name="mdp" />
<input type="hidden" name="code" value=<?php echo($_GET['code'])?>>
<br>
(Ton mot de passe doit avoir 1 majuscule, et 1 chiffre)
<br>
<div class="bouton">
  <input type="submit" value="Press"/>
</div>
</form>
</body>
</html>