<!DOCTYPE html>

<?php

require_once('./SCRIPT/db_conn.php');
require_once('./SCRIPT/routine_subscribe.php');

$status_user = username_exist($db_login);
$status_email= email_exist($db_login);
$user_create = insert_user($db_login);
?>

<html>
  <head>
    <meta charset="utf-8">
    <link rel = "stylesheet" href = "CSS/header.css" />
    <link rel = "stylesheet" href = "CSS/subscribe.css" />
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Bree+Serif">
    <script src = "subscribe.js" defer = "true"></script>
    <meta name = "viewport" content = "width = device-width, initial-scale=1">
    <title> OurBooks - Subscribe</title>
  </head>

  <body>
    <header>      
      <div id="logo-container"> </div>
      <nav id="home-page-navbar">
        <a id="one" a href="homepage.html"> Home</a>
        <a id="two" a href="login.php"> Accedi </a>
      </nav>
    </header>
    
    <section>
      <div id=overlay></div>
        <form id="subscribe-form" autocomplete="off" name="subscribe-form" method="post">

        <div id='submitok'></div>
          <label> Username <input type="text" name="username" maxlength="35" class="data"
            <?php
              if (isset($_POST["username"]) && (!$user_create)){
                $value_username= $_POST["username"];
                echo("value  = '$value_username'");} 
            ?>> 
          </label>

          <p class=
            <?php 
              echo("'adv");
                if ($status_user)
                  echo(" error'");
                else
                  echo("'");
            ?>>
            <?php
             if ($status_user)
              echo("Utente già in uso");
            ?>
          </p>

          <label> Nome<input type="text" name="nome" maxlength="35" class="data" 
            <?php
              if (isset($_POST["nome"]) && (!$user_create)){
                $value_nome= $_POST["nome"];
                echo("value  = '$value_nome'");}
              
            ?>> 
          </label>

          <p class="adv"> </p>
          <label> Cognome<input type="text" name="cognome" maxlength="35" class="data" 
          <?php
              if (isset($_POST["cognome"]) && (!$user_create)){
                $value_cognome= $_POST["cognome"];
                echo("value  = '$value_cognome'");}
              
            ?>> 
          </label>

          <p class="adv"> </p>

          <label> Email <input type="email" name="email" maxlength="35" class="data"  
            <?php
              if (isset($_POST["email"]) && (!$user_create)){
                $value_email= $_POST["email"];
                echo("value  = '$value_email'");}
              
            ?>>
          </label>

          <p class=<?php
            echo("'adv");
            if ($status_email)
              echo(" error'");
            else
              echo("'");
          ?> data-choice-id="email">
            <?php
              if ($status_email)
                echo("Email già in uso");
            ?>
            
              </p>

          <label> Password <input type="password" name="password" maxlength="35" class="data"> </label>
          <p class="adv"> </p>
          <label> Ripeti Password <input type="password" name="rpassword" maxlength="35" class="data"> </label>
          <p id= "rpassword" class="adv"> </p>
          <div id="privacy-container">        
            <input type="checkbox" name="privacy"><span>Autorizzo l'uso dei miei dati personali secondo quanto stabilito dall'informativa privacy</span>
          </div>
          <p id="privacy" class="adv"> </p>
           <input id="sub" type ="submit" name ="ok" value="Iscriviti" >
        </form>
    </section>
  </body>

</html>
