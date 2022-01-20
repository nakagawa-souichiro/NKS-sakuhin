<?php
function getTitle(){
    session_start();
    $catId = $_SESSION['catId'];
    require_once 'functions.php';
    $dbh = connectDB();
    $dbh->exec("USE nksdb");
    $sql = "SELECT * FROM media WHERE listid = '" .$catId."' ORDER BY id";
    $prepare = $dbh->prepare($sql);
    $prepare->execute();
    $result = $prepare->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION['title'] = $result;
    $dbh = NULL;
}