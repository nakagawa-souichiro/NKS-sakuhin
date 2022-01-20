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
        <link rel="stylesheet" href="koumoku.css">
    </head>
<body>
    <header>
        <nav>
            <ul class="clearfix">
                <li><a href="index.php">一覧画面</a></li>
                <li><a href="post.php">投稿画面</a></li>
                <li><a href="Logout.php">ログアウト</a></li>
            </ul>
        </nav>
    </header>
    <h1>メイン画面</h1>
    <!-- ユーザーIDにHTMLタグが含まれても良いようにエスケープする -->
    <p>ようこそ<u><?php echo htmlspecialchars($_SESSION["NAME"]["name"], ENT_QUOTES, "UTF-8"); ?></u>さん</p>
</body>
</html>