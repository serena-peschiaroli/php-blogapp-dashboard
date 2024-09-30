<?php

use Core\App;
use Core\Database;
use Core\Session;

$db = App::resolve(Database::class);

// Check if the user is authenticated (i.e., if `user_id` is stored in the session)
if (Session::has('user')) {
    // Get the current user's ID from the session
    $currentUserId = $_SESSION['user']['id'];

    // Fetch only the posts where the author_id matches the current user's ID
    $posts = $db->query("SELECT * FROM posts WHERE author_id = :author_id", [
        'author_id' => $currentUserId
    ])->get();
} else {
    // If the user is not authenticated, fetch all posts
    $posts = $db->query("SELECT posts.*, authors.last_name
        FROM posts
        JOIN authors ON posts.author_id = authors.id")->get();
}

// Pass the posts to the view
view("posts/index.view.php", [
    'heading' => 'Posts',
    'posts' => $posts
]);
