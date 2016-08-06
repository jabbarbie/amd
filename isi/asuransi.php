<script src="js/crud.js" ></script>
<div class=row-fluid>
	<div class=span2>
		<!-- Menu List-->
			<ul class="nav nav-pills nav-stacked">
			  <a href="#input" role="button" data-toggle="modal" class="btn btn-small btn-primary" onclick="inputdata('isi/crud/input.php?p=asuransi','700','200')" >Tambah Asuransi</a>
			</ul>
	</div>
	<div class=span10>
		<table class="table table-striped">
		<?php

		$no = 1;
		$querysql    = mysql_query("SELECT * FROM asuransi ORDER BY as_kode ");

		while ($data  = mysql_fetch_array($querysql) or die (mysql_error())){
		 
		  echo "
			<tr>
			<td><p>".$data['as_kode']."</p></td>
			<td>";
			
			echo $data['as_nama']."</td>
			<td><p>".$data['as_deskripsi']."</p></td>
			
			</tr>
		  ";
		   $no++;
		}
	?>
	</div>
</div>