<?php
require 'function.php';
$id = $_GET["id"];
$book =  query("SELECT * FROM buku WHERE id = $id ")[0];
if(isset($_POST["update"])){
    if(updatebook($_POST)>0){
      echo "<script>
      alert('Data Berhasil Diubah');
      window.location.href='bookdata.php';
  </script>";
    }else{
      echo "<script>
      alert('Data Gagal Diubah');
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
    
    <title>Update</title>
</head>
<body>

                      <form action="" method="post" enctype="multipart/form-data">

                         
                                <div class="form-group">
                                  <input type="hidden" name="id" value="<?= $book["id"]  ?>">
                                  <input type="hidden" name="imglama" value="<?= $book["img"]  ?>">
                                  <label for="exampleInputEmail1">Judul</label>
                                  <input type = "text" name="judul" value="<?= $book["judul"]  ?>">
                                  <br>
                                  <label for="exampleInputEmail1">Author</label>
                                  <input type = "text" name="author" value="<?= $book["author"]  ?>">
                                  <br>
                                  <label for="exampleInputEmail1">Kategory</label>
                                  <input type = "text" name="kategory" value="<?= $book["kategory"]  ?>">
                                  <br>
                                  <label for="exampleInputEmail1">Harga</label>
                                  <input type = "text" name="harga" value="<?= $book["harga"]  ?>">
                                  <br>
                                  <label for="exampleInputEmail1">Gambar</label>
                                  <br>
                                  <img src="img/book/<?= $book["img"]  ?>" alt="" width="125" height="200">
                                  <br>
                                  <input type = "file" name="img">
                                  <br>
                                  
                                  </div>
                               <input type="submit" class="btn btn-primary" type="submit" name="update" value="Update">
                        </div>
                 
                        </form>

                      </div>
                    </div>

</body>

</html>