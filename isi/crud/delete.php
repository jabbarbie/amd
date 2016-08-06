<?php
include ("head.php");
if (!isset($_GET['p'])){
	echo "<h1>Data Kosong</h1>";
}
else {
	require ("../../function/input.php");
	$p 		= $_GET['p'];
	
	switch ($p){
	//Unit
	case 'unit'		: 	
						$u_kode	= $_GET['idunit'];
						$sql	= "SELECT * FROM unit WHERE u_kode = '$u_kode' ";
						$query	= mysql_query($sql);
						
						$unit = mysql_fetch_array($query); 
					
						?>
						
						<form class="forminput" action="edit_query.php" method=POST >
						<input type=hidden name=halaman value=unit />
						<input type=hidden name=u_kode value="<?php echo $u_kode ?>" />
						<table class="table table-bordered table-striped">
							<tr>
								<td> <label>Nama </label></td>
								<td> <input type=text name=nama class="span2" placeholder="Nama Tertanggung" value="<?php echo $unit['u_nama']; ?>" autofocus /></td>
							
								<td> <label>Nopol</label></td>
								<td> <input type=text name=nopol class="span1" value="<?php echo $unit['u_nopol']?>" /></td>
							</tr>
							<tr>
								<td> <label>Tipe</label></td>
								<td> <input type=text name=tipe class="span2" placeholder="Misal : Toyota" size="5" value="<?php echo $unit['u_merk'] ?>" />
									 <input type=text name=merk class="span2" placeholder="Misal : Avanza" size="2" value="<?php echo $unit['u_model'] ?>" /></td>
							
								<td> <label>Tahun</label></td>
								<td> <input type=text name=tahun class="span2" placeholder="Tahun Kendaraan" size="5" value="<?php echo $unit['u_tahun'] ?>" /> </td>
							</tr>
							<tr>
								<td> <label>No Rangka</label></td>
								<td> <input type=text name=no_rangka placeholder="Nomor Rangka" class="span2" value="<?php echo $unit['u_norangka'] ?>" /></td>
							
								<td> <label>No Mesin </label></td>
								<td> <input type=text name=no_mesin placeholder="Nomor Mesin" class="span2" value="<?php echo $unit['u_nomesin'] ?>" /></td>
							</tr>
							<tr>
								<td> <label>No. Model</label></td>
								<td> <input type=text name=no_model placeholder="Nomor Model" class="span2" value="<?php echo $unit['u_nomodel'] ?>" /></td>
							
								<td> <label></label></td>
								<td> <input type=submit id=tombolsimpan class="btn btn-primary" value="Simpan" /></td>
							</tr>
						</table>
						</form>
						<?php
						;
					  break;
	case 'estimasi' : 
					  // Estimasi
					  $es_kode	= $_GET['idunit'];
					  $sql	= "SELECT * FROM estimasi WHERE es_kode = '$es_kode' ";
					  $query	= mysql_query($sql);
					  
					  $estimasi = mysql_fetch_array($query); 
					  
					  ?>
					  <form class="forminput" action="edit_query.php" method=POST >
					  <fieldlist>
					  <legend>Edit Estimasi <?php echo $estimasi['es_tgl_masuk']; ?></legend>
						<input type=hidden name=halaman value=estimasi />
						<input type=hidden name=es_kode value=<?php echo $_GET['idunit']?> />
						<table class="table table-bordered table-striped">
							<tr>
								<td> <label>Tgl Masuk</label></td>
								<td> <input type=date name=tgl_masuk class="span2" autofocus required value="<?php echo $estimasi['es_tgl_masuk'] ?>" /></td>
							
								<td> <label>Tgl Keluar</label></td>
								<td> <input type=date name=tgl_keluar class="span2" value="<?php echo $estimasi['es_tgl_keluar'] ?>" /></td>
							</tr>
							<tr>
								<td> <label>No. SPK / Polis </label></td>
								<td> <input type=text name=no_spk placeholder="SPK / Polis " class="span2" value="<?php echo $estimasi['es_nospk'] ?>" /></td>
								
								<td> <label>Status </label></td>
								<td> <select name=status style="width: 80%"><?php include("../../function/status.php") ?></select></td>
							</tr>
							<tr>
								<td> <label>Ket</label></td>
								<td> <textarea name=ket ><?php echo $estimasi['ket'] ?></textarea></td>
								
								<td> <label>Asuransi </label></td>
								<td> <select name="asuransi"><option value=<?php echo ($estimasi['asuransi']); ?> selected><?php echo ubahasuransi($estimasi['asuransi']); ?></option><?php include("../../function/asuransi.php") ?> </select></td>
							</tr>
							<tr>
								<td> <label></label></td>
								<td colspan=4> <input type=submit id=tombolsimpan class="btn btn-primary" value="Simpan" /></td>
							
							</td>
						</table>
					  </form>
					  </fieldlist>
					  <?php
					  ;
					  break;
	}
}
?>
