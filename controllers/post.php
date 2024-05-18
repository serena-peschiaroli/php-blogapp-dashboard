<?php

$heading = 'Post';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // GET: Show data
    if (!isset($_GET["id"])) {
        header("Location: /");
        exit;
    }

    $id = $_GET["id"];

    try {
        $dsn = "mysql:host=localhost;port=3306;dbname=blog_app;charset=utf8mb4";
        $username = "root";
        $password = "root";
        $pdo = new PDO($dsn, $username, $password);

        // Fetch post details along with author
        $statement = $pdo->prepare("SELECT posts.*, authors.username FROM posts JOIN authors ON posts.author_id = authors.id WHERE posts.id = :id");
        $statement->bindValue(':id', $id);
        $statement->execute();
        $post = $statement->fetch(PDO::FETCH_ASSOC);

        if (!$post) {
            die('Post not found');
        }

        // Fetch selected categories for the post
        $statement = $pdo->prepare("SELECT categories.name FROM categories JOIN category_post ON categories.id = category_post.category_id WHERE category_post.post_id = :id");
        $statement->bindValue(':id', $id);
        $statement->execute();
        $categories = $statement->fetchAll(PDO::FETCH_COLUMN);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}

require './views/posts/post.view.php';
