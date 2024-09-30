<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>

<main>
    <div class="d-flex min-vh-100 align-items-center justify-content-center py-4 px-4">
        <div class="w-100" style="max-width: 400px;">
            <div class="text-center mb-4">
                <img class="mx-auto mb-4" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
                    alt="Your Company" style="height: 50px; width: auto;">
                <h2 class="h4 mb-3 font-weight-bold">Log In!</h2>
            </div>

            <form action="/session" method="POST" class="needs-validation" novalidate>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input id="email"
                        name="email"
                        type="email"
                        class="form-control"
                        placeholder="Email address"
                        value="<?= old('email') ?>"
                        required>
                    <div class="invalid-feedback">
                        Please enter a valid email address.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input id="password"
                        name="password"
                        type="password"
                        class="form-control"
                        placeholder="Password"
                        required>
                    <div class="invalid-feedback">
                        Please enter your password.
                    </div>
                </div>

                <div>
                    <button type="submit" class="btn btn-primary w-100">
                        Log In
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