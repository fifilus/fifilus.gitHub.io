<!DOCTYPE>
<?php
    include("functions/functions.php");
    session_start();
    if (!isset($_SESSION['userId'])) {
      header("Location: ./index.php");
    }

    ?>
<html>
  <head>
    <meta charset="utf-8">
    <title>Jidlo | Domovská stránka</title>
    <link rel="stylesheet" href="css/flexboxgrid.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <!--HEADER-->
    <header id="main-header">
        <div class="container">
          <div class="row end-sm end-md end-lg center-xs middle-xs middle-sm middle-md middle-lg" >
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
            <a href="index.php"
              <h1>Jídlos</h1>
          </a>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
            <ul id="form">
              <form method="get" action="results.php" enctype="multipart/form-data">
                <input type="text" name="user_query" placeholder="Vyhledej potravinu" />
                <input type="submit" name="search" value="Hledej" />
              </form>

            </div>
            <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
              <nav id="navbar">
                <ul>
                  <li><a href="index.php">Domu</a></li>
                  <li><a href="insert_product.php">Vytvořit</a></li>
                  <?php
                  if (isset($_SESSION['userId'])) {
                    echo '  <li><a href="profil.php">Profil</a></li>';
                }
                  else {
                    echo '<li><a href="login.php">Přihlásit se</a></li>';
                  }


                  '<form action="includes/logout.inc.php" method="post">
                  <button type="submit" name="logout-submit">Logout</button>
                  </form>';
                  ?>


                </ul>
              </nav>
            </div>
          </div>
        </div>
      </header>

      <?php
        if (isset($_SESSION['userUid'])) {
          $userUid = $_SESSION['userUid'];
          echo"<p>Jste přihlášen jako: $userUid </p>";
          echo'<li><a href="./includes/logout.inc.php">Odhlásit</a></li>';
        }
        
        getUserPro();
        ?>





      <!--FOOTER-->
      <section id="footer">
        <div class="container">
          <div class="row center-xs center-sm center-md center-lg">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <h4>	&copy 2019 jídlos.cz</h4>

            </div>
          </div>
        </div>
      </section>



  </body>
</html>
