<?php
session_start();
header("Content-Type:".'video/mp4');
echo($_SESSION['media'][0]['raw_data']);
?>