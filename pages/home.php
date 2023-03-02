<?php require_once  BASE_PATH."/views/_header.php"; ?>
<div>
<form class="search-form">
  <input type="search" placeholder="Search...">
  <input type="submit" value="Search">
</form>

</div>
<div class="book-list">
    <?php foreach($books as $book) : ?>
        <?php include BASE_PATH . '/views/books/_item.php'; ?>
    <?php endforeach; ?>
</div>
<nav class="pagination">
    <a class="page-link<?= $current_page === 1 ? ' disabled' : '' ;?>" href="<?= page_url('home', ['page_num' => $current_page - 1]); ?>" style="color: white; background-color:rgb(149, 102, 55);">
        <
    </a>
    <?php for($i = 1; $i <= $total_page; $i++) : ?>
        <a class="page-link<?= $i === $current_page ? ' active' : ''; ?>" href="<?= page_url('home', ['page_num' => $i]); ?>" style="color: black;">
            <?= $i; ?>
        </a>
    <?php endfor; ?>
    <a class="page-link<?= $current_page === $total_page ? ' disabled' : '' ;?>" href="<?= page_url('home', ['page_num' => $current_page + 1]); ?>" style="color: white; background-color:rgb(149, 102, 55);">
        >
    </a>
</nav>
<?php require_once  BASE_PATH."/views/_footer.php"; ?>