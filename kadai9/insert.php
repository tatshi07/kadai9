<?php
//1. POSTデータ取得
$name   = $_POST['name'];
$theme  = $_POST['theme'];
$naiyou = $_POST['naiyou'];

//2. DB接続します
require_once('funcs.php');
$pdo = db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare('INSERT INTO gs_an_table(name,theme,naiyou,indate)VALUES(:name,:theme,:naiyou,sysdate());');
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':theme', $theme, PDO::PARAM_STR);
$stmt->bindValue(':naiyou', $naiyou, PDO::PARAM_STR);
$status = $stmt->execute(); //実行

//４．データ登録処理後
if ($status == false) {
    sql_error($stmt);
} else {
    redirect('index.php');
}
