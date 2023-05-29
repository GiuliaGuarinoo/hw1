<?php
function username_exist($db_login){
    if(isset($_POST["username"]) &&(isset($_POST["password"]))){
        
        $user = $_POST["username"];
        $password = $_POST["password"];
        $conn = mysqli_connect($db_login['host'], $db_login['user'], $db_login['password'], $db_login['database']) or die ("Errore: ".mysqli_connect_error());
        $username = mysqli_real_escape_string($conn, $user);
        $psw = mysqli_real_escape_string($conn, $password);
        $query = "SELECT * FROM users WHERE username = '".$username."'";
        $res = (mysqli_query($conn, $query));
        $num_res = mysqli_num_rows($res);
        $only_row = mysqli_fetch_assoc($res);

        if (($num_res > 0) && password_verify($psw, $only_row['psw'])){
            
            $message_login['text'] = $username;
            $message_login['value'] = 0;
        }

        if (($num_res > 0) && !password_verify($psw, $only_row['psw'])){

            $message_login['text'] = "Password non corretta";
            $message_login['value'] = 1;
        }

        if ($num_res === 0) {

            $message_login['text'] = "Username non trovata";
            $message_login['value'] = 2;
        }
        
        mysqli_free_result($res);
        mysqli_close($conn);
        return $message_login;
    
    }

}


?>