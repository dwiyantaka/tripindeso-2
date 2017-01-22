<?php
    // Lampirkan db dan User
    require_once "koneksi.php";
    require_once "User.php";

    //Buat object user
    $user = new User($db);

    //Jika sudah login
    if($user->isLoggedIn()){
        header("location: index.php"); //redirect ke index
    }

    //jika ada data yg dikirim
    if(isset($_POST['kirim'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Proses login user
        if($user->login($username, $password)){
            if(($_SESSION['akses'])==1){
              header("location: index-1.php");
            }
            else{
              header("location: index.php");
          }
        }else{
            // Jika login gagal, ambil pesan error
            $error = $user->getLastError();
        }
    }
 ?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
        <div class="login-page">
          <div class="form">
            <form class="login-form" method="post">
              <?php if (isset($error)): ?>
                  <div class="error">
                      <?php echo $error ?>
                  </div>
              <?php endif; ?>
              <input type="text" name="username" placeholder="username" required/>
              <input type="password" name="password" placeholder="password" required/>
              <button type="submit" name="kirim">login</button>
            </form>
          </div>
        </div>
    </body>
</html>
