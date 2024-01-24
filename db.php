<?php 
  $dsn = "mysql:host=localhost;dbname=eventsy";
  $username = "root";
  $password = "root";

  try {
    $db = new PDO($dsn, $username, $password);
  } catch (PDOException $e) {
    $error_message = $e->getMessage();
    echo "Error: " . $error_message;
    exit();
  }