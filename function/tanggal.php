<?php

$tglnow = date("Y-m-d");
$bulannow = date("m");
$tahunnow = date("Y");

$bulansebelum = '0'.($bulannow - 1);

$jenis = array('K/D','B/P','B/P/D','G','P') ;
define('baseurl', 'http://localhost/po_news');



function bulan(){
    if (isset($_POST['bulan'])){
        return $_POST['bulan'];
    }
}
function aman($kata){
	$hasil = strtoupper(mysql_real_escape_string($kata));
	return $hasil;
}
function ubahbulan($angka){
    switch ($angka){
        case '1' : $bulan = 'Januari';
            break;
        case '2' : $bulan = 'Febuari';
            break;
        case '3' : $bulan = 'Maret';
            break;
		case '4' : $bulan = 'April' ;
			break;
		case '5' : $bulan = 'Mey' ;
			break;
		case '6' : $bulan = 'Juni' ;
			break;
		case '7' : $bulan = 'Juli' ;
			break;
		case '8' : $bulan = 'Agustus' ;
			break;
		case '9' : $bulan = 'September' ;
			break;
		case '10' : $bulan = 'Oktober' ;
			break;
		case '11' : $bulan = 'November' ;
			break;
		case '12' : $bulan = 'Desember' ;
			break;
		default	  : $bulan = '';
		}
    return strtoupper($bulan);
}
function angkakebulan($tanggal){
    $tahun = substr($tanggal,0,4);
    $bulan = substr($tanggal, 5,2);
    $tanggal = substr($tanggal, 8,2);
    // $bulan = ubahbulan($bulan);
    $hasil = $tanggal.'/'.$bulan.'/'.$tahun;
    return $hasil;
}
function ubahstatus($id){
	$konvert = mysql_query("SELECT * FROM status WHERE st_id = ".$id."")or die (mysql_error());
    $ambilas = mysql_fetch_array($konvert);
    $namaas = $ambilas['st_nama'];
    return $namaas;
}
function ubahasuransi($asuransi){
    $konvertasuransi = mysql_query("SELECT * FROM asuransi WHERE as_kode = '$asuransi' ");
    $ambilas = mysql_fetch_array($konvertasuransi);
    $namaas = $ambilas['as_nama'];
    return $namaas;
}
function ubahasuransi2($asuransi){
    $konvertasuransi = mysql_query("SELECT * FROM asuransi WHERE as_kode = '$asuransi' ")or die (mysql_error());
    $ambilas = mysql_fetch_array($konvertasuransi);
    $namaas = $ambilas['as_nama'];
    return $namaas;
}
function asuransiubah($asuransi){
	$konvertasuransi = mysql_query("SELECT * FROM asuransi WHERE as_nama = '$asuransi' ");
    $ambilas = mysql_fetch_array($konvertasuransi);
    $namaas = $ambilas['as_kode'];
    return $namaas;
}
function rupiah($nominal){
    $rupiah = number_format($nominal,0, ",",".");
    $rupiah = $rupiah; // Bisa di tambah kan Rp. $rupiah
    return $rupiah;
}
function cekbulan($page){
	$tanggal = date('Y-m');
	if (isset($_POST['bulan'])){
		$tanggal = $_POST['bulan'];
	}

	return $tanggal;


}
// Buat hapus tanda spasi jadi +
function hapusspasi($url){
	 $kata = str_replace(' ','+',$url);
	return $kata;
}
function tambahspasi($url){
	 $kata = str_replace('+',' ',$url);
	 return $kata;
}

function  tanggal_indonesia($tgl){
$tanggal  =  substr($tgl,8,2);
$bulan  =  getBulan(substr($tgl,5,2));
$tahun  =  substr($tgl,0,4);
return  $tanggal.' '.$bulan.' '.$tahun;
}

function  getBulan($bln){
        switch  ($bln){
        case  1:
        return  "Jan";
        break;
        case  2:
        return  "Feb";
        break;
        case  3:
        return  "Maret";
        break;
        case  4:
        return  "April";
        break;
        case  5:
        return  "Mei";
        break;
        case  6:
        return  "Jun";
        break;
        case  7:
        return  "Jul";
        break;
        case  8:
        return  "Agust";
        break;

        case  9:

        return  "Sept";

        break;

        case  10:

        return  "Okt";

        break;

        case  11:

        return  "Nov";

        break;

        case  12:

        return  "Des";

break;

}

}

?>
