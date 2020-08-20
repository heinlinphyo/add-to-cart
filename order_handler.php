<?php

require_once ('config.php');
require_once ('header.php');


if(isset($_GET['category_id'])){
  $category_id = $_GET['category_id'];
  $products = mysqli_query($conn, "SELECT * FROM products WHERE category_id='$category_id'");
}else{
  $products = mysqli_query($conn, "SELECT * FROM products ");
}
$categories = mysqli_query($conn, "SELECT * FROM categories");
?>

<div class="container">
  <div class="row">
    <div class="col-xl-12">
      <div class="card">
        <div class="card-header"><b>Order List</b></div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <ul>
                <?php while($row=mysqli_fetch_assoc($categories)){ ?>
                <li > <a href="order_handler.php?category_id=<?php echo $row['id'] ?>" class="text-danger"><?php echo $row['category_name'] ?></a> </li>
                <?php  } ?>
              </ul>
              <div class="main">
                <ul class="products">
                  <?php while($row=mysqli_fetch_assoc($products)){ ?>
                  <li>
                    <a href=""><?php echo $row['product_name'] ?></a>
                  </li>
                <?php } ?>
                </ul>
            </div>
          </div>
          <div class="col-md-6">
            <b>Table Name Here</b> <p>Voucher No Here</p>
            <ul>
              <li></li>
            </ul>
          </div>
        </div>
      </div>
        <div class="card-footer">

        </div>
      </div><!-- card end -->
    </div>
  </div>
</div>
