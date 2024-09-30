<?php

$router->get('/', 'index.php');
$router->get('/about', 'about.php');
$router->get('/contact', 'contact.php');

$router->get('/posts', 'posts/index.php');
$router->get('/post', 'posts/show.php');
$router->delete('/post', 'posts/destroy.php')->only('auth');

$router->get('/post/edit', 'posts/edit.php')->only('auth');
$router->patch('/post', 'posts/update.php')->only('auth');

$router->get('/posts/create', 'posts/create.php')->only('auth');
$router->post('/posts', 'posts/store.php');

$router->get('/register', 'registration/create.php')->only('guest');
$router->post('/register', 'registration/store.php')->only('guest');

$router->get('/login', 'session/create.php')->only('guest');
$router->post('/session', 'session/store.php')->only('guest');
$router->delete('/session', 'session/destroy.php')->only('auth');