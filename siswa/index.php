<?php include 'header.php' ?>
<!-- content -->
<style>
    .step1 {
        font-family: 'Times New Roman', serif;
    }
    .step {
        font-family: 'Times New Roman', serif;
        padding-top: 15px; 
        padding-bottom: 10px; 
    }
    .red-text {
        color: red;
    }
    .green-text {
        color: green;
    }
</style>
<div class="content">
    <div class="container">
        <div class="box">
            <div class="box-header">
                Dashboard
            </div>
            <div class="box-body">
                <h2>Selamat Datang <?= $_SESSION['uname'] ?> di panel Calon Siswa <?= $d->nama ?></h2><hr></hr>
                <h3 class="step red-text">Berikut Adalah Langkah-Langakah Pendaftaran</h3>
                <h4 class="step1 green-text">1. Masuk menu pendaftaran terlebih dahulu</h4>
                <h4 class="step1 green-text">2. Isi form pendaftaran sesuai keterangan</h4>
                <h4 class="step1 green-text">3. Setelah sudah di isi semua data calon siswa</h4>
                <h4 class="step1 green-text">4. Tekan tombol daftar sekarang</h4>
                <h4 class="step1 green-text">5. Cetak bukti pendaftaran</h4>
                <h4 class="step1 green-text">6. Setelah cetak bukti pendaftaran</h4>
                <h4 class="step1 green-text">7. Isi soal dan jawab dengan teliti</h4>
                <h4 class="step1 green-text">8. Setelah sudah dijawab semua soal</h4>
                <h4 class="step1 green-text">9. Nilai akan otomatis keluar</h4>

            </div>
        </div>
    </div>
</div>

<?php include 'footer.php' ?>