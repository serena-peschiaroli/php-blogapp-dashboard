<?php

// Ensure the ID is provided
if (!isset($_GET['id'])) {
    die('Post ID not provided');
}

$post_id = $_GET['id'];

try {
    $pdo = new PDO($dsn, $username, $password);

    // Fetch the post along with the author's username
    $query = "
        SELECT posts.*, authors.username 
        FROM posts 
        JOIN authors ON posts.author_id = authors.id
        WHERE posts.id = :id
    ";
    $statement = $pdo->prepare($query);
    $statement->execute(['id' => $post_id]);
    $post = $statement->fetch(PDO::FETCH_ASSOC);

    if (!$post) {
        die('Post not found');
    }

    // Prepare data to pass to the view
    $data = [
        'post' => $post
    ];

    require '../views/posts/show.view.php';
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
