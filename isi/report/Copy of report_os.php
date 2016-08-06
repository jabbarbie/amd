<?php
	include ('../../config/koneksi.php');
	include ('../../function/tanggal.php');

	$bulan 		= $_GET['bulan'];
	$asuransi 	= $_GET['asuransi'];
	$tahun 		= $_GET['tahun'];
	// Inisisaliasi Total
	$grandtotaljasa		= 0;
	$grandtotalpart		= 0;
	$grandtotalpartjasa	= 0;
	if ($asuransi == "all"){ $asuransi = '';}
	if ($asuransi <> "4"){
		// Jika asuransi dipilih semua
		if ($asuransi == ''){
				$query = "SELECT * FROM unit u JOIN estimasi e ON u.u_kode = e.u_kode WHERE MONTH(es_tgl_masuk) = '$bulan' AND YEAR(es_tgl_masuk) = '$tahun' ORDER BY e.es_tgl_masuk ASC";
		}
		else
			{
				// Jika asuransi dipilih
				$query = "SELECT * FROM unit u JOIN estimasi e ON u.u_kode = e.u_kode WHERE asuransi = '$asuransi' AND month(es_tgl_masuk) = '$bulan' AND YEAR(es_tgl_masuk) = '$tahun' ORDER BY e.es_tgl_masuk ASC";
			}
	}
	else {
				$query = "SELECT * FROM unit u JOIN estimasi e ON u.u_kode = e.u_kode WHERE e.asuransi = 4 ORDER BY e.es_tgl_masuk ASC";	
		}
	$dataunit	 = mysql_query($query) or die (mysql_error());
?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>OS__<?php echo ubahasuransi($asuransi) ?></title>
		<link rel="stylesheet" href="../../css/report.css" />
	</head>
	
	<body onload="window.print()" >
	<div id="wrapper2">
	  <table width="100%" align="center" cellpadding="3" cellspacing="1">
		  <tr><th colspan="8"><h3>Data OutStanding <?php echo 'Asuransi '.ubahasuransi($asuransi).' Bulan '.ubahbulan($_GET['bulan']).' '.$tahun ?> </h3></th></tr>
		  <tr><th colspan="8">&nbsp;</th></tr> 
		  <th class=judul>No</th>
		  <th class=judul>Nopol</th>
		  <th class=judul>Tgl Masuk</th>
		  <th class=judul>Tertanggung</th>
		  <th class=judul>Type</th>
		  
		  <?php 
			// Jika Out Standing Astra
			if ($asuransi <> "4") {
				echo "<th class=judul>Jasa</th>
					  <th class=judul>Part </th>
					  <th class=judul>Total</th>";
				}
			else {
				echo "<th class=judul>Status</th>
				      <th class=judul>Ket</th>";
				}
	  $no = 1;
	  while ($data = mysql_fetch_array($dataunit)){
			$totaljasa	= 0;
			$totalpart	= 0;
		// Inisialiasi Variable
			$u_kode 	= $data['u_kode'];
			$nama 		= strtoupper($data['u_nama']);
			$nopol 		= strtoupper($data['u_nopol']);
			$norangka 	= $data['u_norangka'];
			$nomesin 	= $data['u_nomesin'];
			$merk		= $data['u_merk'];
			$model		= $data['u_model'];
			$tahun		= $data['u_tahun'];
			$nomodel	= $data['u_nomodel'];
			
			$es_kode	= $data['es_kode'];
			$tglmasuk	= $data['es_tgl_masuk'];
			$tglkeluar	= $data['es_tgl_keluar'];
			$asuransi	= ubahasuransi($data['asuransi']);
			$ket		= $data['ket'];
			$status		= $data['status'];
			$tglbuat	= $data['es_tgl_buat'];
			$nospk		= $data['es_nospk'];
			
			
		
		echo '<tr>
				<td>'.$no.'.</td>
				<td>'.$nopol.'</td>
				<td>'.angkakebulan($tglmasuk).'</td>
				<td>'.$nama.'</td>
				<td>'.$model.'</td>';
		$no++;
		$qtotaljasa 	= mysql_query("SELECT SUM(ja.ja_price) AS TotalJasa FROM estimasijasa esja INNER JOIN jasa ja ON esja.ja_kode = ja.ja_kode WHERE esja.es_kode = '$es_kode' ");
		$qtotalpart 	= mysql_query("SELECT SUM(p.part_harga) AS TotalPart FROM estimasipart espart INNER JOIN part p ON espart.part_kode = p.part_kode WHERE espart.es_kode = '$es_kode' ");
		
		$ambiltotaljasa	= mysql_fetch_array($qtotaljasa);
		$subtotaljasa	= $ambiltotaljasa['TotalJasa'];
		
		$ambiltotalpart	= mysql_fetch_array($qtotalpart);
		$subtotalpart	= $ambiltotalpart['TotalPart'];
		
		$totaljasa	= $totaljasa + $subtotaljasa;
		$totalpart	= $totalpart + $subtotalpart; // Total Part
			
		$jasadanpart = $totaljasa+ $totalpart;
		
		// TotalKeseluruhan
		$grandtotaljasa		= $grandtotaljasa + $totaljasa; 
		$grandtotalpart 	= $grandtotalpart + $totalpart; 
		$grandtotalpartjasa = $grandtotalpartjasa + $jasadanpart; 
		
		if ($_GET['asuransi'] <> 4) {
			echo '<td align=right>'.rupiah($totaljasa).'</td>';
			
			echo '<td align=right>'.rupiah($totalpart).'</td>';
			echo '<td align=right>'.rupiah($jasadanpart).'</td></tr>';
			
			}
		else {
			echo '<td>'.$status.'</td>';
			echo '<td>'.$ket.'</td></tr>';
			}
		}
		
		if ($_GET['asuransi'] <> 4){
			
			echo '<tr>
					<th colspan=5 class=judul>Total</th><th align=right>'.rupiah($grandtotaljasa).'</th><th align=right>'.rupiah($grandtotalpart).'</th><th align=right>'.rupiah($grandtotalpartjasa).'</th>
				  
				  </tr>';
			}
		echo '</table>';
  ?>
</table>
	<br />
	<p align=right>Hormat Kami</p>
    <br />
    <br />
    <p align=right>Manager Bengkel</p>
  
</div>
</body>
</html>