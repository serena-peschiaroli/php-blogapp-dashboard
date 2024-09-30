<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">
            <img src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company" width="30" height="30">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-md-0 gap-2">
                <li class="nav-item">
                    <a class="<?= urlIs('/') ? 'nav-link text-white' : 'nav-link active link-secondary' ?> text-decoration-none" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="<?= urlIs('/about.php') ? 'nav-link text-white' : 'nav-link active link-secondary' ?>  text-decoration-none" href="/about.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="<?= urlIs('/contact.php') ? 'nav-link text-white' : 'nav-link active link-secondary' ?>  text-decoration-none" href="/contact.php">Contact</a>
                </li>
            </ul>
            <div class="d-flex">
                <button class="btn btn-dark rounded-circle me-3" type="button">
                    <span class="visually-hidden">View notifications</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                    </svg>
                </button>

                <div class="dropdown">
                    <button class="btn btn-dark dropdown-toggle" type="button" id="userMenu" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="Profile" class="rounded-circle" width="30" height="30">
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userMenu">
                        <li><a class="dropdown-item" href="#">Your Profile</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Sign out</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>

<!-- Mobile menu -->
<div class="d-md-none bg-dark p-3">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link active text-white" href="#">Dashboard</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="#">Team</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="#">Projects</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="#">Calendar</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="#">Reports</a>
        </li>
    </ul>
    <div class="border-top border-light pt-3">
        <div class="d-flex align-items-center">
            <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="Profile" class="rounded-circle" width="40" height="40">
            <div class="ms-3">
                <span class="text-white">Tom Cook</span><br>
                <span class="text-light">tom@example.com</span>
            </div>
            <button class="btn btn-dark ms-auto rounded-circle">
                <span class="visually-hidden">View notifications</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                </svg>
            </button>
        </div>
        <ul class="navbar-nav mt-3">
            <li class="nav-item">
                <a class="nav-link text-white" href="#">Your Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="#">Settings</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="#">Sign out</a>
            </li>
        </ul>
    </div>
</div>