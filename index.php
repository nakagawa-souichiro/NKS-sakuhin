<!DOCTYPE HTML>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>ビデテキgames</title>
    <link rel="stylesheet" href="koumoku.css">
    <link rel="stylesheet" href="list.css">
</head>
<body class="ichiran">
	<header>
        <nav>
            <ul class="clearfix">
                <li><a href="#">一覧へ</a></li>
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
	<h2>ゲーム名一覧です。カテゴリーから選択してください。</h2>
	<?php
	require_once("getMediaList.php");
    getMediaList();
    print('<table border="1" style="border-collapse: collapse">');
    printf("<tr><th>カテゴリー</th></tr>");
    $nrows = count($_SESSION['list']);
    for($i = 0; $i < $nrows; $i++){
	    print('<tr>');
	    printf("<td><a href=\"catId.php?id=%d\">%s</a></td>",$_SESSION['list'][$i]['listid'],$_SESSION['list'][$i]['medialist']);
	    print('</tr>');
	}
	print('</table>');
	?>
</body>
</html>