<?php
function getTitle(){
    require_once 'functions.php';
    $dbh = connectDB();
    $dbh->exec("USE nksdb");
    $sql = 'SELECT * FROM media ORDER BY id';
    $prepare = $dbh->prepare($sql);
    $prepare->execute();
    $result = $prepare->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION['title'] = $result;
    $dbh = NULL;
}