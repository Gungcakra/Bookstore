<?php
session_start();
require 'function.php';
$id = $_SESSION["id"];
$cart = query("SELECT * FROM cart WHERE id_user = $id ")[0];
$idcart = $_GET["id"];
if(isset($_POST["buy"])){
    $iduser = $_SESSION["id"];
    $username = $_SESSION["username"];
    $idbook = $_POST["idbook"];
    $bookname = $_POST["bookname"];
    $count = $_POST["count"];
    $harga = $_POST["harga"];
    $payment = $_POST["payment"];
    $tgl = date("Y-m-d");
    $stock = $cart["current_stock"] - $count;
    $alamat = $_POST["alamat"];
    $query = "INSERT INTO buy(user_id,username,book_id,book_name,count,harga,payment,tanggal,alamat,status) 
              VALUES($iduser,'$username',$idbook,'$bookname',$count,$harga,'$payment','$tgl','$alamat','Waitinng For Confirm')";
              mysqli_query($con,$query);
      $updatestock = "UPDATE buku set stock = $stock WHERE id = $idbook";
      mysqli_query($con,$updatestock);
    $delete = "DELETE FROM cart WHERE id = $idcart";
    mysqli_query($con,$delete);
    
    if(($_POST)>0){
    header("Location: landing.php");
    exit;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History Book Edition</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>

    <link rel="stylesheet" href="css/sb-admin-2.css">
</head>
<body>

    <!--NAVBAR-->
    <nav class="navbar navbar-expand-lg bg-body-tertiary py-3 fixed-top" style="box-shadow: 0px 3px 3px 0px rgba(0,0,0,0.30)">
        <div class="container">
          <img src="assets/images/logo.jpeg"/>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end text-center" style="margin-left: 10px;" id="navbarSupportedContent">
            <div class="navbar-nav">
                <a class="nav-link" href="index.html">Home</a>
                <a class="nav-link" href="shop.html">Categories</a>
                <a class="nav-link" href="#">Contact Us</a>
                  <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                  <i class="fa fa-user" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </nav>

    <!--CART-->
    <section class="cart container my-5 py-5">
        <!-- <div class="container mt-5">
            <h2 class="font-weight-bolde">Your Cart</h2>
            <hr>
        </div>

        <table class="mt-5 pt-5">
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>
            <tr>
                <td>
                    <div class="product-info">
                        <img src="assets/images/demonslayer.jpg" alt=""/>
                        <div>
                            <p>Demon Slayer</p>
                            <small><span>Rp</span>100.000</small>
                            <br>
                            <a class="remove-btn" href="">Remove</a>
                        </div>
                    </div>
                </td>

                <td>
                    <input type="number" value="1"/>
                    <a class="edit-btn" href="">Edit</a>
                </td>

                <td>
                    <span>Rp</span>
                    <span class="product-price">100.000</span>
                </td>
            </tr>
        </table>

        <div class="cart-total">
            <tr>
                <td>Subtotal</td>
                <td>Rp 100.000</td>
            </tr>
            <tr>
                <td>Total</td>
                <td>Rp 100.000</td>
            </tr>

        </div> -->

        <form action="" method="post">
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Book Title</label>
    <div class="col-sm-10">
      <input type="hidden" readonly class="form-control-plaintext" id="staticEmail" name="idbook" value="<?= $cart["book_id"] ?>">
      <input type="text" readonly class="form-control-plaintext" id="staticEmail" name="bookname" value="<?= $cart["book_name"] ?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Amount</label>
    <div class="col-sm-10 row">
      <input type="text" readonly class="form-control-plaintext" id="staticEmail" name="count" value="<?= $cart["count"] ?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Price</label>
    <div class="col-sm-10">
      Rp<input type="text" readonly class="form-control-plaintext" id="staticEmail" name="harga"  value="<?= $cart["book_harga"] ?>">
    </div>
  </div>
  <div class="input-group mb-3">
  <div class="input-group-prepend">
    <label class="input-group-text" for="inputGroupSelect01">Payment Method</label>
  </div>
  <select class="custom-select" id="inputGroupSelect01" name="payment">
    <option selected>Choose...</option>
    <option value="Cash On Delivery">COD(Cash On Delivery)</option>
    <option value="Bank Transfer">Bank Transfer</option>
    <option value="E-Wallet">E-Wallet</option>
  </select>
</div>

<div class="form-group">
    <label for="alamat" class="col-sm-2 col-form-label">Delivery Address</label>
    <div class="col-sm-10">
    <input class="form-control" id="alamat" name="alamat" placeholder="Enter address">
    </div>
  </div>


    <h4>Payment Details</h4>
    <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Product Total</label>
    <div class="col-sm-10">
      Rp<input type="text" readonly class="form-control-plaintext" id="staticEmail" name="harga" value="<?= $cart["book_harga"] ?>">
    </div>
  </div>
    <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Delivery Total</label>
    <div class="col-sm-10">
      <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="Rp0">
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label"><b>Payment Total</b></label>
    <div class="col-sm-10">
      Rp<input type="text" readonly class="form-control-plaintext" id="staticEmail" name="harga" value="<?= $cart["book_harga"] ?>">
    </div>
  </div>

  <button type="submit" name="buy" ><a href="landing.php">Make An Order</a></button>
</form>
    </section>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>