<?php 
session_start();
$_SESSION['posisi'] = "index";
?>
<!DOCTYPE html>
	<head>
        <meta charset="utf-8">
        <title>Tripindeso - Liburan nginepnya ndesoo</title>
        <!-- Bootstrap Core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom Fonts -->
        <link href="css/font-awesome.css" rel="stylesheet" type="text/css">
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
    </head><body id="page-top">
        <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>Menu
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand page-scroll" href="#page-top">TRIPINDESO</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a class="page-scroll" href="#about">TENTANG</a>
                        </li>
						<li>
                            <a class="page-scroll" href="#portfolio">PORTOFOLIO</a>
                        </li>
						<li>
                            <a class="page-scroll" href="#cara-memesan">CARA PESAN</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="#contact">KONTAK</a>
                        </li>
                        <li class="dropdown">
                            <?php if (isset($_SESSION['user'])){ ?>
                                <a class="dropbtn" href="">Selamat Datang,<?php echo $_SESSION['user'] ?></a>
                                    <div class="dropdown-content">
                                        <a href="profile.php">Profil Saya</a>
                                        <a href="logout.php">Keluar</a>
                                    </div>
                            <?php }else{ ?>
                                <a href="login.php">LOGIN</a>
                            <?php }?>
                        </li>
                        <li>
                            <?php if (!isset($_SESSION['user'])){ ?>
                                <a href="registrasi.php">DAFTAR</a>
                            <?php } ?>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>
        <header>
            <div class="header-content">
                <div class="header-content-inner">
                    <h2 id="homeHeading">NGINEP DI HOTEL SUDAH MAINSTREAM&nbsp;<br>SEKARANG&nbsp;ZAMANNYA YANG ANTI-MAINSTREAM</h2>
                    <hr class="light">
                    <a href="#about" class="btn btn-xl page-scroll">info lebih lanjut</a>
					<a href="order.php" class="btn btn-xl">pesan sekarang</a>
                </div>
            </div>
        </header>
        <section class="bg-primary" id="about">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 text-justify">
                        <h3 class="section-heading text-center">Tentang Kami</h3>
                        <hr>
                        <p class="text-faded">Kebahagiaan tidak melulu soal mempunyai uang banyak dengan bekerja terus menerus.
						Adakalanya manusia butuh berlibur untuk mengistirahatkan tubuh dan otaknya setelah bekerja terus menerus.<br> 
						Sudah menjadi kebiasaan orang-orang ketika ingin berlibur, ke luar kota khususnya 
						akan mencari hotel atau villa sebagai tempat penginapannya.<br>
						Nah, di sini kami menyediakan hal lain, yaitu: menginap di rumah orang desa. Rumah yang tak jauh dari alam 
						sekaligus berbaur dengan orang-orang desa.<br>
						</p>
					</div>
				</div>
			</div>
		</section>
		<section class="no-padding" id="portfolio">
			<h3 class="section-heading text-center">Rumah Calon Hunian</h3>
			<hr>
            <div class="container-fluid">
                <div class="row no-gutter popup-gallery">
                    <div class="col-lg-4 col-sm-6">
                        <a href="img/portfolio/fullsize/1.jpg" class="portfolio-box">
                        <img src="img/portfolio/thumbnails/1.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Rumah 1
                                </div>
                                <div class="project-name">
                                    Daerah 1
                                </div>
                            </div>
                        </div>
						</a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a href="img/portfolio/fullsize/2.jpg" class="portfolio-box">
                        <img src="img/portfolio/thumbnails/2.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Rumah 2
                                </div>
                                <div class="project-name">
                                    Daerah 2
                                </div>
                            </div>
                        </div>
						</a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a href="img/portfolio/fullsize/3.jpg" class="portfolio-box">
                        <img src="img/portfolio/thumbnails/3.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Rumah 3
                                </div>
                                <div class="project-name">
                                    Daerah 3
                                </div>
                            </div>
                        </div>
						</a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a href="img/portfolio/fullsize/4.jpg" class="portfolio-box">
                        <img src="img/portfolio/thumbnails/4.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Rumah 4
                                </div>
                                <div class="project-name">
                                    Daerah 4
                                </div>
                            </div>
                        </div>
						</a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a href="img/portfolio/fullsize/5.jpg" class="portfolio-box">
                        <img src="img/portfolio/thumbnails/5.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Rumah 5
                                </div>
                                <div class="project-name">
                                    Daerah 5
                                </div>
                            </div>
                        </div>
						</a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a href="img/portfolio/fullsize/6.jpg" class="portfolio-box">
                        <img src="img/portfolio/thumbnails/6.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Rumah 6
                                </div>
                                <div class="project-name">
                                    Daerah 6
                                </div>
                            </div>
                        </div>
						</a>
					</div>
                </div>
            </div>
		</section>
		<section class="bg-primary" id="cara-memesan">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 text-justify">
						<h3 class="text-center"> Tertarik? Begini cara memesannya: </h3>
						<hr>
						<p class="text-faded">1. Silakan registrasi menggunakan surel Anda <a href="registrasi.php">di sini</a>
						<br>2. Verifikasikan surel yang telah Anda registrasikan 
						<br>3. Isilah form pemesanan yang tersedia <a href = "order.php">di sini</a>
						<br>4. Submit formnya dan tunggu sampai kami membalas melalui surel Anda
						</p>
					</div>
				</div>
			</div>
		</section>
        <section id="contact">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 text-center">
                        <h3 class="section-heading">Ingin menghubungi kami?</h3>
                        <hr class="primary">
                    </div>
                    <div class="col-lg-4 col-lg-offset-2 text-center">
                        <i class="fa fa-phone fa-3x sr-contact"></i>
                        <p>(024) 77687696</p>
                    </div>
                    <div class="col-lg-4 text-center">
                        <i class="fa fa-envelope-o fa-3x sr-contact"></i>
                        <p>
                            <a href="mailto:your-email@your-domain.com">tripindeso@google.com</a>
                        </p>
                    </div>
                </div>
            </div>
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