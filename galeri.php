<?php include 'header.php' ?>

<div class="section">
    <div class="container">

        <h3 class="text-center">Galeri</h3>
        <?php
                $galeri = mysqli_query($conn, "SELECT * FROM galeri ORDER BY id DESC");
                if(mysqli_num_rows($galeri) > 0){
                    while($j = mysqli_fetch_array($galeri)){
            ?>

            <div class="col-4">
            <a href="detail-galeri.php?id=<?= $j['id'] ?>" class="thumbnail-link">
            <div class="thumbnail-box">

                <div class="thumbnail-img" style="background-image: url('uploads/galeri/<?= $j['foto'] ?>');">

                </div>

                <div class="thumbnail-text">
                    <?= $j['keterangan'] ?>
                </div>

        </div>
        </a>
        </div>
        <?php }}else{ ?>

            tidak ada data

        <?php } ?>
</div>
</div>

<?php include 'footer.php'; ?>
