<?php
/* The Database connection details */
$host = 'localhost:3307';
$user = 'root';
$pass = '';
$db = 'metagolweb';
$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);
?>