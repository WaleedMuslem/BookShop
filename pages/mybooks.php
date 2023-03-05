<?php if (!defined("APP_VERSION")) exit; ?>
<?php gate(); ?>
<?php

$current_page = isset($_GET['page_num']) ? intval($_GET['page_num']) : 1;

$offest = ($current_page - 1) * 24;

$book_count = get_book_count();

$books = get_book_list_by_id($offest);

$total_page = intval(ceil($book_count / 24));
?>
<?php require_once  BASE_PATH."/views/_header.php"; ?>
<h1 class="singin-h1">My Books</h1>
    <hr class="line-style">
    <hr class="line-style2">
<div class="book-list">
    <?php foreach($books as $book) : ?>
        <?php include BASE_PATH . '/views/books/_item.php'; ?>
    <?php endforeach; ?>
</div>
<!-- <nav class="pagination">
    <a class="page-link<?= $current_page === 1 ? ' disabled' : '' ;?>" href="<?= page_url('mybooks', ['page_num' => $current_page - 1]); ?>" style="color: white;">
        Previous
    </a>
    <?php for($i = 1; $i <= $total_page; $i++) : ?>
        <a class="page-link<?= $i === $current_page ? ' active' : ''; ?>" href="<?= page_url('mybooks', ['page_num' => $i]); ?>" style="color: white;">
            <?= $i; ?>
        </a>
    <?php endfor; ?>
    <a class="page-link<?= $current_page === $total_page ? ' disabled' : '' ;?>" href="<?= page_url('mubooks', ['page_num' => $current_page + 1]); ?>" style="color: white;">
        Next
    </a>
</nav> -->
<?php require_once  BASE_PATH."/views/_footer.php"; ?>
