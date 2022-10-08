<?php
session_start();
require "Miyagawa.php";
$dbmng = new Sginin();
$dbmng -> get_user($_POST['mail'],$_POST['pass']);
?>
