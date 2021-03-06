<?php include'../config/konek_database.php'; ?>
<?php 

if (!isset($_SESSION['admin'])) 
{
	echo "<script>alert('anda harus login dulu')</script>";
	echo "<script>location='../login.php'</script>";
	exit();
}
?>

<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Administrator</title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../font-awesome/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../dist/css/admin.css">
</head>
<style type="text/css" media="screen">
	.sidebar-menu {
		margin-top: -2%;
	}
</style>
<body class="hold-transition skin-yellow sidebar-mini ">
	<div class="wrapper">
		<header class="main-header">
			<nav class="navbar navbar-default navbar-static-top"> 
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" 
					data-target=".sidebar-collapse" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
				</div>
				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">		
					<li class="text-center">
						<a href="#" class="logo">
						<b>SISTEM DETEKSI COVID 19</b>
						</a>
					</li>
					</ul>
				</div>
			</nav>
	</header>
	<aside class="sidebar sidebar-collapse">
		<section class="sidebar">
			<br>
			<div class="text-center">
				<img src="../assets/img/penyakit/dpk.jpg" class="img-square" alt="User Image" class ="img-responsive" width="150">
			</div>		
			<br>
			<ul class="sidebar-menu">
				<li class="b-dash"><a href="index.php"><i class="fa fa-university text-center"></i> <span>Dashboard</span></a></li>
				<li class="header ">&nbsp;DATA MASTER</li>
				<li><a href="index.php?halaman=pasien"><i class="fa fa-reorder"></i>&nbsp;<span>Data USER</span></a></li>
				<li><a href="index.php?halaman=tampil_penyakit"><i class="fa fa-reorder"></i>&nbsp;<span>Nama Penyakit</span></a></li>
				<li><a href="index.php?halaman=tampil_gejala"><i class="fa fa-reorder"></i>&nbsp;<span>Nama Gejala </span></a></li>
				<li><a href="index.php?halaman=tampil_pengetahuan"><i class="fa fa-reorder"></i>&nbsp;<span>Pengetahuan</span></a></li>
				<li class="header">&nbsp; PROSES</li>
				<li><a href="index.php?halaman=proses_diagnosa"><i class="fa fa-reorder"></i>&nbsp;<span>Proses Analisis  </span></a></li>
				<li class="header">&nbsp;DATA USER</li>
				<li><a href="index.php?halaman=tampil_tabel"><i class="fa fa-reorder"></i>&nbsp;<span>&nbsp; Riwayat </span></a></li>
				<li><a href="../logout.php"><i class="fa fa-reorder"></i>&nbsp;<span> Logout</span></a></li>

			</ul>
		</section>
	</aside>
	<section class="content ">
		<div class="inner">

			<!---- percabangan halaman ---->

			<?php 

				//jika di url tidak ada parameter halaman data
			if(!isset($_GET['halaman']))
			{
					//panggil file home
				include 'home.php';
			}

				//selain itu jika ada parameter halaman
			elseif ($_GET['halaman']=='dashbord') 
			{
				include 'dashbord.php';
			}


			elseif ($_GET['halaman']=='pasien')
			{
				include 'pasien/pasien.php';
			}
			elseif ($_GET['halaman']=='ubah_pasien')
			{
				include 'pasien/ubah_pasien.php';
			}
			elseif ($_GET['halaman']=='tambah_pasien') 
			{
				include 'pasien/tambah_pasien.php';
			}
			elseif ($_GET['halaman']=='hapus_pasien')
			{
				include 'pasien/hapus_pasien.php';
			}
			elseif ($_GET['halaman']=='detail_pasien') 
			{
				include 'pasien/detail_pasien.php';
			}



			elseif ($_GET['halaman']=='tampil_penyakit')
			{
				include 'penyakit/tampil_penyakit.php';	
			}
			elseif ($_GET['halaman']=='tambah_penyakit')
			{
				include 'penyakit/tambah_penyakit.php';
			}
			elseif ($_GET['halaman']=='detail_penyakit') 
			{
				include 'penyakit/detail_penyakit.php';
			}
			elseif ($_GET['halaman']=='hapus_penyakit')
			{
				include 'penyakit/hapus_penyakit.php';
			}
			elseif ($_GET['halaman']=='ubah_penyakit') 
			{
				include 'penyakit/ubah_penyakit.php';
			}



			elseif ($_GET['halaman']=='tampil_gejala')
			{
				include 'gejala/tampil_gejala.php';
			}
			elseif ($_GET['halaman']=='tambah_gejala')
			{
				include 'gejala/tambah_gejala.php';
			}
			elseif ($_GET['halaman']=='hapus_gejala') 
			{
				include 'gejala/hapus_gejala.php';
			}
			elseif ($_GET['halaman']=='ubah_gejala') 
			{
				include 'gejala/ubah_gejala.php';
			}



			elseif ($_GET['halaman']=='tampil_obat')
			{
				include 'obat/tampil_obat.php';
			}
			elseif ($_GET['halaman']=='tambah_obat') 
			{
				include 'obat/tambah_obat.php';
			}
			elseif ($_GET['halaman']=='hapus_obat') 
			{
				include 'obat/hapus_obat.php';
			}
			elseif ($_GET['halaman']=='ubah_obat') 
			{
				include 'obat/ubah_obat.php';
			}

			elseif ($_GET['halaman']=='tampil_pengetahuan') 
			{
				include 'pengetahuan/tampil_pengetahuan.php';
			}
			elseif ($_GET['halaman']=='tambah_pengetahuan') 
			{
				include 'pengetahuan/tambah_pengetahuan.php';
			}
			elseif ($_GET['halaman']=='hapus_pengetahuan') 
			{
				include 'pengetahuan/hapus_pengetahuan.php';
			}
			elseif ($_GET['halaman']=='ubah_pengetahuan') 
			{
				include 'pengetahuan/ubah_pengetahuan.php';
			}
			elseif ($_GET['halaman']=='detail_pengetahuan') 
			{
				include 'pengetahuan/detail_pengetahuan.php';
			}




			elseif ($_GET['halaman']=='proses_diagnosa') 
			{
				include 'proses/proses_diagnosa.php';				
			}
			elseif ($_GET['halaman']=='hitung') 
			{
				include 'proses/hitung.php';
			}

			elseif ($_GET['halaman']=='tampil_rekam_medis')
			{
				include 'rekam_medis/tampil_rekam_medis.php';
			}
			elseif ($_GET['halaman']=='tampil_tabel') 
			{
				include  'rekam_medis/tampil_tabel.php';
			}





			?>
		</div>
	</section>

</div>



<script src="../dist/js/jquery.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../dist/js/admin.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
<script>
	$(document).ready(function() {
		$('#thetable').DataTable();
	} );
</script>



</body>
</html>