<?php
    class Ueda{
        //タグの絞り込みを判定する変数
        public $tagsw="";
        private function dbConnect(){
            $pdo=new PDO('mysql:host=localhost;dbname=csslabo;charset=utf8','ueda','!3qWaHSRi9Bse5m[');
            return $pdo;
        }
        //ホーム画面のタイムライン
        public function GetTimeline(){
            $pdo = $this->dbConnect();
            $sql = "SELECT * FROM css_tbl ORDER BY css_id DESC";
            $ps = $pdo->prepare($sql);
            $ps->execute();
            $this->tagsw="";//タグの絞り込みを無しにする
            return $ps;
        }
        //ホーム画面のいいね
        public function UpdateGood($id){
            $pdo = $this->dbConnect();
            $sql = "UPDATE css_tbl SET css_like = css_like + 1 WHERE css_id = ?";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1,$id,PDO::PARAM_INT);
            $ps->execute();
        }
        //ホーム画面のコメント
        public function GetComment($id){
            $pdo = $this->dbConnect();
            $sql = "SELECT comment FROM comment_tbl WHERE css_id = ?";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1,$id,PDO::PARAM_INT);
            $ps->execute();
            return $ps;
        }
        //ホーム画面の検索
        public function GetSearch($cssname){
            $pdo = $this->dbConnect();
            $sql = "SELECT * FROM css_tbl WHERE css_name LIKE ?";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1,'%'.$cssname.'%',PDO::PARAM_STR);
            $ps->execute();
            return $ps;
        }
        //ホーム画面の絞り込み
        public function GetTag($tag){
            $pdo = $this->dbConnect();
            $sql = "SELECT * FROM css_tbl WHERE css_tag = ?";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1,$tag,PDO::PARAM_STR);
            $ps->execute();
            return $ps;
        }
        //ホーム画面のいいね昇順
        public function GetAsc(){
            $pdo = $this->dbConnect();
            //タグの絞り込みがあるかどうか
            if($this->tagsw!=""){
                $sql = "SELECT * FROM css_tbl WHERE css_tag = ? ORDER BY css_like";
                $ps = $pdo->prepare($sql);
                $ps->bindValue(1,$this->tagsw,PDO::PARAM_STR);
            }else{
                $sql = "SELECT * FROM css_tbl ORDER BY css_like";
                $ps = $pdo->prepare($sql);
            }
            $ps->execute();
            return $ps;
        }
        //ホーム画面のいいね降順
        public function GetDesc(){
            $pdo = $this->dbConnect();
            if($this->tagsw!=""){
                $sql = "SELECT * FROM css_tbl WHERE css_tag = ? ORDER BY css_like DESC";
                $ps = $pdo->prepare($sql);
                $ps->bindValue(1,$this->tagsw,PDO::PARAM_STR);
            }else{
                $sql = "SELECT * FROM css_tbl ORDER BY css_like DESC";
                $ps = $pdo->prepare($sql);
            }
            $ps->execute();
            return $ps;
        }

        //投稿画面の投稿
        public function InsertCss($id,$name,$img,$code,$tag){
            $pdo = $this->dbConnect();
            $sql = "INSERT INTO csslabo (creater_id,css_name,css_img,css_code,css_tag,css_like) VALUES(?,?,?,?,?,0)";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1,$id,PDO::PARAM_INT);
            $ps->bindValue(2,$name,PDO::PARAM_STR);
            $ps->bindValue(3,$img,PDO::PARAM_STR);
            $ps->bindValue(4,$code,PDO::PARAM_STR);
            $ps->bindValue(5,$tag,PDO::PARAM_STR);
            $ps->execute();
        }
    }
?>