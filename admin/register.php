<?php
    // Lampirkan db dan User
    require_once "koneksi.php";
    require_once "User.php";

    // Buat object user
    $user = new User($db);

    //Jika ada data dikirim
    if(isset($_POST['kirim'])){
        $username     = $_POST['username'];
        $password     = $_POST['password'];
        $namalengkap  = $_POST['namalengkap'];
        $akses        = $_POST['akses'];

        // Registrasi user baru
        if($user->register($username, $password, $namalengkap, $akses)){
            // Jika berhasil set variable success ke true
            $success = true;
        }else{
            // Jika gagal, ambil pesan error
            $error = $user->getLastError();
        }
    }
 ?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Register</title>
        <link rel="stylesheet" href="css/style.css" media="screen" title="no title" charset="utf-8">
    </head>
    <body>
        <div class="login-page">
          <div class="form">
              <form class="register-form" method="post">
              <?php if (isset($error)): ?>
                  <div class="error">
                      <?php echo $error ?>
                  </div>
              <?php endif; ?>
              <?php if (isset($success)): ?>
                  <div class="success">
                      Berhasil mendaftar. Silakan <a href="login.php">masuk</a>
                  </div>
              <?php endif; ?>
                <input type="text" name="username" placeholder="username" required/>
                <input type="password" name="password" placeholder="password" required/>
                <input type="text" name="namalengkap" placeholder="nama lengkap" required/>
                <input list="akses" name="akses" placeholder="Hak Akses" required/>
                  <datalist id="akses">
                    <option name="akses" value="1">Penuh</option>
                    <option name="akses" value="0">Terbatas</option>
                  </datalist>
               <button type="submit" name="kirim">buat</button>
             </form>
          </div>
        </div>
    </body>
</html>
