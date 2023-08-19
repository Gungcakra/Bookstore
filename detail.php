<?php
require 'function.php';
session_start();
$id = $_GET["id"];
$book = query("SELECT * FROM buku WHERE id = $id")[0];

if(isset($_POST["cart"])){
   $iduser = $_SESSION["id"];
   $username = $_SESSION["username"];
   $id = $book["id"];
   $judul = $book["judul"];
   $author = $book["author"];
   $img = $book["img"];
   $tgl = date("Y-m-d");
   $count = $_POST["count"];
   $harga = $book["harga"] * $count;
   $stock = $book["stock"];

   $query = "INSERT INTO cart(id_user,username,book_id,book_name,book_author,book_img,book_harga,tanggal,count,current_stock) 
             VALUES($iduser,'$username',$id,'$judul','$author','$img','$harga','$tgl',$count,$stock)";
   mysqli_query($con,$query);
   header("Location: cart.php");
    exit;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

      <!--CONTENT-->
      <section class="container single-product" style="padding-top: 150px;">
        <div class="row mx-auto">
            <div class="col-lg-4">
                <img class="rounded" src="img/book/<?= $book["img"]  ?>" alt="" style="width: 350px; height: 500px;">
            </div>
            <div class="col">
              <form action="" method="post">
                <h2><?= $book["judul"] ?></h2>
                <hr style="width: 600px;">
                <h6 class="text-secondary">30 July 2023</h6>
                <h6><?= $book["author"] ?>(Author)</h6>
                <h5 class="text-dark">Stock <?= $book["stock"] ?></h5>
                <h5 class="text-danger">Rp <?= $book["harga"] ?></h5>
                <input type="number" name="count"/>
                <button class="buy-btn" type="submit" name="cart">Add To Cart</button>
                <h3 class="mt-5">Overview</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quod voluptas omnis laudantium rerum perspiciatis pariatur minus porro fugit. Illum, et. Quis quas, laborum sequi dicta est ipsa id eius architecto? Nulla nemo assumenda nostrum itaque minus, quis unde nisi adipisci ullam consequatur distinctio placeat. Dolore sequi explicabo repellendus quidem, repellat dignissimos tempora laboriosam deserunt molestias tenetur obcaecati harum dicta ratione inventore facere labore et consectetur voluptatum. Neque eveniet deleniti, earum voluptatum excepturi pariatur, unde fugiat voluptatibus suscipit ad aut in laudantium molestias ab. Id cumque officia neque illo, aliquid, sit nam alias provident aperiam velit maiores possimus rem itaque minima.</p>
              </form>
            </div> 
        </div>
      </section>
    
        
       
        

     
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>