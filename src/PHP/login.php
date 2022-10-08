<?php
    session_start();
    require "Miyagawa.php";
    $dbmng = new Login();
    $dbmng -> insert_signin($_POST['name'],$_POST['pass'],$_POST['mail']);
?>
