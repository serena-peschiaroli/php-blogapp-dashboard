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
        $statement = $pdo->prepare("SELECT posts.*, authors.username FROM posts JOIN authors ON posts.author_id = authors.id WHERE posts.id = :id");
        $statement->bindValue(':id', $id);
        $statement->execute();
        $post = $statement->fetch(PDO::FETCH_ASSOC);

        if (!$post) {
            die('Post not found');
        }

        // Prepare data to pass to the view
        $data = [
            'post' => $post
        ];

        require './views/posts/post.view.php';
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
