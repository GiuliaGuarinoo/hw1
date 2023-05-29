<!DOCTYPE html>
<?php
session_start();
if (!isset($_SESSION['user'])){
  header("Location: homepage.html");
  exit;}

?>
<html>
  <head>
    <meta charset="utf-8">
    <link rel = "stylesheet" href = "CSS/header.css" />
    <link rel = "stylesheet" href = "CSS/foundbook.css" />
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Bree+Serif">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap">
    <script src = "foundbook.js" defer = "true"></script>
    <meta name = "viewport" content = "width = device-width, initial-scale=1">
    <title> OurBooks - Ho trovato un libro </title>
  </head>

  <body>
    <header>      
      <div id="logo-container"> </div>
      <nav id="home-page-navbar">
        <a id="one" a href="profile.php" >Profilo</a>
        <a id="two" a href="logout.php"> Logout</a>
      </nav>
    </header>
    <section id='profile'>
        <div id="img"></div>
        <h3>
          <?php
           echo ($_SESSION["user"]);
          ?>
        </h3>
  </section>
    <form id="found-form" name="found-form" method="post">
        <label><h1> Che libro hai trovato?</h1> <input type="text" name="id" maxlength="40"id='id'></label> 
        <p class ='adv'> </p>
        <input id="ok" type="button" value='Cerca'> 
    </form>
    <p id="message"></p>
    <p id="alert"></p>
    <section class = "modal-page hidden">
    <form id="form-modal-view" >
    <div id='book'>
    <h2> Hai trovato questo libro!</h2>
    <div>
    <h3 id="title"></h3>
     <div id="bookinfo"><div>
     <p class="info">ISBN:</p>
     <p class="info"></p>
     <p class="info"></p></div>
     <img></div></div></div>
        <div id='choose'>
        <input id="submit" type ="submit" name ="submit" value="Confermo" >
        <input id="exit" type ="button" name ="exit" value="Esci" >
    </div>
  

    </form>
    </section>

</html>