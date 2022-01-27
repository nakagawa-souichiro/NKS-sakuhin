<?php
$error = "";
if(!empty($_GET['error'])){
    switch($_GET["error"]){
        case "e1":
            $error = "既にその会員IDは存在しています。";
            break;
        case "e2":
            $error = "既にそのメールアドレスは使用されています。";
            break;
    }
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ビデテキgames</title>
    <link href="kaiin.css" rel="stylesheet"type="text/css">
    <link rel="stylesheet" href="koumoku.css">
</head>
<body>
	<header>
        <nav>
            <img src ="ビデテキgamesロゴ.jpg" alt="ロゴ">
            <ul class="clearfix">
                <li><a href="index.php">一覧へ</a></li>
                <li><a href="post.php">投稿する</a></li>
                <?php
                session_start();
                if(empty($_SESSION["NAME"])){
                    print('<li><a href="login.php">ログイン</a></li>');
                }else{
                    print('<li><a href="Logout.php">ログアウト</a></li>');
                }
                ?>
            </ul>
        </nav>
    </header>
    <form action="registerSignUp.php" method="post">
        <h2>新規会員登録</h2>
        <p><?php if(!empty($_GET['error'])){ echo ($error);} ?></p>
        <p><span>会員ID：</span><input type="text" name="userid" required></p>
        <p><span>パスワード：</span><input type="password" name="password"required></p>
        <p><span>名前：</span><input type="text" name="name"required></p>
        <p><span>メールアドレス：</span><input type="text" name="address" required></p>
        <!--<p>電話番号：<input type="tel" name="tel"></p>-->
        <button type="submit" name="user">登録</button>
        </form>
</body>
</html>