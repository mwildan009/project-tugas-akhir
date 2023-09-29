<?php 
    include 'header.php';
    include '../database/database.php';
    include '../database/controller.php';
    $db = new Database();
    $controller = new Controller($db->DBConnect());
    $soal = $controller->tampil_data('ujian_masuk');
?>
<!-- bagian content -->
<div style="padding: 20px;">
    <section class="content">
        <h2 style="margin-bottom: 20px;">Daftar Soal Ujian Masuk</h2>
        <div class="box-header">
            <a href="soal.php" class="text-green"><i class="fa fa-plus" style="margin: 20px;"></i>Tambah</a>
            <table class="table-peserta" border="1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Soal</th>
                        <th>Pilihan A</th>
                        <th>Pilihan B</th>
                        <th>Pilihan C</th>
                        <th>Jawaban</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;?>
                    <?php
                        foreach($soal as $row):
                    ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $row->soal ?></td>
                        <td><?php echo $row->opsiA ?></td>
                        <td><?php echo $row->opsiB ?></td>
                        <td><?php echo $row->opsiC ?></td>
                        <td><?php echo $row->jawaban ?></td>
                        <td>
                            <a href="soal.php?idSoal=<?php echo $row->id ?>"><i class="fa fa-edit"></i></a> ||
                            <a href="hapus-soal.php?id=<?php echo $row->id ?>" onclick="return confirm('Yakin ?')"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    <section>
</div>
<?php include 'footer.php' ?>