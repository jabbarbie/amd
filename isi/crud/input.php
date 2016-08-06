<script src="../../js/fungsi.js"></script>
<?php
include ("head.php");
$no = 0;
session_start();
if (!isset($_GET['p'])){
	// Query Jasa
       if (isset($_GET['halaman'])){
           $halaman     = $_GET['halaman'];
           include ("../../config/koneksi.php");
		   switch ($halaman){

               // Input Jasa Estimasi
               case 'queryjasa'     :
                                    $sql    = "INSERT INTO estimasijasa (es_kode,ja_kode) VALUES ('".$_GET['eskode']."', '".$_GET['jakode']."' ) ";
                                    $query  = mysql_query($sql) or die ($error=mysql_error());

                                    if ($query){
                                        header("Location: ?pesan=Success input $ja_kodes&p=jasa&eskode=".$_GET['eskode']."&idunit=".$_GET['jakode']." ");
                                    }
                                    else {
                                        echo "Gagal Input di jasa ".$error;
                                    }
                                    break;
                // Input Part Estimasi
               case 'querypart'     :

                                    $sql    = "INSERT INTO estimasipart (es_kode,part_kode) VALUES ('".$_GET['eskode']."', '".$_GET['partkode']."') ";
                                    $query  = mysql_query($sql) or die ($error=mysql_error());

                                    if ($query){
                                        header("Location: ?p=part&eskode=".$_GET['eskode']."&idunit=".$_GET['partkode']." ");
                                    }
                                    else {
                                        echo "Gagal Input di part ".$error;
                                    }
                                    break;
           }// End Switch


       } // End if
}
else {
	require ("../../function/input.php");

	$p = $_GET['p'];

	switch ($p){
	//Unit
	case 'unit'		: 	?>

						<form class="form-inline" action="input_query.php" method=POST >
						<input type=hidden name=halaman value=unit />
						<table class="table table-bordered table-striped">
							<tr>
								<td> <label>Nama </label></td>
								<td> <input type=text name=nama class="span2  form-control" placeholder="Nama Tertanggung" autofocus /></td>

								<td> <label>Nopol</label></td>
								<td> <input type=text name=nopol class="span1  form-control" placeholder="Nomor Polisi" /></td>
							</tr>
							<tr>
								<td> <label>Tipe</label></td>
								<td> <input type=text name=tipe class="span2  form-control" placeholder="Misal : Toyota" size="5" />
									 <input type=text name=merk class="span2  form-control" placeholder="Misal : Avanza" size="2" /></td>

								<td> <label>Tahun</label></td>
								<td> <input type=text name=tahun class="span2  form-control" placeholder="Tahun Kendaraan" size="5" /> </td>
							</tr>
							<tr>
								<td> <label>No Rangka</label></td>
								<td> <input type=text name=no_rangka placeholder="Nomor Rangka" class="span2  form-control" /></td>

								<td> <label>No Mesin </label></td>
								<td> <input type=text name=no_mesin placeholder="Nomor Mesin" class="span2  form-control" /></td>
							</tr>
							<tr>
								<td> <label> Masuk </label></td>
								<td> <input type=date name=tgl_masuk class="span2  form-control" required /></td>

								<td> <label> Keluar </label></td>
								<td> <input type=date name=tgl_keluar class="span2  form-control" /></td>
							</tr>
							<tr>
								<td> <label>No. Model</label></td>
								<td> <input type=text name=no_model placeholder="Nomor Model" class="span2  form-control" /></td>

								<td> <label>No. SPK / Polis </label></td>
								<td> <input type=text name=no_spk placeholder="SPK / Polis " class="span2  form-control" /></td>
							</tr>
							<tr>
								<td> <label>Asuransi</label></td>
									<td> <select name="asuransi" class="seratuspixel  form-control"><?php echo DropdownSelect('asuransi','as_kode','as_nama')?></select></td>

								<td> <label>Status </label></td>
								<td> <select name=status style="width: 80%" class=" form-control"></select></td>
							</tr>
							<tr>
								<td> <label>Ket</label></td>
								<td> <textarea name=ket class="form-control"></textarea></td>

								<td> <label></label></td>
								<td> <input type=submit id=tombolsimpan class="btn btn-primary  form-control" value="Simpan" /></td>
							</tr>
						</table>
						</form>
						<?php
						;
					  break;
	case 'estimasi' : ?>

					  <form class="form-inline" action="input_query.php" method=POST >
					  <fieldlist>
					  <legend>Input Estimasi</legend>
						<input type=hidden name=halaman value=estimasi />
						<input type=hidden name=u_kode value=<?php echo $_GET['idunit']?> />
						<table class="table table-bordered table-striped">
							<tr>
								<td> <label>Tgl Masuk</label></td>
								<td> <input type=date name=tgl_masuk class="span2 form-control" autofocus /></td>

								<td> <label>Tgl Keluar</label></td>
								<td> <input type=date name=tgl_keluar class="span2 form-control" /></td>
							</tr>
							<tr>
								<td> <label>No. SPK / Polis </label></td>
								<td> <input type=text name=no_spk placeholder="SPK / Polis " class="span2 form-control" /></td>

								<td> <label>Status </label></td>
								<td> <select name=status style="width: 80%" class="form-control" ><?php DropdownSelect('status','st_id','st_nama')?></select></td>
							</tr>
							<tr>
								<td> <label>Ket</label></td>
								<td> <textarea name=ket class="form-control" ></textarea></td>

								<td> <label>Asuransi </label></td>
								<td> <select name="asuransi" class="form-control"><?php echo DropdownSelect('asuransi','as_kode','as_nama')?> </select></td>
							</tr>
							<tr>
								<td> <label></label></td>
								<td colspan=4> <input type=submit id=tombolsimpan class="btn btn-primary form-control" value="Simpan" /></td>

							</td>
						</table>
					  </fieldlist>

                                          </form>
					  <?php
					  ;
					  break;

        case 'jasa'     : ?>
                        <form  class="form-inline" action="" method=GET >
					  	<input type=hidden name=halaman value=jasa />
						<input type=hidden name=p value=jasa />

						<input type=hidden name=idunit value=<?php echo $_GET['idunit']?> />
						<input type=hidden name=eskode value=<?php echo $_GET['eskode']?> />
						<table class="table table-bordered table-striped">
							<tr>
								<td> <label>Nama</label></td>
								<td> <input type=text name="nama" class="span2 form-control" placeholder="Nama Item" autofocus /></td>

								<td> <label>Harga</label></td>
								<td> <input type=text name="harga" class="span2 harga  form-control" placeholder="Hargaa Item" /></td>
							</tr>
							<tr>
								<td> <label>Type</label></td>
                                                                <td> <select name="jenis" style="width: 70%" class="form-control" /><?php include ("../../function/jenis.php")?></select></td>

                                                                <td>&nbsp;</td>
                                                                <td ><button class="btn btn-success btn-sm" name=cari type="submit">Cari</button>&nbsp; &nbsp;<input type="submit" value="Simpan" name="simpan" class="btn btn-primary btn-sm"/>
																<button class="btn btn-error btn-sm" name="keluar" type="submit" onclick="tutup()"> Close </button>
																</td>
							</tr>

						</table>
                                          </form>

                                          <table class="table table-striped">

                                          <?php
										  //Jika ada tombol submit di klik
										  if (isset($_GET['simpan'])){
											  $nama  = aman($_GET['nama']);
                                                                                          $jenis = aman($_GET['jenis']);
											  $harga = aman($_GET['harga']);
											  $detik = date("s");
                                                                                          $eskode = $_GET['eskode'];

											  // konvert kode jasa seunik mungkin
												$kode = $nama;
												$kode = str_replace(" ", "", "$kode");
												$kode = str_replace("A", "", "$kode");
												$kode = str_replace("I", "", "$kode");
												$kode = str_replace("U", "", "$kode");
												$kode = str_replace("E", "", "$kode");
												$kode = str_replace("O", "", "$kode");
												$kjenis = str_replace("/","", $jenis);

                                                                                                $kode = $kode.$kjenis.$detik;

											$sql	= "INSERT INTO jasa (ja_kode,ja_nama,ja_jenis,ja_price)
                                                                                                  VALUES ('$kode','$nama','$jenis','$harga') ";
                                                                                        $sql2   = "INSERT INTO estimasijasa (es_kode,ja_kode) VALUES ('$eskode','$kode') ";

                                                                                        $query = mysql_query($sql);
                                                                                        $query2= mysql_query($sql2);
                                                                                        if (($query) AND ($query2)){
                                                                                            echo "Berhasil ".$sql;
                                                                                        }
                                                                                        else {
                                                                                            echo "Gagal";
                                                                                        }
										  }

                                          // Jika ada tombol pencarian
										  if (isset($_GET['cari'])){
                                              $nama  = $_GET['nama'];
                                              $jenis = $_GET['jenis'];
                                              $sql    = "SELECT * FROM jasa WHERE ja_nama LIKE '%$nama%' AND ja_jenis = '$jenis' ORDER BY ja_price DESC";
                                          }
                                          else {
                                              $sql    = "SELECT * FROM jasa ORDER BY ja_price DESC LIMIT 0,10";
                                          }

                                          $query  = mysql_query($sql);
                                          while ($data  = mysql_fetch_array($query)){
                                              $no++;
                                              echo "
                                                <tr>
                                                <td><p>".$no.".</p></td>
                                                <td><p><a href=?halaman=queryjasa&eskode=".$_GET['eskode']."&jakode=".$data['ja_kode'].">".$data['ja_nama']."</a></p></td>
                                                <td><p>".$data['ja_jenis']."</p></td>
                                                <td><p align=right>".rupiah($data['ja_price'])."</p></td>
                                                </tr>
                                              ";
                                          }
                                          echo "</table>";

                                          ;
                                          break;
        case 'part'		: ?>
						<form  action="" class="form-inline" method=GET >
					  	<input type=hidden name=halaman value=part />
						<input type=hidden name=p value=part />

						<input type=hidden name=idunit value=<?php echo $_GET['idunit']?> />
						<input type=hidden name=eskode value=<?php echo $_GET['eskode']?> />
						<table class="table table-bordered table-striped">
							<tr>
								<td> <label>Part Code</label></td>
								<td> <input type=text name="code" class="span2 form-control" placeholder="Code Part" /></td>

								<td> <label>Nama</label></td>
                                                                <td> <input type=text name="nama" class="span2 form-control" placeholder="Nama Item" autofocus= required /></td>
							</tr>
							<tr>
								<td> <label>Harga Default</label></td>
								<td> <input type=text name="hargadefault" class="span2 harga form-control" placeholder="Hargaa Normal" /></td>

								<td> <label>Harga</label></td>
								<td> <input type=text name="harga" class="span2 harga form-control" placeholder="Hargaa yg digunakan" /></td>

							</tr>
							<tr>
								<td> <label>Unit</label></td>
								<td> <input type=text name="unit" class="span2 form-control" placeholder="Exp: Jazz" value="RANGER2" /></td>

								<td>&nbsp</td>
								<td>
									<button class="btn btn-success" name=cari type="submit">Cari</button>&nbsp; &nbsp;<input type="submit" value="Simpan" name="simpan" class="btn btn-primary"/>
									<button class="btn btn-error" name="keluar" type="submit" onclick="tutup()"> Close </button>
								</td>

							</tr>

						</table>
                                          </form>

                                          <table class="table table-striped">

                                          <?php
										  //Jika ada tombol submit di klik
										  if (isset($_GET['simpan'])){
                                                                                          // Ambil kode trakir dr kode id part
                                                                                          $sqlp     = "SELECT part_kode FROM part WHERE part_kode=(select max(part_kode) FROM part)";
                                                                                          $queryp   = mysql_query($sqlp);

                                                                                          $ambilp   = mysql_fetch_array($queryp);
                                                                                          $kodetrakir   = $ambilp['part_kode'] + 1;

											  $code	 = aman($_GET['code']);
											  $nama  = aman($_GET['nama']);
                                                                                          $unit = aman($_GET['unit']);
											  $hargadefault = aman($_GET['hargadefault']);
											  $harga = aman($_GET['harga']);
											  //$detik = date("s");
                                                                                          $eskode = $_GET['eskode'];


											$sql	= "INSERT INTO part (part_code,part_nama,part_unit,part_harganormal,part_harga)
                                                                                                  VALUES ('$code','$nama','$unit','$hargadefault','$harga') ";
                                                                                        $sql2   = "INSERT INTO estimasipart (es_kode, part_kode) VALUES ('$eskode','$kodetrakir') ";

                                                                                        $query = mysql_query($sql);
                                                                                        $query2= mysql_query($sql2);
                                                                                        if (($query) AND ($query2)){
                                                                                            echo "<div class='alert alert-success'> Berhasil input <b>".$nama."</b> </div>";
                                                                                        }
                                                                                        else {
                                                                                            echo "<div class='alert alert-warning'>Gagal</div>";
                                                                                        }
										  }

                                          // Jika ada tombol pencarian
										  if (isset($_GET['cari'])){
                                              $nama     = $_GET['nama'];
                                              $unit     = $_GET['unit'];
                                              $code     = $_GET['code'];
                                              $sql    = "SELECT * FROM part WHERE part_code LIKE '%$code%' AND part_nama LIKE '%$nama%' AND part_unit LIKE '%$unit%' ORDER BY part_unit DESC";
                                          }
                                          else {
                                              $sql    = "SELECT * FROM part ORDER BY part_kode DESC LIMIT 0,10";
                                          }

                                          $query  = mysql_query($sql);
                                          while ($data  = mysql_fetch_array($query)){
                                              $no++;
                                              echo "
                                                <tr>
                                                <td><p>".$no.".</p></td>
												<td><p>".$data['part_code']."</p></td>
                                                <td><p><a href=?halaman=querypart&eskode=".$_GET['eskode']."&partkode=".$data['part_kode'].">".$data['part_nama']."</a></p></td>
                                                <td><p>".$data['part_unit']."</p></td>
                                                <td><p align=right>".rupiah($data['part_harga'])."</p></td>
                                                </tr>
                                              ";
                                          }
                                          echo "</table>";

                                          ;

							break;
			case 'asuransi'     : ?>
			<form class="form-inline" action="input_query.php" method=POST >
						<input type=hidden name=halaman value=asuransi />
						<table class="table table-bordered table-striped">
							<tr>
								<td> <label>Nama Asuransi</label></td>
								<td> <input type=text name=nama class="span2  form-control" placeholder="Nama Asuransi" autofocus /></td>

								<td> <label>Ket</label></td>
								<td> <textarea name=ket class="form-control"></textarea></td>
							</tr>
							<tr>
								<td> &nbsp </td>
								<td> &nbsp </td>

								<td> <label></label></td>
								<td> <input type=submit id=tombolsimpan class="btn btn-primary  form-control" value="Simpan" /></td>
							</tr>

						</table>
						</form>
						<?php
						break;
			// status
			case 'status'     : ?>
			<form class="form-inline" action="input_query.php" method=POST >
						<input type=hidden name=halaman value=status />
						<table class="table table-bordered table-striped">
							<tr>
								<td> <label>Nama Status</label></td>
								<td> <input type=text name=nama class="span2  form-control" placeholder="Nama Status" autofocus /></td>

								<td> <label>Ket</label></td>
								<td> <textarea name=ket class="form-control"></textarea></td>
							</tr>
							<tr>
								<td> &nbsp </td>
								<td> &nbsp </td>

								<td> <label></label></td>
								<td> <input type=submit id=tombolsimpan class="btn btn-primary  form-control" value="Simpan" /></td>
							</tr>

						</table>
						</form>
						<?php
						break;
		} // End Switch
}
?>

</body>
