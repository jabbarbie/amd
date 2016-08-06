<?php
require ("../../config/koneksi.php");
	function inputdata($table,$field,$isi){
		$field 	= implode(" ",$field);
		$isi	= implode(" ",$isi);
		$sql	= "INSERT INTO ".$table." (".$field.") VALUES (".$isi.") ";
		$query 	= mysql_query($sql)or die($y = mysql_error());
		
		if ($query){
			return 1;
		}
		else { 
			return $sql;
		}
                 
	}
	function updatedata($table,$fieldwhere,$valuewhere,$isi){
		$isi	= implode(" ",$isi);
		$sql	= "UPDATE ".$table." SET ".$isi." WHERE ".$fieldwhere." = ".$valuewhere;
		$query	= mysql_query($sql)or die ($y = mysql_error());
		if ($query){
			return 1;
		}
		else { 
			return $sql;
		}
	}
	function deletedata($table,$fieldwhere,$valuewhere){
		$sql	= "DELETE FROM ".$table." WHERE ".$fieldwhere." = '".$valuewhere."'";
		$query	= mysql_query($sql) or die ($sql=mysql_error());
		if ($query){
			return 1;
		}
		else { 
			return $sql;
		}
	}
	
?>