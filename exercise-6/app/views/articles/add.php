<?php require APPROOT . '/views/inc/header.php'; ?>
<script src="https://cdn.ckeditor.com/ckeditor5/18.0.0/classic/ckeditor.js"></script>
<div class="container">
    <div class="card card-body bg-light mt-5">
        <h2>Publish Article</h2>
        <form onsubmit="return validate()" action="<?php echo URLROOT ; ?>/articles/add" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control form-control-lg<?php echo !empty($data['title_err']) ? ' is-invalid' : ''; ?>"
                       value="<?php echo $data['title'] ?>" >
                <span class="invalid-feedback"><?php echo $data['title_err'] ?></span>
            </div>
            <div class="form-group">
                <label for="editor">Description:</label>
                <textarea name="description" id="editor" cols="30" rows="10" class="form-control form-control-lg<?php echo !empty($data['description_err']) ? ' is-invalid' : ''; ?>"><?php echo $data['description']; ?></textarea>
                <span class="invalid-feedback"><?php echo $data['description_err'] ?></span>
            </div>
            <div class="form-group">
                <label for="images">Upload image:</label>
                <input type="file" name="images[]" accept="image/*" id="img" class="form-control form-control-lg<?php echo !empty($data['images_err']) ? ' is-invalid' : ''; ?>" multiple>
                <span class="invalid-feedback"><?php echo $data['images_err'] ?></span>
            </div>
            <div class="controls">
                <input type="submit" class="btn btn-success control-item mr-3" value="Submit">
                <a href="<?php echo URLROOT; ?>/articles" class="btn btn-danger control-item ml-3">Cancel</a>
            </div>
        </form>
    </div>
</div>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
<?php require APPROOT . '/views/inc/footer.php'; ?>
