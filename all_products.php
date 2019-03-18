<!DOCTYPE>
<?php
    include("functions/functions.php");
?>
<html>
  <head>
    <meta charset="utf-8">
    <title>Jidlos | Všechny produkty</title>
    <link rel="stylesheet" href="css/flexboxgrid.css">
    <link rel="stylesheet" href="css/style2.css">
  </head>
  <body>
    <!--HEADER-->
    <header id="main-header">
        <div class="container">
          <div class="row end-sm end-md end-lg center-xs middle-xs middle-sm middle-md middle-lg" >
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
              <h1>Jídlos</h1>
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

      <!--CATEGORIES-->
      <section id="categories">
        <div class="container">
          <div class="row center-xs center-sm center-md center-lg">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <h2>Kategorie</h2>
              <ul id="cats">
                <?php getCats(); ?>


              </ul>

            </div>
          </div>
        </div>
      </section>

      <!--NEW_INSERTS-->
      <section id="products">
        <div class="container">
          <div class="row center-xs center-sm center-md center-lg">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <h2>Nové inzeráty</h2>
                <div id="product_box">
          <?php
          $get_pro = "select * from products";

          $run_pro = mysqli_query($con, $get_pro);

          while($row_pro=mysqli_fetch_array($run_pro)){

            $pro_id = $row_pro['product_id'];
            $pro_cat = $row_pro['product_cat'];
            $pro_title = $row_pro['product_title'];
            $pro_price = $row_pro['product_price'];
            $pro_image = $row_pro['product_image'];
            $pro_place = $row_pro['product_place'];

            echo "
              <div id='single_product'>
              <a href='details.php?pro_id=$pro_id'>
                <img src='product_images/$pro_image' width='274' height='250'/>
                <h3>$pro_title</h3>
                <p style=''><b> $pro_price Kč</b></p>
                <p style=''> $pro_place</p>
                </a>
              </div>


            ";


            }



           ?>
        </div>
            </div>
          </div>
        </div>
      </section>

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
