<?php require(__DIR__ . '/../partials/head.php'); ?>
<?php require(__DIR__ . '/../partials/nav.php'); ?>
<?php require(__DIR__ . '/../partials/banner.php'); ?>

<main>



    <div class="container my-5">
        <a href="/" class="btn btn-success mt-3 mb-5">Back</a>
        <?php if (!empty($errorMessage)) : ?>
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <?= $errorMessage ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($successMessage)) : ?>
            <div style="color: green;">
                <?= $successMessage ?>
            </div>
        <?php endif; ?>

        <form method="POST">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" for="title">Title:</label>
                <div class="col-sm-6">
                    <input type=" text" class="form-control" name=" title" id="title" value="<?= $title ?>">
                </div>

            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" for="author_id">Author ID:</label>
                <div class="col-sm-6">
                    <input type="text" name="author_id" class="form-control" id="author_id" value="<?= $authorId ?>">

                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" for="body">Body:</label>
                <div class="col-sm-6">
                    <textarea class="form-control" name="body" id="body"><?= $body ?></textarea>
                </div>

            </div>
            <?php if (!empty($successMessage)) : ?>
                <div class='alert alert-success alert-dismissible fade show' role='alert'>
                    <?= $successMessage ?>
                </div>
            <?php endif; ?>
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="/" role="button">Cancel</a>
                </div>
            </div>
        </form>

    </div>

</main>

<?php
require(__DIR__ . '/../partials/footer.php');

?>