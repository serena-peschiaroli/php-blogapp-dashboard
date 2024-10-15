<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

<main>

    <div class="container my-5">
        <a href="/posts" class="btn btn-success mt-3 mb-5">Back</a>
        <h1 class="mb-4"><?= $post['title'] ?></h1>
        <p class="mb-4">By <?= $post['last_name'] ?></p>

        <p><?= $post['body'] ?></p>
        <small class="text-muted">Posted on <?= date('d-m-y', strtotime($post['created_at'])) ?></small>
    </div>
</main>

<?php require base_path('views/partials/footer.php') ?>