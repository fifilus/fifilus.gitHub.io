<?php
session_start();

if (isset($_SESSION['userId'])) {
  header("Location: ./index.php");
}
 ?>

<!DOCTYPE>

<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
  </head>
  <body>
  <h1>Login</h1>

  <?php

  if (isset($_GET['error'])) {
    if ($_GET['error'] == "emptyfields") {
      echo '<p>Vyplňte všechny pole!</p>';
    }
    if ($_GET['error'] == "wrongpwd") {
      echo '<p>Špatné heslo nebo jméno!</p>';
    }
    if ($_GET['error'] == "nouser") {
      echo '<p>Špatné jméno nebo heslo!</p>';
    }
    if ($_GET['error'] == "mustlogin") {
      echo '<p>Pro vkládání inzerátu se musíte nejprve přihlásit!</p>';
    }

  }


   ?>

    <form action="includes/login.inc.php" method="post">
      <input type="text" name="mailuid" placeholder="Username/E-mail">
      <input type="password"  name="pwd" placeholder="Password">
      <button type="submit" name="login-submit">Login</button>
    </form>
    <p>Nemáte účet? Registrujte se zde: <a href="signup.php">Registrace</a></p>


  </body>
</html>
