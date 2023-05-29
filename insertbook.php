<!DOCTYPE html>

<?php
session_start();
if (!isset($_SESSION['user'])){
  header("Location: homepage.html");
  exit;}
require_once('./SCRIPT/db_conn.php');
require_once('./SCRIPT/routine_provincie.php');
require_once('./SCRIPT/routine_insert_book.php');
$provincie =insert_provincie($db_login);
$insert_book= insert_book($db_login);


?>
<html>
  <head>
    <meta charset="utf-8">
    <link rel = "stylesheet" href = "CSS/header.css" />
    <link rel = "stylesheet" href = "CSS/subscribe.css" />
    <link rel = "stylesheet" href = "CSS/insertbook.css" />
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Bree+Serif">
    <script src = "insertbook.js" defer = "true"></script>
    <meta name = "viewport" content = "width = device-width, initial-scale=1">
    <title> OurBooks - User </title>
  </head>

  <body>
    <header>      
      <div id="logo-container"> </div>
      <nav id="home-page-navbar">
        <a id="one" a href="profile.php">Profilo</a>
        <a id="two" a href="logout.php"> Logout</a>
      </nav>
    </header>
    <section>
        <h1> Che libro vuoi rilasciare? </h1>
        <form id="insert-form" autocomplete="off" name="insert-form" method="post">
          <label> ISBN <input type="text" name="isbn" class="data"></label>   
          <p class ='adv'> </p>
          <label> Titolo <input type="text" name="title" class="data"></label> 
          <p class ='adv'> </p>   
          <label> Autore <input type="text" name="author" class="data"></label> 
          <p class ='adv'> </p>
          <label> Lingua <input type="text" name="language" class="data"></label>  
          <p class ='adv'> </p>
          <label> Luogo di rilascio <input type="text" name="where" class="data" placeholder="Sii più preciso possibile"></label>
          <p class ='adv'> </p>
          <label> Provincia di rilascio <select name ="provincia">
          <?php
          for ($i=0; $i<count($provincie); $i++){
             echo"<option value = '".$provincie[$i]['text']."'>".$provincie[$i]['text']."</option>";

            }
            
          ?>
          </select>
          </label>
          <input id="button" type ="button" name ="button" value="Rilascia" >   
        </form>    
    </section> 
    <section class = "modal-page hidden">
    <form id="form-modal-view" >
    <img src="./images/exit.png" id = "exit" class="hidden">
    <div id =submitok> </div>
     <h1 id='ans'>Confermi di voler rilasciare il libro?  </h1>
     <div id='choose'>
        <input id="submit" type ="submit" name ="submit" value="SI!" >
        <input id="button" type ="button" name ="btn_no" value="NO!" >
    </div>
    </form>
    </section>
  </body>
</html>  
