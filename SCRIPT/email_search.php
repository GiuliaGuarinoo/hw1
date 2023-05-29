<?php

require_once('./db_conn.php');
require_once ('./routine_subscribe.php');

$error= (email_exist($db_login));


    if ($error){
        $return_array['text'] = "Email già in uso";
        $return_array['error'] = true;
     } 
    else
        $return_array['error'] = false;

    echo(json_encode($return_array));


?>

