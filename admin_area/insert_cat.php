<!DOCTYPE>

<?php
  include("includes/db.php");


     include("../functions/functions.php");
     session_start();

     if (!isset($_SESSION['userId'])) {
       header("Location: ./login.php?error=mustlogin");

     }

     ?>

<html>
  <head>
    <meta charset="utf-8">
    <title>Jídlos | Přidej produkt</title>
  </head>
  <body>


      <form action="insert_cat.php" method="post" enctype="multipart/form-data">
        <table align="center" width="700" border="2">
          <tr>
            <td>Přidej nový produkt</td>
          </tr>
          <tr>
            <td>Product title:</td>
            <td><input type="text" name="cat_title" /></td>
          </tr>
          <tr>
            <td>Product image:</td>
            <td><input type="file" name="cat_image" /></td>
          </tr>

            <td><input type="submit" name="insert_cat" value="Přidej kategorii" /></td>
          </tr>
        </table>
      </form>


  </body>
</html>

 <?php

  if(isset($_POST['insert_cat'])){

      $cat_title = $_POST['cat_title'];

      //geting the images

      $cat_image = $_FILES['cat_image']['name'];
      $cat_image_tmp = $_FILES['cat_image']['tmp_name'];

      move_uploaded_file($cat_image_tmp,"cat_images/$cat_image");

      $insert_cat = "insert into categories (cat_title, cat_image) values
      ('$cat_title','$cat_image')";

      $insert_cat = mysqli_query($con, $insert_cat);

      if($insert_cat) {
        echo "<script>alert('categorie byla přidána!')</script>";
        echo "<script>window.open('../index.php','_self')</script>";

      }else   echo "<script>alert('Chyba při vkládání!')</script>";
        echo "<script>window.open('insert_cat.php','_self')</script>";

  }


 ?>
