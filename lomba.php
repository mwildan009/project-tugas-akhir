<?php include 'header.php' ?>

<div class="section">
    <div class="container">

        <h3 class="text-center">Lomba</h3>
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

<?php include 'footer.php'; ?>
