<?php 
if(!defined("APP_VERSION")){
    exit;
}
gate();
?>
<?php

$id = isset($_GET['id']) ? $_GET['id'] : null;
if($id ===null){
    redirect('404');
}
$book = get_book_by_id($id);

if($book === null){
    redirect('404');
}

$sql=$db->prepare("DELETE FROM books where id = ?");
$sql->execute([$book->id]);
redirect('home');


