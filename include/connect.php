<?php

/*CREATE USER 'iNote'@'localhost' IDENTIFIED VIA mysql_native_password USING '***';GRANT USAGE ON *.* TO 'iNote'@'localhost' REQUIRE NONE WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;CREATE DATABASE IF NOT EXISTS `iNote`;GRANT ALL PRIVILEGES ON `iNote`.* TO 'iNote'@'localhost'; */

$servername = "localhost";
$username = "iNote";
$password = "password";

try {
  $conn = new PDO("mysql:host=$servername;dbname=iNote", $username, $password);
} 
catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?> 
