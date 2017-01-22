<?php
include "koneksi.php";
try {
   $result = $db->query('SELECT * FROM data_user');
  
   // tampilkan data
   while($row = $result->fetch()) {
     echo "$row[0] $row[1] $row[2] $row[3] $row[4]";    
     echo "<br />";
   }
 
   // hapus koneksi
   $dbh = null;
}
catch (PDOException $e) {
   // tampilkan pesan kesalahan jika koneksi gagal
   print "Koneksi atau query bermasalah: " . $e->getMessage() . "<br/>";
   die();
}
?>