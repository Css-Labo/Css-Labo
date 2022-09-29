<?php

class Login
{

    function get_pdo()
    {
        $pdo = new PDO('mysql:host=localhost;dbname=css_labo;charset=utf8', 'webuser', 'abccsd2');
        return $pdo;
    }

    function get_user($id,$pass)
    {
        $pdo = $this->get_pdo();
        $sql = 'SELECT * FROM user_mst WHERE user_id = ?';

        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $id, PDO::PARAM_STR);
        $ps->execute();
        $search = $ps->fetchAll();
        if ($search == null)
            echo 'アカウントが存在しません';
        else {
            foreach ($search as $row) {
                if (password_verify($pass, $row['user_pass']) == true) {
                    //ログイン成功→画面遷移を挿入する予定
                } else {
                    //ログイン失敗→パスワードが間違っている
                }
            }
        }
    }
}
