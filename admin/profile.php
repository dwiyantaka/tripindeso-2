<?php
require_once 'koneksi.php';
require_once 'User.php';

$user = new User($db);

// Jika belum login
    if(!$user->isLoggedIn()){
        header("location: login.php"); //Redirect ke halaman login
    }

    // Ambil data user saat ini
    $currentUser = $user->getUser();

     // Buat prepared statement untuk mengambil semua data dari tbBiodata
    $query = $db->prepare("SELECT * FROM user_admin WHERE username = :username");
    $query->bindParam(":username", ($_SESSION['username_admin']));
    // Jalankan perintah SQL
    $query->execute();
    // Ambil semua data dan masukkan ke variable $data
    $data = $query->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <title>Tripindeso Admin's Page</title>
        <meta name="generator" content="Bootply" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet">
        <!--[if lt IE 9]>
            <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>
    <body>
<!-- header -->
<div id="top-nav" class="navbar navbar-inverse navbar-static-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Admin Dashboard</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" role="button" data-toggle="dropdown" href="#">
                    <?php echo "".$_SESSION['user_admin']."" ?><span class="caret"></span></a>
                    <ul id="g-account-menu" class="dropdown-menu" role="menu">
                        <li><a href="#">My Profile</a></li>
                    </ul>
                </li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
    <!-- /container -->
</div>
<!-- /Header -->
	<section class="form">
                <h3 class="text-center">Profil Saya</h3>
                <div class="row">
                <div class="col-sm-8" id="myprofile">
                <?php foreach ($data as $value): ?>
                <table>
                    <tr>
                        <td class="faded">Username</td>
                        <td><?php echo $value['username'] ?></td>
                        <td></td>
                    </tr>
                    <tr>    
                        <td class="faded">Nama Lengkap</td>
                        <td><?php echo $value['namalengkap'] ?></td>
                        <td><button tipe="submit" class="btn btn-primary">Edit</button></td>
                    </tr>
                    <tr>
                        <td class="faded">Password</td>
                        <td>-</td>
                        <td><button tipe="submit" class="btn btn-primary">Edit</button></td>
                    </tr>
                </table>
                <?php endforeach ?>
                </div>      
            </div>
	</section>
	</body>
<!--Footer-->
<footer class="text-center">Administrator Tripindeso. Template by <a href="http://www.bootply.com/85850"><strong>Bootply.com</strong></a></footer>

<div class="modal" id="addWidgetModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Add Widget</h4>
            </div>
            <div class="modal-body">
                <p>Add a widget stuff here..</p>
            </div>
            <div class="modal-footer">
                <a href="#" data-dismiss="modal" class="btn">Close</a>
                <a href="#" class="btn btn-primary">Save changes</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dalog -->
</div>
<!-- /.modal -->
    <!-- script references -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>