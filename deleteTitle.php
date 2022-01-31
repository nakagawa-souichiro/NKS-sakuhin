<?php
require_once ('functions.php');
$dbh = connectDB();
$dbh->exec("USE nksdb");
$sql = ("DELETE FROM media WHERE id = '" .$_POST["id"]."'");
$prepare = $dbh->prepare($sql);
$prepare->execute();
$dbh = NULL;
header("Location: userList.php");
exit();