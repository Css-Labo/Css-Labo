<?php

class Sginin{

    function get_pdo(){
        $pdo = new PDO('mysql:host=localhost;dbname=css_labo;charset=utf8', 'webuser', 'abccsd2');
        return $pdo;
    }

    function insert_signin($name,$pass,$mail){
        $pdo = $this->get_pdo();
        $sql = "INSERT INTO user_tbl (user_name,user_pass,user_mail) VALUE (?,?,?)";
        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $name, PDO::PARAM_STR);
        $ps->bindValue(2, $pass, PDO::PARAM_STR);
        $ps->bindValue(3, $mail, PDO::PARAM_STR);
        $ps->execute();
    }

}
