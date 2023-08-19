<?php
require 'function.php';
$id = $_GET["id"];

if(hapus($id)>0){
    echo "<script>alert('Akun telah dihapus')</script>";
    header("Location: user.php");
    exit;
}else{
    echo "<script>alert('Akun gagal dihapus')</script>";
    header("Location: user.php");
    exit;
}


?>