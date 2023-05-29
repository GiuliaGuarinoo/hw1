<?php
session_start();

function isbn_ok($db_login){
    if (isset($_POST['isbn']))
        $isbn=$_POST['isbn'];
        if ((strlen($isbn)>9) &&(strlen($isbn)<14) && (!is_nan($isbn)))
            return true;

}

function insert_book($db_login){
if (isbn_ok($db_login) && isset($_POST['title']) && isset($_POST['author'])&& isset($_POST['language'])&& (isset($_POST['where']))){
    $id_book = uniqid("",false);
    $conn = mysqli_connect($db_login['host'], $db_login['user'], $db_login['password'], $db_login['database']) or die ("Errore: ".mysqli_connect_error());
    $isbn= mysqli_real_escape_string($conn,$_POST["isbn"]);
    $title = mysqli_real_escape_string($conn, $_POST["title"]);
    $author = mysqli_real_escape_string($conn, $_POST["author"]);
    $language = mysqli_real_escape_string($conn, $_POST["language"]);
    $where = mysqli_real_escape_string($conn, $_POST["where"]);
    $pwhere = mysqli_real_escape_string($conn, $_POST["provincia"]);
    
    if (isset (book_img($db_login)->url)){
        $cover = book_img($db_login)->url;}

    else 
        $cover = ("./images/libri.png");

    $query = "INSERT INTO books VALUES ('".$id_book."', '".$isbn."', '".$title."', '".$author."', '".$language."', '".$cover."', NULL)";
    $query_use = "INSERT INTO uses VALUES ('".$id_book."','".strtolower($_SESSION['user'])."','".$where."','".$pwhere."',CURRENT_TIMESTAMP() ,0)";
    
    $exec = mysqli_query($conn, $query);
    $exec_use=mysqli_query($conn, $query_use);
    mysqli_close($conn); 
    
    $message['value'] = true;
    $message['id']=$id_book;
    return $message;
    } 
    $message['value'] = false;
    $message['text'] = "impossibile generare un ID";
    return $message;
}
function book_img($db_login){
    $isbn_book=$_POST['isbn'];
    $curl = curl_init();
    curl_setopt($curl,CURLOPT_URL,"https://api.bookcover.longitood.com/bookcover/".$isbn_book);
    curl_setopt($curl,CURLOPT_RETURNTRANSFER, 1);
    $result = json_decode(curl_exec($curl));
    curl_close($curl);
    return $result;

    }

?>
