<?php

$heading = 'Create New Post';

$title = "";
$authorId = "";
$body = "";
$errorMessage = "";
$successMessage = "";
$categories = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $title = $_POST["title"];
    $authorId = $_POST["author_id"];
    $body = $_POST["body"];
    $categories = isset($_POST["categories"]) ? $_POST["categories"] : [];

    if (empty($title) || empty($authorId) || empty($body)) {
        $errorMessage = "All fields are required";
    } else {
        try {
            $dsn = "mysql:host=localhost;port=3306;dbname=blog_app;charset=utf8mb4";
            $username = "root";
            $password = "root";
            $pdo = new PDO($dsn, $username, $password);

            // start  transaction
            $pdo->beginTransaction();

            // insert new post
            $statement = $pdo->prepare("INSERT INTO posts (title, author_id, body) VALUES (:title, :author_id, :body)");
            $statement->bindValue(':title', $title);
            $statement->bindValue(':author_id', $authorId);
            $statement->bindValue(':body', $body);
            $statement->execute();

            $postId = $pdo->lastInsertId();

            // insert categories in pivot table
            foreach ($categories as $category_id) {
                $statement = $pdo->prepare("INSERT INTO category_post (post_id, category_id) VALUES (:post_id, :category_id)");
                $statement->bindValue(':post_id', $postId);
                $statement->bindValue(':category_id', $category_id);
                $statement->execute();
            }

            // commit  
            $pdo->commit();

            $successMessage = "Post created successfully!";
        } catch (PDOException $e) {
            $pdo->rollBack();
            echo "Connection failed: " . $e->getMessage();
        }
    }
}

// Fetch authors and categories for form
try {
    $dsn = "mysql:host=localhost;port=3306;dbname=blog_app;charset=utf8mb4";
    $username = "root";
    $password = "root";
    $pdo = new PDO($dsn, $username, $password);

    // Fetch authors with role 'author'
    $statement = $pdo->query("SELECT * FROM users WHERE role = 'author'");
    $authors = $statement->fetchAll(PDO::FETCH_ASSOC);

    // Fetch categories
    $statement = $pdo->query("SELECT * FROM categories");
    $categories = $statement->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

require './views/posts/new-post.view.php';
