<?php
    class Sginin{

    function get_pdo()
    {
        $pdo=new PDO('mysql:host=localhost;dbname=csslabo;charset=utf8','ueda','!3qWaHSRi9Bse5m[');
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
            header("Location:../SignIn.html");
            exit;
        } else {
            foreach ($search as $row) {
                if  (password_verify($pass, $row['user_pass']) == true) {
                    //ログイン成功→画面遷移を挿入する予定
                    $_SESSION['name'] = $row['user_name'];
                    $_SESSION['id'] = $row['user_id'];
                    header("Location:../home2.php");
                    exit;
                } else {
                    //ログイン失敗→パスワードが間違っている
                    header("Location:../SignIn.html");
                    exit;
                }
            }
        }
    }
}
class Login
{

    function get_pdo()
    {
        $pdo=new PDO('mysql:host=localhost;dbname=csslabo;charset=utf8','ueda','!3qWaHSRi9Bse5m[');
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
        header("Location:../SignIn.html");
        exit;
    }
}

class Profile
{

    function get_pdo()
    {
        $pdo=new PDO('mysql:host=localhost;dbname=csslabo;charset=utf8','ueda','!3qWaHSRi9Bse5m[');
        return $pdo;
    }

    public function GetTimeline2($id)
    {
        $pdo = $this->get_pdo();
        $sql1 = "SELECT * FROM bookmark_tbl WHERE user_id = ?";
        $ps = $pdo->prepare($sql1);
        $ps->bindValue(1, $id, PDO::PARAM_STR);
        $ps->execute();
        return $ps;
    }
    public function Getsubtimeline($css_name)
    {
        $pdo = $this->get_pdo();
        $sql2 = "SELECT * FROM css_tbl WHERE css_id = ?";
        $ps2 = $pdo->prepare($sql2);
        $ps2->bindValue(1, $css_name, PDO::PARAM_STR);
        $ps2->execute();
        return $ps2;
    }

    public function GetUsername($id)
    {
        $pdo = $this->get_pdo();
        $sql = "SELECT user_name FROM user_tbl WHERE user_id = $id";
        $ps = $pdo->prepare($sql);
        $ps->execute();
        foreach ($ps->fetchAll() as $row) {
            return $row['user_name'];
        }
    }

    public function Getsubtimeline2($name)
    {
        $pdo = $this->get_pdo();
        $sql = "SELECT * FROM css_tbl WHERE creater_id = $name";
        $ps2 = $pdo->prepare($sql);
        $ps2->execute();
        return $ps2;
    }
}
?>