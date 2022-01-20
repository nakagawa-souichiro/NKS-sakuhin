<?php
require_once('functions.php');
$userid = htmlspecialchars($_POST['userid']);
$address = htmlspecialchars($_POST['address']);
$dbh = connectDB();
$sql = "SELECT * from userdata;";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$login = $stmt->fetchall(PDO::FETCH_ASSOC);
for($i = 0;$i < count($login); $i++){
    if($login[$i]['userid'] === $userid){
        header('Location: signUp.php?error='."e1");
        exit();
    }
}
for($i = 0;$i < count($login); $i++){
    if($login[$i]['address'] === $address){
        header('Location: signUp.php?error='."e2");
        exit();
    }
}
$stmt = $dbh->prepare("INSERT INTO userdata (userid, password, name, address)VALUES(:userid,:password,:name,:address)");
$stmt->bindParam(':userid', $userid);
$stmt->bindParam(':password', htmlspecialchars($_POST['password']));
$stmt->bindParam(':name', htmlspecialchars($_POST['name']));
$stmt->bindParam(':address', $address);
//$stmt->bindParam(':tel', $_POST['tel']);
$stmt->execute();
header('Location: result.php?result='."r1");
exit();
?>