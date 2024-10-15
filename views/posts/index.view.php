<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>


<main>

    <div class="container my-5">
        <?php if($_SESSION['user']) :?> 
            <h1 class="mb-4">Your Blog Posts</h1>
        <?php else : ?>
            <h1 class="mb-4">Blog Posts</h1>
        <?php endif?>

        <?php if ($_SESSION['user']) : ?>
            <a class="btn btn-primary mb-4" href="/posts/create">New Post</a>
            <br>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Posted on: </th>
                        <th scope="col">Actions </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($posts as $post) : ?>
                        <tr>
                            <th scope="row"><?= ($post['id']) ?></th>
                            <td><?= ($post['title']) ?></td>
                            <td><?= date('d-m-y', strtotime($post['created_at']))  ?></td>
                            <td>
                                <a class="btn btn-success btn-sm" href="/post?id=<?= $post['id'] ?>">View</a>
                                <a class="btn btn-warning btn-sm" href="/post/edit?id=<?= $post['id'] ?>">Edit</a>
                                <button type="button" class="btn btn-danger btn-sm delete-btn" onclick="deletePost()">Delete</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
                <form id="delete-form" class="d-none" method="POST" action="/post">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="id" value="<?= $post['id'] ?>">
                </form>
            </table>
        <?php else : ?>
            <div class="row">
            <?php foreach ($posts as $post) : ?>
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body mb-2">
                            <h5 class="card-title mb-2"><strong><?= ($post['title']) ?></strong></h5>
                            <h6 class="card-subtitle mb-2 text-muted mb-2"> <strong>Written by: </strong><?= ($post['last_name']) ?></h6>
                            <p class="card-text mb-2"><?= (substr($post['body'], 0, 15)) ?></p>
                            <a href="/post?id=<?= $post['id'] ?>" class=" card-link">View post</a>
                        </div>
                    </div>
                </div>
                
            <?php endforeach; ?>
            </div>
            
        <?php endif; ?>

    </div>
</main>
<script type="text/javascript">
    function deletePost() {
        if (confirm('Are you sure you want to delete this post?')) {
            document.getElementById('delete-form').submit();
        }
    }
</script>

<?php require base_path('views/partials/footer.php') ?>