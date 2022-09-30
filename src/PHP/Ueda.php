<?php
    class Ueda{
        private function dbConnect(){
            $pdo=new PDO('mysql:host=localhost;dbname=csslabo;charset=utf8','ueda','!3qWaHSRi9Bse5m[');
            return $pdo;
        }
        //ホーム画面の検索
        public function CssSearch($cssname){
            $pdo = $this->dbConnect();
            $sql = "SELECT * FROM css_tbl WHERE css_name LIKE ?";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1,'%'.$cssname.'%',PDO::PARAM_STR);
            $ps->execute();
            return $ps;
        }
        //ホーム画面のいいね
        public function GoodIncriment($id){
            $pdo = $this->dbConnect();
            $sql = "UPDATE css_tbl SET css_like = css_like + 1 WHERE css_id = ?";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1,$id,PDO::PARAM_INT);
            $ps->execute();
        }
    }
?>