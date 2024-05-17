<?php


$heading = 'New Post';

$title = "";
$authorId = "";
$body = "";
$errorMessage = "";
$successMessage = "";


require './views/posts/new-post.view.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST["title"];
    $authorId = $_POST["author_id"];
    $body = $_POST["body"];

    do {
        if (empty($title) || empty($authorId) || empty($body)) {
            $errorMessage = "All fields are required";
            break;
        }

        // Insert new post into the database
        $dsn = "mysql:host=localhost;port=3306;dbname=blog_app;charset=utf8mb4";
        $username = "root";
        $password = "root";

        try {
            $pdo = new PDO($dsn, $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $statement = $pdo->prepare("INSERT INTO posts (title, author_id, body) VALUES (:title, :author_id, :body)");
            $statement->bindValue(':title', $title);
            $statement->bindValue(':author_id', $authorId);
            $statement->bindValue(':body', $body);
            $statement->execute();

            $title = "";
            $authorId = "";
            $body = "";

            $successMessage = "Post added successfully";

            
        } catch (PDOException $e) {
            $errorMessage = "Connection failed: " . $e->getMessage();
        }
    } while (false);




   
}
