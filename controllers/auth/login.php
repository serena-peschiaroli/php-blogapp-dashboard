<?php
session_start();

$heading = 'Login';

$username = '';
$password = '';
$errorMessage = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        $errorMessage = 'All fields are required';
    } else {
        try {
            $dsn = 'mysql:host=localhost;port=3306;dbname=blog_app;charset=utf8mb4';
            $dbUsername = 'root';
            $dbPassword = 'root';
            $pdo = new PDO($dsn, $dbUsername, $dbPassword);

            $statement = $pdo->prepare('SELECT * FROM users WHERE username = :username');
            $statement->bindValue(':username', $username);
            $statement->execute();
            $user = $statement->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password'])) {
                //  if password is correct start a session
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];
                header('Location: /');
                exit;
            } else {
                $errorMessage = 'Invalid username or password';
            }
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }
}

require './views/login.view.php';
