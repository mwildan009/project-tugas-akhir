<?php
    session_start();
    include 'koneksi.php';
    include '../database/database.php';
    include '../database/controller.php';
    $db = new Database();
    $controller = new Controller($db->DBConnect());

    if(isset($_POST['submit'])){
        // ambil 1 id terbesar di kolom id_pendaftaran, lalu ambil 5 karakter aja dari sebelah kanan
        $getMaxID = mysqli_query($conn, "SELECT MAX(RIGHT(id_pendaftaran, 5)) AS id FROM tb_pendaftaran");
        $d = mysqli_fetch_object($getMaxID);
        $generateId = 'P'.date('Y').sprintf("%05s", $d->id + 1);
        echo $generateId;

        // Handle unggah foto
        $fotoname = $_FILES['foto']['name'];
        $tmpfotoname = $_FILES['foto']['tmp_name'];
        $fotosize = $_FILES['foto']['size'];
        $formatfoto = pathinfo($fotoname, PATHINFO_EXTENSION);
        $renameFoto = 'foto' . time() . '.' . $formatfoto;

        // Handle unggah KK
        $kkname = $_FILES['kk']['name'];
        $tmpkkname = $_FILES['kk']['tmp_name'];
        $kksize = $_FILES['kk']['size'];
        $formatkk = pathinfo($kkname, PATHINFO_EXTENSION);
        $renameKK = 'kk' . time() . '.' . $formatkk;

        // Handle unggah Akta
        $aktaname = $_FILES['akta']['name'];
        $tmpaktaname = $_FILES['akta']['tmp_name'];
        $aktasize = $_FILES['akta']['size'];
        $formatakta = pathinfo($aktaname, PATHINFO_EXTENSION);
        $renameAkta = 'akta' . time() . '.' . $formatakta;

        $allowedFileTypes = array('png', 'jpg', 'jpeg'); // tambahkan tipe file yang diizinkan sesuai kebutuhan
        $data = array(
            array(
                'id_pendaftaran' => $generateId,
                'pengguna_id' => $_SESSION['uid'],
                'tgl_daftar' => date('Y-m-d'),
                'th_ajaran' => $_POST['th_ajaran'],
                'nm_peserta'=>$_POST['nm'],
                'hobby'=>$_POST['hobby'],
                'tmp_lahir'=>$_POST['tmp_lahir'],
                'jk'=>$_POST['jk'],
                'agama'=>$_POST['agama'],
                'almt_peserta'=>$_POST['alamat'],
                'asl_sekolah'=>$_POST['asl_sekolah'],
                'no_hp'=>$_POST['no_hp'],
                'email'=>$_POST['email'],
                'nm_ayah'=>$_POST['nm_ayah'],
                'pekerjaan_ayah'=>$_POST['pekerjaan_ayah'],
                'nm_ibu'=>$_POST['nm_ibu'],
                'pekerjaan_ibu'=>$_POST['pekerjaan_ibu'],
                'almt_orangtua'=>$_POST['almt_orangtua'],
                'file_kk'=>$renameKK,
                
                'file_akta'=>$renameAkta,
                'file_foto'=>$renameFoto,
            )
        );
        // Cek apakah tipe file KK, Akta, dan Foto diizinkan
        if (in_array($formatkk, $allowedFileTypes) && in_array($formatakta, $allowedFileTypes) && in_array($formatfoto, $allowedFileTypes)) {
            // Pindahkan file KK, Akta, dan Foto ke lokasi yang diinginkan
            move_uploaded_file($tmpkkname, '../uploads/berkas/' . $renameKK);
            move_uploaded_file($tmpaktaname, '../uploads/berkas/' . $renameAkta);
            move_uploaded_file($tmpfotoname, '../uploads/berkas/' . $renameFoto);
            $insert = $controller->tambah_data('tb_pendaftaran',$data);
            if($insert){
                echo '<script>window.location="berhasil.php?id='.$generateId.'"</script>';
            }else{
             
            }
        } else {
            // Tipe file tidak diizinkan, beri respon sesuai kebutuhan.
            echo "Tipe file yang diunggah tidak diizinkan.";
        }

       


    }
?>