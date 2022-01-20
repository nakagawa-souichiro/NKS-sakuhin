<!DOCTYPE HTML>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>media</title>
    <link rel="stylesheet" href="koumoku.css">
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
	<h2>ゲーム名一覧</h2>
	<?php
	require_once("getMediaList.php");
	getMediaList();
	print('<table border="1" style="border-collapse: collapse">');
	printf("<tr><th>カテゴリー</th></tr>");
	$nrows = count($_SESSION['list']);
	for($i = 0; $i < $nrows; $i++){
	    print('<tr>');
	    printf("<td><a href=\catId.php?id=%d\">%s</a></td>",$_SESSION['list'][$i]['listid'],$_SESSION['list'][$i]['medialist']);
	    print('</tr>');
	}
	print('</table>');
	?>
</body>
</html>