<!DOCTYPE>
<?php
    include("functions/functions.php");
    include("includes/db.php");
    session_start();
?>
<html>
  <head>
    <meta charset="utf-8">
    <title>Jidlos | Detail produktu</title>
    <link rel="stylesheet" href="css/flexboxgrid.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <!--HEADER-->
    <header id="main-header">
        <div class="container">
          <div class="row end-sm end-md end-lg center-xs middle-xs middle-sm middle-md middle-lg" >
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
            <a href="index.php"  <h1>Jídlos</h1></a>
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
                  <li><a href="login.php">Přihlásit se</a></li>

                </ul>
              </nav>
            </div>
          </div>
        </div>
      </header>


      <!--NEW_INSERTS-->
      <section id="products">
        <div class="container">
          <div class="row center-xs center-sm center-md center-lg">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">


                  <?php
                  if(isset($_GET['pro_id'])){

                    $product_id = $_GET['pro_id'];



                  $get_pro = "select * from products where product_id='$product_id'";

                  $run_pro = mysqli_query($con, $get_pro);

                  while($row_pro=mysqli_fetch_array($run_pro)){

                    $pro_id = $row_pro['product_id'];
                    $pro_title = $row_pro['product_title'];
                    $pro_price = $row_pro['product_price'];
                    $pro_image = $row_pro['product_image'];
                    $pro_place = $row_pro['product_place'];
                    $pro_desc = $row_pro['product_desc'];
                    $user_pro = $row_pro['user_pro'];

                    echo "
                      <div id='details_product'>

                        <img style='padding:20px; float:left; object-fit: fill;' src='product_images/$pro_image' width='45%' height='70%'/>
                        <h1 style='padding:20px;text-transform: uppercase;'>$pro_title</h1>
                        <p>POPIS:<br> <b>$pro_desc</b> </p>
                        <p style=''>CENA: <b>$pro_price Kč</b></p>
                        <p style=''>MĚSTO/VESNICE: <b>$pro_place</b></p>
                        <p>Tento inzerát vložil uživatel: $user_pro</p>

                      </div>


                    ";


                  }
                }


              ?>
        </div>
            </div>
          </div>

      </section>

      <!--FOOTER-->
      <section id="footer">
        <div class="container">
          <div class="row center-xs center-sm center-md center-lg">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <h4>	&copy 2019 Jídlos.cz</h4>

            </div>
          </div>
        </div>
      </section>



  </body>
</html>
