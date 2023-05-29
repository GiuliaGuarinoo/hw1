<?php
function insert_provincie($db_login){

        $conn = mysqli_connect($db_login['host'], $db_login['user'], $db_login['password'], $db_login['database']) or die ("Errore: ".mysqli_connect_error()); 
        $query = "SELECT * FROM provincie";
        $query_exec = mysqli_query($conn, $query);  

        for ($i = 0;$i< mysqli_num_rows($query_exec); $i++){

                $res = mysqli_fetch_assoc($query_exec);
                $provincie[$i]['text'] = $res['Nome'];
                $provincie[$i]['value'] = $res['Sigla'];
        }
        mysqli_free_result($query_exec);
        mysqli_close($conn); 
        return $provincie;
}

?>