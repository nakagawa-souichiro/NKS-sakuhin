<!DOCTYPE HTML>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>ビデテキgames</title>
    <link rel="stylesheet" href="koumoku.css">
</head>
<body>
	<header>
        <nav>
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
	<h2>タイトルから選んでください。</h2>
	<?php
	require_once("getTitle.php");
	require_once("getUser.php");
	getTitle();
	print('<table border="1" style="border-collapse: collapse">');
	printf("<tr><th>タイトル</th><th>作成者</th></tr>");
	$nrows = count($_SESSION['title']);
	for($i = 0; $i < $nrows; $i++){
	    getUser($_SESSION["title"][$i]["userid"]);
	    print('<tr>');
	    printf("<td><a href=\"editRead.php?id=%d\">%s</a></td>",$_SESSION['title'][$i]['id'],htmlspecialchars($_SESSION['title'][$i]['title'], ENT_QUOTES, "UTF-8"));
	    printf("<td><a href=\"editUser.php?id=%d\">%s</a></td>",$_SESSION["title"][$i]["userid"],$_SESSION["user"][0]["name"]);
	    print('</tr>');
	}
	print('</table>');
	?>
	<a href="index.php">戻る</a>
</body>
</html>