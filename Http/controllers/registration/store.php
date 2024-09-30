<?php

use Core\App;
use Core\Authenticator;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];
$firstName = $_POST['first_name'];
$lastName = $_POST['last_name'];

$errors = [];

// Validate email
if (!Validator::email($email)) {
    $errors['email'] = 'Please provide a valid email address.';
}

// Validate password
if (!Validator::string($password, 7, 255)) {
    $errors['password'] = 'Please provide a password of at least seven characters.';
}

// Validate first name and last name
if (!Validator::string($firstName, 1, 50)) {
    $errors['first_name'] = 'Please provide a valid first name.';
}

if (!Validator::string($lastName, 1, 50)) {
    $errors['last_name'] = 'Please provide a valid last name.';
}

// If validation fails, return to the view with errors
if (!empty($errors)) {
    return view('registration/create.view.php', [
        'errors' => $errors,
        'email' => $email,
        'first_name' => $firstName,
        'last_name' => $lastName
    ]);
}

// Check if the user already exists
$user = $db->query('SELECT * FROM authors WHERE email = :email', [
    'email' => $email
])->find();

if ($user) {
    // User already exists
    header('location: /');
    exit();
} else {
    // Insert new user into the database
    $db->query('INSERT INTO authors (first_name, last_name, email, password) VALUES (:first_name, :last_name, :email, :password)', [
        'first_name' => $firstName,
        'last_name' => $lastName,
        'email' => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT)
    ]);

    $newUser = $db->query('SELECT * FROM authors WHERE email = :email', [
        'email' => $email
    ])->find();

    // Log in
    (new Authenticator)->login([
        'id' => $newUser['id'],   // Pass the id (author_id) to interact wsith post table
        'email' => $newUser['email']
    ]);

    // Redirect 
    header('location: /');
    exit();
}
