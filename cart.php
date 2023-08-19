<?php
session_start();
require 'function.php';
$id = $_SESSION["id"];
$cart = query("SELECT * FROM cart WHERE id_user = $id");

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
    <section class="cart container my-5 py-5 row">
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
                <?php foreach($cart as $cr): ?>
        <div class="card" style="width: 18rem;">
       
            <img class="card-img-top" src="img/book/<?= $cr["book_img"] ?>" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title"><?=$cr ["book_name"] ?></h5>
                <p class="card-text">Rp<?= $cr["book_harga"] ?></p>
                <p class="card-text">Amount:  <?= $cr["count"] ?></p>
                <a href="buy.php?id=<?= $cr["id"] ?>" class="btn btn-primary">Checkout</a>
            </div>
          
        </div>
        <?php endforeach;?>
    </section>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>