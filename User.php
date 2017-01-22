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
        public function register($email, $nama, $password, $jkel)
        {
            try
            {
                // buat hash dari password yang dimasukkan
                $hashPasswd = password_hash($password, PASSWORD_DEFAULT);

                //Masukkan user baru ke database
                $query = $this->db->prepare("INSERT INTO data_user(email, nama, password, jkel) VALUES(:email, :nama, :password, :jkel)");
                $query->bindParam(":email", $email);
                $query->bindParam(":nama", $nama);
                $query->bindParam(":password", $hashPasswd);
                $query->bindParam(":jkel", $jkel);
                $query->execute();

                
                return true;
            }
            catch(PDOException $e){
                // Jika terjadi error
                if($e->errorInfo[0] == 23000){
                    //errorInfor[0] berisi informasi error tentang query sql yg baru dijalankan
                    //23000 adalah kode error ketika ada data yg sama pada kolom yg di set unique
                    $this->error = "Gagal registrasi";
                    return false;
                }else{
                    echo $e->getMessage();
                    return false;
                }
            }
        }

        //Login user
        public function login($email, $password)
        {
            try
            {
                // Ambil data dari database
                $query = $this->db->prepare("SELECT * FROM data_user WHERE email = :email");
                $query->bindParam(":email", $email);
                $query->execute();
                $data = $query->fetch();

                // Jika jumlah baris > 0
                if($query->rowCount() > 0){
                    // jika password yang dimasukkan sesuai dengan yg ada di database
                    if(password_verify($password, $data['password'])){
                        $_SESSION['user'] = $data['nama'];
                        $_SESSION['email'] = $data['email'];
                        //$_SESSION['login'] = 1;
                        return true;
                    }
                    else{
                        $this->error = "Email atau Password Salah";
                        return false;
                    }
                }
                else{
                    $this->error = "Email atau Password Salah";
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
            if(isset($_SESSION['user']))
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
                $query = $this->db->prepare("SELECT * FROM data_user WHERE nama = :nama");
                $query->bindParam(":nama", $_SESSION['user']);
                $query->execute();
                return $query->fetch();
            }
            catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function order($dest1, $dest2, $dest3, $tglmulai, $tglselesai, $jml, $armada){
            try{
                $query = $this->db->prepare("INSERT INTO data_order(destinasi1,destinasi2,destinasi3,tgl_mulai,tgl_selesai,jml_org,armada,user_email)
                    VALUES (:destinasi1, :destinasi2, :destinasi3, :tgl_mulai, :tgl_selesai, :jml_org, :armada, :user_email)");
                $query->bindParam(":destinasi1", $dest1);
                $query->bindParam(":destinasi2", $dest2);
                $query->bindParam(":destinasi3", $dest3);
                $query->bindParam(":tgl_mulai", $tglmulai);
                $query->bindParam(":tgl_selesai", $tglselesai);
                $query->bindParam(":jml_org", $jml);
                $query->bindParam(":armada", $armada);
                $query->bindParam(":user_email", ($_SESSION['email']));
                $query->execute();
                return true;
            }
            catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }
        public function cekpwd($email, $pwdlama){
            try{
                $query = $this->db->prepare("SELECT * FROM data_user WHERE email = :email and password = :password");
                $query->bindParam(":email", $email);
                $query->bindParam(":password", $pwdlama);
                return true;
            }
            catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }

        public function gantipwd($email, $password){

        }

        public function upload(){
        
        }

        // Logout user
        public function logout(){
            // Hapus session
            session_destroy();
            unset($_SESSION['user']);
            unset($_SESSION['posisi']);
            return true;
        }

        // Ambil error terakhir yg disimpan di variable error
        public function getLastError(){
            return $this->error;
        }
    }

?>
