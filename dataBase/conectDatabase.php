<?php 
  $host = 'localhost';
  $db = 'PRODUCT_LIST';
  $user = 'root';
  $pass = 'Odeiobancodedados';
  $dsn = "mysql:host=$host;dbname=$db;charset=utf8";

  $pdo = new PDO($dsn, $user, $pass);
?>