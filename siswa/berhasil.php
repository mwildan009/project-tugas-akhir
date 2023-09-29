<?php 
    include 'header.php';
?>

<body>
    <section class="box-formulir" id="text-center">
       <h2>Pendaftaran Berhasil</h2>
       <div class="box">
            <h4>Kode Pendaftaran Anda adalah <?php echo $_GET['id'] ?></h4>
            <a href="cetak-bukti.php?id=<?php echo $_GET['id'] ?>" target="_blank" class="btn-cetak">Cetak Bukti Pendaftaran</a>
            <a href="pengerjaan-soal.php" target="_blank" class="btn-cetak">Isi Soal Berikut</a>
       </div>
    </section>

</body>




