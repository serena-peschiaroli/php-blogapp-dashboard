<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require 'functions.php';
require 'router.php';


// pdo for sql database connecting 


$dsn = "mysql:host=localhost;port=3306;dbname=blog_app;charset=utf8mb4";
$username = 'root'; 
$password = 'root';     

try {
    $pdo = new PDO($dsn, $username, $password);

    $statement = $pdo->prepare("SELECT * FROM post");
    $statement->execute();

    $posts = $statement->fetchAll();

    // Use $post as needed
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
