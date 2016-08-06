<?php
	include ('report_header.php');
	
	$es_kode	= $_GET['eskode'];
	$subtotalpart	= 0;
	$subtotaljasa	= 0;


	//Joinkan table jasa dan part estimasi unit 
    $qjasa 	= mysql_query("SELECT * FROM estimasijasa esja INNER JOIN jasa ja ON esja.ja_kode = ja.ja_kode WHERE esja.es_kode = '$es_kode' ");
	$qpart 	= mysql_query("SELECT * FROM estimasipart espart INNER JOIN part p ON espart.part_kode = p.part_kode WHERE espart.es_kode = '$es_kode' ");
		
	$banyakpartes = mysql_num_rows($qpart);
	$banyakjasaes = mysql_num_rows($qjasa);
	
// BEGIN OF PART
// jika hasil dari query part di temukan maka
if ($banyakpartes != 0){
  ?>
  <table width="100%" id="border" align="center" cellpadding="3" cellspacing="1">
    <tr><td colspan="6" class="noborder"><div class="judul"><strong>PURCHASE ORDER</strong></div></td></tr>
    <tr>
	  
      <th width="1%">NO.</td>
      <th width="25%">Code Part</td>
      <th width="55%">Item</td>
      <th width="4%"></td>
      <th width="15%"></td>
    </tr>
    <tr>
 <?php
	  $i = 0;
	  
    //Lakukan perulangan sesuai jumlah part
	  while ($datapart = mysql_fetch_array($qpart)){
		  $i++;
		  echo "<tr><td>".$i.".</td><td>".strtoupper($datapart['part_code'])."</td><td>".$datapart['part_nama']."</td><td  align=center>&nbsp</td><td align=right>&nbsp</td></tr>";
		  $subtotalpart = $subtotalpart + $datapart['part_harga']; 
	  }
}
?>
</table>
<?php
// END OF PART
// BEGIN OF JASA
// Jumlahkan totaljasa dan total part
$totalestimasi = $subtotaljasa + $subtotalpart;
echo "<table>";
?>
        <tr class="white">
            <th width="1%">&nbsp;&nbsp;&nbsp;&nbsp;</td>
          <th width="65%">&nbsp;&nbsp;&nbsp;&nbsp;</td>
          <th width="4%">&nbsp;&nbsp;&nbsp;&nbsp;</td>
          <th width="30%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
        </tr>
<?php
echo "</table>";

// Cek apakah ada keterangan atau tidak 
if (isset($unit['ket'])){
    $ket = 'Keterangan : '.$unit['ket'];
}
else {
    $ket = '';
}
?>
	<br />
    <p align="left"><?php echo $ket ?></p><p align=right>Hormat Kami</p>
    <br />
    <br />
    <p align=right>Manager Bengkel</p>
  
</div>
</body>
</html>