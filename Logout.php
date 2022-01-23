<?php
session_start();
$errorMessage = "ログアウトしました";
if(!isset($_SESSION['NAME'])){
    $errorMessage = "セッションがタイムアウトしました。";
}
$_SESSION["NAME"] = array();
?>
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ビデテキgames</title>
        <link rel="stylesheet" href="logout.css">
        <link rel="stylesheet" href="koumoku.css">
    </head>
<body class="logouttext">
    <header>
        <nav>
            <ul class="clearfix">
                <li><a href="index.php">一覧へ</a></li>
                <li><a href="post.php">投稿する</a></li>
                <li><a href="login.php">ログイン</a></li>
            </ul>
        </nav>
    </header>
    <h2>ありがとうございました</h2>
    <div><?php echo htmlspecialchars($errorMessage, ENT_QUOTES); ?></div>
    <a href="login.php" class="bt-samp64">ログイン画面に戻る</a>
</body>
</html>