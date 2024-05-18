<?php
$heading = 'Register';

$username = '';
$password = '';
$role = 'user';
$errorMessage = '';
$successMessage = '';

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

            // check if username  exists
            $statement = $pdo->prepare('SELECT * FROM users WHERE username = :username');
            $statement->bindValue(':username', $username);
            $statement->execute();
            $existingUser = $statement->fetch(PDO::FETCH_ASSOC);

            if ($existingUser) {
                $errorMessage = 'Username already exists';
            } else {
                // has the password before storing it
                $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
                $statement = $pdo->prepare('INSERT INTO users (username, password, role) VALUES (:username, :password, :role)');
                $statement->bindValue(':username', $username);
                $statement->bindValue(':password', $hashedPassword);
                $statement->bindValue(':role', $role);
                $statement->execute();

                $successMessage = 'Registration successful! You can now log in.';
            }
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }
}

require '../../views/auth/register-user.view.php';
