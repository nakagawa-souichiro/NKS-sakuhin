<?php
session_start();
?>
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ログイン</title>
        <link rel="stylesheet" href="style.css" media="all" />
    </head>
    <body>
        <div class ="form-wrapper">
        <form id="loginForm" name="loginForm" action="checkLogin.php" method="POST">
            <fieldset>
                <legend>ログイン</legend>
                <div><font color="#ff0000"><?php if(!empty($_SESSION['error'])){ echo htmlspecialchars($_SESSION["error"], ENT_QUOTES);} ?></font></div>
                <label for="userid" class = "userid">ユーザーID　</label><input type="text" id="userid" name="userid" placeholder="ユーザーIDを入力" value="<?php if (!empty($_POST["userid"])) {echo htmlspecialchars($_POST["userid"], ENT_QUOTES);} ?>"required>
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
            <fieldset>
                <legend>新規登録はこちら</legend>
                <input type="submit" value="新規登録">
            </fieldset>
        </form>
    </body>
</html>