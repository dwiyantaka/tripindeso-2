<?php
	require_once 'koneksi.php';
	require_once 'User.php'; 
	
	$user = new User($db);

	if($user->isLoggedin()) { 
		$email = $_SESSION['email'];
	} 
	else { 
		header('location: login.php');
	} 

	$inputpwd = $_POST['berlaku']; 
	$sql = mysql_query("select*from login where nis = '$nis' and password = '$inputpwd';"); 
	$cocok = mysql_num_rows($sql); echo $cocok; 
?>
<?php
if(isset($_POST['submit']))
{
    $berlaku = $_POST['berlaku'];
    $ulang   = $_POST['ulang'];

    $cekpassword = mysql_num_rows(mysql_query("select*from login where nis = '$nis' and password = '$berlaku';"));

    if(empty($berlaku))
    {
       echo "<div class='peringatan'><b>ERROR:</b> Password yang berlaku harus diisi!</div>";
    }
    else if($cekpassword>0)
    {
       mysql_query("update login set password = '$ulang' where nis = '$nis'");
       echo "<script type='text/javascript'>alert('Password berhasil diganti');</script>";
    }
    else
    {
      echo "Password tidak terdaftar";
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
		<h3>Ganti Password</h3>
			<div class="form-login">
				<form method="POST" id="formpass">
			        <label class="label">Berlaku *</label> 
			        	<input type="password" name="berlaku" id="berlaku" placeHolder="Password lama"><span id="msgberlaku"></span>
			        <label class="label">Baru *</label> 
			        	<input type="password" name="baru" id="baru" placeHolder="Password baru"><span class="label"></span>
			        <label class="label">Konfirmasi ulang yang baru *</label> 
			        	<input type="password" name="ulang" id="ulang" placeHolder="Ulangi password"><span class="label"></span>
			        <input type="submit" id="simpan" name="submit" value="Simpan Perubahan"/>
			        <input id="batal" type="reset" value="Batal"/>
			    </form>
			</div>
	</section>
	</body>
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


