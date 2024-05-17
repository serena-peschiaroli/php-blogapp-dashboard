<?php require('./views/partials/head.php'); ?>
<?php require('./views/partials/nav.php'); ?>
<?php require('./views/partials/banner.php'); ?>

<main>
    <div class="container my-5">
        <h1 class="mb-4"><?= $post['title'] ?></h1>
        <p class="mb-4">By <?= $post['username'] ?></p>
        <p><?= $post['body'] ?></p>
        <small class="text-muted">Posted on <?= $post['created_at'] ?></small>
    </div>
</main>

<?php require('./views/partials/footer.php'); ?>