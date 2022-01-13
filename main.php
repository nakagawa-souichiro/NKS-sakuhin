<?php
session_start();
if(!isset($_SESSION["NAME"])){
    header("Location: Logout.php");
    exit();
}
?>
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>メイン</title>
    </head>
    <body>
        <h1>メイン画面</h1>
        <!-- ユーザーIDにHTMLタグが含まれても良いようにエスケープする -->
        <p>ようこそ<u><?php echo htmlspecialchars($_SESSION["NAME"], ENT_QUOTES, "UTF-8"); ?></u>さん</p>
        <ul>
        	<li><a href="select.php">選択画面</a></li>
            <li><a href="Logout.php">ログアウト</a></li>
        </ul>
    </body>
</html>