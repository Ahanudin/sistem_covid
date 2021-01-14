<?php 

//mengambil id gejala yang akan di hapus
$id_gejala = $_GET['id_gejala'];

//objek gejala menjalankan fungsi hapus gejala berdasarkan id gejala yang akan dihapus
$gejala->hapus_gejala($id_gejala);

//tampilkan pesan 
echo "<script>alert('data gejala terhapus')</script>";

//redirect ke tampil gejala
echo"<script>location='index.php?halaman=tampil_gejala' </script>";






 ?>