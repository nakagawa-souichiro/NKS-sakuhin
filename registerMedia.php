<?php
require_once('functions.php');

$pdo = connectDB();
$pdo->exec("USE mediatest");
$title = $_POST['title'];
$text = nl2br($_POST['text']);
$listid = $_POST['listid'];
    //エラーチェック
switch ($_FILES['upfile']['error']) {
        case UPLOAD_ERR_OK: // OK
            break;
        case UPLOAD_ERR_NO_FILE:   // 未選択
            throw new RuntimeException('ファイルが選択されていません', 400);
        case UPLOAD_ERR_INI_SIZE:  // php.ini定義の最大サイズ超過
            throw new RuntimeException('ファイルサイズが大きすぎます', 400);
        default:
            throw new RuntimeException('その他のエラーが発生しました', 500);
    }

    //動画をバイナリデータにする．
    $raw_data = file_get_contents($_FILES['upfile']['tmp_name']);

    $extension = "mp4";
    //サーバー側の一時的なファイルネームと取得時刻を結合した文字列にsha256をかける．
    $date = getdate();

    $fname = $_FILES['upfile']["tmp_name"].$date["year"].$date["mon"].$date["mday"].$date["hours"].$date["minutes"].$date["seconds"];
    $fname = hash("sha256", $fname);

    //動画をDBに格納．
    $sql = "INSERT INTO media(title, fname, extension, raw_data, text, listid) VALUES (:title, :fname, :extension, :raw_data, :text, :listid);";
    $stmt = $pdo->prepare($sql);
    $stmt -> bindValue(":title",$title, PDO::PARAM_STR);
    $stmt -> bindValue(":fname",$fname, PDO::PARAM_STR);
    $stmt -> bindValue(":extension",$extension, PDO::PARAM_STR);
    $stmt -> bindValue(":raw_data",$raw_data, PDO::PARAM_STR);
    $stmt -> bindValue(":text",$text, PDO::PARAM_STR);
    $stmt -> bindValue(":listid",$listid, PDO::PARAM_INT);
    $stmt -> execute();

$pdo = NULL;
header('Location: select.php');
exit();