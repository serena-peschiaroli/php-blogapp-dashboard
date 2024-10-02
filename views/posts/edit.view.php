<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

<main>



    <div class="container my-5">
        <a href="/posts" class="btn btn-success mt-3 mb-5">Back</a>


        <form method="POST" action="/post">
            <input type="hidden" name="_method" value="PATCH">
            <input type="hidden" name="id" value="<?= $post['id'] ?>">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" for="title">Title:</label>
                <div class="col-sm-6">
                    <input type=" text" class="form-control"
                        name=" title"
                        id="title"
                        value="<?= $post['title'] ?? '' ?>">

                    <?php if (isset($errors['title'])) : ?>
                        <p class="text-danger text-center fs-6"><?= $errors['title'] ?></p>
                    <?php endif; ?>
                </div>

            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" for="body">Body:</label>
                <div class="col-sm-6">
                    <textarea class="form-control" name="body" id="body"><?= $post['body'] ?? '' ?></textarea>

                    <?php if (isset($errors['body'])) : ?>
                        <p class="text-danger text-center fs-6"><?= $errors['body'] ?></p>
                    <?php endif; ?>
                </div>
            </div>



            <div class="row mb-3">

                <div class="col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="/posts" role="button">Cancel</a>
                </div>
                <div class="col-sm-3 d-grid">
                    <button type="button" class="btn btn-danger delete-btn" onclick="deletePost()">Delete this post</button>


                </div>


            </div>
        </form>

        <form id="delete-form" class="d-none" method="POST" action="/post">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="id" value="<?= $post['id'] ?>">
        </form>

    </div>


</main>


<?php require base_path('views/partials/footer.php') ?>

<script type="text/javascript">
    function deletePost() {
        if (confirm('Are you sure you want to delete this post?')) {
            document.getElementById('delete-form').submit();
        }
    }
</script>