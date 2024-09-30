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
            <ul class="navbar-nav ms-auto">
                <?php if ($_SESSION['user'] ?? false) : ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="Profile" class="rounded-circle" width="30" height="30">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="#">Your Profile</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form method="POST" action="/session">
                                    <input type="hidden" name="_method" value="DELETE" />
                                    <button class="dropdown-item">Log Out</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                <?php else : ?>
                    <li class="nav-item">
                        <a class="nav-link <?= urlIs('/register') ? 'active' : '' ?>" href="/register">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= urlIs('/login') ? 'active' : '' ?>" href="/login">Log In</a>
                    </li>
                <?php endif ?>
            </ul>
        </div>
    </div>
</nav>