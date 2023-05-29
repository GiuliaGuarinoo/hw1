<?php
function username_exist($db_login){

    if(isset($_POST["username"]))

        $user = $_POST["username"];
        $conn = mysqli_connect($db_login['host'], $db_login['user'], $db_login['password'], $db_login['database']) or die ("Errore: ".mysqli_connect_error());
        $username = mysqli_real_escape_string($conn, $user);
        $query = "SELECT * FROM users WHERE username = '".$username."'";
        $query_exec =(mysqli_query($conn, $query));
        $count_res = mysqli_num_rows($query_exec);
    

        if ($count_res > 0){
            
            return true;
        }
        mysqli_free_result($query_exec);
        mysqli_close($conn);
        return false;
    }

function email_exist($db_login){

    if(isset($_POST["email"])){

        $email = $_POST["email"];
        $conn = mysqli_connect($db_login['host'], $db_login['user'], $db_login['password'], $db_login['database']) or die ("Errore: ".mysqli_connect_error());
        $email_user = mysqli_real_escape_string($conn, $email);
        $query = "SELECT * FROM users WHERE email = '".$email_user."'";
        $query_exec = (mysqli_query($conn, $query));
        $count_res = mysqli_num_rows($query_exec);

        if ($count_res > 0){
            
            return true;
        }
        mysqli_free_result($query_exec);
        mysqli_close($conn);        
        return false;
    }
}

function insert_user($db_login){

    if  ((!username_exist($db_login) && (!email_exist($db_login))) && (isset($_POST["nome"]))&& (isset($_POST["cognome"]))&& 
        (isset($_POST["password"])) && (isset($_POST["rpassword"])) && (isset($_POST["privacy"]))&& (isset($_POST["email"]))) 
       
        if (((strcmp($_POST['password'], $_POST['rpassword'])) === 0) && ((strlen($_POST['password'])) > 7) && (preg_match('/^[a-z0-9]+$/i', $_POST['username'])) 
        &&(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))){

            $conn = mysqli_connect($db_login['host'], $db_login['user'], $db_login['password'], $db_login['database']) or die ("Errore: ".mysqli_connect_error());
            $username = strtolower(mysqli_real_escape_string($conn,$_POST["username"]));
            $email = mysqli_real_escape_string($conn, $_POST["email"]);
            $nome = mysqli_real_escape_string($conn, $_POST["nome"]);
            $cognome = mysqli_real_escape_string($conn, $_POST["cognome"]);
            $password = password_hash(mysqli_real_escape_string($conn, $_POST['password']),PASSWORD_BCRYPT);            
            $query = "INSERT INTO users VALUES ('".$username."', '".$email."', '".$nome."', '".$cognome."', '".$password."', 1)";
            $res_query = mysqli_query($conn, $query);
            mysqli_close($conn); 
            $message['value']=true;
            $message['text']= "Registrazione effettuata con successo";
            return $message;
    }
    $message['value']=false;
    $message['text']= "Registrazione non andata a buon fine";
    return $message;
}

?>

