<?php

session_start();
function view_book($db_login){
    $conn = mysqli_connect($db_login['host'], $db_login['user'], $db_login['password'], $db_login['database']) or die ("Errore: ".mysqli_connect_error());
    $query = "SELECT isbn, title, author, lang, when_release_found, place, cover FROM books b, uses u where b.id_book = u.id_book and u.type_book = 0 and u.username ='".$_SESSION["user"]."'";
    $result = mysqli_query($conn, $query);
    $num_rows = mysqli_num_rows($result);

    if ($num_rows === 0){
        $message_profile['text']="Non hai ancora rilasciato dei libri.";
        $message_profile['value']=false;
        
    }
    else {

        for ($i = 0;$i<$num_rows; $i++){

            $res = mysqli_fetch_assoc($result);
            $message_profile[$i]['isbn']=$res['isbn'];
            $message_profile[$i]['title']=$res['title'];
            $message_profile[$i]['author']=$res['author'];
            $message_profile[$i]['lang']=$res['lang'];
            $message_profile[$i]['when_release']=$res['when_release_found'];
            $message_profile[$i]['place']=$res['place'];
            $message_profile[$i]['cover']=$res['cover'];

        }
    }
    mysqli_free_result($result);
    mysqli_close($conn);
    return $message_profile; 
}
function view_book_release($db_login){
    $conn = mysqli_connect($db_login['host'], $db_login['user'], $db_login['password'], $db_login['database']) or die ("Errore: ".mysqli_connect_error());
    $query = "SELECT b.id_book, isbn, title, author, lang, when_release_found, cover, type_book, b.status FROM books b, uses u where b.id_book = u.id_book and (b.status = '".strtolower($_SESSION['user'])."' or u.type_book = 2) and u.username ='".strtolower($_SESSION["user"])."' 
              and when_release_found IN (SELECT max(w.when_release_found) FROM uses w WHERE w.username = '".strtolower($_SESSION["user"])."'
               AND w.id_book = b.id_book )";
    $result = mysqli_query($conn, $query);
    $num_rows = mysqli_num_rows($result);

    if ($num_rows === 0){
        $message_profile['text']="Non hai ancora trovato dei libri.";
        $message_profile['value']=false;
        
    }
    else {

        for ($i = 0;$i<$num_rows; $i++){

            $res = mysqli_fetch_assoc($result);
            $message_profile[$i]['id']=$res['id_book'];
            $message_profile[$i]['isbn']=$res['isbn'];
            $message_profile[$i]['title']=$res['title'];
            $message_profile[$i]['author']=$res['author'];
            $message_profile[$i]['lang']=$res['lang'];
            $message_profile[$i]['when']=$res['when_release_found'];
            $message_profile[$i]['cover']=$res['cover'];
            $message_profile[$i]['type']=$res['type_book'];
            $message_profile[$i]['status']=$res['status'];


        }
    }
    mysqli_free_result($result);
    mysqli_close($conn);
    return $message_profile; 
}

function search_book($db_login){
    $conn = mysqli_connect($db_login['host'], $db_login['user'], $db_login['password'], $db_login['database']) or die ("Errore: ".mysqli_connect_error());
    if (isset($_GET['place'])){
        $place_string =  mysqli_real_escape_string($conn,trim ($_GET["place"]));
        $query = "SELECT b.id_book, isbn, title, author, lang, place, provincia, cover FROM books b, uses u where b.id_book = u.id_book and b.status is NULL 
        and (place like '%".$place_string."%' or u.provincia like '%".$place_string."%') 
        and u.when_release_found IN (SELECT MAX(w.when_release_found) FROM uses w GROUP BY w.id_book);";
        $result = mysqli_query($conn, $query);
        $num_rows = mysqli_num_rows($result);

        if ($num_rows === 0){
            $messagefree['text']="Non ci sono dei libri liberi nella tua zona.";
            $messagefree['value']=false;
        
    }
        else {

            for ($i = 0;$i<$num_rows; $i++){

                $res = mysqli_fetch_assoc($result);
                $messagefree[$i]['id']=$res['id_book'];
                $messagefree[$i]['isbn']=$res['isbn'];
                $messagefree[$i]['title']=$res['title'];
                $messagefree[$i]['author']=$res['author'];
                $messagefree[$i]['lang']=$res['lang'];
                $messagefree[$i]['place']=$res['place'];
                $messagefree[$i]['provincia']=$res['provincia'];
                $messagefree[$i]['cover']=$res['cover'];

            
            }
        }
    }
    mysqli_free_result($result);
    mysqli_close($conn);
    return $messagefree; 
}


?>

