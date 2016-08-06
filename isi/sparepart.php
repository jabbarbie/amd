<ul class="breadcrumb">
  <li><a href="?p=os">Home</a> <span class="divider"></span></li>
  <li class="active">Part</li>
</ul>
<?php
// Buat Inisisialisasi variable
// Tipe = Jenis kendaraan
$tipe	= '';
if (isset($_GET['tipe'])){
	$tipe	= tambahspasi($_GET['tipe']);
	if ($tipe == "all"){
		$tipe = ' ';
	}
}
?>
<!-- Pencarian -->
<div class=well align=right>	
	<form method=GET class="form-inline" name=form>
		<input type=hidden name=p value=sparepart />
                <select name="tipe" class="seratuspixel form-control"><option value="all">Pilih Tipe Kendaraan</option><?php DropdownSelect('unit','u_kode','u_model','$tipe')?></select>

		  <input onclick="getvalue()" rel=tooltip class="span5 form-control" name="search" id="pencarian" type="text" placeholder="Nama Part atau Code Part" autofocus >
		  <input type="submit" class="btn btn-primary" value="Cari" />
		
	</form>
</div>
<table class="table table-striped">
<?php

$no = 1;
// Jika ada tombol pencarian
if (isset($_GET['search']) & $tipe != 'all'){
  $cari     = $_GET['search'];
  $query_awal    = "SELECT * FROM part WHERE (part_code LIKE '%$cari%' OR part_nama LIKE '%$cari%' ) AND part_unit ='$tipe' ORDER BY part_unit DESC";
// echo "ikut if";
 }  
else {
//	echo "ikut else";
	$querysql    = mysql_query("SELECT * FROM part ORDER BY part_kode DESC LIMIT 0,7");
}
if (isset($_GET['search']) & $tipe != 'all'){
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
	<td><p>".$data['part_code']."</p></td>
	<td><p>";
	?>
	<a onclick="inputdata('isi/crud/edit.php?p=part&part_id=<?php echo $data['part_kode'] ?>','700','350')" />
	<?php
	echo $data['part_nama']."</a></p></td>
	<td><p>".$data['part_unit']."</p></td>
	<td><p align=right>".rupiah($data['part_harga'])."</p></td>
	<td><a href='' onclick=sate('isi/crud/delete_query.php?page=part&kode=".$data['part_kode']."') >
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
	$tipe	= (isset($_GET['tipe'])) ? hapusspasi($_GET['tipe']) : 'all';
	//echo $tipe;
	if(($pages >= 1 && $page <= $pages) AND (isset($_GET['tipe']))){
		echo "<ul class='pagination'>";
		for($x=1; $x<=$pages; $x++){
			echo ($x == $page) ? "<li class=active><a href=?p=".$_GET['p']."&halaman=".$x."&tipe=".$tipe."&search=".$search.">".$x."</a></li> " : "<li><a href=?p=".$_GET['p']."&halaman=".$x."&tipe=".$tipe."&search=".$search.">".$x."</a></li>";
		}
	}

?>