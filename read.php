<!DOCTYPE HTML>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>閲覧画面</title>
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
<?php session_start();?>
	<h2><?=$_SESSION['media'][0]['title'] ?></h2>
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