<?php
	$no 		= 0;
	$no2		= 0;
	$htotalpart = 0;
	$htotaljasa = 0;
	$totalpart  = 0;
	
	$es_kode	= $_GET['es_kode'];
    
	//Joinkan table estimasi dg table unit
    $qdataestimasi	= mysql_query("SELECT * FROM unit u INNER JOIN estimasi e ON u.u_kode = e.u_kode WHERE es_kode='$es_kode' ");
	$dataestimasi	= mysql_fetch_array($qdataestimasi);	
	//hancurkan dan buat session lagi
	session_start();
	session_destroy();
	
	$_SESSION['unit'] = $dataestimasi['u_model'];
	echo $_SESSION['unit'];
	//Joinkan table jasa dan part estimasi unit 
    $qjasa 	= mysql_query("SELECT * FROM estimasijasa esja INNER JOIN jasa ja ON esja.ja_kode = ja.ja_kode WHERE esja.es_kode = '$es_kode' ");
	$qpart 	= mysql_query("SELECT * FROM estimasipart espart INNER JOIN part p ON espart.part_kode = p.part_kode WHERE espart.es_kode = '$es_kode' ");
		
	$banyakpartes = mysql_num_rows($qpart);
	$banyakjasaes = mysql_num_rows($qjasa);
	
    ?>
<!-- Tombol Navigasi Kiri -->
<div class=row-fluid>
		<!-- Sidebar -->
		<div class=span2>
		<!-- Menu List-->
			<ul class="nav nav-pills nav-stacked">
			  <li class="active"><a href="#">Tambah</a></li>
				<li  onclick="inputdata('isi/crud/input.php?p=jasa&eskode=<?php echo $_GET['es_kode'] ?>&idunit=<?php echo $_GET['unit'] ?>','700','590')" ><a href=""><i class=""></i> Jasa</a></li>
				<li onclick="inputdata('isi/crud/input.php?p=part&eskode=<?php echo $_GET['es_kode'] ?>&idunit=<?php echo $_GET['unit'] ?>','700','590')" ><a href=""><i class="icon-plus-sign"></i> Part</a></li>
			  <li class="active"><a href="#">Print</a></li>
				<li ><a href="isi/report/report_estimasi.php?page=estimasi&eskode=<?php echo $_GET['es_kode']?>" Target=_Blank><i class="icon-tasks "></i> Estimasi</a></li>
				
			  <li></li>
			  
			  <li class="active"><a href="#">Menu Navigasi</a></li>
				<li><a href="?p=listestimasi&id=<?php echo $_GET['unit'] ?>" ><i class="icon-fast-backward"></i> Kembali</a></li>  
				<li id="batas"><a href=""><i class="icon-arrow-up"></i> Keatas</a></li>
                <li id="btotalpart"><a href=""><i class="icon-share-alt"></i> Total Part</a></li>
				<li id="btotalestimasi"><a href=""><i class="icon-share-alt"></i> Total Jasa</a></li>
			  
			</ul>
		</div>
	<div class=span10> 		<!-- Content Estimasi-->
		<div class=well> 	<!-- block Unit-->
			<table class="table table-striped table-bordered">
				<tr>
					<td style="width: 19%" >	Nama </td>
					<td style="width: 1%">	:	 </td>
					<td style="width: 30%"><?php echo $dataestimasi['u_nama']?>	</td>
					<td>					Nopol</td>
					<td style="width: 1%">	:	 </td>
					<td>				   <?php echo $dataestimasi['u_nopol']?></td>
				</tr>
				<tr>
					<td style="width: 19%">Nomor Rangka</td>
					<td style="width: 1%">:</td>
					<td style="width: 30%"><?php echo $dataestimasi['u_norangka']?></td>
					<td>Tgl Masuk</td>
					<td>:</td>
					<td><?php echo tanggal_indonesia($dataestimasi['es_tgl_masuk'])?></td>
				</tr>
				<tr >
					<td>No Mesin</td>
					<td>:</td>
					<td><?php echo $dataestimasi['u_nomesin']?></td>
					<td>Tgl Buat</td>
					<td>:</td>
					<td><?php echo tanggal_indonesia($dataestimasi['es_tgl_buat'])?></td>
				</tr>
				<tr >
					<td>Tipe Kendaraan</td>
					<td>:</td>
					<td><?php echo $dataestimasi['u_merk']." ".$dataestimasi['u_model']?></td>
					<td>Tahun	</td>
					<td>:</td>
					<td><?php echo $dataestimasi['u_tahun']?></td>
				</tr>
				<tr >
					<td>Status</td>
					<td>:</td>
					<td><?php echo $dataestimasi['status']?></td>
					<td>Asuransi	</td>
					<td>:</td>
					<td><?php echo ubahasuransi($dataestimasi['asuransi'])?></td>
				</tr>
				<tr >
					<td>Keterangan</td>
					<td>:</td>
					<td colspan=4><?php echo $dataestimasi['ket']?></td>
				</tr>
				
		</div> <!-- Akhir dari Well / Block unit-->
			
			<!-- Tampilkan Estimasi Part dan Jasa-->
			<?php
			// Block Estimasi Part
			if ($banyakpartes != 0)
				{
					echo "<table class='table table-striped table-bordered'>";
					
					$totalpart = 0;
				
					echo   "<tr class=error>
								<td colspan=6>
									<h3 align=center>PART</h3>
								</td>
							</tr>";
						while ($datapart = mysql_fetch_array($qpart)){ //Ambil Data estimasi part dari table estimasipart
							$no++;
							echo   "<tr >
										<td width=5%>$no.</td>
										<td width=20%><p align=center>".$datapart['part_code']."</p></td>
										<td width=40% colspan=2>"; //Part Nama 
								?>
										<!-- <a href="" onclick="inputdata('content/page/crud/edit.php?page=partestimasi&kode=<?php // echo $datapart['part_kode']?>','470','170')" > -->
									  
								<?php 
								$partkode	= $datapart['part_kode']; 
                                                                $espartkode     = $datapart['espart_kode'];
								echo  	$datapart['part_nama']."</a></td>
										<td width=25%><p align=right>".rupiah($datapart['part_harga'])."</p></td>
										<td width=10%>
										<p  align=center>
											
                                                                                        <a href='' onclick=sate('isi/crud/delete_query.php?page=estimasipart&kode=$espartkode') >
										<img src='img/tombol/close.png' /></a>
										</p>
										</td>
										</tr>"; 
										
								$htotalpart 	= $htotalpart + $datapart['part_harga']; //Jumlahkan totalpart dari hasil query qtotalpart
						
					} // Akhir dari perulangan pengambilan data Estimasi Part           
					
						// Tampilkan TotalPart
						echo 		"<tr class=info><strong>
										<td colspan=4 id=totalPart><p align=right>TOTAL PART</p></td>
										<td colspan=1><p align=right>".rupiah($htotalpart)."</p></td>
										<td>&nbsp</td>
										</strong>
									</tr>";
						echo 		"</table>";
				} // Akhir dari block if part estimasi 			
				
				// Block Estimasi Jasa
				if ($banyakjasaes != 0)
				{
					echo "<table class='table table-bordered table-striped'>
							<tr class=error> 
								<td colspan=5 id=jasa><h3 align=center>Jasa</h3></td>
							</tr>";
					
					while ($datajasa 	= mysql_fetch_array($qjasa)){
							$no2++;
							
							$esja_kode	= $datajasa['esja_kode'];
                                                        
							echo "<tr>
									<td width=5%>$no2.</td>
									<td width=50%>".$datajasa['ja_nama']."</td>
									<td width=10%><p align=center>".$datajasa['ja_jenis']."</p></td>
									<td width=25%><p align=right>".rupiah($datajasa['ja_price'])."</p></td>
									<td width=10% align=center>
										<p align=center>
										<a href='' onclick=sate('isi/crud/delete_query.php?page=estimasijasa&kode=$esja_kode') >
										<img src='img/tombol/close.png' /></a>
										</p>
									</td>
								  </tr>";
							$htotaljasa = $htotaljasa + $datajasa['ja_price'] ;
									
					}       
					
					$totalestimasi = $htotalpart + $htotaljasa; 
					echo "<tr>
							<td colspan=3 id=totalJasa ><p align=right>TOTAL JASA</p></td>
							<td colspan=1 ><p align=right>".rupiah($htotaljasa)."</p></td>
							<td>&nbsp</td>
						  </tr>";
					echo "</table>";
					
					echo "<table width=100%>";
					echo "<tr ><td width=5%></td><td width=60% colspan=2 align=center id=totalestimasi><strong>TOTAL ESTIMASI </strong>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td><td width=25% align=right><strong>".rupiah($totalestimasi)."&nbsp </strong></td><td width=10%></td></tr>";

					echo "</table>";
					}
				
				?>
			</table>
	</div>
	
</div>