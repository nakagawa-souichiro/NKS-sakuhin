<?php
require_once('functions.php');
session_start();
session_regenerate_id(true);

$dbh = connectDB();
$dbh->exec("USE nksdb");

$userid = htmlspecialchars($_POST['userid']);
$password = htmlspecialchars($_POST['password']);
$url = "login.php?error=e1";
$name = "";
$sql = "SELECT * from userdata;";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$login = $stmt->fetchall(PDO::FETCH_ASSOC);
for($i = 0;$i < count($login); $i++){
    if($login[$i]['userid'] === $userid){
        $url = "login.php?error=e2";
        if($login[$i]["password"] === $password){
            $name = $login[$i];
            $url = "main.php";
            break;
        }
    }
}

$dbh = NULL;
$_SESSION["NAME"] = $name;
header('Location: '.$url);
exit();
