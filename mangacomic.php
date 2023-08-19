<?php
require 'function.php';
$book =  query("SELECT b.id,b.judul,b.kategory,b.harga,b.img,
GROUP_CONCAT(g.genre_name SEPARATOR ', ') AS genres
FROM buku b
JOIN buku_genre bg ON b.id = bg.id_buku
JOIN genre g ON bg.id_genre = g.id
GROUP BY b.id, b.judul,b.kategory,b.harga,b.img");

if(isset($_POST["genre"])){

  $book = genre($_POST["genre"]);
}
if(isset($_POST["search"])){
  $book = carimanga($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manga and Cover Page</title>

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
    


    <nav class="navbar navbar-expand-lg bg-body-tertiary py-3  bg-white" style="box-shadow: 0px 3px 3px 0px rgba(0,0,0,0.30)">
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
                  <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                  <i class="fa fa-user" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </nav>

<!-- 
    <nav class="navbar navbar-light bg-light">
  <a class="navbar-brand">Navbar</a>
  <form class="form-inline">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form>
</nav> -->
 <br>
<div>
    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="" method="post">
        <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small" placeholder="Cari Buku"
                aria-label="Search" aria-describedby="basic-addon2" name="keyword" autocomplete="off" >
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit" name="search" >
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
      </form>
      <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
          Manga Genre
        </button>
        
      <div class="collapse" id="collapseExample">
        <form action="" method="post">
        <div class="card card-deck">
        <ul class="list-group">
  <button class="list-group-item list-group-item-action" name="genre" type="submit" value="1">Action</button>
  <button class="list-group-item list-group-item-action" name="genre" type="submit" value="10">Adventure</button>
  <button class="list-group-item list-group-item-action" name="genre" type="submit" value="6">Comedy</button>
  <button class="list-group-item list-group-item-action" name="genre" type="submit" value="5">Drama</button>
  <button class="list-group-item list-group-item-action" name="genre" type="submit" value="3">Fantasy</button>
</ul>
        <ul class="list-group">
  <button class="list-group-item list-group-item-action" name="genre" type="submit" value="2">Horror<a>
  <button class="list-group-item list-group-item-action" name="genre" type="submit" value="15">Isekai<a>
  <button class="list-group-item list-group-item-action" name="genre" type="submit" value="4">Magic<a>
  <button class="list-group-item list-group-item-action" name="genre" type="submit" value="12">Mystery<a>
  <button class="list-group-item list-group-item-action" name="genre" type="submit" value="14">Mecha<a> 


</ul>
      <ul class="list-group">
  <button class="list-group-item list-group-item-action" name="genre" type="submit" value="9">Psychological<a> 
  <button class="list-group-item list-group-item-action" name="genre" type="submit" value="7">Romance<a>
  <button class="list-group-item list-group-item-action" name="genre" type="submit" value="11">School<a>
  <button class="list-group-item list-group-item-action" name="genre" type="submit" value="8">Slice Of Life<a>
  <button class="list-group-item list-group-item-action" name="genre" type="submit" value="13">Supernatural<a>

</ul>
      <ul class="list-group">
   <button class="list-group-item list-group-item-action" name="genre" type="submit" value="16">Sports<a>

</ul>
        </div>
        </form>
        
      </div>
      </div>

      <section>
          <div class="container text-center mt-5 mb-5">
              <h2>Find All your Comic and Manga Here</h2>
                <hr>
                <p>Here you can check our product</p>
                          
                <div class="row mx-auto gx-0">
                
                <?php foreach($book as $bk):?>
                  <div class=" card-body gx-0 text-center col-lg-3 col-md-4 col-sm-12">
                  <img  class="img-fluid mb-3 mt-5 rounded" src="img/book/<?= $bk["img"]?>" class="card-img-top" alt="..."style="height: 300px; width: 200px;" >
                    <h5 class="card-title"><?= $bk["judul"] ?></h5>
                    <h5 class="card-text text-danger">Rp <?= $bk["harga"]; ?></h5>
                    <a class="buy-btn" href="detail.php?id=<?= $bk["id"] ?>">Buy Now</a>
                  </div>
                  <?php endforeach; ?>
                </div>
                
            </div>
          </div>
      </section>
     <!-- Bootstrap core JavaScript-->
     <script src="vendor/jquery/jquery.min.js"></script>
     <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
 
     <!-- Core plugin JavaScript-->
     <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
 
     <!-- Custom scripts for all pages-->
     <script src="js/sb-admin-2.js"></script>
</body>
</html>