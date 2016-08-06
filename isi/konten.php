<?php
if (isset($_GET['p'])){
			include ("isi/".$_GET['p'].".php"); 
		}
	else{
			header("Location: ?p=os");
		}
?>