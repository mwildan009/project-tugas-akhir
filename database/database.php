<?php
    class Database{
		function __construct(){
			$this->db = $this->DBConnect();
		}
        public function DBConnect(){
			$dbhost = 'localhost'; // Setel nama host database
			$dbname = 'db_sekolah'; // Setel nama database
			$dbuser = 'root'; // Setel nama pengguna MySQL
			$dbpass = ''; // Setel kata sandi MySQL

			try {
				$dbConnection = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
				$dbConnection->exec("set names utf8");
                $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return  $dbConnection;
			}
			catch (PDOException $e) {
				return 'Connection failed: ' . $e->getMessage();
			}
		}
	}
?>