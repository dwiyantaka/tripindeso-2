<?php
    // Lampirkan koneksi dan User
    require_once "koneksi.php";
    require_once "User.php";

    // Buat object user
    $user = new User($db);

    // Jika belum login
    if(!$user->isLoggedIn()){
        header("location: login.php"); //Redirect ke halaman login
    }

    // Ambil data user saat ini
    $currentUser = $user->getUser();

     // Buat prepared statement untuk mengambil semua data dari tabel
    $query  = $db->prepare("SELECT email, nama, jkel FROM data_user");
    $query1 = $db->prepare("SELECT * FROM data_order");
    // Jalankan perintah SQL
    $query->execute();
    $query1->execute();
    // Ambil semua data dan masukkan ke variable $data
    $data = $query->fetchAll();
    $data1 = $query1->fetchAll();
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
            <a class="navbar-brand" href="#">Admin Dashboard</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a class="dropbtn" href="#">
                    <?php echo $_SESSION['user_admin'] ?><span class="caret"></span></a>
                    <div class="dropdown-content">
                        <a href="profile.php">Profil Saya</a>
                    </div>
                </li>
                <li><a href="register.php">Tambah Akun Baru</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
    <!-- /container -->
</div>
<!-- /Header -->
<div>
    <h3 class="text-center">List Data User</h3>
    <table>
    <tr>
        <th>E-mail</th>
        <th>Nama User</th>
        <th>Jenis Kelamin</th>
    </tr>
    <?php foreach ($data as $value): ?>
    <tr>
        <td><?php echo $value['email'] ?></td>
        <td><?php echo $value['nama'] ?></td>
        <td><?php echo $value['jkel'] ?></td>
    </tr>
        <?php endforeach; ?>
    </table>
</div>
<div>
    <h3 class="text-center">List Data Order</h3>
    <table>
    <tr>
        <th>Id Order</th>
        <th>Destinasi 1</th>
        <th>Destinasi 2</th>
        <th>Destinasi 3</th>
        <th>Tanggal Mulai</th>
        <th>Tanggal Selesai</th>
        <th>Jumlah Orang</th>
        <th>Armada</th>
        <th>Email Pemesan</th>
        <th>Aksi</th>
    </tr>
    <?php foreach ($data1 as $value): ?>
    <tr>
        <td><?php echo $value['no_order'] ?></td>
        <td><?php echo $value['destinasi1'] ?></td>
        <td><?php echo $value['destinasi2'] ?></td>
        <td><?php echo $value['destinasi3'] ?></td>
        <td><?php echo $value['tgl_mulai'] ?></td>
        <td><?php echo $value['tgl_selesai'] ?></td>
        <td><?php echo $value['jml_org'] ?></td>
        <td><?php echo $value['armada'] ?></td>
        <td><?php echo $value['user_email'] ?></td>
        <td>
            <a href="edit.php?id=<?php echo $value['id']?>">Edit</a>
            |
            <a href="delete.php?id=<?php echo $value['id']?>">Delete</a>
        </td>
    </tr>
        <?php endforeach; ?>
    </table>
</div>

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