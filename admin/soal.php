<?php 
    include 'header.php';
    include '../database/database.php';
    include '../database/controller.php';
    

    $db = new Database();
    $soal = "";
    $opsiA = "";
    $opsiB = "";
    $opsiC = "";
    $jawaban = "";

    $controller = new Controller($db->DBConnect()); 

    if(isset($_GET['idSoal'])){
        $id = $_GET['idSoal'];
        $data = $controller->tampil_data_id('ujian_masuk','id',$id);
        $soal = $data->soal;
        $opsiA = $data->opsiA;
        $opsiB = $data->opsiB;
        $opsiC = $data->opsiC;

        if($data->jawaban == $opsiA){
            $jawaban = 'a';
        }else if($data->jawaban == $opsiB){
            $jawaban = 'b';
        }else if($data->jawaban == $opsiC){
            $jawaban = 'c';
        }

        if(isset($_POST['submit'])){
            $soal = $_POST['soal'];
            $opsiA = $_POST['opsiA'];
            $opsiB = $_POST['opsiB'];
            $opsiC = $_POST['opsiC'];
            $jawaban = $_POST['jawaban'];


            if($jawaban == 'a'){
                $jawaban = $opsiA;
            }else if($jawaban == 'b'){
                $jawaban = $opsiB;
            }else if($jawaban == 'c'){  
                $jawaban = $opsiC;
            }

            $formData = array(
                    'soal' => $soal,
                    'opsiA' => $opsiA,
                    'opsiB' => $opsiB,
                    'opsiC' => $opsiC,
                    'jawaban' => $jawaban
                );
        
            $edit = $controller->edit_data('ujian_masuk',$formData,'id',$id);
            if($edit){
                echo "<script>window.location = 'soal-ujian-masuk.php?msg=Berhasil Edit Soal'</script>";
            }else{
                echo "<script>window.location = 'soal-ujian-masuk.php?msg=Gagal Edit Soal'</script>";
            }
        }
    }else{
        if(isset($_POST['submit'])){
            $soal = $_POST['soal'];
            $opsiA = $_POST['opsiA'];
            $opsiB = $_POST['opsiB'];
            $opsiC = $_POST['opsiC'];
            $jawaban = $_POST['jawaban'];
            if($jawaban == 'a'){
                $jawaban = $opsiA;
            }else if($jawaban == 'b'){
                $jawaban = $opsiB;
            }else if($jawaban == 'c'){  
                $jawaban = $opsiC;
            }
            $formData = array(
                array(
                    'soal' => $soal,
                    'opsiA' => $opsiA,
                    'opsiB' => $opsiB,
                    'opsiC' => $opsiC,
                    'jawaban' => $jawaban
                )
            );
            $tambah = $controller->tambah_data('ujian_masuk',$formData);
            if($tambah){
                echo "<script>window.location = 'soal-ujian-masuk.php?msg=Berhasil Tambah Soal'</script>";
            }else{
                echo "<script>window.location = 'soal-ujian-masuk.php?msg=Gagal Tambah Soal'</script>";
            }
        }
    }
    
?>
<!-- content -->
<div class="content">
    <div class="container">
        <div class="box">
            <div class="box-header">
            <?php
                if(isset($_GET['idSoal'])){
                    echo "<h2>Edit Soal</h2>";
                }else{
                    echo "<h2>Tambah Soal</h2>";
                }
            ?>
            </div>
            <div class="box-body">
                <form action="" method="POST">
                    <input type="hidden" name="id" value="<?= $id ?>">
                    <div class="form-group">
                        <label>Soal</label>
                        <textarea type="text" name="soal" placeholder="Soal" class="input-control" required><?= $soal ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Opsi A</label>
                        <input type="text" name="opsiA" class="input-control" value="<?= $opsiA ?>" placeholder="Opsi A">
                    </div>
                    <div class="form-group">
                        <label>Opsi B</label>
                        <input type="text" name="opsiB" class="input-control" value="<?= $opsiB ?>" placeholder="Opsi B">
                    <div class="form-group">
                        <label>Opsi C</label>
                        <input type="text" name="opsiC" class="input-control" value="<?= $opsiC?>" placeholder="Opsi C">
                    </div>
                    <div class="form-group">
                        <label>Kunci Jawaban</label>
                        <select name="jawaban" id=""  class="input-control">
                            <option value="a" 
                            <?php
                                if($jawaban == 'a'){
                                    echo "selected";
                                }
                            ?> style="width: 100%;">A</option>
                            <option value="b" 
                            <?php
                                if($jawaban == 'b'){
                                    echo "selected";
                                }
                            ?>
                            style="width: 100%;">B</option>
                            <option value="c" 
                            <?php
                                if($jawaban == 'c'){
                                    echo "selected";
                                }
                            ?>
                            style="width: 100%;">C</option>
                        </select>
                    </div>
                    <button type="button" class="btn" onclick="window.location = 'soal-ujian-masuk.php'">Kembali</button>
                    <input type="submit" name="submit" value="Simpan" class="btn btn-blue">
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php' ?>