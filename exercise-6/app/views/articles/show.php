<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="container">
    <div class="blog-post">
        <h2 class="blog-post-title pl-4 pr-4 pt-4 mt-4 text-center"><?php echo $data['article']->title; ?></h2>
        <p class="blog-post-meta mb-4 text-center"><?php echo $data['article']->created_at; ?></p>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <?php
                echo '<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>';
                for ($i = 1; $i < count($data['article']->image); $i++){
                    echo '<li data-target="#carouselExampleIndicators" data-slide-to="'.$i.'"></li>';
                } ?>
            </ol>
            <div class="carousel-inner">
                <?php foreach ($data['article']->image as $img) : ?>
                    <div class="carousel-item <?php echo ($data['article']->image[0] === $img) ? 'active': ''; ?>">
                        <img class="d-block w-100" src="../../img/<?php echo $img; ?>" alt="<?php echo $img; ?>">
                    </div>
                <?php endforeach; ?>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <p class="m-4 text-justify"><?php echo $data['article']->description; ?></p>
        <?php if(isset($_SESSION['user_id'])) : ?>
            <hr>
            <div class="controls">
                <a href="<?php echo URLROOT . '/articles/edit/' . $data['article']->id; ?>" class="btn btn-dark control-item mr-3">
                    Edit
                </a>
                <form action="<?php echo URLROOT . '/articles/delete/' . $data['article']->id; ?>" method="post">
                    <input type="submit" value="Delete" class="btn btn-danger control-item ml-3">
                </form>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>