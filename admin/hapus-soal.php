<?php 

include 'header.php';
include '../database/database.php';
include '../database/controller.php';

$db = new Database();
$controller = new Controller($db->DBConnect()); 




if(isset($_GET['id'])){
    $delete = $controller->hapus_data('ujian_masuk','id',$_GET['id']);
    if($delete){
        echo '<script>window.location="/sekolah/admin/soal-ujian-masuk.php"</script>';
    }
    echo '<script>window.location="/sekolah/admin/soal-ujian-masuk.php"</script>';
}else{
    echo '<script>window.location="/sekolah/admin/soal-ujian-masuk.php"</script>';
}

include 'footer.php';