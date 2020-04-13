<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="container">
    <div class="card card-body bg-light mt-5">
        <h2>Publish Article</h2>
        <form action="<?php echo URLROOT ; ?>/articles/add" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control form-control-lg<?php echo !empty($data['title_err']) ? ' is-invalid' : ''; ?>"
                       value="<?php echo $data['title'] ?>" >
                <span class="invalid-feedback"><?php echo $data['title_err'] ?></span>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" id="description" cols="30" rows="10" class="form-control form-control-lg<?php echo !empty($data['description_err']) ? ' is-invalid' : ''; ?>"><?php echo $data['description']; ?></textarea>
                <span class="invalid-feedback"><?php echo $data['description_err'] ?></span>
            </div>
            <div class="form-group">
                <label for="images">Upload image:</label>
                <input type="file" name="images[]" accept="image/*" id="img" class="form-control form-control-lg<?php echo !empty($data['images_err']) ? ' is-invalid' : ''; ?>" multiple>
                <span class="invalid-feedback"><?php echo $data['images_err'] ?></span>
            </div>
            <input type="submit" class="btn btn-success" value="Submit">
            <a href="<?php echo URLROOT; ?>/articles" class="btn btn-danger">Back</a>
        </form>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
