<?php
$heading = 'Register Author';

$username = '';
$password = '';
$firstName = '';
$lastName = '';
$email = '';
$role = 'author';
$errorMessage = '';
$successMessage = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];

    if (empty($email) || empty($password) || empty($username)) {
        $errorMessage = 'Email, username, and password fields are required';
    } else {
        try {
            $dsn = 'mysql:host=localhost;port=3306;dbname=blog_app;charset=utf8mb4';
            $dbUsername = 'root';
            $dbPassword = 'root';
            $pdo = new PDO($dsn, $dbUsername, $dbPassword);

            // check if email  exists
            $statement = $pdo->prepare('SELECT * FROM users WHERE email = :email');
            $statement->bindValue(':email', $email);
            $statement->execute();
            $existingUser = $statement->fetch(PDO::FETCH_ASSOC);

            if ($existingUser) {
                $errorMessage = 'Email already exists';
            } else {
                // hashing password
                $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
                $statement = $pdo->prepare('INSERT INTO users (username, password, role, email, first_name, last_name) VALUES (:username, :password, :role, :email, :first_name, :last_name)');
                $statement->bindValue(':username', $username);
                $statement->bindValue(':last_name', $lastName);
                $statement->bindValue(':first_name', $firstName);
                $statement->bindValue(':email', $email);
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


require '../../views/auth/register-author.view.php';;
