<?php

$heading = 'Update Post';

$title = "";
$authorId = "";
$body = "";
$errorMessage = "";
$successMessage = "";
$categories = [];
$selectedCategories = [];

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    if (!isset($_GET["id"])) {
        header('location: /');
        exit;
    }

    $id = $_GET["id"];

    try {
        $dsn = "mysql:host=localhost;port=3306;dbname=blog_app;charset=utf8mb4";
        $username = "root";
        $password = "root";
        $pdo = new PDO($dsn, $username, $password);

        // Fetch post details
        $statement = $pdo->prepare("SELECT posts.*, users.username FROM posts JOIN users ON posts.author_id = users.id WHERE posts.id = :id AND users.role = 'author'");
        $statement->bindValue(':id', $id);
        $statement->execute();
        $post = $statement->fetch(PDO::FETCH_ASSOC);

        if (!$post) {
            die('Post not found');
        }

        $title = $post['title'];
        $authorId = $post['author_id'];
        $body = $post['body'];

        // Fetch authors
        $statement = $pdo->query("SELECT * FROM users WHERE role = 'author'");
        $authors = $statement->fetchAll(PDO::FETCH_ASSOC);

        // Fetch categories
        $statement = $pdo->query("SELECT * FROM categories");
        $categories = $statement->fetchAll(PDO::FETCH_ASSOC);

        // Fetch selected categories for the post
        $statement = $pdo->prepare("SELECT category_id FROM category_post WHERE post_id = :id");
        $statement->bindValue(':id', $id);
        $statement->execute();
        $selectedCategories = $statement->fetchAll(PDO::FETCH_COLUMN);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = $_POST["id"];
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

            // start transaction
            $pdo->beginTransaction();

            // update post 
            $statement = $pdo->prepare("UPDATE posts SET title = :title, author_id = :author_id, body = :body WHERE id = :id");
            $statement->bindValue(':title', $title);
            $statement->bindValue(':author_id', $authorId);
            $statement->bindValue(':body', $body);
            $statement->bindValue(':id', $id);
            $statement->execute();

            // update categories in pivot table
            // delete existing categories for the post
            $statement = $pdo->prepare("DELETE FROM category_post WHERE post_id = :id");
            $statement->bindValue(':id', $id);
            $statement->execute();

            // isnert new categories for the post
            foreach ($categories as $category_id) {
                $statement = $pdo->prepare("INSERT INTO category_post (post_id, category_id) VALUES (:post_id, :category_id)");
                $statement->bindValue(':post_id', $id);
                $statement->bindValue(':category_id', $category_id);
                $statement->execute();
            }

            // commit  transaction
            $pdo->commit();

            $successMessage = "Post updated successfully!";
        } catch (PDOException $e) {
            $pdo->rollBack();
            echo "Connection failed: " . $e->getMessage();
        }
    }
}

// fetch authors and categories 
if ($_SERVER['REQUEST_METHOD'] == 'POST' || ($_SERVER['REQUEST_METHOD'] == 'GET' && empty($errorMessage))) {
    try {
        $statement = $pdo->query("SELECT * FROM users WHERE role = 'author'");
        $authors = $statement->fetchAll(PDO::FETCH_ASSOC);

        $statement = $pdo->query("SELECT * FROM categories");
        $categories = $statement->fetchAll(PDO::FETCH_ASSOC);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // fetch selected categories for the post
            $statement = $pdo->prepare("SELECT category_id FROM category_post WHERE post_id = :id");
            $statement->bindValue(':id', $id);
            $statement->execute();
            $selectedCategories = $statement->fetchAll(PDO::FETCH_COLUMN);
        }
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}

require './views/posts/edit-post.view.php';
