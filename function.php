<?php
$con = mysqli_connect("localhost","root","","perpustes");


//Ambil data dari table database dengan wadah ROWS
function query($query){
    global $con;

    $result = mysqli_query($con,$query);
    $rows = [];

    while($row = mysqli_fetch_assoc($result)){
        $rows [] = $row;
    }
    return $rows;

}

//Search Akun
function cari($keyword){
    $query = "SELECT * FROM akun WHERE 
    username LIKE '%$keyword%' OR
    email LIKE '%$keyword%' OR
    number LIKE '%$keyword%' OR
    level LIKE '%$keyword%'
    
    ";
    return query($query);
}
function caribuku($keyword){
    $query = "SELECT b.id, b.judul, b.author,b.kategory,b.harga,b.halaman,
    GROUP_CONCAT(g.genre_name SEPARATOR ', ') AS genres
    FROM buku b
    JOIN buku_genre bg ON b.id = bg.id_buku
    JOIN genre g ON bg.id_genre = g.id WHERE 
    b.judul LIKE '%$keyword%' OR
    b.author LIKE '%$keyword%' GROUP BY b.id, b.judul,b.author,b.kategory,b.harga,b.halaman ORDER BY b.judul ASC
    ";
    return query($query);
}
function carimanga($keyword){
    $query = "SELECT b.id,b.judul,b.kategory,b.harga,b.img,
    GROUP_CONCAT(g.genre_name SEPARATOR ', ') AS genres
    FROM buku b
    JOIN buku_genre bg ON b.id = bg.id_buku
    JOIN genre g ON bg.id_genre = g.id WHERE 
    b.judul LIKE '%$keyword%' OR
    b.author LIKE '%$keyword%' GROUP BY b.id,b.judul,b.kategory,b.harga,b.img ORDER BY b.judul ASC
    ";
    return query($query);
}
function filtermanga($kategory){
    $query = "SELECT b.id, b.judul, b.author, b.kategory,b.harga,b.halaman,
    GROUP_CONCAT(g.genre_name SEPARATOR ', ') AS genres
    FROM buku b
    JOIN buku_genre bg ON b.id = bg.id_buku
    JOIN genre g ON bg.id_genre = g.id WHERE b.kategory = '$kategory' GROUP BY b.id, b.judul,b.author,b.kategory,b.harga,b.halaman ORDER BY b.judul ASC";
    return query($query);
}
function genre($genre){
    $query = "SELECT b.id,b.judul,b.kategory,b.harga,b.img,
    GROUP_CONCAT(g.genre_name SEPARATOR ', ') AS genres
    FROM buku b
    JOIN buku_genre bg ON b.id = bg.id_buku
    JOIN genre g ON bg.id_genre = g.id WHERE bg.id_genre = $genre GROUP BY b.id,b.judul,b.kategory,b.harga,b.img";
    return query($query);
}
function filtername($nameaz){
    $query = "SELECT b.id, b.judul, b.author, b.kategory,b.harga,b.halaman,
    GROUP_CONCAT(g.genre_name SEPARATOR ', ') AS genres
    FROM buku b
    JOIN buku_genre bg ON b.id = bg.id_buku
    JOIN genre g ON bg.id_genre = g.id GROUP BY b.id, b.judul,b.author,b.kategory,b.harga,b.halaman ORDER BY b.judul ASC
    ";
    return query($query);
}
function filternameza($nameza){
    $query = "SELECT b.id, b.judul, b.author, b.kategory,b.harga,b.halaman,
    GROUP_CONCAT(g.genre_name SEPARATOR ', ') AS genres
    FROM buku b
    JOIN buku_genre bg ON b.id = bg.id_buku
    JOIN genre g ON bg.id_genre = g.id GROUP BY b.id, b.judul,b.author,b.kategory,b.harga,b.halaman ORDER BY b.judul DESC
    ";
    return query($query);
}

// Filter Harga
function filtermurah($murah){
    $query = "SELECT b.id, b.judul, b.author, b.kategory,b.harga,b.halaman,
    GROUP_CONCAT(g.genre_name SEPARATOR ', ') AS genres
    FROM buku b
    JOIN buku_genre bg ON b.id = bg.id_buku
    JOIN genre g ON bg.id_genre = g.id GROUP BY b.id, b.judul,b.author,b.kategory,b.harga,b.halaman ORDER BY b.harga ASC
    ";
    return query($query);
}
function filtermahal($mahal){
    $query = "SELECT b.id, b.judul, b.author, b.kategory,b.harga,b.halaman,
    GROUP_CONCAT(g.genre_name SEPARATOR ', ') AS genres
    FROM buku b
    JOIN buku_genre bg ON b.id = bg.id_buku
    JOIN genre g ON bg.id_genre = g.id GROUP BY b.id, b.judul,b.author,b.kategory,b.harga,b.halaman ORDER BY b.harga DESC
    ";
    return query($query);
}

// Hapus User
function hapus($id){
    global $con;
    
    mysqli_query($con,"DELETE from akun WHERE id = $id");
    return mysqli_affected_rows($con);
    
}
function hapusbuku($id){
    global $con;
    
    mysqli_query($con,"DELETE from buku WHERE id = $id");
    return mysqli_affected_rows($con);
    
}


// UPDATE DATA
    function updatebook($book){
        global $con;
        $id = $book["id"];
        $judul = $book["judul"];
        $author = $book["author"];
        $kategory = $book["kategory"];
        $harga = $book["harga"];
        
        $imglama = $book["imglama"];
        if($_FILES["img"]['error'] === 4){
            $img = $imglama;
        }else{
            $img = upload();
        }
      
        $query  ="UPDATE buku SET judul = '$judul', author = '$author',kategory = '$kategory', harga = $harga, img = '$img' WHERE id = $id";
        mysqli_query($con,$query);
        return mysqli_affected_rows($con);
    }

    // Update Akun
    function updateakun($row){
        global $con;
        $id = $row["id"];
        $username = $row["username"];
        $email = $row["email"];
        $number = $row["number"];

        $query  ="UPDATE akun SET username = '$username', email = '$email',number = $number WHERE id = $id";
        mysqli_query($con,$query);
        return mysqli_affected_rows($con);
    }

    // Buy Buku
    function updatestatus($buy){
        global $con;
        $id = $buy["id"];
        $statusnew = $buy["status"];
        $query = "UPDATE buy SET status = '$statusnew' WHERE id = $id";
        mysqli_query($con,$query);
        return mysqli_affected_rows($con);
       
    }
    
    function addbuku($addbuku){
        global $con;
        $judul = $addbuku["judul"];
        $author = $addbuku["author"];
        $harga = $addbuku["harga"];
        $halaman = $addbuku["halaman"];
        $bahasa = $addbuku["bahasa"];
        $kategory = $addbuku["kategory"];
        $stock = $addbuku["stock"];
    
    
        $img = upload();
        if(!$img){
            return false;
        }


        $query = "INSERT INTO buku(judul,author,harga,halaman,bahasa,img,kategory,stock) 
                  VALUES('$judul','$author',$harga,$halaman,'$bahasa','$img','$kategory',$stock)";
           mysqli_query($con,$query);
           return mysqli_affected_rows($con);
        
    }

    function upload(){
        
        $fileName = $_FILES ['img']['name'];
        $fileSize = $_FILES ['img']['size'];
        $error = $_FILES ['img']['error'];
        $tmpName = $_FILES ['img']['tmp_name'];

        if($error === 4){
            echo "<script>
                    alert('Pilih Gambar Terlebih Dahulu');
            </script>";
            return false;
        }
        //Cek Gambar yang diupload
        $ekstensiGambarvalid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode(".", $fileName );
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if(!in_array($ekstensiGambar,$ekstensiGambarvalid)){
            echo "<script>
                        alert('File Yang Anda Upload Bukan Gambar');
                </script>";
                return false; 
        }
        
        // Cek Ukuran Gambar
        if($fileSize > 2000000){
            echo "<script>
                        alert('Ukuran Gambar Terlalu Besar');
                </script>";
                return false;
        }

        // Move Gambar Setelah Lolos Di Cek
        // Membuat Nama Gambar Baru
        $newFileName = uniqid();
        $newFileName .= '.';
        $newFileName .= $ekstensiGambar;
        move_uploaded_file($tmpName,'img/book/' . $newFileName);
        return $newFileName;
    }

    
?>

