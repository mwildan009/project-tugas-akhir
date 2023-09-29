<?php 
    include 'header.php';
    include '../database/database.php';
    include '../database/controller.php';
    if($_SESSION['ulevel'] == 'Siswa'){
        $db = new Database();
        $controller = new Controller($db->DBConnect());
        $cekPendaftaran = $controller->cekPendaftaranPengguna($_SESSION['uid']);
    }
    
?>
<body style="margin-top: 20vh;">
    <section class="box-formulir" id="text-center">
        <!-- bagian form -->
        <?php if($cekPendaftaran!=null): ?>
            <?='<script>window.location="berhasil.php?id='.$cekPendaftaran->id_pendaftaran.'"</script>';?>
        <?php elseif($_SESSION['ulevel']!='Siswa'): ?>
            <h2 class="text-center">Anda Tidak Dapat Mengakses Halaman Ini !</h2>
        <?php else: ?>
            <h2 class="text-center">Formulir Pendaftaran Siswa Baru</h2>
        <form action="tambah-pendaftaran.php" method="post" enctype="multipart/form-data" >
            <div class="box">
                <table border="0" class="table-form">
                    <tr>
                        <td>Tahun Ajaran</td>
                        <td>:</td>
                        <td>
                            <input type="text" name="th_ajaran" class="input-control" value="2023/2034" readonly>
                        </td>
                    </tr>
                </table>
                </div>
                <h3 class="text-center">Data Diri Calon Siswa</h3>
                <div class="box">
                    <table border="0" class="table-form">
                        <tr>
                            <td>Nama Lengkap</td>
                            <td>:</td>
                            <td>
                                <input type="text" name="nm" class="input-control" required>
                            </td>
                        </tr>
                        <tr>
                            <td>Hobby</td>
                            <td>:</td>
                            <td>
                                <input type="text" name="hobby" class="input-control" required>
                            </td>
                        </tr>
                        <tr>
                            <td>Tempat Lahir</td>
                            <td>:</td>
                            <td>
                                <input type="text" name="tmp_lahir" class="input-control" required>
                            </td>
                        </tr>
                        <tr>
                            <td>Tanggal Lahir</td>
                            <td>:</td>
                            <td>
                                <input type="date" name="tgl_lahir" class="input-control" required>
                            </td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>:</td>
                            <td>
                                <input type="Radio" name="jk" class="input-control" value="Laki-laki" required> Laki-laki &nbsp;&nbsp;&nbsp;
                                <input type="Radio" name="jk" class="input-control" value="Perempuan" required> Perempuan
                            </td>
                        </tr>
                        <tr>
                            <td>Agama</td>
                            <td>:</td>
                            <td>
                                <select class="input-control" name="agama" required>
                                    <option value="">--Pilih--</option>
                                    <option value="Islam">--Islam--</option>
                                    <option value="Kristen">--Kristen--</option>
                                    <option value="Hindu">--Hindu--</option>
                                    <option value="Buddha">--Buddha--</option>
                                    <option value="Katolik">--Katolik--</option>
                                    <option value="Khonghucu">--Khonghucu--</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Alamat Lengkap</td>
                            <td>:</td>
                            <td>
                            <textarea class="input-control" name="alamat" required></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>Asal Sekolah</td>
                            <td>:</td>
                            <td>
                                <input type="text" name="asl_sekolah" class="input-control" required>
                            </td>
                        </tr>
                        <tr>
                            <td>No HP</td>
                            <td>:</td>
                            <td>
                                <input type="text" name="no_hp" class="input-control" required>
                            </td>
                        </tr>
                        <tr>
                            <td>Alamat Email</td>
                            <td>:</td>
                            <td>
                                <input type="text" name="email" class="input-control" required>
                            </td>
                        </tr>
        
                    </table>
                </div>
                <h3 class="text-center">Data Orang Tua</h3>
                <div class="box">
                    <table border="0" class="table-form">
                        <tr>
                            <td>Nama Ayah</td>
                            <td>:</td>
                            <td>
                                <input type="text" name="nm_ayah" class="input-control" required>
                            </td>
                        </tr>
                        <tr>
                            <td>Pekerjaan Ayah</td>
                            <td>:</td>
                            <td>
                                <input type="text" name="pekerjaan_ayah" class="input-control" required>
                            </td>
                        </tr>
                        <tr>
                            <td>Nama Ibu</td>
                            <td>:</td>
                            <td>
                                <input type="text" name="nm_ibu" class="input-control" required>
                            </td>
                        </tr>
                        <tr>
                            <td>Pekerjaan Ibu</td>
                            <td>:</td>
                            <td>
                                <input type="text" name="pekerjaan_ibu" class="input-control" required>
                            </td>
                        </tr>
                        <tr>
                            <td>Alamat Orang Tua</td>
                            <td>:</td>
                            <td>
                            <textarea class="input-control" name="almt_orangtua" required></textarea>
                            </td>
                        </tr>
                </table>
                <h3 class="text-center">Berkas Pendaftaran</h3>
                <div class="box">
                    <table border="0" class="table-form">
                        <tr>
                            <td>Kartu Keluarga</td>
                            <td>:</td>
                            <td>
                                <input type="file" name="kk" class="input-control" required>
                            </td>
                        </tr>
                        <tr>
                            <td>Akta Kelahiran</td>
                            <td>:</td>
                            <td>
                                <input type="file" name="akta" class="input-control" required>
                            </td>
                        </tr>
                        <tr>
                            <td>Foto</td>
                            <td>:</td>
                            <td>
                                <input type="file" name="foto" class="input-control" required>
                            </td>
                        </tr>
                        
                        <tr>
                            <td></td>
                            <td>:</td>
                            <td>
                                <input type="submit" name="submit" class="btn-daftar" value="Daftar Sekarang">
                            </td>
                        </tr>
                </table>
            </div>
        </form>
        <?php endif; ?>
    </section>  
</body>
<?php include 'footer.php'; ?>
