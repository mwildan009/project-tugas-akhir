<?php 
class Controller {

    protected $db;
  
    function __construct($db){
        $this->db = $db;
    }
    function tambah_data($tabel,$data)
    {
        $rowsSQL = array();
        $toBind = array();
        $columnNames = array_keys($data[0]);
        foreach($data as $arrayIndex => $row){
            $params = array();
            foreach($row as $columnName => $columnValue){
                $param = ":" . $columnName . $arrayIndex;
                $params[] = $param;
                $toBind[$param] = $columnValue;
            }
            $rowsSQL[] = "(" . implode(", ", $params) . ")";
        }
        $sql = "INSERT INTO $tabel (" . implode(", ", $columnNames) . ") VALUES " . implode(", ", $rowsSQL);
        $row = $this->db->prepare($sql);
        foreach($toBind as $param => $val){
            $row ->bindValue($param, $val);
        }
        return $row ->execute();
    }


    function tampil_data($tabel)
    {
        $row = $this->db->prepare("SELECT * FROM $tabel");
        $row->execute();
        return $row->fetchAll(PDO::FETCH_OBJ);
    }
    
    function tampil_data_id($tabel,$where,$id)
    {
        $row = $this->db->prepare("SELECT * FROM $tabel WHERE $where = ?");
        $row->execute(array($id));
        return $row->fetch(PDO::FETCH_OBJ);
    }


    function cekPendaftaranPengguna($userId){
        $sql = "SELECT * FROM tb_pendaftaran WHERE pengguna_id = :id LIMIT 1";
        $row = $this->db->prepare($sql);
        $row->bindValue(":id",$userId);
        $row->execute();
        return $row->fetch(PDO::FETCH_OBJ);
    }
    function updateNilaiPengguna($userId,$nilai){
        $sql = "UPDATE tb_pendaftaran SET nilai = :nilai WHERE pengguna_id = :id";
        $row = $this->db->prepare($sql);
        $row->bindValue(":id",$userId);
        $row->bindValue(":nilai",$nilai);
        return $row->execute();
    }
    function edit_data($tabel,$data,$where,$id)
    {
        $setPart = array();
        foreach ($data as $key => $value)
        {
            $setPart[] = $key.'=:'.$key;
        }
        $sql = "UPDATE $tabel SET ".implode(',',$setPart)." WHERE $where = :id";
        $row = $this->db->prepare($sql);
        //Bind our values.       
        foreach($data as $param => $val)
        {
            $row->bindValue(":".$param, $val);
        }
        $row->bindValue(':id',$id); // where
        return $row->execute();
    }

    function hapus_data($tabel,$where,$id)
    {
        $sql = "DELETE FROM $tabel WHERE $where = ?";
        $row = $this->db->prepare($sql);
        return $row ->execute(array($id));
    }
}