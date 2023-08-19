<?php
session_start();
require 'function.php';
// $id = $_SESSION["id"];
// $username = $_SESSION["username"];
// $email = $_SESSION["email"];
// $number = $_SESSION["number"];


// $query = query("SELECT * FROM akun WHERE id = $id");

if(isset($_POST["update"])){
    if(updateakun($_POST)>0){
        echo "<script>
        alert('Data Berhasil DiUbah');
        window.location.href='landing.php';
    </script>";
    }else{
        echo "<script>
            alert('Data Gagal DiUbah');
            window.location.href='landing.php';
        </script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
</head>
<body>
    
    <form action="" method="post">
        
        <input type="text" name="id" value = <?= $_SESSION["id"]; ?>>
        <input type="text" name="username" value = <?= $_SESSION["username"]; ?>>
        <input type="text" name="email" value = <?= $_SESSION["email"]; ?>>
        <input type="text" name="number" value = <?= $_SESSION["number"]; ?>>

        <button type="submit" name="update">Update</button>
    </form>
</body>
</html>