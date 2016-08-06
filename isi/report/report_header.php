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
			$asuransi	= $data['asuransi'];
			//$asuransi	= ubahasuransi($data['asuransi']);
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
					<table width="100%" align="center" cellpadding="3" cellspacing="2">
						<tr>
							<td class="kiri">Asuransi</td>
							<td>:</td>
							<td class="kiri"><?php echo ubahasuransi2($asuransi) 	?></td>
							<td colspan="3" rowspan="3" valign=middle><div class=kanan style="height: 100%"><img src="../../img/logo.png" width="88" height="68"></div>
							<div align=right><p style="font-size: 14px">Bengkel Amat Deco</p>
								<p class="sepuluh">JL. RAJAWALI KM. 06 Palangka Raya Kal-Teng</p>
								<p class="sepuluh">TELP. 081 25002792,085 852 633471</p>
								<p class="sepuluh">E-Mail. Amatdeco@gmail.com</p>
							</div></td>
						</tr>
						<tr>
							<td>Kode</td>
							<td>:</td>
							<td class="kiri"><?php echo $eskode ?></td>
						</tr>
						<tr>
							<td>Tgl Cetak</td>
							<td>:</td>
							<td class="kiri"><?php echo $tglnow?></td>
						</tr>
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
							<td class="kiri"><?php echo $nama ?></td>
							<td>Tgl Masuk</td>
							<td>:</td>
							<td><?php echo angkakebulan($tglmasuk)?></td>
						</tr>
						<tr>
							<td class="besar">Nopol</td>
							<td>:</td>
							<td class="kiri"><?php echo $nopol ?></td>
							<td>Estimasi Tgl Keluar</td>
							<td>:</td>
							<td><?php echo $tglkeluar ?></td>
						</tr>
						<tr>
							<td class="besar">Nomor Rangka</td>
							<td>:</td>
							<td class="kiri"><?php echo $norangka ?></td>
							 <td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td class="besar">Nomor Mesin</td>
							<td>:</td>
							<td class="kiri"><?php echo $nomesin ?></td>
							<td>Tahun Kendaraan</td>
							<td>:</td>
							<td><?php echo $tahun ?></td>
						</tr>
						<tr>
							<td class="besar">Type </td>
							<td>:</td>
							<td class="kiri"><?php echo $merk.' '.$model ?></td>
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
			<?PHP
		}

	}
	else {
		echo "Kode Eskode Kosong";
	}
}

?>
