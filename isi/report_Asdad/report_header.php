<?php 
include ('../../config/koneksi.php');
include ('../../function/tanggal.php');

if ($_GET['p'] = "os") {
	if (isset($_GET['eskode'])){
		$eskode			= $_GET['eskode'];
		$dataestimasi	= "SELECT * FROM unit u INNER JOIN estimasi e ON u.u_kode = e.u_kode WHERE es_kode=".$eskode;
		$queryus		= mysql_query($dataestimasi) or die (mysql_error());
		$jumlahdata		= mysql_num_rows($queryus);
		if ($jumlahdata > 0){
			$data			= mysql_fetch_array($queryus);
			
			// Inisialiasi Variable
			$u_kode 	= $data['u_kode'];
			$nama 		= $data['u_nama'];
			$nopol 		= $data['u_nopol'];
			$norangka 	= $data['u_norangka'];
			$nomesin 	= $data['u_nomesin'];
			$merk		= $data['u_merk'];
			$model		= $data['u_model'];
			$tahun		= $data['u_tahun'];
			$nomodel	= $data['u_nomodel'];
			
			$tglmasuk	= $data['es_tgl_masuk'];
			$tglkeluar	= $data['es_tgl_keluar'];
			$asuransi	= ubahasuransi($data['asuransi']);
			$ket		= $data['ket'];
			$status		= $data['status'];
			$tglbuat	= $data['es_tgl_buat'];
			$nospk		= $data['es_nospk'];
			
			// Cek Tanggal
			if ($tglkeluar = '00-00-0000'){
				$tglkeluar = '';
			}
			// HTML 
			?>
			<html>
				<head>
					<title><?php echo $_GET['page']." ".$model." ".$nopol ?></title>
					<link rel="stylesheet" href="../../css/report.css" />
				</head>
					
				<body onload="window.print()">
					<div id="wrapper">
						<div align=left >
							<h1>BLITAR PATRIA</h1>
							<h3>Auto Body Repair</h3>
							<h4>Jl. Rajawali KM. 3,5 NO. 39 Palangka Raya </h4>
							<h4>Email : Blitar_Rajawali@yahoo.com</h4>
						</div>
						<div align=right style="position: absolute; top: 0; right: 0">
							<img src="../../img/Logo_Jadi.png" width=180px />
						</div>
					<!--<table width="100%" align="center" style="text-align:center" cellspacing="1">
						<tr>
							<td><font size=5>BLITAR PATRIA</font></td>
						</tr>
						<tr>
							<td>Auto Body Repair</td>
						</tr>
						<tr>
							<td>No Telp. 08929892899</td>
						</tr>
					</table>
					-->
					<hr noshade style="margin-top: 5px;" />
					<table width="100%" align="center" >
					
						<!--
						<tr>
							<td>Kode</td>
							<td>:</td>
							<td class="kanan"><?php echo $eskode ?></td>
						</tr>
						<tr>
							<td>Tgl Cetak</td>
							<td>:</td>
							<td class="kanan"><?php echo $tglnow?></td>
						</tr>
						-->
						<tr>
							<td width="17%">&nbsp;</td>
							<td width="1%">&nbsp;</td>
							<td width="32%" class="kanan">&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td class="besar">Nama</td>
							<td>:</td>
							<td class="kanan"><?php echo $nama ?></td>
							<td>Tgl Masuk</td>
							<td>:</td>
							<td><?php echo angkakebulan($tglmasuk)?></td>
						</tr>
						<tr>
							<td class="besar">Nopol</td>
							<td>:</td>
							<td class="kanan"><?php echo $nopol ?></td>
							<td>Estimasi Tgl Keluar</td>
							<td>:</td>
							<td><?php echo $tglkeluar ?></td>
						</tr>
						<tr>
							<td class="besar">Nomor Rangka</td>
							<td>:</td>
							<td class="kanan"><?php echo $norangka ?></td>
							 <td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td class="besar">Nomor Mesin</td>
							<td>:</td>
							<td class="kanan"><?php echo $nomesin ?></td>
							<td>Tahun Kendaraan</td>
							<td>:</td>
							<td><?php echo $tahun ?></td>
						</tr>
						<tr>
							<td class="besar">Type </td>
							<td>:</td>
							<td class="kanan"><?php echo $merk.' '.$model ?></td>
							<td>No. Model</td>
							<td>:</td>
							<td><?php echo $nomodel?></td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
				   
						</tr>
					
					</table>
			<?php
		}
		
	}
	else {
		echo "Kode Eskode Kosong";
	}
}

?>