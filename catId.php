<?php
session_start();
$_SESSION["catId"] = $_GET["id"];
header("Location: titleList.php");
exit();