<?php
require_once('functions.php');
session_start();
session_regenerate_id(true);

$dbh = connectDB();
$dbh->exec("USE nksdb");

$userid = $_POST['userid'];
$password = $_POST['password'];
$errorMessage = "そのユーザーIDは存在しません。";
$url = "index.php";
$name = "";
$sql = "SELECT * from userdata;";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$login = $stmt->fetchall(PDO::FETCH_ASSOC);
for($i = 0;$i < count($login); $i++){
    if($login[$i]['userid'] === $userid){
        $errorMessage = "パスワードに誤りがあります。";
        if($login[$i]["password"] === $password){
            $name = $login[$i]["name"];
            $url = "main.php";
        }
    }
}

$dbh = NULL;
$_SESSION["error"] = $errorMessage;
$_SESSION["NAME"] = $name;
header('Location:' .$url);
exit();
