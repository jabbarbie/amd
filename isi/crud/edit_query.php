<?php 
require ("../../function/input.php");
require ("../../function/tanggal.php");
$x = 0;
$y = 0;
	// Input Unit
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
						,", es_nospk = $nospk",", asuransi = $asuransi",", status = $status ",", ket = $ket"
						,", es_tgl_buat = $tgl_buat ");
		
		$x 		= updatedata("estimasi","es_kode",$es_kode,$isi);
	}
	// edit Part
	if ($_POST['halaman'] == "part" ){
		$part_kode	= " '".aman($_POST['kode'])." ' ";
		$nama	 	= " '".aman($_POST['nama'])." ' ";
		$code		= " '".aman($_POST['code'])." ' ";
		$unit		= " '".aman($_POST['unit'])." ' ";
		$harga		= " '".aman($_POST['harga'])." ' ";
		$hargalist	= " '".aman($_POST['harga_default'])." ' ";
		
		
		//Update data Estimasi Set field = isi
		$isi 	= array(" part_code = $code",", part_nama = $nama"
						,", part_unit = $unit",", part_harga = $harga",", part_harganormal = $hargalist ");
		
		$x 		= updatedata("part","part_kode",$part_kode,$isi);
	}
	// edit Jasa
	if ($_POST['halaman'] == "jasa" ){
		$ja_kode	= " '".aman($_POST['kode'])." ' ";
		$nama	 	= " '".aman($_POST['nama'])." ' ";
		$jenis		= " '".aman($_POST['jenis'])." ' ";
		$harga		= " '".aman($_POST['harga'])." ' ";
		
		
		//Update data Estimasi Set field = isi
		$isi 	= array("ja_nama = $nama"
						,", ja_jenis = $jenis",", ja_price = $harga ");
		
		$x 		= updatedata("jasa","ja_kode",$ja_kode,$isi);
	}


?>

<script>
    self.close();
    window.opener.location.reload();
</script>
