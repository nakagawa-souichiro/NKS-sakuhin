<?php
session_start();
if(empty($_SESSION["NAME"])){
    header('Location: login.php?login='."ログインしてください");
    exit();
}
?>
<!DOCTYPE HTML>

<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>投稿画面</title>
    <link rel = "stylesheet" href="toukou.css"/>
    <link rel = "stylesheet" href="koumoku.css"/>
</head>

<body class="bt-samp62">
	<header>
        <nav>
            <img src ="ビデテキgamesロゴ.jpg" alt="ロゴ">
            <ul class="clearfix">
                <li><a href="index.php">一覧へ</a></li>
                <li><a href="#">投稿する</a></li>
				<li><a href="Logout.php">ログアウト</a></li>
            </ul>
        </nav>
    </header>
	<h2>投稿画面</h2>
	<a href="index.php" class="bt-samp63">一覧画面へ</a>
    <form action="registerMedia.php" enctype="multipart/form-data" method="post">
        <table border="2" style="border-collapse: collapse">
            <tr><th>タイトル</th><td><input type="text" value="" name="title" placeholder="タイトルを入力してください" size="50" required></td></tr>
            <tr><th><label>動画(mp4)</label></th><td><input type="file" value="" name="upfile" accept="video/mp4" required></td></tr>
            <tr><th><label>テキスト</label></th><td><textarea name="text" placeholder="テキストを入力してください" rows="11" cols="50" required></textarea></td></tr>
            <tr><th>ゲーム名</th><td>
            <select name="listid">
            <?php
            require_once ('getMediaList.php');
            getMediaList();
            foreach($_SESSION['list']as $list){
                printf("<option value=\"%s\">%s</option>",$list['listid'],$list['medialist']);
            }
            ?>
            </select>
            </td></tr>
        </table>
        <input type="submit" value="投稿">
    </form>
</body>
</html>