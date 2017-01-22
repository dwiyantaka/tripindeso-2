<?php
require_once 'koneksi.php';
require_once 'User.php';

$user = new User($db);

// Jika belum login
    if(!$user->isLoggedIn()){
        $_SESSION['posisi'] = "profile";
        header("location: login.php"); //Redirect ke halaman login
    }

    // Ambil data user saat ini
    $currentUser = $user->getUser();

     // Buat prepared statement untuk mengambil semua data dari tbBiodata
    $query = $db->prepare("SELECT * FROM data_user WHERE email = :email");
    $query->bindParam(":email", ($_SESSION['email']));
    // Jalankan perintah SQL
    $query->execute();
    // Ambil semua data dan masukkan ke variable $data
    $data = $query->fetchAll();

    if (isset($_POST['upload'])){
    $filename = $_FILES["file"]["name"];
    $file_basename = substr($filename, 0, strripos($filename, '.')); // get file extention
    $file_ext = substr($filename, strripos($filename, '.')); // get file name
    $filesize = $_FILES["file"]["size"];
    $allowed_file_types = array('.jpg','.png','.bmp','.gif');
    

        if (in_array($file_ext,$allowed_file_types) && ($filesize < 1000000)){   
            // Rename file
            $file_ext = '.jpg';
            $newfilename = $_SESSION['email'] . $file_ext;
            if (file_exists("upload/" . $newfilename)){
                // file already exists error
                $error = "You have already uploaded this file.";
            }
            else{       
                move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $newfilename);
                $success = "File uploaded successfully.";     
            }
        }
        elseif (empty($file_basename)){   
            // file selection error
            $error = "Please select a file to upload.";
        } 
        elseif ($filesize > 1000000){   
            // file size error
            $error = "The file you are trying to upload is too large.";
        }
        else{
            // file type error
            $error = "Only these file typs are allowed for upload: " . implode(', ',$allowed_file_types);
            unlink($_FILES["file"]["tmp_name"]);
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
            </div>
        </nav>
	<section class="form">
                <h3 class="text-center">Profil Saya</h3>
                <hr>
                <div class="row">
                <div class="col-sm-4">
                <form method="POST" enctype="multipart/form-data">
                        <?php if (isset($error)): ?><div class="error-nobg">
                        <?php echo $error ?></div><?php endif; ?>  
                        <?php if (isset($success)): ?><div class="success-nobg">
                        <?php echo $success ?></div><?php endif; ?>
                        <?php $ext_file = '.jpg'; 
                              $filename = $_SESSION['email'] . $ext_file;
                              if(file_exists("upload/" . $filename)){?>
                        <div id="targetPhoto"><img src="./upload/<?php echo $filename ?>" height="180px" />
                        <?php }else{ ?>
                        <div id="targetPhoto">No Image
                        <?php } ?>
                    </div>
                    <div id="uploadContent">  
                        <input type="file" id=file name="file" multiple="multiple" accept="image/*">
                        <button type="submit" name="upload" class="btn btn-primary long">Upload</button>
                    </div>
                </form>
                </div>
                <div class="col-sm-8" id="myprofile">
                <?php foreach ($data as $value): ?>
                <table>
                    <tr>
                        <td class="faded">E-mail</td>
                        <td><?php echo $value['email'] ?></td>
                        <td></td>
                    </tr>
                    <tr>    
                        <td class="faded">Nama Lengkap</td>
                        <td><?php echo $value['nama'] ?></td>
                        <td><button tipe="submit" class="btn btn-primary">Edit</button></td>
                    </tr>
                    <tr>
                        <td class="faded">Password</td>
                        <td>-</td>
                        <td><button tipe="submit" class="btn btn-primary">Edit</button></td>
                    </tr>
                    <tr>
                        <td class="faded">Jenis Kelamin</td>
                        <td><?php echo $value['jkel'] ?></td>
                        <td></td>
                    </tr>
                </table>
                <?php endforeach ?>
                </div>      
            </div>
	</section>
	</body>
	<footer id="profile"> 
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