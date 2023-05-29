<?php
session_start();

function release_book($db_login){
    if ( isset($_GET['id']) && isset($_GET['where']) && isset($_GET['provincia'])){
        $conn = mysqli_connect($db_login['host'], $db_login['user'], $db_login['password'], $db_login['database']) or die ("Errore: ".mysqli_connect_error());
        $id= mysqli_real_escape_string($conn,$_GET["id"]);
        $where = mysqli_real_escape_string($conn, $_GET["where"]);
        $pwhere = mysqli_real_escape_string($conn, $_GET["provincia"]);

        if (strlen($pwhere) !== 0 && strlen($where) !== 0 && strlen($id) !== 0){
    
            $query_use = "INSERT INTO uses VALUES ('".$id."','".strtolower($_SESSION['user'])."','".$where."','".$pwhere."',CURRENT_TIMESTAMP() ,2)";
        
            mysqli_query($conn, $query_use);
            mysqli_close($conn); 
        
            $message['value'] = true;
            $message['text'] = "Rilasciato";
            return $message;
        }
    } 
    $message['value'] = false;
    return $message;
}
?>

