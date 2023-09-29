    <?php include 'header.php' ?>
    <!-- bagian banner -->
    <div class="banner" style="background-image: url('uploads/identitas/<?= $d->foto_sekolah ?>');">
        <div class="banner-text">
            <div class="container">
            <h3>Selamat Datang Di SMP MUHAMMADIYAH SINTANG</H3>
            <p>Sekolah Menengan Pertama dengan akreditas A.</p>
        </div>
        </div>
    </div>

    <!-- bagian sambutan -->
    <div class="section">
        
    <div class="container text-center">
        <h3>Sambutan Kepala Sekolah</h3>
        <img src="uploads/identitas/<?= $d->foto_kepsek ?>" width="100">
        <h4><?= $d->nama_kepsek ?></h4>
        <p><?= $d->sambutan_kepsek ?></p>
</div>
</div>

    <!-- bagian lomba -->

    <div class="section" id="lomba">
        <div class="container text-center">
            <h3>Lomba</h3>
            <?php
                $lomba = mysqli_query($conn, "SELECT * FROM lomba ORDER BY id DESC");
                if(mysqli_num_rows($lomba) > 0){
                    while($j = mysqli_fetch_array($lomba)){
            ?>

            <div class="col-4">
            <a href="detail-lomba.php?id=<?= $j['id'] ?>" class="thumbnail-link">
            <div class="thumbnail-box">

                <div class="thumbnail-img" style="background-image: url('uploads/lomba/<?= $j['gambar'] ?>');">

                </div>

                <div class="thumbnail-text">
                    <?= $j['nama'] ?>
                </div>

        </div>
        </a>
        </div>
        <?php }}else{ ?>
            tidak ada data
        <?php } ?>
    </div>
</div>

        <!-- bagian informasi-->
        <div class="section">

        <div class="container text-center">
            <h3>Informasi Terbaru</h3>
            <?php
                $informasi = mysqli_query($conn, "SELECT * FROM informasi ORDER BY id DESC LIMIT 8");
                if(mysqli_num_rows($informasi) > 0){
                    while($p = mysqli_fetch_array($informasi)){
            ?>

            <div class="col-4">
            <a href="detail-informasi.php?id=<?= $p['id'] ?>" class="thumbnail-link">
            <div class="thumbnail-box">

                <div class="thumbnail-img" style="background-image: url('uploads/informasi/<?= $p['gambar'] ?>');">

                </div>

                <div class="thumbnail-text">
                    <?= substr($p['judul'], 0, 1000) ?>
                </div>

        </div>
        </a>
        </div>
        <?php }}else{ ?>

            tidak ada data

        <?php } ?>
        </div>
        </div>
        <?php include 'footer.php' ?>
