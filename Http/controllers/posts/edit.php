<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$currentUserId = $_SESSION['user']['id'];


$post = $db->query('select * from posts where id = :id', [
    'id' => $_GET['id']
])->findOrFail();

authorize($post['author_id'] === $currentUserId);

view("posts/show.view.php", [
    'heading' => 'Edit Post',
    'errors' => [],
    'post' => $post
]);
