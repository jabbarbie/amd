<?php 
require ("../../function/input.php");
require ("../../function/tanggal.php");
//require ("../../js/crud.js");
$x = 0;
$y = 0;
$page 	= $_GET['page'];
	// Input Unit
	/*
	if ($_POST['halaman'] == "unit" ){
		$nama 	= " '".aman($_POST['nama'])." ' ";
		$nopol	= " '".aman($_POST['nopol'])." ' ";
		$tipe	= " '".aman($_POST['tipe'])." ' ";
		$merk	= " '".aman($_POST['merk'])." ' ";
		$norangka= " '".aman($_POST['no_rangka'])." ' ";
		$nomesin = " '".aman($_POST['no_mesin'])." ' ";
		$tahun	= " '".aman($_POST['tahun'])." ' ";
		$nomodel= " '".aman($_POST['no_model'])." ' ";
		$u_kode= " '".aman($_POST['u_kode'])." ' ";
		// Cek apakah nopol disi / tidak
		if ($_POST['nopol'] == ""){
			$nopol	= ", 'Null' ";
			$_POST['nopol'] = "Null";
		}	
		//Update data Set field = isi
		$isi 	= array(" u_nama = $nama",", u_nopol = $nopol"
						,", u_merk = $tipe",", u_model = $merk",", u_tahun = $tahun"
						,", u_nomodel = $nomodel",", u_norangka = $norangka" ,", u_nomesin = $nomesin");
		
		$x 		= updatedata("unit","u_kode",$u_kode,$isi);
		
	    
	}
	// edit Estimasi
	if ($_POST['halaman'] == "estimasi" ){
		$tgl_masuk 	= " '".aman($_POST['tgl_masuk'])." ' ";
		$tgl_keluar	= " '".aman($_POST['tgl_keluar'])." ' ";
		$nospk		= " '".aman($_POST['no_spk'])." ' ";
		$asuransi	= " '".aman($_POST['asuransi'])." ' ";
		$status		= " '".aman($_POST['status'])." ' ";
		$ket		= " '".aman($_POST['ket'])." ' ";
		$tgl_buat 	= " '".$tglnow." ' ";
		$es_kode		= " '".aman($_POST['es_kode'])." ' ";
		
		//Update data Estimasi Set field = isi
		$isi 	= array(" es_tgl_masuk = $tgl_masuk",", es_tgl_keluar = $tgl_keluar"
						,", es_nospk = $nospk",", asuransi = $asuransi",", ket = $ket"
						,", es_tgl_buat = $tgl_buat ");
		
		$x 		= updatedata("estimasi","es_kode",$es_kode,$isi);
	}
	*/
	// Delete Jasa
	if ($page	== "esja") {
		$kode	= $_GET['kode'];
		$x		= deletedata("estimasijasa","esja_kode",$kode);
		echo "sucess";
	}
	// Delete Estimasi
	if ($page	== "estimasi") {
		$kode	= $_GET['kode'];
		$x		= deletedata("estimasijasa","es_kode",$kode);
		$y		= deletedata("estimasi","es_kode",$kode);
		
		echo "Berhasil menghapus Estimasi data <b> ".$kode." </b>
		<br /> Klik <a href='../../index.php'> disini </a> untuk kembali 
		".$x.' '.$y;
	}
	if ($page	== "unit"){
		$kode	= $_GET['idunit'];
		$x		= deletedata("estimasijasa","es_kode",$kode);
		$y		= deletedata("estimasi","es_kode",$kode);
		$z		= deletedata("unit","u_kode",$kode);
		
		echo "Berhasil menghapus data Unit <b> ".$kode." </b>
		<br /> Klik <a href='../../index.php'> disini </a> untuk kembali 
		".$x.' '.$y;
	}
	if ($page	== "estimasijasa"){
		$kode	= $_GET['kode'];
		$x		= deletedata("estimasijasa","esja_kode",$kode);
		
		echo "Berhasil menghapus item jasa <b> ".$kode." </b>
		
		".$x;
	}
	if ($page       == "estimasipart"){
			$kode   = $_GET['kode'];
			$x      = deletedata("estimasipart", "espart_kode", $kode);
			
			echo "Berhasil menghapus item";
	}
	if ($page       == "part"){
		$kode   = $_GET['kode'];
		$x      = deletedata("part", "part_kode", $kode);
		
		echo "Berhasil menghapus item";
	}
	if ($page       == "jasa"){
		$kode   = $_GET['kode'];
		$x      = deletedata("jasa", "ja_kode", $kode);
		
		echo "Berhasil menghapus item";
	}
	
?>

<script>
    self.close();
    window.opener.location.reload();
</script>
