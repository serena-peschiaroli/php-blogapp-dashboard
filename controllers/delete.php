<?php

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

        // Start a transaction
        $pdo->beginTransaction();

        // Prepare the DELETE statement for the pivot table
        $statement = $pdo->prepare("DELETE FROM category_post WHERE post_id = :id");
        $statement->bindValue(':id', $id);
        $statement->execute();

        // Prepare the DELETE statement for the post
        $statement = $pdo->prepare("DELETE FROM posts WHERE id = :id");
        $statement->bindValue(':id', $id);
        $statement->execute();

        // Check if any row was actually deleted
        if ($statement->rowCount() == 0) {
            $pdo->rollBack();
            die('Post not found or already deleted');
        }

        // Commit the transaction
        $pdo->commit();

        // Redirect to the list of posts or a confirmation page
        header("Location: /");
        exit;
    } catch (PDOException $e) {
        $pdo->rollBack();
        echo "Connection failed: " . $e->getMessage();
    }
}
require './views/posts/index.view.php';