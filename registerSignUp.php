<?php

$dsn='mysql:host=localhost;dbname=nksdb;charset=utf8';
$user='root';
$password='';
$result = "";
if (isset($_POST['id'])) {
    $result = "登録しました";
}
echo $result;
$dbh = new PDO($dsn,$user,$password);
$stmt = $dbh->prepare("INSERT INTO userdata (userid, password, name, address)VALUES(:userid,:password,:name,:address)");
$stmt->bindParam(':userid', $_POST['userid']);
$stmt->bindParam(':password', $_POST['password']);
$stmt->bindParam(':name', $_POST['name']);
$stmt->bindParam(':address', $_POST['address']);
//$stmt->bindParam(':tel', $_POST['tel']);
$stmt->execute();
header('Location: index.php');
exit();
?>
