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