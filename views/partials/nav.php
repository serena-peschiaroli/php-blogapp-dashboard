<?php

$config = require __DIR__ . '/../../config.php';
$logoImagePath = $config['logo_image_path'];
$avatarImagePath = $config['author_avatar'];
?>

<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="<?= $logoImagePath ?> " alt="Your Company" class="d-inline-block align-text-top" style="height: 2rem;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a class="nav-link <?= urlIs('/') ? 'active' : '' ?>" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= urlIs('/about') ? 'active' : '' ?>" href="/about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= urlIs('/contact') ? 'active' : '' ?>" href="/contact">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= urlIs('/mission') ? 'active' : '' ?>" href="/mission">Our Mission</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="<?= $avatarImagePath ?>" alt="" class="rounded-circle" style="height: 2rem;">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Your Profile</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Sign out</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <button class="btn btn-dark btn-sm position-relative">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                        </svg>
                    </button>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Mobile menu -->
<div class="d-md-none bg-dark">
    <div class="container">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link text-white <?= urlIs('/') ? 'active' : '' ?>" href="/">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white <?= urlIs('/about') ? 'active' : '' ?>" href="/about">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white <?= urlIs('/contact') ? 'active' : '' ?>" href="/contact">Contact</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white <?= urlIs('/mission') ? 'active' : '' ?>" href="/mission">Our Mission</a>
            </li>
        </ul>
        <div class="border-top border-secondary my-3"></div>
        <div class="d-flex align-items-center">
            <img class="rounded-circle me-2" src="<?= $avatarImagePath ?>" alt="" style="height: 2.5rem;">
            <div>
                <div class="text-white">John Doe</div>
                <div class="text-muted">johndoe@example.com</div>
            </div>
            <button class="btn btn-dark btn-sm ms-auto">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                </svg>
            </button>
        </div>
        <ul class="nav flex-column mt-3">
            <li class="nav-item">
                <a class="nav-link text-muted" href="#">Your Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-muted" href="#">Settings</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-muted" href="#">Sign out</a>
            </li>
        </ul>
    </div>
</div>