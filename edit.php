<?php
  include "include/header.php";
  include "config/config.php";
?>


<div class="container mt-5">
  <form action="" method="POST">
    <?php

      if (isset($_GET['edit'])) {

          $id = $_GET['edit'];
          $query = "SELECT * FROM stock_mobile WHERE id = " . $id;
          $select_items = mysqli_query($connection, $query);
          while ($row = mysqli_fetch_assoc($select_items)) {
            $store_owner         = $row['store_owner'];
            $product             = $row['product'];
            $quantity_available  = $row['quantity_available'];
            $sold                = $row['sold'];
            $date                = $row['date'];
            $clear_status        = $row['clear_status'];

      ?>
      <?php }
      } ?>

    <?php

      if (isset($_POST['submit'])) {

          $store_owner        =  $_POST['store_owner'];
          $product            = $_POST['product'];
          $quantity_available = $_POST['quantity_available'];
          $sold               = $_POST['sold'];
          $date               = $_POST['date'];
          $clear_status       = $_POST['clear_status'];

          $query = "UPDATE stock_mobile SET store_owner =  '{$store_owner}', product = '{$product}', quantity_available = '{$quantity_available}' , sold = '{$sold}', date = '{$date}', clear_status = '{$clear_status}'  WHERE id = {$id} ";
          $update_query = mysqli_query($connection, $query);
          $_SESSION['success'] = "Updated Successfully!";
          header("Location: index.php");
          if (!$update_query) {
            die("QUERY FAILED" . mysqli_error($connection));
          }
      }
    ?>
    <h3 class="m-5 text-uppercase">Edit Page for Store Owner : <?php echo $store_owner; ?></h3>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="store_owner">Store Owner</label>
        <input type="text" class="form-control" id="store_owner" name="store_owner" value="<?php echo  $store_owner; ?>">
      </div>
      <div class="form-group col-md-6">
        <label for="product">Product</label>
        <input type="text" class="form-control" id="product" name="product" value="<?php echo  $product; ?>">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="quantity_available">Quantity Available</label>
        <input type="text" class="form-control" id="quantity_available" name="quantity_available" value="<?php echo  $quantity_available; ?>">
      </div>
      <div class="form-group col-md-6">
        <label for="product">Sold</label>
        <input type="text" class="form-control" id="sold" name="sold" value="<?php echo  $sold; ?>">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="date">Date</label>
        <input type="date" class="form-control" id="timePicker" name="date" value="<?php echo  $date; ?>">
      </div>
      <div class="form-group col-md-6">
        <label for="cleat_status">Clear Status</label>
        <input type="text" class="form-control" id="clear_status" name="clear_status" value="<?php echo  $clear_status; ?>">
      </div>
    </div>
    <div class="d-flex justify-content-between">
      <div>
        <button type="submit" name="submit" class="btn btn-primary btn-lg">Update</button>
      </div>
      <div>
        <a href="delete.php?delete=<?php echo $id; ?>'" type="submit" class="btn btn-danger btn-lg">Delete</a>
      </div>
    </div>

  </form>
</div>



<?php include "include/footer.php" ?>