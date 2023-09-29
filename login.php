<?php
    session_start();

    if(isset($_SESSION['uid'])){
        if($_SESSION['uid']!=null){
            if($_SESSION['ulevel'] != "Siswa"){
                echo "<script>window.location = '/sekolah/admin/'</script>";
            }else{
                echo "<script>window.location = '/sekolah/siswa/'</script>";
            }
        }
    }
    include 'database/database.php';
    include 'database/user_controller.php';
    $db = new Database();
    $controller = new UserController($db->DBConnect());
    if(isset($_POST['submit'])){
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        if($user=$controller->login($user,$pass)){
            $_SESSION['status_login'] = true;
            $_SESSION['uid']          = $user->id;
            $_SESSION['uname']        = $user->username;
            $_SESSION['ulevel']       = $user->level;
            if($user->level != "Siswa"){
                header("location:/sekolah/admin/index.php");
            }else{
                header("location:/sekolah/siswa/index.php");
            }
        }else{
            echo "<script>alert('Username atau password salah')</script>";
        }
    }
?>


<!DOCTYPE html>
<html>
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>LOGIN</title>
        <link rel="stylesheet" href="style.css">
        <style>
            
            .box-footer{
                text-align: center;
                background-color: #f2f2f2;
                text-decoration: none;
                padding: 16px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                width: 100%;
                font-weight: bold;
            }
            .box-footer:hover{
                background-color: #ddd;
                color: black;
                transition: cubic-bezier(0.075, 0.82, 0.165, 1);
            }
        </style>
</head>
    <body>
        <div class="container">
            <div class="box">
                <form action="" method="POST" class="login-email">
                    <p style="font-size:2rem;font-weight:850;">Log in</p> 
                    <div class="input-group"><input type="text" placeholder="UserName" name="user" required></div>
                    <div class="input-group"><input type="password" placeholder="Password" name="pass" required></div>
                    <div class="input-group"><button name="submit" class="btn">Log in</button></div>
                    <p class="login-register-text">Don't Have an Account?<a href="register.php">Register</a></p>
                </form>
                <a href="index.php" class="box-footer text-center">Halaman Utama</a>
            </div>
        </div>
    </body>
</html>
