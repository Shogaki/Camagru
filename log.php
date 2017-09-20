<?php 
session_start();
require_once("config/connect-db.php");
$login = htmlspecialchars($_POST[login]);
$password = hash ('whirlpool', htmlspecialchars($_POST[mdp]));
$var = $bdd->query('SELECT id AS isok FROM `user` WHERE `login` = \'' .$login . '\' AND `mdp` = \'' . $password . '\'');
$lol = $var->fetch();
if $lol[id]
{
	$_SESSION["id"] = $lol[id];

echo "    <script>
    window.location.href = 'index.html';
    </script>"
    exit ();
}
else{
echo "    <script>
    window.location.href = 'connexion.html';
    </script>"
    exit();
}
 ?>
