<?php require('partials/head.php') ?>
<?php require('partials/nav.php') ?>
<?php require('partials/banner.php') ?>

<main>
    
    <div class="container my-5">
        <h1 class="mb-4">Blog Posts</h1>
        <?php if (!empty($posts)) : ?>
            <div class="list-group">
                <?php foreach ($posts as $post) : ?>
                    <a href="post.php?id=<?= $post['id'] ?>" class="list-group-item list-group-item-action">
                        <h5 class="mb-1"><?= ($post['title']) ?></h5>
                        <p class="mb-1"><?= ($post['author_id']) ?></p>
                        <p class="mb-1"><?= ($post['body']) ?></p>
                        <small>Posted on <?= ($post['created_at']) ?></small>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php else : ?>
            <p class="text-muted">No posts available.</p>
        <?php endif; ?>
    </div>
</main>

<?php require('partials/footer.php') ?>