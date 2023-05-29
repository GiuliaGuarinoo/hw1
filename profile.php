<!DOCTYPE html>
<?php

require_once('./SCRIPT/db_conn.php');
require_once('./SCRIPT/routine_profile.php');
require_once('./SCRIPT/routine_provincie.php');
$provincie =insert_provincie($db_login);
session_start();
if (!isset($_SESSION['user'])){
  header("Location: homepage.html");
  exit;
}

$book = view_book($db_login);
$book_release = view_book_release($db_login);
?>
<html>
  <head>
    <meta charset="utf-8">
    <link rel = "stylesheet" href = "CSS/header.css" />
    <link rel = "stylesheet" href = "CSS/profile.css" />
    <script src = "profile.js" defer = "true"></script>
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Bree+Serif">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap">
    <meta name = "viewport" content = "width = device-width, initial-scale=1">
    <title> OurBooks - User </title>
  </head>

  <body>
    <header>      
      <div id="logo-container"> </div>
      <nav id="home-page-navbar">
        <a id="one" a href= foundbook.php>Ho trovato un libro</a>
        <a id="two" a href="insertbook.php"> Rilascia un libro</a>
        <a id="three" a href="logout.php"> Logout</a>
    
      </nav>
    </header>
    <section>
        <div id="img"></div>
        <h1>
          <?php
           echo ("Ciao ".$_SESSION["user"]);
          ?>
        </h1>
    <form id="search" >
      <input id='researchbook'type="text" name="search" placeholder="Cerca libri liberi nella tua zona">
      <input id='researchsub'type="submit" name="search_by_zone" value="">
      <img src= "./images/exit.png" id = "exit" class="hidden">
    </form>
    </section>
    <article>
        <div id="search_books"><h2>I miei primi rilasci</h2>
        <?php
        if ($book['value']===false)
        echo("<h3>".$book['text']."</h3>");
        else {
          for ($i=0; $i<count($book); $i++){
            echo ("<div class='bookcontainer'> <h3>".$book[$i]['title']."</h3>");
            echo ("<div class='bookinfo'><div class= 'info'><p> ISBN:".$book[$i]['isbn']."</p>");
            echo ("<p>".$book[$i]['author']."</p>");
            echo ("<p>".$book[$i]['lang']."</p>");
            echo ("<p>Data rilascio: ".$book[$i]['when_release']."</p>");
            echo ("<p>Luogo rilascio: ".$book[$i]['place']."</p></div>");
            echo ("<img src=" .$book[$i]['cover']. " id='coverbook'></div></div>");
          }
        }
    
        ?>
        
        </div> 

        <div id ="found_books"><h2>I miei libri trovati</h2>
        <?php
        if ($book_release['value']===false)
        echo("<h3>".$book_release['text']."</h3>");
        else {
          for ($i=0; $i<count($book_release); $i++){
            echo ("<form class='bookcontainer' name='release-book'> <h3>".$book_release[$i]['title']."</h3>");
            echo ("<div class='bookinfo'><div class= 'info'><p> ISBN:".$book_release[$i]['isbn']."</p>");
            echo ("<p>".$book_release[$i]['author']."</p>");
            echo ("<p>".$book_release[$i]['lang']."</p>");
            echo ("<p> Data di ritrovo: ".$book_release[$i]['when']."</p>");
            echo ("<input type='hidden' name='id_hidden' value=".$book_release[$i]['id']."></div>");
            echo ("<img src=" .$book_release[$i]['cover']. " id='coverbook'>");
            if ($book_release[$i]['status'] ===strtolower($_SESSION['user']))
              echo ("<input class='sub' type ='submit' name ='ok' value='Rilascia Libro'>");
            else{
              echo("<p class='sub release'> Libro Rilasciato! </p>");
            }

            echo ("</div></form>");
          }
        }
        ?>
          </div>
    </article>
    <article id = 'form-results' class = 'hidden'>
    </article>
    <section class = "modal-page hidden">
    <form id="form-modal-view"name='form-modal-view' >
     <h1>Vuoi rilasciare il libro?  </h1>
     <div id=info> <label> Luogo di rilascio <input type="text" name="where" class="data" placeholder="Sii più preciso possibile"></label>
          <p class ='adv'> </p>
          <label> Provincia di rilascio <select name ="provincia"></div>
          <?php
          for ($i=0; $i<count($provincie); $i++){
             echo"<option value = '".$provincie[$i]['text']."'>".$provincie[$i]['text']."</option>";
            } 
          ?>
          </select>
          </label>
     <div id='choose'>
        <input id="submit" type ="submit" name ="submit" value="SI!" >
        <input id="button" type ="button" name ="btn_no" value="NO!" >
    </div>
    </form>
    </section>

    
  </body>
</html>  
