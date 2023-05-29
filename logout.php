<!DOCTYPE html>
<?php

require_once('./SCRIPT/db_conn.php');

session_start();
if (!isset($_SESSION['user'])){
  header("Location: homepage.html");
  exit;
}
?>
<html>
  <head>
    <meta charset="utf-8">
    <link rel = "stylesheet" href = "CSS/header.css" />
    <link rel = "stylesheet" href = "CSS/homepage.css" />
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Bree+Serif">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap">
    <meta name = "viewport" content = "width = device-width, initial-scale=1">
    <title> OurBooks - Logout </title>
  </head>

  <body>
    <header>      
      <div id="logo-container"> </div>
      <nav id="home-page-navbar">
      <a id="one" a href="login.php"> Accedi</a>
      <a id="two" a href="homepage.html"> Home</a>
      </nav>
    </header>
    <section>
      <div id="overlay"></div>
        <h1 id="title">
          <?php
           echo ("A presto ".$_SESSION["user"]."!!!");
           session_destroy();
          ?>
        </h1>
    </section>
  </body>
</html>  