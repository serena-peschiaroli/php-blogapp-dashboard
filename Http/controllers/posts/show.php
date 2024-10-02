<?php

use Core\App;
use Core\Database;
use Core\Session;

$db = App::resolve(Database::class);

if (Session::has('user')) {

    $currentUserId = $_SESSION['user']['id'];

    $post = $db->query(
        '
        SELECT posts.*, authors.first_name, authors.last_name 
        FROM posts 
        JOIN authors ON posts.author_id = authors.id 
        WHERE posts.id = :id',
        ['id' => $_GET['id']]
    )->findOrFail();

    authorize($post['author_id'] === $currentUserId);
} else {
    $post = $db->query(
        '
        SELECT posts.*, authors.first_name, authors.last_name 
        FROM posts 
        JOIN authors ON posts.author_id = authors.id 
        WHERE posts.id = :id',
        ['id' => $_GET['id']]
    )->findOrFail();
}

view("posts/show.view.php", [
    'heading' => 'Post',
    'post' => $post
]);

