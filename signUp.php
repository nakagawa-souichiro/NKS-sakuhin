<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>会員登録画面</title>
</head>
<body>
    <form action="registerSignUp.php" method="post">
        <h2>新規会員登録</h2>
        <p>会員ID：<input type="text" name="userid" required></p>
        <p>パスワード：<input type="password" name="password"required></p>
        <p>名前：<input type="text" name="name"required></p>
        <p>メールアドレス：<input type="text" name="address" required></p>
        <!--<p>電話番号：<input type="tel" name="tel"></p>-->
        <button type="submit" name="user">登録</button>
        </form>
</body>
</html>