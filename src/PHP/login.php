<?php
    session_start();
    require "Miyagawa.php";
    $dbmng = new Login();
    $search = $dbmng -> insert_signin($_POST['user_name'],$_POST['mail'],$_POST['pass']);
?>
