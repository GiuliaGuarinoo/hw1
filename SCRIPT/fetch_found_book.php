<?php
require_once('./db_conn.php');
require_once('./routine_found_book.php');

echo json_encode(book_by_id($db_login));

?>