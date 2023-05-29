<?php
require_once('./db_conn.php');
require_once('./routine_profile.php');
echo(json_encode(search_book($db_login)))

?>