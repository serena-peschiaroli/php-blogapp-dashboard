<?php

use Core\App;
use Core\Validator;
use Core\Database;

$db = App::resolve(Database::class);
$errors = [];

if (! Validator::string($_POST['title'], 1, 100)) {
    $errors['body'] = 'A body of no more than 100 characters is required.';
}

if (! Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = 'A body of no more than 1,000 characters is required.';
}

if (! empty($errors)) {
    return view("notes/create.view.php", [
        'heading' => 'Create Post',
        'errors' => $errors
    ]);
}

$db->query('INSERT INTO post(title,body, author_id) VALUES(:title, :body, :author_id)', [
    'title'=>$_POST['title'],
    'body' => $_POST['body'],
    'user_id' => 1
]);

header('location: /posts');
die();

