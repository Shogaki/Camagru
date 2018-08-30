<?php
require_once("config/isConnected.php");
require_once("config/connect-db.php");

$reponse = $bdd->query(' SELECT `id`FROM `user` WHERE `login` = \'' . $_SESSION['login'] . '\'');
$check = $reponse->fetch();
$userid = ($check['id']);

if (isset($_POST['login']) && $_POST['login'] != ""){
  $pseudo = htmlspecialchars($_POST['login']);
  $reponse = $bdd->query('SELECT count(login) AS nb FROM user WHERE login =\'' . $pseudo . '\'');
  $pseudo_check = $reponse->fetch();

  if ($pseudo_check['nb'] != 0)
  {
  	echo "Le pseudo " . $pseudo . " n'est pas disponible<br>";
        echo "<script>setTimeout(function(){ window.location.href = 'profil.php';}, 500);</script>";
  	exit();
  }
  $reponse = $bdd->query('UPDATE `user` SET `login`= \'' . $pseudo . '\' WHERE ' . $userid . ' = `id` ');
  $_SESSION['login'] = $pseudo;
}
if (isset ($_POST['mdp']) && $_POST['mdp'] != ""){
  $password = hash('whirlpool', htmlspecialchars($_POST["mdp"]));
  $passwd = htmlspecialchars($_POST['mdp']);
  if (strlen($passwd) < 6)
  {
	   echo "Le mot de passe est trop court (6 caracteres minimum)<br>";
         echo "<script>setTimeout(function(){ window.location.href = 'profil.php';}, 500);</script>";
	    exit();
    }

    if (!preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{6,}$#', $passwd))
    {
	     echo "Le mot de passe n'est pas assez complexe, il doit contenir au minimum une majuscule, une minuscule et un chiffre.<br>";
        echo "<script>setTimeout(function(){ window.location.href = 'profil.php';}, 500);</script>";
	     exit();
    }
    $reponse = $bdd->query('UPDATE `user` SET `mdp`= \'' . $password . '\' WHERE ' . $userid . ' = `id` ');
}
if (isset ($_POST['miel']) && $_POST['miel'] != ""){
$email = htmlspecialchars($_POST['miel']);

if (!filter_var($email, FILTER_VALIDATE_EMAIL) !== FALSE)
{
	echo "L'adresse e-mail " . $email . " est incorrecte<br>";
      echo "<script>setTimeout(function(){ window.location.href = 'profil.php';}, 500);</script>";
	exit();
}
$reponse = $bdd->query('SELECT count(*) AS nb FROM user WHERE email=\'' . $email . '\'');
$email_check = $reponse->fetch();

if ($email_check['nb'] < 0)
{
	echo "L'adresse e-mail " . $email . " n'est pas disponible<br>";
      echo "<script>setTimeout(function(){ window.location.href = 'profil.php';}, 500);</script>";
	exit();
}
$reponse = $bdd->query('UPDATE `user` SET `email`= \'' . $email . '\' WHERE ' . $userid . ' = `id` ');
}

$notiff = (isset($_POST['choix1']) ? 1 : 0);
$reponse = $bdd->query('UPDATE `user` SET `notif`= \'' . $notiff . '\' WHERE ' . $userid . ' = `id` ');


header('Location: index.php?success=1');

 ?>
