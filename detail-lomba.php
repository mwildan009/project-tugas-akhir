<?php include 'header.php' ?>

<div class="section">
    <div class="container">

        <?php

            $lomba = mysqli_query($conn, "SELECT * FROM lomba WHERE id = '".$_GET['id']."' ");

                if(mysqli_num_rows($lomba) == 0) {
                    echo "<script>window.location='index.php'</script>";
            }

                $p        = mysqli_fetch_object($lomba);

        ?>
        <h3 class="text-center"><?= $p->nama ?></h3>
        <img src="uploads/lomba/<?= $p->gambar ?>" width="100%" class="image">
        <?= $p->keterangan ?>
</div>
</div>

<?php include 'footer.php'; ?>
