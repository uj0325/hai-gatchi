<?php 
$dsn = 'mysql:dbname=gatti;host=localhost';
$user = 'root';
$password = '';
$dbh = new PDO($dsn,$user,$password);
$dbh -> query('SET NAMES utf8');
?>