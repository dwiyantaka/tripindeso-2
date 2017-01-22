<?php session_start(); $_SESSION['user']="Wildan"; ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Tripindeso Admin's Page</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="css/styles.css" rel="stylesheet">
	</head>
	<body>
<!-- header -->
<div id="top-nav" class="navbar navbar-inverse navbar-static-top">
    <div class="container-fluid">
        <div class="navbar-header"><button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Dashboard</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" role="button" data-toggle="dropdown" href="#">Admin<span class="caret"></span></a>
                    <ul id="g-account-menu" class="dropdown-menu" role="menu">
                        <li><a href="#">My Profile</a></li>
                        <li><a href="#">Logout</a></li>
                    </ul>
                </li>
                <li>
                <?php 
                            if (isset($_SESSION['user'])){
                                echo"<a class='dropdown-toggle' role='button' data-toggle='dropdown' href=''>Selamat Datang, ".$_SESSION['user']."</a>";
                                echo"<ul id='g-account-menu' class='dropdown-menu' role='menu'>";
                                echo"<li><a href='#'>My Profile</a></li>";
                                echo"<li><a href='#'>Logout</a></li>";
                            }
                            else{
                                echo"<a href='login.php'>Login</a>";
                                
                            }
                ?>
                </li>
            </ul>
        </div>
    </div>
    <!-- /container -->
</div>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>