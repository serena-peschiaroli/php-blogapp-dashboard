<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$currentUserId = 1;

$post = $db->query('select * from posts where id = :id', [
    'id' => $_GET['id']
])->findOrFail();

authorize($post['author_id'] === $currentUserId);

view("posts/show.view.php", [
    'heading' => 'Post',
    'post' => $post
]);
