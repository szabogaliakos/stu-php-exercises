<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4 text-center">Tech news</h1>
    </div>
</div>
<?php flash('article_message') ?>
<div class="container">
    <div class="row">
        <?php foreach ($data['articles'] as $article) : ?>
        <div class="col-sm-12 col-md-6 col-lg-6">
            <div class="card">
                <img src="img/<?php echo $article->image[0]->name; ?>" alt="Avatar" style="width:100%">
                <div class="card-container">
                    <p class="text-center pt-3"><b><?php echo $article->title; ?></b></p>
                    <p class="text-center"><small>Published on <?php echo $article->created_at ?></small></p>
                    <a href="<?php echo URLROOT . '/articles/show/' . $article->id ; ?>" class="btn btn-dark center">More</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>


</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
