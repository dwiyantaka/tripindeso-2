<?php
require_once 'koneksi.php';
require_once 'User.php';

$user = new User($db);

if($user->isLoggedIn()){
    header('location: index.php');
}

if(isset($_POST['login'])){
    $email      = $_POST['email'];
    $password   = $_POST['password'];

    if($user->login($email, $password)){
        if(($_SESSION['posisi']) == "order"){
            header('location: order.php');   
        }
        else if(($_SESSION['posisi']) == "index"){
            header('location: index.php');
        }
        else if(($_SESSION['posisi']) == "profile"){
            header('location: profile.php');
        }
    }
    else{
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
			<form class="form-horizontal form-login" method="post">
				<h3 class="text-center">Login</h3>
				<p id="small" class="text-center">Belum punya akun? Silakan <a href="registrasi.php">Daftar</a></p>
                <?php if (isset($error)): ?>
                  <div class="error-nobg">
                      <?php echo $error ?>
                  </div>
                <?php endif; ?>
				<input type="email" placeholder="e-mail" class="form-control" name="email" required/>
				<input type="password" placeholder="password" class="form-control" name="password" required/>
			    <button type="submit" name="login" class="btn btn-primary long">Login</button>
			</form>
	</section>
	</body>
	<footer id="login"> 
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