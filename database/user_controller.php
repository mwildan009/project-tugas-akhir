<?php 
class UserController {

    protected $tblUser = "pengguna";
    protected $db;
    function __construct($db){
        $this->db = $db;
    }

    function login($user,$pass)
    {   
        $tblUser = $this->tblUser;
        $pass = md5($pass);
        $row = $this->db->prepare("SELECT * FROM $tblUser WHERE username=? AND password=?");
        $row->execute(array($user,$pass));
        $count = $row->rowCount();
        if($count > 0){
            return $row->fetch(PDO::FETCH_OBJ);
        }else{
            return false;
        }
    }

    function register($nama,$username,$password)
    {
        $tblUser = $this->tblUser;
        $pass = md5($password);
        $row = $this->db->prepare("INSERT INTO $tblUser (nama,username,password) VALUES (?,?,?)");
        $count = $row->execute(array($nama,$username,$pass));
        if($count > 0){
            return true;
        }else{
            return false;
        }
    }
    function cek_login($user,$pass)
    {
        $tblUser = $this->tblUser;
        $pass = md5($pass);
        $row = $this->db->prepare("SELECT * FROM $tblUser WHERE username=? AND password=md5(?)");
        $row->execute(array($user,$pass));
        $count = $row->rowCount();
        if($count > 0)
        {
            return true;
        }else{
            return false;
        }
    }

}