<?php
// データベースに接続
function connectDB() {
    $param = 'mysql:dbname=nksdb;host=localhost';
    try {
        $pdo = new PDO($param, 'root', '');
        return $pdo;

    } catch (PDOException $e) {
        exit($e->getMessage());
    }
}
?>