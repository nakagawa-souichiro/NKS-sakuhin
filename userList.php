<!DOCTYPE HTML>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>ビデテキgames</title>
    <link rel="stylesheet" href="koumoku.css">
    <script>
	function confirm_test() {
    	var select = confirm("本当に削除しますか？この操作はやり直すことができません。");
    	return select;
	}
</script>
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
	<?php
	require_once("getTitle.php");
	require_once("getMediaList.php");
	require_once ('getUser.php');
	getTitle2($_SESSION["eUser"]);
	getUser($_SESSION['eUser']);
	$bool = false;
	if(!empty($_SESSION["NAME"])){
	    if($_SESSION["NAME"]["id"] == $_SESSION["eUser"]){
	        $bool = true;
	    }
	}
	if($bool){
	    print('<h2>あなたの投稿一覧です。</h2>');
	    print('<table border="1" style="border-collapse: collapse">');
	    printf("<tr><th>タイトル</th><th>カテゴリー</th><th>機能</th></tr>");
	    $nrows = count($_SESSION['title']);
	    for($i = 0; $i < $nrows; $i++){
	        getMediaList2($_SESSION['title'][$i]['listid']);
	        print('<tr>');
	        printf("<td><a href=\"editRead.php?id=%d\">%s</a></td>",$_SESSION['title'][$i]['id'],htmlspecialchars($_SESSION['title'][$i]['title'], ENT_QUOTES, "UTF-8"));
	        printf("<td><a href=\"catId.php?id=%d\">%s</a></td>",$_SESSION['title'][$i]['listid'],$_SESSION['list2'][0]['medialist']);
	        print("<td><form method='POST' action='deleteTitle.php' onsubmit='return confirm_test()'>");
	        printf("<input type='hidden' name='id' value=%d/>",$_SESSION['title'][$i]["id"]);
	        print("<input type='submit' value='削除'/></form></td>");
	        print('</tr>');
	    }
	    print('</table>');
	}else{
	    printf('<h2>%sさんの投稿一覧です。</h2>',$_SESSION["user"][0]["name"]);
	    print('<table border="1" style="border-collapse: collapse">');
	    printf("<tr><th>タイトル</th><th>カテゴリー</th></tr>");
	    $nrows = count($_SESSION['title']);
	    for($i = 0; $i < $nrows; $i++){
	        getMediaList2($_SESSION['title'][$i]['listid']);
	        print('<tr>');
	        printf("<td><a href=\"editRead.php?id=%d\">%s</a></td>",$_SESSION['title'][$i]['id'],htmlspecialchars($_SESSION['title'][$i]['title'], ENT_QUOTES, "UTF-8"));
	        printf("<td><a href=\"catId.php?id=%d\">%s</a></td>",$_SESSION['title'][$i]['listid'],$_SESSION['list2'][0]['medialist']);
	        print('</tr>');
	    }
	    print('</table>');
	}
	?>
	<a href="titleList.php">戻る</a>
</body>
</html>