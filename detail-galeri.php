<?php include 'header.php' ?>

<div class="section">
    <div class="container">

        <?php

            $galeri = mysqli_query($conn, "SELECT * FROM galeri WHERE id = '".$_GET['id']."' ");

                if(mysqli_num_rows($galeri) == 0) {
                    echo "<script>window.location='index.php'</script>";
            }

                $j        = mysqli_fetch_object($galeri);

        ?>
       <h3 class="text-center"><?= $j->keterangan ?></h3>
        <img src="uploads/galeri/<?= $j->foto ?>" width="100%" class="image">
        <?= $j->keterangan ?>
</div>
</div>

<?php include 'footer.php'; ?>
