<?php 
    
    $conn = mysqli_connect('localhost', 'root', '', 'db_sekolah');

    
?>
<head>
<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
</head>

<script>
    window.print();
</script>

<body>

    <h2 class="cetakk">Laporan Calon Siswa</h2>
    <table class="table-peserta" border="1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Id Pendaftaran</th>
                    <th>Nilai Test</th>
                    <th>Nama</th>
                    <th>Hobby</th>
                    <th>Tempat, Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Agama</th>
                    <th>Alamat</th>
                    <th>No HP</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $no = 1;
                    $list_peserta = mysqli_query($conn, "SELECT * FROM tb_pendaftaran");
                    while($row = mysqli_fetch_array($list_peserta)) {
                ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $row['id_pendaftaran'] ?></td>
                    <td><?php echo $row['nilai'] ?></td>
                    <td><?php echo $row['nm_peserta'] ?></td>
                    <td><?php echo $row['hobby'] ?></td>
                    <td><?php echo $row['tmp_lahir'].', '.$row ['tgl_lahir'] ?></td>
                    <td><?php echo $row['jk'] ?></td>
                    <td><?php echo $row['agama'] ?></td>
                    <td><?php echo $row['almt_peserta'] ?></td>
                    <td><?php echo $row['no_hp'] ?></td>
                    <td><?php echo $row['email'] ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        

</body>


