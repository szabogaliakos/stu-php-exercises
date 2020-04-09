<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="container">
    <h3><?php echo $data['article']->title; ?></h3>
    <div class="bg-secondary text-white p-2 mb-3">
        <?php echo $data['article']->created_at; ?>
    </div>
    <p><?php echo $data['article']->description; ?></p>
    <?php if(isset($_SESSION['user_id'])) : ?>
        <hr>
        <div class="row">
            <a href="<?php echo URLROOT . '/articles/edit/' . $data['article']->id; ?>" class="btn btn-dark">
                Edit
            </a>
            <form action="<?php echo URLROOT . '/articles/delete/' . $data['article']->id; ?>" method="post">
                <input type="submit" value="Delete" class="btn btn-danger">
            </form>
        </div>
    <?php endif; ?>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>