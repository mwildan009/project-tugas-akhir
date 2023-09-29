<?php 
include 'header.php';
include '../database/database.php';
include '../database/controller.php';

$db = new Database();
$controller = new Controller($db->DBConnect());
$id = $_GET['id'];
$p = $controller->tampil_data_id('tb_pendaftaran','id_pendaftaran',$id);


?>
<!-- bagian content -->
<section class="content">
    <h2>Detail Peserta</h2>
    <div class="box-header">
        
    <table class="table-data" border="0">
        <tr>
            <td>Kode Pendaftaran</td>
            <td>:</td>
            <td><?php echo $p->id_pendaftaran ?></td>
        </tr>
        <tr>
            <td>Tahun Ajaran</td>
            <td>:</td>
            <td><?php echo $p->th_ajaran ?></td>
        </tr>
        <tr>
            <td>Nama Lengkap</td>
            <td>:</td>
            <td><?php echo $p->nm_peserta ?></td>
        </tr>
        <tr>
            <td>Hobby</td>
            <td>:</td>
            <td><?php echo $p->hobby ?></td>
        </tr>
        <tr>
            <td>Tempat, Tanggal Lahir</td>
            <td>:</td>
            <td><?php echo $p->tmp_lahir.','.$p->tgl_lahir ?></td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td><?php echo $p->jk ?></td>
        </tr>
        <tr>
            <td>Agama</td>
            <td>:</td>
            <td><?php echo $p->agama ?></td>
        </tr>
        <tr>
            <td>Alamat Peserta</td>
            <td>:</td>
            <td><?php echo $p->almt_peserta ?></td>
        </tr>
        <tr>
            <td>Asal Sekolah</td>
            <td>:</td>
            <td><?php echo $p->asl_sekolah ?></td>
        </tr>
        <tr>
            <td>No Hp</td>
            <td>:</td>
            <td><?php echo $p->no_hp ?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td>:</td>
            <td><?php echo $p->email ?></td>
        </tr>
        <tr>
            <td>Nama Ayah</td>
            <td>:</td>
            <td><?php echo $p->nm_ayah ?></td>
        </tr>
        <tr>
            <td>Pekerjaan Ayah</td>
            <td>:</td>
            <td><?php echo $p->pekerjaan_ayah ?></td>
        </tr>
        <tr>
            <td>Nama Ibu</td>
            <td>:</td>
            <td><?php echo $p->nm_ibu ?></td>
        </tr>
        <tr>
            <td>Pekerjaan Ibu</td>
            <td>:</td>
            <td><?php echo $p->pekerjaan_ibu ?></td>
        </tr>
        <tr>
            <td>Alamat Orangtua</td>
            <td>:</td>
            <td><?php echo $p->almt_orangtua ?></td>
        </tr>
        <tr>
            <td>Kartu Keluarga</td>
            <td>:</td>
            <td><img src="../uploads/berkas/<?= $p->file_kk?>" alt="" srcset=""></td>
        </tr>
        <tr>
            <td>Akta</td>
            <td>:</td>
            <td><img src="../uploads/berkas/<?= $p->file_akta?>" alt="" srcset=""></td>
        </tr>
        <tr>
            <td>Foto</td>
            <td>:</td>
            <td><img src="../uploads/berkas/<?= $p->file_foto?>" alt="" srcset=""></td>
        </tr>
        <tr>
            <td>Nilai Test Masuk</td>
            <td>:</td>
            <td><?php echo $p->nilai ?></td>
        </tr>
        <tr>
            <td>Status</td>
            <td>:</td>
            <td style="font-weight: bold;"><?php echo $p->status ?></td>
        </tr>
    </table>
    
    <td><button type="button" class="btn" onclick="window.location = 'datapeserta.php'">Kembali</button></td> 

    </div>  
<section>
<?php include 'footer.php' ?>