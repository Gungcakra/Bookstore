<?php

session_start();
if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}
require 'function.php';
$book = query("SELECT * FROM buku ORDER BY judul ASC LIMIT 0,4");
$books = query("SELECT * FROM buku ORDER BY judul ASC LIMIT 4,4");


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">

</head>
<body>

    <!--Navbar-->
    <nav class="navbar navbar-expand-lg bg-body-tertiary py-3 fixed-top bg-white" style="box-shadow: 0px 3px 3px 0px rgba(0,0,0,0.30)">
        <div class="container-fluid">
          <img src="assets/images/logo.jpeg"/>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end text-center" style="margin-left: 10px;" id="navbarSupportedContent">
            <div class="navbar-nav">
                <a class="nav-link" href="index.html">Home</a>
                <a class="nav-link" href="shop.html">Categories</a>
                <a class="nav-link" href="#">Contact Us</a>
                  <a href="cart.php"><i class="fa fa-shopping-bag" aria-hidden="true"></i></a>
                  <a href="updateuser.php"><i class="fa fa-user" aria-hidden="true"></i></a>
                  <a href="logout.php"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2" aria-hidden="true"></i></a>
            </div>
          </div>
        </div>
      </nav>

      <!--Hero Section-->
      <section id="hero-section">
        <div class="container-fluid" style="background-color: #FFA800; margin-top: -30px; padding-bottom: 55px;">
            <div class="container p-0 animationUp">
                <div class="row">
                    <div class="col-lg6 text-md-start text-white" style=" margin-left: 20px; margin-top: 200px; text-shadow: 2px 2px #808080; ">
                        <h1 class="mt-3">READ AND ADD</h1>
                        <h1>YOUR INSIGHT</h1>
                        <h6 class="mt-3 mb-3">find your favorite book here:)</h6>
                        <form class="d-flex" role="search">
                            <input class="form-control mr-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-success" type="submit">Search</button>
                        </form>
                    </div>
                    <div class="col-lg-6" style="margin-top: 50px;">
                        <img src="img/logo.png" style="height: 590px; width: 590px; margin-left: 140px;" alt="">
                    </div>
                </div>
            </div>
        </div>
      </section>

      <!--Content-->
      <!-- <section id="content">
        <div class="container text-center mb-5 mt-5">
          <h2 style="margin-top: 120px;">Bestseller Manga and Comic</h2>
          <hr>
          <p>Here you can check out our product</p>
          <div class="row">
            <div class="product text-center col-lg-3">
              <img class="img-fluid rounded" src="../startbootstrap-sb-admin-2-gh-pages/img/demonslayer.jpg" alt="" style="height: 300px; width: 200px;">
              <h5 class="p-name mt-3">Kimetsu Yaiba</h5>
              <h5 class="p-price text-danger">Rp 100.000</h5>
              <button class="buy-btn">Buy Now</button>
            </div>
            <div class="product text-center col-lg-3">
              <img class="img-fluid rounded" src="../startbootstrap-sb-admin-2-gh-pages/img/demonslayer.jpg" alt="" style="height: 300px; width: 200px;">
              <h5 class="p-name mt-3">Kimetsu Yaiba</h5>
              <h5 class="p-price text-danger">Rp 100.000</h5>
              <button class="buy-btn">Buy Now</button>
            </div>
            <div class="product text-center col-lg-3">
              <img class="img-fluid rounded" src="../startbootstrap-sb-admin-2-gh-pages/img/demonslayer.jpg" alt="" style="height: 300px; width: 200px;">
              <h5 class="p-name mt-3">Kimetsu Yaiba</h5>
              <h5 class="p-price text-danger">Rp 100.000</h5>
              <button class="buy-btn">Buy Now</button>
            </div>
            <div class="product text-center col-lg-3">
              <img class="img-fluid rounded" src="../startbootstrap-sb-admin-2-gh-pages/img/demonslayer.jpg" alt="" style="height: 300px; width: 200px;">
              <h5 class="p-name mt-3">Kimetsu Yaiba</h5>
              <h5 class="p-price text-danger">Rp 100.000</h5>
              <button class="buy-btn">Buy Now</button>
            </div>

          </div>

        </div>

      </section> -->

      <!--MANGA SECTION-->
      <div class="container text-center my-3">
        <h2 style="margin-top: 120px;">Bestseller Manga and Comic</h2>
          <hr>
          <p class="mb-5">Here you can check out our product</p>
        <div class="row mx-auto my-auto">
          <div id="recipeCarousel" class="carousel slide w-100" data-ride="carousel">
              <div class="carousel-inner w-100">
                  <div class="carousel-item active">
                  <?php foreach($book as $bk): ?>
                      <div class="col-md-3">
                          <div class="card card-body">
                            
                              <img class="img-fluid" src="img/book/<?= $bk["img"];?>" style="height: 300px; width: 200px;">
                              <h5 class="card-title mt-3"><?= $bk["judul"];  ?></h5>
                              <p class="card-text text-danger">Rp <?= $bk["harga"];  ?></p>
                              <a class="buy-btn" href="detail.php?id=<?= $bk["id"]  ?>">Buy Now</a>
                            
                          </div>
                      </div>
                      <?php endforeach; ?>
                  </div>
                  <div class="carousel-item">
                  <?php foreach($books as $bk): ?>
                      <div class="col-md-3">
                          <div class="card card-body">
                            
                              <img class="img-fluid" src="img/book/<?= $bk["img"];?>" style="height: 300px; width: 200px;">
                              <h5 class="card-title mt-3"><?= $bk["judul"];  ?></h5>
                              <p class="card-text text-danger">Rp <?= $bk["harga"];  ?></p>
                              <a type="btn" class="buy-btn" href="detail.php?id=<?= $bk["id"]  ?>">Buy Now</a>
                            
                          </div>
                      </div>
                      <?php endforeach; ?>
                  </div>
                 

              </div>
              <a class="carousel-control-prev w-auto" href="#recipeCarousel" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon bg-dark border border-dark rounded-circle" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next w-auto" href="#recipeCarousel" role="button" data-slide="next">
                  <span class="carousel-control-next-icon bg-dark border border-dark rounded-circle" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
              </a>
          </div>
      </div>
      <button class=" btn btn-salmon text-center rounded-pill mt-5 text-white shadow-sm" type="submit" name="submit"><a class="text-white" href="mangacomic.php">View More</a></button>
      </div>

      <!--NOVEL SECTION-->
      <div class="container text-center my-3">
        <h2 style="margin-top: 120px;">Bestseller Novel</h2>
          <hr>
          <p class="mb-5">Here you can check out our product</p>
        <div class="row mx-auto my-auto">
          <div id="recipeCarousel" class="carousel slide w-100" data-ride="carousel">
              <div class="carousel-inner w-100" role="listbox">
                  <div class="carousel-item active">
                      <div class="col-md-3">
                          <div class="card card-body">
                              <img class="img-fluid" src="../startbootstrap-sb-admin-2-gh-pages/img/novel/are you listening.png" style="height: 300px; width: 200px;">
                              <h5 class="card-title mt-3">Are You Listening</h5>
                              <p class="card-text text-danger">Rp 100.000</p>
                              <button class="buy-btn">Buy Now</button>
                          </div>
                      </div>
                  </div>
                  <div class="carousel-item">
                      <div class="col-md-3">
                          <div class="card card-body">
                              <img class="img-fluid" src="../startbootstrap-sb-admin-2-gh-pages/img/novel/Demon Studies.png" style="height: 300px; width: 200px;">
                              <h5 class="card-title mt-3">Demon Studies</h5>
                              <p class="card-text text-danger">Rp 100.000</p>
                              <button class="buy-btn">Buy Now</button>
                          </div>
                      </div>
                  </div>
                  <div class="carousel-item">
                      <div class="col-md-3">
                          <div class="card card-body">
                              <img class="img-fluid" src="../startbootstrap-sb-admin-2-gh-pages/img/novel/Scavengers.png" style="height: 300px; width: 200px;">
                              <h5 class="card-title mt-3">Scravengers</h5>
                              <p class="card-text text-danger">Rp 100.000</p>
                              <button class="buy-btn">Buy Now</button>
                          </div>
                      </div>
                  </div>
                  <div class="carousel-item">
                      <div class="col-md-3">
                          <div class="card card-body">
                              <img class="img-fluid" src="../startbootstrap-sb-admin-2-gh-pages/img/novel/harry potter.jpg" style="height: 300px; width: 200px;">
                              <h5 class="card-title mt-3">Harry Potter</h5>
                              <p class="card-text text-danger">Rp 100.000</p>
                              <button class="buy-btn">Buy Now</button>
                          </div>
                      </div>
                  </div>
                  <div class="carousel-item">
                      <div class="col-md-3">
                          <div class="card card-body">
                              <img class="img-fluid" src="../startbootstrap-sb-admin-2-gh-pages/img/novel/the storyteller.jpg" style="height: 300px; width: 200px;">
                              <h5 class="card-title mt-3">The Storyteller</h5>
                              <p class="card-text text-danger">Rp 100.000</p>
                              <button class="buy-btn">Buy Now</button>
                          </div>
                      </div>
                  </div>
                  <div class="carousel-item">
                      <div class="col-md-3">
                          <div class="card card-body">
                              <img class="img-fluid" src="../startbootstrap-sb-admin-2-gh-pages/img/novel/friendzone.jpg" style="height: 300px; width: 200px;">
                              <h5 class="card-title mt-3">Friendzone</h5>
                              <p class="card-text text-danger">Rp 100.000</p>
                              <button class="buy-btn">Buy Now</button>
                          </div>
                      </div>
                  </div>
              </div>
              <a class="carousel-control-prev w-auto" href="#recipeCarousel" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon bg-dark border border-dark rounded-circle" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next w-auto" href="#recipeCarousel" role="button" data-slide="next">
                  <span class="carousel-control-next-icon bg-dark border border-dark rounded-circle" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
              </a>
          </div>
      </div>
      <button class=" btn btn-salmon text-center rounded-pill mt-5 shadow-sm" type="submit" name="submit"><a class="text-white href="">View More</a></button>
      
      </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.js"></script>
</body>
</html>


