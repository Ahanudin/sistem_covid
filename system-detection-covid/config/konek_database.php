<?php 
session_start();
//membuat koneksi database
//harus ada syarat yg terpnuhi yaitu (nama host, username, passwd, nama database);

date_default_timezone_set('Asia/Jakarta');

// koneksi database
$database = new mysqli("localhost", "root", "","diagnosa_cf");


function tgl_indo($tanggal)
{
	$tgl = explode("-", $tanggal);
	$bln["01"]="Januari";
	$bln["02"]="Februari";
	$bln["03"]="Maret";
	$bln["04"]="April";
	$bln["05"]="Mei";
	$bln["06"]="Juni";
	$bln["07"]="Juli";
	$bln["08"]="Agustus";
	$bln["09"]="September";
	$bln["10"]="Oktober";
	$bln["11"]="November";
	$bln["12"]="Desember";
	if ($tgl[0]=="0000") 
	{
		return $tanggal;
	}
	else
	{
		return $tgl[2]." ".$bln[$tgl[1]]." ".$tgl[0];
	}
}






//membuat class pasien
class pasien
{
	//membuat atribut untuk koneksi (nyambung) ke database
	function __construct($database)
	{
		//mengisi atribut koneksi dengan persyaratan koneksi databaase
		$this->koneksi = $database;
	}

	//membuat fungsi untuk menampilkan data pasien
	function tampil_pasien()
	{
		//setiap berhubungan dengan database menggunakan $this->koneksi

		//mengambil data dari tabel pasien
		$ambil = $this->koneksi->query("SELECT * FROM data_pasien");

		//data yang terambil diubah ke bentuk array dan diperulangan karena datanya lebih dari 1
		while ($data_array = $ambil->fetch_assoc())
		{
			//menampung data tiap perulangan ke dalam array multi
			$semuadata[]= $data_array;
		}

		// outputkan semuadata karena datanya akan dipakai oleh file lain
		return $semuadata;
	}


	function simpan_pasien($nik,$nama_pasien, $umur_pasien, $email_pasien,$alamat_pasien,$password_pasien )
	{


		$this->koneksi->query("INSERT INTO data_pasien (nik,nama_pasien, umur_pasien,email_pasien,alamat_pasien,password_pasien ) 
			VALUES ('$nik','$nama_pasien','$umur_pasien','$email_pasien','$alamat_pasien','$password_pasien')");
	}
	function validasi_nik($nik)
	{
		$ambil = $this->koneksi->query ("SELECT * FROM data_pasien WHERE nik='$nik'");
		$hitung = $ambil->num_rows;
		if ($hitung > 0)
		{
			return "sukses";
		}
		else
		{
			return "gagal";
		}
	}

	function ubah_password_lupa($pass, $nik)
	{
		$this->koneksi->query("UPDATE data_pasien SET password_pasien='$pass' WHERE nik='$nik' ");
	}


	function hapus_pasien($id_pasien)
	{
	//mendapatkan data pasien yang akan dihapus supaya tahu nama fotonya
	//fungsi ini mengakses fungsi detail_pasien
		//$data = $this->hapus_pasien($id_pasien);

	//menghapus data dari database berdasar id_pasien yang akan dihapus
		$this->koneksi->query("DELETE FROM data_pasien WHERE id_pasien='$id_pasien' ");
	}

	function ubah_pasien($nik,$nama_pasien,$umur_pasien,$email_pasien,$alamat_pasien,$id_pasien)

	{
			//mengubah data di DB
		$this->koneksi->query("UPDATE data_pasien SET nik='$nik', nama_pasien='$nama_pasien', umur_pasien='$umur_pasien', email_pasien='$email_pasien', alamat_pasien='$alamat_pasien' WHERE id_pasien='$id_pasien'");	
	}


	function tampil_pasien_id($id_pasien)
	{
		//setiap berhubungan dengan database menggunakan $this->koneksi

		//mengambil data dari tabel pasien
		$ambil = $this->koneksi->query("SELECT * FROM data_pasien WHERE id_pasien='$id_pasien'");

		return $ambil->fetch_assoc();
	}
	

	function detail_pasien($id_pasien)

	{
		$ambil= $this->koneksi->query("SELECT*FROM data_pasien WHERE id_pasien='$id_pasien' ");

		return $ambil->fetch_assoc();

	}
	function ubah_password($password_pasien,$id_pasien)
	{
		$this->koneksi->query("UPDATE data_pasien SET password_pasien='$password_pasien' WHERE id_pasien='$id_pasien'");
	}
	
}


class penyakit
{
	//membuat atribut untuk koneksi (nyambung) ke database
	function __construct($database)
	{
		//mengisi atribut koneksi dengan persyaratan koneksi databaase
		$this->koneksi = $database;
	}

	//membuat fungsi untuk menampilkan data penyakit
	function tampil_penyakit()
	{
		//setiap berhubungan dengan database menggunakan $this->koneksi

		//mengambil data dari tabel penyakit
		$ambil = $this->koneksi->query("SELECT * FROM penyakit");

		//data yang terambil diubah ke bentuk array dan diperulangan karena datanya lebih dari 1
		while ($data_array = $ambil->fetch_assoc())
		{
			//menampung data tiap perulangan ke dalam array multi
			$semuadata[] = $data_array;
		}

		// outputkan semuadata karena datanya akan dipakai oleh file lain
		return $semuadata;
	}

	function simpan_penyakit($nama_penyakit, $deskripsi_penyakit,$pencegahan_penyakit,$nama_obat,$foto_penyakit)
	{
		$nama_foto=$foto_penyakit['name'];
		$waktu=date("y-m-d-h-i-s");
		$rename= $waktu."_".$nama_foto;

		$lokasi = $foto_penyakit['tmp_name'];
		move_uploaded_file($lokasi, "../assets/img/penyakit/$rename");
		$this->koneksi->query("INSERT INTO penyakit(nama_penyakit, deskripsi_penyakit, pencegahan_penyakit, nama_obat, foto_penyakit) VALUES ('$nama_penyakit','$deskripsi_penyakit','$pencegahan_penyakit','$nama_obat','$rename')");
	}
	
	function detail_penyakit($id_penyakit)
	{
		$ambil= $this->koneksi->query("SELECT*FROM penyakit WHERE id_penyakit='$id_penyakit' ");

		return $ambil->fetch_assoc();
	}

	function hapus_penyakit($id_penyakit)
	{
		$this->koneksi->query("DELETE FROM penyakit WHERE id_penyakit='$id_penyakit' ");
	}

	function ubah_penyakit($nama_penyakit,$deskripsi_penyakit,$pencegahan_penyakit,$nama_obat,$foto_penyakit,$id_penyakit)
	{
		$nama_foto = $foto_penyakit ['name'];
		$waktu = date("y-m-d-h-i-s");
		$rename = $waktu."_".$nama_foto;
		$lokasi = $foto_penyakit['tmp_name'];

		//jika tidak kosong $lokasi, artinya foto juga diubah
		if (!empty($lokasi))
		{
			// saat mengubah foto, maka data lama harus diubah. caranya
			//1. mengambil data lama
			$detail_penyakit = $this->detail_penyakit($id_penyakit);
			//2. mengambil foto lamanya aja
			$foto_lama = $detail_penyakit['foto_penyakit'];
			//3. jika foto lama ada di folder img, maka dihapus
			if(file_exists("../assets/img/penyakit/$foto_lama"))
			{
				unlink("../assets/img/penyakit/$foto_lama");
			}

			//setelah foto lama dihapus, lalu kita mengupload foto baru
			move_uploaded_file($lokasi, "../assets/img/penyakit/$rename");

			//mengubah data di DB
			$this->koneksi->query("UPDATE penyakit SET nama_penyakit='$nama_penyakit', deskripsi_penyakit='$deskripsi_penyakit', pencegahan_penyakit='$pencegahan_penyakit',nama_obat='$nama_obat',foto_penyakit='$rename' WHERE id_penyakit='$id_penyakit'");
		}
		else
		{
			$this->koneksi->query("UPDATE penyakit SET nama_penyakit='$nama_penyakit', deskripsi_penyakit='$deskripsi_penyakit', pencegahan_penyakit='$pencegahan_penyakit', nama_obat='$nama_obat' WHERE id_penyakit='$id_penyakit'");
		} 
	}
}

class gejala
{
	
	function __construct($database)
	{
		$this->koneksi = $database;
	}

	function tampil_gejala()
	{
		$ambil = $this->koneksi->query("SELECT * FROM gejala");
		while ($data_array = $ambil->fetch_assoc())
		{
			$semuadata[] = $data_array;
		}
		return $semuadata;
	}

	function simpan_gejala($nama_gejala)
	{
		$this->koneksi->query("INSERT INTO gejala(nama_gejala) VALUES ('$nama_gejala')");
	}

	function hapus_gejala($id_gejala)
	{
		$this->koneksi->query("DELETE FROM gejala WHERE id_gejala='$id_gejala' ");
	}	

	function detail_gejala($id_gejala)
	{
		$ambil= $this->koneksi->query("SELECT*FROM gejala WHERE id_gejala='$id_gejala' ");

		return $ambil->fetch_assoc();
	}
	function ubah_gejala ($nama_gejala,$id_gejala)
	{
		$this->koneksi->query("UPDATE gejala SET nama_gejala= '$nama_gejala' WHERE id_gejala= '$id_gejala' " );
	}

	


}

class obat
{
	
	function __construct($database)
	{
		$this->koneksi = $database;
	}

	function tampil_obat()
	{
		$ambil = $this->koneksi->query("SELECT * FROM obat");
		while ($data_array = $ambil->fetch_assoc())
		{
			$semuadata[] = $data_array;
		}
		return $semuadata;
	}
	function simpan_obat($nama_obat)
	{
		$this->koneksi->query("INSERT INTO obat(nama_obat) VALUES ('$nama_obat')");
	}
	function hapus_obat($id_obat)
	{
		$this->koneksi->query("DELETE FROM obat WHERE id_obat='$id_obat' ");
	}	
	function detail_obat($id_obat)
	{
		$ambil= $this->koneksi->query("SELECT*FROM obat WHERE id_obat='$id_obat' ");

		return $ambil->fetch_assoc();
	}
	
	function ubah_obat($id_obat)
	{
		$this->koneksi->query("UPDATE obat SET nama_obat= '$nama_obat' WHERE id_obat='$id_obat' " );
	}
}

class pengetahuan
{
	
	function __construct($database)
	{
		$this->koneksi=$database;
	}

	function tampil_pengetahuan()
	{
		$ambil = $this->koneksi->query("SELECT * FROM pengetahuan
			
			JOIN gejala ON pengetahuan.id_gejala=gejala.id_gejala
			JOIN penyakit ON pengetahuan.id_penyakit=penyakit.id_penyakit") or die(mysqli_error($this->koneksi));
		while ($data_array = $ambil->fetch_assoc())
		{
			$semuadata[] = $data_array;
		}
		return $semuadata;
	}

	function simpan_pengetahuan($id_penyakit,$id_gejala,  $mb, $md)
	{
		$this->koneksi->query("INSERT INTO pengetahuan (MB,MD, id_gejala,id_penyakit) 
			VALUES ('$mb','$md','$id_gejala','$id_penyakit')") or die(mysqli_error($this->koneksi));
	}
	function hapus_pengetahuan($id_pengetahuan)
	{

		$this->koneksi->query("DELETE FROM pengetahuan WHERE id_pengetahuan='$id_pengetahuan' ");
	}

	function ubah_pengetahuan( $id_penyakit,$id_gejala, $md,$mb, $id_pengetahuan)

	{
			//mengubah data di DB
		$this->koneksi->query("UPDATE pengetahuan SET MB='$mb', MD='$md', id_gejala='$id_gejala', id_penyakit='$id_penyakit'WHERE id_pengetahuan='$id_pengetahuan'");	
	}

	function detail_pengetahuan($id_pengetahuan)

	{
		$ambil= $this->koneksi->query("SELECT*FROM pengetahuan WHERE id_pengetahuan='$id_pengetahuan' ");

		return $ambil->fetch_assoc();

	}

	function cek_tambah_pengetahuan($id_penyakit,$id_gejala)
	{
		$ambil = $this->koneksi->query("SELECT * FROM pengetahuan WHERE id_penyakit='$id_penyakit' AND id_gejala='$id_gejala'");
		$hitung = $ambil->num_rows;

		if ($hitung > 0) 
		{
			return "ada";
		}
		else
		{
			return "belum  ada ";
		}
	}

	function cek_ubah_pengetahuan ($id_penyakit,$id_gejala,$id_pengetahuan)
	
	{
		$ambil = $this->koneksi->query("SELECT * FROM pengetahuan WHERE id_penyakit='$id_penyakit' AND id_gejala='$id_gejala' AND id_pengetahuan!='$id_pengetahuan'");
		$hitung = $ambil->num_rows;

		if ($hitung > 0) 
		{
			return "ada";
		}
		else
		{
			return "belum  ada ";
		}
	}

	function ambil_pengetahuan_gejala($id_gejala)
	{
		$semuadata=array();
		$ambil = $this->koneksi->query("SELECT * FROM pengetahuan WHERE id_gejala='$id_gejala' ");
		while ($data_array = $ambil->fetch_assoc()) 
		{
			$semuadata[] = $data_array ;
		}

		return $semuadata;
	}

	function ambil_pengetahuan_gejala_penyakit($id_gejala, $id_penyakit)
	{
		$ambil = $this->koneksi->query("SELECT * FROM pengetahuan WHERE id_gejala='$id_gejala' AND id_penyakit='$id_penyakit'");
		$pecah = $ambil->fetch_assoc();
		return $pecah;
	}
}

/**
* 
*/

class perhitungan extends pengetahuan
{
	public $koneksi;

	function __construct($database)
	{
		$this->koneksi = $database;
	}



	function hitung($data_gejala)
	{
		foreach ($data_gejala as $key => $value) 
		{
			$id_gejala = $value	;
			$pengetahuan_gejala = $this->ambil_pengetahuan_gejala($id_gejala);
			foreach ($pengetahuan_gejala as $key_pengetuahuan => $value_pengetuahuan) 
			{
				$penyakit_gejala[$value_pengetuahuan['id_penyakit']][]= $value_pengetuahuan['id_gejala'];
			}
		}

		foreach ($penyakit_gejala as $id_penyakit => $value_penyakit_gejala)
		{
			$jumlah_gejala_penyakit[$id_penyakit] = count($value_penyakit_gejala);
		}



			// Menghitung CF tiap gejala di penyakit
		foreach ($penyakit_gejala as $id_penyakit => $value_penyakit_gejala)
		{
			foreach ($value_penyakit_gejala as $key_penyakit_gejala => $id_gejala)
			{
				$pengetahuan_terambil = $this->ambil_pengetahuan_gejala_penyakit($id_gejala, $id_penyakit);
				$hitung[$id_penyakit][$id_gejala] = $pengetahuan_terambil['MB'] - $pengetahuan_terambil['MD'];
				
			}
		}


				// Mengubah id gejala menjadi key biasa
		foreach ($hitung as $id_penyakit => $isi_hitung)
		{
			foreach ($isi_hitung as $id_gejala => $nilai)
			{
				$hitung2[$id_penyakit][] = $nilai;
			}
		}



		foreach ($hitung2 as $id_penyakit => $isi_hitung)
		{
			foreach ($isi_hitung as $key_biasa => $nilai)
			{
				if($jumlah_gejala_penyakit[$id_penyakit]==1)
				{
					$cf[$id_penyakit] = $hitung2[$id_penyakit][$key_biasa];
				}
				else
				{

					// Menghitung CF kombinasi
					$cfkombinasi[$id_penyakit][1] = $this->rumus_cfkombinasi($hitung2[$id_penyakit][0], $hitung2[$id_penyakit][1]);
					$tampil_rumus[$id_penyakit][1] = $this->tampil_rumus($hitung2[$id_penyakit][0], $hitung2[$id_penyakit][1]);

					$no_kombinasi = 2;
					for($i=2;$i<=$jumlah_gejala_penyakit[$id_penyakit]-1;$i++)
					{
						$cfkombinasi[$id_penyakit][$no_kombinasi] = $this->rumus_cfkombinasi($cfkombinasi[$id_penyakit][$no_kombinasi-1], $hitung2[$id_penyakit][$i]);
						
						$tampil_rumus[$id_penyakit][$no_kombinasi] = $this->tampil_rumus($cfkombinasi[$id_penyakit][$no_kombinasi-1], $hitung2[$id_penyakit][$i]);


						$no_kombinasi+=1;

					}

					$cf[$id_penyakit] = end($cfkombinasi[$id_penyakit]);
				}
			}
		}


		$nilai_cf = max($cf);


		$data_akhir['jumlah_gejala_penyakit'] = $jumlah_gejala_penyakit;
		$data_akhir['hitung'] = $hitung;
		$data_akhir['hitung2'] = $hitung2;
		$data_akhir['cf_tiap_penyakit'] = $cf;
		$data_akhir['cf_kombinasi'] = $cfkombinasi;
		$data_akhir['tampil_rumus'] = $tampil_rumus;
		$data_akhir['nilai_cf'] = $nilai_cf;
		
		
		return $data_akhir;
	}


	function rumus_cfkombinasi($cfbaru, $cflama)
	{
		if($cfbaru > 0 AND $cflama > 0 )
		{
			$rumus = $cflama+$cfbaru*(1-$cflama);
		}
		elseif($cfbaru < 0 AND $cflama < 0 )
		{
			$rumus = $cflama+$cfbaru*(1+$cflama);
		}
		else
		{
			$rumus = ($cflama+$cfbaru)/(1-min($cflama,$cfbaru));
		}
		return $rumus;
	}

	function tampil_rumus($cfbaru, $cflama)
	{
		if($cfbaru > 0 AND $cflama > 0 )
		{
			// $rumus = "CFlama+CFbaru*(1-CFlama)";
			$rumus = $cflama." + ".$cfbaru." * ".'('."1"." - ".$cflama.')';
		}
		elseif($cfbaru < 0 AND $cflama < 0 )
		{
			$rumus = $cflama." + ".$cfbaru." * ".'('."1"."+".$cflama.')';
		}
		else
		{
			$rumus = "(".$cflama." + ".$cfbaru.")"." / "."(".'1'.' - '.'min'.'('.$cflama.','.$cfbaru.')'.')';
		}
		return $rumus;
	}
}

class admin
{
	
	function __construct($database)
	{
		$this->koneksi = $database;
	}

	function login_admin($username,$pass)
	{
		$ps = sha1($pass);
		$ambil = $this->koneksi->query("SELECT * FROM admin WHERE username_admin='$username' AND password_admin='$pass'");

		$hitung = $ambil->num_rows;
		if ($hitung == 1) 
		{
			$akun = $ambil->fetch_assoc();
			$_SESSION['admin'] = $akun;

			return "sukses";
		}
		else
		{

			$data =$this->koneksi->query ("SELECT * FROM data_pasien WHERE nik='$username' AND password_pasien ='$ps'");

			$hasil_cari = mysqli_num_rows($data);
			if ($hasil_cari == 1)
			{
				$data_mhs_lengkap =$data->fetch_assoc();
				$_SESSION['pasien'] =$data_mhs_lengkap;

				return "pasien";

			}

			else
			{
				return "gagal";
			}

		}

	}
}

class rekam_medis
{
	public $koneksi;

	function __construct($database)
	{
		$this->koneksi = $database;
	}

	function tampil_rekam_medis()
	{
		$semuadata = array();
		$ambil = $this->koneksi->query("SELECT * FROM rekam_medis 
			JOIN data_pasien ON rekam_medis.id_pasien = data_pasien.id_pasien
			JOIN penyakit ON rekam_medis.id_penyakit = penyakit.id_penyakit
			ORDER BY id_rekam_medis DESC
			") or die(mysqli_error($this->koneksi));
		while ($data_array = $ambil->fetch_assoc())
		{
			$semuadata[] = $data_array;
		}
		return $semuadata;
	}

	function tampil_rekam_medis_pasien($id_pasien)
	{
		$semuadata = array();
		$ambil = $this->koneksi->query("SELECT * FROM rekam_medis 
			JOIN data_pasien ON rekam_medis.id_pasien = data_pasien.id_pasien
			JOIN penyakit ON rekam_medis.id_penyakit = penyakit.id_penyakit
			WHERE rekam_medis.id_pasien='$id_pasien'
			ORDER BY id_rekam_medis DESC
			") or die(mysqli_error($this->koneksi));
		while ($data_array = $ambil->fetch_assoc())
		{
			$semuadata[] = $data_array;
		}
		return $semuadata;
	}

	function detail_rekam_medis($id_rekam_medis)
	{
		$ambil = $this->koneksi->query("SELECT * FROM rekam_medis 
			JOIN data_pasien ON rekam_medis.id_pasien = data_pasien.id_pasien
			JOIN penyakit ON rekam_medis.id_penyakit = penyakit.id_penyakit
			WHERE id_rekam_medis='$id_rekam_medis'
			") or die(mysqli_error($this->koneksi));
		return $ambil->fetch_assoc();
	}

	

	function ambil_gejala_dipilih($id_rekam_medis)
	{
		$semuadata = array();
		$ambil = $this->koneksi->query("SELECT * FROM gejala_dipilih 
			JOIN gejala ON gejala_dipilih.gejala_yg_dipilih = gejala.id_gejala
			WHERE id_rekam_medis='$id_rekam_medis'
			") or die(mysqli_error($this->koneksi));
		while ($data_array = $ambil->fetch_assoc())
		{
			$semuadata[] = $data_array;
		}
		return $semuadata;
	}


	function simpan_diagnosa($id_pasien, $id_penyakit, $cf)
	{
		$tgl = date("y-m-d");
		$this->koneksi->query("INSERT INTO rekam_medis (id_pasien, id_penyakit, cf_penyakit, tgl_rekam_medis) VALUES ('$id_pasien', '$id_penyakit', '$cf', '$tgl') ");
		return mysqli_insert_id($this->koneksi);
	}

	function simpan_gejala_dipilih($id_gejala, $id_rekam_medis)
	{
		$this->koneksi->query("INSERT INTO gejala_dipilih (id_rekam_medis, gejala_yg_dipilih) VALUES ('$id_rekam_medis', '$id_gejala' ) ") or die(mysqli_error($this->koneksi));
	}

	function simpan_penyakit_rekam_medis($id_penyakit, $cf_penyakit, $id_rekam_medis)
	{
		$this->koneksi->query("INSERT INTO penyakit_rekam_medis (id_rekam_medis, id_hasil_penyakit, nilai_cf_penyakit) VALUES ('$id_rekam_medis', '$id_penyakit', '$cf_penyakit' ) ") or die(mysqli_error($this->koneksi));
	}


}
$rekam_medis = new rekam_medis($database);


//menjadilan class pasien sbgai objek
$pasien = new pasien($database);
//menjadilan class penyakit sbgai objek
$penyakit = new penyakit($database);
$gejala = new gejala($database);
$obat = new obat($database);
$pengetahuan = new pengetahuan($database);
$admin = new admin($database);
$perhitungan = new perhitungan($database);
$rekam_medis = new rekam_medis($database);





?>

