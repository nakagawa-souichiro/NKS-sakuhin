<!DOCTYPE HTML>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>ビデテキgames</title>
    <link rel="stylesheet" href="koumoku.css">
    <link rel="stylesheet" href="games.css">
</head>
<body class="rogo">
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
	<h2><?=htmlspecialchars($_SESSION['media'][0]['title'], ENT_QUOTES, "UTF-8") ?>
	(<?php
	require_once("getUser.php");
	getUser($_SESSION["media"][0]["userid"]);
	print($_SESSION["user"][0]["name"]);
	?>)</h2>
    <div class="vio">
        <?php
        print("<video src=\"importMedia.php\" controls></video>");
        ?>
    </div>
    <div class="right">
        <div id="textarea">
            <P><?=$_SESSION['media'][0]['text'] ?></P>
        </div>
    </div>
    <div class="right2">
     	<a href="titleList.php" class="back">タイトル一覧に戻る</a>
<!--     	<a href="userList.php" class="gool">投稿一覧に戻る</a> -->
    	<p class="disp">
    <?php
    require_once ('getTitle.php');
    getTitle3($_GET["id"]);
    getTitle4($_GET["id"]);
    if(!empty($_SESSION["oldTitle"])){
        printf("<a href=\"editRead.php?id=%d\" class=idou4>%s</a>",$_SESSION['oldTitle'][0]['id'],htmlspecialchars($_SESSION['oldTitle'][0]['title'], ENT_QUOTES, "UTF-8"));
    }else{
        print("先頭 ");
    }
    print("<<〇>>");
    if(!empty($_SESSION["newTitle"])){
        printf("<a href=\"editRead.php?id=%d\" class=idou5>%s</a>",$_SESSION['newTitle'][0]['id'],htmlspecialchars($_SESSION['newTitle'][0]['title'], ENT_QUOTES, "UTF-8"));
    }else{
        print(" 最後");
    }
    ?>
    </p>
	</div>
</body>
</html>