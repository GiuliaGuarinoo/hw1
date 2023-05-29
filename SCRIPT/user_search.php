<?php

require_once('./db_conn.php');
require_once('./routine_subscribe.php');


$error= (username_exist($db_login));


    if ($error){
        $return_array['text'] = "Username già registrato";
        $return_array['error'] = true;
     } 
    else
        $return_array['error'] = false;

    echo(json_encode($return_array));


?>