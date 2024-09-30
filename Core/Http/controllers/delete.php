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

        // start transaction
        $pdo->beginTransaction();

        // prepare delete for the pivot table
        $statement = $pdo->prepare("DELETE FROM category_post WHERE post_id = :id");
        $statement->bindValue(':id', $id);
        $statement->execute();

        // prepare delete statement for the post
        $statement = $pdo->prepare("DELETE FROM posts WHERE id = :id");
        $statement->bindValue(':id', $id);
        $statement->execute();

        // check if any row was actually deleted
        if ($statement->rowCount() == 0) {
            $pdo->rollBack();
            die('Post not found or already deleted');
        }

        // commit the transaction
        $pdo->commit();

        // redirect to home
        header("Location: /");
        exit;
    } catch (PDOException $e) {
        $pdo->rollBack();
        echo "Connection failed: " . $e->getMessage();
    }
}
require './views/posts/index.view.php';