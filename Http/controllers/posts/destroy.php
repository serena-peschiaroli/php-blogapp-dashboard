<?php

use Core\App;
use Core\Database;
use Core\Session;

$db = App::resolve(Database::class);

$currentUserId = Session::get('user')['id'];

$post = $db->query('SELECT * from posts WHERE id = :id', [
    'id' => $_POST['id']
])->findOrFail();

authorize($post['author_id'] === $currentUserId);

$db->query('DELETE from posts WHERE id = :id', [
    'id' => $_POST['id']
]);

header('location: /posts');
exit();
