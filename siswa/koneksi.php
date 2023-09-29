<?php
    $conn = mysqli_connect('localhost', 'root', '', 'db_sekolah');

    if(!$conn){
        echo 'error : '.mysqli_connect_error($conn);
    }
?>