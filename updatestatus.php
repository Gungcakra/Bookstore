<?php
require 'function.php';
$id = $_GET["id"];
$buy = query("SELECT * FROM buy WHERE id = $id")[0];
if(isset($_POST["update"])){
    $statusnew = $_POST["status"];
    $query = "UPDATE buy SET status = '$statusnew' WHERE id = $id";
    mysqli_query($con,$query);

    if(($_POST)>0){
        echo "<script>
        alert('Data Berhasil Diubah');
        window.location.href='orderdata.php';
    </script>";
      }else{
        echo "<script>
        alert('Data Gagal Diubah');
        window.location.href='orderdata.php';
    </script>";
      }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Status</title>
</head>
<body>
    <form action="" method="post" >
    <label for="iduser">Id User</label>
    <input type="text" readonly name="iduser" id="iduser" value="<?=  $buy["user_id"]?>">
    <br>
    <label for="iduser">Username</label>
    <input type="text" readonly name="username" id="username" value="<?=  $buy["username"]?>">
    <br>
    <label for="idbuku">Book Id</label>
    <input type="text" readonly name="idbuku" id="idbuku" value="<?=  $buy["book_id"]?>">
    <br>
    <label for="namabuku">Book Name</label>
    <input type="text" readonly name="namabuku" id="namabuku" value="<?=  $buy["book_name"]?>">
    <br>
    <label for="status">Status</label>
    <select name="status" id="">
        <option value="<?= $buy["id"] ?>">Waiting For Confirm</option>
        <option value="Confirmed">Confirm</option>
        <option value="Rejected">Reject</option>
    </select>
    
    <br>
    <input type="submit" name="update" id="" value="Update">
</form>
</body>
</html>