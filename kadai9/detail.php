<?php
session_start();
require_once('funcs.php');
loginCheck();

$id = $_GET['id']; //?id~**を受け取る
require_once('funcs.php');
$pdo = db_conn();

//２．データ登録SQL作成
$stmt = $pdo->prepare('SELECT * FROM gs_an_table WHERE id=:id;');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

//３．データ表示
if ($status == false) {
    sql_error($stmt);
} else {
    $row = $stmt->fetch();
}
?>



<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <script type="text/javascript" language="javascript">
        function onButtonClick() {
            target = document.getElementById("copyTarget1");
          target.innerText = document.forms.id_form1.name.value;
            target = document.getElementById("copyTarget2");
          target.innerText = document.forms.id_form1.theme.value;
          target = document.getElementById("copyTarget3");
          target.innerText = document.forms.id_form1.naiyou.value;
        }
    </script> 
    <title>データ更新</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body>

    <!-- Head[Start] -->
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <form method="POST" id="id_form1" action="update.php">
        <div id="copyTarget" class="jumbotron">
            <fieldset>
                <legend>[編集]</legend>
                <label>【社名】<input type="text" id="name" name="name" value="<?= $row['name'] ?>"></label><br>
                <label>【案件テーマ】<input type="text" id="theme" name="theme" value="<?= $row['theme'] ?>"></label><br>
                <label>【案件概要】<textArea name="naiyou" id="naiyou" rows="4" cols="40"><?= $row['naiyou'] ?></textArea></label><br>
                <input type="submit" value="送信">
                <input type="hidden" name="id" value="<?= $id ?>">
                <!-- <button onclick="copyToClipboard()">Copy text</button> -->
                <input type="button" value="コピー用に表示" onclick="onButtonClick();" />
            </fieldset>
        </div>
    </form>
    <p>◯◯様</p>
    <p>突然のご連絡失礼いたします。</p> 
    <p>【社名】</p>
    <div id="copyTarget1"></div>
    <p>【案件テーマ】</p>
    <div id="copyTarget2"></div>
    <p>【案件概要】<p>
    <div id="copyTarget3"></div>
    <!-- Main[End] -->
    <!-- <script>
        function copyToClipboard() {
            // コピー対象をJavaScript上で変数として定義する
            var copyTarget = document.getElementById("copyTarget");

            // コピー対象のテキストを選択する
            copyTarget.select();

            // 選択しているテキストをクリップボードにコピーする
            document.execCommand("Copy");

            // コピーをお知らせする
            alert("コピーできました！ : " + copyTarget.value);
        }
    </script> -->

</body>

</html>
