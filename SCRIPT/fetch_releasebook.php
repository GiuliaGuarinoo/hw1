<?php
require_once('./db_conn.php');
require_once('./routine_releasebook.php');
echo(json_encode(release_book($db_login)))

?>