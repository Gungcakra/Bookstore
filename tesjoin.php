<?php

// Assuming you have already established a database connection


// Create connection

require 'function.php';


// SQL query to join the "manga" table with the "genre" table based on "genre_id"

// $sql = "SELECT buku.*, genre.genre FROM buku INNER JOIN genre ON buku.id =genre.id_buku";
$id = 1;

$judul = 'Black Clover';
$book = query("SELECT b.judul, b.author,b.kategory,b.harga,b.halaman,
GROUP_CONCAT(g.genre_name SEPARATOR ', ') AS genres
FROM buku b
JOIN buku_genre bg ON b.id = bg.id_buku
JOIN genre g ON bg.id_genre = g.id WHERE b.id  = $id");
// Execute the query




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
                   
<table class="table" border="1">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Author</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Genre</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Halaman</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1; ?>
                    <?php foreach($book as $buku): ?>
                          <tr>
                            <td hidden><?php echo $buku["id"] ?></td>
                            <td><?php echo $i; ?></td>
                            <td><?= $buku["judul"];?></td>
                            <td><?= $buku["author"];?></td>
                            <td><?= $buku["kategory"];?></td>                        
                            <td><?= $buku["genres"];?></td>                        
                            <td>Rp <?= $buku["harga"];?></td>
                            <td><?= $buku["halaman"];?></td>

                            <td>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modaldelete">Delete</button>
                                <a class="btn btn-success">Update</a>
                            </td>
                           
                          </tr>
                          <?php $i++ ?>
                    <?php endforeach; ?>
                        </tbody>
                      </table>
</body>
</html>