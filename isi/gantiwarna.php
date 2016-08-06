<?php
	// Ganti warna
	$no = 0;
	// Set Nilai default dari if
	$qbulan		= " MONTH(e.es_tgl_masuk) <> '0' ";
	$qpencarian = " e.es_kode <> '' ";
	$nbulan		= 0;
	if (isset($_POST['bulan']) or (isset($_POST['pencarian']))){
		$bulan 		= $_POST['bulan'];
		$pencarian 	= $_POST['search'];
		if ($bulan != ''){
			$ntahun		= substr($bulan, 0,4);
			$nbulan		= substr($bulan, 5,2);
			
			$qbulan		= " MONTH(ga.ga_tglbuat) = ".$nbulan." AND YEAR(ga.ga_tglbuat) = ".$ntahun." " ;
			}
		if ($pencarian != ''){
			$kata		= "'%$pencarian%'";
			$qpencarian	= " u.u_nama LIKE $kata OR u.u_nopol LIKE $kata OR u.u_model LIKE $kata OR u.u_merk LIKE $kata OR u.u_model LIKE $kata OR u.u_kode ";
			}
	$query_awal = "SELECT * FROM unit u JOIN gantiwarna g ON g.u_kode = u.u_kode WHERE ".$qbulan." AND ".$qpencarian." GROUP BY u.u_kode ORDER BY g.es_tglbuat ASC";
	}
	else {
			$query_awal = "SELECT * FROM unit u JOIN gantiwarna g ON g.u_kode = u.u_kode WHERE (MONTH(g.g_tglbuat) BETWEEN ".$bulansebelum." AND ".$bulannow." ) GROUP BY u.u_kode ORDER BY g.g_tglbuat DESC LIMIT 0,7";
	
}
?>
<!-- Pencarian -->
<div class=well align=right>	
	<form method=POST>
		<input type=hidden name=p value=os />
             
                <input type="month" name="bulan" value="<?php echo bulan() ?>" class="duaratuspixel"  >
		<div class="input-append">
		  <input onclick="getvalue()" rel=tooltip class="span3" name="search" class=tooltip id="pencarian" type="text" placeholder="Nopol, Jenis Kend, Nama Tertanggung.. " autofocus >
		  <button class="btn" type="submit">Search</button>
		</div>
<!-- Tombol Navigasi -->
	</form>
</div>

<div >
	<a href="#input" role="button" data-toggle="modal" class="btn btn-small btn-primary" onclick="inputdata('isi/crud/input.php?p=unit','700','500')" >Tambah Unit</a>
	<a href="isi/report/report_os.php?bulan=<?php echo $nbulan?>&tahun=<?= $ntahun?>" class="btn btn-small btn-primary" target=_Blank >Print </a>
</div>


<!-- Table Data Mobil -->
<table class="table table-striped table-bordered table-hover" id="tbl_unit">
	<tr >
		<th ><p align=center>No</p></th>
		<th ><p align=center>Tgl Buat</p></th>
		<th ><p align=center>Nopol</p></th>
		<th >Nama Tertanggung</th>
		<th >Tipe Kend</th>
		<th > Warna Asal </th>
		<th > Warna Sekarang </th>
	</tr>
	
	<?php
	
	
	$query = mysql_query($query_awal) or die (mysql_error());
	while ($data = mysql_fetch_array($query)){
		$no++;
		if ($data['u_nama'] == ""){
			$data['u_nama'] = "Data Tak Bernama";
			}
		echo "<tr>
		<td><p align=center>".$no."</p></td>
		<td><p align=center>".tanggal_indonesia($data['g_tglbuat'])."</a></p></td>
		<td ><p align=center>".$data['u_nopol']."</p></td>
		<td ><a href='?p=listestimasi&id=".$data['u_kode']." ' >".$data['u_nama']."</a></td>
		<td>".$data['u_model']."</td>
		";
		echo "</tr>";
		echo "</tr>";
		//$total = :
	}
	
	
	?>
</table>