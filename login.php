<!DOCTYPE html>
<?php

require_once('./SCRIPT/db_conn.php');
require_once('./SCRIPT/routine_login.php');
$message_login = username_exist($db_login);

session_start();
if (isset($_SESSION["user"])){
  header ("Location: profile.php");
  exit;
}
if ($message_login['value'] === 0){
    $_SESSION["user"] = $message_login['text'];
    header ("Location: profile.php");
    exit;
}  
?>


<html>
  <head>
    <meta charset="utf-8">
    <link rel = "stylesheet" href = "CSS/header.css" />
    <link rel = "stylesheet" href = "CSS/subscribe.css" />
    <link rel = "stylesheet" href = "CSS/login.css" />
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Bree+Serif">
    <script src = "login.js" defer = "true"></script>
    <meta name = "viewport" content = "width = device-width, initial-scale=1">
    <title> OurBooks - Login</title>
  </head>

  <body>
    <header>      
      <div id="logo-container"> </div>
      <nav id="home-page-navbar">
        <a id="one" a href="homepage.html"> Home </a>
        <a id="two" a href="subscribe.php"> Registrati </a>
      </nav>
    </header>
    
    <section>
      <div id=overlay></div>
        <form id="subscribe-form" autocomplete="off" name="subscribe-form" method="post">
          <label> Username <input type="text" name="username" maxlength="35" class="data"></label>   
                    
          <?php echo("<p class= 'adv");
                if ($message_login['value']===2)
                  echo(" error'> ".$message_login['text']."</p> "); 
                else
                  echo("'></p>");
          ?>    

          <label> Password <input type="password" name="password" maxlength="35" class="data"> </label>
          
          <?php echo("<p class= 'adv");
                if ($message_login['value']===1)
                  echo(" error'> ".$message_login['text']."</p> "); 
                else
                  echo("'></p>");
          ?>  
          
          <label> <input id="sub" type ="submit" name ="ok" value="Accedi" > </label>
        </form>
    </section>
  </body>
</html>