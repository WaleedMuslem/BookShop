<?php

function dump($var) {
    echo "<pre>";
    print_r($var);
    echo "</pre>";
}


function dd($var) {
    dump($var);
    die();
}

function asset($asset) {
    return BASE_URL . $asset . "?v=" . APP_VERSION;
}

function page_url($page, $params = [])
{
    $url = BASE_URL . "?page={$page}";
    if (is_array($params) && count($params) > 0) {
        foreach ($params as $key => $value) {
            $url .= "&{$key}={$value}";
        }
    }
    return $url;
}

function redirect($page, $params = [])
{
    $url = page_url($page, $params);

    header("Location: $url");
    die();
}

function is_post() {
    return $_SERVER['REQUEST_METHOD'] === 'POST';
}

function db_connect() {
    $db_host = DB_HOST;
    $db_port = DB_PORT;
    $db_name = DB_NAME;

    try {
        $dbh = new PDO("mysql:host={$db_host};dbname={$db_name};port={$db_port}", DB_USER, DB_PASS);
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }

    return $dbh;
}

function get_book_count() {
    global $db;

    $sql = "SELECT COUNT('id') as count FROM books;";

    return $db->query($sql)->fetch(PDO::FETCH_OBJ)->count;
}

function get_book_by_id($id) {
    global $db;

    $stmt = $db->prepare("SELECT * from books WHERE id = ?");
    $stmt->execute([$id]);

    return $stmt->fetch(PDO::FETCH_OBJ);
}

function get_book_list($offset = 0, $limit = PAGE_LIMIT) {
    global $db;

    $stmt = $db->prepare("SELECT * FROM books LIMIT :offset, :limit");
    $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_OBJ);
}

function get_book_list_by_id($offset = 0, $limit = PAGE_LIMIT) {
    global $db;
    $user_id = current_user()->id;

    
    $stmt = $db->prepare("SELECT * FROM books where user_id =:user_id LIMIT :offset, :limit");
    $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    

    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_OBJ);
}

function log_in_user($id) {
    $_SESSION['user_id'] = $id;
}

function user_logged_in() {
    return isset($_SESSION['user_id']) && $_SESSION['user_id'] !== null;
}

function current_user_id(){
    if(!user_logged_in()){
        return null;
    }
    return $_SESSION['user_id'];
}