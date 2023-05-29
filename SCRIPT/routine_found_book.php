<?php
session_start();
function book_by_id($db_login){
    $conn = mysqli_connect($db_login['host'], $db_login['user'], $db_login['password'], $db_login['database']) or die ("Errore: ".mysqli_connect_error());
    $id_value=$_POST['id'];
    $query = "SELECT isbn, title, author, lang, when_release_found, place, cover, type_book FROM books b, uses u where b.id_book = u.id_book 
                and b.id_book= '".$id_value."' ORDER BY when_release_found DESC LIMIT 1";

    $result = mysqli_query($conn, $query);
    $num_rows = mysqli_num_rows($result);

    if ($num_rows === 0){
        $message['text']="Codice inesistente.";
        $message['value']=false;
        
    }
    else {

            $res = mysqli_fetch_assoc($result);
            $message['id']=$id_value;
            $message['isbn']=$res['isbn'];
            $message['title']=$res['title'];
            $message['author']=$res['author'];
            $message['lang']=$res['lang'];
            $message['cover']=$res['cover'];
            $message['type']=$res['type_book'];
            $message['value']= true;

    }
   mysqli_close($conn);
return $message;
}

function update_db($db_login){
    $conn = mysqli_connect($db_login['host'], $db_login['user'], $db_login['password'], $db_login['database']) or die ("Errore: ".mysqli_connect_error());
    $result_book_by_id = book_by_id($db_login);
    $return['type']= $result_book_by_id['type'];
    if ($result_book_by_id['value']===true && $result_book_by_id['type']!== '1'){
        $query = "INSERT INTO uses VALUES ('".$result_book_by_id['id']."','".strtolower($_SESSION['user'])."','','',CURRENT_TIMESTAMP(),1)";
        $query_exec=mysqli_query($conn, $query);
        mysqli_close($conn);
        $return['text'] = "Grazie per aver contribuito a tracciare il libro. Buona lettura!";
        $return['error'] = true;
    }
    else {
        $return['text'] = "Libro non ancora rilasciato";
        $return['error'] = false;
        mysqli_close($conn);  
    }
    return $return;
}
?>