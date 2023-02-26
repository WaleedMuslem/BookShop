<div class="book-item">
    <a href="<?= page_url('book', ['id'=> $book->id ]); ?>">
    <?php if ($book->cover) : ?>
        <img src="<?= asset("img/uploads/{$book->cover}"); ?>" alt="<?= $book->title; ?>" />
    <?php else : ?>
        <img src="https://via.placeholder.com/500" alt="<?= $book->title; ?>">
    <?php endif; ?>
    </a>
    <p class="book-title">
        <a href="<?= page_url('book', ['id'=> $book->id ]); ?>">
            <?= $book->title; ?> (<?= $book->year; ?>)
        </a>
    </p>
    <p class="book-artist">
        <?= $book->author; ?>
    </p>
</div>
