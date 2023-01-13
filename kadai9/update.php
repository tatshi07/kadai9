<?php
session_start();
require_once('funcs.php');
loginCheck();

//1. POSTデータ取得
$name   = $_POST['name'];
$theme  = $_POST['theme'];
$naiyou = $_POST['naiyou'];
$id     = $_POST['id'];

//2. DB接続します
require_once('funcs.php');
$pdo = db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare('UPDATE gs_an_table SET name=:name,theme=:theme,naiyou=:naiyou WHERE id=:id;');
$stmt->bindValue(':name',   $name,   PDO::PARAM_STR);
$stmt->bindValue(':theme',  $email,  PDO::PARAM_STR);
$stmt->bindValue(':naiyou', $naiyou, PDO::PARAM_STR);
$stmt->bindValue(':id',     $id,     PDO::PARAM_INT);
$status = $stmt->execute(); //実行

//４．データ登録処理後
if ($status === false) {
    sql_error($stmt);
} else {
    redirect('select.php');
}
