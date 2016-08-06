<script src="js/crud.js" ></script>
<div class=row-fluid>
	<div class=span2>
		<!-- Menu List-->
			<ul class="nav nav-pills nav-stacked">
			   <a href="#input" role="button" data-toggle="modal" class="btn btn-small btn-primary" onclick="inputdata('isi/crud/input.php?p=status','700','200')" >Tambah Status</a>
			</ul>
	</div>
	<div class=span10>
		<table class="table table-striped">
		<?php

		$no = 1;
		$querysql    = mysql_query("SELECT * FROM status ORDER BY st_id asc LIMIT 0,7");

		while ($data  = mysql_fetch_array($querysql) or die (mysql_error())){
		 
		  echo "
			<tr>
			<td><p>".$data['st_id']."</p></td>
			<td>";
			
			echo $data['st_nama']."</td>
			<td><p>".$data['st_ket']."</p></td>
			
			</tr>
		  ";
		   $no++;
		}
	?>
	</div>
</div> 