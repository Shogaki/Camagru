<?php 
session_start();
require_once("config/connect-db.php");

$login 				= htmlspecialchars($_POST['login']); 
$password 			= hash('whirlpool', htmlspecialchars($_POST["mdp"]));
$_SESSION['code'] 	= htmlspecialchars($_POST['valid']);


$req = $bdd->query('SELECT activ, id FROM user WHERE login = "' . $login . '" AND mdp = "'.$password.'"');
$req = $req->fetch();

if ($req['id']) // L'utilisateur est trouvé, connexion
{
	if ($req['activ'] == "")
	{
		$_SESSION['login'] = $login;
		header('Location: index.php?success=1');
	}
	else if ($req['activ'] == $_SESSION['code'])
	{
		$_SESSION['login'] = $login;
		$bdd->query('UPDATE `user` SET `activ`= "" WHERE login = "' . $login . '"');
		header('Location: index.php?success=1');
	}

}
else // Pas d'utilisateur trouvé, erreur
{
	header('Location: connexion.php?error=2');
}

?>
