<?php
require 'function.php';
$book = query("SELECT * FROM buku");


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>

    <link rel="stylesheet" href="assets/css/style.css">
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

      <!--HOME-->
      <section id="home">
        <div class="container-fluid" style="padding-top: 125px; background-color: #FFA800;">
            <div class="container animationUp">
                <div class="row">
                    <div class="col text-md-start text-center text-white" style=" margin-left: 20px; margin-top: 200px; text-shadow: 2px 2px #808080; ">
                        <h1 class="mt-3">READ AND ADD</h1>
                        <h1>YOUR INSIGHT</h1>
                        <h6 class="mt-3">find your favorite book here:)</h6>
                        <form class="d-flex" role="search">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-success" type="submit">Search</button>
                        </form>
                    </div>
                    <div class="col" style="margin-top: 30px;">
                        <img src="img/book/img.jpeg" style="height: 590px; width: 590px; margin-left: 50px;" alt="">
                    </div>
                </div>
            </div>
        </div>
      </section>

      <!--FEATURED-->
      <section id="featured">
        <div class="container text-center mt-5 mb-5">
          <h2>Bestseller Comic and Manga</h2>
          <hr class="mx-auto">
          <p>Here you can check out our product</p>
          <div class="row mx-auto gx-0">
          <?php foreach($book as $buku): ?>
            <div class="product gx-0 text-center col-lg-3 col-md-4 col-sm-12">
              
              <img class="img-fluid mb-3 mt-5 rounded" src="img/book/<?= $buku["img"] ?>" alt="" style="height: 300px; width: 200px;">
              <h5 class="p-name"><?= $buku["judul"]  ?></h5>
              <h5 class="p-price">Rp <?= $buku["harga"];?></h5>
              <button class="buy-btn">Buy Now</button>
               
            </div>
            <?php endforeach; ?>
          </div>
        </div>
      </section>

      <!--CHILDREN BOOKS-->
      <section id="featured">
        <div class="container text-center mt-5 mb-5" style="padding-top: 150px;">
          <h2>Bestseller Children Book</h2>
          <hr class="mx-auto">
          <p>Here you can check out our product</p>
          <div class="row mx-auto">
          <div class="product text-center col-lg-3 col-md-4 col-sm-12">
              <img class="img-fluid mb-3 mt-5 rounded" src="img/book/kny.jpeg" alt="" style="height: 300px; width: 200px;">
              <h5 class="p-name">Kimetsu Yaiba</h5>
              <h5 class="p-price">Rp 100.000</h5>
              <button class="buy-btn">Buy Now</button>
            </div>
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
              <img class="img-fluid mb-3 mt-5 rounded" src="img/book/kny.jpeg" alt="" style="height: 300px; width: 200px;">
              <h5 class="p-name">Kimetsu Yaiba</h5>
              <h5 class="p-price">Rp 100.000</h5>
              <button class="buy-btn">Buy Now</button>
            </div>
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
              <img class="img-fluid mb-3 mt-5 rounded" src="img/book/kny.jpeg" alt="" style="height: 300px; width: 200px;">
              <h5 class="p-name">Kimetsu Yaiba</h5>
              <h5 class="p-price">Rp 100.000</h5>
              <button class="buy-btn">Buy Now</button>
            </div>
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
              <img class="img-fluid mb-3 mt-5 rounded" src="img/book/kny.jpeg" alt="" style="height: 300px; width: 200px;">
              <h5 class="p-name">Kimetsu Yaiba</h5>
              <h5 class="p-price">Rp 100.000</h5>
              <button class="buy-btn">Buy Now</button>
            </div>
          </div>
        </div>
      </section>

  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>