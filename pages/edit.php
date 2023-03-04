$errors = [];

$title = $book->title;
$author = $book->author;
$year = $book->year;
$description = $book->description;


if (is_post()){
      
    $title = $_POST['title'];
    $author = $_POST['author'];
    $year = $_POST['year'];
    $description = $_POST['description'];
    

    if ($title == null) {
        $errors['title'][] = 'Title is required';
    } else {
        if (strlen($title) < 2) {
            $errors['title'][] = 'Title must be at least 2 characters long';
        }
        if (strlen($title) > 255) {
            $errors['title'][] = "The title must be less then 255 characters long";
        }
    }

    if ($author == null) {
        $errors['author'][] = "author is required";
    }

    if ($year == null) {
        $errors['year'][] = "Year is required";
    } else {
        if (!is_numeric($year)) {
            $errors['year'][] = "Year must be a number";
        }
    }

    if ($description == null) {
        $errors['description'][] = "Description is required";
    } else {
        if (strlen($description) < 100) {
            $errors['description'][] = "Description must be at least 100 characters long";
        }
    }

    // FILE VALIDATION
    if (isset($_FILES['cover']) && $_FILES['cover']['size'] > 0)
    {
        $target_dir = BASE_PATH . "/img/uploads/";
        $target_file = $target_dir . basename($_FILES['cover']['name']);

        $imgeFileType = strtolower(
            pathinfo($target_file, PATHINFO_EXTENSION)
        );

        if (file_exists($target_file)) {
            $errors['cover'][] = "The selected file already exists.";
        }

        if ($_FILES['cover']['size'] > (MAX_UPLOAD_SIZE * 1000000)) {
            $errors['cover'][] = "The selected file is too large. Maximum upload size: " . MAX_UPLOAD_SIZE . "MB";
        }

        $allowedFormats = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array($imgeFileType, $allowedFormats)) {
            $errors['cover'][] = "The selected file format is not allowed. Try these: " . implode(", ", $allowedFormats);
        }
    }
    if (!count($errors)) {
        $user_id = current_user()->id;

        $cover_image = null;
        

        if (isset($target_file)) {
            if (!move_uploaded_file($_FILES['cover']['tmp_name'], $target_file)) {
                $errors['cover'][] = "Unexpected error";
            } else {
                $cover_image = $_FILES['cover']['name'];
            }
        }
        if (!count($errors)) {
            $user_id = current_user()->id;

            $stmt = $db->prepare("UPDATE books set user_id=:user_id, title=:title, author=:author, year=:year, description=:description, cover=:cover WHERE id=:id");
            $stmt->bindParam(':user_id', $user_id);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':author', $author);
            $stmt->bindParam(':year', $year);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':cover', $cover_image);
            $stmt->bindParam(':id', $id);
            // $sql->bind_param('ississi',$user_id,$title,$author,$year,$description,$cover_image,$id);
            
            
            try {
                $stmt->execute();
                redirect('book', ['id' => $id, 'success' => 1]);
            } catch (PDOException $e) {
                print "Error!: " . $e->getMessage() . "<br/>";
                die();
            }
        }
   
       
    }
}
?>
<?php require_once BASE_PATH."/views/_header.php"; ?>

<div class="page page-upload">
    <form class="card" action="<?= page_url('edit',['id'=> $book->id ]); ?>" method="POST" enctype="multipart/form-data">
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
            <input type="file" name="cover" class="form-control"   />
            <?php if (isset($errors['cover'])) : ?>
                <?php foreach ($errors['cover'] as $error) : ?>
                    <p class="validation-error"><?= $error; ?></p>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <div>
            <button class="btn btn-primary" type="submit">Update</button>
        </div>
    </form>
</div>
<?php require_once BASE_PATH."/views/_footer.php"; ?>