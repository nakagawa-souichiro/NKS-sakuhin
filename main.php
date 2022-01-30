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
        <title>ビデテキgames</title>
        <link rel="stylesheet" href="koumoku.css">
        <link rel="stylesheet" href="Main.css">
    </head>
<body class="MAIN">
    <header>
        <nav>
            <img src="ビデテキgamesロゴ.jpg" alt="ロゴ">
            <ul class="clearfix">
                <li><a href="index.php">一覧へ</a></li>
                <li><a href="post.php">投稿する</a></li>
                <?php
                if(empty($_SESSION["NAME"])){
                    print('<li><a href="login.php">ログイン</a></li>');
                }else{
                    print('<li><a href="Logout.php">ログアウト</a></li>');
                }
                ?>
            </ul>
        </nav>
    </header>
    <!-- ユーザーIDにHTMLタグが含まれても良いようにエスケープする -->
    <h2>ログイン成功</h2>
    <div class="test">ようこそ<u><?php echo htmlspecialchars($_SESSION["NAME"]["name"], ENT_QUOTES, "UTF-8"); ?></u>さん</div>
    <a href="post.php" class="top">投稿画面へ</a>
    <a href="index.php" class="desk">一覧画面へ</a>
</body>
</html>