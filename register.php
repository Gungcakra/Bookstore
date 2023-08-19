<?php
$con = mysqli_connect("localhost", "root", "", "perpustes");


if(isset($_POST["submit"])){
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $number = $_POST["number"];
    $gender = $_POST["gender"];
    $level = $_POST["level"];

    $query = "INSERT INTO akun(username,email,password,number,level,gender) VALUES('$username','$email','$password','$number','$level','$gender')";
    mysqli_query($con,$query);

    if(($_POST)>0){
        echo "<script>
    alert('Registrasi Berhasil');
    window.location.href='login.php';
</script>";
}else{
    echo "<script>
    alert('Registrasi Gagal');
    window.location.href='register.php';
</script>";
    }
}



?>




<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">


<div class="modal fade " id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" action="" method="post" >
                                
                                <div class="form-group">
                                    <input type="text" class="form-control" name="username" id="exampleInputtext1" placeholder="Enter username" autocomplete="off">
                                  </div>

                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" autocomplete="off">
                                  </div>

                                  <div class="form-group">
                                    <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password" autocomplete="off">
                                  </div>

                                  <div class="form-group">
                                    <input type="text" class="form-control"  name="number"  id="exampleInputtext1" placeholder="Enter phone number" autocomplete="off">
                                  </div>

                                  
                                  
                                <div class="input-group mb-3">
                                    <select class="custom-select" id="inputGroupSelect02" name="level">
                                        <option>Select Level</option>
                                        <option value="User" >User</option>
                                        <option value="Admin">Admin</option>
                                        <option value="Operator">Operator</option>
                                       
                                    </select>
                                    <div class="input-group-append">
                                        <label class="input-group-text" for="inputGroupSelect02">Level</label>
                                    </div>
                                </div>
                                <h6>Gender</h6>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault1" value="Laki-Laki">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                      Laki-Laki
                                    </label>
                                  </div>
                                  <div class="form-check form-check-inline" >
                                    <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault2" value="Perempuan">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                      Perempuan
                                    </label>
                                  </div>
                                <input type="submit" name ="submit" href="login.html" class="btn btn-primary btn-user btn-block mt-3" value="Register" >
                                <hr>
                                <!-- <a href="index.html" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Register with Google
                                </a>
                                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                                </a> -->
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.php">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>