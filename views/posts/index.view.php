<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

<main>

    <div class="container my-5">
        <h1 class="mb-4">Blog Posts</h1>
        <a class="btn btn-primary mb-4" href="/new-post">New Post</a>
        <br>
        <?php if (!empty($posts)) : ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Username</th>
                        <th scope="col">Posted on: </th>
                        <th scope="col">Actions </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($posts as $post) : ?>
                        <tr>
                            <th scope="row"><?= ($post['id']) ?></th>
                            <td><?= ($post['title']) ?></td>
                            <td><?= ($post['username']) ?> </td>
                            <td><?= $post['created_at'] ?></td>
                            <td>
                                <a class="btn btn-success btn-sm" href="/post?id=<?= $post['id'] ?>">View</a>
                                <a class="btn btn-warning btn-sm" href="/edit-post?id=<?= $post['id'] ?>">Edit</a>
                                <a class="btn btn-danger btn-sm" href="/delete?id=<?= $post['id'] ?>">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        <?php else : ?>
            <p class="text-muted">No posts available.</p>
        <?php endif; ?>

    </div>
</main>

<?php require base_path('views/partials/footer.php') ?>