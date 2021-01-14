<?php 

//mengambil id pengetahuan yang akan di hapus
$id_pengetahuan = $_GET['id_pengetahuan'];

//objek pengetahuan menjalankan fungsi hapus pengetahuan berdasarkan id pengetahuan yang akan dihapus
$pengetahuan->hapus_pengetahuan($id_pengetahuan);

//tampilkan pesan 
echo "<script>alert('data pengetahuan terhapus')</script>";

//redirect ke tampil pengetahuan
echo"<script>location='index.php?halaman=tampil_pengetahuan' </script>";






 ?>