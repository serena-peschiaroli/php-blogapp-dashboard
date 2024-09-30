<?php require('partials/head.php') ?>
<?php require('partials/nav.php') ?>

<?php require('partials/banner.php') ?>
<main>
    <div class="container py-3">
        <p>Hello, <?= $_SESSION['user']['email'] ?? 'Guest' ?>. Welcome to the home page.</p>
    </div>
</main>

<?php require('partials/footer.php') ?>