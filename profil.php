<?php
require_once("config/isConnected.php");
require_once("config/connect-db.php");
?>
<?php include('inc/header.php') ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Camagru</title>
 			<link rel="stylesheet" type="text/css" href="resources/css/nikleskeuf.css">
 </head>
 <body>
 <div id=iskription>
  <a href="0000.png">
 </a>
 <div>Profil modification</div>
 <img class=frez src="resources/img/plane.png" height=" 50%" width="50%">
 <form method="post" action="modif.php" >
 <label for="login">Login:</label>
 <input id="mon_id" type="text" name="login"/>
 <br>
 <label for="e-mail">E-mail:</label>
 <input id="mon_id" type="text"  name="miel"/>
 <br>
 <label for="mdp">Mot de passe:</label>
 <input type="password" name="mdp" />
 <br>
 (Ton mot de passe doit avoir 1 majuscule, et 1 chiffre)
 <br>
 <input type="checkbox" name="choix1" value="1"> Notification
 <div class="bouton">
   <input type="submit" value="Press"/>


 </div>
 </form>
 </div>
 </body>
 </html>
