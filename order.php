<?php
	require_once "koneksi.php";
	require_once "User.php";

	$user = new User($db);

	if(isset($_POST['simpan_order'])){
		$_SESSION['posisi'] = "order";
		if($user->isLoggedIn()){
			$dest1		= $_POST['des1'];
			$dest2		= $_POST['des2'];
			$dest3		= $_POST['des3'];
			$tglmulai	= $_POST['tglmulai'];
			$tglselesai	= $_POST['tglselesai'];
			$jml		= $_POST['jml'];
			$armada		= $_POST['armada'];

			if($user->order($dest1, $dest2, $dest3, $tglmulai, $tglselesai, $jml, $armada)){
				$success = true;
			}
			else{
				$error = $user->getLastError();
				}
			}
		else{
			echo "<script>alert('Silakan login terlebih dahulu')
			window.location='login.php'</script>";
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
	<body class="bg-orange">
        <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>Menu
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand page-scroll" href="index.php">TRIPINDESO</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a class="page-scroll" href="index.php">HOME</a>
                        </li>
                        <li class="dropdown">
                            <?php 
                            if (isset($_SESSION['user'])){
                                echo"<a class='dropbtn' href=''>".$_SESSION['user']."</a>";
                                echo"<div class='dropdown-content'>";
                                echo"<a href='profile.php'>My Profile</a>";
                                echo"<a href='logout.php'>Logout</a>";
                                echo"</div>";
                            }
                            else{
                                echo"<a href='login.php'>LOGIN</a>";
                            }
                            ?>
                        </li>
                        <li>
                            <?php 
                            if (!isset($_SESSION['user'])){
                                echo"<a href='registrasi.php'>DAFTAR</a>";
                            }
                            ?>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>
	<section class="form">
		<div class="container text-center">
			<h2>Pilih Destinasi Liburan</h2>
			<hr class="light">
			<form class="form-horizontal form-order" method="post">
				<div class="row">
					<?php if (isset($error)): ?>
	                <div class="error">
	                      <?php echo $error ?>
	                </div>
	            	<?php endif; ?>
	            	<?php if (isset($success)): ?>
	                  <div class="success">
	                      Data berhasil terkirim. Tunggu tim kami mengirimkan balasan ke email Anda. 
	                      Kembali ke <b><a href="index.php">beranda</a></b>.
	                  </div>
	              	<?php endif; ?>
	            </div>
				<div class="col-md-4">
					<label>Destinasi Wisata 1:</label>
						<select class="form-control border-radius" name="des1">
							<option name="des1" value="--">--</option>
							<option name="des1" value="Pantai Bandengan">Pantai Bandengan</option>
							<option name="des1" value="Karimunjawa">Karimunjawa</option>
							<option name="des1" value="Baturaden">Baturaden</option>
							<option name="des1" value="Bukit Sikunir">Bukit Sikunir</option>
						</select>
				</div>
				<div class="col-md-4">
					<label>Destinasi Wisata 2:</label>
						<select class="form-control border-radius" name="des2">
							<option name="des1" value="--">--</option>
							<option name="des1" value="Pantai Bandengan">Pantai Bandengan</option>
							<option name="des1" value="Karimunjawa">Karimunjawa</option>
							<option name="des1" value="Baturaden">Baturaden</option>
							<option name="des1" value="Bukit Sikunir">Bukit Sikunir</option>
						</select>
				</div>
				<div class="col-md-4">
					<label>Destinasi Wisata 3:</label>
						<select class="form-control border-radius" name="des3">
							<option name="des1" value="--">--</option>
							<option name="des1" value="Pantai Bandengan">Pantai Bandengan</option>
							<option name="des1" value="Karimunjawa">Karimunjawa</option>
							<option name="des1" value="Baturaden">Baturaden</option>
							<option name="des1" value="Bukit Sikunir">Bukit Sikunir</option>
						</select>
				</div>
				<div class="col-md-4">
					<label for="tglmulai">Tanggal Mulai:</label>
						<input data-dependent-validation='{"from": "date-to", "prop": "max"}' type="date" id="date-from" class="form-control border-radius" name="tglmulai">
				</div>
				<div class="col-md-4">
					<label>Tanggal Selesai:</label>
						<input data-dependent-validation='{"from": "date-from", "prop": "min"}' type="date" id="date-to" class="form-control border-radius" name="tglselesai">
				</div>
				<div class="col-md-4">
					<label>Jumlah Penginap:</label>
						<select class="form-control border-radius" name="jml">
							<option name="jml" value="1">1 Orang</option>
							<option name="jml" value="2">2 Orang</option>
							<option name="jml" value="3">3 Orang</option>
							<option name="jml" value="4">4 Orang</option>
						</select>
				</div>
				<div class="col-md-12 text-center">
					<label>Armada Wisata:</label>
				</div>
					<div class="col-md-4">
						<input type="radio" name="armada" value="elf"><img src="img/order/elf.jpg" class="img-order">
						Mini Bus Elf
					</div>
					<div class="col-md-4">
						<input type="radio" name="armada" value="innova"><img src="img/order/innova.jpg" class="img-order">
						Kijang Innova
					</div>
					<div class="col-md-4">
						<input type="radio" name="armada" value="alphard"><img src="img/order/alphard.jpg" class="img-order">
						Toyota Alphard
					</div>
				<div>
					<button type="submit" name="simpan_order" class="btn btn-xl long">Submit</button>
				</div>
			</form>
	</section>
	</body>
	<footer> 
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
        <script src="js/creative.js"></script>
</html>	