<?php
function getUser(){
    require_once ('functions.php');
    $dbh = connectDB();
    $dbh->exec("USE nksdb");
    $sql = 'SELECT * FROM userdata ORDER BY userid ASC';
    $prepare = $dbh->prepare($sql);
    $prepare->execute();
    $result = $prepare->fetchall(PDO::FETCH_ASSOC);
    $_SESSION['user'] = $result;
    $dbh = NULL;
}