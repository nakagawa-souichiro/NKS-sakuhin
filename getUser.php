<?php
function getUser($i){
    require_once ('functions.php');
    $dbh = connectDB();
    $dbh->exec("USE nksdb");
    $sql = "SELECT * FROM userdata WHERE id = '" .$i."' ORDER BY userid ASC";
    $prepare = $dbh->prepare($sql);
    $prepare->execute();
    $result = $prepare->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION['user'] = $result;
    $dbh = NULL;
}