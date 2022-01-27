<?php
$error = "";
if(!empty($_GET['error'])){
    switch($_GET["error"]){
        case "e1":
            $error = "そのユーザーIDは存在しません。";
            break;
        case "e2":
            $error = "パスワードに誤りがあります。";
            break;
    }
}
?>
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ビデテキgames</title>
        <link rel="stylesheet" href="style.css" media="all" />
        <link rel="stylesheet" href="koumoku.css">
    </head>
<body>
    <header>
        <nav>
            <img src ="ビデテキgamesロゴ.jpg" alt="ロゴ">
            <ul class="clearfix">
                <li><a href="index.php">一覧へ</a></li>
                <li><a href="post.php">投稿する</a></li>
                <?php
                session_start();
                if(empty($_SESSION["NAME"])){
                    print('<li><a href="#">ログイン</a></li>');
                }else{
                    print('<li><a href="Logout.php">ログアウト</a></li>');
                }
                ?>
            </ul>
        </nav>
    </header>
    <?php if(!empty($_GET['login'])){print("<p>ログインしてください</p>");} ?>
    <div class ="form-wrapper">
    	<form id="loginForm" name="loginForm" action="checkLogin.php" method="POST">
        <fieldset style="border:1px solid mediumseagreen;">
				<legend>ログイン</legend>
            	<div><font color="#ff0000"><?php if(!empty($_GET['error'])){ echo htmlspecialchars($error, ENT_QUOTES);} ?></font></div>
            	<label for="userid" class = "userid">ユーザーID　</label><input type="text" id="userid" name="userid" placeholder="ユーザーIDを入力" value=""required>
            	<br>
            	<label for="password" class = "pass">パスワード　</label><input type="password" id="password" name="password" value="" placeholder="パスワードを入力" required>
            	<br>
            	<input type="submit" id="login" name="login" value="ログイン">
        	</fieldset>
		</form>
    </div>
    <br>
​
    <form action="signUp.php">
        <fieldset style="border:1px solid mediumseagreen;">
            <legend>新規登録はこちら</legend>
            <input type="submit" value="新規登録">
        </fieldset>
    </form>
</body>
</html>