<?php
	 // Lampirkan db dan User
    require_once 'koneksi.php';
    require_once 'User.php';

    // Buat object user
    $user = new User($db);

    // Jika sudah login
    if($user->isLoggedIn()){
        header("location: index.php"); //Redirect ke index
    }

    //Jika ada data dikirim
    if(isset($_POST['simpan_registrasi'])){
        $email		= $_POST['email'];
		$nama		= $_POST['nama'];
		$password	= $_POST['password'];
		$jkel		= $_POST['jkel'];
        // Registrasi user baru
        if($user->register($email, $nama, $password, $jkel)){
            // Jika berhasil set variable success ke true
            $success = true;
        }
        else{
            // Jika gagal, ambil pesan error
            $error = $user->getLastError();
        }
    }
?>

<!DOCTYPE html>
	<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Tripindeso - Liburan nginepnya ndesoo</title>
        <!-- Bootstrap Core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom Fonts -->
        <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic" rel="stylesheet" type="text/css">
        <!-- Plugin CSS -->
        <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">
        <!-- Theme CSS -->
        <link href="css/creative.min.css" rel="stylesheet">
        <link href="css/creative.css" rel="stylesheet">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media
        queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file://
        -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
	</head>
	<body>
        <nav id="mainNav" class="navbar">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>Menu
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="index.php">TRIPINDESO</a>
                </div>
        </nav>
	<section class="form">
		<div class="container">
			<form class="form-horizontal form-register" method="POST" enctype="multipart/form-data">
                <h3 class="text-center"> Pendaftaran Akun Baru </h3>
                <p id="small" class="text-center">Sudah punya akun? Silakan <a href="login.php">Login</button></a></p>
                    <?php if (isset($error)): ?>
                        <div class="error">
                            <?php echo $error ?>
                        </div>
                    <?php endif; ?>
                    <?php if (isset($success)): ?>
                        <div class="success">
                            Berhasil mendaftar. Lanjut<a href="profile.php"> ke sini</a>
                        </div>
                    <?php endif; ?>
                    <input type="email" placeholder="Alamat E-mail" class="form-control" name="email" required>
    				<input type="text" placeholder="Nama Lengkap" class="form-control" name="nama" required>
    				<input type="password"  placeholder="Password" class="form-control" name="password" required>
    				<div class="col-sm-4">
                        <label id="formregister">Jenis Kelamin: </label>
                    </div>
                    <div class="col-sm-6">
                        <input type="radio" name="jkel" value="Laki-laki"><label>Laki-Laki</label>
    				    <input type="radio" name="jkel" value="Perempuan"><label>Perempuan</label>
                    </div>  
    				<button type="submit" name="simpan_registrasi" class="btn btn-primary long">Simpan</button>
			</form>
	</section>
	</body>
	<footer id="register"> 
        <div class="container">
            <div class="row">
                <div class="text-center">
                    Copyright Tripindeso&copy 2016 | Theme by Creative Theme
                </div>
            </div>
        </div>
    </footer>
	 <!-- jQuery -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
        <!-- Plugin JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
        <script src="vendor/scrollreveal/scrollreveal.min.js"></script>
        <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
        <!-- Theme JavaScript -->
        <script src="js/creative.min.js"></script>
</html>	