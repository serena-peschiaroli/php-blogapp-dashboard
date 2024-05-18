<?php

$heading = 'Home';

// pdo for sql database connecting 


$dsn = "mysql:host=localhost;port=3306;dbname=blog_app;charset=utf8mb4";
$username = 'root';
$password = 'root';

try {
    $pdo = new PDO($dsn, $username, $password);

    // modified  query to join posts and authors tables
    $query = "
        SELECT posts.*, users.id as author_id, users.username, users.first_name, users.last_name 
        FROM posts 
        JOIN users ON posts.author_id = users.id
        WHERE users.role = 'author'
    ";

    $statement = $pdo->prepare($query);
    $statement->execute();
    $posts = $statement->fetchAll(PDO::FETCH_ASSOC);

    
    // var_dump($posts); var dump for debug

    
    require './views/index.view.php';
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}






