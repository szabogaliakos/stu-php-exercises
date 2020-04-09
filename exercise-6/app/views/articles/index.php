<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4 text-center">Tech news</h1>
    </div>
</div>
<?php flash('article_message') ?>
<div class="container">
        <?php foreach ($data['articles'] as $article) : ?>
            <div class="row d-flex justify-content-center">
                <div class="card card-body mb-3">
                    <img src="img/<?php echo $article->image; ?>.png" class="card-img" alt="<?php echo $article->image; ?>">
                    <h4 class="card-title"><?php echo $article->title; ?></h4>
                    <div class="bg-light p-2 mb-3">
                        Published on <?php echo $article->created_at ?>
                    </div>
                    <a href="<?php echo URLROOT . '/articles/show/' . $article->id ; ?>" class="btn btn-dark">More</a>
                </div>
            </div>
        <?php endforeach; ?>

</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
