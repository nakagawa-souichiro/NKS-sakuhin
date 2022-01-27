<!DOCTYPE HTML>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>ビデテキgames</title>
    <link rel="stylesheet" href="koumoku.css">
    <style>
        #right{
            top: 140px;
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
        video{
            height: 380px;
        }
    </style>
</head>
<body>
	<header>
        <nav>
            <ul class="clearfix">
                <img src ="ビデテキgamesロゴ.jpg" alt="ロゴ">
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
	<h2><?=htmlspecialchars($_SESSION['media'][0]['title'], ENT_QUOTES, "UTF-8") ?>
	(<?php
	require_once("getUser.php");
	getUser($_SESSION["media"][0]["userid"]);
	print($_SESSION["user"][0]["name"]);
	?>)</h2>
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