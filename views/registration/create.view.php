<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>

<main>
    <div class="d-flex min-vh-100 align-items-center justify-content-center py-4 px-4">
        <div class="w-100" style="max-width: 400px;">
            <div class="text-center mb-4">

                <h2 class="h4 mb-3 font-weight-bold">Register for a new account</h2>
            </div>

            <form class="needs-validation" action="/register" method="POST" novalidate>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input id="email" name="email" type="email" autocomplete="email" required
                        class="form-control"
                        placeholder="Your email">
                    <div class="invalid-feedback">
                        Please enter a valid email address.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="first_name" class="form-label">First Name</label>
                    <input id="first_name" name="first_name" type="text" required
                        class="form-control"
                        placeholder="Your first name">
                </div>
                <div class="mb-3">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input id="last_name" name="last_name" type="text" required
                        class="form-control"
                        placeholder="Your last name">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input id="password" name="password" type="password" autocomplete="current-password" required
                        class="form-control"
                        placeholder="Choose a password">
                    <div class="invalid-feedback">
                        Please enter a password.
                    </div>
                </div>

                <div>
                    <button type="submit"
                        class="btn btn-primary w-100">
                        Register
                    </button>
                </div>

                <ul class="mt-3 list-unstyled">
                    <?php if (isset($errors['email'])) : ?>
                        <li class="text-danger small"><?= $errors['email'] ?></li>
                    <?php endif; ?>

                    <?php if (isset($errors['password'])) : ?>
                        <li class="text-danger small"><?= $errors['password'] ?></li>
                    <?php endif; ?>
                </ul>
            </form>
        </div>
    </div>
</main>

<?php require base_path('views/partials/footer.php') ?>