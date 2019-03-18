<!DOCTYPE>

<?php
  include("includes/db.php");


     include("functions/functions.php");
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


      <form action="insert_product.php" method="post" enctype="multipart/form-data">
        <table align="center" width="700" border="2">
          <tr>
            <td>Přidej nový produkt</td>
          </tr>
          <tr>
            <td>Product title:</td>
            <td><input type="text" name="product_title" /></td>
          </tr>
          <tr>
            <td>Product category:</td>
            <td>
              <select name="product_cat">
                <option>Select a category</option>

              <?php
              $get_cats = "select * from categories";

              $run_cats = mysqli_query($con, $get_cats);

              while ($row_cats=mysqli_fetch_array($run_cats)){

                $cat_id = $row_cats['cat_id'];
                $cat_title = $row_cats['cat_title'];

              echo "<option value='$cat_id'>$cat_title</option>";

              }
             ?>
            </select>
          </tr>
          <tr>
            <td>Product image:</td>
            <td><input type="file" name="product_image" /></td>
          </tr>
          <tr>
            <td>Product Price:</td>
            <td><input type="text" name="product_price" /></td>
          </tr>
          <tr>
            <td>Product description:</td>
            <td><textarea name="product_desc" cols="40" rows="10"></textarea></td>
          </tr>
          <td>Product place:</td>
          <td><input type="text" name="product_place" /></td>
          <tr>
            <td><input type="submit" name="insert_post" value="Insert Now" /></td>
          </tr>
        </table>
      </form>


  </body>
</html>

 <?php

  if(isset($_POST['insert_post'])){

      $product_title = $_POST['product_title'];
      $product_cat = $_POST['product_cat'];
      $product_price = $_POST['product_price'];
      $product_desc = $_POST['product_desc'];
      $product_place = $_POST['product_place'];
      $userUid = $_SESSION['userUid'];

      //geting the images

      $product_image = $_FILES['product_image']['name'];
      $product_image_tmp = $_FILES['product_image']['tmp_name'];

      move_uploaded_file($product_image_tmp,"product_images/$product_image");

      $insert_product = "insert into products (product_cat,product_title,product_price,product_desc,product_place,product_image,user_pro) values
      ('$product_cat','$product_title','$product_price','$product_desc','$product_place','$product_image','$userUid')";

      $insert_pro = mysqli_query($con, $insert_product);

      if($insert_pro) {
        echo "<script>alert('Produkt byl přidán!')</script>";
        echo "<script>window.open('./index.php','_self')</script>";

      }else   echo "<script>alert('Chyba při vkládání!')</script>";
        echo "<script>window.open('insert_product.php','_self')</script>";

  }


 ?>
