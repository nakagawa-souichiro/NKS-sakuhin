<?php
session_start();
$_SESSION["eUser"] = $_GET["id"];
header("Location: userList.php");
exit();