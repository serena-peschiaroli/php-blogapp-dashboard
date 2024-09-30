<?php

use Core\App;
use Core\Database;
use Core\Validator;
use Core\Session;

$db = App::resolve(Database::class);

$currentUserId = Session::get('user_id');

// find the corresponding note
$post = $db->query('select * from posts where id = :id', [
    'id' => $_POST['id']
])->findOrFail();

// authorize that the current user can edit the note
authorize($post['author_id'] === $currentUserId);

// validate the form
$errors = [];

if (! Validator::string($_POST['title'], 1, 100)) {
    $errors['body'] = 'A title of no more than 100 characters is required.';
}

if (! Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = 'A body of no more than 1,000 characters is required.';
}

// if no validation errors, update the record in the notes database table.
if (count($errors)) {
    return view('notes/edit.view.php', [
        'heading' => 'Edit Post',
        'errors' => $errors,
        'post' => $post
    ]);
}

$db->query('update posts set title = :title, body = :body where id = :id', [
    'id' => $_POST['id'],
    'title' => $_POST['title'],
    'body' => $_POST['body']
]);

// redirect the user
header('location: /posts');
die();
