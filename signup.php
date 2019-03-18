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

  <h1>Signup</h1>
  <?php
    if (isset($_GET['error'])) {
      if ($_GET['error'] == "emptyfields") {
        echo '<p>Vyplňte všechny pole!</p>';
      }
      elseif ($_GET['error'] == "invaliduidmail") {
        echo '<p>Neplatné jméno a email!</p>';
      }
      elseif ($_GET['error'] == "invaliduid") {
        echo '<p>Neplatné jméno!</p>';
      }
      elseif ($_GET['error'] == "invalidmail") {
        echo '<p>Neplatný email!</p>';
      }
      elseif ($_GET['error'] == "passwordcheck") {
        echo '<p>Hesla se neshodují!</p>';
      }
      elseif ($_GET['error'] == "emailexist") {
        echo '<p>Email je už zabraný!</p>';
      }
      elseif ($_GET['error'] == "usertaken") {
        echo '<p>Jméno je už zabrané!</p>';
      }
    
    }

   ?>

    <form action="includes/signup.inc.php" method="post">
      <input type="text" name="uid" placeholder="Username">
      <input type="text" name="mail" placeholder="E-mail">
      <input type="password" name="pwd" placeholder="Password">
      <input type="password" name="pwd-repeat" placeholder="Repeat password">
      <button type="submit" name="signup-submit">Signup</button>
    </form>


  </body>
</html>
