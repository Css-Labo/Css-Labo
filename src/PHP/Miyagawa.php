<?php

class Sginin
{

    function get_pdo()
    {
        $pdo = new PDO('mysql:host=localhost;dbname=css_labo;charset=utf8', 'webuser', 'abccsd2');
        return $pdo;
    }

    function get_user($mail, $pass)
    {
        $pdo = $this->get_pdo();
        $sql = 'SELECT * FROM user_tbl WHERE user_mail = ?';

        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $mail, PDO::PARAM_STR);
        $ps->execute();
        $search = $ps->fetchAll();
        if ($search == null) {
            //アカウントが存在していない
            header("../login.html");
        } else {
            foreach ($search as $row) {
                if (password_verify($pass, $row['user_pass']) == true) {
                    //ログイン成功→画面遷移を挿入する予定
                    $_SESSION['name'] = $row['user_name'];
                    $_SESSION['id'] = $row['user_id'];
                    header("../home2.html");
                } else {
                    //ログイン失敗→パスワードが間違っている
                    header("../login.html");
                }
            }
        }
    }
}
class Login
{

    function get_pdo()
    {
        $pdo = new PDO('mysql:host=localhost;dbname=css_labo;charset=utf8', 'webuser', 'abccsd2');
        return $pdo;
    }

    function insert_signin($name, $pass, $mail)
    {
        $pdo = $this->get_pdo();
        $sql = "INSERT INTO user_tbl (user_name,user_pass,user_mail) VALUE (?,?,?)";
        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $name, PDO::PARAM_STR);
        $ps->bindValue(2, password_hash($pass, PASSWORD_DEFAULT), PDO::PARAM_STR);
        $ps->bindValue(3, $mail, PDO::PARAM_STR);
        $ps->execute();
        header("../login.html");
    }
}
?>