<!DOCTYPE HTML>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>閲覧画面</title>
    <link rel="stylesheet" href="koumoku.css">
    <style>
        #right{
            top: 70px;
            right: 70px;
            bottom: 30px;
            width: 500px;
            position: absolute;
            border: solid 2px black;
        }
        #textarea {
            margin : 1rem auto;
            padding : 1rem;
        }
    </style>
</head>
<body>
	<header>
        <nav>
            <ul class="clearfix">
                <li><a href="login.php">ログイン画面</a></li>
                <li><a href="post.php">投稿画面</a></li>
                <li><a href="Logout.php">ログアウト</a></li>
            </ul>
        </nav>
    </header>
<?php session_start();?>
	<h2><?=htmlspecialchars($_SESSION['media'][0]['title'], ENT_QUOTES, "UTF-8") ?>(<?=htmlspecialchars($_SESSION['media'][0]['userid'], ENT_QUOTES, "UTF-8") ?>)</h2>
    <div>
        <?php
        print("<video src=\"importMedia.php\" controls></video>");
        ?>
    </div>
    <div id="right">
        <div id="textarea">
            <P><?=$_SESSION['media'][0]['text'] ?></P>
        </div>
    </div>
    <a href="titleList.php">戻る</a>
</body>
</html>