<?php
session_start();
require "Miyagawa.php";
$dbmng = new Sginin();
$search = $dbmng -> get_user($_POST['mail'],$_POST['pass']);
?>
