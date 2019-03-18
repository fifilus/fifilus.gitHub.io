<?php


$con = mysqli_connect("localhost","root","","jidlos");

if (mysqli_connect_errno())
{
  echo "The connection was not established: " . mysqli_connect_error();
}

//getting the categories

function getCats(){
  global $con;

  $get_cats = "select * from categories";

  $run_cats = mysqli_query($con, $get_cats);

  while ($row_cats=mysqli_fetch_array($run_cats)){

    $cat_id = $row_cats['cat_id'];
    $cat_title = $row_cats['cat_title'];
    $cat_image = $row_cats['cat_image'];


  echo "<li><a href='index.php?cat=$cat_id'>
  <img style='object-fit:' src='admin_area/cat_images/$cat_image' width=200px height='100px'/></a></li>";

  }


}

function getPro () {

    if(!isset($_GET['cat'])){


  global $con;

  $get_pro = "select * from products order by RAND() LIMIT 0,15";

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
        <img style='object-fit:fill' src='product_images/$pro_image' width='100%' height='68%'/>
        <h3>$pro_title</h3>
        <p style=''><b> $pro_price Kč</b></p>
        <p style=''> $pro_place</p>
        </a>
      </div>


    ";


    }
  }
}



function getCatPro () {

    if(isset($_GET['cat'])){

      $cat_id = $_GET['cat'];


  global $con;

  $get_cat_pro = "select * from products where product_cat='$cat_id'";

  $run_cat_pro = mysqli_query($con, $get_cat_pro);

  $count_cats = mysqli_num_rows($run_cat_pro);

  if($count_cats==0){

    echo "<h2 style='padding:20px;'>V této kategorii nejsou žádné produkty</h2>";
  }


  while($row_cat_pro=mysqli_fetch_array($run_cat_pro)){

    $pro_id = $row_cat_pro['product_id'];
    $pro_cat = $row_cat_pro['product_cat'];
    $pro_title = $row_cat_pro['product_title'];
    $pro_price = $row_cat_pro['product_price'];
    $pro_image = $row_cat_pro['product_image'];
    $pro_place = $row_cat_pro['product_place'];





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
  }
  }

  function getUserPro() {
    global $con;
      $userUid = $_SESSION['userUid'];

    $get_pro = "select * from products where user_pro='$userUid'";

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
}


?>
