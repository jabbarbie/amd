<?php
	// Set Nilai Post jika pencarian tidak di inputkan
	$asuransi	= 'Semua';
	$bulan		= '';
	$ntahun		= '';
	// Set Nilai default dari if
	$qasuransi 	= " asuransi <> '' ";
	$qbulan		= " MONTH(e.es_tgl_masuk) <> '0' ";
	$qpencarian = " e.es_kode <> '' ";
	$nbulan		= 0;
	if (isset($_GET	['asuransi'])){
		$asuransi 	= $_GET['asuransi'];
		$bulan 		= $_GET['bulan'];
		$pencarian 	= $_GET['search'];

		if ($asuransi != "all"){
			$asuransi 	= asuransiubah($_GET['asuransi']);
			$qasuransi	= "e.asuransi = ".$asuransi;
		}
		if ($bulan != ''){
			$ntahun		= substr($bulan, 0,4);
			$nbulan		= substr($bulan, 5,2);

			$qbulan		= " MONTH(e.es_tgl_masuk) = ".$nbulan." AND YEAR(e.es_tgl_masuk) = ".$ntahun." " ;
			}
		if ($pencarian != ''){
			$kata		= "'%$pencarian%'";
			$qpencarian	= " u.u_nama LIKE $kata OR u.u_nopol LIKE $kata OR u.u_model LIKE $kata OR u.u_merk LIKE $kata OR u.u_model LIKE $kata OR u.u_kode
			LIKE $kata OR u.u_norangka LIKE $kata
			OR e.status LIKE $kata OR u.u_norangka LIKE $kata ";
			}

			$query_awal = "SELECT * FROM unit u JOIN estimasi e ON e.u_kode = u.u_kode WHERE ".$qasuransi." AND ".$qbulan." AND ".$qpencarian." ORDER BY e.asuransi, e.es_tgl_masuk ASC ";
	}
	else {
			$query_awal = "SELECT * FROM unit u JOIN estimasi e ON e.u_kode = u.u_kode WHERE (MONTH(e.es_tgl_masuk) BETWEEN ".$bulansebelum." AND ".$bulannow." ) ORDER BY e.es_tgl_buat  DESC ";

}

?>
<!-- Pencarian -->
<div class=well align=right>
	<form method=GET class="form-inline" name=form>
		<input type=hidden name=p value=os />
                <select name="asuransi" class="seratuspixel form-control"><option value="all">Semua</option><?php DropdownSelect('asuransi','as_kode','as_nama',$_GET['asuransi'])?></select>
                <input type="month" name="bulan" value="<?php echo $bulan ?>" class="duaratuspixel form-control" role="form" >

		  <input onclick="getvalue()" rel=tooltip class="span3 form-control" name="search" id="pencarian" type="text" placeholder="Nopol, Jenis Kend, Nama Tertanggung.. " autofocus >
		  <input type="submit" class="btn " value="Cari" />

	</form>
</div>

<!-- Tombol Navigasi -->
<div >
	<a href="#input" role="button" data-toggle="modal" class="btn btn-small btn-primary" onclick="inputdata('isi/crud/input.php?p=unit','700','500')" >Tambah Unit</a>
	<a href="isi/report/report_os.php?bulan=<?php echo $nbulan?>&tahun=<?php echo $ntahun?>&asuransi=<?php echo $asuransi ?>" class="btn btn-small btn-primary" target=_Blank >Print </a>
</div>


<!-- Table Data Mobil -->
<table class="table table-striped table-bordered table-hover" id="tbl_unit">
	<tr >
		<th ><p align=center>No</p></th>
		<th ><p align=center>Asuransi</p></th>
		<th ><p align=center>Tgl Estimasi</p></th>
		<th ><p align=center>Nopol</p></th>
		<th >Nama Tertanggung</th>
		<th >Tipe Kend</th>
		<th ><p align=center>Status</p></th>
	</tr>

	<?php

	$query = mysql_query($query_awal) or die (mysql_error());


	### Setting Paggin ##
	// Set Pangging

	$per_page	= 6;

	//$page_query	= mysql_query("SELECT COUNT(*) FROM pelanggan");
	$page_query	= mysql_num_rows($query);
	$pages		= ceil($page_query / $per_page);


	$page		= (isset($_GET['halaman'])) ? (int)$_GET['halaman'] : 1;
	$start		= ($page - 1) * $per_page;

	$sql 		= $query_awal.' LIMIT '.$start.', '.$per_page;
	$querysql	= mysql_query($sql);
	//$sql 		= $query_awal;
	$no = 1 * $start + 1;

	### ini script kalo pke total ###
	while ($data = mysql_fetch_array($querysql)){


		$es_kode 	= $data['es_kode'];

		if ($data['u_nama'] == ""){
			$data['u_nama'] = "Data Tak Bernama";
			}


		echo "<tr>

		<td><p align=center>".$no."</p></td>
		<td ><p align=center>".ubahasuransi($data['asuransi'])."</p></td>
		<td><p align=center>".tanggal_indonesia($data['es_tgl_masuk'])."</a></p></td>
		<td ><p align=center>".$data['u_nopol']."</p></td>
		<td ><a href='?p=listestimasi&id=".$data['u_kode']." ' >".$data['u_nama']."</a></td>
		<td>".$data['u_model']."</td>
		<td><p align=center>".$data['status']."</p></td>

		</tr>";
		$no++;
	};
	echo br."</table>";
	// inisial pagging
	$page		= (isset($_GET['halaman'])) ? (int)$_GET['halaman'] : 1;
	$search		= (isset($_GET['search'])) ? $_GET['search'] : '';
	$bulan		= (isset($_GET['bulan'])) ? $_GET['bulan'] : '';
	$asuransi	= (isset($_GET['asuransi'])) ? $_GET['asuransi'] : 'all';

	if(($pages >= 1 && $page <= $pages) AND (isset($_GET['bulan']))){
		echo "<ul class='pagination'>";
		for($x=1; $x<=$pages; $x++){
			echo ($x == $page) ? '<li class=active><a href=?p='.$_GET['p'].'&halaman='.$x.'&asuransi='.$asuransi.'&bulan='.$bulan.'&search='.$search.'>'.$x.'</a></li> ' : '<li><a href=?p='.$_GET['p'].'&halaman='.$x.'&asuransi='.$asuransi.'&bulan='.$bulan.'&search='.$search.'>'.$x.'</a></li> ';
		}
	}
	?>
