 <section class="content-header">
 	<h1>
 		Proses Hitung
 		<small> </small>
 	</h1>
 </section>

 <section class="inner">
 	<div class="form-body wow fadeIn animated">
 		<div class="box">
 		 
 			<div class="box-body">
 				<?php 
// objek pasien menjalankan fungsi tampil_pasien
 				$data_pasien = $pasien->tampil_pasien();
 				?>
 				<table id="example1" class="table table-bordered table-striped" >
 					<thead>
 						<tr>
 							<th>No </th>
 							
 							<th>Nama</th>
 							<th>Alamat</th>
 							<th>Opsi</th>
 						</tr>
 					</thead>
 					<tbody>
 						<?php foreach ($data_pasien as $key => $value) :?>
 							<tr>
 								<td><?php echo $key+1 ?></td>
 								
 								<td><?php echo $value['nama_pasien'] ?></td>
 								
 								
 								<td><?php echo $value['alamat_pasien'] ?></td>

 								<td>
 									
 									<a href="index.php?halaman=hitung&id_pasien=<?php echo $value['id_pasien']; ?>" class="btn btn-primary">Hitung</a>	
 									
 								</td>
 								
 							</tr>
 						<?php endforeach ?>
 					</tbody>
 				</table>
 				
 			</div>
 		</div>
 	</div>
 </section>