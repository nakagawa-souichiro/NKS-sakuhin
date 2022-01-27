<?php
$test = "";
$result = "";
if(!empty($_GET['result'])){
    switch($_GET["result"]){
        case "r1":
            $result = "登録が完了しました";
            $test = "login.php";
            break;
        case "r2":
            $result = "投稿が完了しました";
            $test = "index.php";
    }
}
?>
<!DOCTYPE HTML>

<html lang="ja">
<head>
<meta charset="utf-8">
<title>選択画面</title>
<link rel="stylesheet" href="koumoku.css">
</head>

<body>
<header>
        <nav>
            <img src ="ビデテキgamesロゴ.jpg" alt="ロゴ">
            <ul class="clearfix">
                <li><a href="login.php">ログイン画面</a></li>
                <li><a href="post.php">投稿画面</a></li>
                <li><a href="Logout.php">ログアウト</a></li>
            </ul>
        </nav>
    </header>
<h2><?php echo($result); ?></h2>
<a href="<?php echo($test); ?>">戻る</a>
</body>
</html>