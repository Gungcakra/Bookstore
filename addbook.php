<?php
require 'function.php';
$genre = query("SELECT * FROM genre");

if(isset($_POST["addbuku"])){
  


       if(addbuku($_POST)>0){
        
           echo "<script>
       alert('Tambah Buku Berhasil');
       window.location.href='bookdata.php';
   </script>";
   }else{
       echo "<script>
       alert('Tambah Buku Gagal');
       window.location.href='bookdata.php';
   </script>";
       } 
    
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">
    <title>Add Book</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data"  >
<div class="row justify-content-center align-items-center containers">
    <div class="form-group col-lg-5">
        <h4>Add New Book</h4>

        <label class="text-dark" for="judul"><b>Book Title</b></label>
        <input type="text" name="judul" id="judul" class="form-control text-dark" placeholder="Add Book Title" >
        <label class="text-dark" for="author"><b>Book Author</b></label>
        <input type="text" name="author" id="author" class="form-control text-dark" placeholder="Add Book Author" >
        <label class="text-dark" for="harga"><b>Book Price</b></label>
        <input type="number" name="harga" id="harga" class="form-control text-dark" placeholder="Example 10000(10k)" >
        <label class="text-dark" for="halaman"><b>Book Page</b></label>
        <input type="number" name="halaman" id="halaman" class="form-control text-dark" placeholder="Exaple 60" >
        <label class="text-dark" for="bahasa"><b>Book Leangue</b></label>
        <input type="text" name="bahasa" id="bahasa" class="form-control text-dark" placeholder="Add Book Leangue" >
        <label class="text-dark" for="kategory"><b>Book Kategory</b></label>
        <select name="kategory" id="kategory" class="custom-select">
            <option value="manga">Manga</option>
            <option value="novel">Novel</option>
        </select>
        <label for="img" class="text-dark" ><b>Book Stock</b></label>
        <input class="form-control text-dark" type="number" name="stock" id="stock" placeholder="Example 100">
        <label for="img" class="text-dark" ><b>Choose Image</b></label>
        <input type="file" name="img" id="img">
        <!-- <div class="genre">
            <label for="genre" class="text-dark"><b>Genre</b></label>
            <br>
            <?php foreach ($genre as $gr): ?>
            <b class="text-dark "><input type="checkbox" name="genre" id="genre" value="<?= $gr["id"] ?>"><?= $gr["genre_name"] ?></b>
            <?php endforeach;?>
        </div> -->
        <br>
        <input type="submit" name="addbuku" value="Submit" class="btn btn-danger" >
    </div>
</div>
</form>
</body>
</html>