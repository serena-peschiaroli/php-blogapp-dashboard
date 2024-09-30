<?php require(__DIR__ . '/../partials/head.php'); ?>
<?php require(__DIR__ . '/../partials/nav.php'); ?>
<?php require(__DIR__ . '/../partials/banner.php'); ?>

<main>

    <div class="container my-5">
        <a href="/" class="btn btn-success mt-3 mb-5">Back</a>
        <h1 class="mb-4"><?= $post['title'] ?></h1>
        <p class="mb-4">By <?= $post['username'] ?></p>
        <p><strong>Categories:</strong> <?= (implode(', ', $categories)) ?></p>
        <p><?= $post['body'] ?></p>
        <small class="text-muted">Posted on <?= $post['created_at'] ?></small>
    </div>
</main>

<?php require('./views/partials/footer.php'); ?>