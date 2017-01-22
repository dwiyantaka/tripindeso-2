<?php
    class User
    {

        private $db; //Menyimpan Koneksi database
        private $error; //Menyimpan Error Message

        // Contructor untuk class User, membutuhkan satu parameter yaitu koneksi ke databse
        function __construct($db_conn)
        {
            $this->db = $db_conn;

            // Mulai session
            session_start();
        }

        // Registrasi user baru
        public function register($username, $password, $namalengkap)
        {
            try
            {
                // buat hash dari password yang dimasukkan
                $hashPasswd = password_hash($password, PASSWORD_DEFAULT);

                //Masukkan user baru ke database
                $query = $this->db->prepare("INSERT INTO user_admin(username, password, namalengkap) VALUES(:username, :password, :namalengkap)");
                $query->bindParam(":username", $username);
                $query->bindParam(":password", $hashPasswd);
                $query->bindParam(":namalengkap", $namalengkap);
                $query->execute();

                return true;
            }
            catch(PDOException $e){
                // Jika terjadi error
                if($e->errorInfo[0] == 23000){
                    //errorInfor[0] berisi informasi error tentang query sql yg baru dijalankan
                    //23000 adalah kode error ketika ada data yg sama pada kolom yg di set unique
                    $this->error = "Username sudah digunakan!";
                    return false;
                }else{
                    echo $e->getMessage();
                    return false;
                }
            }
        }

        //Login user
        public function login($username, $password)
        {
            try
            {
                // Ambil data dari database
                $query = $this->db->prepare("SELECT * FROM user_admin WHERE username = :username");
                $query->bindParam(":username", $username);
                $query->execute();
                $data = $query->fetch();

                // Jika jumlah baris > 0
                if($query->rowCount() > 0){
                    // jika password yang dimasukkan sesuai dengan yg ada di database
                    if(password_verify($password, $data['password'])){
                        $_SESSION['username_admin'] = $data['username'];
                        $_SESSION['user_admin'] = $data['namalengkap'];
                        $_SESSION['akses'] = $data['akses'];
                        return true;
                    }
                    else{
                        $this->error = "Username atau Password Salah";
                        return false;
                    }
                }
                else{
                    $this->error = "Username atau Password Salah";
                    return false;
                }
            }
            catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        // Cek apakah user sudah login
        public function isLoggedIn(){
            // Apakah user_session sudah ada di session
            if(isset($_SESSION['user_admin']))
            {
                return true;
            }
        }

        // Ambil data user yang sudah login
        public function getUser(){
            // Cek apakah sudah login
            if(!$this->isLoggedIn()){
                return false;
            }

            try {
                // Ambil data user dari database
                $query = $this->db->prepare("SELECT * FROM user_admin WHERE namalengkap = :namalengkap");
                $query->bindParam(":namalengkap", $_SESSION['user_admin']);
                $query->execute();
                return $query->fetch();
            }
            catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        // Logout user
        public function logout(){
            // Hapus session
            session_destroy();
            unset($_SESSION['user_admin']);
            unset($_SESSION['username_admin']);
            unset($_SESSION['akses']);
            return true;
        }

        // Ambil error terakhir yg disimpan di variable error
        public function getLastError(){
            return $this->error;
        }
    }

?>
