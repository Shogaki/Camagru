<?php 
session_start();
require_once("config/connect-db.php");
$login = htmlspecialchars($_POST[login]);
$password = hash ('whirlpool', htmlspecialchars($_POST[mdp]));
$var = $bdd->query('SELECT count(id) AS isok FROM `user` WHERE `login` = \'' .$login . '\' AND `mdp` = \'' . $password . '\'');
$lol = $var->fetch();
echo($lol[isok])
 ?>