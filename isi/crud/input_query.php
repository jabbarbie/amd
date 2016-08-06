<?php 
require ("../../function/input.php");
require ("../../function/tanggal.php");
$x = 0;
$y = 0;
	// Input Unit
	if ($_POST['halaman'] == "unit" ){
		$nama 	= ", '".aman($_POST['nama'])." ' ";
		$nopol	= ", '".aman($_POST['nopol'])." ' ";
		$tgl_masuk 	= ", '".aman($_POST['tgl_masuk'])." ' ";
		$tgl_keluar	= ", '".aman($_POST['tgl_keluar'])." ' ";
		$tipe	= ", '".aman($_POST['tipe'])." ' ";
		$merk	= ", '".aman($_POST['merk'])." ' ";
		$norangka= ", '".aman($_POST['no_rangka'])." ' ";
		$nomesin = ", '".aman($_POST['no_mesin'])." ' ";
		$tahun	= ", '".aman($_POST['tahun'])." ' ";
		$nomodel= ", '".aman($_POST['no_model'])." ' ";
		$nospk	= ", '".aman($_POST['no_spk'])." ' ";
		$asuransi= ", '".aman($_POST['asuransi'])." ' ";
		$status	= ", '".aman($_POST['status'])." ' ";
		$ket	= ", '".aman($_POST['ket'])." ' ";
		$tgl_buat = ", '".$tglnow." ' ";
		// Cek apakah nopol disi / tidak
		if ($_POST['nopol'] == ""){
			$nopol	= ", 'Null' ";
			$_POST['nopol'] = "Null";
		}	
		$u_kode	= " '".str_replace(" ","",$_POST['nopol']).substr($_POST['tgl_masuk'],5,2).substr($_POST['tgl_keluar'],8,3)."'";
		$isi 	= array($u_kode,$nama,$nopol,$tipe,$merk,$tahun,$nomodel,$norangka,$nomesin);
		$field	= array("u_kode",", u_nama",", u_nopol",", u_merk",", u_model",", u_tahun",", u_nomodel",
						", u_norangka",", u_nomesin");
		$x 		= inputdata("unit",$field,$isi);
		
		$isi2	= array("NULL ,",$u_kode,$tgl_masuk,$tgl_keluar,$asuransi,$ket,$status,$nospk,$tgl_buat);
		$field2	= array("es_kode",", u_kode",", es_tgl_masuk",", es_tgl_keluar",", asuransi",", ket",", status",", es_nospk",", es_tgl_buat");
		$y 		= inputdata("estimasi",$field2,$isi2);
		
                }
	if ($_POST['halaman'] == "estimasi" ){
		$tgl_masuk 	= " '".aman($_POST['tgl_masuk'])." ' ";
		$tgl_keluar	= ", '".aman($_POST['tgl_keluar'])." ' ";
		$nospk		= ", '".aman($_POST['no_spk'])." ' ";
		$asuransi	= ", '".aman($_POST['asuransi'])." ' ";
		$status		= ", '".aman($_POST['status'])." ' ";
		$ket		= ", '".aman($_POST['ket'])." ' ";
		$tgl_buat 	= ", '".$tglnow." ' ";
		$u_kode		= ", '".aman($_POST['u_kode'])." ' ";
		$isi		= array($tgl_masuk,$tgl_keluar,$tgl_buat,$status,$ket,$asuransi,$u_kode);
		$field		= array("es_tgl_masuk",", es_tgl_keluar",", es_tgl_buat",", status",", ket",", asuransi",", u_kode");
		
		$y			= inputdata("estimasi",$field,$isi);
                
        }
	if ($_POST['halaman'] == "asuransi" ){
		$nama		= " '".aman($_POST['nama'])." ' ";
		$ket		= ", '".aman($_POST['ket'])." ' ";
		
		$isi		= array($nama,$ket);
		$field		= array("as_nama ",",as_deskripsi");
		
		$y			= inputdata("asuransi",$field,$isi);
		
        }
	if ($_POST['halaman'] == "status" ){
		$nama		= " '".aman($_POST['nama'])." ' ";
		$ket		= ", '".aman($_POST['ket'])." ' ";
		
		$isi		= array($nama,$ket);
		$field		= array("st_nama ",",st_ket");
		
		$y			= inputdata("status",$field,$isi);
		
        }
?>

<script>
    self.close();
    window.opener.location.reload();
</script>

