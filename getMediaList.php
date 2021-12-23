<?php
function getMediaList(){
    require_once ('functions.php');
    $dbh = connectDB();
    $dbh->exec("USE nksdb");
    $sql = 'SELECT * FROM medialist ORDER BY listid ASC';
    $prepare = $dbh->prepare($sql);
    $prepare->execute();
    $result = $prepare->fetchall(PDO::FETCH_ASSOC);
    $_SESSION['list'] = $result;
    $dbh = NULL;
}