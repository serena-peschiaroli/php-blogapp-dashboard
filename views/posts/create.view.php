<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

<main>



    <div class="container my-5">
        <a href="posts/index" class="btn btn-success mt-3 mb-5">Back</a>


        <form method="POST" action="/posts">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" for="title">Title:</label>
                <div class="col-sm-6">
                    <input type=" text" class="form-control"
                        name=" title"
                        id="title"
                        placeholder="Title of your post...">
                    <?= $_POST['title'] ?? '' ?></input>
                    <?php if (isset($errors['title'])) : ?>
                        <p class="text-danger text-center fs-6"><?= $errors['body'] ?></p>
                    <?php endif; ?>
                </div>

            </div>
            
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" for="body">Body:</label>
                <div class="col-sm-6">
                    <textarea class="form-control" name="body" id="body" rows="12"><?= $_POST['body'] ?? '' ?></textarea>

                    <?php if (isset($errors['body'])) : ?>
                        <p class="text-danger text-center fs-6"><?= $errors['body'] ?></p>
                    <?php endif; ?>
                </div>
            </div>

    </div>

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

<?php require base_path('views/partials/footer.php') ?>