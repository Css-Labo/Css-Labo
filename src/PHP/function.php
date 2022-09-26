<?php

$pdo = new PDO('mysql:host=XXXX;dbname=XXXX;charset=utf8', 'USER', 'PASS');

    //cssテーブルの'CssID','作者ID','cssのタイトル（名前）','コード','タグ','いいね数'を取得
    $sql = "SELECT * FROM css_tbl";

    //cssの件数を取得
    $sql1 = "SELECT COUNT(*) FROM css_tbl";

    //iineの上位10件だけ取得
    $sql2 = "SELECT * FROM css_tbl ORDER BY iine LIMIT 10";



    function toroku($name,$pass,$mail){
        $sql3 = "";
    }
?>