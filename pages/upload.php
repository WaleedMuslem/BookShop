<?php require_once BASE_PATH."/views/_header.php"; ?>
<div class="page page-upload">
    <form class="card" action="<?= page_url('upload'); ?>" method="POST" enctype="multipart/form-data">
        <div class="form-group<?= isset($errors['title']) ? ' has-error' : ''; ?>">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" value="<?= $title; ?>">
            <?php if (isset($errors['title'])) : ?>
                <?php foreach ($errors['title'] as $error) : ?>
                    <p class="validation-error"><?= $error; ?></p>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <div class="form-group<?= isset($errors['author']) ? ' has-error' : ''; ?>">
            <label for="author">Author</label>
            <input type="text" name="author" class="form-control" value="<?= $author; ?>">
            <?php if (isset($errors['author'])) : ?>
                <?php foreach ($errors['author'] as $error) : ?>
                    <p class="validation-error"><?= $error; ?></p>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <div class="form-group<?= isset($errors['year']) ? ' has-error' : ''; ?>">
            <label for="year">Release year</label>
            <input type="number" name="year" class="form-control" value="<?= $year; ?>">
            <?php if (isset($errors['year'])) : ?>
                <?php foreach ($errors['year'] as $error) : ?>
                    <p class="validation-error"><?= $error; ?></p>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <div class="form-group<?= isset($errors['description']) ? ' has-error' : ''; ?>">
            <label for="description">Description</label>
            <textarea name="description" class="form-control"><?= $description; ?></textarea>
            <?php if (isset($errors['description'])) : ?>
                <?php foreach ($errors['description'] as $error) : ?>
                    <p class="validation-error"><?= $error; ?></p>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <div class="form-group<?= isset($errors['cover']) ? ' has-error' : ''; ?>">
            <label for="cover">Cover image</label>
            <input type="file" name="cover" class="form-control" />
            <?php if (isset($errors['cover'])) : ?>
                <?php foreach ($errors['cover'] as $error) : ?>
                    <p class="validation-error"><?= $error; ?></p>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <div>
            <button class="btn btn-primary" type="submit">Upload</button>
        </div>
    </form>
</div>
<?php require_once BASE_PATH."/views/_footer.php"; ?>