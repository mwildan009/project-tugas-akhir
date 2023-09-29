<?php
    require "database/database.php";
    require "database/user_controller.php";
    require "database/controller.php";
    $db = new Database();
    $controller = new UserController($db->DBConnect());
    $c = new Controller($db->DBConnect());
    if(isset($_POST['submit'])){
        $nama = $_POST['nama'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $cppassword = $_POST['cppassword'];
        if($password == $cppassword){
            if($c->tampil_data_id('pengguna','username',$username)==null){
                if($controller->register($nama,$username,$password)){
                    echo "<script>alert('Register Berhasil')</script>";
                }else{
                    echo "<script>alert('Register Gagal')</script>";
                }
            }else{
                echo "<script>alert('Username telah digunakan')</script>";

            }
        }else{
            echo "<script>alert('Password Tidak Sama')</script>";
        }

    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>Register</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="container">
            <form action="" method="POST" class="login-email">
                <p style="font-size:2rem;font-weight:900;">REGISTER</p> 
                <div class="input-group"><input type="text" placeholder="Nama" name="nama"></div>
                <div class="input-group"><input type="text" placeholder="UserName" name="username"></div>
                <div class="input-group"><input type="password" placeholder="Password" name="password"></div>
                <div class="input-group"><input type="password" placeholder="Confirm Password" name="cppassword"></div>
                <div class="input-group"><button name="submit" class="btn">Register</button></div>
                <p class="login-register-text">Have an Account?<a href="login.php">Log in</a></p>
            </form>
        </div>
    </body>
</html>