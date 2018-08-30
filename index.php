<?php
session_start();
require_once("config/connect-db.php");
if (isset($_SESSION['login']))
  require_once("index-log.php");
else
	require_once("index-delog.php");
?>
