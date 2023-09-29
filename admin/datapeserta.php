<?php 
    include 'header.php';
    include '../database/database.php';
    include '../database/controller.php';

    $db = new Database();
    $controller = new Controller($db->DBConnect());
    $list_peserta = $controller->tampil_data('tb_pendaftaran');

    if(isset($_POST['submit'])){
        $idPendaftar = $_POST['id_pendaftaran'];
        $status = $_POST['status'];
        
        $data = array(
            'status'=>$status
        );
        $edit = $controller->edit_data('tb_pendaftaran',$data,'id_pendaftaran',$idPendaftar);
        if($edit){
            echo '<script>window.location="/sekolah/admin/datapeserta.php?msg="berhasil mengubah data"</script>';
        }else{
            echo '<script>window.location="/sekolah/admin/datapeserta.php?msg="gagal mengubah data"</script>';
        }
    }
 ?>
<!-- bagian content -->
<section class="content">
    <style>
        /* Style the modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.5);
            padding: 10px;
        }

        /* Style the modal content */
        .modal-content {
            background-color: #fff;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 50%;
        }

        /* Style the close button */
        .close {
            position: absolute;
            right: 0;
            top: 0;
            padding: 10px;
            cursor: pointer;
            color: black;
        }

        /* Style the form */
        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
        }

        button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            margin-bottom: 20px;
            size: 12px;
        }

    </style>
    <h2>Data Peserta</h2>
    <div class="box-header">
        <a href="cetak-peserta.php" target="_blank" class="btn-cetak">Print</a>
        <table class="table-peserta" border="1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Id Pendaftaran</th>
                    <th>Nilai Test</th>
                    <th>Status</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $no = 1;
                    foreach ($list_peserta as $row) :
                ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $row->id_pendaftaran ?></td>
                    <td><?= $row->nilai ?></td>
                    <td><?= $row->status ?></td>
                    <td><?= $row->nm_peserta ?></td>
                    <td><?= $row->jk ?></td>
                    <td>
                        <a href="detailpeserta.php?id=<?= $row->id_pendaftaran ?>"><i class="fa fa-address-book"></i></a> ||
                        <a href="hapus-peserta.php?id=<?= $row->id_pendaftaran ?>" onclick="return confirm('Yakin ?')"><i class="fa fa-times"></i></a>
                        <a data-id="<?= $row->id_pendaftaran ?>" data-select="<?= $row->status ?>" class="btnStatus"><i class="fas fa-info-circle"></i></a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">X</span>
            <form id="myForm" method="POST">
                <label for="options">Pilih Status</label>
                <input type="hidden" name="id_pendaftaran" value="" id="pendaftaran_id">
                <select id="options" name="status" >
                    <option value="belum diverifikasi">Belum Diverifikasi</option>
                    <option value="lulus">Lulus</option>
                    <option value="tidak lulus">Tidak Lulus</option>
                </select>
                <button type="submit" name="submit">Simpan</button>
                <div style="margin: 10px;"></div>
            </form>
        </div>
    </div>    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function(){
            // Open the modal
            $(".btnStatus").click(function(e) {
                e.preventDefault();
                var id = $(this).data('id');
                var select = $(this).data('select');
                $('#myModal #myForm').trigger("reset");
                $("#pendaftaran_id").val(id);
                $('#myModal #myForm select[name="status"]').val(select);
                $("#myModal").css("display", "block");
            });

            // Close the modal when the close button is clicked
            $(".close").click(function() {
                $("#myModal").css("display", "none");
            });

            // Close the modal when the background is clicked
            $(window).click(function(event) {
                if (event.target === $("#myModal")[0]) {
                    $("#myModal").css("display", "none");
                }
            });
            
        });
    </script>
<section>
<?php include 'footer.php' ?>