<?php require(__DIR__ . '/../partials/head.php'); ?>
<?php require(__DIR__ . '/../partials/nav.php'); ?>
<?php require(__DIR__ . '/../partials/banner.php'); ?>

<main>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h2>Register as Author</h2>
                    </div>
                    <div class="card-body">
                        <?php if (!empty($errorMessage)) : ?>
                            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                <?= htmlspecialchars($errorMessage) ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($successMessage)) : ?>
                            <div style="color: green;">
                                <?= htmlspecialchars($successMessage) ?>
                            </div>
                        <?php endif; ?>
                        <form method="POST" action="/controllers/auth/register-author.php">
                            <input type="hidden" name="role" value="author">
                            
                            <div class="mb-3">
                                <label for="first_name" class="form-label">First Name</label>
                                <input type="text" class="form-control" name="first_name" id="first_name" value="<?=($firstName) ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="last_name" class="form-label">Last Name</label>
                                <input type="text" class="form-control" name="last_name" id="last_name" value="<?=($lastName) ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" id="email" value="<?=($email) ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" id="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>









<?php require('./views/partials/footer.php'); ?>