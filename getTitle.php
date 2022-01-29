<?php
function getTitle(){
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
function getTitle2($eUser){
    require_once 'functions.php';
    $dbh = connectDB();
    $dbh->exec("USE nksdb");
    $sql = "SELECT * FROM media WHERE userid = '" .$eUser."' ORDER BY id";
    $prepare = $dbh->prepare($sql);
    $prepare->execute();
    $result = $prepare->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION['title'] = $result;
    $dbh = NULL;
}
function getTitle3($id){
    $catId = $_SESSION['catId'];
    require_once 'functions.php';
    $dbh = connectDB();
    $dbh->exec("USE nksdb");
    $sql = "SELECT * FROM media WHERE listid = '" .$catId."'and id < '" .$id."' ORDER BY id DESC";
    $prepare = $dbh->prepare($sql);
    $prepare->execute();
    $result = $prepare->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION['oldTitle'] = $result;
    $dbh = NULL;
}
function getTitle4($id){
    $catId = $_SESSION['catId'];
    require_once 'functions.php';
    $dbh = connectDB();
    $dbh->exec("USE nksdb");
    $sql = "SELECT * FROM media WHERE  listid = '" .$catId."' and id > '" .$id."' ORDER BY id";
    $prepare = $dbh->prepare($sql);
    $prepare->execute();
    $result = $prepare->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION['newTitle'] = $result;
    $dbh = NULL;
}