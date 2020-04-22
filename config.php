<?php
/* Database connection settings */
$host = 'localhost';
$user = 'root';
$pass = 'roble';
$db = 'bike';
$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);
$conn = new mysqli($host, $user, $pass, $db);
