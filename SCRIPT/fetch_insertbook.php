<?php
require_once('./db_conn.php');

require_once('./routine_insert_book.php');
echo(json_encode(insert_book($db_login)))

?>