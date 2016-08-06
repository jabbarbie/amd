<?php
function DropdownSelect($table,$id,$nama,$id_edit=null){
	$sql    = "SELECT $id,$nama FROM $table WHERE $nama != '' GROUP BY $nama ORDER BY $nama ";
	$query  = mysql_query($sql)or die(mysql_error());
	
	while ($data = mysql_fetch_array($query)){
		// ini special buat sparepart
		if ($table == "unit" or $table == "jasa"){
			$selected = ($id_edit == '$data[$nama]' ? ' SELECTED ':'');
			echo "<option $selected value='".$data[$nama]."'>".strtoupper($data[$nama])."</option>";	
		}
		else {
			$selected = ($id_edit == $data[$id] ? ' SELECTED ':'');
			echo "<option $selected value=".$data[$id].">".strtoupper($data[$nama])."</option>";
		}
	}
}
?>
