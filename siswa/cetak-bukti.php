<?php 
    include '../database/database.php';
    include '../database/controller.php';
    $db = new Database();
    $controller = new Controller($db->DBConnect());
    $peserta = $controller->tampil_data_id('tb_pendaftaran','id_pendaftaran',$_GET['id']);
?>

<script>
    window.print();
</script>

<body>

    <h2 style="margin-top: 100px;">Bukti Pendaftaran</h2>
    <table class="table-data" border="0">
        <tr>
            <td>Kode Pendaftaran</td>
            <td>:</td>
            <td><?php echo $peserta->id_pendaftaran ?></td>
        </tr>
        <tr>
            <td>Tahun Ajaran</td>
            <td>:</td>
            <td><?php echo $peserta->th_ajaran ?></td>
        </tr>
        <tr>
            <td>Nama Lengkap</td>
            <td>:</td>
            <td><?php echo $peserta->nm_peserta ?></td>
        </tr>
        <tr>
            <td>Hobby</td>
            <td>:</td>
            <td><?php echo $peserta->hobby ?></td>
        </tr>
        <tr>
            <td>Tempat, Tanggal Lahir</td>
            <td>:</td>
            <td><?php echo $peserta->tmp_lahir.','.$peserta->tgl_lahir ?></td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td><?php echo $peserta->jk ?></td>
        </tr>
        <tr>
            <td>Agama</td>
            <td>:</td>
            <td><?php echo $peserta->agama ?></td>
        </tr>
        <tr>
            <td>Alamat Peserta</td>
            <td>:</td>
            <td><?php echo $peserta->almt_peserta ?></td>
        </tr>
        <tr>
            <td>Asal Sekolah</td>
            <td>:</td>
            <td><?php echo $peserta->asl_sekolah ?></td>
        </tr>
        <tr>
            <td>No Hp</td>
            <td>:</td>
            <td><?php echo $peserta->no_hp ?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td>:</td>
            <td><?php echo $peserta->email ?></td>
        </tr>
        <tr>
            <td>Nama Ayah</td>
            <td>:</td>
            <td><?php echo $peserta->nm_ayah ?></td>
        </tr>
        <tr>
            <td>Pekerjaan Ayah</td>
            <td>:</td>
            <td><?php echo $peserta->pekerjaan_ayah ?></td>
        </tr>
        <tr>
            <td>Nama Ibu</td>
            <td>:</td>
            <td><?php echo $peserta->nm_ibu ?></td>
        </tr>
        <tr>
            <td>Pekerjaan Ibu</td>
            <td>:</td>
            <td><?php echo $peserta->pekerjaan_ibu ?></td>
        </tr>
        <tr>
            <td>Alamat Orangtua</td>
            <td>:</td>
            <td><?php echo $peserta->almt_orangtua ?></td>
        </tr>
        <tr>
            <td>Kartu Keluarga</td>
            <td>:</td>
            <td><img src="../uploads/berkas/<?=$peserta->file_kk ?>" alt="" srcset=""></td>
        </tr>
        <tr>
            <td>Akta</td>
            <td>:</td>
            <td><img src="../uploads/berkas/<?=$peserta->file_akta ?>" alt="" srcset=""></td>
        </tr>
        <tr>
            <td>Foto</td>
            <td>:</td>
            <td><img src="../uploads/berkas/<?=$peserta->file_foto ?>" alt="" srcset=""></td>
        </tr>
    </table>    

</body>


