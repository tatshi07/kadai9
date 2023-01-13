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
    <title>データ登録</title>
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
                <div class="navbar-header"><a class="navbar-brand" href="login.php">ログイン</a></div>
                <div class="navbar-header"><a class="navbar-brand" href="logout.php">ログアウト</a></div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <form method="POST" id="id_form1" action="insert.php">
        <div class="jumbotron">
            <fieldset>
                <legend>ヒアリングシート</legend>
                <label>【社名】<input type="text" name="name" id="name"></label><br>
                <label>【案件テーマ】<input type="text" name="theme" id="theme"></label><br>
                <label>【案件概要】<textArea  name="naiyou" id="naiyou" rows="4" cols="40"></textArea></label><br>
                <input type="submit" value="送信">
                <!-- <input type="button" value="Exec" onclick="onButtonClick();" /> -->
            </fieldset>
        </div>
    </form>
    <!-- <form name="form1" id="id_form1" action=""> -->
        <!-- <input name="textBox1" id="id_textBox1" type="text" value="" /> -->
        
    <!-- </form>
    <p>◯◯様</p>
    <p>突然のご連絡失礼いたします。</p> 
    <p>【社名】</p>
    <div id="copyTarget1"></div>
    <p>【案件テーマ】</p>
    <div id="copyTarget2"></div>
    <p>【案件概要】<p>
    <div id="copyTarget3"></div> -->

    

</body>

</html>
