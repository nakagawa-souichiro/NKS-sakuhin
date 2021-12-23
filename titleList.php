<!DOCTYPE HTML>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>media</title>
</head>
<body>
	<h2>一覧画面</h2>
	<?php
	require_once("getTitle.php");
	getTitle();
	print('<table border="1" style="border-collapse: collapse">');
	printf("<tr><th>タイトル</th><th>機能</th></tr>");
	$nrows = count($_SESSION['title']);
	for($i = 0; $i < $nrows; $i++){
	    print('<tr>');
	    printf("<td>%s</td>",$_SESSION['title'][$i]['title']);
	    printf("<td><a href=\"editRead.php?id=%d\">閲覧</a></td>",$_SESSION['title'][$i]['id']);
	    print('</tr>');
	}
	print('</table>');
	?>
	<a href="select.php">選択画面に戻る</a>
</body>
</html>