<?php
require_once('functions.php');

$dbh = connectDB();
$dbh->exec("USE nksdb");
$id = $_GET['id'];
$sql = 'SELECT * FROM media WHERE id=:id;';
$prepare = $dbh->prepare($sql);
$prepare->bindValue(':id',$id,PDO::PARAM_INT);
$prepare->execute();
$result = $prepare->fetchAll(PDO::FETCH_ASSOC);
session_start();
$_SESSION['media'] = $result;
$dbh = NULL;
header('Location: read.php?id='.$_GET['id']);
exit();
?>