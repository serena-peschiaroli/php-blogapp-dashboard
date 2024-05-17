<?php

$heading = 'Home';

// pdo for sql database connecting 


$dsn = "mysql:host=localhost;port=3306;dbname=blog_app;charset=utf8mb4";
$username = 'root';
$password = 'root';

try {
    $pdo = new PDO($dsn, $username, $password);

    $statement = $pdo->prepare("SELECT * FROM post");
    $statement->execute();

    $posts = $statement->fetchAll();
    
    // var_dump($posts); var dump for debug 

    // Use $post as needed
    require './views/index.view.php';
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}






