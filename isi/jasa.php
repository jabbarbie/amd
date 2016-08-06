<ul class="breadcrumb">
  <li><a href="?p=os">Home</a> <span class="divider"></span></li>
  <li class="active">Jasa</li>
</ul>
<?php
// Buat Inisisialisasi variable
// Tipe = Jenis kendaraan

?>
<!-- Pencarian -->
<div class=well align=right>	
	<form method=GET class="form-inline" name=form>
		<input type=hidden name=p value=jasa />
                

		  <input onclick="getvalue()" rel=tooltip class="span5 form-control" name="search" id="pencarian" type="text" placeholder="Nama Jasa..." autofocus >
		  <input type="submit" class="btn btn-primary" value="Cari" />
		
	</form>
</div>
<table class="table table-striped">
<?php

$no = 1;
// Jika ada tombol pencarian
if (isset($_GET['search'])){
  $cari     = $_GET['search'];
  $query_awal    = "SELECT * FROM jasa WHERE ja_kode LIKE '%$cari%' OR ja_nama LIKE '%$cari%' ORDER BY ja_nama DESC";
// echo "ikut if";
 }  
else {
//	echo "ikut else";
	$querysql    = mysql_query("SELECT * FROM jasa ORDER BY ja_kode DESC LIMIT 0,7");
}
if (isset($_GET['search'])){
//echo " ikut else ke 2";
	$query  = mysql_query($query_awal) or die (mysql_error());
	### Setting Paggin ##
		// Set Pangging
			
		$per_page	= 8;

		//$page_query	= mysql_query("SELECT COUNT(*) FROM pelanggan");
		$page_query	= mysql_num_rows($query);
		$pages		= ceil($page_query / $per_page);

		
		$page		= (isset($_GET['halaman'])) ? (int)$_GET['halaman'] : 1;
		$start		= ($page - 1) * $per_page;
		
		$sql 		= $query_awal.' LIMIT '.$start.', '.$per_page;
		$querysql	= mysql_query($sql) or die (mysql_error());
		//$sql 		= $query_awal;
		$no = 1 * $start + 1;

}
while ($data  = mysql_fetch_array($querysql)){
 
  echo "
	<tr>
	<td><p>".$no.".</p></td>
	<td><p>".$data['ja_kode']."</p></td>
	<td><p>";
	?>
	<a onclick="inputdata('isi/crud/edit.php?p=jasa&ja_kode=<?php echo $data['ja_kode'] ?>','700','350')" />
	<?php
	echo $data['ja_nama']."</a></p></td>
	<td><p>".$data['ja_jenis']."</p></td>
	<td><p align=right>".rupiah($data['ja_price'])."</p></td>
	<td><a href='' onclick=sate('isi/crud/delete_query.php?page=jasa&kode=".$data['ja_kode']."') >
	    <img src='img/tombol/close.png' /></a>
	</td>
	</tr>
  ";
   $no++;
}
echo "</table>";
// inisial pagging
	$page		= (isset($_GET['halaman'])) ? (int)$_GET['halaman'] : 1;
	$pages		= (isset($pages)) ? $pages : 1;
	$search		= (isset($_GET['search'])) ? hapusspasi($_GET['search']) : '';
	//echo 'Sebelum '.$tipe. 'Sesudah ';
	//echo $tipe;
	if(($pages >= 1 && $page <= $pages) AND (isset($_GET['search']))){
		echo "<ul class='pagination'>";
		for($x=1; $x<=$pages; $x++){
			echo ($x == $page) ? "<li class=active><a href=?p=".$_GET['p']."&halaman=".$x."&search=".$search.">".$x."</a></li> " : "<li><a href=?p=".$_GET['p']."&halaman=".$x."&search=".$search.">".$x."</a></li>";
		}
	}

?>