<?php
    session_start();
    include '../koneksi.php';
    if(!isset($_SESSION['status_login'])){
        echo "<script>window.location = '../login.php?msg=Harap Login Terlebih Dahulu!'</script>";
    }
    if($_SESSION['ulevel'] == "Siswa"){
        echo "<script>window.location = '/sekolah/siswa/'</script>";
    }
    date_default_timezone_set("Asia/Pontianak");
    $identitas = mysqli_query($conn, "SELECT * FROM pengaturan ORDER BY id DESC LIMIT 1");
    $d = mysqli_fetch_object($identitas);
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="icon" href="../uploads/identitas/<?= $d->favicon ?>">
        <title>Panel admin - <?= $d->nama ?></title>
        <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="../assets/css/quis.css" />
        <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    </head>       
    <script>
        tinymce.init({
            selector: '#keterangan'
        });
    </script>
    <body class="bg-light">
        <div class="navbar">
        <div class="container">
        <h2 class="nav-brand float-left"><a href="index.php">SMP MUHAMMADIYAH</a></h2>
        <ul class="nav-menu float-left">
            <li><a href="index.php">Dashboard</a></li>
            <?php if($_SESSION['ulevel'] == 'Super Admin') : ?>
            <li><a href="pengguna.php">Pengguna</a></li>
            
            <?php elseif($_SESSION['ulevel'] == 'Admin') : ?>
            <li><a href="lomba.php">lomba</a></li>    
            <li><a href="galeri.php">galeri</a></li>
            <li><a href="informasi.php">informasi</a></li>
            <li><a href="datapeserta.php">data peserta</a></li>
            <li>
                <a href="#">Pengaturan <i class="fa fa-caret-down"></i></a>
                <ul class="dropdown">
                    <li><a href="identitas-sekolah.php">Identitas Sekolah</a></li>
                    <li><a href="tentang-sekolah.php">Tetang Sekolah</a></li>
                    <li><a href="kepala-sekolah.php">Kepala Sekolah</a></li>
                    <li><a href="soal-ujian-masuk.php">Ujian Masuk</a></li>
                </ul>
            </li>
            <?php elseif($_SESSION['ulevel'] == 'Siswa') : ?>
            <li><a href="pengerjaan-soal.php">Ujian Masuk</a></li>
            <li><a href="pendaftaran.php">Pendaftaran</a></li>
            <?php endif ?>
            <li>
                <a href="#"><?=$_SESSION['uname'] ?> (<?= $_SESSION['ulevel'] ?>) <i class="fa fa-caret-down"></i></a>
                <ul class="dropdown">
                    <li><a href="ubah-password.php">Ubah Password</a></li>
                    <li><a href="logout.php">keluar</a></li>
                </ul>
            </li>
        </ul>
        <div class="clearfix">
        </div>
        </div>
        </div>
