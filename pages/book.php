<?php
    if (!isset($_GET['id']))
    {
        redirect('404');
    }
    
    $book = get_book_by_id($_GET['id']);

    
    if (!$book) {
        redirect('404');
    }
?>
<?php require_once  BASE_PATH."/views/_header.php"; ?>
<div class="book-div">
    <div>
        <?php if ($book->cover) : ?>
            <img class="book-img" src="<?= asset("img/uploads/{$book->cover}"); ?>" alt="<?= $book->title; ?>" />
        <?php else : ?>
            <img class="book-img" src="https://via.placeholder.com/500" alt="<?= $book->title; ?>">
        <?php endif; ?>
    </div>
    <div class="book-details">
        <h1 class="book-title">•  <?= $book->title;?>(<?= $book->year; ?>) </h1><br>
        
        <h2 class="book-author">• by <?= $book->author;?></h2><br>
        <p class="book-description"><?= $book->description; ?></p><br>
        <p><a href="#"><button class="download-btn">DOWNLOAD</button></a>
        <?php if (user_logged_in()) : ?>
            <?php $id = current_user()->id ?>
            <?php if ($id == $book->user_id) : ?>   
                
                
                <a <?= "onClick=\"javascript: return confirm('Please confirm deletion');\""?> href="<?= page_url('delete', ['id'=> $book->id ]); ?>"><button class="delete-btn">DELETE</button></a>
                <a href="<?= page_url('edit', ['id'=> $book->id ]); ?>"><button class="update-btn">EDIT</button></a></p>
            <?php endif; ?>
        <?php endif; ?>
    </div>
    

   
    
    
</div>
<?php require_once  BASE_PATH."/views/_footer.php"; ?>