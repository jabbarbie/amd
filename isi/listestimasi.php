<?php 
// Query Data Dulu
if (isset($_GET['id'])){
	$id		= $_GET['id'];
	$sql	= "SELECT * FROM estimasi WHERE u_kode = '".$_GET['id']."' ";
	$query	= mysql_query($sql)or die(mysql_error());
	
}
?>
<div class=row-fluid>
	<div class=span2>
	<!-- Menu List-->
		
		<ul class="nav nav-pills nav-stacked">
		  <li class="active"><a href="#">Menu </a></li>
		  <li onclick="inputdata('isi/crud/input.php?p=estimasi&idunit=<?php echo $_GET['id'] ?>','700','330')"><a href="#"><i class="icon-plus-sign icon-white"></i> Tambah Estimasi</a></li>
		  <li onclick="KonfirHapus('isi/crud/delete_query.php?page=unit&idunit=<?php echo $id?>','Menghapus data Unit <?php echo $id ?> ?')" ><a href="#"><i class="icon-remove"></i> Hapus Unit</a></li>
		  <li onclick="inputdata('isi/crud/edit.php?p=unit&idunit=<?php echo $_GET['id'] ?>','700','300')"><a href="#"><i class="icon-pencil"></i> Edit Unit</a></li>
		  
		</ul>
	</div>
	<div class=span10>
		<div class="well">
			
			<table class="table table-bordered table-striped">
				<tr class=info>
					<td colspan=2></td>
					<td>Kode Unit</td>
					<td ><?php echo $_GET['id']?></td>
				</tr>
				<tr>
					<th style="width:10%">ID</th>
					<th style="width:35%">Tgl Masuk</th>
					<th style="width:35%">Tgl Keluar</th>
					<th style="width:20%">Pilihan</th>
				</tr>
				<?php 
					
					while ($data=mysql_fetch_array($query)){
						echo "	<tr>
								<td><a href=?p=estimasi&es_kode=".$data['es_kode']."&unit=".$_GET['id']." rel='tooltip' data-original-title=' "
								.ubahasuransi($data['asuransi'])." ".$data['status'].
								"' <br /> "
								.$data['es_kode'].
								
								
								
								"</a></td>
								<td>".tanggal_indonesia($data['es_tgl_masuk'])."</td>
								<td>".tanggal_indonesia($data['es_tgl_keluar'])."</td>
								<td>"
								?>
								<div class="btn-group btn-mini" >
								  <a class="btn btn-primary btn-small" href="?p=estimasi&es_kode=<?php echo $data['es_kode']."&unit=".$_GET['id'] ?>"><i ></i> Estimasi</a>
								  <a class="btn btn-primary dropdown-toggle btn-small" data-toggle="dropdown" href="#"><span class="caret"></span></a>
								  <ul class="dropdown-menu">
									<li onclick="inputdata('isi/crud/edit.php?p=estimasi&idunit=<?php echo $data['es_kode'] ?>','700','350')" ><a href="#" ><i class="icon-pencil" ></i> Edit</a></li>
									<li onclick="inputdata('isi/crud/delete_query.php?page=estimasi&kode=<?php echo $data['es_kode'] ?>','700','350')" ><a href="#"><i class="icon-trash"></i> Delete</a></li>
									<!--<li class="divider"></li>-->
									<li><a href="#"><i class="icon-trash"></i> Copy</a></li>
									
								  </ul>
								</div>
								<?php
								"</td>
								</tr>
						";
					}
				?>
			</table>
		</div>
	</div>

</div>